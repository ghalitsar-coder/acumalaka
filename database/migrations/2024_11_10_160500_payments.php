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
        Schema::create('payments', function (Blueprint $table) {
            $table->id('id_payment');
            $table->foreignId('id_reservation')->constrained('reservations', 'id_reservation');
            $table->foreignId('id_staff')->constrained('staff', 'id_staff');
            $table->decimal('amount', 10, 2);
            $table->date('payment_date');
            $table->string('payment_method', 50);
            $table->enum('payment_status', ['pending', 'success', 'failed', 'completed'])->default('pending');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
