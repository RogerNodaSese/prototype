@extends('layouts.app')

@section('content')
    
<div class="container" style="padding:0;margin:0;">

    <header style="margin-left: 6em; margin-top:20px">
        <h2>{{ $thesis->title }}</h2>
        <a href="{{ asset('/file_storage//'.$thesis->file) }}" target="_blank"><small>{{ $thesis->file }}</small></a>
    </header>
    
</div>
<div class="d-flex mt-4">
    <div class="col-8" style="margin-left:70px;">
        <div class="card">
            
         <div class="card-body">
            <h6 class="font-weight-bold">Abstract</h6>
            <p> {{ $thesis->abstract }} </p>
            <p><small><b>Publisher:</b> {{ $thesis->publisher }}</small></p>
            <div>
            <p class="d-inline"><small><b>Author/s:</b></small></p> 
            @foreach ($thesis->authors as $author)
            
            <p class="d-inline p-2"><small>{{ $author->last_name }}, {{ $author->first_name }}</small></p>
            @endforeach
            </div>
            <div>
            <p class="d-inline"><small><b>Keyword/s:</b></small></p> 
            @foreach ($thesis->keywords as $keyword)
            <p class="d-inline"><small>{{ $keyword->name }};</small></p>
            @endforeach
            </div>
            
            
             
              
         </div>  
         
        
        </div>
    </div>
    <div class="col-3" style="margin-left:20px;">
        <div class="form-group d-flex">
            <input type="text" class="form-control w-75 mr-2" style="border:1px solid #73DD78;" placeholder="">
            <button type="submit" class="form-control w-25" style="border:1px solid #73DD78;">Search</button>
        </div>
        <div class="card" >
            <div class="card-header text-center">Filter</div>
            <div class="card-body">
                <p><small>Author</small></p>
                <hr>
                <p><small>Title</small></p>
                <hr>
                <p><small>Subjects</small></p>
            </div>
        </div>  
        <div class="card mt-2" >
            <div class="card-header text-center">Most searched</div>
            <div class="card-body">
                <p><small>Data here..</small></p>
                <hr>
                <p><small>Data here..</small></p>
                <hr>
                <p><small>Data here..</small></p>
            </div>
        </div>  
    </div>
</div>
@endsection