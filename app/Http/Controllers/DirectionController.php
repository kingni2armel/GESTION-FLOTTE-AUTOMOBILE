<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Direction;

class DirectionController extends Controller
{
    //

    /**
     * funtion qui renvoie a la page de creation d'une direction
     */

     public function GETPAGECREATEDIRECTION()

     {
         return view('direction.adddirection');
     }

     /**
      * function qui permet d'avoir la liste des directions
      */

      public function GETLISTEDIRECTION()
      {
           $listedirection = Direction::paginate(7);
           return view('direction.listedirection',['listedirection'=>$listedirection]);
      }
     /**
      * function qui permet la creation d'une direction
      */

      public function CREATEVEDIRECTION(Request $request)
      {
            $request->validate([
                'nomdirection'=>['required'],
                'commentairedirection'=>['required']
            ]);

            $creationdirection = Direction::create([
                    'nomdirection'=>$request->nomdirection,
                    'descriptiondirection'=>$request->commentairedirection
            ]);

            return redirect()->route('GETLISTEDIRECTION');


            /**
             * function qui permet d'avoir la page de modification d'une direction
             */

            
      }
      public function GETPAGEUPDATEDIRECTION()
      {
        $id = $_GET['id'];
        $infodirection= DB::table('directions')
        ->where('id',$id)
        ->get();
        return view('direction.updatedirection',['infodirection'=>$infodirection]);
      }

      /**
       * function qui permet de mettre a jour une direction
       */

      public function UPDATEDIRECTION(Request $request,$id)

      {
        $request->validate([
            'nomdirectionupdate'=>['required'],
            'descriptiondirectionupdate'=>['required']
        ]);
            $directionupdate = Direction::find($id);
            $directionupdate->update([
                    'nomdirection'=>$request->nomdirectionupdate,
                    'descriptiondirection'=>$request->descriptiondirectionupdate
            ]);

            return redirect()->route('GETLISTEDIRECTION');

      }

      /**
       *  function qui permet de supprimer une direction    
       */

       public function DELETEDIRECTION(Request $request,$id)
       {
            $directiondelete  = Direction::find($id);
            $directiondelete->delete();
            return redirect()->route('GETLISTEDIRECTION');

       }
}
