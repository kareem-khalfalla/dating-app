<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

class Friendship extends Model
{
    public function scopeOnlyFriends(Builder $query): Builder
    {
        return $query->where('to', auth()->id())->where('status', 1);
    }

    public function scopePendingRequests(Builder $query): Builder
    {
        return $query->where('from', auth()->id())->where('status', 2);
    }

    public function getStatusAttribute(int $attr): string
    {
        return [
            0 => 'No request',
            1 => 'Accepted',
            2 => 'Pending',
        ][$attr];
    }
}
