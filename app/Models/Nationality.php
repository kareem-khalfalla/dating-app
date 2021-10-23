<?php

namespace App\Models;

class Nationality extends Model
{
    public function getName(): string
    {
        $locale = app()->getLocale();
        $langsAvailable = array_keys(json_decode($this->name, true));
        
        if (in_array($locale, $langsAvailable)) {
            return json_decode($this->name, true)[$locale];
        } else {
            return json_decode($this->name, true)['en'];
        }
    }
}
