<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LogoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', [ 'except' => 'logout' ]);
    }

    public function logOut()
    {
        Auth::logout();

        return redirect('http://localhost:3000');
    }
}
