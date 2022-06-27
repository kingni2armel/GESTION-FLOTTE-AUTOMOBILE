@include('layout.header');
<div class="content-wrapper">
    <div class="card">
        <div class="card-header">
          <h3 class="card-title table-responsive">LISTE DES SERVICES</h3>
        </div>

            @if (session()->has('notification.message'))
                <div class="alert alert-{{session('notification.type')}}" style="margin-top: 15px">
                        {{session('notification.message')}}
                </div>
           @endif


        <!-- /.card-header -->
        <div class="card-body"> 
                    @if($listeservice->count()>0)

                            <table id="example1" class="table table-bordered table-hover text-nowrap">
                                        <thead>
                                                <tr>
                                                    <th>Nom </th>
                                                    <th>Commentaire</th>
                                                    <th>Nom departement</th>
                                                    <th>Operation</th>
                                        
                                                </tr>
                                        </thead>
                                        <tbody>
                                                    @foreach ($infoservice as $infoservices )
                                                            <tr>
                                                                    <td>{{$infoservices->nom_service}}</td>
                                                                    <td>{{$infoservices->commentaire_service}}</td>    
                                                                    <td>{{$infoservices->nom_departement}}</td>
                                                                    <td>
                                                                             <div class="parent">
                                                                                 <div class="parent_items">
                                                                                    <form action="{{route('DELETESERVICE',['id'=>$infoservices->id])}}" method="post">
                                                                                       @csrf
                                                                                        <button
                                                                                                title="Supprimer"
                                                                                                class="btn btn-navbar items-but" style=
                                                                                                "background-color:red !important;color:white;
                                                                                                "type="submit"
                                                                                        >
                                                                                        <i class="fas fa-trash"></i>
                                                                                        
                                                                                          </button>
                                                                                    </form>
                                                                     
                                                                                 </div>
                                                                                 <div class="parent_items">
                                                                                    <a 
                                                                                    href="{{route('GETPAGEUPDATESERVICE',['id'=>$infoservices->id])}}"
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
                            <span>{{$listeservice->links()}}</span>
                        @else
                                <span> Il n'existe aucun service</span>
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