@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <form action="{{ route('store') }}" enctype='multipart/form-data' method="POST">
        @csrf
        <div class="form-group row mb-2">
          <label for="staticEmail" class="col-sm-2 col-form-label">Author/s</label>
          <div class="col-sm-4 d-inline mb-2">
            <input type="text" class="form-control @error('lastname') border border-danger @enderror" id="staticEmail" value="{{ old('lastname') }}" name="lastname" placeholder="Lastname">
            @error('lastname')
                <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          <div class="col-sm-4 d-inline mb-2">
            <input type="text" class="form-control @error('firstname') border border-danger @enderror " id="staticEmail" value="{{ old('firstname') }}" name="firstname" placeholder="Firstname">
            @error('firstname')
                <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          <div class="col-md-4 col-lg-2 form-group mb-2">
            <a class="btn btn-light border form-control" ><small>+ ADD MORE</small></a>
          </div>
        </div>
        <div class="form-group row mb-2">
          <label for="inputPassword" class="col-sm-2 col-form-label">Title</label>
          <div class="col-sm-8 mb-2">
            <input type="text" class="form-control @error('title') border border-danger @enderror" value="{{ old('title') }}" name="title" id="inputPassword" placeholder="Thesis title">
            @error('title')
                <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
        </div>
        <div class="form-group row mb-2">
            <label for="staticEmail" class="col-sm-2 col-form-label">Date of issue</label>
            <div class="col-sm-3 d-inline mb-2">
                <select class="custom-select" name="month" id="month">
                    <option value="" selected data-default>Month</option>
                </select>
            </div>
            <div class="col-sm-2 d-inline mb-2">
                <select class="custom-select" name="day" id="day">
                    <option value="" selected data-default>Day</option>
                </select>
            </div>
            <div class="col-sm-3 d-inline mb-2">
                <select class="custom-select " name="year" id="year">
                    <option value="" selected data-default>Year</option>
                </select>
            </div>
        </div>
        <div class="form-group row mb-2">
            <label for="inputPassword" class="col-sm-2 col-form-label">Publisher</label>
            <div class="col-sm-8 mb-2">
              <input type="text" class="form-control @error('publisher') border border-danger @enderror" value="{{ old('publisher') }}" name="publisher" placeholder="Publisher name">
              @error('publisher')
                  <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
          </div>
          <div class="form-group row mb-2">
            <label for="inputPassword" class="col-sm-2 col-form-label ">Subject</label>
            <div class="col-sm-8 mb-2">
              <input type="text" class="form-control @error('subject') border border-danger @enderror" value="{{ old('subject') }}" name="subject" id="inputPassword" placeholder="Thesis subject">
              @error('subject')
                  <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
          </div>
          <div class="form-group row mb-2">
            <label for="inputPassword" class="col-sm-2 col-form-label">Keyword/s</label>
            <div class="col-sm-8 mb-2">
              <input type="text" class="form-control @error('keywords') border border-danger @enderror" value="{{ old('keywords') }}" name="keywords" id="inputPassword" placeholder="ex: Archiving, Management">
              <small class="blockquote-footer">Comma seperated value</small>
              @error('keywords')
                  <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
          </div>
          <div class="form-group row mb-2">
            <label for="inputPassword" class="col-sm-2 col-form-label">Abstract</label>
            <div class="col-sm-8 mb-2">
              <textarea class="form-control @error('abstract') border border-danger @enderror" rows="5" name="abstract" id="inputPassword">{{ old('abstract') }}</textarea>
              @error('abstract')
                  <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">File</label>
            <div class="col-sm-10">
              <input type="file" class="form-control-file col-sm-4" style="margin-left:-15px;" name="thesis" id="inputPassword">
              @error('thesis')
                <small class="text-danger col-sm-4" style="margin-left:-15px;">{{ $message }}</small>
            @enderror
            </div>
            </div>
            <div class="col-md-4 col-lg-2 form-group ml-auto" style="">
                <button type="submit"  class="btn btn-primary form-control" id="inputPassword">SUBMIT</button>
              </div>
            </div>
          </div>
          
        </div>
      </form>
</div>
@endsection