@extends('layouts.app')

@section('content')
    
<div class="container" style="padding:0;margin:0;">

    <header style="margin-left: 6em; margin-top:20px">
        <h1>Thesis Archiving</h1>
        <h5>Thesis collection of New Era University</h5>
    </header>
    
</div>
<div class="d-flex mt-4">
    <div class="col-8" style="margin-left:70px;">
        <div class="card">
            @foreach ($theses as $thesis)
         <div class="card-body">
            <h2><a href="thesis/{{ $thesis->id }}" style="text-decoration: none;color:black"> {{ $thesis->title }}</a></h2>
            @foreach ($thesis->authors as $author)
              <p><small class="text-muted">{{ $author->last_name }}, {{ $author->first_name }};</small></p>
              <div  style="max-width: 100%;">
              
              
              @endforeach
           
              <p class="col-md-12 text-truncate">{{ $thesis->abstract }}</p></div>
             
            <hr>
            </div>  
         @endforeach
         <div class="d-flex justify-content-center">
         {{ $theses->links() }}
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