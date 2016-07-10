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
            //verifica que efectivamente se haya creado el profesor
            $profesorAgregado = DB::table('profesores')
                ->where('codigo', '=', $request->codigo)
                ->get();
            //Si sí se agregó, muestra el mensaje satisfactorio en forma de alerta
            if($profesorAgregado){
                $message = "Se creó el profesor satisfactoriamente";
                echo "<script type='text/javascript'>alert('$message');</script>";
                return view('Profesores/registro_profesor');
            }
            //Si no se agregó, muestra la alerta
            else{
                $message = "No se pudo crear el profesor ocurrió un problema inesperado";
                echo "<script type='text/javascript'>alert('$message');</script>";
            }
        } 
        //Tomo la excepción que vendría por duplicación del código ya que este es único en la DB
        catch (\Exception $e) {
            $message = "No se pudo crear el profesor ya que el código que ingresaste ya existe";
            echo "<script type='text/javascript'>alert('$message');</script>";
            return view('Profesores/registro_profesor');
        }
    }
    public function ver()
    {
        //Selecciona todos los profesores de la base de datos y los manda a la vista
        $profesores= DB::select('select * from profesores');
        return view('Profesores/profesores')->with(['profesores' => $profesores]);
    }
    public function listarCursos($id)
    {
        //Busca el profesor solicitado y lo guarda como un objeto de tipo Profesor en la variable profesor
        $profesor = App\Profesor::find($id);
        //Guarda todos los cursos asignados al profesor solicitado en la variable cursos
        $cursos = $profesor->cursos;
        //retorna la vista con las variables creadas anteriormente
        return view('Profesores/cursosProfesor')->with(['cursos' =>$cursos, 'profesor'=>$profesor]);
    }
}
