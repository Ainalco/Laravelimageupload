<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Lib\Fileuploader;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $data = $request->validate([
            'email' => 'required|unique:posts', 
            'password'=>'',
            'address'=>'', 
            'PprofileImage'=>''  
        ], [
            'email.required' => 'Email field is required.',  
            'email.unique' => 'Email field is unique.',          
        ]);
       
        
           $fileuploader_lib = new Fileuploader();

           $prefix_name = time().'-PIC-';
           $upload_path = 'uploads/';
           $heightsize = 200;
           $widthsize = 200;
           $picture = $fileuploader_lib->fileupload($request, $prefix_name, $upload_path, $heightsize, $widthsize);
           $data['PprofileImage']=$picture;
           $newpost=Post::create($data);  
           return back()->with('success', 'Post Added successfully.');
        }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
