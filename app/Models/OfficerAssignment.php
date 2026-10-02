<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OfficerAssignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'term_id',
        'organization_level',
        'position',
        'vicariate_id',
        'unit_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function term(): BelongsTo
    {
        return $this->belongsTo(Term::class);
    }

    public function vicariate(): BelongsTo
    {
        return $this->belongsTo(Vicariate::class);
    }

    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }
}