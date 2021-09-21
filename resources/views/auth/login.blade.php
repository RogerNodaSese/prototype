@extends('layouts.app')
@section('content')


<div class="container mt-5 w-50">
  <div class="form-group row ">
      <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
      <div class="col-sm-10">
        <input type="email" name="email" class="form-control " id="staticEmail" placeholder="Email">
        @error('email')
            <small class="text-danger">{{ $message }}</small>
        @enderror
      </div>
  </div>
  <div class="form-group row ">
    <label for="staticEmail" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="email" name="email" class="form-control " id="staticEmail" placeholder="Password">
      @error('email')
          <small class="text-danger">{{ $message }}</small>
      @enderror
    </div>
</div>
  <div class="row">
      <div class="col-md-4 col-lg-2 form-group ml-auto">
      <div class="spinner-border text-success invisible position-absolute ml-4" role="status">
      </div>     
      <button type="submit" id="btn" class="btn btn-light btn-outline-dark form-control"><small>LOGIN</small></button>
      </div>
  </div>
</div>
@endsection