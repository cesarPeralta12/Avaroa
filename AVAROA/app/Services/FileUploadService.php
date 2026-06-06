<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class FileUploadService
{
    /**
     * Upload file to public/uploads directory
     */
    public function upload(UploadedFile $file, string $folder): string
    {
        $folder = trim($folder, '/');
        
        // Final destination: public_html/public/uploads/{folder}
        $destination = public_path("uploads/{$folder}");
        
        Log::info('Upload destination: ' . $destination);

        // Create directory if not exists
        if (!File::exists($destination)) {
            File::makeDirectory($destination, 0775, true, true);
            Log::info('Created directory: ' . $destination);
        }

        // Generate unique filename
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '-' . Str::random(10) . '.' . $extension;
        
        Log::info('Filename: ' . $filename);

        // Move file
        $file->move($destination, $filename);
        
        // Verify file was moved
        $fullPath = $destination . '/' . $filename;
        if (!File::exists($fullPath)) {
            throw new \Exception('File was not moved successfully to: ' . $fullPath);
        }
        
        Log::info('File moved to: ' . $fullPath);

        // Return relative path (stored in DB)
        return "uploads/{$folder}/{$filename}";
    }
public function update(UploadedFile $file, ?string $oldPath, string $folder): string
    {
        // Delete old file if exists
        if ($oldPath && file_exists(public_path($oldPath))) {
            unlink(public_path($oldPath));
        }

        // Upload new file
        return $this->upload($file, $folder);
    }
    /**
     * Delete file
     */
    public function delete(?string $path): bool
    {
        if (!$path) return false;
        
        $fullPath = public_path($path);
        
        if (File::exists($fullPath)) {
            return File::delete($fullPath);
        }

        return false;
    }

    /**
     * Get public URL
     */
    public static function getUrl(?string $path): ?string
    {
        if (!$path) return null;

        // If already a full URL, return as-is
        if (filter_var($path, FILTER_VALIDATE_URL)) {
            return $path;
        }

        // Return asset URL
        return asset($path);
    }
}