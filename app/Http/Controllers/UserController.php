<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller 
{
    /*

     function qui renvoie a la page de creation d'un utilisateur

    */
    public function GetPage()
    {
        return view('dashboard.dashboard');
    }

    public function GETPAGES()
    {
        return view('user.adduser');
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
    public function AddUser(Request $request)
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
    }
}
