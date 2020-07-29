<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie as Movie;

class MovieController extends Controller
{
    //función de listado
    public function index(){
        $movies = Movie::all();
        return \View::make('list',compact('movies'));
    }
    // función del formulario
    public function create()
    {
        return \View::make('new');
    }
    // formulario de editar
    public function edit($id)
    {
        $movie = Movie::find($id);
        return \View::make('update',compact('movie'));
    }
    // función de actualización
    public function update(Request $request)
    {
        $movie = Movie::find($request->id);
        $movie->name = $request->name;
        $movie->description = $request->description;
        $movie->save();
        return redirect('movie');
    }

    public function store(Request $request)
    {
        $movie = new Movie;
        $movie->name = $request->name;
        $movie->description = $request->description;
        $movie->save();
        // $movie = new Movie;
        // $movie->create($request->all());
        return redirect('movie');

    }
    public function search(Request $request){
        $movies = Movie::where('name','like','%'.$request->name.'%')->get();
        return \View::make('list', compact('movies'));

    }
    public function destroy($id)
    {
        $movie = Movie::find($id);
        $movie->delete();
        return redirect()->back();
    }
}
