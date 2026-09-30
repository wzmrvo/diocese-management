<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('status')->default('pending')->after('role');
            $table->string('organization_level')->nullable()->after('status');
            $table->string('position')->nullable()->after('organization_level');
            $table->string('vicariate')->nullable()->after('position');
            $table->string('unit')->nullable()->after('vicariate');
            $table->string('contact_number')->nullable()->after('unit');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'status',
                'organization_level',
                'position',
                'vicariate',
                'unit',
                'contact_number',
            ]);
        });
    }
};