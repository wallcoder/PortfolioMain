<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tech extends Model
{
    protected $guarded = [];

    public function techStack(): HasMany{
        return $this->hasMany(TechStack::class);
    }
}
