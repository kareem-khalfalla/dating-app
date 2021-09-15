<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class Message extends Model
{
    public function scopeBetweenTwoUsers(Builder $query, int $id): Builder
    {
        $authId = auth()->id();
        return $query->where(function ($query) use ($id, $authId) {
            $query->where('from', $id)->where('to', $authId);
        })->oRwhere(function ($query) use ($id, $authId) {
            $query->where('from', $authId)->where('to', $id);
        });
    }

    public function getCreatedAtAttribute(string $attr): string
    {
        return Carbon::parse($attr)->diffForHumans();
    }

    public function scopeLatestToAuthId(Builder $query): Builder
    {
        return $query->where('to', auth()->id());
    }
}
