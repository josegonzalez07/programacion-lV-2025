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
    Schema::create('tbl_vehiculos', function (Blueprint $table) {
        $table->id('idVehiculo');
        $table->string('marca', 25);
        $table->string('modelo', 25);
        $table->integer('year');
        $table->char('num_motor', 25);
        $table->char('num_chasis', 25);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_vehiculos');
    }
};
