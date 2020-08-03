<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
 * Rutas por método
 */
Route::get('rutas/', function () {
    return '/rutas vía get';
});

Route::post('rutas/', function () {
    return '/rutas vía post';
});

Route::put('rutas/', function () {
    return '/rutas vía put';
});

Route::delete('rutas/', function () {
    return '/rutas vía delete';
});

/*
 * Paso de parámetros
 */
Route::get('params/{id}', function ($id) {
    return 'Param '.$id;
});
// Varios parámetros
Route::get('params/{mes}/{dia}', function ($mes, $dia) {
    return 'Param mes:'.$mes."- dia:". $dia;
});
// Parámetros Opcionales
Route::get('params-opc/{mes?}', function ($mes="ns") {
    return 'Param mes:'.$mes;
});
// Constraints
Route::get('valida/{name}', function ($name) {
    return 'Param name:'.$name;
})->where('name', '[A-Za-z]+');
// Rutas nombradas
Route::get('named', function () {
    return "Named Route";
})->name('named');
// Redirecciones
Route::get('redir-named', function () {
    // calculo de ruta
    $url = route('named');
    // redirección a ruta
    return redirect()->route('named');
});
// Redirección por URL
Route::redirect('/', '/home');
// Prefijos
Route::prefix('prefijo')->group(function () {
    Route::get('ruta', function () {
        // /prefijo/ruta
        return "prefijo/ruta";
    });
});

// Rutas de Controladores
Route::get('example/', 'ExampleController@show');
// Rutas a anidados
Route::get('example/anidado', 'Anidados\AnidadoController@show');
// Manejo de la petición desde controladores
Route::get('pcontroller/', 'ParamsController@index');
Route::post('pcontroller/', 'ParamsController@add');
Route::put('pcontroller/', 'ParamsController@update');
Route::post('pcontroller/name', 'ParamsController@formProcess');
Route::post('pcontroller/nameJson', 'ParamsController@dameJson');

# Manejo de BBDD
Route::get('users/', 'UserController@index');
# Eloquent ORM
//rutas para el recurso movie
Route::resource('movie','MovieController');
//una nueva ruta para eliminar registros con el metodo get
Route::get('movie/destroy/{id}', ['as' => 'movie/destroy', 'uses'=>'MovieController@destroy']);
//ruta para realizar busqueda de registros.
Route::post('movie/search', ['as' => 'movie/search', 'uses'=>'MovieController@search']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
