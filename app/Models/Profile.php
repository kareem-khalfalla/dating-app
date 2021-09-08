<?php

namespace App\Models;

use Carbon\Carbon;
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

    public function residencyStatus(): BelongsTo
    {
        return $this->belongsTo(ResidencyStatus::class);
    }

    public function hometown(): BelongsTo
    {
        return $this->belongsTo(Hometown::class);
    }

    public function countryOfResidence(): BelongsTo
    {
        return $this->belongsTo(CountryOfResidence::class);
    }

    public function relocateStatus(): BelongsTo
    {
        return $this->belongsTo(RelocateStatus::class);
    }

    public function relationshipStatus(): BelongsTo
    {
        return $this->belongsTo(RelationshipStatus::class);
    }

    public function shelter(): HasOne
    {
        return $this->hasOne(Shelter::class);
    }

    public function marriageStatus(): BelongsTo
    {
        return $this->belongsTo(MarriageStatus::class);
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

    public function educationStatus(): BelongsTo
    {
        return $this->belongsTo(EducationStatus::class);
    }

    public function languages(): BelongsToMany
    {
        return $this->belongsToMany(Language::class);
    }

    public function smokeStatus(): BelongsTo
    {
        return $this->belongsTo(SmokeStatus::class);
    }

    public function alcoholStatus(): BelongsTo
    {
        return $this->belongsTo(AlcoholStatus::class);
    }

    public function halalFoodStatus(): BelongsTo
    {
        return $this->belongsTo(HalalFoodStatus::class);
    }

    public function foodType(): BelongsTo
    {
        return $this->belongsTo(FoodType::class);
    }

    public function hobbies(): BelongsToMany
    {
        return $this->belongsToMany(Hobby::class);
    }

    public function bodyStatus(): BelongsTo
    {
        return $this->belongsTo(BodyStatus::class);
    }

    public function skinStatus(): BelongsTo
    {
        return $this->belongsTo(SkinStatus::class);
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

    public function healthStatus(): BelongsTo
    {
        return $this->belongsTo(HealthStatus::class);
    }

    public function psychologicalPattern(): BelongsTo
    {
        return $this->belongsTo(PsychologicalPattern::class);
    }
    public function religion(): BelongsTo
    {
        return $this->belongsTo(Religion::class);
    }

    public function religionMethod(): BelongsTo
    {
        return $this->belongsTo(ReligionMethod::class);
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

    public function robeStatus(): BelongsTo
    {
        return $this->belongsTo(RobeStatus::class);
    }

    public function veilStatus(): BelongsTo
    {
        return $this->belongsTo(VeilStatus::class);
    }

    public function showStatus(): BelongsTo
    {
        return $this->belongsTo(ShowStatus::class);
    }

    public function overdress(): BelongsTo
    {
        return $this->belongsTo(Overdress::class);
    }

    public function beardStatus(): BelongsTo
    {
        return $this->belongsTo(BeardStatus::class);
    }

    public function tafaqahStatus(): BelongsTo
    {
        return $this->belongsTo(TafaqahStatus::class);
    }

    public function musicStatus(): BelongsTo
    {
        return $this->belongsTo(MusicStatus::class);
    }

    public function friendStatus(): BelongsTo
    {
        return $this->belongsTo(FriendStatus::class);
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

    public function childrenDesireStatus(): BelongsTo
    {
        return $this->belongsTo(ChildrenDesireStatus::class);
    }
}
