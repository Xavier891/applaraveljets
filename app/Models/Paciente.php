<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'paciente';

    protected $fillable = ['sucursal','Clave','Paciente','Paterno','Materno','Nombre','FecNac','Sexo','Calle','Numero','Rfc','Estudios','Ult_solicitud','Fec_alta','Importe','Importe_Acum','Saldo','EmpresaAnt','suc_empresa','Empresa','Foraneo','Descuento','Titular','Estado','Municipio','Localidad','Cp','Colonia','Credencial','NumCredencial','Telefono','NumEmpleado','Pais','cliente','email','fecha_act','fecha_sync','flag_sucursales','eliminar','enviarwhatsapp'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function empresa()
    {
        return $this->hasOne('App\Models\Empresa', 'Clave', 'Empresa');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function solicituds()
    {
        return $this->hasMany('App\Models\Solicitud', 'paciente', 'Clave');
    }
    
}
