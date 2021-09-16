<?php

namespace App\Models;

use App\Traits\Friendable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, Friendable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'username',
        'gender',
        'last_seen_at',
        'last_message_at',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getRouteKeyName(): string
    {
        return 'username';
    }

    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }

    public function scopeAllExceptAuthId(Builder $query): Builder
    {
        return $query->where('id', '!=', Auth::id());
    }

    public function scopeAllExceptAuthName(Builder $query, string $search): Builder
    {
        return $query->where('name', 'like', "%$search%")->where('name', '!=', auth()->user()->name);
    }

    public function scopeOrderByLastMsg(Builder $query): Builder
    {
        return $query->latest('last_message_at');
    }

    public function isOnline(): bool
    {
        return Cache::has('user-online-' . $this->id);
    }

    public function scopeAuth(Builder $query): Builder
    {
        return $query->where('id', auth()->id());
    }
}
