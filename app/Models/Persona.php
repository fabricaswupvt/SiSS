<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    public $timestamps = false;
    protected $table = 'persona';
    protected $primaryKey = 'idpersona';

    protected $fillable = ['titulo', 'nombre', 'ape_pat', 'ape_mat']; // Campos que se pueden asignar masivamente

    // Relación con el modelo Coordinador
    public function coordinador()
    {
        return $this->hasOne(Coordinador::class, 'id_persona', 'idpersona');
    }
    use HasFactory;
}
