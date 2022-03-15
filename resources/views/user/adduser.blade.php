@include('layout.header');


    <div class="content-wrapper" style="margin-right: 15px">
        <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1> Creer un utilisateur</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Advanced Form</li>
                  </ol>
                </div>
              </div>
            </div><!-- /.container-fluid -->
          </section>


          <div class="row">
            <div class="col-md-12">
              <div class="card card-default">
                <div class="card-header">
                  <h3 class="card-title">bs-stepper</h3>
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
                          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter  votre nom">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Prenom</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter  votre prenom">
                          </div>
                       
                        <div class="form-group">
                          <label for="exampleInputPassword1">Numero de telephone</label>
                          <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Entrer votre numero">
                        </div>
                        <button class="btn btn-primary" onclick="stepper.next()">Suivant</button>
                      </div>
                      <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter  votre email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Password</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter  votre email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Role</label>
                                <select name="role" class="form-control select2" style="width: 100%;">
                                    <option>dispatcheur</option>
                                    <option>superviseur</option>
                                   
                                </select> 
                       </div>
                        <button class="btn btn-primary" onclick="stepper.previous()">Precedent</button>
                        <button type="submit" class="btn btn-primary">Creer</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  Visit <a href="https://github.com/Johann-S/bs-stepper/#how-to-use-it">bs-stepper documentation</a> for more examples and information about the plugin.
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
          
    </div>

