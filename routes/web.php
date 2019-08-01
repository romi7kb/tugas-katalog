<?php



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
    return view('index', [
        'a' => true
    ]);
});
Route::get('/crud/{produc}', 'crudController@ubah');
Route::get('/crud', 'crudController@crud');
Route::get('/produc', 'producController@tampil');
Route::delete('/crud/delete{produc}', 'crudController@delete');
Route::post('/crud', 'crudController@tambah');
Route::post('/crud/{produc}', 'crudController@ubah2');
