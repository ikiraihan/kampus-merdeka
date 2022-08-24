<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function mau()
    {
        return view('mau');
    }

    public function gak()
    {
        return view('gak');
    }
}
