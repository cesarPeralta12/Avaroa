<?php


namespace App\Traits;



use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


trait ImageSaveTrait
{
    private function saveImage($destination, $file): ?string
{
    // Ensure the directory exists
    $path = public_path('uploads/' . $destination);
    if (!File::isDirectory($path)) {
        File::makeDirectory($path, 0755, true); // Use more restrictive permissions
    }

    // Check if $file is a valid instance of UploadedFile
    if (!$file instanceof \Illuminate\Http\UploadedFile) {
        Log::error('Invalid file uploaded.');
        return null; // Handle this case as per your needs
    }

    // Generate unique filename
    $file_name = time() . '-' . Str::random(10) . '.' . $file->getClientOriginalExtension();

    // Move uploaded file to the destination directory
    $file->move($path, $file_name);

    // Return the path to the image
    return 'uploads/' . $destination . '/' . $file_name;
}





    private function updateImage($destination, $new_attribute, $old_attribute): string
    {
        // Ensure the directory exists
        if (!File::isDirectory(public_path('uploads/' . $destination))) {
            File::makeDirectory(public_path('uploads/' . $destination), 0755, true, true);
        }


        $file_name = time() . Str::random(10) . '.' . $new_attribute->extension();
        $path = 'uploads/' . $destination . '/' . $file_name;
        $new_attribute->move(public_path('uploads/' . $destination), $file_name);
        File::delete($old_attribute);
        return $path;


        // Save the image without resizing
        $file_extension = $new_attribute->getClientOriginalExtension();
        $file_name = time() . '-' . Str::random(10) . '.' . $file_extension;
        $returnPath = 'uploads/' . $destination . '/' . $file_name;

        // Move uploaded file to the destination directory
        $new_attribute->move(public_path('uploads/' . $destination), $file_name);
        File::delete($old_attribute);

        return $returnPath;
    }


    /*
     * uploadFile not used
     */
    private function uploadFile($destination, $attribute)
    {
        if (!File::isDirectory(base_path() . '/public/uploads/' . $destination)) {
            File::makeDirectory(base_path() . '/public/uploads/' . $destination, 0777, true, true);
        }

        $file_name = time() . Str::random(10) . '.' . $attribute->extension();
        $path = 'uploads/' . $destination . '/' . $file_name;

        try {
            if (env('STORAGE_DRIVER') == 's3') {
                $data['is_uploaded'] = Storage::disk('s3')->put($path, file_get_contents($attribute->getRealPath()));
            } else if (env('STORAGE_DRIVER') == 'wasabi') {
                $data['is_uploaded'] = Storage::disk('wasabi')->put($path, file_get_contents($attribute->getRealPath()));
            } else if (env('STORAGE_DRIVER') == 'vultr') {
                $data['is_uploaded'] = Storage::disk('vultr')->put($path, file_get_contents($attribute->getRealPath()));
            } else {
                $attribute->move(public_path('uploads/' . $destination . '/'), $file_name);
            }
        } catch (\Exception $e) {
            //
        }

        return $path;
    }

    private function uploadFileWithDetails($destination, $attribute)
    {
        if (!File::isDirectory(base_path() . '/public/uploads/' . $destination)) {
            File::makeDirectory(base_path() . '/public/uploads/' . $destination, 0777, true, true);
        }

        $data['is_uploaded'] = false;

        if ($attribute == null || $attribute == '') {
            return $data;
        }

        $data['original_filename'] = $attribute->getClientOriginalName();
        $file_name = time() . Str::random(10) . '.' . pathinfo($data['original_filename'], PATHINFO_EXTENSION);
        $data['path'] = 'uploads/' . $destination . '/' . $file_name;

        try {
            if (env('STORAGE_DRIVER') == 's3') {
                $data['is_uploaded'] = Storage::disk('s3')->put($data['path'], file_get_contents($attribute->getRealPath()));
                $data['is_uploaded'] = true;
            } else if (env('STORAGE_DRIVER') == 'wasabi') {
                $data['is_uploaded'] = Storage::disk('wasabi')->put($data['path'], file_get_contents($attribute->getRealPath()));
                $data['is_uploaded'] = true;
            } else if (env('STORAGE_DRIVER') == 'vultr') {
                $data['is_uploaded'] = Storage::disk('vultr')->put($data['path'], file_get_contents($attribute->getRealPath()));
                $data['is_uploaded'] = true;
            } else {
                $attribute->move(public_path('uploads/' . $destination . '/'), $file_name);
                $data['is_uploaded'] = true;
            }
        } catch (\Exception $e) {
            Log::info($e->getMessage());
        }

        return $data;
    }

    private function uploadFontInLocal($destination, $attribute, $name)
    {
        if (!File::isDirectory(base_path() . '/public/uploads/' . $destination)) {
            File::makeDirectory(base_path() . '/public/uploads/' . $destination, 0777, true, true);
        }

        $data['is_uploaded'] = false;

        if ($attribute == null || $attribute == '') {
            return $data;
        }

        $data['path'] = 'uploads/' . $destination . '/' . $name;

        try {
            $attribute->move(public_path('uploads/' . $destination . '/'), $name);
            $data['is_uploaded'] = true;
        } catch (\Exception $e) {
            Log::info($e->getMessage());
        }

        return $data;
    }


    private function deleteFile($path)
    {
        if ($path == null || $path == '') {
            return null;
        }

        try {
            if (env('STORAGE_DRIVER') == 's3') {
                Storage::disk('s3')->delete($path);
            } else {
                File::delete($path);
            }
        } catch (\Exception $e) {
            //
        }

        File::delete($path);
    }

    private function deleteVideoFile($path)
    {
        if ($path == null || $path == '') {
            return null;
        }

        try {
            if (env('STORAGE_DRIVER') == 's3') {
                Storage::disk('s3')->delete($path);
            } else {
                File::delete($path);
            }
        } catch (\Exception $e) {
            //
        }

        File::delete($path);
    }
}
