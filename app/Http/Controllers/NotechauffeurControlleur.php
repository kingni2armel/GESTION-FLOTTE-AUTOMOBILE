<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use App\Models\ReservationTraite;
use App\Models\NoteChauffeur;
use App\Models\Client;



class NotechauffeurControlleur extends Controller
{
    //

    /***  function qui permet de donner une note */

    public function GIVENOTECHAUFFEUR(Request $request,$idr,$idc)

    {
        $iduser  = auth()->user()->id;
        $idclient =Client::where('clients.user_id',$iduser)->get();
        $client = $idclient->first();
        $clientid = $client->id;

        
        $request->validate([
                'note'=>['required'],
                'commentaire'=>['required']
        ]);

        if($request->note>20)
        {
            session()->flash('notification.message','Entrer une note inferieur a 20');
            session()->flash('notification.type','danger');
        } else {
                $notechauffeur =  NoteChauffeur::create([
                    'chauffeur_id'=>$idc,
                    'reservation_id'=>$idr,
                    'client_id'=>$clientid,
                    'note_chauffeur'=>$request->note,
                    'commentaire'=>$request->commentaire
                ]);
            

                session()->flash('notification.message','Note attribuer avec success');
                session()->flash('notification.type','success');
               return  redirect()->route('GETPAGELISTERESERVATIONBYID');

                

        }
    }   
}
