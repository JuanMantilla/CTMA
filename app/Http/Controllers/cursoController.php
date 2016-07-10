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
        return view('Cursos/curso');
    }

    //Función que permite guardar un curso
    public function store(Request $request)
    {
        $fecha=$request->fechaInicial;
        $año= substr($fecha, -16, 4);
        $mes= substr($fecha, -11, 2);
        $mesInt = (int)$mes;
        $añoInt=(int)$año;
        $profesor = DB::table('profesores')
            ->where('codigo', '=', $request->codigoProfesor)
            ->get();
        foreach ($profesor as $profe){
            $id=$profe->id;
        }
        if($profesor){
            $message = "Se creó el curso satisfactoriamente";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
        else{
            $message = "El código del profesor que ingresaste no existe, por lo tanto, no se pudo crear el curso";
            echo "<script type='text/javascript'>alert('$message');</script>";
            return view('Cursos/curso');
        };
        if($mesInt>6){
            $periodo=02;
        }else{
            $periodo=01;
        }
        $curso = new Curso([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'periodo' => $periodo,
            'año' => $añoInt,
            'fecha_inicial' => $request->fechaInicial,
            'profesor_id' => $id,
        ]);
        $curso->save();
        return view('/index');
    }

    public function verCursos()
    {
        $cursos= Curso::all();
        return view('Cursos/cursos')->with('cursos', $cursos);
    }
}