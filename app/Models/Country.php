<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Country extends Model
{
    public function profiles(): BelongsToMany
    {
        return $this->belongsToMany(Profile::class)->withPivot('is_hometown');
    }

    public function scopeHometown(Builder $query): Builder
    {
        return $query->where('is_hometown', 1);
    }

    public function scopeResidence(Builder $query): Builder
    {
        return $query->where('is_hometown', 0);
    }
}
