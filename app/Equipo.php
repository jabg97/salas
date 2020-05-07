<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
        protected $fillable = ['sala', 'tipo_procesador', 'ram', 'hdd', 'so', 'monitor', 'fecha_mantenimiento', 'observacion', 'activo'];
}
