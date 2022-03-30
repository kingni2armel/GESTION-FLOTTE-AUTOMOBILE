<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\User;
use App\Models\Direction;
use App\Models\Departement;
use App\Models\Service;


class ClientController extends Controller
{
    //
    /**
     * function qui permet de renvoyer a la page de creation d'un client
     *  elle renvoie aussi la liste des directions, des departements, et des services
     */

     public function GETPAGECREATECLIENT()
     {
              $listedirection = Direction::all();
              $listedepartement = Departement::all();
              $listeservice = Service::all();
             return view('client.addclient',[
                    'listedirection'=>$listedirection,
                    'listedepartement'=>$listedepartement,
                    'listeservice'=>$listeservice
              ]);
     }

     /**
      * function qui permet de  creer un client
      */

      public function CREATECLIENT(Request $request)
      {
              $request->validate([
                     'nomclient'=>['required'],
                     'prenomclient'=>['required'],
                     'numeroclient'=>['required'],
                     'emailclient'=>['required'],
                     'nomdirectionclient'=>['required'],
                     'nomdepartementclient'=>['required'],
                     'nomserviceclient'=>['required'],
                     'passwordclient'=>['required'],
                   
              ]);

              $user = User::create([
                   'nom'=>$request->nomclient,
                   'prenom'=>$request->prenomclient,
                   'numero_telephone'=>$request->numeroclient,
                   'email'=>$request->emailclient,
                   'password'=>Hash::make($request->passwordclient),
                   'role'=>"client"
              ]);
              $clienttable = Client::create([
                     'user_id'=>$user->id,
                     'direction_id'=>$request->nomdirectionclient,
                     'departement_id'=>$request->nomdepartementclient,
                     'service_id'=>$request->nomserviceclient

              ]);

              return redirect()->route('GETPAGECREATECLIENT');
      }
}
