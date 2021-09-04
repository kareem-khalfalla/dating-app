<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Detail extends Model
{
    public function profile(): BelongsTo
    {
        return $this->belongsTo(Profile::class);
    }

    public function body(): BelongsTo
    {
        return $this->belongsTo(Body::class);
    }

    public function skin(): BelongsTo
    {
        return $this->belongsTo(Skin::class);
    }

    public function hairColor(): BelongsTo
    {
        return $this->belongsTo(HairColor::class);
    }

    public function hairLength(): BelongsTo
    {
        return $this->belongsTo(HairLength::class);
    }

    public function hairKind(): BelongsTo
    {
        return $this->belongsTo(HairKind::class);
    }

    public function eyeColor(): BelongsTo
    {
        return $this->belongsTo(EyeColor::class);
    }

    public function eyeGlass(): BelongsTo
    {
        return $this->belongsTo(EyeGlass::class);
    }

    public function health(): BelongsTo
    {
        return $this->belongsTo(Health::class);
    }

    public function psychologicalPattern(): BelongsTo
    {
        return $this->belongsTo(PsychologicalPattern::class);
    }
}
