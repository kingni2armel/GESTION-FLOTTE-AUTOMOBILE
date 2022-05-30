@include('layout.header');



        
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
           
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

    <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
              @if (auth()->user()->role =='admin' || auth()->user()->role=='superviseur' || auth()->user()->role == 'dispatcheur')

              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                  <div class="inner">
  
                      @if ($AllUser->count()>0)
                          <h3>{{$AllUser->count()}}</h3>
                          @else
                              <h3>0</h3>
                      @endif
  
                    
                    <p>Nombre d'utilisateurs</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-bag"></i>
                  </div>

                  <a href="#" class="small-box-footer">Voir la liste <i class="fas fa-arrow-circle-right"></i></a>

                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                  <div class="inner">
  
  
                          @if ($Allclients->count()>0)
                              <h3>{{$Allclients->count()}}</h3>
                              @else
                                  <h3>0</h3>
                         @endif    
  
                    <p>Nombre de clients</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                  </div>
                  <a href="{{route('GETLISTECLIENT')}}" class="small-box-footer">Voir la liste <i class="fas fa-arrow-circle-right"></i></a>

                </div>
              </div>
  
  
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                  <div class="inner">
  
                      @if ($Allchauffeur->count()>0)
                      <h3>{{$Allchauffeur->count()}}</h3>
                      @else
                          <h3>0</h3>
                    @endif
      
                    <p>Nombre de chauffeurs</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-person-add"></i>
                  </div>
                  <a href="{{route('GETLISTECHAUFFEUR')}}" class="small-box-footer">Voir la liste <i class="fas fa-arrow-circle-right"></i></a>

                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                  <div class="inner">
                   
                      @if ($Allmodels->count()>0)
                      <h3>{{$Allmodels->count()}}</h3>
                      @else
                          <h3>0</h3>
                    @endif 
      
                    <p>Nombre de modele de vehicule</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-bag"></i>
                  </div>
                  <a href="{{route('GETLISTEMODELE')}}" class="small-box-footer">Voir la liste <i class="fas fa-arrow-circle-right"></i></a>

                </div>
              </div>
              
              <!-- ./col -->
            </div>
      
          </section>
          <section class="content">
              <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                 
                  <!-- ./col -->
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                      <div class="inner">
                              @if ($Allreservation->count()>0)
                              <h3>{{$Allreservation->count()}}</h3>
                              @else
                                  <h3>0</h3>
                            @endif        
                        <p>Nombre de reservations</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                      </div>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                      <div class="inner">
                         
                          @if ($listereservationtraite->count()>0)
                              <h3>{{$listereservationtraite->count()}}</h3>
                              @else
                                  <h3>0</h3>
                            @endif  
          
                        <p>Nombre de reservations traites</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-person-add"></i>
                      </div>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                      <div class="inner">
                          @if ($listereservationnontraite->count()>0)
                          <h3>{{$listereservationnontraite->count()}}</h3>
                          @else
                              <h3>0</h3>
                        @endif 
          
                        <p>Nombre de reservations non traites</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                      </div>
                    </div>
                  </div>
  
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                      <div class="inner">
                          @if ($Allparking->count()>0)
                          <h3>{{$Allparking->count()}}</h3>
                          @else
                              <h3>0</h3>
                          @endif               
                        <p>Nombre de parking</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                      </div>
                    </div>
                  </div>
                  <!-- ./col -->
                </div>
                  <!-- ./col -->
                </div>
                
          
              </section>
  
              <section class="content">
                  <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                      <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                          <div class="inner">
                           
                              @if ($Alldirection->count()>0)
                              <h3>{{$Alldirection->count()}}</h3>
                              @else
                                  <h3>0</h3>
                            @endif 
              
                            <p>Nombre de directions</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-bag"></i>
                          </div>
                        </div>
                      </div>
                      <!-- ./col -->
                      <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                          <div class="inner">
  
                              @if ($Alldepartement->count()>0)
                              <h3>{{$Alldepartement->count()}}</h3>
                              @else
                                  <h3>0</h3>
                            @endif             
                            <p>Nombre de departements</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                          </div>
                        </div>
                      </div>
                      <!-- ./col -->
                      <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                          <div class="inner">
  
                              @if ($Allservice->count()>0)
                              <h3>{{$Allservice->count()}}</h3>
                              @else
                                  <h3>0</h3>
                              @endif              
                            <p>Nombre de services</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-person-add"></i>
                          </div>
                        </div>
                      </div>
                      <!-- ./col -->
                      <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                          <div class="inner">
                              @if ($Allparking->count()>0)
                              <h3>{{$Allparking->count()}}</h3>
                              @else
                                  <h3>0</h3>
                              @endif               
                            <p>Nombre de parking</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                          </div>
                        </div>
                      </div>
                      <!-- ./col -->
                    </div>
              
                  </section>
  
                  <section class="content">
                      <div class="container-fluid">
                        <!-- Small boxes (Stat box) -->
                        <div class="row">
                      
                          <!-- ./col -->
                          <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                              <div class="inner">
      
                                  @if ($Allmarque->count()>0)
                                  <h3>{{$Allmarque->count()}}</h3>
                                  @else
                                      <h3>0</h3>
                                @endif             
                                <p>Nombre de marque de vehicule</p>
                              </div>
                              <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                              </div>
                            </div>
                          </div>
                          <!-- ./col -->
                          <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                              <div class="inner">
      
                                  @if ($Allvehicule->count()>0)
                                  <h3>{{$Allvehicule->count()}}</h3>
                                  @else
                                      <h3>0</h3>
                                  @endif              
                                <p>Nombre de vehicule</p>
                              </div>
                              <div class="icon">
                                <i class="ion ion-person-add"></i>
                              </div>
                            </div>
                          </div>
                          <!-- ./col -->
                  
              @endif
                     

                          @if (auth()->user()->role== 'admin')
                          <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                              <div class="inner">
          
          
                                  @if ($Allsuperviseur->count()>0)
                                  <h3>{{$Allsuperviseur->count()}}</h3>
                                  @else
                                      <h3>0</h3>
                                @endif
                  
                                <p>Nombre de superviseurs</p>
                              </div>
                              <div class="icon">
                                <i class="ion ion-bag"></i>
                              </div>
                            </div>
                          </div>
                            
                            
                            
                            
                            
                          <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                              <div class="inner">
                           
                                  @if ($Alldispatcheur->count()>0)
                                  <h3>{{$Alldispatcheur->count()}}</h3>
                                  @else
                                      <h3>0</h3>
                                @endif
                  
                                <p>Nombre de dispatcheurs</p>
                              </div>
                              <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                              </div>
                            </div>
                          </div>
                    
                              
                          @endif
                    </section>

                          @if (auth()->user()->role === "client")
                          <section class="content">

                            <div class="col-lg-3 col-6">
                              <!-- small box -->
                              <div class="small-box bg-danger">
                                <div class="inner">
                             
                                    @if ($Alldispatcheur->count()>0)
                                    <h3>{{$Alldispatcheur->count()}}</h3>
                                    @else
                                        <h3>0</h3>
                                  @endif
                    
                                  <p>Nombre de mes reservations</p>
                                </div>
                                <div class="icon">
                                  <i class="ion ion-pie-graph"></i>
                                </div>
                              </div>
                            </div>
                          </section>
        
                              
                          @endif
</div>