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
        Schema::create('reservation_services', function (Blueprint $table) {
            $table->id('id_reservation_service');
            $table->foreignId('id_reservation')->constrained('reservations', 'id_reservation');
            $table->foreignId('id_service')->constrained('services', 'id_service');
            $table->decimal('total_price', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservation_services');
    }
};
