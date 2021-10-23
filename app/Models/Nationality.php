<?php

namespace App\Models;

class Nationality extends Model
{
    protected $casts = [
        'name' => 'array'
    ];

    public function getName(): string
    {
        $locale = app()->getLocale();
        $langsAvailable = array_keys($this->name);

        if (in_array($locale, $langsAvailable)) {
            return $this->name[$locale];
        } else {
            return $this->name['en'];
        }
    }
}
