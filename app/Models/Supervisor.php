<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supervisor extends Model
{
    public $timestamps = false;
    protected $table = 'supervisor';
    protected $primaryKey = 'idsupervisor';

    protected $fillable = ['cargo',]; // Campos que se pueden asignar masivamente

    // Relación con el modelo Persona y Contacto
    public function persona(){
        return $this->belongsTo(Direccion::class,'id_persona','idpersona');
    }
    public function contacto(){
        return $this->belongsTo(Direccion::class,'id_contacto','idcontacto');
    }
    use HasFactory;
}
