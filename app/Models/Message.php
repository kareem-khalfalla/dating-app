<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class Message extends Model
{
    public function scopeBetweenTwoUsers(Builder $query, int $id): Builder
    {
        $authId = auth()->id();

        return $query->where('from', $authId)->where('to', $id)
            ->orWhere('from', $id)->orWhere('to', $authId);
    }

    public function getCreatedAtAttribute(string $attr): string
    {
        return Carbon::parse($attr)->diffForHumans();
    }
}
