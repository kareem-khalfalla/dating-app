<?php

namespace App\Models;

use App\Traits\Friendable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, Friendable;

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
        'fake',
        'status',
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

    public function isAdmin(): bool
    {
        return $this->role == 'admin';
    }

    public function scopeSwapGender(BUilder $query): Builder
    {
        return $query->where('gender', '!=', auth()->user()->gender);
    }

    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }

    public function reports(): HasMany
    {
        return $this->hasMany(Report::class, 'recipient_id');
    }

    public function scopeAllExceptAuthId(Builder $query): Builder
    {
        return $query->where('id', '!=', Auth::id());
    }

    public function scopeAllExceptAuthName(Builder $query, string $search): Builder
    {
        return $query->where('name', 'like', "%$search%")->where('name', '!=', auth()->user()->name);
    }

    public function scopeAllAuthFriendsByLastMsg(Builder $query, string $search = ''): Builder
    {
        /** @var \App\Models\User $authUser */
        $authUser = auth()->user();
        return $authUser->getFriends()->latest('last_message_at')->where('name', 'like', "%$search%");
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

    public function scopeFake(Builder $query): Builder
    {
        return $query->where('fake', 1);
    }
}
