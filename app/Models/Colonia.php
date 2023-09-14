<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colonia extends Model
{
    public $timestamps = false;
    protected $table = 'colonia';
    protected $primaryKey = 'idcolonia';

    protected $fillable = ['nombre_col', 'cp']; // Campos que se pueden asignar masivamente

    // Relación con el modelo Coordinador
    use HasFactory;
}
