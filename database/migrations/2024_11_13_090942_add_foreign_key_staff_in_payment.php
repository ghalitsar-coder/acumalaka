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
        Schema::table('payments', function (Blueprint $table) {
              if (!Schema::hasColumn('payments', 'id_staff')) {
                // $table->enum('role', ['admin', 'staff', 'guest'])->default('guest');
                $table->foreignId('id_staff')->constrained('staff', 'id_staff');

            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            //
            if (Schema::hasColumn('payments', 'id_staff')) {
                $table->dropForeign(['id_staff']);
                $table->dropColumn('id_staff');

            }
        });
    }
};
