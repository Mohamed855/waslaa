<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Complain extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $dates = ['deleted_at'];

    // relationships

    public function vendor (): BelongsTo
    {
        return $this->belongsTo(Vendor::class,'vendor');
    }

    public function users (): BelongsTo
    {
        return $this->belongsTo(User::class,'user');
    }
}
