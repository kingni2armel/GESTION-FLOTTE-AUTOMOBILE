@include('layout.header');


    <div class="content-wrapper" style="margin-right: 15px">
      <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1> Creer un utilisateur</h1>
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

        <form action="{{route('ADDUSER')}}"  method="post">

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
                          <input name="nom" type="text" class="form-control" id="exampleInputEmail1" placeholder="Entrer  votre nom">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Prenom</label>
                            <input name="prenom" type="text" class="form-control" id="exampleInputEmail1" placeholder="Entrer  votre prenom">
                          </div>
                       
                        <div class="form-group">
                          <label for="exampleInputPassword1">Numero de telephone</label>
                          <input name="numero" type="number" class="form-control" id="exampleInputPassword1" placeholder="Entrer votre numero">
                        </div>
                        <p class="btn btn-primary" onclick="stepper.next()">Suivant</p>
                      </div>
                      <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Entrer  votre email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Password</label>
                            <input  name = "password" type="password" class="form-control" id="exampleInputEmail1" placeholder="Entrer  votre password">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Role</label>
                                <select name="role" class="form-control select2" style="width: 100%;">
                                    <option value="dispatcheur" >dispatcheur</option>
                                    <option value="superviseur">superviseur</option>
                                   
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
              <!-- /.card -->
            </div>
          </div>
        </form>
        
        
  </div>


