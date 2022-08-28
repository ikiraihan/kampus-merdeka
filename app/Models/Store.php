<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = 'stores';

    // public function index()
    // {
    //     return view('users.index', [
    //             'users' => User::get(),
    //     ]);
    // }

    public function users()
        {
            return $this->hasOne(User::class);
        }
    
    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
