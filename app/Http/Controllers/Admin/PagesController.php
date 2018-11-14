<?php
namespace App\Http\Controllers\Admin;
ini_set('max_execution_time', 900000);



use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Page;

class PagesController extends Controller{

  public function index(){
    return view('admin.geracoes.index');
  }

  public function uploadFile(Request $request){
    if ($request->input('submit') != null ){

      $file = $request->file('file');

      // File Details
      $filename = $file->getClientOriginalName();
      $extension = $file->getClientOriginalExtension();
      $tempPath = $file->getRealPath();
      $fileSize = $file->getSize();
      $mimeType = $file->getMimeType();

      // Valid File Extensions
      $valid_extension = array("csv");

      // 2MB in Bytes
      $maxFileSize = 9097152;

      // Check file extension
      if(in_array(strtolower($extension),$valid_extension)){

        // Check file size
        if($fileSize <= $maxFileSize){

          // File upload location
          $location = 'uploads';

          // Upload file
          $file->move($location,$filename);

          // Import CSV to Database
          $filepath = public_path($location."/".$filename);

          // Reading file
          $file = fopen($filepath,"r");

          $importData_arr = array();
          $i = 0;

          while (($filedata = fgetcsv($file, 1000, ";")) !== FALSE) {
             $num = count($filedata );

             if($i < 4){
                $i++;
                continue;
             }
             for ($c=0; $c < $num; $c++) {
                $importData_arr[$i][] = $filedata [$c];
             }
             $i++;
          }
          fclose($file);

          // Insert to MySQL database
          foreach($importData_arr as $importData){

            $new = str_replace(".", "", $importData[5]);
            $new2 = str_replace(",", ".", $new);

            $insertData = array(
               "COL1"=>$importData[0],
               "COL2"=>$importData[1],
               "COL3"=>$importData[2],
               "COL4"=>$importData[3],
               "COL5"=>$importData[4],
               "COL6"=>$new2,
               "COL7"=>$importData[6],
  );
            Page::insertData($insertData);

          }

          Session::flash('message','Import Successful.');
        }else{
          Session::flash('message','File too large. File must be less than 2MB.');
        }

      }else{
         Session::flash('message','Invalid File Extension.');
      }

    }

    // Redirect to index
    return redirect()->route('geracoes.index');
  }
}
