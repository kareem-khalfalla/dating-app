<?php

namespace App\Models;

class Country extends Model
{
    public function getTranslationsAttribute(string $attr): array
    {
        return json_decode($attr, true);
    }

    public function getCountryLocale(): string
    {
        $locale = app()->getLocale() == 'ar'
            ? 'fa'
            : app()->getLocale();

        return $this->translations[$locale] ?? $this->name;
    }
}
