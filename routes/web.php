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

// Route::get('/dashboard', function () {
//     return view('admin.dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => ['auth']], function (){
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
});

Route::group(['middleware' => ['auth', 'role:candidate']], function (){
    Route::get('/dashboard/profile', 'DashboardController@profile')->name('dashboard.profile');
});

require __DIR__.'/auth.php';
