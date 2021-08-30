<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Hometown extends Model
{
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
}