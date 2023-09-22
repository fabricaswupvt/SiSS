<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    public $timestamps = false;
    protected $table = 'contacto';
    protected $primaryKey = 'idcontacto';

    protected $fillable = ['telefono_fijo', 'celular', 'telefono_ref', 'correo']; // Campos que se pueden asignar masivamente

    // Relación con el modelo Coordinador
    public function coordinador()
    {
        return $this->hasOne(Coordinador::class, 'id_contacto', 'id');
    }
    use HasFactory;
}
