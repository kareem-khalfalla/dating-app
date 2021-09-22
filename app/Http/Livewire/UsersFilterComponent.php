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
        $profiles = collect(Profile::smokeStatuses($this->state['smokeStatuses'])->get())
            ->merge(Profile::lengths($this->state['height_from_to_id'])->get())
            ->merge(Profile::weights($this->state['weight_from_to_id'])->get())
            ->merge(Profile::numberOfChildren($this->state['children_count_from_to_id'])->get())
            ->merge(Profile::incomes($this->state['income_from_to_id'])->get())
            ->merge(Profile::nativeLanguages($this->state['nativeLanguages'])->get())
            ->merge(Profile::secondLanguagesPerfection($this->state['secondLanguagesPerfection'])->get())
            ->merge(Profile::thirdLanguagesPerfection($this->state['thirdLanguagesPerfection'])->get())
            ->merge(Profile::secondLanguages($this->state['secondLanguages'])->get())
            ->merge(Profile::thirdLanguages($this->state['thirdLanguages'])->get())
            ->merge(Profile::alcoholStatuses($this->state['alcoholStatuses'])->get())->unique()
            ->merge(Profile::halalFoodStatuses($this->state['halalFoodStatuses'])->get())->unique()
            ->merge(Profile::psychologicalPatterns($this->state['psychologicalPatterns'])->get())->unique()
            ->merge(Profile::healthStatuses($this->state['healthStatuses'])->get())->unique()
            ->merge(Profile::eyeGlasses($this->state['eyeGlasses'])->get())->unique()
            ->merge(Profile::eyeColors($this->state['eyeColors'])->get())->unique()
            ->merge(Profile::hairKinds($this->state['hairKinds'])->get())->unique()
            ->merge(Profile::hairLengths($this->state['hairLengths'])->get())->unique()
            ->merge(Profile::hairColors($this->state['hairColors'])->get())->unique()
            ->merge(Profile::skinStatuses($this->state['skinStatuses'])->get())->unique()
            ->merge(Profile::bodyStatuses($this->state['bodyStatuses'])->get())->unique()
            ->merge(Profile::shelterWays($this->state['shelterWays'])->get())->unique()
            ->merge(Profile::shelterShapes($this->state['shelterShapes'])->get())->unique()
            ->merge(Profile::shelterTypes($this->state['shelterTypes'])->get())->unique()
            ->merge(Profile::childrenDesireStatuses($this->state['childrenDesireStatuses'])->get())->unique()
            ->merge(Profile::polygamyStatuses($this->state['polygamyStatuses'])->get())->unique()
            ->merge(Profile::childrenStatuses($this->state['childrenStatuses'])->get())->unique()
            ->merge(Profile::friendStatuses($this->state['friendStatuses'])->get())->unique()
            ->merge(Profile::showStatuses($this->state['showStatuses'])->get())->unique()
            ->merge(Profile::musicStatuses($this->state['musicStatuses'])->get())->unique()
            ->merge(Profile::tafaqahStatuses($this->state['tafaqahStatuses'])->get())->unique()
            ->merge(Profile::robeStatuses($this->state['robeStatuses'])->get())->unique()
            ->merge(Profile::headdresses($this->state['headdresses'])->get())->unique()
            ->merge(Profile::readingQurans($this->state['readingQurans'])->get())->unique()
            ->merge(Profile::fastings($this->state['fastings'])->get())->unique()
            ->merge(Profile::alfajrPrayers($this->state['alfajrPrayers'])->get())->unique()
            ->merge(Profile::prayers($this->state['prayers'])->get())->unique()
            ->merge(Profile::obligations($this->state['obligations'])->get())->unique()
            ->merge(Profile::religionMethods($this->state['religionMethods'])->get())->unique()
            ->merge(Profile::religions($this->state['religions'])->get())->unique()
            ->merge(Profile::acceptWifeStudyStatuses($this->state['acceptWifeStudyStatuses'])->get())->unique()
            ->merge(Profile::acceptWifeWorkStatuses($this->state['acceptWifeWorkStatuses'])->get())->unique()
            ->merge(Profile::workStatuses($this->state['workStatuses'])->get())->unique()
            ->merge(Profile::educationStatuses($this->state['educationStatuses'])->get())->unique()
            ->merge(Profile::marriageStatuses($this->state['marriageStatuses'])->get())->unique()
            ->merge(Profile::relationshipStatuses($this->state['relationshipStatuses'])->get())->unique()
            ->merge(Profile::relocateStatuses($this->state['relocateStatuses'])->get())->unique()
            ->merge(Profile::maritalStatuses($this->state['maritalStatuses'])->get())->unique()
            ->merge(Profile::foodTypes($this->state['foodTypes'])->get())->unique()
            ->merge(Profile::allHobbies($this->state['hobbies'])->get())->unique()
            ->merge(Profile::countriesOfResidences($this->state['countriesOfResidences'])->get())->unique()
            ->merge(Profile::countriesHome($this->state['countries'])->get())->unique()
            ->merge(Profile::nationalities($this->state['nationalities'])->get())->unique();

        $usersResults = collect();
        $profiles->map(function ($profile) use ($usersResults) {
            $profile->with('user')->get();
            $usersResults->push($profile->user);
        });
        session()->flash('usersResults', $usersResults);
        redirect()->route('requests');
    }
}
