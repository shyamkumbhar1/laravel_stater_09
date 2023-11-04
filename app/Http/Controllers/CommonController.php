<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CommonController extends Controller
{
    public function fileOpen()
    {
        $sourceFilePath = 'J:\Laragon\www\laravel_stater_09\app\Http\Controllers\ContactUsFormController.php'; // Replace with the source file path
$destinationFilePath = 'J:\Laragon\www\laravel_stater_09\file.php'; // Replace with the destination file path

if (Storage::exists($sourceFilePath)) {
    // Copy the contents from the source file to the destination file
    Storage::copy($sourceFilePath, $destinationFilePath);

    // You can also delete the source file after copying, if needed
    // Storage::delete($sourceFilePath);

    echo "File copied successfully.";
} else {
    echo "Source file does not exist.";
}
    }
}
