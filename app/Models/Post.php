<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
    'title',
    'image',
    'body',
    'category_id',
    'time_category_id',
    'pref_id',
    'user_id'
];

   

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function time_category()
    {
        return $this->belongsTo(TimeCategory::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function getPrefNameAttribute()
      {
          return config('pref.'.$this->pref_id);
      }
      
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    
    public function images()
    {
        return $this->hasMany(Image::class);
    }
}


