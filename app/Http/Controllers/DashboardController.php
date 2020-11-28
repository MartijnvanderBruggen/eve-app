<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User as User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends BaseController
{
  public function index(Request $request) {
    $user = Auth::user();
    //
    // $responseJSON = Http::withHeaders([
    //     'Authorization' => 'Bearer '. $user->password,
    // ])->get('https://esi.evetech.net/latest/characters/'.$user->eve_id.'/assets/');
    //
    // $assets = collect(json_decode($responseJSON->body()));
    $token = $request->session()->pull('eve_token');
    return view('dashboard',[
      'user' => $user,
      'eve_token' => $token
    ]);
  }
}
