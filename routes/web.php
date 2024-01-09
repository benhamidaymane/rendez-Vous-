<?php

use App\Http\Controllers\AControler;
use App\Http\Controllers\adminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\contact;
use App\Http\Controllers\controllerDoctor;
use App\Http\Controllers\controllerHopital;
use App\Http\Controllers\controllerServices;
use App\Http\Controllers\PDFcontroller;
use App\Http\Controllers\Auth\CustomLogoutController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/','App\Http\Controllers\AControler@index');
Route::post('/search','App\Http\Controllers\searchController@search');



Route::resource('/Appointment',AControler::class);
Route::resource('/contacts',contact::class)->middleware('auth');
Route::resource('/hopital',controllerHopital::class)->middleware('auth');
Route::resource('/doctor',controllerDoctor::class);
Route::resource('/services',controllerServices::class)->middleware('auth');

Route::get('/pdf_user',[PDFcontroller::class,'index']);

Route::get('/admine', [LoginController::class, 'showLoginForm']);


Route::group(['middleware'=>['auth','admin']],function(){
    Route::resource('/admin',adminController::class);
});

Route::post('/generate-pdf','App\Http\Controllers\VilleController@generatePDF');
Route::get('/medecin-pdf/{id}', 'App\Http\Controllers\VilleController@medecinPDF')->name('medecin.pdf');
 

Route::post('/Appointment/ville-get', 'App\Http\Controllers\VilleController@ville');
Route::post('/Appointment/hopital-get', 'App\Http\Controllers\VilleController@hopital');
Route::post('/Appointment/service-get', 'App\Http\Controllers\VilleController@service');
Route::post('/Appointment/patient-count', 'App\Http\Controllers\VilleController@patientCount');
Route::post('contacts/{contact}/status', 'App\Http\Controllers\VilleController@updateStatus')->name('contacts.updateStatus');
Route::get('/patients/{id}', 'App\Http\Controllers\VilleController@show');
Route::get('/doctor/{id}', 'App\Http\Controllers\VilleController@showDoctor');
Route::get('/service/{id}', 'App\Http\Controllers\VilleController@showService');


Route::get('/medecins','App\Http\Controllers\medecinController@index');



Route::post('/logout', [CustomLogoutController::class, 'logout']);
Route::get('/Analyses','App\Http\Controllers\analyseController@index');




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/patient/{id}','App\Http\Controllers\medecinController@show');
