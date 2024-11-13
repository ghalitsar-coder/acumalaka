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
        Schema::create('services', function (Blueprint $table) {
            $table->id('id_service');
            $table->enum('service_type', ['standard', 'comfort', 'luxury'])->default('standard');
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('services');
    }
};
