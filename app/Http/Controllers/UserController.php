<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
            $users = User::find(1);
            $productReviews = $users->productReviews;
            $stores = $users->stores;
    
         return view('users.index', [
                'users' => User::get(),
                'productReviews ' => $productReviews ,
                'stores ' => $stores ,
         ]);
    }  
    
    public function create()
    {
        return view('users.create', [
            'title' => 'Tambah Data User',
        ]);
    }

    public function store(Request $request)
    {
            $validatedData = $request->validate([
                    'name'  =>  'required',
                    'email' =>  'required',
                    'city'  => 'required',
                    'password'  => 'required'
            ]);
        User::create($validatedData);

        return redirect('/users');
    } 

    public function show($user)
    {
        return view('users.show', [
            'user' => $user,
        ]);
    }
}
