@include('layout.header');
<div class="content-wrapper">
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">LISTE DES MARQUES DES VOITURES</h3>
        </div>


        @if (session()->has('notification.message'))
              <div class="alert alert-{{session('notification.type')}}" style="margin-top: 15px">
                      {{session('notification.message')}}
              </div>
         @endif


        <!-- /.card-header -->
        <div class="card-body"> 
                    @if($listemarque->count()>0)

                            <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                                <tr>
                                                    <th>Nom </th>
                                                    <th>Commentaire</th>
                                                    <th>Operation</th>
                                                </tr>
                                        </thead>
                                        <tbody>
                                                    @foreach ($listemarque as $listemarques )
                                                            <tr>
                                                                    <td>{{$listemarques->nommarque}}</td>
                                                                    <td>{{$listemarques->commentairemarque}}</td>    


                                                                    
                                                                    <td>
                                                                             <div class="parent">
                                                                                 <div class="parent_items">
                                                                                    <form action="{{route('DELETEMARQUE',['id'=>$listemarques->id])}}" method="post">
                                                                                       @csrf
                                                                                        <button type="su" class="btn btn-navbar items-but" style=
                                                                                        "background-color:red !important;color:white;pa"type="submit">
                                                                                        <i class="fas fa-trash"></i>
                                                                                        
                                                                                          </button>
                                                                                    </form>
                                                                     
                                                                                 </div>
                                                                                 <div class="parent_items">
                                                                                    <a 
                                                                                    href="{{route('GETPAGEUPDATEMARQUE',['id'=>$listemarques->id])}}"
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
                            <span>{{$listemarque->links()}}</span>
                        @else
                                <span> Il n'existe aucune marque de vehicule</span>
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