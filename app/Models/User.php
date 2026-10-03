<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'email',
        'password',

        'role',
        'status',

        'member_type',

        'organization_level',
        'position',

        'contact_number',

        'vicariate_id',
        'unit_id',
    ];

    /**
     * The attributes that should be hidden.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Attribute casting.
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    /**
     * Vicariate relationship.
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
     * CWL Unit / Parish relationship.
     *
     * IMPORTANT:
     * The relationship is called cwlUnit()
     * because the users table already has a
     * column named "unit".
     */
    public function cwlUnit(): BelongsTo
    {
        return $this->belongsTo(
            Unit::class,
            'unit_id',
            'id'
        );
    }

    /**
     * Officer assignments.
     */
    public function officerAssignments(): HasMany
    {
        return $this->hasMany(
            OfficerAssignment::class
        );
    }
}