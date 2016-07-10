@extends('layout')
@section('title')
    Profesores
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5 ">
                <h1>Profesores registrados:</h1>
            </div>
            <div class="col-md-4 ">
                <br>
                <button type="button" class="btn btn-info " data-toggle="modal" data-target="#infoProfesores" aria-label="Left Align" >
                    <span class="glyphicon glyphicon-info-sign glyphicon-align-left" aria-hidden="true"></span>
                </button>
            </div>
        </div>
    </div>
    <hr>
    @if($profesores)
        <div class="container ">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-condensed ">
                    <tr class="info">
                        <td align="center"><strong>Nombre</strong></td>
                        <td align="center"><strong>Apellido</strong></td>
                        <td align="center"><strong>Código</strong></td>
                        <td align="center"><strong>correo</strong></td>
                    </tr>
                    @foreach($profesores as $profesor)
                        <tr>
                            <td align="center"> {{$profesor->nombre}}</td>
                            <td align="center"> {{$profesor->apellido}}</td>
                            <td align="center"> <a href="/{{$profesor->id}}">{{$profesor->codigo}}</a></td>
                            <td align="center"> {{$profesor->correo}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-md-5">
                <h3 class="alert alert-info">No hay profesores registrados aún.</h3>
            </div>
        </div>
    @endif
    <div class="modal fade" id="infoProfesores" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel"><span class="glyphicon glyphicon-info-sign glyphicon-align-left" aria-hidden="true"></span> Información</h4>
                </div>
                <div class="modal-body">
                    <p align="justify">
                        En esta sección encontrarás una tabla con todos los profesores registrados (si hay). <br> <br>En el campo de "código" verás
                        que es un link que te enviará a una página donde se listan todos los cursos que tiene asociado el profesor con el
                        código que seleccionaste. Si no aparece ningún curso, es porque aún no tiene cursos asignados ese profesor.
                    </p>
                </div>

            </div>
        </div>
    </div>
@endsection