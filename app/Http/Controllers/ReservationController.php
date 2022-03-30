<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Client;
use App\Models\Vehicule;
use App\Models\Chauffeur;
use App\Models\Ville;


class ReservationController extends Controller
{
    //

    /**
     * function qui permet de renovyer  a la page de creation d'un reservation
     */

     public function GETPAGECREATERESERVATION()
     {
        $listedesville = Ville::all();
         return view('reservation.createreservation',['listedesville'=>$listedesville]);
     }

     public function CREATERSERVATION(Request $request)

     {
            $request->validate([
                'motifreservation'=>['required'],
                'datedebut'=>['required'],
                'dateretour'=>['required'],
                'villedepart'=>['required'],
                'villedestination'=>['required'],
                'nombredeplace'=>['required'],
                'statutchauffeur'=>['required'],        
                'statutconvoiture'=>['required'],
            ]);

              $clientcreatereservation  = Reservation::create([
                    'user_id'=>auth()->user()->id,
                    'nom_client'=>auth()->user()->nom,
                    'prenom_client'=>auth()->user()->prenom,
                    'telephone_client'=>auth()->user()->numero_telephone,
                    'motif_demande'=>$request->motifreservation,
                    'ville_depart'=>$request->villedepart,
                    'ville_destination'=>$request->villedestination,
                    'date_depart'=>$request->datedebut,
                    'date_retour'=>$request->dateretour,
                    'nombre_de_place'=>$request->nombredeplace,
                    'statut_chauffeur'=>$request->statutchauffeur,
                    'statut_convoiture'=>$request->statutconvoiture,
                    'statut_reservation'=>'0',
                    'statut_traitement'=>'0',


            ]);
            return redirect()->route('GETPAGECREATERESERVATION');
     }


      /**
       * cette function permet de renvoyer la liste des reservations qu'un client precis a effectue
       */
        public function GETPAGELISTERESERVATIONBYID()

        {
             $nombrereservation = 1;
             $idUser = auth()->user()->id;
             $infomesreservation= DB::table('reservations')
             ->where('reservations.user_id',$idUser)
             ->get();

                 // die($infomesreservation);

            return view('reservation.mesreservation',
                    [
                        'infomesreservation'=>$infomesreservation,
                        'nombrereservation'=>$nombrereservation
                ]);
        
        }

      /**
       * function qui renvoie a la page de modification  de la reservation
      */


        public function  GETPAGEUPDATRESERVATION()
        {
            $listedesville = Ville::all();
            $idreservation  =  $_GET['id'];
            $informationdelareservation = DB::table('reservations')
            ->where('id',$idreservation)
            ->get();
            return view('reservation.updatereservation',
            [
                'informationdelareservation'=>$informationdelareservation,
                'listedesville'=>$listedesville,
            
            ]);
        }



    /**\
     * function qui permet de mette a hour une reservation abe le commentaire de la sessioon en cour de productiom 
     */

     public function UPDATERESERVATION(Request $request,$id)

     {
            
            $reservationfind  = Reservation::find($id);

            $request->validate([
                'motifreservationupdate'=>['required'],
                'datedebutupdate'=>['required'],
                'dateretourupdate'=>['required'],
                'villedepartupdate'=>['required'],
                'villedestinationupdate'=>['required'],
                'nombredeplaceupdate'=>['required'],
                'statutchauffeurupdate'=>['required'],        
                'statutconvoitureupdate'=>['required'],
            ]);
            $reservationfind->update([
                'user_id'=>auth()->user()->id,
                'nom_client'=>auth()->user()->nom,
                'prenom_client'=>auth()->user()->prenom,
                'telephone_client'=>auth()->user()->numero_telephone,
                'motif_demande'=>$request->motifreservationupdate,
                'ville_depart'=>$request->villedepartupdate,
                'ville_destination'=>$request->villedestinationupdate,
                'date_depart'=>$request->datedebutupdate,
                'date_retour'=>$request->dateretourupdate,
                'nombre_de_place'=>$request->nombredeplaceupdate,
                'statut_chauffeur'=>$request->statutchauffeurupdate,
                'statut_convoiture'=>$request->statutconvoitureupdate,
                'statut_reservation'=>'0',
                'statut_traitement'=>'0',

            ]);
     }

     /***
      * annuler ou encore supprimer une reservation par le client
      */


      public function DELETERESERVATION(Request $request,$id)

      {
            $reservationdelete = Reservation::find($id);
            $reservationdelete->delete();
            return redirect()->route('GETPAGELISTERESERVATIONBYID');

      }

      /***
       * 
       * function qui permet d'aller a la page de consultation de la liste des reservations non traites
       * 
       */



       public function  GETLISTERESERVATIONONTRAITE()
       {
            $nombrereservation=1;
            $listereservation = DB::table('reservations')
            ->select('reservations.*')
            ->where('statut_traitement',0)
            ->get(); 
           return view('reservation.listereservationnontraite',['listereservation'=>$listereservation,'nombrereservation'=>$nombrereservation]);
       }
}
