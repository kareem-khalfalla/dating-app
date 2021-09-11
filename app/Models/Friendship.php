<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

class Friendship extends Model
{
    public function scopeOnlyFriends(Builder $query): Builder
    {
        return $query->where('to', auth()->id())->where('status', 1);
    }
}
