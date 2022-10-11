<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->integer('idPaciente')->primary();
            $table->string('sucursal', 2);
            $table->string('Paciente', 150)->nullable()->index('paciente');
            $table->string('Paterno', 30)->nullable();
            $table->string('Materno', 30)->nullable();
            $table->string('Nombre', 30)->nullable();
            $table->dateTime('FecNac')->nullable();
            $table->string('Sexo', 1)->nullable();
            $table->string('Calle', 100)->nullable();
            $table->string('Numero', 100)->nullable();
            $table->string('Rfc', 15)->nullable();
            $table->integer('Estudios')->nullable();
            $table->dateTime('Ult_solicitud')->nullable();
            $table->dateTime('Fec_alta')->nullable();
            $table->integer('Importe')->nullable();
            $table->integer('Importe_Acum')->nullable();
            $table->integer('Saldo')->nullable();
            $table->string('EmpresaAnt', 5)->nullable();
            $table->string('suc_empresa', 2);
            $table->string('Empresa', 3);
            $table->string('Foraneo', 1)->nullable();
            $table->string('Descuento', 2)->nullable();
            $table->string('Titular', 1)->nullable();
            $table->string('Estado', 100)->nullable();
            $table->string('Municipio', 100)->nullable();
            $table->string('Localidad', 3)->nullable();
            $table->string('Cp', 5)->nullable();
            $table->string('Colonia', 100)->nullable();
            $table->string('Credencial', 10)->nullable();
            $table->string('NumCredencial', 15)->nullable();
            $table->string('Telefono', 15)->nullable();
            $table->string('NumEmpleado', 20)->nullable();
            $table->string('Pais', 100)->nullable();
            $table->string('cliente', 250)->nullable();
            $table->string('email', 100)->nullable();
            $table->dateTime('fecha_act')->nullable()->index('fecha_act');
            $table->dateTime('fecha_sync')->nullable();
            $table->string('flag_sucursales', 50)->nullable();
            $table->integer('eliminar')->default(0);
            $table->integer('enviarwhatsapp')->default(0);
            $table->timestamps();
            
            $table->index(['suc_empresa', 'Empresa'], 'empresa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pacientes');
    }
}
