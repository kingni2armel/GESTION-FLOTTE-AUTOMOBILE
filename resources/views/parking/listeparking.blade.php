@include('layout.header');
<div class="content-wrapper">
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">LISTE DES PARKINGS</h3>
        </div>

              @if (session()->has('notification.message'))
                    <div class="alert alert-{{session('notification.type')}}" style="margin-top: 15px">
                            {{session('notification.message')}}
                    </div>
            @endif


        <!-- /.card-header -->
        <div class="card-body table-responsive p-0"> 
                    @if($infoville->count()>0)

                            <table id="example1" class="table table-bordered  table-hover text-nowrap">
                                        <thead>
                                                <tr>
                                                    <th>Nom </th>
                                                    <th>Description</th>
                                                    <th>Nombre de place</th>
                                                    <th>Nom  de la ville</th>
                                                    <th>Operation</th>
                                                </tr>
                                        </thead>
                                        <tbody>
                                                    @foreach ($infoville as $infovilles )
                                                            <tr>
                                                                    <td>{{$infovilles->nomparking}}</td>
                                                                    <td>{{$infovilles->description}}</td>    
                                                                    <td>{{$infovilles->nombre_de_place}}</td> 
                                                                        <td>{{$infovilles->nom}}</td>

                                                                    
                                                                    <td>
                                                                             <div class="parent">
                                                                                 <div class="parent_items">
                                                                                    <form action="{{route('DELETEPARKING',['id'=>$infovilles->id])}}" method="post">
                                                                                       @csrf
                                                                                        <button type="submit" 
                                                                                        class="btn btn-navbar items-but" style=
                                                                                        "background-color:red !important;color:white;"
                                                                                        title="Supprimer"
                                                                                        type="submit">
                                                                                        <i class="fas fa-trash"></i>
                                                                                        
                                                                                          </button>
                                                                                    </form>
                                                                     
                                                                                 </div>
                                                                                 <div class="parent_items">
                                                                                    <a 
                                                                                    href="{{route('GETPAGEUPDATEPARKING',['id'=>$infovilles->id])}}"
                                                                                       class="btn btn-navbar items-but" style=
                                                                                         "  background-color: #212529;!important;color:white"
                                                                                             type="button"
                                                                                             title="Modifier"
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
                                <span> Il n'existe aucun parking</span>
                     @endif
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
</div>
<!-- /.col -->
  <!-- /.row -->
</div>
</div>

<style>
    .w-5{
        display: none;
    }
</style>