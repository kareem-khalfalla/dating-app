<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Shelter extends Model
{
    public function shelterType(): BelongsTo
    {
        return $this->belongsTo(ShelterType::class);
    }

    public function shelterShape(): BelongsTo
    {
        return $this->belongsTo(ShelterShape::class);
    }

    public function shelterWay(): BelongsTo
    {
        return $this->belongsTo(ShelterWay::class);
    }
}
