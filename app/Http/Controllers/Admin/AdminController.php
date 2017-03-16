<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class AdminController extends Controller
{
    public function usersShow() {
        // User::findOrFail(12);
        $users = User::all();
        dd($users);
        return "Listado";
    }
}
