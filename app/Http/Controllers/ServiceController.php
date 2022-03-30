<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Departement;
use App\Models\Service;

class ServiceController extends Controller
{
    //

    /**
     * function qui renvoie a la page de creation d'un service
     */

    public function GETPAGECREATESERVICE()
    {
           $listedepartement = Departement::all();
           return view('service.addservice',['listedepartement'=>$listedepartement]);
    }

       
     /**
      *  function qui renvoie la liste de tout les services
      */
      public function GETLISTESERVICE()

      {
        $infoservice = DB::table('services')
        ->join('departements','services.departement_id','=','departements.id')
        ->select('services.*','departements.nom_departement')
        ->get();
          $listeservice = Service::paginate(7);
          return view('service.listeservice',['listeservice'=>$listeservice,'infoservice'=>$infoservice]);
      }

       /**
         * function  qui permet de creer un departement
        */

        public function CREATESERVICE(Request $request)

        {
            $request->validate([
                        'nomservice'=>['required'],
                        'nomdepartement'=>['required'],
                        'commentaireservice'=>['required'],
            ]);

            $createservice = Service::create([
                        'departement_id'=>$request->nomdepartement,
                        'nom_service'=>$request->nomservice,
                        'commentaire_service'=>$request->commentaireservice
            ]);
            return redirect()->route('GETLISTESERVICE');
        }

        /**
         * function qui renvoie a la page de modification des informations d'un service
         */

         public function GETPAGEUPDATESERVICE()
         {
            
           $listedepartement = Departement::all();
            $id = $_GET['id'];
            $informationservice = DB::table('services')
            ->join('departements','services.departement_id','=','departements.id')
            ->select('services.*','departements.nom_departement')
            ->where('services.id',$id)
            ->get();

            return view('service.updateservice',['informationservice'=>$informationservice,'listedepartement'=>$listedepartement]);
         }
         
         /**
          * function qui permet de modifier un service
          */


          public function UPDATESERVICE(Request $request,$id)
          {
            $request->validate([
                'nomserviceupdate'=>['required'],
                'nomdepartementupdate'=>['required'],
                'commentaireserviceupdate'=>['required'],
                 ]);

            $serviceupdate = Service::find($id);
            $serviceupdate->update([
                'departement_id'=>$request->nomdepartementupdate,
                'nom_service'=>$request->nomserviceupdate,
                'commentaire_service'=>$request->commentaireserviceupdate
            ]);
            return redirect()->route('GETLISTESERVICE');

          }

          /**
           * function qui permet de supprimer un service
           */

           public function DELETESERVICE(Request $request,$id)
           {
                $servicedelete =  Service::find($id);
                $servicedelete->delete();
                return redirect()->route('GETLISTESERVICE');

           }

}
