@extends('layouts.app')

@section('content')
<form action="" method="POST">
    @csrf
        <div class="container mt-5 w-50">
        <div class="form-group row ">
            <label for="staticEmail" class="col-sm-3 col-form-label">Name</label>
            <div class="col-sm-4">
              <input type="email" name="email" class="form-control " id="staticEmail" placeholder="Lastname">
              @error('email')
                  <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
            <div class="col-sm-5">
              <input type="email" name="email" class="form-control " id="staticEmail" placeholder="Firstname">
              @error('email')
                  <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
        </div>
        <div class="form-group row ">
          <label for="staticEmail" class="col-sm-3 col-form-label">Password</label>
          <div class="col-sm-9">
            <input type="email" name="email" class="form-control " id="staticEmail" placeholder="Password">
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
        </div>
        <div class="form-group row ">
          <label for="staticEmail" class="col-sm-3 col-form-label">Confirm password</label>
          <div class="col-sm-9">
            <input type="email" name="email" class="form-control " id="staticEmail" placeholder="Confirm password">
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
        </div>
        
        <div class="row">
            <div class="col-md-4 col-lg-2 form-group ml-auto">
            <div class="spinner-border text-success invisible position-absolute ml-4" role="status">
            </div>     
            <button type="submit" id="btn" class="btn btn-light btn-outline-dark form-control"><small>SUBMIT</small></button>
            </div>
        </div>
    </div>
</form>

<script>
$(document).ready(function() {
  $("form").submit(function() {
    $(".spinner-border").removeClass("invisible");
    $(".btn").hide();
  });
});
</script>
@endsection