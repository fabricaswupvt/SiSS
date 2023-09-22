<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    public $timestamps = false;
    protected $table = 'direccion';
    protected $primaryKey = 'iddireccion';

    protected $fillable = ['calle', 'no_ext', 'no_int', 'referencia']; // Campos que se pueden asignar masivamente

    // Relación con el modelo Colonia
    
    public function lugarPrestacion()
    {
        return $this->hasMany(LugarPrestacion::class, 'id_direccion');
    }
    public function colonia()
{
    return $this->belongsTo(Colonia::class, 'id_colonia');
}
    use HasFactory;
}
