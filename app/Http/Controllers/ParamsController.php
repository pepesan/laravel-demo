<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ParamsController extends Controller
{
    public function index(Request $request)
    {
        $uri = $request->path();
        $method= $request->method();
        $fullUrl= $request->fullUrl();
        $url = $request->url();
        return "/".$uri." ".$method;
    }
    public function add (Request $request){
        $all= $request->all();
        return $all;
    }
    public function update (Request $request){
        $name = $request->input('name', "Valor predefinido");
        return $name;
    }
    public function formProcess (Request $request){
        $name = $request->name;
        return $name;
    }
    public function dameJson (Request $request){
        $name = $request->input('user.name');
        return $name;
    }
}
