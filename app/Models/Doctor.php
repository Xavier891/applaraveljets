<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'doctores';

    protected $fillable = ['sucursal','doctor','Paterno','Materno','Nombre','Direccion','Especialidad1','Especialidad2','Fec_alta','Pacientes_Mes','Pacientes_Acum','Importe_mes','Importe_Acum','Centro','Tels','Estado','Municipio','Localidad','cp','Colonia','fecha_act','fecha_sync','flag_sucursales','eliminar','CedProf','FecNac','Sexo','email'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function solicituds()
    {
        return $this->hasMany('App\Models\Solicitud', 'Doctor');
    }
    
}
