@include('layout.header');
<div class="content-wrapper" style="margin-right: 15px">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1> Creer un parking</h1>
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

      <form action="{{route('CREATEPARKING')}}"  method="post">

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
                  <div class="bs-stepper-content">
                    <!-- your steps content here -->
                    <div  id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nom</label>
                            <input name="nomparking" type="text" class="form-control" id="exampleInputEmail1" placeholder="Entrer  le nom">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nom de la ville</label>
                            <select name="nomville" type="text" class="form-control" id="exampleInputEmail1">
                                        @foreach ($listeville as $listevilles)
                                                <option value="{{$listevilles->id}}">{{$listevilles->nom}}</option>
                                        @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nombre de place</label>
                            <input name="nombredeplace" type="number" class="form-control" id="exampleInputEmail1" placeholder="Entrer  le nombre de place">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Description</label>
                            <textarea name="description" class="form-control" id="" cols="30" rows="10"></textarea>
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
