<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Curso;
class Profesor extends Model
{
    protected $table = 'profesores';
    protected $fillable = ['nombre', 'apellido', 'codigo', 'correo'];

    public function cursos()
    {
        return $this->hasMany('App\Curso');
    }
}
