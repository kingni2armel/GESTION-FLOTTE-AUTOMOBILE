<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\ChauffeurController;
use  App\Http\Controllers\UserController;
use  App\Http\Controllers\RegionController;
use  App\Http\Controllers\VilleController;
use  App\Http\Controllers\ParkingController;
use  App\Http\Controllers\TypeCarburantController;
use  App\Http\Controllers\MarqueController;
use  App\Http\Controllers\ModeleController;
use  App\Http\Controllers\VehiculeController;
use  App\Http\Controllers\DirectionController;
use  App\Http\Controllers\DepartementController;
use  App\Http\Controllers\ServiceController;
use  App\Http\Controllers\ClientController;
use  App\Http\Controllers\ReservationController;










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


Route::get('/', function () {
    return view('welcome');
});
Route::get('/login',[UserController::class,'GOCONNECT'])->name('GOCONNECT');

Route::get('/redirection',[UserController::class,'Redirection'])->name('Redirection');

Route::post('/login',[UserController::class,'Authenticate'])->name('Authenticate');
Route::get('/logout',[UserController::class,'Logout'])->name('Logout');


/**
 * les controlleurs de creation des utilisateurs
 * 
 *  */  
Route::get('/dashboard',[UserController::class,'GetPage'])->name('GetPage')
->middleware('auth');

Route::get('/adduser',[UserController::class,'GETPAGES'])->name('GETPAGES')
->middleware('auth');
Route::post('/adduser',[UserController::class,'ADDUSER'])->name('ADDUSER')
->middleware('auth');
Route::get('/updateuser',[UserController::class,'GETPAGEUPDATE'])->name('GETPAGEUPDATE')
->middleware('auth');
Route::get('/listeuser',[UserController::class,'GETLISTEUSER'])->name('GETLISTEUSER')
->middleware('auth');
Route::post('userupdate/{id}',[UserController::class,'UPDATEUSER'])->name('UPDATEUSER')
->middleware('auth');
Route::post('deleteuser/{id}',[UserController::class,'DELETEUSER'])->name('DELETEUSER')
->middleware('auth');
/*

* les controlleurs de du chauffeur
* 
*  */  

Route::get('/addchauffeur',[ChauffeurController::class,'GETPAGE'])->name('GETPAGE')
->middleware('auth');
Route::post('/addchauffeur',[ChauffeurController::class,'CREATECHAUFFEUR'])->name('CREATECHAUFFEUR')
->middleware('auth');
Route::get('/listechauffeur',[ChauffeurController::class,'GETLISTECHAUFFEUR'])->name('GETLISTECHAUFFEUR')
->middleware('auth');
Route::get('/updatechauffeur',[ChauffeurController::class,'GETPAGEUPDATECHAUFFEUR'])->name('GETPAGEUPDATECHAUFFEUR')
->middleware('auth');

Route::post('updatechauffeur/{id}/{idu}',[ChauffeurController::class,'UPDATECHAUFFEUR'])->name('UPDATECHAUFFEUR')
->middleware('auth');
Route::post('deletechauffeur/{id}',[ChauffeurController::class,'DELETECHAUFFEUR'])->name('DELETECHAUFFEUR')
->middleware('auth');


/***
 *  lea routes de la region
 * 
 */

Route::get('/addregion',[RegionController::class,'GETPAGEREGION'])->name('GETPAGEREGION')
->middleware('auth');
Route::post('/addregion',[RegionController::class,'CREATEREGION'])->name('CREATEREGION')
->middleware('auth');
Route::get('/listeregion',[RegionController::class,'GETLISTEREGION'])->name('GETLISTEREGION')
->middleware('auth');

Route::get('/updateregion',[RegionController::class,'GETPAGEUPDATEREGION'])->name('GETPAGEUPDATEREGION')
->middleware('auth');
Route::post('updateregion/{id}',[RegionController::class,'UPDATEREGION'])->name('UPDATEREGION')
->middleware('auth');

Route::post('deleteregion/{id}',[RegionController::class,'DELETEREGION'])->name('DELETEREGION')
->middleware('auth');


