<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LugarPrestacion extends Model
{
    public $timestamps = false;
    protected $table='lugar_prestacion';
    protected $primaryKey = 'idlugar_prestacion';
    protected $fillable = [
        'nombre_lp',
        'rfc',
        'tipolp',
        'sector',
        'giro',
        'estatus',
        // Agrega aquí las columnas que deseas poder llenar mediante el modelo.
    ];


    
    //Establecer las relaciones con lo modelos
    public function direccion()
{
    return $this->belongsTo(Direccion::class, 'id_direccion');
}

    public function proyectos_ofertados(){
        return $this->belongsTo(Proyectos_ofertados::class,'id_lugar_prestacion','idlugar_prestacion');
    }

    public function relacionesDepto()
{
    return $this->hasMany(RelLugPresDepto::class, 'id_lugar_prest');
}

    public function relLugPresDeptos()
    {
        return $this->hasMany(RelLugPresDepto::class, 'id_lugar_prest')->onDelete('cascade');
    }

    


    use HasFactory;
}
