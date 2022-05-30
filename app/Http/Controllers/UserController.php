<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Reservation;
use App\Models\User;
use App\Models\Client;
use App\Models\Vehicule;
use App\Models\Chauffeur;
use App\Models\Ville;
use App\Models\Parking;
use App\Models\Dispatcheur;
use App\Models\Superviseur;
use App\Models\Region;
use App\Models\Direction;
use App\Models\Service;
use App\Models\Departement;
use App\Models\Marque;
use App\Models\Modele;
use App\Models\TypeCarburant;
use App\Models\ReservationTraite;



class UserController extends Controller 
{

    public function __invoke()
    {
        
    }    
    
    /**
     * page de connexion
     */

     public function GOCONNECT()
     {
         return view('welcome');
     }
    
    /*

     function qui renvoie au dashboard

    */

    

    public function GetPage()
    {
        /** les reservations du clients */
        if(auth()->user()->role =='client')
        {
            $idusers = auth()->user()->id;   
            // $idclient =DB::table('users')
            // ->join('clients','users.id','=','clients.user_id')
            // ->select('clients.*')
            // ->where('users.id',$idusers)
            // ->get() ;
            // $id_item= $idclient->first();
            // $idd =$id_item->id;

            $reservationclient = Reservation::where('reservations.user_id',$idusers)->get();
          
        }


        /** selection du nombre total de reservation */
            $Allreservation = Reservation::all();
        /** selection de la liste des reservations non traites   */
        $listereservationnontraite = DB::table('reservations')
        ->select('reservations.*')
        ->where('statut_traitement',0)
        ->get(); 

        /** selection des reservations  traites */
        $listereservationtraite = DB::table('reservations')
        ->select('reservations.*')
        ->where('statut_traitement',1)
        ->get();

        /** selection de tout les utilisteurs  */

        $AllUser = User::All();

        /** selection de tout les client */

        $Allclients  = User::where('role','client')->get();

        /** selection de tout les superviseur */

        $Allsuperviseur = User::where('role','superviseur')->get();
       
        /** selection de tout les dispatcheur */

        $Alldispatcheur  = User::where('role','dispatcheur')->get();

        /** selection de tout les chauffeurs */

        $Allchauffeur = User::where('role','chauffeur')->get();
        
        /** selection de tout les parkings */

        $Allparking = Parking::All();

        /** selection de tout les modeles */

        $Allmodels = Modele::All();
       
        /** selection de tout les villes */
        $Allmarque = Marque::All();
       
        /** selection de tout les villes */

        $Allvilles = Ville::All();

        /** selection de tout les regions */

        $Allregion = Region::All();

        /** selection de tout les departements */

        $Alldepartement = Departement::All();
       
        /** selection de tout les directions */

        $Alldirection = Direction::All();
        /** selection de tout les directions */

        $Allservice = Service::All();

        /** selection de tout les type carburants */

        $Allvehicule= Vehicule::All();

        /** selection de tout les type carburants */

        $listedirection = TypeCarburant::All();

        return view('dashboard.dashboard',[
            'AllUser'=>$AllUser,
            'Allclients'=>$Allclients,
            'Allchauffeur'=>$Allchauffeur,
            'Alldispatcheur'=>$Alldispatcheur,
            'Allsuperviseur'=>$Allsuperviseur,
            'Allreservation'=>$Allreservation,
            'listereservationtraite'=>$listereservationtraite,
            'listereservationnontraite'=>$listereservationnontraite,
            'Alldirection'=>$Alldirection,
            'Alldepartement'=>$Alldepartement,
            'Allservice'=>$Allservice,
            'Allparking'=>$Allparking,
            'Allmodels'=>$Allmodels,
            'Allvilles'=>$Allvilles,
            'Allregion'=>$Allregion,
            'Allmarque'=>$Allmarque,
            'Allvehicule'=>$Allvehicule,
          //  'reservationclient'=>$reservationclient



        ]
    
    );

        
    }

    /*** 
     * 
     *      function qui renvoie lan page d'ajout de l'utilisateur
     * 
    */


    public function GETPAGES()
    {
        return view('user.adduser');
    }


    /**
     *  function qui renvoie la page de mise a jou d'un utilisateur
     *  
     */


    public function GETPAGEUPDATE() 
    {
        $id = $_GET['id'];
        $infouser = DB::table('users')
        ->where('id',$id)
        ->get();
        return view('user.updateuser',['infouser'=>$infouser]);
    }




     /*

     function qui permet de rediriger a la page de connexion quand tu essaies d'acceder
     a une page sans etre connecte

    */
      public function Redirection(){
          return view('welcome');
      }




