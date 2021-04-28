<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;

class Level extends Model
{
    use HasFactory;

    protected $fillable = ['user','content','level','comment_id'];

    public function comments()
    {
        return $this->belongsTo(Comment::class);
    }
}
