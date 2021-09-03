<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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

    public function shelter(): BelongsTo
    {
        return $this->belongsTo(Shelter::class);
    }

    public function marriage(): BelongsTo
    {
        return $this->belongsTo(Marriage::class);
    }

    public function workStatus(): BelongsTo
    {
        return $this->belongsTo(WorkStatus::class);
    }

    public function religionStatus(): BelongsTo
    {
        return $this->belongsTo(ReligionStatus::class);
    }

    public function lifestyle(): BelongsTo
    {
        return $this->belongsTo(Lifestyle::class);
    }

    public function detail(): BelongsTo
    {
        return $this->belongsTo(Detail::class);
    }

    public function socialStatus(): BelongsTo
    {
        return $this->belongsTo(SocialStatus::class);
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
        return $this->belongsTo(AcceptWifeWorkStatuses::class);
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
