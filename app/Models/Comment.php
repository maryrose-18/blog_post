<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Level;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['user','content','post_id'];

    public function level()
    {
        return $this->hasMany(Level::class);
    }
}

