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
use App\Models\User;
use App\Models\Client;
use App\Models\Vehicule;
use App\Models\Chauffeur;
use App\Models\Ville;
use App\Models\ReservationTraite;


class ReservationController extends Controller
{
    //

    /**
     * function qui permet de renovyer  a la page de creation d'un reservation
     */

     public function GETPAGECREATERESERVATION()
     {
        $listedesville = Ville::all();
        $iduser = auth()->user()->id;
        $client= Client::where('clients.user_id',$iduser)->get();
         return view('reservation.createreservation',[
             'listedesville'=>$listedesville,
            'client'=>$client
            ]);
     }

     public function CREATERSERVATION(Request $request)

     {
            $request->validate([
                'motifreservation'=>['required','max:250','min:3'],
                'datedebut'=>['required'],
                'dateretour'=>['required'],
                'statutconvoiture'=>['required'],
                'villedepart'=>['required'],
                'villedestination'=>['required'],
                'nombredeplace'=>['required'],
                'statutchauffeur'=>['required'],        
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
            session()->flash('notification.message',sprintf("Reservation crée avec succes!"));
            session()->flash('notification.type','succes');
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
       * function qui renvoie a la page de modification  de la reservation par le client
      */


        public function  GETPAGEUPDATRESERVATION()
        {
            $iduser = auth()->user()->id;
            $idreservation =  $_GET['id'];

            $reservation =  DB::table('reservations')
            ->join('reservation_traites','reservations.id','=','reservation_traites.reservation_id')
            ->select('reservation_traites.chauffeur_id')
            ->where('reservations.id',$idreservation)
            ->get();
       


            $listedesville = Ville::all();
            $idreservation  =  $_GET['id'];
            $informationdelareservation = DB::table('reservations')
            ->where('id',$idreservation)
            ->select('reservations.*')
            ->get();
           // die($informationdelareservation);
            $statutraitement = DB::table('reservation_traites')
            ->where('reservation_traites.reservation_id',$idreservation)
            ->get();

            return view('reservation.updatereservation',
            [
                'informationdelareservation'=>$informationdelareservation,
                'listedesville'=>$listedesville,
                'statutraitement'=>$statutraitement,
                'chauffeurreservationid'=>$reservation
            
            ]);
        }

    


    /**\
     * function qui permet de mette a jour une reservation abe le commentaire de la sessioon en cour de productiom 
     */

     public function UPDATERESERVATION(Request $request,$id)

     {
            
            $reservationfind  = Reservation::find($id);

            $request->validate([
                'motifreservationupdate'=>['required','max:250','min:3'],
                'datedebutupdate'=>['required'],
                'dateretourupdate'=>['required'],
                'villedepartupdate'=>['required'],
                'villedestinationupdate'=>['required'],
                'nombredeplaceupdate'=>['required','max:8','min:1'],
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
            session()->flash('notification.message',sprintf("Réservation modifié avec succes!"));
            session()->flash('notification.type','danger');
            return redirect()->route('GETPAGELISTERESERVATIONBYID');
     }

       /***  function qui renvoie la liste de  toute les reservations  */

        public function GETLISTEALLRESERVATION()

        {
                 $numero = 1;
                 $reservation = Reservation::paginate(10);
                 return view('reservation.listereservation',[
                    'reservation'=>$reservation,
                    'numero'=>$numero
                     ]);
        }


         /***
           * annuler ou encore supprimer une reservation par le client
         */


      public function DELETERESERVATION(Request $request,$id)

      {
            $reservationdelete = Reservation::find($id);
            $reservationdelete->delete();
            session()->flash('notification.message',sprintf("Réservation supprimé avec succes!"));
            session()->flash('notification.type','danger');
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
           return view('reservation.listereservationnontraite',[
            'listereservation'=>$listereservation,
            'nombrereservation'=>$nombrereservation
        ]);
       }

       /*** 
        *  function  qui renvoie la page pour lister des reservations deja traites 
        */

       public function GETLISTERESERVATIONTRAITE()

       {
            $nombrereservation=1;
            $listereservation = DB::table('reservations')
            ->select('reservations.*')
            ->where('statut_traitement',1)
            ->get(); 
        return view('reservation.listereservationtraite',[
            'listereservation'=>$listereservation,
            'nombrereservation'=>$nombrereservation
    ]);
       }

       /**
        *   function qui renvoie a la page de traitement d'une reservation
        */

        public function GETPAGETRAITEMENT()
        {
                $id = $_GET['id'];

                /**collection de la liste des chauffeurs libes */

                $listechauffeurlibre = DB::table('users')
                ->join('chauffeurs','users.id','=','chauffeurs.user_id')
                ->select('users.nom',
                'users.prenom',
                'users.numero_telephone',
                'users.email',
                'users.password',
                'chauffeurs.id',
                'chauffeurs.numero_cni',
                'chauffeurs.numero_permis')     
                ->where('chauffeurs.statut_chauffeur',1)
                ->where('chauffeurs.statut_active',1)
                ->get();

                /** collection de la liste des vehicules libres */

                $listevehicule_libre = DB::table('vehicules')
                ->select('vehicules.*')
                ->where('statut_vehicule',1)
                ->get();

                /** collection de la liste des vehicules libres */
                
                $infosurlareservation = DB::table('reservations')
                ->select('reservations.*')
                ->where('id',$id)
                ->get();

                return view('reservation.traitementreservation',
                [
                    'infosurlareservation'=>$infosurlareservation,
                     'listechauffeurlibre'=>$listechauffeurlibre,
                     'listevehiulelibre'=>$listevehicule_libre,


                
                ]);
        }

        /**
         * function qui permet de traiter une reservation
         * @param['id'] est l'identifiant de la reservation que l'on veut traiter
         * 
         */

       public function TraitementReservation(Request $request,$id)

       {
            $reservation = Reservation::find($id);
            $request->validate([
                'nomchauffeur'=>['required'],
                'nomvehicule'=>['required']
            ]);

            $reservationtraite  = ReservationTraite::create([
                    'reservation_id'=>$id,
                    'chauffeur_id'=>$request->nomchauffeur,
                    'vehicule_id'=>$request->nomvehicule,
            ]);
          /**modification du statut du vehicule */

           $vehicule = Vehicule::find($request->nomvehicule);
            $vehicule->update([
                'statut_vehicule'=>'0'
            ]);
                 /**modification du statut du chauffeur */
            $chauffeur = Chauffeur::find($request->nomchauffeur);
 
                $chauffeur->update([
                    'statut_chauffeur'=>'0'
                ]);

                /**modification du statut du traitement */
                    $reservation->update([
                        'statut_traitement'=>'1'
                    ]);
                
            return redirect()->route('GETLISTERESERVATIONONTRAITE');
       }

       public function GETMARGE()
       {
            
       }

       /**
        *  function qui permet d'aller a la page de telechargement du fichier de la reservation deja traite
        */


        public function GETPAGEDOWNLOADFILE()
        
        {
            $idreservation = $_GET['id'];
            $iduser  = auth()->user()->id;
// requete qui recupere la direction,departement,et le service du client
            $informationdirection = DB::table('users')
            ->join('clients','users.id','=','clients.user_id')
            ->join('directions','directions.id','clients.direction_id')
            ->join('departements','clients.departement_id','=','departements.id')
            ->join('services','clients.service_id','=','services.id')
            ->select('directions.*','departements.*','services.*')
            ->where('users.id',$iduser)
            ->get();
//  die($informationdirection);

//requete qui recupere le reste des informations a afficher sur le billet a imprimer

            $informationreservationfiledownload= DB::table('reservation_traites')
            ->join('vehicules','reservation_traites.vehicule_id','=','vehicules.id')
            ->join('reservations','reservation_traites.reservation_id','=','reservations.id')
            ->join('chauffeurs','reservation_traites.chauffeur_id','=','chauffeurs.id')
            ->join('users','chauffeurs.user_id','=','users.id')
            ->join('type_carburants','vehicules.typeCarburant_id','=','type_carburants.id')
            ->select('vehicules.*',
            'vehicules.created_at',
                'reservations.*',
                'chauffeurs.*',
                'users.*',
                'type_carburants.*', 
            )
            ->where('reservation_traites.reservation_id',$idreservation)
            ->get();
           //   die($informationreservationfiledownload);  
                return view('reservation.telechargement',
                [
                    'informationreservationfiledownload'=>$informationreservationfiledownload,
                    'informationdirection'=>$informationdirection
                ]
            );
        }

        /*** function qui renvoie le nombre des reservations non traite
         * @param
         */

         public  function GETNOMBRERESERVATIONNONTRAITE()

         {
            $nombrereservation=1;
                $listereservation = DB::table('reservations')
                ->select('reservations.*')
                ->where('statut_traitement',0)
                ->get(); 
               return view('layout.header',
               [
                   'listereservation'=>$listereservation,
                   'nombrereservation'=>$nombrereservation,
                   
            ]);
         }

       

}





