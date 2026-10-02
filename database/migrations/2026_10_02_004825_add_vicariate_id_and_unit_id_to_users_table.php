<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('vicariate_id')
                ->nullable()
                ->after('organization_level')
                ->constrained('vicariates')
                ->nullOnDelete()
                ->cascadeOnUpdate();

            $table->foreignId('unit_id')
                ->nullable()
                ->after('vicariate_id')
                ->constrained('units')
                ->nullOnDelete()
                ->cascadeOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['vicariate_id']);
            $table->dropForeign(['unit_id']);

            $table->dropColumn([
                'vicariate_id',
                'unit_id',
            ]);
        });
    }
};