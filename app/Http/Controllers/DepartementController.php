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
use App\Models\Direction;
class DepartementController extends Controller
{
    //
    /**
     * function qui renvoie a la page de creation d'un departement
     */


     public function GETPAGECREATEDEPARTEMENT()
     {
            $listedirection = Direction::all();
            return view('departement.adddepartement',['listedirection'=>$listedirection]);
     }

    
     /**
      *  function qui renvoie la liste de tout les departements
      */
     public function GETLISTEDEPARTEMENT()

     {
        $numerodepartement = 1;
         $listedepartement = Departement::paginate(7);
         return view('departement.listedepartement',[
             'listedepartement'=>$listedepartement,

             'numerotation'=> $numerodepartement
        

        
        ]);
     }

        /**
         * function  qui permet de creer un departement
        */

      public function CREATEVEDEPARTEMENT(Request $request)

        {
            $request->validate([
                        'nomdirection'=>['required'],
                        'nomdepartement'=>['required','max:250','min:3'],
                        'commentairedepartement'=>['required','max:250','min:3'],
            ]);

            $createdepartement = Departement::create([
                        'direction_id'=>$request->nomdirection,
                        'nom_departement'=>$request->nomdepartement,
                        'commentaire_departement'=>$request->commentairedepartement
            ]);
            session()->flash('notification.message','Département crée  avec sucess!');
            session()->flash('notification.type','success');

            return redirect()->route('GETLISTEDEPARTEMENT');
        }

        /**
         * 
         * function qui renvoie la page de modification d'un departement
         */

         public function GETPAGEUPDATEDEPARTEMENT()
         {
             $id = $_GET['id'];
             $infodepartement= DB::table('departements')
             ->where('id',$id)
             ->get();
             $listedirection  = Direction::All();
             return view('departement.updatedepartement',
             ['infodepartement'=>$infodepartement,
             'listedirection'=>$listedirection
            ]);
         }

         /**
          * 
          * function qui permet de modifier un departement
          */

          public function UPDATEDEPARTEMENT(Request $request,$id)
          {
            $request->validate([
                'nomdepartementupdate'=>['required','max:250','min:3'],
                'nomdirectionupdate'=>['required'],
                'descriptiondepartementupdate'=>['required','max:250','min:3'],
    ]);
                $updatedepartement= Departement::find($id);

                $updatedepartement->update([
                    'nom_departement'=>$request->nomdepartementupdate,
                    'direction_id'=>$request->nomdirectionupdate,
                    'commentaire_departement'=>$request->descriptiondepartementupdate
                ]);
                session()->flash('notification.message','Département modifié  avec sucess!');
                session()->flash('notification.type','success');
                
                return redirect()->route('GETLISTEDEPARTEMENT');

          }

          /**
           * function de suppresion d'un departement
           */

           public function DELETEDEPARTEMENT(Request $request,$id)
           {
               $departementdelete = Departement::find($id);
               $departementdelete->delete();
               session()->flash('notification.message','Département supprimé  avec sucess!');
               session()->flash('notification.type','danger');
               return redirect()->route('GETLISTEDEPARTEMENT');


           }
}
