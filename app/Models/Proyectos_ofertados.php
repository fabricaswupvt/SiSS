<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyectos_ofertados extends Model
{
    public $timestamps = false;
    protected $table = 'proyectos_ofertados';
    protected $primaryKey = 'idproyecto';
    protected $fillable = ['tipo_proyecto', 'perfil', 'duracion', 'estimulo', 'tipo_lug_part', 'coordinador', 'aprobacionDG', 'area', 'denominacion', 'justificacion', 'objetivos', 'actividades', 'alcances', 'evaluacion', 'convenioPDF', 'tipo_duracion','id_lugar_prestacion','estatus'];

    public function coordinadors()
    {
        return $this->belongsTo(Coordinador::class, 'coordinador', 'idcoordinador')->with('persona');
    }

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'id_persona', 'idpersona')->via('coordinador');
    }

    public function area()
    {
        return $this->belongsTo(Areas::class,'area','idarea');
    }

    public function lugar_prestacion()
    {
        return $this->belongsTo(Areas::class,'id_lugar_prestacion','idlugar_prestacion');
    }
    use HasFactory;
}
