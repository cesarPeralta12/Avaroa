<?php

namespace App\Services;

use App\Models\Trip;
use App\Models\PricingQuote;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TripFlowService
{
    protected const AVERAGE_SPEED_KMH = 25;
    protected const FARE_PER_MINUTE = 1.15;
    protected const MINIMUM_FARE = 7.00; // Minimum fare per trip: 7 Bs

    public function calculateCost(Trip $trip): ?float
    {
        try {
            $trip->refresh();

            if (!$this->tripHasValidCoordinates($trip)) {
                Log::error('CRITICAL: Attempted to calculate cost without valid GPS coordinates', [
                    'trip_id' => $trip->id
                ]);
                throw new \Exception('GPS coordinates required');
            }

            Log::info('Calculating cost with GPS coords', [
                'trip_id' => $trip->id,
                'origin' => "{$trip->origin_lat},{$trip->origin_lng}",
                'destination' => "{$trip->destination_lat},{$trip->destination_lng}",
            ]);

            $distanceKm = $this->calculateDistance(
                $trip->origin_lat,
                $trip->origin_lng,
                $trip->destination_lat,
                $trip->destination_lng
            );

            if (!$distanceKm || $distanceKm <= 0) {
                throw new \Exception('Invalid distance');
            }

            // Calculate time based on average speed
            $minutes = ($distanceKm / self::AVERAGE_SPEED_KMH) * 60;

            // Calculate fare based on time
            $calculatedFare = round($minutes * self::FARE_PER_MINUTE, 2);

            // Apply minimum fare: if calculated fare is less than 7 Bs, charge 7 Bs
            $finalFare = max($calculatedFare, self::MINIMUM_FARE);

            $trip->update([
                'price' => $finalFare,
                'status' => 'priced',
                'distance' => round($distanceKm, 2),
                'eta' => (int) ceil($minutes)
            ]);

            PricingQuote::create([
                'trip_id' => $trip->id,
                'distance' => $trip->distance,
                'duration' => $minutes,
                'per_minute_rate' => self::FARE_PER_MINUTE,
                'total_fare' => $finalFare,
                'base_fare' => self::MINIMUM_FARE,
                'calculation_method' => 'gps_coordinates',
            ]);

            Log::info('Price calculated', [
                'trip_id' => $trip->id,
                'distance' => $distanceKm,
                'calculated_fare' => $calculatedFare,
                'final_fare' => $finalFare,
                'minimum_fare_applied' => $calculatedFare < self::MINIMUM_FARE
            ]);

            return $finalFare;

        } catch (\Exception $e) {
            Log::error('Calculation failed', ['error' => $e->getMessage()]);
            return null;
        }
    }

    protected function tripHasValidCoordinates(Trip $trip): bool
    {
        if (empty($trip->origin_lat) || empty($trip->origin_lng) ||
            empty($trip->destination_lat) || empty($trip->destination_lng)) {
            return false;
        }

        if (!is_numeric($trip->origin_lat) || !is_numeric($trip->origin_lng) ||
            !is_numeric($trip->destination_lat) || !is_numeric($trip->destination_lng)) {
            return false;
        }

        // Check valid ranges
        if ($trip->origin_lat < -90 || $trip->origin_lat > 90) return false;
        if ($trip->origin_lng < -180 || $trip->origin_lng > 180) return false;
        if ($trip->destination_lat < -90 || $trip->destination_lat > 90) return false;
        if ($trip->destination_lng < -180 || $trip->destination_lng > 180) return false;

        // Check for zero coordinates (likely invalid)
        if (($trip->origin_lat == 0 && $trip->origin_lng == 0) ||
            ($trip->destination_lat == 0 && $trip->destination_lng == 0)) {
            return false;
        }

        return true;
    }

    protected function calculateDistance(float $origLat, float $origLng, float $destLat, float $destLng): float
    {
        $apiKey = config('services.google.maps_api_key');

        $originCoords = "{$origLat},{$origLng}";
        $destCoords = "{$destLat},{$destLng}";

        // Try Google Maps API first if key exists
        if ($apiKey) {
            try {
                $res = Http::get('https://maps.googleapis.com/maps/api/distancematrix/json', [
                    'origins' => $originCoords,
                    'destinations' => $destCoords,
                    'key' => $apiKey,
                    'mode' => 'driving'
                ]);

                if ($res->successful()) {
                    $data = $res->json();
                    if (isset($data['rows'][0]['elements'][0]['distance']['value'])) {
                        $distance = $data['rows'][0]['elements'][0]['distance']['value'] / 1000;
                        Log::info('Google API distance', ['distance_km' => $distance]);
                        return $distance;
                    }
                }
            } catch (\Exception $e) {
                Log::error('Google API failed', ['error' => $e->getMessage()]);
            }
        }

        // Fallback to Haversine formula with adjustment factor
        $distance = $this->calculateHaversineDistance($originCoords, $destCoords) * 1.4;
        Log::info('Haversine distance', ['distance_km' => $distance]);
        return $distance;
    }

    protected function calculateHaversineDistance(string $origin, string $destination): float
    {
        [$lat1, $lng1] = array_map('floatval', explode(',', $origin));
        [$lat2, $lng2] = array_map('floatval', explode(',', $destination));

        $R = 6371; // Earth radius in km

        $dLat = deg2rad($lat2 - $lat1);
        $dLng = deg2rad($lng2 - $lng1);

        $a = sin($dLat / 2) ** 2 +
            cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
            sin($dLng / 2) ** 2;

        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        return $R * $c;
    }

    public function getTripSummary(Trip $trip): array
    {
        return [
            'pickup' => $trip->origin_url,
            'destination' => $trip->destination_url,
            'pickup_coords' => $trip->origin_lat && $trip->origin_lng
                ? "{$trip->origin_lat},{$trip->origin_lng}"
                : 'NO_COORDINATES',
            'destination_coords' => $trip->destination_lat && $trip->destination_lng
                ? "{$trip->destination_lat},{$trip->destination_lng}"
                : 'NO_COORDINATES',
            'price' => $trip->price,
            'distance' => $trip->distance,
            'eta' => $trip->eta,
            'has_real_coordinates' => $this->tripHasValidCoordinates($trip)
        ];
    }
}