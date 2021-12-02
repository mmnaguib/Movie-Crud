<?php

namespace App\Http\Controllers\controller;

use App\Http\Controllers\Controller;
use App\Model\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::latest()->paginate(5);
        $count=1;
        return view('movies', compact('movies','count'))->with('i', request()->input('page',1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = ['Action', 'Comdy', 'Biopic', 'Horror', 'Drama'];
        return view('addMovies', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['title'=>'required','genre'=>'required','poster'=>'required|mimes:jpeg,jpg,png,gif|image|max:2048']);
        $imageName = '';
        if($request->poster){
            $imageName = time() . '.' . $request->poster->extension();
            $request->poster->move(public_path('uploads'), $imageName);
        }
        $data = new Movie;
        $data->title = $request->title;
        $data->genre = $request->genre;
        $data->poster = $imageName;
        $data->release_year = $request->year;
        $data->save();

        return redirect()->route('movie.index')->with('success', 'Movie has Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(movie $movie)
    {
        $id = $movie->id;
        $data = $movie::where('id',$id)->get();
        return view('movie', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(movie $movie)
    {
        $genres = ['Action', 'Comdy', 'Biopic', 'Horror', 'Drama'];
        return view('edit',compact('movie','genres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, movie $movie)
    {
        $request->validate(['title'=>'required','genre'=>'required']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(movie $movie)
    {
        //
    }

    public function all(){
        $movies = Movie::get();
        return response()->json($movies);
    }
}
