<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LugarPrestacion extends Model
{
    public $timestamps = false;
    protected $table='lugar_prestacion';
    protected $primaryKey = 'idlugar_prestacion';
    
    protected $fillable = ['rfc','nombre_lp','sector','tipolp','giro'];
    //Establecer las relaciones con lo modelos
    public function direccion(){
        return $this->belongsTo(Direccion::class,'id_direccion','iddireccion');
    }

    public function proyectos_ofertados(){
        return $this->belongsTo(Proyectos_ofertados::class,'id_lugar_prestacion','idlugar_prestacion');
    }

    use HasFactory;
}
