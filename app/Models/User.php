<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table='users';
        protected $fillable = [
            'name',
            'email',
            'city',
            'password'
            
        ];

    public function productReviews()
        {
            return $this->hasMany(ProductReview::class);
        }
    
    public function stores()
        {
            return $this->hasOne(Store::class);
        }
}
