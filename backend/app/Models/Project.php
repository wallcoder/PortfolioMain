<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Str;

class Project extends Model
{
    protected $guarded = [];

    public function category(): BelongsTo{
        return $this->belongsTo(Category::class);
    }

    public function techStack(): HasMany{
        return $this->hasMany(TechStack::class);
    }


    protected static function booted()
    {
    static::creating(function ($model) {
        if (empty($model->slug)) {
            $slugBase = \Illuminate\Support\Str::slug($model->title);
            
            $model->slug = "{$slugBase}";
            }
        });
    }
}
