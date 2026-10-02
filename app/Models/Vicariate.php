<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vicariate extends Model
{
    protected $fillable = [
        'name',
        'code',
        'is_active',
    ];

    /**
     * Get all units belonging to this Vicariate.
     */
    public function units(): HasMany
    {
        return $this->hasMany(Unit::class);
    }

    /**
     * Get all users assigned to this Vicariate.
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}