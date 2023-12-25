<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'phone',
        'sec_phone',
        'delivery_phone',
        'password',
        'avatar',
        'city',
        'gender',
        'lang',
        'active',
        'remember_token',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];

    // relationships

    public function _city (): BelongsTo
    {
        return $this->belongsTo(City::class, 'city');
    }

    public function _addresses (): HasMany
    {
        return $this->hasMany(Address::class, 'user_id');
    }

    public function _cart (): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'carts', 'user', 'product')->withPivot('id', 'quantity', 'type');
    }

    public function _favoriteProducts (): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'favorites', 'user', 'favorite_id');
    }

    public function _favoriteVendors (): BelongsToMany
    {
        return $this->belongsToMany(Vendor::class, 'favorites', 'user', 'favorite_id');
    }

    // JWT methods

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims(): array
    {
        return [];
    }
}
