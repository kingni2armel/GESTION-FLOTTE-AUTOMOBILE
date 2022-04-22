@include('layout.header');
<div class="content-wrapper">
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">LISTE DES VEHICULES</h3>
        </div>

              @if (session()->has('notification.message'))
                          <div class="alert alert-{{session('notification.type')}}" style="margin-top: 15px">
                                  {{session('notification.message')}}
                          </div>
              @endif


        <!-- /.card-header -->
        <div class="card-body"> 
                    @if($informationvehicule->count()>0)

                            <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                                <tr>
                                                <th>Marque</th>
                                                <th>Modele</th>
                                                <th>Type carburant</th>
                                                <th>Nom parking</th>
                                                <th>Statut</th>
                                                <th>Immatriculation</th>
                                                <th>Kilometrage</th>
                                                <th>Numero de chassi</th>
                                                <th>Date debut assurance</th>
                                                <th>Date fin assurance</th>
                                                <th>Operation</th>

                                                </tr>
                                        </thead>
                                        <tbody>
                                                    @foreach ($informationvehicule as $informationvehiculeS )
                                                            <tr>
                                                                    <td>{{$informationvehiculeS->nommarque }} </td>
                                                                    <td>{{$informationvehiculeS->nommodele}}</td>    
                                                                    <td>{{$informationvehiculeS->nomtypecarburant}}</td>
                                                                    <td>{{$informationvehiculeS->nomparking}} </td>
                                                                    <td>{{$informationvehiculeS->statut_vehicule}}</td>
                                                                    <td>{{$informationvehiculeS->immatriculation}} </td>
                                                                    <td>{{$informationvehiculeS->kilometrage}}</td>
                                                                    <td>{{$informationvehiculeS->numero_chassi}} </td>
                                                                    <td>{{$informationvehiculeS->date_debut_assurance}}</td>
                                                                    <td>{{$informationvehiculeS->date_fin_assurance}} </td>

                                                                    <td>
                                                                             <div class="parent">
                                                                                 <div class="parent_items">
                                                                                    <form action="{{route('DELETEVEHICULE',['id'=>$informationvehiculeS->id])}}" method="post">
                                                                                       @csrf
                                                                                        <button type="su" class="btn btn-navbar items-but" style=
                                                                                        "background-color:red !important;color:white;pa"type="submit">
                                                                                        <i class="fas fa-trash"></i>
                                                                                        
                                                                                          </button>
                                                                                    </form>
                                                                     
                                                                                 </div>
                                                                                 <div class="parent_items">
                                                                                    <a 
                                                                                    href="{{route('GETPAGEUPDATEVEHICULE',['id'=>$informationvehiculeS->id])}}"
                                                                                       class="btn btn-navbar items-but" style=
                                                                                         "  background-color: #212529;!important;color:white"
                                                                                             type="button"
                                                                                            >
                                                                                            <i class="fas fa-pen"></i>
         
                                                                                  </a>
                                                                                 </div>
                                                                             </div>
                                                                    </td>
                                                            
                                                            </tr>  

                                                    @endforeach
                                        
                                    
                                        </tbody>
                            </table>
                            {{-- <span>{{$listeuser->links()}}</span> --}}
                        @else
                                <span> Il n'existe aucun vehicule</span>
                     @endif
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</div>
</div>

<style>
    .w-5{
        display: none;
    }
    th{
        font-size: 14px !important;
    }
</style>