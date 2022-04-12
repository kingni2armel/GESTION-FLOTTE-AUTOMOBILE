@include('layout.header');
<div class="content-wrapper">
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">LISTE DES CLIENTS</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body"> 
                    @if($listeclient->count()>0)

                            <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                                <tr>
                                                    <th>Numero</th>
                                                    <th>Nom et Prenom</th>
                                                    <th>numero de telephone</th>
                                                    <th>email</th>
                                                    <th>Direction</th>
                                                    <th>departement</th>
                                                    <th>Service</th>
                                                    <th>Operation</th>
                                                </tr>
                                        </thead>
                                        <tbody>
                                                    @foreach ($listeclient as $listeclientS )
                                                            <tr>
                                                                    <td>{{$numerotationclient++}}</td>
                                                                    <td>{{$listeclientS->nom }} {{$listeclientS->prenom}}</td>
                                                                    <td>{{$listeclientS->numero_telephone}}</td>    
                                                                    <td>{{$listeclientS->email}}</td>
                                                                    <td>{{$listeclientS->nomdirection}} </td>
                                                                    <td>{{$listeclientS->nom_departement}} </td>
                                                                    <td>{{$listeclientS->nom_service}} </td>


                                                                    <td>
                                                                             <div class="parent">
                                                                                 <div class="parent_items">
                                                                                    <form action="{{route('DELETEUSER',['id'=>$listeclientS->id])}}" method="post">
                                                                                       @csrf
                                                                                        <button type="su" class="btn btn-navbar items-but" style=
                                                                                        "background-color:red !important;color:white;pa"type="submit">
                                                                                        <i class="fas fa-trash"></i>
                                                                                        
                                                                                          </button>
                                                                                    </form>
                                                                     
                                                                                 </div>
                                                                                 <div class="parent_items">
                                                                                    <a 
                                                                                    href="{{route('GETPAGEUPDATECLIENT',['id'=>$listeclientS->id])}}"
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