<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'empresa';

    protected $fillable = ['sucursal','Nombre','cp','tel1','tel2','Fec_convenio','tipo_tarifa','contacto','colonia','descuento','Pacientes_Mes','Pacientes_Acum','Importe_Mes','Importe_Acum','Saldo','rfc','direccion','Ciudad','Entidad','Tipo_Empresa','Fecha_Corte','dias_pago','Acum_estudios','Cla_Ant','UsaTarifaDe','SiUsa','numero','pais','fecha_act','fecha_sync','flag_sucursales','eliminar'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pacientes()
    {
        return $this->hasMany('App\Models\Paciente', 'Empresa', 'Clave');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function solicituds()
    {
        return $this->hasMany('App\Models\Solicitud', 'Empresa', 'Clave');
    }
    
}
