<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Google Font: Source Sans Pro -->
  {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> --}}
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('plug/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{url('plug/daterangepicker/daterangepicker.css')}}">
  <link rel="stylesheet" href="{{url('plug/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{url('plug/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <link rel="stylesheet" href="{{url('plug/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css' )}}">
  <link rel="stylesheet" href="{{url('plug/select2/css/select2.min.css' )}}">
  <link rel="stylesheet" href="{{url('plug/select2-bootstrap4-theme/select2-bootstrap4.min.css' )}}">
  <link rel="stylesheet" href="{{url('plug/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">
  <link rel="stylesheet" href="{{url('plug/bs-stepper/css/bs-stepper.min.css' )}}">
  <link rel="stylesheet" href="{{url('plug/dropzone/min/dropzone.min.css')}}">
  <link rel="stylesheet" href="{{url('dist/css/adminlte.min.css' )}}">
  <link rel="stylesheet" href="{{url('assets/css/miss.css')}}">

  

</head>
<body class="hold-transition sidebar-mini">
    
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
     
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
   
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="height:120vh !important">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class=""> Light reservation</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a class="d-block">{{auth()->user()->nom}} {{auth()->user()->prenom}} </a>
          <a href="">{{auth()->user()->role}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                <a href="{{route('GetPage')}}" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>

               <li class="nav-item">
                @if(auth()->user()->role == 'chauffeur')

                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                          
                    <p>
                       Gestion reservation
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                
                    <li class="nav-item">
                      <a href="{{route('GETRESERVATIONBYCHAUFFEUR')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p> Liste  reservations</p>
                      </a>
      
                  </ul>


                
                @endif
      </li>



          <li class="nav-item">
                    @if(auth()->user()->role == 'admin' || auth()->user()->role == 'dispatcheur' || auth()->user()->role == 'superviseur')

                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                              
                        <p>
                           Gestion chauffeur
                          <i class="right fas fa-angle-left"></i>
                        </p>
                      </a>
                      <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="{{url('addchauffeur')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Creer  chauffeur</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="{{url('listechauffeur')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p> Liste  chauffeurs</p>
                          </a>
                        </li>

                        <li class="nav-item">
                          <a href="{{route('GETLISTECHAUFFEURDESACTIVE')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p> Liste  chauffeurs désactivé</p>
                          </a>
                        </li>
          
          
                      </ul>


                    
                    @endif
          </li>

              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-table"></i>
                  <p>
                     Gestion  compte
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  {{-- <li class="nav-item">
                    <a href="../tables/simple.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Supprimer compte</p>
                    </a>
                  </li> --}}
                  <li class="nav-item">
                    <a href="{{route('GETPAGESHOWMYINFORMATION')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Mise a jour</p>
                    </a>
                  </li>
                 
                </ul>
              </li>
             
        @if(auth()->user()->role == 'admin' || auth()->user()->role == 'dispatcheur' || auth()->user()->role == 'superviseur')
 
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Gestion clients
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('GETPAGECREATECLIENT')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Ajouter  client</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('GETLISTECLIENT')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Liste  clients</p>
              </a>
            </li>
           
          
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon far fa-envelope"></i>
            <p>
              Gestion direction
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('GETPAGECREATEDIRECTION')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Creer Direction</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('GETLISTEDIRECTION')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Liste directions</p>
              </a>
            </li>
            
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Gestion departement
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('GETPAGECREATEDEPARTEMENT')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Creer departement</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('GETLISTEDEPARTEMENT')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Liste departement</p>
              </a>
            </li>
            
          </ul>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-car"></i>
              <p>
                Gestion  vehicules
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('GETPAGECREATEVEHICULE')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Creer vehicule</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('GETLISTEVEHICULE')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Liste  vehicules</p>
                </a>
              </li>
            
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-car"></i>
              <p>
                Gestion  marque
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('GETPAGECREATEMARQUE')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Creer marque</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('GETLISTEMARQUE')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Liste  marque</p>
                </a>
              </li>
            
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-car"></i>
              <p>
                Gestion  Modele
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('GETPAGECREATEMODELE')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Creer modele</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('GETLISTEMODELE')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Liste  modeles</p>
                </a>
              </li>
            
            </ul>
          </li>
        
       
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Gestion region
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('GETPAGEREGION')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Creer region</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('GETLISTEREGION')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Liste region</p>
                </a>
              </li>
              
            </ul>
          </li>

        
          @if(auth()->user()->role == 'admin')
                   
          <li class="nav-item">
              <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                              Gestion  users
                          <i class="fas fa-angle-left right"></i>
                          <span class="badge badge-info right"></span>
                  </p>
              </a>
              <ul class="nav nav-treeview">
                  <li class="nav-item">
                  <a href="{{url('/adduser')}} " class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Creer user</p>
                  </a>
                  </li>
                  <li class="nav-item">
                  <a href="{{url('/listeuser')}} " class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Liste des users <span class="ai-users"></span></p>
                  </a>
                  </li>
                  
                  
              </ul>
          </li>
    @endif
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Gestion Ville
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('GETPAGECREATEVILLE')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Creer ville</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('GETLISTEVILLE')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Liste ville</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-car"></i>
              <p>
                Gestion  type carburant
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('GETPAGECREATETYPECARBURANT')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Creer un  carburant</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('GETLISTETYPECARBURANT')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Liste  carburants</p>
                </a>
              </li>
            
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Gestion parking
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('GETPAGECREATEPARKING')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Creer parking</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('GETLISTEPARKING')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Liste parking</p>
                </a>
              </li>
              
            </ul> 
        @endif
     
        @if(auth()->user()->role == 'admin' || auth()->user()->role == 'dispatcheur' || auth()->user()->role == 'superviseur')

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                 Gestion reservations
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('GETLISTERESERVATIONONTRAITE')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p style="font-size: 13px">Liste reservations non traite</p>
                </a>
              </li>
              
             
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('GETLISTEALLRESERVATION')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p style="font-size: 13px">Liste reservations</p>
                </a>
              </li>
              
             
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('GETLISTERESERVATIONTRAITE')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p style="font-size: 13px">Liste reservations  traite</p>
                </a>
              </li>
              
             
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-car"></i>
              <p>
                Gestion  services
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('GETPAGECREATESERVICE')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Creer service</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('GETLISTESERVICE')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Liste  services</p>
                </a>
              </li>
            
            </ul>
          </li>
    @endif
        
          @if(auth()->user()->role == 'client')

            <li class="nav-header">Autres</li>
                <li class="nav-item">
                    <a href="{{route('GETPAGELISTERESERVATIONBYID')}}" class="nav-link">
                    <i class="nav-icon far fa-calendar-alt"></i>
                    <p>
                        Liste  reservations
                        <span class="badge badge-info right"></span>
                    </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('GETPAGECREATERESERVATION')}}" class="nav-link">
                    <i class="nav-icon far fa-image"></i>
                    <p>
                        Creer reservation
                    </p>
                    </a>
                </li>
            @endif
        
       

        
          <li class="nav-item">
                <form action="{{route('Logout')}}" method="get">
                      <button class="button-deconnect" type="submit">Deconnexion</button>
                </form>
          </li>
          
       

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->



  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>

<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{url('plug/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{url('plug/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{url('dist/js/demo.js')}}"></script>
<script src="{{url('plug/select2/js/select2.full.min.js')}}"></script>
<script src="{{url('plug/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>

<script src="{{url('plug/moment/moment.min.js')}}"></script>
<script src="{{url('plug/moment/moment.min.js')}}"></script>



<script src="{{url('plug/inputmask/jquery.inputmask.min.js')}}"></script>


<script src="{{url('plug/bs-stepper/js/bs-stepper.min.js')}}"></script>

<script src="{{url('plug/daterangepicker/daterangepicker.js')}}"></script>

<script src="{{url('plug/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
<script src="{{url('plug/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>

 <script src="{{url('plug/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>

<script src="{{url('assets/js/print.js')}}"></script>

{{-- <script src="{{url('plug/dropzone/min/dropzone.min.js')}}"></script>
<script src="{{url('dist/js/adminlte.min.js')}}"></script>
<script src="{{url('dist/js/demo.js')}}"></script> --}} 
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()
    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });
    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )
    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })
    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()
    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()
    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })
    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })
  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })
  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false
  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)
  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })
  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
  })
  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })
  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })
  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
  })
  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
  }
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true)
  }
  // DropzoneJS Demo Code End
</script>






</body>
</html>