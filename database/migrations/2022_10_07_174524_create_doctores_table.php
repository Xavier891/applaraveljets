<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctores', function (Blueprint $table) {
            $table->integer('idDoctor')->primary();
            $table->string('sucursal', 2);
            $table->string('doctor', 150)->nullable()->index('doctor');
            $table->string('Paterno', 30)->nullable();
            $table->string('Materno', 30)->nullable();
            $table->string('Nombre', 30)->nullable();
            $table->string('Direccion', 100)->nullable();
            $table->string('Especialidad1', 30)->nullable();
            $table->string('Especialidad2', 30)->nullable();
            $table->dateTime('Fec_alta')->default('2017-01-01 00:00:00');
            $table->integer('Pacientes_Mes')->nullable();
            $table->integer('Pacientes_Acum')->nullable();
            $table->integer('Importe_mes')->nullable();
            $table->integer('Importe_Acum')->nullable();
            $table->string('Centro', 30)->nullable();
            $table->mediumText('Tels')->nullable();
            $table->string('Estado', 100)->nullable();
            $table->string('Municipio', 100)->nullable();
            $table->string('Localidad', 3)->nullable();
            $table->string('cp', 5)->nullable();
            $table->string('Colonia', 100)->nullable();
            $table->dateTime('fecha_act')->nullable()->index('fecha_act');
            $table->dateTime('fecha_sync')->nullable();
            $table->string('flag_sucursales', 50)->nullable();
            $table->integer('eliminar')->default(0);
            $table->string('CedProf', 100)->nullable();
            $table->date('FecNac')->nullable();
            $table->string('Sexo', 1)->nullable();
            $table->string('email', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctores');
    }
}
