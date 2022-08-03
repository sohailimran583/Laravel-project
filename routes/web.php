<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;


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

Route::prefix('admin')->group(function(){
Route::view('/','welcome');
Route::get('/home',[HomeController::class ,'index']);
Route::get('/contact',[HomeController::class ,'contact'])->name('home.contact')->middleware('can:contact.secret');

Route::resource('/posts',PostController::class);

});

//
// Route::get('/fun/response',function() use($posts){
//     return response()->download(public_path('/so.jpg'));
//     // ->header('Content-Type','application/json')
//     // ->cookie('MyCookoies',"cookies name sohail imran",'3600');
// })->name('response.fun');


Auth::routes();
