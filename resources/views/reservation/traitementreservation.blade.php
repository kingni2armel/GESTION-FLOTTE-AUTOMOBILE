@include('layout.header');
<div class="content-wrapper" style="margin-right: 15px">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
                @foreach ( $infosurlareservation as $infosurlareservations )
                                      <h1> traitement de la reservation de  {{$infosurlareservations->nom_client}}  {{$infosurlareservations->prenom_client}}</h1>
                    
                @endforeach
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


                @foreach ( $infosurlareservation as $infosurlareservations )
                                                        
                            <form action="{{route('TraitementReservation',['id'=>$id=$infosurlareservations->id])}}"  method="post">

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
                                                <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Nom du chauffeur    </label>
                                                        <select name="nomchauffeur" type="text" class="form-control" id="exampleInputEmail1">
                                                                    @foreach ($listechauffeurlibre as $listechauffeurlibres)
                                                                            <option value="{{$listechauffeurlibres->id}}">{{$listechauffeurlibres->nom}}</option>
                                                                    @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Vehicule    </label>
                                                        <select name="nomvehicule" type="text" class="form-control" id="exampleInputEmail1">
                                                                    @foreach ($listevehiulelibre as $listevehiulelibres)
                                                                            <option value="{{$listevehiulelibres->id}}">{{$listevehiulelibres->immatriculation}}</option>
                                                                    @endforeach
                                                        </select>
                                                    </div>

                                                  
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-primary" style="margin-top: -15px">Gerer la reservation</button>

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
      
                @endforeach
      
</div>
