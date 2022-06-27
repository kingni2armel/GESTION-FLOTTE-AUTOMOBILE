@include('layout.header')


<div class="content-wrapper">
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">LISTE DES CHAUFFEURS</h3>
        </div>


        @if (session()->has('notification.message'))
            <div class="alert alert-{{session('notification.type')}}" style="margin-top: 15px">
              {{session()->get('notification.message')}}
            </div>
        @endif



        
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0"> 
                    @if($listechauffeur->count()>0)

                            <table id="example1" class="table table-bordered table-hover text-nowrap">
                                        <thead>
                                                <tr>
                                                  <th>#</th>
                                                <th>Nom et Prenom</th>
                                                <th>numero de telephone</th>
                                                <th>email</th>
                                                <th>Numero cni</th>
                                                <th>Numero permis</th>
                                                <th>Statut</th>
                                                <th>Operation</th>
                                                </tr>
                                        </thead>
                                        <tbody>
                                                    @foreach ($listechauffeur as $listechauffeurs )
                                                            <tr>
                                                              <td>{{$row++}}</td>
                                                                    <td>{{$listechauffeurs->nom }} {{$listechauffeurs->prenom}}</td>
                                                                    <td>{{$listechauffeurs->numero_telephone}}</td>    
                                                                    <td>{{$listechauffeurs->email}}</td>
                                                                    <td>{{$listechauffeurs->numero_cni}} </td>
                                                                    <td>{{$listechauffeurs->numero_permis}} </td>
                                                                    <td>
                                                                                @if($listechauffeurs->statut_chauffeur==1)
                                                                                    <p>libre</p>
                                                                                @else

                                                                                <p>En reservation</p>

                                                                                @endif
                                                                    </td>



                                                                    <td>
                                                                             <div class="parent">
                                                                                 <div class="parent_items">
                                                                                    @if($listechauffeurs->statut_chauffeur==0)

                                                                                    @else
                                                                                    <form action="{{route('ACTIVERCHAUFFEUR',['id'=>$listechauffeurs->id])}}" method="post">
                                                                                        @csrf
                                                                                         <button  title ="Activer" type="su" class="btn btn-navbar items-but" style=
                                                                                         "background-color:red !important;color:white;pa"type="submit">
                                                                                         <i title ="Activer" class="fas fa-trash"></i>
                                                                                         
                                                                                           </button>
                                                                                     </form>
                                                                                    @endif
                                                                     
                                                                                 </div>
                                                                                 <div class="parent_items">
                                                                                    <a 
                                                                                    href="{{route('GETPAGEUPDATECHAUFFEUR',['id'=>$listechauffeurs->id])}}"
                                                                                       class="btn btn-navbar items-but" style=
                                                                                         "  background-color: #212529;!important;color:white"
                                                                                             type="button"
                                                                                             title ="Modifier"
                                                                                            >
                                                                                            <i  class="fas fa-pen"></i>
         
                                                                                  </a>
                                                                                 </div>
                                                                             </div>
                                                                    </td>
                                                            
                                                            </tr>  

                                                    @endforeach
                                        
                                    
                                        </tbody>
                            </table>
                            <span>{{$listepagination->links()}}</span>
                        @else
                                <span style="margin-left:20px"> Il n'existe aucun chauffeur désactivé</span>
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
</style>