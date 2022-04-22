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

class ModeleController extends Controller
{
    //

    /**
     * function qui renvoie a la page de creation d'un modele
     */
    public function GETPAGECREATEMODELE()
    {
            return view('modele.addmodele');
    }

    /**
     * function qui permet de creer un model de vehicule
    */

    public function CREATEMODELE(Request $request)

    {
      $request->validate([
          'nommodele'=>['required','max:250','min:3'],
          'commentairemodele'=>['required','max:250','min:3'] 
      ]);

      $createmodele = Modele::create([
              'nommodele'=>$request->nommodele,
              'commentairemodele'=>$request->commentairemodele,
      ]);
      session()->flash('notification.message','Modele crée  avec sucess!');
      session()->flash('notification.type','success');
      return redirect()->route('GETLISTEMODELE');

    }


      /**
       * 
       * function qui permet d'avoir la liste des modeles de vehicule
       */

      public function GETLISTEMODELE()

      {
             $listemodele =  Modele::paginate(7);
             return view('modele.listemodele',['listemodele'=>$listemodele]);
      }

         /**
     * function qui renvoie a la page de modification d'un modele de vehicule
     */

     public function GETPAGEUPDATEMODELE()
     {
        $id = $_GET['id'];
        $infomodele= DB::table('modeles')
        ->where('id',$id)
        ->get();
         return view('modele.updatemodele',['infomodele'=>$infomodele]);
     }


     /**
      *  function qui permet de mettre a jour une marque
      */


      public function UPDATEMODELE(Request $request,$id)

      {
        $request->validate([
            'nommodeleupdate'=>['required','max:250','min:3'],
            'commentaireupdate'=>['required','max:250','min:3'] 
        ]);

        $findmarque = Modele::find($id);

        $findmarque->update([
            'nommodele'=>$request->nommodeleupdate,
            'commentairemodele'=>$request->commentaireupdate,
        ]);
        session()->flash('notification.message','Modele modifié  avec sucess!');
        session()->flash('notification.type','success');

        return redirect()->route('GETLISTEMODELE');

      }


      /**
       * 
       * function qui permet de supprimer un modele de vehicule
      */


      public  function DELETEMODELE(Request $request,$id)

      {
            $modeledelete = Modele::find($id);
            $modeledelete->delete();
            session()->flash('notification.message','Modele supprimé  avec sucess!');
            session()->flash('notification.type','danger');
            return redirect()->route('GETLISTEMODELE');

      }

}
