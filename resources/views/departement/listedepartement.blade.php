@include('layout.header');
<div class="content-wrapper">
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">LISTE DES DEPARTEMENTS</h3>
        </div>
        @if (session()->has('notification.message'))
            <div class="alert alert-{{session('notification.type')}}" style="margin-top: 15px">
                    {{session('notification.message')}}
            </div>
         @endif
        <!-- /.card-header -->
        <div class="card-body"> 
                    @if($listedepartement->count()>0)

                            <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                                <tr>

                                                    <th>Numero</th>
                                                    <th>Nom </th>
                                                    <th>Description</th>
                                                    <th>Operation</th>
                                        
                                                </tr>
                                        </thead>
                                        <tbody>
                                                    @foreach ($listedepartement as $listedepartements )
                                                            <tr>

                                                                <td>
                                                                    {{ $numerotation ++}}
                                                                </td>
                                                                    <td>{{$listedepartements->nom_departement}}</td>
                                                                    <td>{{$listedepartements->commentaire_departement}}</td>    
                                                                    
                                                                    <td>
                                                                             <div class="parent">
                                                                                 <div class="parent_items">
                                                                                    <form action="{{route('DELETEDEPARTEMENT',['id'=>$listedepartements->id])}}" method="post">
                                                                                       @csrf
                                                                                        <button type="su" class="btn btn-navbar items-but" style=
                                                                                        "background-color:red !important;color:white;pa"type="submit">
                                                                                        <i class="fas fa-trash"></i>
                                                                                        
                                                                                          </button>
                                                                                    </form>
                                                                     
                                                                                 </div>
                                                                                 <div class="parent_items">
                                                                                    <a 
                                                                                    href="{{route('GETPAGEUPDATEDEPARTEMENT',['id'=>$listedepartements->id])}}"
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
                            <span>{{$listedepartement->links()}}</span>
                        @else
                                <span> Il n'existe aucun departement</span>
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