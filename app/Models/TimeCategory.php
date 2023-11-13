<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeCategory extends Model
{
    use HasFactory;
    
    public function posts()   
    {
        return $this->hasMany(Post::class);  
    }

    public function getByTimeCategory(int $limit_count = 5)
        {
            return $this->posts()->with('time_category')->orderBy('updated_at','DESC')->paginate($limit_count);
        }
}
