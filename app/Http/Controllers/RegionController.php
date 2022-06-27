<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Region;


class RegionController extends Controller
{
    //

    public function GETPAGEREGION()
    {
        return view('region.addregion');
    }

    /***
     * function qui permet d'avoir la liste des regions
    */
    public function GETLISTEREGION(Request $request)
    {

        $row = 1;
         $listeregion = Region::paginate(5);
         return view('region.listeregion',[
            'listeregion'=>$listeregion,
            'row'=>$row
        ]);
    }

    /***
     * function qui permet de creer une region
     */

    public function CREATEREGION(Request $request)
    {
            $request->validate([
                'nom'=>['required','max:250','min:3'],
                'commentaire'=>['required','max:250','min:3']
            ]);
            $createregion =  Region::create([
                    'nom'=>$request->nom,
                    'commentaire'=>$request->commentaire
            ]);

            session()->flash('notification.message','Région  crée  avec sucess!');
            session()->flash('notification.type','success');
           return redirect()->route('GETLISTEREGION');
    }

    /**
     * 
     * function qui permet d'aller a la page d'update d'une region
     */

     public function GETPAGEUPDATEREGION(Request $request)
     {
            $id = $_GET['id'];
            $inforegion= DB::table('regions')
            ->where('id',$id)
            ->get();
            return view('region.updateregion',['inforegion'=>$inforegion]);
        
        }

    /**
     * 
     *  function qui permet de mettre  a jour une region
     */

     public function UPDATEREGION(Request $request,$id)

     {
            $request->validate([
                'nomupdate'=>['required','max:250','min:3'],
                'commentaireupdate'=>['required','max:250','min:3'],
            ]);
            $regionupdate = Region::find($id);
            $regionupdate ->update([
                    'nom'=>$request->nomupdate,
                    'commentaire'=>$request->commentaireupdate
            ]);

            session()->flash('notification.message','Région  modifié  avec sucess!');
            session()->flash('notification.type','success');

            return redirect()->route('GETLISTEREGION');
     }

     /**
      *  function qui permet de supprimer une region
      */

      public function DELETEREGION(Request $request,$id)

      {
                $regiondelete = Region::find($id);
                $regiondelete->delete();
                session()->flash('notification.message','Région  supprimé  avec sucess!');
                session()->flash('notification.type','danger');
                return redirect()->route('GETLISTEREGION');
      }
}