/***
 *  les routes de la ville
 * 
 */


Route::get('/addville',[VilleController::class,'GETPAGECREATEVILLE'])->name('GETPAGECREATEVILLE')
->middleware('auth');
Route::post('/addville',[VilleController::class,'CREATEVILLE'])->name('CREATEVILLE')
->middleware('auth');
Route::get('/listeville',[VilleController::class,'GETLISTEVILLE'])->name('GETLISTEVILLE')
->middleware('auth');
Route::get('/updateville',[VilleController::class,'GETPAGEUPDATEVILLE'])->name('GETPAGEUPDATEVILLE')
->middleware('auth');
Route::post('updateville/{id}',[VilleController::class,'UPDATEVILLE'])->name('UPDATEVILLE')
->middleware('auth');
Route::post('deleteville/{id}',[VilleController::class,'DELETEVILLE'])->name('DELETEVILLE')
->middleware('auth');


/***
 *  les routes du parking
 * 
 */

 Route::get('/addparking',[ParkingController::class,'GETPAGECREATEPARKING'])->name('GETPAGECREATEPARKING')
 ->middleware('auth');
 Route::post('/addparking',[ParkingController::class,'CREATEPARKING'])->name('CREATEPARKING')
 ->middleware('auth');
 Route::get('/listeparking',[ParkingController::class,'GETLISTEPARKING'])->name('GETLISTEPARKING')
 ->middleware('auth');
 Route::get('/updateparking',[ParkingController::class,'GETPAGEUPDATEPARKING'])->name('GETPAGEUPDATEPARKING')
 ->middleware('auth');
 Route::post('updateparking/{id}',[ParkingController::class,'UPDATEPARKING'])->name('UPDATEPARKING')
 ->middleware('auth');
 Route::post('deleteparking/{id}',[ParkingController::class,'DELETEPARKING'])->name('DELETEPARKING')
 ->middleware('auth');


 /***
  *  les routes du type carburant
  */

  Route::get('addcarburant',[TypeCarburantController::class,'GETPAGECREATETYPECARBURANT'])->name('GETPAGECREATETYPECARBURANT')
  ->middleware('auth');
  Route::post('createcarburant',[TypeCarburantController::class,'CREATETYPECARBURANT'])->name('CREATETYPECARBURANT')
  ->middleware('auth');
  Route::get('listecarburant',[TypeCarburantController::class,'GETLISTETYPECARBURANT'])->name('GETLISTETYPECARBURANT')
  ->middleware('auth');
  Route::get('updatecarburant',[TypeCarburantController::class,'GETPAGEUPDATECARBURANT'])->name('GETPAGEUPDATECARBURANT')
  ->middleware('auth');
  Route::post('updatecarburant/{id}',[TypeCarburantController::class,'UPDATECARBURANT'])->name('UPDATECARBURANT')
  ->middleware('auth');
  Route::post('deletecarburant/{id}',[TypeCarburantController::class,'DELETECARBURANT'])->name('DELETECARBURANT')
  ->middleware('auth');

  /***
  *  les routes de marque
  */

  Route::get('addmarque',[MarqueController::class,'GETPAGECREATEMARQUE'])->name('GETPAGECREATEMARQUE')
  ->middleware('auth');
  Route::post('createmarque',[MarqueController::class,'CREATEMARQUE'])->name('CREATEMARQUE')
  ->middleware('auth');
  Route::get('listemarque',[MarqueController::class,'GETLISTEMARQUE'])->name('GETLISTEMARQUE')
  ->middleware('auth');
  Route::get('updatemarque',[MarqueController::class,'GETPAGEUPDATEMARQUE'])->name('GETPAGEUPDATEMARQUE')
  ->middleware('auth');
  Route::post('updatemarque/{id}',[MarqueController::class,'UPDATEMARQUE'])->name('UPDATEMARQUE')
  ->middleware('auth');
  Route::post('deletemarque/{id}',[MarqueController::class,'DELETEMARQUE'])->name('DELETEMARQUE')
  ->middleware('auth');

  /***
          *  les controlleurs de modele de vehicule
  */


  Route::get('addmodele',[ModeleController::class,'GETPAGECREATEMODELE'])->name('GETPAGECREATEMODELE')
    ->middleware('auth');
    Route::post('createmodel',[ModeleController::class,'CREATEMODELE'])->name('CREATEMODELE')
    ->middleware('auth');
    Route::get('listemodele',[ModeleController::class,'GETLISTEMODELE'])->name('GETLISTEMODELE')
    ->middleware('auth');
    Route::get('updatemodele',[ModeleController::class,'GETPAGEUPDATEMODELE'])->name('GETPAGEUPDATEMODELE')
    ->middleware('auth');
    Route::post('updatemodele/{id}',[ModeleController::class,'UPDATEMODELE'])->name('UPDATEMODELE')
    ->middleware('auth');
    Route::post('deletemodele/{id}',[ModeleController::class,'DELETEMODELE'])->name('DELETEMODELE')
    ->middleware('auth');

    /***
          *  les controlleurs de vehicule
  */


  Route::get('addvehicule',[VehiculeController::class,'GETPAGECREATEVEHICULE'])->name('GETPAGECREATEVEHICULE')
  ->middleware('auth');
  Route::post('createhicule',[VehiculeController::class,'CREATEVEHICULE'])->name('CREATEVEHICULE')
  ->middleware('auth');
  Route::get('listevehicule',[VehiculeController::class,'GETLISTEVEHICULE'])->name('GETLISTEVEHICULE')
  ->middleware('auth');
  Route::get('updatevehicule',[VehiculeController::class,'GETPAGEUPDATEVEHICULE'])->name('GETPAGEUPDATEVEHICULE')
  ->middleware('auth');
  Route::post('updatevehicule/{id}',[VehiculeController::class,'UPDATEVEHICULE'])->name('UPDATEVEHICULE')
  ->middleware('auth');
  Route::post('deletevehicule/{id}',[VehiculeController::class,'DELETEVEHICULE'])->name('DELETEVEHICULE')
  ->middleware('auth');

  /**
   * les controlleurs de direction
   */

  Route::get('adddirection',[DirectionController::class,'GETPAGECREATEDIRECTION'])->name('GETPAGECREATEDIRECTION')
  ->middleware('auth');
  Route::post('createdirection',[DirectionController::class,'CREATEVEDIRECTION'])->name('CREATEVEDIRECTION')
  ->middleware('auth');
  Route::get('listedirection',[DirectionController::class,'GETLISTEDIRECTION'])->name('GETLISTEDIRECTION')
  ->middleware('auth');
  Route::get('updatedirection',[DirectionController::class,'GETPAGEUPDATEDIRECTION'])->name('GETPAGEUPDATEDIRECTION')
  ->middleware('auth');
  Route::post('updatedirection/{id}',[DirectionController::class,'UPDATEDIRECTION'])->name('UPDATEDIRECTION')
  ->middleware('auth');
  Route::post('deletedirection/{id}',[DirectionController::class,'DELETEDIRECTION'])->name('DELETEDIRECTION')
  ->middleware('auth');


  /**
   * les controlleurs des departements
   */


  Route::get('adddepartement',[DepartementController::class,'GETPAGECREATEDEPARTEMENT'])->name('GETPAGECREATEDEPARTEMENT')
  ->middleware('auth');
  Route::post('createdepartement',[DepartementController::class,'CREATEVEDEPARTEMENT'])->name('CREATEVEDEPARTEMENT')
  ->middleware('auth');
  Route::get('listedepartement',[DepartementController::class,'GETLISTEDEPARTEMENT'])->name('GETLISTEDEPARTEMENT')
  ->middleware('auth');
  Route::get('updatedepartement',[DepartementController::class,'GETPAGEUPDATEDEPARTEMENT'])->name('GETPAGEUPDATEDEPARTEMENT')
  ->middleware('auth');
  Route::post('updatedepartement/{id}',[DepartementController::class,'UPDATEDEPARTEMENT'])->name('UPDATEDEPARTEMENT')
  ->middleware('auth');
  Route::post('deletedepartement/{id}',[DepartementController::class,'DELETEDEPARTEMENT'])->name('DELETEDEPARTEMENT')
  ->middleware('auth');

  /***
   * les controlleurs de services
   */

  Route::get('addservice',[ServiceController::class,'GETPAGECREATESERVICE'])->name('GETPAGECREATESERVICE')
  ->middleware('auth');
  Route::post('createservice',[ServiceController::class,'CREATESERVICE'])->name('CREATEVESERVICE')
  ->middleware('auth');
  Route::get('listeservice',[ServiceController::class,'GETLISTESERVICE'])->name('GETLISTESERVICE')
  ->middleware('auth');
  Route::get('updateservice',[ServiceController::class,'GETPAGEUPDATESERVICE'])->name('GETPAGEUPDATESERVICE')
  ->middleware('auth');
  Route::post('updateservice/{id}',[ServiceController::class,'UPDATESERVICE'])->name('UPDATESERVICE')
  ->middleware('auth');
  Route::post('deleteservice/{id}',[ServiceController::class,'DELETESERVICE'])->name('DELETESERVICE')
  ->middleware('auth');

    /***
   * les controlleurs du client+
   */

  Route::get('addclient',[ClientController::class,'GETPAGECREATECLIENT'])->name('GETPAGECREATECLIENT')
  ->middleware('auth');
  Route::post('createclient',[ClientController::class,'CREATECLIENT'])->name('CREATECLIENT')
  ->middleware('auth');
  Route::get('listeclient',[ClientController::class,'GETLISTECLIENT'])->name('GETLISTECLIENT')
  ->middleware('auth');
  Route::get('updateclient',[ClientController::class,'GETPAGEUPDATECLIENT'])->name('GETPAGEUPDATECLIENT')
  ->middleware('auth');
  Route::post('updateclient/{id}',[ClientController::class,'UPDATECLIENT'])->name('UPDATECLIENT')
  ->middleware('auth');
  Route::post('deleteclient/{id}',[ClientController::class,'DELETECLIENT'])->name('DELETECLIENT')
  ->middleware('auth');


  /**
   * 
   * les routes du client concernand la reservation 
   */

  Route::get('createreservation',[ReservationController::class,'GETPAGECREATERESERVATION'])->name('GETPAGECREATERESERVATION')
  ->middleware('auth');

  Route::post('/createreservation',[ReservationController::class,'CREATERSERVATION'])->name('CREATERSERVATION')
  ->middleware('auth');
  Route::get('/mesreservations',[ReservationController::class,'GETPAGELISTERESERVATIONBYID'])->name('GETPAGELISTERESERVATIONBYID')
  ->middleware('auth');

  Route::get('/updatereservation',[ReservationController::class,'GETPAGEUPDATRESERVATION'])->name('GETPAGEUPDATRESERVATION')
  ->middleware('auth');
  
  Route::post('updatereservation/{id}',[ReservationController::class,'UPDATERESERVATION'])->name('UPDATERESERVATION')
  ->middleware('auth');
   
  Route::post('deletereservation/{id}',[ReservationController::class,'DELETERESERVATION'])->name('DELETERESERVATION')
  ->middleware('auth');
  
/** ROUTE QUI PERMET AUX UTILISATEURS SAUF LE CLIENT D'AVOIR ACCESS A LA LISTE DES RESERVATION */

Route::get('listereservation',[ReservationController::class,'GETLISTERESERVATIONONTRAITE'])->name('GETLISTERESERVATIONONTRAITE')
->middleware('auth');

/**
 * route qui permet d'aller a la page de traitement d'une reservation;
 */

 Route::get('traitement',[ReservationController::class,'GETPAGETRAITEMENT'])->name('GETPAGETRAITEMENT')
 ->middleware('auth');

 Route::get('telechargement',[ReservationController::class,'GETPAGEDOWNLOADFILE'])->name('GETPAGEDOWNLOADFILE')
->middleware('auth');

 Route::post('traitement/{id}',[ReservationController::class,'TraitementReservation'])->name('TraitementReservation')
 ->middleware('auth');