@include('layout.header');


    <div class="content-wrapper" style="margin-right: 15px">
      <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1> Creer une reservation</h1>
              </div>
           
            </div>
          </div><!-- /.container-fluid -->
        </section>

        @if($errors->any())
        {
          <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                <div class="text-red-500 ">
                            <p> {{$error}}</p>
                </div>
            @endforeach
          </div>
    
        } 


  @endif


      @if (session()->has('notification.message'))
              <div class="alert alert-{{session('notification.type')}}" style="margin-top: 15px">
                      {{session('notification.message')}}
              </div>
      @endif

        <form action="{{route('CREATERSERVATION')}}"  method="post">

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
                            <textarea name="motifreservation" class="form-control" id="" cols="30" rows="10"></textarea>
                        </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Ville depart</label>
                                <select name="villedepart" class="form-control select2" style="width: 100%;">
                                        @foreach ($listedesville as $listedesvilles )
                                            <option value="{{$listedesvilles->nom}}">{{$listedesvilles->nom}}</option>
                                        @endforeach
                              
                  
                                </select> 
                      </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Ville destination</label>
                              <select name="villedestination" class="form-control select2" style="width: 100%;">
                                  @foreach ($listedesville as $listedesvilles )
                                      <option value="{{$listedesvilles->nom}}">{{$listedesvilles->nom}}</option>
                                  @endforeach
                              
                  
                              </select> 
                        </div>
                       
                        <div class="form-group">
                          <label for="exampleInputPassword1">Date de debut</label>
                          <input name="datedebut" type="date" class="form-control" id="exampleInputPassword1" placeholder="Entrer votre numero">
                        </div>

                       

                        <p class="btn btn-primary" onclick="stepper.next()">Suivant</p>
                      </div>
                      <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                        <div class="form-group">
                          <label for="exampleInputPassword1">Date de retour</label>
                          <input name="dateretour" type="date" class="form-control" id="exampleInputPassword1" placeholder="Entrer votre numero">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nombre de place</label>
                            <input  name = "nombredeplace" type="number" class="form-control" id="exampleInputEmail1" placeholder="Entrer  nombre de place">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Statut convoiture</label>
                                <select name="statutconvoiture" class="form-control select2" style="width: 100%;">
                                    <option value="0" >Non</option>
                                    <option value="1">Oui</option>
                                   
                                </select> 
                       </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Statut chauffeur</label>
                                <select name="statutchauffeur" class="form-control select2" style="width: 100%;">
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
        
        
  </div>


