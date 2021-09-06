<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Food extends ModelTranslated
{
    protected $table = 'foods';
    
    // public function lifestyles(): BelongsToMany
    // {
    //     return $this->belongsToMany(Lifestyle::class);
    // }
}
