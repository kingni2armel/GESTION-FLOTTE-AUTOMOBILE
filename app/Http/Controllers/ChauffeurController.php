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
            'nom'=>['required','max:250','min:3'],
            'prenom'=>['required','max:250','min:3'],
            'numero'=>['required','max:250','min:3'],
            'email'=>['required','max:250','min:3'],
            'numcni'=>['required','max:250','min:3'],
            'numpermis'=>['required','max:250','min:3'],
            'status'=>['required','max:1','min:1'],
            'password'=>['required','max:250','min:3'],
            

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
        session()->flash('notification.message',sprintf("Chauffeur   crée avec succes!"));
        session()->flash('notification.type','success');
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
            'nomupdate'=>['required','max:250','min:3'],
            'prenomupdate'=>['required','max:250','min:3'],
            'numeroupdate'=>['required','max:250','min:3'],
            'emailupdate'=>['required','max:250','min:3'],
            'numcniupdate'=>['required','max:250','min:3'],
            'numpermisupdate'=>['required','max:250','min:3'],
            'statusupdate'=>['required'],
            'passwordupdate'=>['required','max:250','min:3'],
            
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
         session()->flash('notification.message',sprintf("Chauffeur modifié avec succes!"));
         session()->flash('notification.type','success');
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
        session()->flash('notification.message',sprintf("Chauffeur supprimé avec succes!"));
        session()->flash('notification.type','danger');
        return redirect()->route('GETLISTECHAUFFEUR');

      }


      /*** funtion qui renvoie les   reservations du chauffeur connecte */

      public function GETRESERVATIONBYCHAUFFEUR()
      {
              /** recuperation de l'id du l'utilisateur ayant le role de chauffeur */
                 $iduser = auth()->user()->id;

             /**recuperation de l'id du chauffeur */
                $idchauffeur =  Chauffeur::where('chauffeurs.user_id',$iduser);

                $reservations = DB::table('chauffeurs')
                ->join('reservation_traites','reservation_traites.chauffeur_id','=','chauffeurs.id')
                ->where('chauffeurs.id',$idchauffeur)
                ->select('chauffeurs.*')
                ->get();
            return view ('chauffeur.listeseechauffeur')
            ;
      }
}





