<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = [
            [
                'name'      => 'Jennie',
                'email'     => 'jennie@mail.com',
                'twitter'   => '@jennie'
            ],
            [
                'name'      => 'Lisa',
                'email'     => 'lisa@mail.com',
                'twitter'   => '@lisa'
            ],
            [
                'name'      => 'jihyo',
                'email'     => 'jihyo@mail.com',
                'twitter'   => '@jihyo',
            ],
        ];
    
        return view('users.index', [
            'users' => $users,
        ]);
    }   

    public function show($user)
    {
        return view('users.show', [
            'user' => $user,
        ]);
    }
}
