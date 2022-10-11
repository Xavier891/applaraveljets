<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudios', function (Blueprint $table) {
            $table->integer('idEstudio');
            $table->string('Nombre', 50)->default('');
            $table->integer('depto')->nullable();
            $table->string('Abreviatura', 10)->nullable();
            $table->string('Tomas', 2)->nullable();
            $table->string('Frecuencia', 10)->nullable();
            $table->string('Tipoformato', 60)->nullable();
            $table->mediumText('Notas')->nullable();
            $table->string('TiempoProceso', 30)->nullable();
            $table->string('TipoMuestra', 20)->nullable();
            $table->mediumText('Instrucciones')->nullable();
            $table->mediumText('DatosTecnicos')->nullable();
            $table->mediumText('Encabezado')->nullable();
            $table->string('Tubo', 15)->nullable();
            $table->string('Noaplicadescuento', 1)->nullable();
            $table->boolean('esperfil')->default(0);
            $table->string('sucursal', 2);
            $table->dateTime('fecha_act')->nullable()->index('fecha_act');
            $table->dateTime('fecha_sync')->nullable();
            $table->string('flag_sucursales', 50)->nullable();
            $table->integer('eliminar')->default(0);
            $table->string('SucProceso', 2)->default('00');
            $table->timestamps();
            $table->integer('estxsol_idEstxSol');
            $table->integer('estxsol_solicitud_IdSolicitud');
            $table->integer('estxsol_solicitud_empresas_idEmpresa');
            $table->integer('estxsol_solicitud_pacientes_idPaciente');
            $table->integer('deptos_id');
            
            $table->primary(['idEstudio', 'estxsol_idEstxSol', 'estxsol_solicitud_IdSolicitud', 'estxsol_solicitud_empresas_idEmpresa', 'estxsol_solicitud_pacientes_idPaciente', 'deptos_id']);
            $table->index(['sucursal', 'Nombre'], 'Nombre');
            $table->index(['sucursal', 'Abreviatura'], 'Abreviatura');
            $table->index(['sucursal', 'depto'], 'ESTUDIOSDepto');
            $table->foreign('estxsol_idEstxSol', 'fk_estudios_estxsol1')->references('idEstxSol')->on('estxsol')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('deptos_id', 'fk_estudios_deptos1')->references('id')->on('deptos')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estudios');
    }
}
