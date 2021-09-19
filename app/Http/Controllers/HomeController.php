<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Auth $auth)
    {
        $user = $auth::user();
        $data = [
            'user' => $user
        ];
        if ($user) {
            if ($user->role == 1)
                return redirect()->route('admin');
        }
        return redirect()->route('login');
        // return view('home', compact('data'));
    }
}
