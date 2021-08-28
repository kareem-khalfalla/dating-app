<?php

namespace App\Models;

use Spatie\Translatable\HasTranslations;

class Nationality extends Model
{
    use HasTranslations;

    public array $translatable = [
        'name'
    ];
}