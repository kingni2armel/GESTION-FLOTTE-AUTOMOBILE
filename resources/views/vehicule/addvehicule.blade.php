@include('layout.header');


    <div class="content-wrapper" style="margin-right: 15px">
      <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1> Creer un vehicule</h1>
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

        <form action="{{route('CREATEVEHICULE')}}"  method="post">

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

                          @if (session()->has('notification.message'))
                                <div class="alert alert-{{session('notification.type')}}" style="margin-top: 15px">
                                        {{session('notification.message')}}
                                </div>
                          @endif

                          
                    <div class="bs-stepper-content">
                      <!-- your steps content here -->
                                <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Marque</label>
                                            <select name="marquevehicule" class="form-control select2" style="width: 100%;">
                                                @foreach ($listemarque as $listemarques )
                                                     <option value="{{$listemarques->id}}" >{{$listemarques->nommarque}}</option>

                                                @endforeach
                                            
                                            </select> 
                                    </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Modele</label>
                                            <select name="modelevehicule" class="form-control select2" style="width: 100%;">
                                                @foreach ($listemodele as $listemodeles )
                                                     <option value="{{$listemodeles->id}}" >{{$listemodeles->nommodele}}</option>

                                                @endforeach
                                            
                                            </select> 
                                    </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Type Carburant</label>
                                    <select name="typecarburantvehicule" class="form-control select2" style="width: 100%;">
                                        @foreach ($listetypecarburant as $listetypecarburants )
                                             <option value="{{$listetypecarburants->id}}" >{{$listetypecarburants->nomtypecarburant}}</option>

                                        @endforeach
                                    
                                    </select> 
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Parking</label>
                                        <select name="parkingvehicule" class="form-control select2" style="width: 100%;">
                                            @foreach ($listeparking as $listeparkings )
                                                <option value="{{$listeparkings->id}}" >{{$listeparkings->nomparking}}</option>

                                            @endforeach
                                        
                                        </select>                      
                                 </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Statut</label>
                                        <select name="statutvehicule" class="form-control select2" style="width: 100%;">
                                            <option value="1" >libre</option>
                                            <option value="0">occupe</option>
                                           
                                        </select> 
                               </div>
            
                        <p class="btn btn-primary" onclick="stepper.next()">Suivant</p>
                      </div>
                            <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Immatriculation</label>
                                    <input name="immatriculationvehicule" type="text" class="form-control" id="exampleInputEmail1" placeholder="Entrer  l'immatriculation">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Kilometrage</label>
                                    <input name="kilometragevehicule" type="number" class="form-control" id="exampleInputEmail1" placeholder="Entrer  le kilometrage">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Numero de chassis</label>
                                    <input name="numerochassivehicule" type="text" class="form-control" id="exampleInputEmail1" placeholder="Entrer  le numero de chassi">
                                </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Date fin assurance</label>
                            <input  name ="datedebutasurancevehicule" type="date" class="form-control" id="exampleInputEmail1" placeholder="Entrer  votre password">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Date debut assurance</label>
                            <input  name = "datefinasurancevehicule" type="date" class="form-control" id="exampleInputEmail1" placeholder="Entrer  votre password">
                        </div>
                      
                        <p class="btn btn-primary" onclick="stepper.previous()">Precedent</p>
                        <button type="submit" class="btn btn-primary" style="margin-top: -15px">Creer</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                
              </div>
              <!-- /.card -->
            </div>
          </div>
        </form>
        
        
  </div>


