<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    public $timestamps = false;
    protected $table = 'estado';
    protected $primaryKey = 'idestado';

    protected $fillable = ['nombre_edo']; // Campos que se pueden asignar masivamente

    // Relación con el modelo Pais
    public function pais(){
        return $this->belongsTo(Pais::class,'id_pais');
    }
    use HasFactory;
}
