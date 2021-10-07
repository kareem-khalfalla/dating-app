<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Profile extends Model
{
    protected $casts = [
        'hobbies' => 'array'
    ];

    public function getAge(): int|string
    {
        if (Carbon::parse($this->dob)->age == 0) {
            return 'N/A';
        }
        return Carbon::parse($this->dob)->age;
    }

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
        return $query->whereIn('residence_status', $residenceStatuses);
    }

    public function countryOfOrigin(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_of_origin_id');
    }

    public function nativeLanguage(): BelongsTo
    {
        return $this->belongsTo(Language::class, 'native_language_id');
    }

    public function secondLanguage(): BelongsTo
    {
        return $this->belongsTo(Language::class, 'second_language_id');
    }

    public function thirdLanguage(): BelongsTo
    {
        return $this->belongsTo(Language::class, 'third_language_id');
    }

    public function scopeNativeLanguages(Builder $query, array $languages): Builder
    {
        return $query->whereIn('native_language_id', $languages);
    }

    public function scopeSecondLanguages(Builder $query, array $languages, array $perfections): Builder
    {
        return $query->with('secondLanguage')
            ->whereIn('second_language_id', $languages)
            ->whereIn('second_language_perfection', $perfections);
    }

    public function scopeThirdLanguages(Builder $query, array $languages, array $perfections): Builder
    {
        return $query->with('thirdLanguage')
            ->whereIn('third_language_id', $languages)
            ->whereIn('third_language_perfection', $perfections);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function nationality(): BelongsTo
    {
        return $this->belongsTo(Nationality::class);
    }

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }

    public function scopeFoodTypes(Builder $query, array $foodTypes): Builder
    {
        return $query->whereIn('food_type', $foodTypes);
    }

    public function hobbies(): BelongsToMany
    {
        return $this->belongsToMany(Hobby::class);
    }

    public function scopeAllHobbies(Builder $query, array $hobbies): Builder
    {
        return $query;
        // in order to run this query we need to upgrade mysql to be at least version 5.7
        // return $query->whereJsonContains('hobbies', $hobbies);
    }

    public function scopeNationalities(Builder $query, array $nationalities): Builder
    {
        return $query->whereIn('nationality_id', $nationalities);
    }

    public function scopeHalalFoodStatuses(Builder $query, array $halalFoodStatuses): Builder
    {
        return $query->whereIn('halal_food_status', $halalFoodStatuses);
    }

    public function scopeAlcoholStatuses(Builder $query, array $alcoholStatuses): Builder
    {
        return $query->whereIn('alcohol_status', $alcoholStatuses);
    }

    public function scopeSmokeStatuses(Builder $query, array $smokeStatuses): Builder
    {
        return $query->whereIn('smoke_status', $smokeStatuses);
    }

    public function scopePsychologicalPatterns(Builder $query, array $psychologicalPatterns): Builder
    {
        return $query->whereIn('psychological_pattern', $psychologicalPatterns);
    }

    public function scopeHealthStatuses(Builder $query, array $healthStatuses): Builder
    {
        return $query->whereIn('health_status', $healthStatuses);
    }

    public function scopeEyeGlasses(Builder $query, array $eyeGlasses): Builder
    {
        return $query->whereIn('eye_glass', $eyeGlasses);
    }

    public function scopeEyeColors(Builder $query, array $eyeColors): Builder
    {
        return $query->whereIn('eye_color', $eyeColors);
    }

    public function scopeHairKinds(Builder $query, array $hairKinds): Builder
    {
        return $query->whereIn('hair_kind', $hairKinds);
    }

    public function scopeHairLengths(Builder $query, array $hairLengths): Builder
    {
        return $query->whereIn('hair_length', $hairLengths);
    }

    public function scopeHairColors(Builder $query, array $hairColors): Builder
    {
        return $query->whereIn('hair_color', $hairColors);
    }

    public function scopeSkinStatuses(Builder $query, array $skinStatuses): Builder
    {
        return $query->whereIn('skin_status', $skinStatuses);
    }

    public function scopeBodyStatuses(Builder $query, array $bodyStatuses): Builder
    {
        return $query->whereIn('body_status', $bodyStatuses);
    }

    public function scopeShelterWays(Builder $query, array $shelterWays): Builder
    {
        return $query->whereIn('shelter_way', $shelterWays);
    }

    public function scopeShelterShapes(Builder $query, array $shelterShapes): Builder
    {
        return $query->whereIn('shelter_shape', $shelterShapes);
    }

    public function scopeShelterTypes(Builder $query, array $shelterTypes): Builder
    {
        return $query->whereIn('shelter_type', $shelterTypes);
    }

    public function scopeChildrenDesireStatuses(Builder $query, array $childrenDesireStatuses): Builder
    {
        return $query->whereIn('children_desire_status', $childrenDesireStatuses);
    }

    public function scopePolygamyStatuses(Builder $query, array $polygamyStatuses): Builder
    {
        return $query->whereIn('male_polygamy_status', $polygamyStatuses);
    }

    public function scopeChildrenStatuses(Builder $query, array $childrenStatuses): Builder
    {
        return $query->whereIn('children_status', $childrenStatuses);
    }

    public function scopeFriendStatuses(Builder $query, array $friendStatuses): Builder
    {
        return $query->whereIn('friend_status', $friendStatuses);
    }

    public function scopeShowStatuses(Builder $query, array $showStatuses): Builder
    {
        return $query->whereIn('show_status', $showStatuses);
    }

    public function scopeMusicStatuses(Builder $query, array $musicStatuses): Builder
    {
        return $query->whereIn('music_status', $musicStatuses);
    }

    public function scopeTafaqahStatuses(Builder $query, array $tafaqahStatuses): Builder
    {
        return $query->whereIn('tafaqah_status', $tafaqahStatuses);
    }

    public function scopeRobeStatuses(Builder $query, array $robeStatuses): Builder
    {
        return $query->whereIn('robe_status', $robeStatuses);
    }

    public function scopeHeaddresses(Builder $query, array $headdresses): Builder
    {
        return $query->whereIn('headdress', $headdresses);
    }

    public function scopeReadingQurans(Builder $query, array $readingQurans): Builder
    {
        return $query->whereIn('reading_quran', $readingQurans);
    }

    public function scopeFastings(Builder $query, array $fastings): Builder
    {
        return $query->whereIn('fasting', $fastings);
    }

    public function scopeAlfajrPrayers(Builder $query, array $alfajrPrayers): Builder
    {
        return $query->whereIn('alfajr_prayer', $alfajrPrayers);
    }

    public function scopePrayers(Builder $query, array $prayers): Builder
    {
        return $query->whereIn('prayer', $prayers);
    }

    public function scopeObligations(Builder $query, array $obligations): Builder
    {
        return $query->whereIn('obligation', $obligations);
    }

    public function scopeReligionMethods(Builder $query, array $religionMethods): Builder
    {
        return $query->whereIn('religion_method', $religionMethods);
    }

    public function scopeReligions(Builder $query, array $religions): Builder
    {
        return $query->whereIn('religion', $religions);
    }

    public function scopeAcceptWifeStudyStatuses(Builder $query, array $acceptWifeStudyStatuses): Builder
    {
        return $query->whereIn('male_study_status', $acceptWifeStudyStatuses);
    }

    public function scopeAcceptWifeWorkStatuses(Builder $query, array $acceptWifeWorkStatuses): Builder
    {
        return $query->whereIn('male_work_status', $acceptWifeWorkStatuses);
    }

    public function scopeWorkStatuses(Builder $query, array $workStatuses): Builder
    {
        return $query->whereIn('work', $workStatuses);
    }

    public function scopeEducationStatuses(Builder $query, array $educationStatuses): Builder
    {
        return $query->whereIn('education_status', $educationStatuses);
    }

    public function scopeMarriageStatuses(Builder $query, array $marriageStatuses): Builder
    {
        return $query->whereIn('marriage_status', $marriageStatuses);
    }

    public function scopeRelationshipStatuses(Builder $query, array $relationshipStatuses): Builder
    {
        return $query->whereIn('relationship_status', $relationshipStatuses);
    }

    public function scopeRelocateStatuses(Builder $query, array $relocateStatuses): Builder
    {
        return $query->whereIn('relocate_status', $relocateStatuses);
    }

    public function scopeMaritalStatuses(Builder $query, array $maritalStatuses): Builder
    {
        return $query->whereIn('marital_status', $maritalStatuses);
    }

    public function scopeIncomeFromTo(Builder $query, int $id): Builder
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

    public function scopeNumberOfChildrenFromTo(Builder $query, int $id): Builder
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

    public function scopeWeightFromTo(Builder $query, int $id): Builder
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

    public function scopeHeightFromTo(Builder $query, int $id): Builder
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
