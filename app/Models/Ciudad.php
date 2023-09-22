<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    public $timestamps = false;
    protected $table = 'ciudad';
    protected $primaryKey = 'idciudad';

    protected $fillable = ['nombre_ciudad']; // Campos que se pueden asignar masivamente

    // Relación con el modelo Municipio
    public function municipio(){
        return $this->belongsTo(Municipio::class,'id_municipio');
    }
    use HasFactory;
}
