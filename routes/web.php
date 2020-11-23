<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\User as User;
use App\Http\Controllers\OAuthController;
  // code...


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

Route::get('callback', [OAuthController::class,'callback']);

Route::get('dashboard', [DashboardController::class,'index'])->name('dashboard');

Route::get('/error', function () {
    return view('error');
})->name('error');
