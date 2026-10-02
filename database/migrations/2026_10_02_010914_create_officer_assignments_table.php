<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('officer_assignments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreignId('term_id')
                ->constrained('terms')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->string('organization_level');

            $table->string('position');

            $table->foreignId('vicariate_id')
                ->nullable()
                ->constrained('vicariates')
                ->nullOnDelete()
                ->cascadeOnUpdate();

            $table->foreignId('unit_id')
                ->nullable()
                ->constrained('units')
                ->nullOnDelete()
                ->cascadeOnUpdate();

            $table->timestamps();

            $table->index([
                'term_id',
                'organization_level',
            ]);

            $table->index([
                'vicariate_id',
                'unit_id',
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('officer_assignments');
    }
};