@extends('layout')
@section('title')
    Cursos
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5 ">
                <h1>Cursos registrados:</h1>
            </div>
            <div class="col-md-4 ">
                <br>
                <button type="button" class="btn btn-info " data-toggle="modal" data-target="#infoCursos" aria-label="Left Align" >
                    <span class="glyphicon glyphicon-info-sign glyphicon-align-left" aria-hidden="true"></span>
                </button>
            </div>
        </div>
    </div>
    <hr>
    @if($cursos)
        <div class="container ">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-condensed ">
                    <tr class="info">
                        <td align="center"><strong>Nombre</strong></td>
                        <td align="center"><strong>Año</strong></td>
                        <td align="center"><strong>Periodo</strong></td>
                        <td align="center"><strong>Fecha inicial</strong></td>
                        <td align="center"><strong>Descripcion</strong></td>
                        <td align="center"><strong>Profesor</strong></td>
                    </tr>
                    @foreach($cursos as $curso)
                        <tr>
                            <td align="center"> {{$curso->nombre}}</td>
                            <td align="center"> {{$curso->año}}</td>
                            <td align="center"> {{$curso->periodo}}</td>
                            <td align="center"> {{$curso->fecha_inicial}}</td>
                            <td align="center"> {{$curso->descripcion}}</td>
                            <td align="center"> <a href="/{{$curso->profesor->id}}">{{$curso->profesor->nombre}} {{$curso->profesor->apellido}} </a></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-md-5">
                <h3 class="alert alert-info">No hay cursos registrados aún.</h3>
            </div>
        </div>
    @endif

    <div class="modal fade" id="infoCursos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel"><span class="glyphicon glyphicon-info-sign glyphicon-align-left" aria-hidden="true"></span> Información</h4>
                </div>
                <div class="modal-body">
                    <p align="justify">
                        En esta sección encontrarás una tabla con todos los cursos registrados (si hay). <br> <br>En el campo de "Profesor" verás
                        que es un link que te enviará a una página donde se listan todos los cursos que tiene asociado el profesor que seleccionaste.
                        Si no aparece ningún curso, es porque aún no tiene cursos asignados ese profesor.
                    </p>
                </div>

            </div>
        </div>
    </div>
@endsection