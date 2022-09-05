<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    use HasFactory;

    protected $table = 'product_reviews';
    protected $fillable = [
        'product_id',
        'score',
        'review',
        'user_id',
    ];

    public function index()
    {
        // return view('users.index', [
        //         'users' => User::get(),
        // ]);
    }

    public function user()
        {
            return $this->belongsTo(User::class);
        }
    
    public function product()
        {
            return $this->belongsTo(Product::class);
        }
}
