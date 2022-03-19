<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Dispactcheur;
use App\Models\Superviseur;



class UserController extends Controller 
{

    public function __invoke()
    {
        
    }    
    
    
    /*

     function qui renvoie a la page de creation d'un utilisateur

    */



    public function GetPage()
    {
        return view('dashboard.dashboard');
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
                'email'=>['required'],
                'password'=>['required'],
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

    }
    /*
            function de creation d'un utilisateur
    */
    public function ADDUSER(Request $request)
    {
        $request->validate([
            'nom'=>['required'],
            'prenom'=>['required'],
            'numero'=>['required'],
            'email'=>['required'],
            'password'=>['required'],
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
        return redirect()->route('GETLISTEUSER');


    }

    /**
     *  function qui permet de recuper tout les utilisateurs 
     * 
     */

    public function GETLISTEUSER(Request $request)
    {

            $listeuser = User::all();
            return view('user.listeuser',['listeuser'=>$listeuser]);


    }

    /***
     * 
     * function qui permet de mettre a jour un utilisateur
     */

     public function UPDATEUSER(Request $request,$id)
     {
         $update = User::find($id);
         $update->update([
            'nom'=>$request->nomupdate,
            'prenom'=>$request->prenomupdate,
            'numero_telephone'=>$request->numeroupdate,
            'email'=>$request->emailupdate,
            'password'=>$request->passwordupdate,
            'role'=>$request->roleupdate
         ]);
         return redirect()->route('GETLISTEUSER');


     }

     /**
      *     function qui permet de supprimer un utilisateur
      */
     public function DELETEUSER(Request $request,$id)
     {
            $deleteuser = User::delete('id',$id)->delete();
     }

   

}
