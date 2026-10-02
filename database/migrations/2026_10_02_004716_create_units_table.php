<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('units', function (Blueprint $table) {
            $table->id();

            $table->foreignId('vicariate_id')
                ->constrained('vicariates')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->string('name');

            $table->string('code')
                ->nullable();

            $table->boolean('is_active')
                ->default(true);

            $table->timestamps();

            $table->unique([
                'vicariate_id',
                'name',
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('units');
    }
};