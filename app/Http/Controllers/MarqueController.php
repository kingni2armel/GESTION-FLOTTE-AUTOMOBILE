<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Marque;

class MarqueController extends Controller
{
    //

    /**
     * function qui permet d'aller a la page de creation d'une marque
     */


     public function GETPAGECREATEMARQUE()
     {
         return view('marque.addmarque');
     }

   

      /**
       * 
       * function qui permet d'avoir la liste des marques   
       */

     public function GETLISTEMARQUE()

     {
            $listemarque =  Marque::paginate(7);
            return view('marque.listemarque',['listemarque'=>$listemarque]);
     }

       /**
      *  function qui permet de creer une marque de vehicule
      */

      public function CREATEMARQUE(Request $request)

      {
        $request->validate([
            'nommarque'=>['required'],
            'commentairemarque'=>['required'] 
        ]);

        $createcarburant = Marque::create([
                'nommarque'=>$request->nommarque,
                'commentairemarque'=>$request->commentairemarque,
        ]);

        return redirect()->route('GETLISTEMARQUE');

      }


    /**
     * function qui renvoie a la page de modification d'un carburant
     */

     public function GETPAGEUPDATEMARQUE()
     {
        $id = $_GET['id'];
        $infomarque= DB::table('marques')
        ->where('id',$id)
        ->get();
         return view('marque.updatemarque',['infomarque'=>$infomarque]);
     }


     /**
      *  function qui permet de mettre a jour une marque
      */


      public function UPDATEMARQUE(Request $request,$id)

      {
        $request->validate([
            'nommarqueupdate'=>['required'],
            'commentaireupdate'=>['required'] 
        ]);

        $findmarque = Marque::find($id);

        $findmarque->update([
            'nommarque'=>$request->nommarqueupdate,
            'commentairemarque'=>$request->commentaireupdate,
        ]);

        return redirect()->route('GETLISTEMARQUE');

      }


      /**
       * 
       * function qui permet de supprimer une marque
      */


      public  function DELETEMARQUE(Request $request,$id)

      {
            $marquedelete = Marque::find($id);
            $marquedelete->delete();
            return redirect()->route('GETLISTEMARQUE');

      }
}
