<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TechStack extends Model
{
   protected $guarded = [];

   public function tech(): BelongsTo{
    return $this->belongsTo(Tech::class);
    
   }

    public function info(): BelongsTo{
    return $this->belongsTo(Info::class);
    
   }

   

   public function project(): BelongsTo{
    return $this->belongsTo(Project::class);
    
   }
}
