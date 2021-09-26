<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Profile extends Model
{
    public function countryOfResidence(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_of_residence_id');
    }
    
    public function scopeCountriesOfResidences(Builder $query, array $countries): Builder
    {
        return $query->whereIn('country_of_residence_id', $countries);
    }

    public function scopeCountriesOfOrigin(Builder $query, array $countries): Builder
    {
        return $query->whereIn('country_of_origin_id', $countries);
    }

    public function scopeResidenceStatuses(Builder $query, array $residenceStatuses): Builder
    {
        return $query->whereIn('residence_status_id', $residenceStatuses);
    }

    public function countryOfOrigin(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_of_origin_id');
    }

    public function languageNative(): BelongsTo
    {
        return $this->belongsTo(Language::class, 'language_native_id');
    }

    public function scopeNativeLanguages(Builder $query, array $languages): Builder
    {
        return $query->whereIn('language_native_id', $languages);
    }

    public function scopeSecondLanguages(Builder $query, array $languages, array $perfections): Builder
    {
        return $query->with('languageSecond', function ($query) use ($perfections) {
            $query->whereIn('language_perfection_status_id', $perfections);
        })->whereIn('language_second_id', $languages);
    }
    
    public function scopeThirdLanguages(Builder $query, array $languages, array $perfections): Builder
    {
        return $query->with('languageThird', function ($query) use ($perfections) {
            $query->whereIn('language_perfection_status_id', $perfections);
        })->whereIn('language_third_id', $languages);
    }

    public function languageSecond(): BelongsTo
    {
        return $this->belongsTo(Language::class, 'language_second_id');
    }

    public function languageThird(): BelongsTo
    {
        return $this->belongsTo(Language::class, 'language_third_id');
    }

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

    public function residenceStatus(): BelongsTo
    {
        return $this->belongsTo(ResidenceStatus::class);
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

    public function scopeFoodTypes(Builder $query, array $foodTypes): Builder
    {
        return $query->whereIn('food_type_id', $foodTypes);
    }

    public function hobbies(): BelongsToMany
    {
        return $this->belongsToMany(Hobby::class);
    }

    public function scopeAllHobbies(Builder $query, array $hobbies): Builder
    {
        return $query->whereHas('hobbies', function ($query) use ($hobbies) {
            $query->whereIn('id', $hobbies);
        });
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

    public function scopeNationalities(Builder $query, array $nationalities): Builder
    {
        return $query->whereIn('nationality_id', $nationalities);
    }

    public function scopeHalalFoodStatuses(Builder $query, array $halalFoodStatuses): Builder
    {
        return $query->whereIn('halal_food_status_id', $halalFoodStatuses);
    }

    public function scopeAlcoholStatuses(Builder $query, array $alcoholStatuses): Builder
    {
        return $query->whereIn('alcohol_status_id', $alcoholStatuses);
    }

    public function scopeSmokeStatuses(Builder $query, array $smokeStatuses): Builder
    {
        return $query->whereIn('smoke_status_id', $smokeStatuses);
    }

    public function scopePsychologicalPatterns(Builder $query, array $psychologicalPatterns): Builder
    {
        return $query->whereIn('psychological_pattern_id', $psychologicalPatterns);
    }

    public function scopeHealthStatuses(Builder $query, array $healthStatuses): Builder
    {
        return $query->whereIn('health_status_id', $healthStatuses);
    }

    public function scopeEyeGlasses(Builder $query, array $eyeGlasses): Builder
    {
        return $query->whereIn('eye_glass_id', $eyeGlasses);
    }

    public function scopeEyeColors(Builder $query, array $eyeColors): Builder
    {
        return $query->whereIn('eye_color_id', $eyeColors);
    }

    public function scopeHairKinds(Builder $query, array $hairKinds): Builder
    {
        return $query->whereIn('hair_kind_id', $hairKinds);
    }

    public function scopeHairLengths(Builder $query, array $hairLengths): Builder
    {
        return $query->whereIn('hair_length_id', $hairLengths);
    }

    public function scopeHairColors(Builder $query, array $hairColors): Builder
    {
        return $query->whereIn('hair_color_id', $hairColors);
    }

    public function scopeSkinStatuses(Builder $query, array $skinStatuses): Builder
    {
        return $query->whereIn('skin_status_id', $skinStatuses);
    }

    public function scopeBodyStatuses(Builder $query, array $bodyStatuses): Builder
    {
        return $query->whereIn('body_status_id', $bodyStatuses);
    }

    public function scopeShelterWays(Builder $query, array $shelterWays): Builder
    {
        return $query->whereIn('shelter_way_id', $shelterWays);
    }

    public function scopeShelterShapes(Builder $query, array $shelterShapes): Builder
    {
        return $query->whereIn('shelter_shape_id', $shelterShapes);
    }

    public function scopeShelterTypes(Builder $query, array $shelterTypes): Builder
    {
        return $query->whereIn('shelter_type_id', $shelterTypes);
    }

    public function scopeChildrenDesireStatuses(Builder $query, array $childrenDesireStatuses): Builder
    {
        return $query->whereIn('children_desire_status_id', $childrenDesireStatuses);
    }

    public function scopePolygamyStatuses(Builder $query, array $polygamyStatuses): Builder
    {
        return $query->whereIn('polygamy_status_id', $polygamyStatuses);
    }

    public function scopeChildrenStatuses(Builder $query, array $childrenStatuses): Builder
    {
        return $query->whereIn('children_status_id', $childrenStatuses);
    }

    public function scopeFriendStatuses(Builder $query, array $friendStatuses): Builder
    {
        return $query->whereIn('friend_status_id', $friendStatuses);
    }

    public function scopeShowStatuses(Builder $query, array $showStatuses): Builder
    {
        return $query->whereIn('show_status_id', $showStatuses);
    }

    public function scopeMusicStatuses(Builder $query, array $musicStatuses): Builder
    {
        return $query->whereIn('music_status_id', $musicStatuses);
    }

    public function scopeTafaqahStatuses(Builder $query, array $tafaqahStatuses): Builder
    {
        return $query->whereIn('tafaqah_status_id', $tafaqahStatuses);
    }

    public function scopeRobeStatuses(Builder $query, array $robeStatuses): Builder
    {
        return $query->whereIn('robe_status_id', $robeStatuses);
    }

    public function scopeHeaddresses(Builder $query, array $headdresses): Builder
    {
        return $query->whereIn('headdress_id', $headdresses);
    }

    public function scopeReadingQurans(Builder $query, array $readingQurans): Builder
    {
        return $query->whereIn('reading_quran_id', $readingQurans);
    }

    public function scopeFastings(Builder $query, array $fastings): Builder
    {
        return $query->whereIn('fasting_id', $fastings);
    }

    public function scopeAlfajrPrayers(Builder $query, array $alfajrPrayers): Builder
    {
        return $query->whereIn('alfajr_prayer_id', $alfajrPrayers);
    }

    public function scopePrayers(Builder $query, array $prayers): Builder
    {
        return $query->whereIn('prayer_id', $prayers);
    }

    public function scopeObligations(Builder $query, array $obligations): Builder
    {
        return $query->whereIn('obligation_id', $obligations);
    }

    public function scopeReligionMethods(Builder $query, array $religionMethods): Builder
    {
        return $query->whereIn('religion_method_id', $religionMethods);
    }

    public function scopeReligions(Builder $query, array $religions): Builder
    {
        return $query->whereIn('religion_id', $religions);
    }

    public function scopeAcceptWifeStudyStatuses(Builder $query, array $acceptWifeStudyStatuses): Builder
    {
        return $query->whereIn('accept_wife_study_status_id', $acceptWifeStudyStatuses);
    }

    public function scopeAcceptWifeWorkStatuses(Builder $query, array $acceptWifeWorkStatuses): Builder
    {
        return $query->whereIn('accept_wife_work_status_id', $acceptWifeWorkStatuses);
    }

    public function scopeWorkStatuses(Builder $query, array $workStatuses): Builder
    {
        return $query->whereIn('work_status_id', $workStatuses);
    }

    public function scopeEducationStatuses(Builder $query, array $educationStatuses): Builder
    {
        return $query->whereIn('education_status_id', $educationStatuses);
    }

    public function scopeMarriageStatuses(Builder $query, array $marriageStatuses): Builder
    {
        return $query->whereIn('marriage_status_id', $marriageStatuses);
    }

    public function scopeRelationshipStatuses(Builder $query, array $relationshipStatuses): Builder
    {
        return $query->whereIn('relationship_status_id', $relationshipStatuses);
    }

    public function scopeRelocateStatuses(Builder $query, array $relocateStatuses): Builder
    {
        return $query->whereIn('relocate_status_id', $relocateStatuses);
    }

    public function scopeMaritalStatuses(Builder $query, array $maritalStatuses): Builder
    {
        return $query->whereIn('marital_status_id', $maritalStatuses);
    }

    public function scopeIncomes(Builder $query, int $id): Builder
    {
        switch ($id) {
            case 1:
                return $query->whereBetween('income', [0, 1000]);
                break;
            case 2:
                return $query->whereBetween('income', [1000, 2000]);
                break;
            case 3:
                return $query->whereBetween('income', [2000, 3000]);
                break;
            case 4:
                return $query->whereBetween('income', [3000, 4000]);
                break;
            case 5:
                return $query->whereBetween('income', [4000, 5000]);
                break;
            case 6:
                return $query->whereBetween('income', [5000, 6000]);
                break;
            case 7:
                return $query->whereBetween('income', [6000, 7000]);
                break;
            case 8:
                return $query->whereBetween('income', [7000, 8000]);
                break;
            case 9:
                return $query->whereBetween('income', [8000, 9000]);
                break;
            case 10:
                return $query->whereBetween('income', [9000, 10000]);
                break;
            default:
                return $query->whereBetween('income', [10000, 100000]);
                break;
        }
    }

    public function scopeNumberOfChildren(Builder $query, int $id): Builder
    {
        switch ($id) {
            case 1:
                return $query->where('children_count', 0);
                break;

            case 2:
                return $query->whereBetween('children_count', [1, 3]);
                break;

            case 3:
                return $query->whereBetween('children_count', [3, 6]);
                break;

            case 4:
                return $query->whereBetween('children_count', [6, 9]);
                break;

            case 5:
                return $query->whereBetween('children_count', [9, 12]);
                break;

            default:
                return $query->whereBetween('children_count', [12, 20]);
                break;
        }
    }

    public function scopeWeights(Builder $query, int $id): Builder
    {
        switch ($id) {
            case 1:
                return $query->whereBetween('weight', [0, 50]);
                break;
            case 2:
                return $query->whereBetween('weight', [50, 60]);
                break;
            case 3:
                return $query->whereBetween('weight', [60, 70]);
                break;
            case 4:
                return $query->whereBetween('weight', [70, 80]);
                break;
            case 5:
                return $query->whereBetween('weight', [80, 90]);
                break;
            case 6:
                return $query->whereBetween('weight', [90, 100]);
                break;
            case 7:
                return $query->whereBetween('weight', [100, 110]);
                break;
            case 8:
                return $query->whereBetween('weight', [110, 120]);
                break;
            case 9:
                return $query->whereBetween('weight', [120, 130]);
                break;
            case 10:
                return $query->whereBetween('weight', [130, 140]);
                break;
            case 11:
                return $query->whereBetween('weight', [140, 150]);
                break;
            case 12:
                return $query->whereBetween('weight', [150, 160]);
                break;
            case 13:
                return $query->whereBetween('weight', [160, 170]);
                break;
            case 14:
                return $query->whereBetween('weight', [170, 180]);
                break;
            default:
                return $query->whereBetween('weight', [180, 220]);
                break;
        }
    }

    public function scopeLengths(Builder $query, int $id): Builder
    {
        switch ($id) {
            case 1:
                return $query->whereBetween('height', [120, 140]);
                break;
            case 2:
                return $query->whereBetween('height', [140, 160]);
                break;
            case 3:
                return $query->whereBetween('height', [160, 180]);
                break;
            case 4:
                return $query->whereBetween('height', [180, 200]);
                break;
            default:
                return $query->whereBetween('height', [200, 220]);
                break;
        }
    }
}
