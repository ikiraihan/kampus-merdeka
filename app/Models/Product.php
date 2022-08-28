<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'products';
    protected $fillable = [
        'name',
        'store_id',
        'slug',
        'price',
        'description',
        'photo'
    ];

    // public function index()
    // {
    //     return view('users.index', [
    //             'users' => User::get(),
    //     ]);
    // }

    public function stores()
        {
            return $this->belongsTo(Store::class);
        }
    
    public function productsReviews()
    {
        return $this->hasMany(ProductReview::class);
    }
}
