@extends('layouts.master')
@section('content')
<h1 class="h3 mb-3 fw-normal">Image upload</h1>   
<form class="row g-3" action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
@csrf
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" name="email" class="form-control" id="inputEmail4">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="inputPassword4">
  </div>
  <div class="col-6">
    <label for="inputAddress" class="form-label">Address</label>
    <input type="text" name="address" class="form-control" id="inputAddress" placeholder="1234 Main St">
  </div>
  <div class="col-6">
    <label for="formFile" class="form-label">Image Upload</label>
    <input type="file" class="form-control" id="formFile" name="profileimg">
    
  </div>
 
  
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>
 @endsection