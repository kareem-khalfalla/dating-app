<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class Message extends Model
{
    public function scopeBetweenTwoUsers(Builder $query, int $selectedUserId, int $userId): Builder
    {
        return $query->where(function ($query) use ($selectedUserId, $userId) {
            $query->where('from', $selectedUserId)->where('to', $userId);
        })->oRwhere(function ($query) use ($selectedUserId, $userId) {
            $query->where('from', $userId)->where('to', $selectedUserId);
        });
    }

    public function getCreatedAtAttribute(string $attr): string
    {
        return Carbon::parse($attr)->diffForHumans();
    }

    public function scopeToAuthId(Builder $query): Builder
    {
        return $query->where('to', auth()->id());
    }
}
