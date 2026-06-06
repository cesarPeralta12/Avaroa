<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Quotation>
 */
use App\Models\Quotation;
use App\Models\Product;

class QuotationFactory extends Factory {
    protected $model = Quotation::class;

    public function definition() {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'message' => $this->faker->sentence(),
            'products' => json_encode(Product::inRandomOrder()->take(3)->pluck('id')->toArray()),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
