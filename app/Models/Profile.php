<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Profile extends Model
{
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function nationality(): BelongsTo
    {
        return $this->belongsTo(Nationality::class);
    }

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }

    public function residency(): BelongsTo
    {
        return $this->belongsTo(Residency::class);
    }

    public function hometown(): BelongsTo
    {
        return $this->belongsTo(Hometown::class);
    }

    public function countryOfResidence(): BelongsTo
    {
        return $this->belongsTo(CountryOfResidence::class);
    }

    public function relocate(): BelongsTo
    {
        return $this->belongsTo(Relocate::class);
    }

    public function relationship(): BelongsTo
    {
        return $this->belongsTo(Relationship::class);
    }

    public function shelter(): HasOne
    {
        return $this->hasOne(Shelter::class);
    }

    public function marriage(): BelongsTo
    {
        return $this->belongsTo(Marriage::class);
    }

    public function workStatus(): BelongsTo
    {
        return $this->belongsTo(WorkStatus::class);
    }

    public function lifestyle(): HasOne
    {
        return $this->hasOne(Lifestyle::class);
    }

    public function detail(): HasOne
    {
        return $this->hasOne(Detail::class);
    }

    public function socialStatus(): HasOne
    {
        return $this->hasOne(SocialStatus::class);
    }

    public function religionStatus(): HasOne
    {
        return $this->hasOne(ReligionStatus::class);
    }

    public function wifeWorkStatus(): BelongsTo
    {
        return $this->belongsTo(WifeWorkStatus::class);
    }

    public function wifeStudyStatus(): BelongsTo
    {
        return $this->belongsTo(WifeStudyStatus::class);
    }

    public function acceptWifeWorkStatus(): BelongsTo
    {
        return $this->belongsTo(AcceptWifeWorkStatus::class);
    }

    public function acceptWifeStudyStatus(): BelongsTo
    {
        return $this->belongsTo(AcceptWifeStudyStatus::class);
    }

    public function education(): BelongsTo
    {
        return $this->belongsTo(Education::class);
    }

    public function languages(): BelongsToMany
    {
        return $this->belongsToMany(Language::class);
    }
}
