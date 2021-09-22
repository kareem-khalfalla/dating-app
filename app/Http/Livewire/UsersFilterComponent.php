<?php

namespace App\Http\Livewire;

use App\Models\Profile;
use Livewire\Component;

class UsersFilterComponent extends Component
{
    public $state = [];

    public function render()
    {
        return view('livewire.users-filter-component');
    }

    public function showResults()
    {
        session()->flash(
            'usersResults',
            Profile::smokeStatuses($this->state['smokeStatuses'])
                ->secondLanguages(
                    $this->state['secondLanguages'],
                    $this->state['secondLanguagesPerfection']
                )
                ->thirdLanguages(
                    $this->state['thirdLanguages'],
                    $this->state['thirdLanguagesPerfection']
                )
                ->lengths($this->state['height_from_to_id'])
                ->weights($this->state['weight_from_to_id'])
                ->numberOfChildren($this->state['children_count_from_to_id'])
                ->incomes($this->state['income_from_to_id'])
                ->nativeLanguages($this->state['nativeLanguages'])
                ->alcoholStatuses($this->state['alcoholStatuses'])
                ->halalFoodStatuses($this->state['halalFoodStatuses'])
                ->psychologicalPatterns($this->state['psychologicalPatterns'])
                ->healthStatuses($this->state['healthStatuses'])
                ->eyeGlasses($this->state['eyeGlasses'])
                ->eyeColors($this->state['eyeColors'])
                ->hairKinds($this->state['hairKinds'])
                ->hairLengths($this->state['hairLengths'])
                ->hairColors($this->state['hairColors'])
                ->skinStatuses($this->state['skinStatuses'])
                ->bodyStatuses($this->state['bodyStatuses'])
                ->shelterWays($this->state['shelterWays'])
                ->shelterShapes($this->state['shelterShapes'])
                ->shelterTypes($this->state['shelterTypes'])
                ->childrenDesireStatuses($this->state['childrenDesireStatuses'])
                ->polygamyStatuses($this->state['polygamyStatuses'])
                ->childrenStatuses($this->state['childrenStatuses'])
                ->friendStatuses($this->state['friendStatuses'])
                ->showStatuses($this->state['showStatuses'])
                ->musicStatuses($this->state['musicStatuses'])
                ->tafaqahStatuses($this->state['tafaqahStatuses'])
                ->robeStatuses($this->state['robeStatuses'])
                ->headdresses($this->state['headdresses'])
                ->readingQurans($this->state['readingQurans'])
                ->fastings($this->state['fastings'])
                ->alfajrPrayers($this->state['alfajrPrayers'])
                ->prayers($this->state['prayers'])
                ->obligations($this->state['obligations'])
                ->religionMethods($this->state['religionMethods'])
                ->religions($this->state['religions'])
                ->acceptWifeStudyStatuses($this->state['acceptWifeStudyStatuses'])
                ->acceptWifeWorkStatuses($this->state['acceptWifeWorkStatuses'])
                ->workStatuses($this->state['workStatuses'])
                ->educationStatuses($this->state['educationStatuses'])
                ->marriageStatuses($this->state['marriageStatuses'])
                ->relationshipStatuses($this->state['relationshipStatuses'])
                ->relocateStatuses($this->state['relocateStatuses'])
                ->maritalStatuses($this->state['maritalStatuses'])
                ->foodTypes($this->state['foodTypes'])
                ->allHobbies($this->state['hobbies'])
                ->countriesOfResidences($this->state['countriesOfResidences'])
                ->countriesHome($this->state['countries'])
                ->nationalities($this->state['nationalities'])
                ->get()
        );
        redirect()->route('requests');
    }
}
