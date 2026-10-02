<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('terms', function (Blueprint $table) {
            $table->id();

            // Example: FY 2025–2027
            $table->string('name');

            $table->unsignedSmallInteger('start_year');
            $table->unsignedSmallInteger('end_year');

            $table->date('starts_at')->nullable();
            $table->date('ends_at')->nullable();

            $table->boolean('is_active')->default(false);

            $table->timestamps();

            $table->unique([
                'start_year',
                'end_year',
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('terms');
    }
};