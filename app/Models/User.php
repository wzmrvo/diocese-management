<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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
     * The attributes that should be hidden
     * for serialization.
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

    /**
     * Vicariate relationship.
     */
    public function vicariate()
    {
        return $this->belongsTo(Vicariate::class);
    }

    /**
     * Unit / Parish relationship.
     */
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    /**
     * Officer assignments.
     */
    public function officerAssignments()
    {
        return $this->hasMany(OfficerAssignment::class);
    }
}