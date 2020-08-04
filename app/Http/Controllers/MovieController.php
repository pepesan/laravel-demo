<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie as Movie;
use App\Http\Requests\MovieRequest;
use Illuminate\Support\Facades\Validator;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        // coge el listado de pelis
        $movies = Movie::all();
        // presenta el listado
        return \View::make('list',compact('movies'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \View::make('new');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MovieRequest $request)
    {
        // define un objeto
        $movie = new Movie;
        // relleno el objeto
        $movie->name = $request->name;
        $movie->description = $request->description;
        // guardo el objeto
        $movie->save();
        // $movie = new Movie;
        // $movie->create($request->all());
        // redirecciono al listado
        return redirect('movie');

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // coge los datos del objeto por id
        $movie = Movie::find($id);
        // presenta el formulario
        return \View::make('show',compact('movie'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // coge los datos del objeto por id
        $movie = Movie::find($id);
        // presenta el formulario
        return \View::make('update',compact('movie'));
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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('movie/'.$id.'/edit')
                ->withErrors($validator)
                ->withInput();
        }
        // coge los datos del objeto
        $movie = Movie::find($request->id);
        // rellena los cambios del objeto
        $movie->name = $request->name;
        $movie->description = $request->description;
        // guarda los cambios
        $movie->save();
        // redirecciona al listado
        return redirect('movie');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // busca el objeto por id
        $movie = Movie::find($id);
        // borra el objeto
        $movie->delete();
        // redirecciona atrás en el histórico
        return redirect()->back();
    }
    // función que busca por criterio
    public function search(Request $request){
        $movies = Movie::where('name','like','%'.$request->name.'%')->get();
        return \View::make('list', compact('movies'));

    }
}
