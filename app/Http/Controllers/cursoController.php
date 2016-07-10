<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Curso;
use DB;
use App;

class cursoController extends Controller
{
    public function index()
    {
        //retorna la vista de registrar un curso
        return view('Cursos/registrarCurso');
    }

    //Función que permite guardar un curso
    public function store(Request $request)
    {
        //Busco el profesor con el código del profesor que se le quiere asignar al curso a registrar
        $profesor = DB::table('profesores')
            ->where('codigo', '=', $request->codigoProfesor)
            ->get();
        //si se encuentra el profesor, continúa a crear y guardar el curso en la BD
        if($profesor){
            //maneja lo referente a la fecha del curso
            $fecha=$request->fechaInicial;
            $año= substr($fecha, -16, 4);
            $mes= substr($fecha, -11, 2);
            $mesInt = (int)$mes;
            $añoInt=(int)$año;
            foreach ($profesor as $profe){
                $id=$profe->id;
            }
            if($mesInt>6){
                $periodo=02;
            }else{
                $periodo=01;
            }
            //crea el curso y lo guarda en la BD
            $curso = new Curso([
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'periodo' => $periodo,
                'año' => $añoInt,
                'fecha_inicial' => $request->fechaInicial,
                'profesor_id' => $id,
            ]);
            $curso->save();
            //muestra el mensaje satisfactorio y retorna al index
            $message = "Se creó el curso satisfactoriamente";
            echo "<script type='text/javascript'>alert('$message');</script>";
            return view('/index');
        }
        //si no se encontró el profesor con el código dado, no se puede guardar el curso, acá se muestra ese mensaje 
        //como alerta y se devuelve a la vista de registrar un curso
        else{
            $message = "El código del profesor que ingresaste no existe, por lo tanto, no se pudo crear el curso";
            echo "<script type='text/javascript'>alert('$message');</script>";
            return view('Cursos/registrarCurso');
        }
    }

    public function verCursos()
    {
        //extraigo todos los cursos de la BD, los guarda en la variable cursos y retorna la vista de cursos
        $cursos= Curso::all();
        return view('Cursos/cursos')->with('cursos', $cursos);
    }
}
