@include('layout.header');


    <div class="content-wrapper" style="margin-right: 15px">
      <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1> Mes informations</h1>
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

        <form action="{{route('UPDATEOINFOUSER')}}"  method="post">

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
                          <input name="mynom" type="text" class="form-control" id="exampleInputEmail1" value="{{auth()->user()->nom }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Prenom</label>
                            <input name="myprenom" type="text" class="form-control" id="exampleInputEmail1" value="{{auth()->user()->prenom }}">
                          </div>
                       
                        <div class="form-group">
                          <label for="exampleInputPassword1">Numero de telephone</label>
                          <input name="mynumero" type="number" class="form-control" id="exampleInputPassword1" value="{{auth()->user()->numero_telephone}}">
                        </div>
                        <p class="btn btn-primary" onclick="stepper.next()">Suivant</p>
                      </div>
                      <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input name="myemail" type="email" class="form-control" id="exampleInputEmail1" value="{{auth()->user()->email }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Password</label>
                            <input  name = "mypassword" type="password" class="form-control" id="exampleInputEmail1" placeholder="Entrer  votre password">
                        </div>
                 
                        <p class="btn btn-primary" onclick="stepper.previous()">Precedent</p>
                        <button type="submit" class="btn btn-primary" style="margin-top: -15px">Mettre a jour</button>
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


