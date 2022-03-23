<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Ville;
use App\Models\Region;


class VilleController extends Controller
{
    //

    /***
        * function qui permet d'avoir la page de creation d'un ville
     */

     public function GETPAGECREATEVILLE()

     {
        $listeregion =  Region::all();
         return view('ville.addville',['listeregion'=>$listeregion]);
     }


     /***
      * function qui permet de creer une ville
      */


      public function CREATEVILLE (Request $request)

      {
          $request->validate([
                    'nom'=>['required'],
                    'nomregion'=>['required'],
                    'commentaire'=>['required']
          ]);

          $createville = Ville::create([
                'nom'=>$request->nom,
                'region_id'=>$request->nomregion,
                'description'=>$request->commentaire
          ]);

          return redirect()->route('GETLISTEVILLE');
      }

      /** 
       * function qui renvoie la liste des villes
      */
      public function GETLISTEVILLE()

      {
            $listevilles = Ville::paginate(7);
            return view('ville.listeville',['listeville'=>$listevilles]);
      }

      /**
       * function qui permet d'avoir la page de modification d'une ville
       */

       public function GETPAGEUPDATEVILLE()

       {
           $id = $_GET['id'];
           $listeregionss =  Region::all();
           $infoville= DB::table('villes')
           ->where('id',$id)
           ->get();
           return view('ville.updateville',['listeregionss'=>$listeregionss,'infovilles'=>$infoville]);
           
       }

      /**
       * function qui permet de modifier une ville
       */


       public function UPDATEVILLE(Request $request,$id)
       {
        $request->validate([
            'nomupdate'=>['required'],
            'nomregionupdate'=>['required'],
            'commentaireupdate'=>['required']
       ]);
           $villeupdate = Ville::find($id);
           $villeupdate->update([
                'nom'=>$request->nomupdate,
                'region_id'=>$request->nomregionupdate,
                'description'=>$request->commentaireupdate,
           ]);

           return redirect()->route('GETLISTEVILLE');
       }


       /**
        * function qui permet de supprimer une ville
        */

        public function DELETEVILLE(Request $request,$id)

        {
                $villedelete =  Ville::find($id);
                $villedelete->delete();
                return redirect()->route('GETLISTEVILLE');
                
        }


        
}
