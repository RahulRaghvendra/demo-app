<?php
namespace App\Http\Controllers;

use App\Helpers\ImageManager;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Schema;

class CommonController extends Controller
{
    public function getImage($filename, $folder)
    {
        $path = Storage::disk('public')->path("/" . $folder . "/" . $filename);
        $file = File::get($path);
        $type = File::mimeType($path);
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
        return $response;
    }

    public function downloadFile($dir, $fileName)
    {
        return ImageManager::download($dir, $fileName);
    }

    public function getColumn($table,$show=null)
{
    // Get all column names of a table
    $columns = Schema::getColumnListing($table);

    // Build the string of column names
    $strCol = "'".$table."_fields'=>array(";
    $lastColumn = end($columns); // Get the last column name

    foreach ($columns as $column) {
        if($show ==1)
      echo $var = "{{\$".$column."}}<br>";

      if($show ==2)
      echo $var = "\$".$column."<br>";

      if($show ==3)
      echo $var = 'value="{{$'.$column.'}}"<br>';


        $strCol .= "'".$column . "'";
        
        // Add comma if it's not the last column
        if ($column !== $lastColumn) {
            $strCol .= ",";
        }
    }
    
    $strCol .= "),";

    echo $strCol;
}  
}