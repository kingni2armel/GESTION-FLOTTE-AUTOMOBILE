@include('layout.header');


    <div class="content-wrapper" style="margin-right: 15px">
      <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                             @foreach ( $informationdelareservation as $informationdelareservations )
                                 <h1> MOTIF: {{$informationdelareservations->motif_demande}}</h1>
    
                               @endforeach

                               {{-- affichage des messages de  --}}

                               @if (session()->has('notification.message'))
                               <div class="alert alert-{{session('notification.type')}}" style="margin-top: 15px">
                                       {{session('notification.message')}}
                               </div>
                               @endif

                          


                               @if($informationdelareservations->statut_traitement == 1)


                                      <p>votre reservation a deja ete traite <i class="mdi mdi-transit-detour:"></i></p>
                                        

                                     <a href="{{route('GETPAGEDOWNLOADFILE',['id'=>$_GET['id']])}} "  class="btn-telechargement">
                                                   
                                              <button class="btn btn-primary">VOIR MON RECU</button>
                                        
                                     </a>

                                    @else 
                                    <p>Votre reservation est encour de traitement</p>

               
                                @endif



                                @if($informationdelareservations->statut_reservation == 1)
                                  <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                                Noter le chauffeur 
                                            </button>
                                            
                                            <!-- Modal -->
                                            @foreach($chauffeurreservationid as $data)

                                            
                                                        <form action= "{{route('GIVENOTECHAUFFEUR',['idr'=>$_GET['id'],'idc'=>$data->chauffeur_id])}}" method="post">
                                                            @csrf
                                                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLongTitle">Noter le chauffeur</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                                    <div class="form-group">
                                                                                            <label for="">Note du chauffeur sur 20</label>
                                                                                            <input type="number" name="note" class="form-control" id="">
                                                                                    </div>
                
                                                                                    <div class="form-group">
                                                                                        <label for="">Laisser un commentaire</label>
                                                                                        <textarea name="commentaire" class="form-control" id="" cols="30" rows="10"></textarea>
                                                                                </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                                    <button type="submit" class="btn btn-primary">Envoyer</button>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        
                                                        
                                                        </form>
                                            @endforeach 

                                @endif

              </div>
           
            </div>
          </div><!-- /.container-fluid -->
        </section>

        @if($errors->any())
      {
            @foreach($errors->all() as $error)
                <div class="text-red-500">
                            <p> {{$error}}</p>
                </div>
            @endforeach
      } 

      @endif



  @if($informationdelareservations->statut_traitement == 0)

        @foreach ($informationdelareservation as $informationdelareservations)
                            <form action="{{route('UPDATERESERVATION',['id'=>$informationdelareservations->id])}}"  method="post">

                                @csrf
                    
                                <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-default">
                                    <div class="card-header">
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="bs-stepper">
                                        <div class="bs-stepper-header" role="tablist">
                                            <!-- your steps here -->
                                            <div class="step" data-target="#logins-part">
                                            <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                                                <span class="bs-stepper-circle">1</span>
                                                <span class="bs-stepper-label">niveau 1</span>
                                            </button>
                                            </div>
                                            <div class="line"></div>
                                            <div class="step" data-target="#information-part">
                                            <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                                                <span class="bs-stepper-circle">2</span>
                                                <span class="bs-stepper-label">niveau 2</span>
                                            </button>
                                            </div>
                                        </div> 
                                        <div class="bs-stepper-content">
                                            <!-- your steps content here -->
                                            <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Motif de la demande</label>
                                                        <textarea name="motifreservationupdate"
                                                           placeholder={{$informationdelareservations->motif_demande}}
                                                            class="form-control" id="" cols="30" 
                                                            rows="10">
                                                        </textarea>
                                            </div>
                                                <div class="form-group">
                                                <label for="exampleInputEmail1">Ville depart</label>
                                                    <select name="villedepartupdate" class="form-control select2" style="width: 100%;">
                                                            @foreach ($listedesville as $listedesvilles )
                                                                <option value="{{$listedesvilles->nom}}">{{$listedesvilles->nom}}</option>
                                                            @endforeach
                                                    
                                        
                                                    </select> 
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Ville destination</label>
                                                    <select name="villedestinationupdate" class="form-control select2" style="width: 100%;">
                                                        @foreach ($listedesville as $listedesvilles )
                                                            <option value="{{$listedesvilles->nom}}">{{$listedesvilles->nom}}</option>
                                                        @endforeach
                                                    
                                        
                                                    </select> 
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Date de debut</label>
                                                <input name="datedebutupdate" type="date" class="form-control" id="exampleInputPassword1" value="{{$informationdelareservations->date_depart}}">
                                            </div>
                    
                                            
                    
                                            <p class="btn btn-primary" onclick="stepper.next()">Suivant</p>
                                            </div>
                                            <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Date de retour</label>
                                                <input name="dateretourupdate" type="date" class="form-control" id="exampleInputPassword1"  value={{$informationdelareservations->date_retour}}>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nombre de place</label>
                                                <input  name = "nombredeplaceupdate" type="number" class="form-control" id="exampleInputEmail1" value="{{$informationdelareservations->nombre_de_place}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Statut convoiture</label>
                                                    <select name="statutconvoitureupdate" class="form-control select2" style="width: 100%;">
                                                        <option value="0" >Non</option>
                                                        <option value="1">Oui</option>
                                                        
                                                    </select> 
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Statut chauffeur</label>
                                                    <select name="statutchauffeurupdate" class="form-control select2" style="width: 100%;">
                                                        <option value="0" >Non</option>
                                                        <option value="1">Oui</option>
                                                        
                                                    </select> 
                                            </div>
                    
                                            
                                            <p class="btn btn-primary" onclick="stepper.previous()">Precedent</p>
                                            <button type="submit" class="btn btn-primary" style="margin-top: -15px">Creer</button>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    
                                    </div>
                                </div>
                                </div>
                                <!-- /.card -->
                            </form>
          
        @endforeach                         

    @endif                       


    

                    

  </div>


