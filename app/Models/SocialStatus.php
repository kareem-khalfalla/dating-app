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

    public function childrenStatus(): BelongsTo
    {
        return $this->belongsTo(ChildrenStatus::class);
    }
}