<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelLugPresDepto extends Model
{
    public $timestamps = false;
    protected $table = 'rel_lug_pres_depto';
    protected $primaryKey = 'idrel_lug_pres_depto';

    public function responsable()
    {
        return $this->hasOne(Responsable::class, 'id_lp_depto');
    }

    use HasFactory;
}
