<?php
namespace App\Lib;
use Illuminate\Http\Request;
use Image;

class Fileuploader{

public $key='Test Key';

  function test(){
    return $this->key;
  }

  // ============== its for for single file upload with resize ===========
  function fileupload($request, $prefix_name, $upload_path, $heightsize, $widthsize){
    //dd($request);
    if ($request->file('profileimg')) {
     $image = $request->file('profileimg');

      $filenamewithextension = $image->getClientOriginalName();
      //get filename without extension
      $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
      //get file extension
      $extension = $image->getClientOriginalExtension();
      //filename to store
      $picturename = $filename.'_'.uniqid().'.'.$extension;

      // $picturename = $prefix_name. $image->getClientOriginalName().'.'.$image->extension();

    //   $filePath = public_path('/uploads/newsevents/');
      $filePath = public_path($upload_path);

      //$filePath =$upload_path;
      //$image_path = $request->file('image')->store('image', 'public');
      $img = Image::make($image->path());
      // dd($image->path());
      $img->resize($widthsize,$heightsize, function ($const) {
          // $const->aspectRatio();
      })->save($filePath.'/'.$picturename);
      $picture = $upload_path.$picturename;
  } else {
      $picture = '';
  }
    return $picture;
  }

  // ============== its for multiple file upload =============
  public function multiple_fileupload($request){
    if ($request->hasFile('otherspicture')) {

      foreach($request->file('otherspicture') as $file){

          //get filename with extension
          $filenamewithextension = $file->getClientOriginalName();

          //get filename without extension
          $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

          //get file extension
          $extension = $file->getClientOriginalExtension();

          //filename to store
          $picturename = $filename.'_'.uniqid().'.'.$extension;
          // dd($filenametostore);
          // Storage::put('public/uploads/newsevents/'. $filenametostore, fopen($file, 'r+'));
          // Storage::put('public/uploads/newsevents/'. $filenametostore, fopen($file, 'r+'));

          // //Resize image here
          // $thumbnailpath = public_path('uploads/newsevents/'.$filenametostore);
          // $img = Image::make($thumbnailpath)->resize(400, 200, function($constraint) {
          //     // $constraint->aspectRatio();
          // });
          // $img->save($thumbnailpath);
            // ===================================
          // $image = $request->file('picture');

          // $picturename = $prefix_name. $image->getClientOriginalName().'.'.$image->extension();
          // echo 'A'; print_r($file->path()); echo 'B'; die();
          $filePath = public_path('/images');
          $img = Image::make($file->path());
          // dd($img);
          $img->resize(500,300, function ($const) {
              // $const->aspectRatio();
          })->save($filePath.'/'.$picturename);
          $others_pictures = $filePath.$picturename;

      }

      return $others_pictures;
      // return redirect('image')->with('success', "Image(s) uploaded successfully.");
  }
  }

}
