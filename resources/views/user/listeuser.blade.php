@include('layout.header');
<div class="content-wrapper">
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">LISTE DES UTILISATEURS</h3>
        </div>

        @if (session()->has('notification.message'))
              <div class="alert alert-{{session('notification.type')}}" style="margin-top: 15px">
                      {{session('notification.message')}}
              </div>
        @endif


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
                                                                             <div class="parent">
                                                                                 <div class="parent_items">
                                                                                    <form action="{{route('DELETEUSER',['id'=>$listeusers->id])}}" method="post">
                                                                                       @csrf
                                                                                        <button type="su" class="btn btn-navbar items-but" style=
                                                                                        "background-color:red !important;color:white;pa"type="submit">
                                                                                        <i class="fas fa-trash"></i>
                                                                                        
                                                                                          </button>
                                                                                    </form>
                                                                     
                                                                                 </div>
                                                                                 <div class="parent_items">
                                                                                    <a 
                                                                                    href="{{route('GETPAGEUPDATE',['id'=>$listeusers->id])}}"
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
                            <span>{{$listeuser->links()}}</span>
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