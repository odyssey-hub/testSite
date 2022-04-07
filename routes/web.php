<?php

use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Auth;
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
    return view('home');
});

Route::get('/clients', function(){
    return view('clients');
});

Route::get('/contact', function (){
    return view('contact');
});

Route::get('/services', function (){
    $services = new \App\Models\Service();
    return view('services', ['services' => $services->all()]);
});

Route::get('/support', function() {
   return view('support');
}) ->name('support');

Route::post('/support', [\App\Http\Controllers\SupportController::class, 'sendData']);

Route::get('/solutions', function () {
    $solutions = new \App\Models\Solution();
    return view('solutions', ['solutions' => $solutions->all()]);
});

Route::post('/solutions/add',  [\App\Http\Controllers\Ajax\SolutionsController::class, 'send']);
Route::post('/solutions/edit', [\App\Http\Controllers\Ajax\SolutionsController::class, 'edit']);
Route::post('/solutions/delete', [\App\Http\Controllers\Ajax\SolutionsController::class, 'delete']);


Route::name('user.') -> group(function(){


    Route::view('/private', 'private') -> middleware('auth')->name('private');

    Route::get('/login', function () {
        if (Auth::Check()){
            return redirect(route('user.private'));
        }
        return view('auth.login');
    }) -> name( 'login');

    Route::post('/login', [\App\Http\Controllers\LoginController::class, 'login']);

    Route::get('/registration', function() {
       return view('auth.registration');
    }) -> name('registration');




    Route::get('/logout', function(){
       Auth::logout();
       return redirect('/');
    }) -> name('logout');

    Route::post('/registration', [\App\Http\Controllers\RegisterController::class, 'save']);

});
