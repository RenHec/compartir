<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');

Route::resource('bimestre', 'escuela\catalogo\BimestreController')->except(['create', 'store', 'show', 'edit', 'update', 'destroy']); //REALIZADO EL 09/09
Route::resource('carrera', 'escuela\catalogo\CarreraController')->except(['show']); //REALIZADO EL 09/09
Route::resource('curso', 'escuela\catalogo\CursoController'); //REALIZADO EL 11/09
Route::resource('cursoGS', 'escuela\catalogo\CursoGSController'); //REALIZADO EL 11/09
Route::resource('departamento', 'escuela\catalogo\DepartamentoController'); //REALIZADO EL 12/09
Route::resource('grado', 'escuela\catalogo\GradoController'); //REALIZADO EL 12/09
Route::resource('gradoSeccion', 'escuela\catalogo\GradoSeccionController')->except(['show']); //REALIZADO EL 12/09
Route::resource('mes','escuela\catalogo\MesController'); //REALIZADO EL 12/09
Route::resource('seccion', 'escuela\catalogo\SeccionController')->except(['show']); //REALIZADO EL 13/09
Route::resource('tipoFondo', 'escuela\catalogo\TipoFondoController')->except(['show']); //REALIZADO EL 13/09
Route::resource('tipoPagoAlumno', 'escuela\catalogo\TipoPagoAlumnoController'); //REALIZADO EL 13/09

Route::resource('usuario', 'escuela\seguridad\UsuarioController'); //REALIZADO EL 14/09

Route::resource('alumno', 'escuela\sistema\AlumnoController')->except(['show']); //REALIZADO EL 14/09
Route::resource('alumnoGrado', 'escuela\sistema\AlumnoGradoController')->except(['create', 'store', 'show', 'edit', 'update', 'destroy']); //REALIZADO EL 14/09
Route::resource('catedratico', 'escuela\sistema\CatedraticoController'); //REALIZADO EL 14/09
Route::resource('catedraticoCurso','escuela\sistema\CatedraticoCursoController')->except(['create', 'edit', 'update']); //REALIZADO EL 15/09
Route::resource('catedraticoCurso','escuela\sistema\CatedraticoCursoController')->except(['create', 'edit', 'update']); //REALIZADO EL 15/09
Route::resource('fondo','escuela\sistema\FondoController')->except(['create', 'show', 'edit', 'update']); //REALIZADO EL 15/09
Route::resource('nota', 'escuela\sistema\NotaController')->except(['index', 'create', 'show', 'edit', 'update', 'destroy']); //REALIZADO EL 15/09
Route::name('nota.asignar')->get('asignar/nota/{grado_seccion_id}/{curso_id}', 'escuela\sistema\NotaController@asignar'); //REALIZADO EL 
Route::resource('inscripcion', 'escuela\sistema\InscripcionController')->except(['edit', 'update']); //REALIZADO EL 16/09
Route::name('inscripcion.create_siguiente')->get('create_siguiente/inscripcion', 'escuela\sistema\InscripcionController@create_siguiente'); //REALIZADO EL 
Route::name('inscripcion.store_siguiente')->post('store_siguiente/inscripcion', 'escuela\sistema\InscripcionController@store_siguiente'); //REALIZADO EL 
Route::resource('mensualidad', 'escuela\sistema\MensualidadController')->except(['create', 'show', 'edit', 'update', 'destroy']); //REALIZADO EL 16/09
Route::resource('pagoCatedratico','escuela\sistema\PagoCatedraticoController')->except(['create', 'edit', 'update', 'destroy']); //REALIZADO EL 17/09
Route::resource('persona','escuela\sistema\PersonaController')->except(['show']); //REALIZADO EL 17/09
Route::resource('municipio','escuela\catalogo\MunicipioController'); //REALIZADO EL 17/09
Route::resource('promedio','escuela\sistema\PromedioController')->except(['create', 'store', 'show', 'edit', 'update', 'destroy']); //REALIZADO EL 17/09

Route::name('comprobante.inscripcion')->get('comprobante/inscripcion/{pago_alumno}', 'ComprobanteController@inscripcion');
Route::name('comprobante.mensualidad')->get('comprobante/mensualidad/{pago_alumno}', 'ComprobanteController@mensualidad');
Route::name('comprobante.pago_catedratico')->get('comprobante/pago_catedratico/{mes}', 'ComprobanteController@pago_catedratico');

Route::name('reporte.inscripcion_view')->get('reporte/inscripcion_view', 'ReporteController@inscripcion_view');
Route::name('reporte.inscripcion_report')->get('reporte/inscripcion_report/{anio}', 'ReporteController@inscripcion_report');
Route::name('reporte.mensualidad_view')->get('reporte/mensualidad_view', 'ReporteController@mensualidad_view');
Route::name('reporte.mensualidad_report')->get('reporte/mensualidad_report/{anio}', 'ReporteController@mensualidad_report');
