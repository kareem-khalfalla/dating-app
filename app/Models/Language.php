<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Language extends Model
{
    public function profiles(): BelongsToMany
    {
        return $this->belongsToMany(Profile::class);
    }

    public function languagePerfectionStatus(): BelongsTo
    {
        return $this->belongsTo(LanguagePerfectionStatus::class);
    }

    public function scopeNative(Builder $query): Builder
    {
        return $query->where('order', 1);
    }

    public function scopeSecond(Builder $query): Builder
    {
        return $query->where('order', 2);
    }

    public function scopeThird(Builder $query): Builder
    {
        return $query->where('order', 3);
    }

    public function scopeAllAvailable(Builder $query) : Builder
    {
        return $query->whereIn('code', [
            'en', 'ar', 'de'
        ]);
    }
}
