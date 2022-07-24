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
                     'nomclient'=>['required','max:250','min:3'],
                     'prenomclient'=>['required','max:250','min:3'],
                     'numeroclient'=>['required','max:9','min:9'],
                     'emailclient'=>['required','max:250','min:3'],
                     'nomdirectionclient'=>['required'],
                     'nomdepartementclient'=>['required'],
                     'nomserviceclient'=>['required'],
                     'passwordclient'=>['required','max:250','min:3'],
                   
              ]);

              $user =  User::where('users.email',$request->emailclient)->get();

              if($user->count()>0){
                     session()->flash('notification.message',sprintf("L'email exist deja!"));
                     session()->flash('notification.type','danger'); 
                     return redirect()->route('GETPAGECREATECLIENT');
  
                
              } 
              else { 
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
                              'service_id'=>$request->nomserviceclient,
                              'statut_actif'=>1
         
                       ]);
                       session()->flash('notification.message',sprintf("Client   crée avec succes!"));
                       session()->flash('notification.type','success');
                       return redirect()->route('GETPAGECREATECLIENT');
              }
             
      }

           /**
        * function qui renvoie la liste des clients et les informations sur ce dernier
        */
        public function GETLISTECLIENT()

        {
               $numerotationclient = 1;
               
               $listeclient = DB::table('users')
               ->join('clients','users.id','=','clients.user_id')
               ->join('departements','clients.departement_id','=','departements.id')
               ->join('directions','clients.direction_id','=','directions.id')
               ->join('services','clients.service_id','=','services.id')
               ->select(
                            'clients.*',
                            'users.nom',
                            'users.prenom',
                            'users.numero_telephone',
                            'users.email',
                            'users.role',
                            'departements.nom_departement',
                            'directions.nomdirection',
                            'services.nom_service'
               )
               ->get();
             //  die($listeclient);
               return view('client.listeclient',
               [
                      'listeclient'=>$listeclient,
                      'numerotationclient'=>$numerotationclient
         
         ]);
        }

        /**
         * function qui renvoie a la page de modification d'un client
         */

         public function GETPAGEUPDATECLIENT()
         {
              $id = $_GET['id'];
              $informationclient = DB::table('users')
              ->join('clients','users.id','=','clients.user_id')
              ->join('departements','clients.departement_id','=','departements.id')
              ->join('directions','clients.direction_id','=','directions.id')
              ->join('services','clients.service_id','=','services.id')
              ->select(
                            'clients.id',
                            'users.nom',
                            'users.prenom',
                            'users.numero_telephone',
                            'users.email',
                            'users.role',
                            'departements.nom_departement',
                            'directions.nomdirection',
                            'services.nom_service'
              )
                     ->where('clients.id',$id)
                     ->get(); 

                     $listedirection = Direction::all();
                     $listedepartement = Departement::all();
                     $listeservice = Service::all();

              
              return view('client.updateclient',[
                     'informationclient'=>$informationclient,
                     'listedirection'=>$listedirection,
                      'listedepartement'=>$listedepartement,
                      'listeservice'=>$listeservice
              ]);
         }

         public function UPDATECLIENT (Request $request,$id)
         {
                     $user = DB::table('users')
                     ->join('clients','users.id','=','clients.user_id')
                     ->select('users.id')
                     ->where('clients.id',$id)
                     ->get();
                           //die($user);
                      $users = $user->first();
                      $userid = $users->id;
                   
                     $userfind =  User::find($userid);
                     $clientfind = Client::find($id);
                     $request->validate([
                            'nomclientupdate'=>['required','max:250','min:3'],
                            'prenomclientupdate'=>['required','max:250','min:3'],
                            'numeroclientupdate'=>['required','max:250','min:3'],
                            'emailclientupdate'=>['required','max:250','min:3'],
                            'nomdirectionclientupdate'=>['required'],
                            'nomdepartementclientupdate'=>['required'],
                            'nomserviceclientupdate'=>['required'],
                            'passwordclientupdate'=>['required'],
                          
                     ]);

                     $clientfind->update([
                            'direction_id'=>$request->nomdirectionclientupdate,
                            'departement_id'=>$request->nomdepartementclientupdate,
                            'service_id'=>$request->nomserviceclientupdate
                     ]);

                     $userfind->update([
                            'nom'=>$request->nomclientupdate,
                            'prenom'=>$request->prenomclientupdate,
                            'numero_telephone'=>$request->numeroclientupdate,
                            'email'=>$request->emailclientupdate,
                            'password'=>Hash::make($request->passwordclientupdate),
                     ]);

                     session()->flash('notification.message',sprintf(" Client modifié avec succes!"));
                     session()->flash('notification.type','success');
                     return redirect()->route('GETLISTECLIENT');

         }


         /** function qui permet de supprimer un client */


              public function DELETECLIENT(Request $request,$id)

       {
              $client = Client::find($id);
              $client->update([
                     'statut_actif'=>0
              ]);
              session()->flash('notification.message',sprintf("Le client est maintenant  inactif !"));
              session()->flash('notification.type','danger');
              return redirect()->route('GETLISTECLIENT');



       }

}