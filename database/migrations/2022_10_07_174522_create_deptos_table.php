<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeptosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deptos', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('sucursal', 2)->default('00');
            $table->string('Depto', 35)->nullable();
            $table->dateTime('fecha_act')->nullable()->index('fecha_act');
            $table->dateTime('fecha_sync')->nullable();
            $table->string('flag_sucursales', 50)->nullable();
            $table->integer('eliminar')->default(0);
            $table->timestamps();
            
            $table->unique(['sucursal', 'Depto'], 'depto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deptos');
    }
}
