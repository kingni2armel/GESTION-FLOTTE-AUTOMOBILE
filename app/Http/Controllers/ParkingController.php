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
use App\Models\Parking;

class ParkingController extends Controller
{
    
    /**
     *  funtion qui perme     t d'avoir la page de creation d'un parking
     */

    public function GETPAGECREATEPARKING()

    {
        $listeville = Ville::all();    
        return view('parking.addparking',['listeville'=>$listeville]);
    }


    /**
     * function qui permet de creer un parking
     */


     public function CREATEPARKING(Request $request)

     {
            $request->validate([
                    'nomparking'=>['required'],
                    'nomville'=>['required'],
                    'nombredeplace'=>['required'],
                    'description'=>['required']
            ]);

            $parkingcreate = Parking::create([
                    'nomparking'=>$request->nomparking,
                    'ville_id'=>$request->nomville,
                    'nombre_de_place'=>$request->nombredeplace,
                    'description'=>$request->description

            ]);

            session()->flash('notification.message','Parking crée  avec sucess!');
            session()->flash('notification.type','success');
            return redirect()->route('GETLISTEPARKING');
     }


     /**
      * function qui permet d'avoir la liste des  parkings et le nom de la ville a laquelle il appartiend
      */
     public function GETLISTEPARKING(Request $request)

     {
            $infoville = DB::table('parkings')
            ->join('villes','villes.id','=','parkings.ville_id')
            ->select('parkings.*', 'villes.nom')
            ->get();     

            $listepagination = Parking::paginate(7);
            return view('parking.listeparking',['listepagination'=>$listepagination,'infoville'=>$infoville]);
     }

     /***
      * function qui permet de renvoyer a la page de modification d'un parking
     */

     public function GETPAGEUPDATEPARKING()

     { 
               $id= $_GET['id'];
              $infoparking = DB::table('parkings')
              ->join('villes','parkings.ville_id','=','villes.id')
              ->select('parkings.id','parkings.nomparking','parkings.description','parkings.nombre_de_place', 'villes.nom')
              ->where('parkings.id',$id)
              ->get();

              $allVille = Ville::all();
       //      die($infoparking);
            return view('parking.updateparking',['infoparking'=>$infoparking,'allVillle'=>$allVille]);

     }


     /**
      * function qui permet de mettre a jour 
      */

      public function UPDATEPARKING(Request $request,$idparking)
      {
                     $request->validate([
                            'nomupdate'=>['required','max:250','min:3'],
                            'nomvilleupdate'=>['required'],
                            'nombredeplaceupdate'=>['required','max:8','min:1'],
                            'commentaireupdate'=>['required','max:250','min:3']
                     ]);
                 $parkingupdate=  Parking::find($idparking);
                 $parkingupdate->update([
                     'nomparking'=>$request->nomupdate,
                     'ville_id'=>$request->nomvilleupdate,
                     'nombre_de_place'=>$request->nombredeplaceupdate,
                     'description'=>$request->commentaireupdate

              ]);
              session()->flash('notification.message','Parking modifié  avec sucess!');
              session()->flash('notification.type','success');

              return redirect()->route('GETLISTEPARKING');

      }


      /***
       * function qui permet de supprimer un parking
       */

       public function DELETEPARKING(Request $request,$id)
       {
              $parkingdelete = Parking::find($id);
              $parkingdelete->delete();
              session()->flash('notification.message','Parking supprimé  avec sucess!');
              session()->flash('notification.type','danger');
              return redirect()->route('GETLISTEPARKING');

              
       }
} 