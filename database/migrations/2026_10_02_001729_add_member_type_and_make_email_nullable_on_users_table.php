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
            // Senior or Junior member classification
            // Nullable because administrators are not necessarily
            // classified as Senior or Junior members.
            $table->string('member_type')
                ->nullable()
                ->after('organization_level');

            // Allow members to exist before their official email
            // address has been provided.
            $table->string('email')
                ->nullable()
                ->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Restore email as required.
            $table->string('email')
                ->nullable(false)
                ->change();

            // Remove Senior / Junior classification.
            $table->dropColumn('member_type');
        });
    }
};
