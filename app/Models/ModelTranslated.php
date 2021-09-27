<?php

namespace App\Models;

use Spatie\Translatable\HasTranslations;

abstract class ModelTranslated extends Model
{
    use HasTranslations;

    public array $translatable = [
        'name',
    ];
}