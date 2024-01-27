<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    protected $fillable = ['post_id', 'path'];
    
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
