@include('layout.header')
<div class="content-wrapper">
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">LISTE DES REGIONS</h3>
        </div>

        @if (session()->has('notification.message'))
              <div class="alert alert-{{session('notification.type')}}" style="margin-top: 15px">
                      {{session('notification.message')}}
              </div>
        @endif


        <!-- /.card-header -->
        <div class="card-body table-responsive p-0"> 
                    @if($listeregion->count()>0)

                            <table id="example1" class="table table-bordered table-hover text-nowrap">
                                        <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nom </th>
                                                    <th>Commentaire</th>
                                                    <th>Operation</th>
                                        
                                                </tr>
                                        </thead>
                                        <tbody>
                                                    @foreach ($listeregion as $listeregions )
                                                            <tr>
                                                                <td>{{$row++}}</td>
                                                                    <td>{{$listeregions->nom }}</td>
                                                                    <td>{{$listeregions->commentaire}}</td>    
                                                                    
                                                                    <td>
                                                                             <div class="parent">
                                                                                 <div class="parent_items">
                                                                                    <form action="{{route('DELETEREGION',['id'=>$listeregions->id])}}" method="post">
                                                                                       @csrf
                                                                                        <button type="su" class="btn btn-navbar items-but" style=
                                                                                        "background-color:red !important;color:white;"
                                                                                        title="Supprimer"
                                                                                        type="submit">
                                                                                        <i class="fas fa-trash"></i>
                                                                                        
                                                                                          </button>
                                                                                    </form>
                                                                     
                                                                                 </div>
                                                                                 <div class="parent_items">
                                                                                    <a 
                                                                                    href="{{route('GETPAGEUPDATEREGION',['id'=>$listeregions->id])}}"
                                                                                       class="btn btn-navbar items-but" 
                                                                                       title="Modifier"
                                                                                       style=
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
                            <span>{{$listeregion->links()}}</span>
                        @else
                                <span> Il n'existe aucune region </span>
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