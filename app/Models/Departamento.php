<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    public $timestamps = false;
    protected $table = 'departamento';
    protected $primaryKey = 'iddepartamento';

    protected $fillable = ['nombre_depto']; // Campos que se pueden asignar masivamente

    // Relación con el modelo Coordinador
    use HasFactory;
}
