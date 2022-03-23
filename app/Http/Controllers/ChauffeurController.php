<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Chauffeur;
use App\Models\User;



class ChauffeurController extends Controller
{
    /**
     * function qui permet de creer un chauffeur
     */

    public function GETPAGE() 
    {
        return view('chauffeur.addchauffeur');
    }

    /**
     * 
     *  function qui permet de creer un chauffur
    */

    public function CREATECHAUFFEUR(Request $request)

    {
        $request->validate([
            'nom'=>['required'],
            'prenom'=>['required'],
            'numero'=>['required'],
            'email'=>['required'],
            'numcni'=>['required'],
            'numpermis'=>['required'],
            'status'=>['required'],
            'password'=>['required'],
            

        ]);
        $createUser = User::create([
            'nom'=>$request->nom,
            'prenom'=>$request->prenom,
            'numero_telephone'=>$request->numero,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'role'=>'chauffeur'
        ]);

        $createChauffeur = Chauffeur::create([
            'user_id'=>$createUser->id,
            'numero_cni'=>$request->numcni,
            'numero_permis'=>$request->numpermis,
            'statut_chauffeur'=>$request->status
        ]);
        return redirect()->route('GETPAGE');

    }

    /**
     * 
     * function qui permet d'avoir la liste des chauffeurs
     */

     public function GETLISTECHAUFFEUR(Request $request)

     {
        $listechauffeur = DB::table('users')
        ->join('chauffeurs','users.id','=','chauffeurs.user_id')
        ->select('users.*','chauffeurs.*')
        ->get();

        $listepagination = Chauffeur::paginate(7);
        
        return view('chauffeur.listechauffeur',['listechauffeur'=>$listechauffeur,'listepagination'=>$listepagination]);
     }

     /**
      * function qui permet d'aller a la page de modification du chauffeurs
      */

      public function GETPAGEUPDATECHAUFFEUR()
      {
        $id = $_GET['id'];
        $infochauffeurs = DB::table('users')
        ->join('chauffeurs','users.id','=','chauffeurs.user_id')
        ->where('chauffeurs.id',$id)
        ->select('users.*','chauffeurs.*')
        ->get();
          return view('chauffeur.updatechauffeur',['infochauffeur'=>$infochauffeurs]);
      }

     /**
      * function qui permet de mettre un chauffeur a jour
      * @param[$id]  est l'id du chauffeur
      * @param[$idu] est son id d'utilisateur
     */

     public function UPDATECHAUFFEUR(Request $request,$id,$idu)

     {
        $request->validate([
            'nomupdate'=>['required'],
            'prenomupdate'=>['required'],
            'numeroupdate'=>['required'],
            'emailupdate'=>['required'],
            'numcniupdate'=>['required'],
            'numpermisupdate'=>['required'],
            'statusupdate'=>['required'],
            'passwordupdate'=>['required'],
            
        ]);
        $infouserupdate= User::find($idu);
        $infochauffeurupdate = Chauffeur::find($id);
        $infouserupdate->update([
            'nom'=>$request->nomupdate,
            'prenom'=>$request->prenomupdate,
            'numero_telephone'=>$request->numeroupdate,
            'email'=>$request->emailupdate,
            'password'=>$request->passwordupdate,
            'role'=>'chauffeur'
         ]);
         $infochauffeurupdate->update([
                'numero_cni'=>$request->numcniupdate,
                'numero_permis'=>$request->numpermisupdate,
                'statut_chauffeur'=>$request->statusupdate
         ]);
         return redirect()->route('GETLISTECHAUFFEUR');

        
     }

     /**
      *  function qui permet de supprimer un chauffeur cela entraine qu'il doit aussi etre supprime entend que utilisateur
      * @param[$id] est son id d'utilisateur
      */

      public function DELETECHAUFFEUR(Request $request,$id)
      {

        $deleteuser = User::find($id);
        $deleteuser->delete();
        return redirect()->route('GETLISTECHAUFFEUR');

      }
}



