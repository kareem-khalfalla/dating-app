<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReligionStatus extends Model
{
    public function profile(): BelongsTo
    {
        return $this->belongsTo(Profile::class);
    }
    
    public function religion(): BelongsTo
    {
        return $this->belongsTo(Religion::class);
    }

    public function method(): BelongsTo
    {
        return $this->belongsTo(Method::class);
    }

    public function obligation(): BelongsTo
    {
        return $this->belongsTo(Obligation::class);
    }

    public function prayer(): BelongsTo
    {
        return $this->belongsTo(Prayer::class);
    }

    public function alfajrPrayer(): BelongsTo
    {
        return $this->belongsTo(AlfajrPrayer::class);
    }

    public function headdress(): BelongsTo
    {
        return $this->belongsTo(Headdress::class);
    }

    public function fasting(): BelongsTo
    {
        return $this->belongsTo(Fasting::class);
    }

    public function readingQuran(): BelongsTo
    {
        return $this->belongsTo(ReadingQuran::class);
    }

    public function robe(): BelongsTo
    {
        return $this->belongsTo(Robe::class);
    }

    public function veil(): BelongsTo
    {
        return $this->belongsTo(Veil::class);
    }

    public function showStatus(): BelongsTo
    {
        return $this->belongsTo(ShowStatus::class);
    }

    public function overdress(): BelongsTo
    {
        return $this->belongsTo(Overdress::class);
    }

    public function beard(): BelongsTo
    {
        return $this->belongsTo(Beard::class);
    }

    public function tafaqah(): BelongsTo
    {
        return $this->belongsTo(Tafaqah::class);
    }

    public function musicStatus(): BelongsTo
    {
        return $this->belongsTo(MusicStatus::class);
    }

    public function friendStatus(): BelongsTo
    {
        return $this->belongsTo(FriendStatus::class);
    }
}
