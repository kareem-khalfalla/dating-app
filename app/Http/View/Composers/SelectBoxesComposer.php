<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Country;
use App\Models\Language;
use App\Models\Nationality;

class SelectBoxesComposer
{
    public function compose(View $view): void
    {
        $view->with('countries', Country::all());
        $view->with('nationalities', Nationality::all());
        $view->with('languages', Language::all());
    }
}
