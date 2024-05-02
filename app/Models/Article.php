<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;
use App\Models\Analytic;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'user_id', 'image'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function analytic()
    {
        return $this->hasOne(Analytic::class);
    }
}
