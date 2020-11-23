<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User as User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends BaseController
{
  public function index() {
    return view('dashboard');
  }
}
