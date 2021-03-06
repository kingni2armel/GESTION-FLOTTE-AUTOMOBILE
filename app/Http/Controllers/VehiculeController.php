<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
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
              
        $datedebut=$request->datedebutasurancevehicule;
        $datefin =$request->datefinasurancevehicule;
        //  $formatdatedebut = Carbon::createFromFormat('m/d/Y',$datedebut)->format('Y-m-d');
        //  $formatdatefin = Carbon::createFromFormat('m/d/Y',$datefin)->format('Y-m-d');
 
                $request->validate([
                    'marquevehicule'=>['required'],
                    'modelevehicule'=>['required'],
                    'typecarburantvehicule'=>['required'],
                    'parkingvehicule'=>['required'],
                    'immatriculationvehicule'=>['required','max:7','min:7'],
                    'statutvehicule'=>['required'],
                    'kilometragevehicule'=>['required','max:500','min:3'],
                    'numerochassivehicule'=>['required','max:17','min:17'],
                    'datedebutasurancevehicule'=>['required'],
                    'datefinasurancevehicule'=>['required'],
                    'avatar'=>['required'],
                    
                ]); 

                   // $name = Storage::disk('local')->put('avatars',$request->avatar);

                 ///donner un nom dynamique aux fichiers
                 
                    $filename = time(). '.'.$request->avatar->extension();

                    $path =$request->file('avatar')->storeAs(
                        'avatars',
                        $filename,
                        'public'
                    
                    );

                $createvehicule = Vehicule::create([
                  
                    'marque_id'=>$request->marquevehicule,
                    'modele_id'=>$request->modelevehicule,
                    'typeCarburant_id'=>$request->typecarburantvehicule,
                    'parking_id'=>$request->parkingvehicule,
                    'statut_vehicule'=>$request->statutvehicule,
                    'immatriculation'=>$request->immatriculationvehicule,
                    'kilometrage'=>$request->modelevehicule,
                    'numero_chassi'=>$request->numerochassivehicule,
                    'date_debut_assurance'=>$datedebut,
                    'date_fin_assurance'=>$datefin,
                    'path'=>$path,
                    'statut_vehicule'=>1
                ]);
                // die($datedebut);
                session()->flash('notification.message','V??hicule cr??e  avec sucess!');
                session()->flash('notification.type','success');
                
                return redirect()->route('GETPAGECREATEVEHICULE');
            
        
     }


     /**
      *  function qui permet de renvoyer la liste des vehicules presents dans la bd
      * et les informations de celui ci
      */


     public function GETLISTEVEHICULE()
     {
        $row =1;
   
        $informationvehicule = DB::table('vehicules')
        ->join('marques','vehicules.marque_id','=','marques.id')
        ->join('modeles','vehicules.modele_id','=','modeles.id')
        ->join('type_carburants','vehicules.typeCarburant_id','=','type_carburants.id')
        ->join('parkings','vehicules.parking_id','=','parkings.id')
        ->select('vehicules.*',
        'marques.nommarque',
        'marques.commentairemarque',
        'modeles.nommodele',
        'modeles.commentairemodele',
        'type_carburants.nomtypecarburant',
        'type_carburants.libellecarburant',
        'parkings.nomparking',
        'parkings.description' 
        )
        ->get();
        //die($informationvehicule);
        return view('vehicule.listvehicule',[
            'informationvehicule'=>$informationvehicule,
            'row'=>$row
        ]);
     }


/**
 *  function qui permet de renvoyer a la page de modification d'un vehicule  et les information sur
 * le vehicule en question 
 * 
 */

  public function GETPAGEUPDATEVEHICULE()
 {
        /**
         * access a l'id du vehicule que l'on veut modifier
         */
            $id  = $_GET['id'];
        /**
         *  recuperation de la liste des marques,modeles,parking et typecarburant present dans la base de donnee
         */
            $listemarque = Marque::all();
            $listemodele = Modele::all();
            $listeparking= Parking::all();
            $listetypecarburant = TypeCarburant::all();
        /**
         *  recuperation des information sur le vehicule en cour
         */
            $infovehiculeupdate = DB::table('vehicules')
            ->join('marques','vehicules.marque_id','=','marques.id')
            ->join('modeles','vehicules.modele_id','=','modeles.id')
            ->join('type_carburants','vehicules.typeCarburant_id','=','type_carburants.id')
            ->join('parkings','vehicules.parking_id','=','parkings.id')
            ->select('vehicules.*',
            'marques.nommarque',
            'marques.commentairemarque',
            'modeles.nommodele',
            'modeles.commentairemodele',
            'type_carburants.nomtypecarburant',
            'type_carburants.libellecarburant',
            'parkings.nomparking',
            'parkings.description' 
            )
            ->where('vehicules.id',$id)
            ->get();        

            return view('vehicule.updatevehicule',
            [
                'infovehiculeupdate'=>$infovehiculeupdate,
                'listemarque'=>$listemarque,
                'listemodele'=>$listemodele,
                'listeparking'=>$listeparking,
                'listetypecarburant'=>$listetypecarburant
            
            
            ]);
 }


        /**
         *  function qui permet de mettre a jour un vehicule
        */
        public function UPDATEVEHICULE(Request $request,$id)
        {
                $vehiculeupdate = Vehicule::find($id);
                $datedebutupdate=$request->datedebutasurancevehiculeupdate;
                $datefinupdate =$request->datefinasurancevehiculeupdate;
                //  $formatdatedebut = Carbon::createFromFormat('m/d/Y',$datedebut)->format('Y-m-d');
                //  $formatdatefin = Carbon::createFromFormat('m/d/Y',$datefin)->format('Y-m-d');
         
                        $request->validate([
                            'marquevehiculeupdate'=>['required'],
                            'modelevehiculeupdate'=>['required'],
                            'typecarburantvehiculeupdate'=>['required'],
                            'parkingvehiculeupdate'=>['required'],
                            'immatriculationvehiculeupdate'=>['required'],
                            'statutvehiculeupdate'=>['required'],
                            'kilometragevehiculeupdate'=>['required','max:50','min:2'],
                            'numerochassivehiculeupdate'=>['required','max:50','min:5'],
                            'datedebutasurancevehiculeupdate'=>['required'],
                            'datefinasurancevehiculeupdate'=>['required'],
                            
                        ]); 

                      $vehiculeupdate->update([
                            'marque_id'=>$request->marquevehiculeupdate,
                            'modele_id'=>$request->modelevehiculeupdate,
                            'typeCarburant_id'=>$request->typecarburantvehiculeupdate,
                            'parking_id'=>$request->parkingvehiculeupdate,
                            'statut_vehicule'=>$request->statutvehiculeupdate,
                            'immatriculation'=>$request->immatriculationvehiculeupdate,
                            'kilometrage'=>$request->kilometragevehiculeupdate,
                            'numero_chassi'=>$request->numerochassivehiculeupdate,
                            'date_debut_assurance'=>$datedebutupdate,
                            'date_fin_assurance'=>$datefinupdate,
        
            
                            
        
                        ]);
                        session()->flash('notification.message','V??hicule modifi??  avec sucess!');
                        session()->flash('notification.type','success');
                        

                        return redirect()->route('GETLISTEVEHICULE');


                        


        }

        /**
         * function qui permet de supprimer un vehicule
         */

        public function DELETEVEHICULE(Request $request,$id)
        {
            $vehiculedelete = Vehicule::find($id);
            $vehiculedelete->delete();
            session()->flash('notification.message','V??hicule supprim??  avec sucess!');
            session()->flash('notification.type','danger');
            
            return redirect()->route('GETLISTEVEHICULE');

        }   


}