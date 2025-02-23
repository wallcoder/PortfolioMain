<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'slug',
        'content',
        'image',
        'status',
    ];

    // public function scopePublished($query){
    //     return $query->where('status','published');
    // }

    // public function getImageUrlAttribute()
    // {
    //     return $this->image ? asset('storage/' . $this->image) : null;
    // }
}
