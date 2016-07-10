<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/RegistrarCurso',[
        'uses'=>'cursoController@index',
        'as'  => 'RegistrarCurso'
    ]
);

Route::post('/RegistrarCurso',[
        'uses'=>'cursoController@store',
        'as'  => 'registrarCurso'
    ]
);
Route::get('/RegistrarProfesor',[
        'uses'=>'profesorController@index',
        'as'  => 'RegistrarProfesor'
    ]
);

Route::post('/RegistrarProfesor',[
        'uses'=>'profesorController@store',
        'as'  => 'registrarProfesor'
    ]
);

Route::get('/verCursos',[
        'uses'=>'cursoController@ver',
        'as'  => 'verCursos'
    ]
);
Route::get('/ListarProfesores',[
        'uses'=>'profesorController@ver',
        'as'  => 'ListarProfesores'
    ]
);

Route::get('/{id}',[
        'uses'=>'profesorController@listarCursos',
        'as'  => 'ListarCursos'
    ]
);
Route::get('/verCursos',[
        'uses'=>'cursoController@verCursos',
        'as'  => 'ListarCursos'
    ]
);