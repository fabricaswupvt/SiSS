<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{
    public $timestamps = false;
    protected $table = 'responsable';
    protected $primaryKey = 'idresponsable';

    protected $fillable = ['cargo',]; // Campos que se pueden asignar masivamente

    // Relación con el modelo Persona y Contacto
    public function persona(){
        return $this->belongsTo(Persona::class,'id_persona');
    }
    public function contacto(){
        return $this->belongsTo(Contacto::class,'id_contacto');
    }

    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'id_lp_depto');
    }
    use HasFactory;
}