    /*
        function d'auhentification
    */



    
    public function Authenticate(Request $request)
    {
            $request->validate([
                'email'=>['required','max:25','min:1'],
                'password'=>['required','max:10','min:1'],
            ]);

            if(auth()->attempt($request->only('email','password')))
             
                {
                        return redirect()->route('GetPage');
                }
               return redirect()->back()->WithErrors('Les identifiants ne correspondent pas');
    }   
     
    /*
            function de deconnexion
    */
    public function Logout()
    {
                Session::flush();
                Auth::logout();
                return redirect()->route('GOCONNECT');
    }
    /*
            function de creation d'un utilisateur
    */
    public function ADDUSER(Request $request)
    {
        $request->validate([
            'nom'=>['required','max:250','min:3'],
            'prenom'=>['required','max:250','min:3'],
            'numero'=>['required','max:250','min:3'],
            'email'=>['required','max:50','min:3'],
            'password'=>['required','max:8','min:4'],
            'role'=>['required'],




        ]);
        $createUser = User::create([
            'nom'=>$request->nom,
            'prenom'=>$request->prenom,
            'numero_telephone'=>$request->numero,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'role'=>$request->role,

        ]);

        if($createUser->role =='dispatcheur')
        
        {
            Dispactcheur::create([
                'user_id'=> $createUser->id,
            ]);
        } else if ($createUser->role == "superviseur") 
        {
            Superviseur::create([
                    'user_id'=>$createUser->id,
            ]);
        }

        session()->flash('notification.message','Utilisateur crée  avec sucess!');
        session()->flash('notification.type','success');

        return redirect()->route('GETLISTEUSER');

    }

    /**
     *  function qui permet de recuper tout les utilisateurs 
     * 
     */

    public function GETLISTEUSER(Request $request)
    {
            $listeuser = User::paginate(7);
            return view('user.listeuser',['listeuser'=>$listeuser]);    

    }

    /***
     * 
     * function qui permet de mettre a jour un utilisateur
     */

     public function UPDATEUSER(Request $request,$id)
     {
        $request->validate([
            'nomupdate'=>['required','max:250','min:3'],
            'prenomupdate'=>['required','max:250','min:3'],
            'numeroupdate'=>['required','max:250','min:3'],
            'emailupdate'=>['required','max:50','min:8'],
            'passwordupdate'=>['required','max:8','min:4'],
            'roleupdate'=>['required'],

        ]);
         $update = User::find($id);
         $update->update([
            'nom'=>$request->nomupdate,
            'prenom'=>$request->prenomupdate,
            'numero_telephone'=>$request->numeroupdate,
            'email'=>$request->emailupdate,
            'password'=>$request->passwordupdate,
            'role'=>$request->roleupdate
         ]);

         session()->flash('notification.message','Utilisateur modifié  avec sucess!');
         session()->flash('notification.type','success');


         return redirect()->route('GETLISTEUSER');


     }

     /**
      *     function qui permet de supprimer un utilisateur
      */
     public function DELETEUSER(Request $request,$id)
     {
            $deleteuser = User::find($id);
            $deleteuser->delete();
            session()->flash('notification.message','Utilisateur supprimé  avec sucess!');
            session()->flash('notification.type','danger');


            
            return redirect()->route('GETLISTEUSER');

     }

     /**
      *  funtion qui renvoie a la page de consultation des donnees de l'utilisateur dont la session est ouvers
      */

      public function GETPAGESHOWMYINFORMATION()
      {
           return view('user.myinfo');
      }

      /*** function qui permet a un utilisateur de se mettre a jour */


      public function UPDATEOINFOUSER(Request $request)

      {
           $id = auth()->user()->id;
           $userfind = User::find($id);

           $request->validate([
            'mynom'=>['required','max:250','min:3'],
            'myprenom'=>['required','max:250','min:3'],
            'mynumero'=>['required','max:250','min:3'],
            'myemail'=>['required','max:50','min:8'],
            'mypassword'=>['required','max:8','min:4'],
            'myrole'=>['required'],
           ]);

           $userfind->update([
                'nom'=>$request->mynom,
                'prenom'=>$request->myprenom,
                'numero'=>$request->mynumero,
                'email'=>$request->myemail,
                'password'=>$request->mypassword,
                'role'=>$request->myrole
           ]);

           session()->flash('notification.message','Vos informations ont été modifié avec success');
           session()->flash('notification.type','success');
           return redirect()->route('GETPAGESHOWMYINFORMATION');

           
      }
   

}
