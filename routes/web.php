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
// Route::get('callback', function(Request $request) {
//   try {
//     //get the tokens from eve-online
//     $response = Http::withHeaders([
//     'Content-Type' => 'application/json',
//     'Authorization' => 'Basic '.base64_encode('b72d20af7ccd4b11a7d04b9d73b36bb5:XVr8q1rXQX0rHFYZQCfdKSF3KetZQY2WPIcevb1T'),
// ])->post('https://login.eveonline.com/v2/oauth/token', [
//         'grant_type' => 'authorization_code',
//         'code' => $request->query('code'),
//     ]);
//     $tokenCollection = collect(json_decode($response->body(),true));
//     //exchange token for character id
//
//     $tokens = $tokenCollection->only(['access_token','refresh_token'])->all();
//     $character = Http::withHeaders(['Authorization' => 'Bearer '.$tokens['access_token']])->get('https://login.eveonline.com/oauth/verify');
//     $characterInfo = collect(json_decode($character->body()));
//     $name = $characterInfo['CharacterName'];
//
//   } catch (\Exception $e) {
//     $response->throw();
//   }
//   if($name && $name !== null) {
//     $user = new User;
//     dd($user);
//   } else {
//     Log::error('Something went wrong when creating the user');
//   }
//
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
