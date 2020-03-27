<?php

use App\estudiante;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::resource('estudiante', 'estudianteController');
Route::resource('estudiantes.materias', 'estudianteMateriaController', ['only' => ['index']]);
Route::resource('docente', 'docenteController');
Route::resource('docente.materias', 'docenteMateriaController', ['only' => ['index']]);


Route::resource('materia', 'materiaController');
Route::resource('materia.estudiante', 'materiaEstudianteController', ['only' => ['index']]);