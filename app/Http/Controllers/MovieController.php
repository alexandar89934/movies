<?php

namespace App\Http\Controllers;

use App\Models\Movie;
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
       $movies = Movie::orderBy('id','asc')->paginate(5);
       return view('movies.index')->with('movies',$movies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => ['required', 'string', 'max:255'],
            'genre' => ['required', 'string', 'max:255'],
            'director' => ['required', 'string', 'max:255'],
            'published_at' => ['required', 'date'],
            'storyline' => ['required', 'string', 'max:1000']

        ]);

        $movie = new Movie();
        $movie->title = $request->title;
        $movie->genre = $request->genre;
        $movie->director = $request->director;
        $movie->published_at = $request->published_at;
        $movie->storyline = $request->storyline;

        
        $movie->save();


        return view('movies.show', compact('movie'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Movie::findOrFail($id);

        return view('movies.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie = Movie::findOrFail($id);

        return view('movies.edit', compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $movie = Movie::findOrFail($id);
        $this->validate($request, [
            'title' => ['required', 'string', 'max:255'],
            'genre' => ['required', 'string', 'max:255'],
            'director' => ['required', 'string', 'max:255'],
            'published_at' => ['required', 'date'],
            'storyline' => ['required', 'string', 'max:1000']

        ]);

        $movie->title = $request->title;
        $movie->genre = $request->genre;
        $movie->director = $request->director;
        $movie->published_at = $request->published_at;
        $movie->storyline = $request->storyline;

        
        $movie->update();

        return view('movies.show', compact('movie'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();
        return redirect('/');
    }
}
