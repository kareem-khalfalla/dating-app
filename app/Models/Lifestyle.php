<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Lifestyle extends Model
{
    public function profile(): BelongsTo
    {
        return $this->belongsTo(Profile::class);
    }

    public function smoke(): BelongsTo
    {
        return $this->belongsTo(Smoke::class);
    }

    public function alcohol(): BelongsTo
    {
        return $this->belongsTo(Alcohol::class);
    }

    public function halalFood(): BelongsTo
    {
        return $this->belongsTo(HalalFood::class);
    }

    public function food(): BelongsTo
    {
        return $this->belongsTo(Food::class);
    }

    public function hobbies(): BelongsToMany
    {
        return $this->belongsToMany(Hobby::class);
    }
}