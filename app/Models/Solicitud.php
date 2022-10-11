<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'solicituds';

    protected $fillable = ['Id','sucursal','Solicitud','Folio','suc_paciente','paciente','Fecha','suc_doctor','Doctor','suc_empresa','Empresa','Tipo_Pago','Fecha_Entrega','Anticipo','Expediente','Importe','Tipo_toma','Estatus','Descuento','Facturar_a','Fur','Total','porcentaje','Fecha_Entregado','Factura','NomCredencial','Pagos','NumImpResultados','SeFactura','Impreso','Edad','EdadTipo','Sexo','pase','tel','Estudios','VerificadoPor','condicionesdepago','numcta','SolPDF','procesar','fecha_act','fecha_sync','flag_sucursales','eliminar','subtotal','iva','retivaprct','retivaimpte','retisrprct','retisrimpte'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function doctore()
    {
        return $this->hasOne('App\Models\Doctore', 'clave', 'Doctor');
    }
    
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
    public function estxsols()
    {
        return $this->hasMany('App\Models\Estxsol', 'solicitud', 'Solicitud');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function paciente()
    {
        return $this->hasOne('App\Models\Paciente', 'Clave', 'paciente');
    }
    
}
