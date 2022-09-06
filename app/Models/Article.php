<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $table = 'articles';
    protected $fillable = [
        'user_id',
        'cover',
        'title',
        'slug',
        'content',
    ];

    public function user()
{
    return $this->belongsTo(User::class);
}
}

