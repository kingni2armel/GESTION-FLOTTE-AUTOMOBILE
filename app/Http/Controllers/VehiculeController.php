<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Modele;
use App\Models\Marque;
use App\Models\Vehicule;
use App\Models\ModelMarque;
use App\Models\Parking;
use App\Models\TypeCarburant;

class VehiculeController extends Controller
{
    //
    /**
     * 
     * function qui permet d'aller a la page de creation d'un vehicule
     */
    public function GETPAGECREATEVEHICULE()
    {

             $listemarque = Marque::all();
             $listemodele = Modele::all();
             $listeparking= Parking::all();
             $listetypecarburant = TypeCarburant::all();
             return view('vehicule.addvehicule',
             [
                 'listemarque'=>$listemarque,
                'listemodele'=>$listemodele,
                'listeparking'=>$listeparking,
                'listetypecarburant'=>$listetypecarburant
             ]);
    }

    /***
     * 
     *  function qui permet de creer un vehicule
     */

     public function CREATEVEHICULE(Request $request)
     {  
                $request->validate([
                    'marquevehicule'=>['required'],
                    'modelevehicule'=>['required'],
                    'typecarburantvehicule'=>['required'],
                    'parkingvehicule'=>['required'],
                    'immatriculationvehicule'=>['required'],
                    'kilometragevehicule'=>['required'],
                    'numerochassivehicule'=>['required'],
                    'datedebutasurancevehicule'=>['required'],
                    'datefinasurancevehicule'=>['required'],
                    
                ]); 

                $formatdatedebut = $request->datedebutasurancevehicule->format('Y/m/d');
                $formatdatefin =  $request->datefinasurancevehicule->format('Y/m/d');

                $createvehicule = Vehicule::create([
                    'marque_id'=>$request->marquevehicule,
                    'modele_id'=>$request->modelevehicule,
                    'type_carburant_id'=>$request->typecarburantvehicule,
                    'parking_id'=>$request->parkingvehicule,
                    'immatriculation'=>$request->immatriculationvehicule,
                    'kilometrage'=>$request->modelevehicule,
                    'numero_chassi'=>$request->numerochassivehicule,
                    'date_debut_assurance'=>$request->formatdatedebut,
                    'modele_id'=>$request->formatdatefin,

                ]);

                return redirect()->route('GETPAGECREATEVEHICULE');
            
        
     }
}
