@extends('layout')
@section('title')
    Registro profesor
@endsection

@section('content')
    <h1>Registrar un profesor</h1>
    <hr>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Registrar un nuevo profesor</div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> Hubo errores con los datos ingresados.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form class="form-horizontal" role="form" method="POST" action="{{route('registrarProfesor')}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Nombre</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="nombre" value="{{ old('name') }}" placeholder="Nombre del profesor" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Apellido</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="apellido" value="{{ old('descripcion') }}" placeholder="Ingresa acá el apellido del proesor" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Codigo del profesor</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="codigo" value="{{ old('codigo') }}" placeholder="Ingresa acá el código del profesor del curso" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">E-Mail</label>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" placeholder="Ingresa el correo del profesor" value="{{ old('email') }} "required>
                                </div>
                            </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="close" class="btn btn-primary"  data-toggle="modal" data-target="#confirmacion">
                                            Registrar profesor
                                        </button>
                                    </div>
                                </div>
                                <div class="modal fade" tabindex="-1" role="dialog" id="confirmacion">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="none" class="close" data-dismiss="modal"  aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">Agregar curso</h4>
                                            </div>
                                            <div class="modal-body">
                                                <p>¿Está seguro de que quiere registrar este nuevo curso?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                                <button type="submit" class="btn btn-primary" name="Registrarse">Sí, guardar cambios</button>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
@endsection