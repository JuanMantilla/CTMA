<?php

namespace App\Http\Controllers;

use App\Curso;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Profesor;
use DB;
use App;

class profesorController extends Controller
{
    public function index()
    {
        return view('Profesores/registro_profesor');
    }
    //Función que permite guardar un profesor
    public function store(Request $request)
    {
        //Intenta agregar al profesor
        try{
            $profesor = new Profesor([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'codigo' => $request->codigo,
            'correo' => $request->email,
            ]);
            $profesor->save();
            $profesorAgregado = DB::table('profesores')
                ->where('codigo', '=', $request->codigo)
                ->get();
            if($profesorAgregado){
                $message = "Se creó el profesor satisfactoriamente";
                echo "<script type='text/javascript'>alert('$message');</script>";
                return view('Profesores/registro_profesor');
            }else{
                $message = "No se pudo crear el profesor ocurrió un problema inesperado";
                echo "<script type='text/javascript'>alert('$message');</script>";
            }
        }//si no pudo agregar el profesor porque el código del mismo ya existe, alerta la razón
        catch (\Exception $e) {
            $message = "No se pudo crear el profesor ya que el código que ingresaste ya existe";
            echo "<script type='text/javascript'>alert('$message');</script>";
            return view('Profesores/registro_profesor');
        }
    }
    public function ver()
    {
        $profesores= DB::select('select * from profesores');
        return view('Profesores/profesores')->with(['profesores' => $profesores]);
    }
    public function listarCursos($id)
    {
        $profesor = App\Profesor::find($id);
        $cursos = $profesor->cursos;
        return view('Profesores/cursosProfesor')->with(['cursos' =>$cursos, 'profesor'=>$profesor]);
    }
}
