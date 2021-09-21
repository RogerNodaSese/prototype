<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thesis;
use App\Models\Author;
use App\Models\Keyword;
use Carbon\Carbon;
use App\Http\Requests\StoreThesisRequest;
class ThesesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreThesisRequest $request)
    {
    
        $file = $request->file('thesis');
        $destinationPath = 'file_storage/';
        $originalFile = $file->getClientOriginalName();
        $filename= Carbon::now()->isoFormat(date('wdymHisg')) .$originalFile;
        $file->move($destinationPath, $filename);


        $keywords = explode(',',$request->keywords);

       

        $author = Author::create([
           'last_name' => $request->lastname,
           'first_name' => $request->firstname,

       ]); 

        $thesis = Thesis::create([
            'title' => $request->title,
            'publisher' => $request->publisher,
            'subject' => $request->subject,
            'abstract' => $request->abstract,
            'file' => $filename,
        ]);
       
        foreach ($keywords as $data){
        $keyword = new Keyword();
        $keyword->name = $data;
        $thesis->keywords()->save($keyword);
       }
        

        $thesis->authors()->attach($author);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $thesis = Thesis::with(['authors' => function($query){
        //     $query->select('last_name','first_name');
        // },'keywords' => function($query){
        //     $query->select('name');
        // }])->findOrFail($id);
        $thesis = Thesis::where('id',$id)
        ->with([
            'keywords' => function($query){
                $query->select('thesis_id','name');
            },
            'authors' => function($query){
                $query->select('last_name','first_name');
            }
            ])->firstOrFail();

        return view('thesis')->with('thesis',$thesis);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
