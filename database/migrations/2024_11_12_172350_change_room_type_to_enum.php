<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('rooms', function (Blueprint $table) {
            // Check if the column doesn't exist before adding
            if (Schema::hasColumn('rooms', 'room_type')) {
                $table->enum('room_type', ['single', 'double', 'queen','king'])->default('single')->change();
            }
        });
    }

    public function down()
    {
        Schema::table('rooms', function (Blueprint $table) {
            // Check if the column exists before dropping
            if (Schema::hasColumn('rooms', 'room_type')) {
                $table->dropColumn('room_type');
            }
        });
    }
};
