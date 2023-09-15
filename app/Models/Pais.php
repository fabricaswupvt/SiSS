<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    public $timestamps = false;
    protected $table = 'pais';
    protected $primaryKey = 'idpais';

    protected $fillable = ['nombre_pais']; // Campos que se pueden asignar masivamente

    use HasFactory;
}
