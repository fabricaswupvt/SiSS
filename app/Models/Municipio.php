<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    public $timestamps = false;
    protected $table = 'municipio';
    protected $primaryKey = 'idmunicipio';

    protected $fillable = ['nombre_mun']; // Campos que se pueden asignar masivamente

    // Relación con el modelo Estado
    public function estado(){
        return $this->belongsTo(Direccion::class,'id_estado','idestado');
    }
    use HasFactory;
}
