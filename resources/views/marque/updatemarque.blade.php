@include('layout.header');
<div class="content-wrapper" style="margin-right: 15px">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
                    @foreach ($infomarque as $infomarques)
                            <h1> Modification la marque {{$infomarques->nommarque}}</h1>
                        
                    @endforeach 
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


                @foreach ($infomarque as $infomarques)
                                                        
                            <form action="{{route('UPDATEMARQUE',['id'=>$id=$infomarques->id])}}"  method="post">

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
                                                        <label for="exampleInputEmail1">Nom</label>
                                                        <input name="nommarqueupdate" type="text" class="form-control" id="exampleInputEmail1" value="{{$infomarques->nommarque}}">
                                                    </div>
                                     
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Commentaire</label>
                                                        <textarea name="commentaireupdate" value="{{$infomarques->commentairemarque}}" class="form-control" id="" cols="30" rows="10"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-primary" style="margin-top: -15px">Mettre a jour</button>

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
