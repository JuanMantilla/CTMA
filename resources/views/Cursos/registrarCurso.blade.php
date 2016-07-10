@extends('layout')
@section('title')
    Curso
@endsection

@section('content')
    <h1>Registrar un curso</h1>
    <hr>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Registrar un nuevo curso</div>
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

                        <form class="form-horizontal" role="form" method="POST" action="{{route('registrarCurso')}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Nombre</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="nombre" value="{{ old('name') }}" placeholder="Nombre del curso" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Descripción</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="descripcion" value="{{ old('descripcion') }}" placeholder="Ingresa acá la descripción del curso" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Codigo del profesor</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="codigoProfesor" value="{{ old('codigoProfesor') }}" placeholder="Ingresa acá el código del profesor del curso" required>
                                </div>
                            </div>
                            <div class="input-append date form_datetime">
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Fecha inicial</label>
                                    <div class="col-md-4 ">
                                        <input class="form-control" type="datetime" name="fechaInicial"value="" readonly  placeholder="Selecciona la inicial del curso" required>
                                    </div>
                                    <div class="col-md-2">
                                    <span class="add-on">
                                        <i class="icon-th"><span class="glyphicon glyphicon-calendar"></span></i>
                                    </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="close" class="btn btn-primary"  data-toggle="modal" data-target="#confirmacion">
                                        Registrar curso
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
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
    <script type="text/javascript" src="js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
    <script type="text/javascript" src="js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
    <script type="text/javascript">
        $('.form_datetime').datetimepicker({
            //language:  'fr',
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            forceParse: 0,
            showMeridian: 1
        });


    </script>
@endsection
