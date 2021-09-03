<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SocialStatus extends ModelTranslated
{
    public function profile(): BelongsTo
    {
        return $this->belongsTo(Profile::class);
    }

    public function maritalStatus(): BelongsTo
    {
        return $this->belongsTo(MaritalStatus::class);
    }

    public function polygamyStatus(): BelongsTo
    {
        return $this->belongsTo(PolygamyStatus::class);
    }

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

    public function childrenStatus(): BelongsTo
    {
        return $this->belongsTo(ChildrenStatus::class);
    }

    public function childrenDesireStatus(): BelongsTo
    {
        return $this->belongsTo(ChildrenDesireStatus::class);
    }
}