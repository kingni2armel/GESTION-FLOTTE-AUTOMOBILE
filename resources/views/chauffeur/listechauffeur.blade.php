@include('layout.header');


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
        <div class="card-body"> 
                    @if($listechauffeur->count()>0)

                            <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                                <tr>
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
                                                                    <td>{{$listechauffeurs->nom }} {{$listechauffeurs->prenom}}</td>
                                                                    <td>{{$listechauffeurs->numero_telephone}}</td>    
                                                                    <td>{{$listechauffeurs->email}}</td>
                                                                    <td>{{$listechauffeurs->numero_cni}} </td>
                                                                    <td>{{$listechauffeurs->numero_permis}} </td>
                                                                    <td>
                                                                                @if($listechauffeurs->statut_chauffeur==1)
                                                                                    <p>libre</p>
                                                                                @else

                                                                                <p>occcupe</p>

                                                                                @endif
                                                                    </td>



                                                                    <td>
                                                                             <div class="parent">
                                                                                 <div class="parent_items">
                                                                                    @if($listechauffeurs->statut_chauffeur==0)

                                                                                    @else
                                                                                    <form action="{{route('DELETECHAUFFEUR',['id'=>$listechauffeurs->user_id])}}" method="post">
                                                                                        @csrf
                                                                                         <button type="su" class="btn btn-navbar items-but" style=
                                                                                         "background-color:red !important;color:white;pa"type="submit">
                                                                                         <i class="fas fa-trash"></i>
                                                                                         
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
                            <span>{{$listepagination->links()}}</span>
                        @else
                                <span> Il n'existe aucun utilisateur</span>
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