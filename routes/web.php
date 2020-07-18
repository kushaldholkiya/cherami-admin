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

use \Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/create-role/{name}', function (Request $request){
    $role = Role::create(['name' => $request->name]);
    dd($role);
});

Route::get('/assign-role/{name}', function (Request $request){
    return \Illuminate\Support\Facades\Auth::user()->assignRole($request->name);
})->middleware(['auth']);

Route::get('/admin','AdminController@index')->name('Dashboard');

Route::get('/quick-search', 'PagesController@quickSearch')->name('quick-search');

Route::resource('/admin/influencers','InfluencersController');

