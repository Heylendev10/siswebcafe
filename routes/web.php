<?php

Route::group(['middleware' => 'web'], function () {

    Route::get('login', function () {
        if (Auth::check()){
            if(Auth::user()->rol == 'Administrador'){
                return redirect('usuarios');
            }
            elseif (Auth::user()->rol == 'Supervisor'){
                return redirect('supervisor/fincas');
            }
            else{
                return redirect('logout');
            }
        }
        else{
            return view('auth.login');
        }
    })->name('login');

    Route::get('/', function () {
        if (Auth::check()){
            if(Auth::user()->rol == 'Administrador'){
                return redirect('usuarios');
            }
            elseif (Auth::user()->rol == 'Supervisor'){
                return redirect('supervisor/fincas');
            }
            else{
                return redirect('logout');
            }
        }
        else{
            return view('auth.login');
        }
    })->name('/');
	
	Route::get('recuperarpassword', function () {
        return view('auth.recuperar');
    })->name('recuperarpassword');

    Route::post('login', 'Auth\LoginController@login')->name('login');
    Route::get('logout', 'Auth\LoginController@logout')->name('logout');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');
	
	Route::post('recupass', 'Auth\LoginController@recuperarpassword')->name('recupass');
	
	
	Route::get('nuevapassword/{id}', 'Auth\LoginController@nuevapassword')->name('nuevapassword');
	
	
    //rutas administrador
    Route::get('usuarios', 'UsuarioController@usuarios')->name('usuarios');
    Route::post('registrarusuario', 'UsuarioController@regristrarUsuario')->name('registrarusuario');
    Route::get('verusuario/{id}', 'UsuarioController@verUsuario')->name('verusuario');
    Route::get('editusuario/{id}', 'UsuarioController@editUsuario')->name('editusuario');
    Route::post('actualizarusuario', 'UsuarioController@actualizarUsuario')->name('actualizarusuario');

    Route::get('editperfiladmin', 'UsuarioController@editPerfil')->name('editperfiladmin');
    Route::post('guardarperfiladmin', 'UsuarioController@guardarPerfil')->name('guardarperfiladmin');

    //finca
    Route::get('fincas', 'FincaController@fincas')->name('fincas');
    Route::post('registrarfinca', 'FincaController@regristrarFinca')->name('registrarfinca');
    Route::get('verfinca/{id}', 'FincaController@verFinca')->name('verfinca');
    Route::get('editfinca/{id}', 'FincaController@editFinca')->name('editfinca');
    Route::post('actualizarfinca', 'FincaController@actualizarFinca')->name('actualizarfinca');
    Route::get('asociarsuper/{id}', 'FincaController@asociarSuper')->name('asociarsuper');
    Route::post('registrarsuperfinca', 'FincaController@regristrarSuperFinca')->name('registrarsuperfinca');
    Route::post('registrarfechafinsuperfinca', 'FincaController@regristrarFechaFinSuperFinca')->name('registrarfechafinsuperfinca');

    //rutas supervisor
    Route::get('supervisor/fincas', 'SupervisorController@fincas')->name('supervisor/fincas');
    Route::get('origengeografico/{id}', 'SupervisorController@origenGeografico')->name('origengeografico');
    
    Route::get('cosechafinca/{id}', 'SupervisorController@cosechaFinca')->name('cosechafinca');
    Route::post('registrarcosecha', 'SupervisorController@regristrarCosecha')->name('registrarcosecha');
    Route::get('infocosecha/{id}', 'SupervisorController@infoCosecha')->name('infocosecha');
    Route::get('editcosecha/{id}', 'SupervisorController@editCosecha')->name('editcosecha');
    Route::post('actualizarcosecha', 'SupervisorController@actualizarCosecha')->name('actualizarcosecha');

    Route::get('siembrafinca/{id}', 'SupervisorController@siembraFinca')->name('siembrafinca');
    Route::post('registrarsiembra', 'SupervisorController@regristrarSiembra')->name('registrarsiembra');
    Route::get('infosiembra/{id}', 'SupervisorController@infoSiembra')->name('infosiembra');
    Route::get('editsiembra/{id}', 'SupervisorController@editSiembra')->name('editsiembra');
    Route::post('actualizarsiembra', 'SupervisorController@actualizarSiembra')->name('actualizarsiembra');

    Route::get('cultivofinca/{id}', 'SupervisorController@cultivoFinca')->name('cultivofinca');
    Route::post('registrarcultivo', 'SupervisorController@regristrarCultivo')->name('registrarcultivo');
    Route::get('infocultivo/{id}', 'SupervisorController@infoCultivo')->name('infocultivo');
    Route::get('editcultivo/{id}', 'SupervisorController@editCultivo')->name('editcultivo');
    Route::post('actualizarcultivo', 'SupervisorController@actualizarCultivo')->name('actualizarcultivo');

    Route::get('editperfil', 'SupervisorController@editPerfil')->name('editperfil');
    Route::post('guardarperfil', 'SupervisorController@guardarPerfil')->name('guardarperfil');

    Route::get('admincosecha/{id_finca}', 'FincaController@cosechaFinca')->name('admincosecha');
    Route::get('exportcosechafinca/{id_finca}', 'FincaController@exportCosecha')->name('exportcosechafinca');
    Route::get('exportcosecha/{id_finca}', 'FincaController@exportIndividualCosecha')->name('exportcosecha');
    Route::post('estadisticacosecha', 'FincaController@estadisticaCosecha')->name('estadisticacosecha');

});