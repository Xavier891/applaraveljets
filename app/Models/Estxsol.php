<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estxsol extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'estxsols';

    protected $fillable = ['sucursal','solicitud','MuestraId','Depto','Estudio','Tomas','Faltantes','Importe','Estatus','Observaciones','Fecha','Imprimir','Tubo','abreviatura','TipoFormato','Noaplicadescuento','VerificadoPor','Publicado','WordPDF','Precio','Iva','ivaprct','descimpte','descprct','GrupoPerfil','EsPerfil','fecha_act','fecha_sync','flag_sucursales','eliminar','NombrePerfil','nombrepaciente'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estudio()
    {
        return $this->hasOne('App\Models\Estudio', 'Clave', 'Estudio');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function solicitud()
    {
        return $this->hasOne('App\Models\Solicitud', 'Solicitud', 'solicitud');
    }
    
}
