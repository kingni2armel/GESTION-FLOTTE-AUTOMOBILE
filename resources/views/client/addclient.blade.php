@include('layout.header');


    <div class="content-wrapper" style="margin-right: 15px">
      <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1> Creer un client</h1>
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

        <form action="{{route('CREATECLIENT')}}"  method="post">

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
                          <label for="exampleInputEmail1">Nom</label>
                          <input name="nomclient" type="text" class="form-control" id="exampleInputEmail1" placeholder="Entrer  le nom">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Prenom</label>
                            <input name="prenomclient" type="text" class="form-control" id="exampleInputEmail1" placeholder="Entrer  le prenom">
                          </div>
                       
                        <div class="form-group">
                          <label for="exampleInputPassword1">Numero de telephone</label>
                          <input name="numeroclient" type="number" class="form-control" id="exampleInputPassword1" placeholder="Entrer le numero">
                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Email</label>
                          <input name="emailclient" type="email" class="form-control" id="exampleInputEmail1" placeholder="Entrer  l'email">
                      </div>
                        <p class="btn btn-primary" onclick="stepper.next()">Suivant</p>
                      </div>
                      <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                          <div class="form-group">
                              <label for="exampleInputEmail1">Nom direction</label>
                              <select name="nomdirectionclient" type="text" class="form-control" id="exampleInputEmail1">
                                          @foreach ($listedirection as $listedirections)
                                                  <option value="{{$listedirections->id}}">{{$listedirections->nomdirection}}</option>
                                          @endforeach
                              </select>
                         </div>
                            <div class="form-group">
                                  <label for="exampleInputEmail1">Nom departement</label>
                                  <select name="nomdepartementclient" type="text" class="form-control" id="exampleInputEmail1">
                                              @foreach ($listedepartement as $listedepartements)
                                                      <option value="{{$listedepartements->id}}">{{$listedepartements->nom_departement}}</option>
                                              @endforeach
                                  </select>
                          </div>

                          <div class="form-group">
                              <label for="exampleInputEmail1">Nom service</label>
                              <select name="nomserviceclient" type="text" class="form-control" id="exampleInputEmail1">
                                          @foreach ($listeservice as $listeservices)
                                                  <option value="{{$listeservices->id}}">{{$listeservices->nom_service}}</option>
                                          @endforeach
                              </select>
                        </div>

                          
                        <div class="form-group">
                            <label for="exampleInputEmail1">Password</label>
                            <input  name = "passwordclient" type="password" class="form-control" id="exampleInputEmail1" placeholder="Entrer  le  password">
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


