<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Profesor;
class Curso extends Model
{
    protected $table = 'cursos';
    protected $fillable = ['nombre', 'descripcion', 'periodo', 'año', 'fecha_inicial', 'profesor_id'];

    public function profesor()
    {
        return $this->belongsTo('App\Profesor');
    }
}
