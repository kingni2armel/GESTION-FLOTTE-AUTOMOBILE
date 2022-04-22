@include('layout.header');
<div class="content-wrapper" style="margin-right: 15px">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1> Creer un service</h1>
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


      <form action="{{route('CREATEVESERVICE')}}"  method="post">

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
                        <span class="bs-stepper-circle"></span>
                        <span class="bs-stepper-label">niveau </span>
                      </button>
                    </div>
                    <div class="line"></div>
            
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
                            <label for="exampleInputEmail1">Nom</label>
                            <input name="nomservice" type="text" class="form-control" id="exampleInputEmail1" placeholder="Entrer  le nom">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nom departement</label>
                            <select name="nomdepartement" type="text" class="form-control" id="exampleInputEmail1">
                                        @foreach ($listedepartement as $listedepartements)
                                                <option value="{{$listedepartements->id}}">{{$listedepartements->nom_departement}}</option>
                                        @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Description</label>
                            <textarea name="commentaireservice" class="form-control" id="" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" style="margin-top: -15px">Creer</button>

                        </div>
                     
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
