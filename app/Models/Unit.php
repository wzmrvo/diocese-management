<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Unit extends Model
{
    use HasFactory;

    protected $fillable = [
        'vicariate_id',
        'name',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    /**
     * A unit belongs to a vicariate.
     *
     * units.vicariate_id → vicariates.id
     */
    public function vicariate(): BelongsTo
    {
        return $this->belongsTo(
            Vicariate::class,
            'vicariate_id',
            'id'
        );
    }

    /**
     * A unit has many members.
     *
     * units.id → users.unit_id
     */
    public function members(): HasMany
    {
        return $this->hasMany(
            User::class,
            'unit_id',
            'id'
        );
    }
}