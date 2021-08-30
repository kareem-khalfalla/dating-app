<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SocialStatus extends ModelTranslated
{
    public function maritalStatus(): BelongsTo
    {
        return $this->belongsTo(MaritalStatus::class);
    }

    public function polygamyStatus(): BelongsTo
    {
        return $this->belongsTo(PolygamyStatus::class);
    }

    public function children(): BelongsTo
    {
        return $this->belongsTo(Children::class);
    }
}