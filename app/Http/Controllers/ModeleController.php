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
          'nommodele'=>['required'],
          'commentairemodele'=>['required'] 
      ]);

      $createmodele = Modele::create([
              'nom'=>$request->nommodele,
              'commentaire'=>$request->commentairemodele,
      ]);

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
            'nommodeleupdate'=>['required'],
            'commentaireupdate'=>['required'] 
        ]);

        $findmarque = Modele::find($id);

        $findmarque->update([
            'nom'=>$request->nommodeleupdate,
            'commentaire'=>$request->commentaireupdate,
        ]);

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
            return redirect()->route('GETLISTEMODELE');

      }

}
