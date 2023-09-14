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

    // Relación con el modelo Coordinador
    use HasFactory;
}
