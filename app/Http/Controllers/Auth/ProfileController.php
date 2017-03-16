<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
  protected $redirectTo = '/home';

  public function __construct() {
    $this->middleware('auth');
  }

  public function show() {
    $user = Auth::user();
    return view('auth.profile', ['user' => $user]);
  }
}
