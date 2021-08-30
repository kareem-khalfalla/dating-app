<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Lifestyle extends Model
{
    public function smoke(): BelongsTo
    {
        return $this->belongsTo(Smoke::class);
    }

    public function alcohol(): BelongsTo
    {
        return $this->belongsTo(Alcohol::class);
    }

    public function halalFood(): BelongsTo
    {
        return $this->belongsTo(HalalFood::class);
    }

    public function foods(): BelongsToMany
    {
        return $this->belongsToMany(Food::class);
    }

    public function hobbies(): BelongsToMany
    {
        return $this->belongsToMany(Hobby::class);
    }
}