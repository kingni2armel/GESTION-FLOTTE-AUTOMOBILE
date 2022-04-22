<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\TypeCarburant;

class TypeCarburantController extends Controller
{
    //

    public function GETPAGECREATETYPECARBURANT()

    {
        return view('typecarburant.addcarburant');
    }

    /**
     * function qui permet d'avoir la liste des types carburants
     */

     public function GETLISTETYPECARBURANT()

     {
            $listecarburant =  TypeCarburant::paginate(2);
            return view('typecarburant.listecarburant',['listecarburant'=>$listecarburant]);
     }

    /**
     * function qui permet la creation d'un type carburant
     */

    public function CREATETYPECARBURANT(Request $request)

    {
            $request->validate([
                'nomcarburant'=>['required','max:70','min:3'],
                'libellecarburant'=>['required','max:250','min:3'] 
            ]);

            $createcarburant = TypeCarburant::create([
                    'nomtypecarburant'=>$request->nomcarburant,
                    'libellecarburant'=>$request->libellecarburant,
            ]);
            session()->flash('notification.message','Type carburant crée  avec sucess!');
            session()->flash('notification.type','success');


            return redirect()->route('GETLISTETYPECARBURANT');
    }

    /**
     * function qui renvoie a la page de modification d'un carburant
     */

     public function GETPAGEUPDATECARBURANT()
     {
        $id = $_GET['id'];
        $infocarburant= DB::table('type_carburants')
        ->where('id',$id)
        ->get();
         return view('typecarburant.updatecarburant',['infocarburant'=>$infocarburant]);
     }

     /**
      *  function qui permet de mettre a jour un type carburant
      */


      public function UPDATECARBURANT(Request $request,$id)

      {
        $request->validate([
            'nomcarburantupdate'=>['required','max:80','min:3'],
            'libelleupdate'=>['required','max:250','min:3'] 
        ]);

        $findcarburant = TypeCarburant::find($id);

        $findcarburant->update([
            'nomtypecarburant'=>$request->nomcarburantupdate,
            'libellecarburant'=>$request->libelleupdate,
        ]);

        session()->flash('notification.message','Type carburant modifié  avec sucess!');
            session()->flash('notification.type','success');

        return redirect()->route('GETLISTETYPECARBURANT');

      }

      /**
       * funtion qui permet  de supprimer un type carburant
       */


       public function DELETECARBURANT(Request $request,$id)
       {
            $carburantdelete = TypeCarburant::find($id);
            $carburantdelete->delete();

            session()->flash('notification.message','Type carburant supprimé  avec sucess!');
            session()->flash('notification.type','danger');
            return redirect()->route('GETLISTETYPECARBURANT');


       }
}
