<?php

namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Session;
use Illuminate\Support\Facades\Response;

class ImageManager
{
    

    public static function upload(string $dir, string $imageName, $image = null)
    {
        if ($image != null) {
            if (!Storage::disk('public')->exists($dir)) {
                Storage::disk('public')->makeDirectory($dir);
            }
            Storage::disk('public')->put($dir . $imageName, file_get_contents($image));
        } else {
            $imageName = '';
        }

        return $imageName;
    }

    public static function update(string $dir, $old_image, string $imageName, $image = null)
    {
        if (Storage::disk('public')->exists($dir . $old_image)) {
            Storage::disk('public')->delete($dir . $old_image);
        }
        $imageName = ImageManager::upload($dir, $imageName, $image);
        return $imageName;
    }

    public static function delete($full_path)
    {
        $flag= 0;
        if (Storage::disk('public')->exists($full_path)) {
            Storage::disk('public')->delete($full_path);
            $flag = 1;
        }

        return $flag;

    }

    public static function renameFile(string $oldDir, $newDir, string $oldFileName, string $newFileName)
    {
        $oldFilePath = $oldDir . $oldFileName;
        $newFilePath = $newDir . $newFileName;
        // Check if the old file exists
        if (Storage::disk('public')->exists($oldFilePath)) {
            // Rename the file
            Storage::disk('public')->move($oldFilePath, $newFilePath);
            return $newFileName;
        } else {
            // Old file doesn't exist, return null or throw an exception
            return null;
        }


    }
    public static function readFilesInFolder(string $dir)
    {
        $files = [];
        $dir = "storage/" . $dir;
        // Check if the directory exists
        if (is_dir(public_path($dir))) {
            // Read all files in the directory
            $files = scandir(public_path($dir));
            // Remove "." and ".." entries from the array
            $files = array_diff($files, array('.', '..'));
        }

        return $files;
    }



   
    public static function getPath(string $firstDir = null, string $secondDir = null): string
    {
       

       $dirPath ="public/";

        // Append the first directory if provided
        if ($firstDir) {
            $dirPath .= $firstDir . "/";
        }

        // Append the second directory if provided
        if ($secondDir) {
            $dirPath .= $secondDir . "/";
        }

        return $dirPath;
    }

    public static function getFullPath(string $firstDir = null, string $secondDir = null): string
    {
        // Get the subdomain from the session
        $public = public_path('storage/');
        $dirPath ="public/";

        // Append the first directory if provided
        if ($firstDir) {
            $dirPath .= $firstDir . "/";
        }

        // Append the second directory if provided
        if ($secondDir) {
            $dirPath .= $secondDir . "/";
        }

        return $public.$dirPath;
    }
    public static function download(string $dir, string $fileName)
    {
        // Sanitize directory and file name to prevent directory traversal
        $dir = rtrim(preg_replace('/[^a-zA-Z0-9_\-\/]/', '', $dir), '/');
        $fileName = preg_replace('/[^a-zA-Z0-9_\-\.]/', '', $fileName);
    
        $filePath = $dir . '/' . $fileName;
    
        // Check if the file exists in the specified directory
        if (Storage::disk('public')->exists($filePath)) {
            // Get the file's MIME type
            $mimeType = Storage::disk('public')->mimeType($filePath);
    
            // Get the file content
            $fileContent = Storage::disk('public')->get($filePath);
    
            // Return the file as a response for download with appropriate headers
            return Response::make($fileContent, 200, [
                'Content-Type' => $mimeType,
                'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
                'Content-Length' => Storage::disk('public')->size($filePath),
            ]);
        } else {
            // Handle the case where the file does not exist
            abort(404, 'File not found.');
        }
    }



}