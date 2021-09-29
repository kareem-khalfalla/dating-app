<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function states(): HasMany
    {
        return $this->hasMany(State::class);
    }
}
