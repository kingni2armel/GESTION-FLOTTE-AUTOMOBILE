@include('layout.header');
<div class="content-wrapper">
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Liste des utilisateurs</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body"> 
                    @if($listeuser->count()>0)

                            <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                                <tr>
                                                <th>Nom et Prenom</th>
                                                <th>numero de telephone</th>
                                                <th>email</th>
                                                <th>Role</th>
                                                <th>Operation</th>
                                                </tr>
                                        </thead>
                                        <tbody>
                                                    @foreach ($listeuser as $listeusers )
                                                            <tr>
                                                                    <td>{{$listeusers->nom }} {{$listeusers->prenom}}</td>
                                                                    <td>{{$listeusers->numero_telephone}}</td>    
                                                                    <td>{{$listeusers->email}}</td>
                                                                    <td>{{$listeusers->role}} </td>
                                                                    <td>
                                                                          <button class="btn btn-navbar" style=
                                                                                  "background-color:red !important;color:white"type="submit" data-widget="navbar-search">
                                                                                    Supprimer
                                                                            </button>
                                                                             <a 
                                                                               href="{{route('GETPAGEUPDATE',['id'=>$listeusers->id])}}"
                                                                                  class="btn btn-navbar" style=
                                                                                    "  background-color: #212529;!important;color:white"
                                                                                        type="button"
                                                                                       >
                                                                                        Modifier
                                                                             </a>
                                                                    </td>
                                                            
                                                            </tr>  

                                                    @endforeach
                                        
                                    
                                        </tbody>
                            </table>
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