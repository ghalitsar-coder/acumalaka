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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id('id_reservation');
            $table->foreignId('id_guest')->constrained('guests', 'id_guest')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_room')->constrained('rooms', 'id_room')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_staff')->constrained('staff', 'id_staff')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_service')->constrained('services', 'id_service')->onDelete('cascade')->onUpdate('cascade');
            $table->date('check_in_date');
            $table->date('check_out_date');
            $table->decimal('total_price', 10, 2);
            $table->string('status', 20);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservations');
    }
};
