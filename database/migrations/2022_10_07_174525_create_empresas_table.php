<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->integer('idEmpresa')->primary();
            $table->string('sucursal', 2);
            $table->string('Nombre', 250);
            $table->string('cp', 10)->nullable();
            $table->string('tel1', 20)->nullable();
            $table->string('tel2', 20)->nullable();
            $table->dateTime('Fec_convenio')->nullable();
            $table->string('tipo_tarifa', 4);
            $table->string('contacto', 50)->nullable();
            $table->string('colonia', 100)->nullable();
            $table->integer('descuento')->nullable();
            $table->integer('Pacientes_Mes')->nullable();
            $table->integer('Pacientes_Acum')->nullable();
            $table->integer('Importe_Mes')->nullable();
            $table->integer('Importe_Acum')->nullable();
            $table->integer('Saldo')->nullable();
            $table->string('rfc', 15)->nullable();
            $table->string('direccion', 250)->nullable();
            $table->string('Ciudad', 100)->nullable();
            $table->string('Entidad', 100)->nullable();
            $table->string('Tipo_Empresa', 50)->nullable();
            $table->string('Fecha_Corte', 2)->nullable();
            $table->string('dias_pago', 2)->nullable();
            $table->double('Acum_estudios')->nullable();
            $table->string('Cla_Ant', 6)->nullable();
            $table->string('UsaTarifaDe', 3)->nullable();
            $table->string('SiUsa', 50)->nullable();
            $table->string('numero', 100)->nullable();
            $table->string('pais', 100)->nullable();
            $table->dateTime('fecha_act')->nullable()->index('fecha_act');
            $table->dateTime('fecha_sync')->nullable();
            $table->string('flag_sucursales', 50)->nullable();
            $table->integer('eliminar')->default(0);
            $table->timestamps();
            
            $table->index(['sucursal', 'Nombre`(191'], 'nombre');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresas');
    }
}
