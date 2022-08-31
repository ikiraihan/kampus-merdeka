<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthLogController extends Controller
{
    public function index()
    {
        return view('authlog',[
            'logs' => auth()->user()->authentications
        ]);
    }
}
