<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Address extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function _user (): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function _city (): BelongsTo
    {
        return $this->belongsTo(City::class, 'city');
    }

}
