@extends('layout')
@section('title')
    Cursos
@endsection

@section('content')
    <h1>Cursos del profesor {{$profesor->nombre}} {{$profesor->apellido}}</h1>
    <hr>
    <ul>
        @foreach($cursos as $curso)
            <li>
                <h4>{{$curso->nombre}}</h4>
            </li>
        @endforeach

    </ul>
@endsection