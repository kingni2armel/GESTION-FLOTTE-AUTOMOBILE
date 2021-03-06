@include('layout.header');
<div class="content-wrapper">
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">LISTE DES DIRECTIONS</h3>
        </div>
        <!-- /.card-header -->

                @if (session()->has('notification.message'))
                      <div class="alert alert-{{session('notification.type')}}" style="margin-top: 15px">
                              {{session('notification.message')}}
                      </div>
                 @endif

                 
        <div class="card-body table-responsive p-0"> 
                    @if($listedirection->count()>0)

                            <table id="example1" class="table table-bordered  table-hover text-nowrap">
                                        <thead>
                                                <tr>
                                                    <th>Nom </th>
                                                    <th>Direction</th>
                                                    <th>Operation</th>
                                        
                                                </tr>
                                        </thead>
                                        <tbody>
                                                    @foreach ($listedirection as $listedirections )
                                                            <tr>
                                                                    <td>{{$listedirections->nomdirection}}</td>
                                                                    <td>{{$listedirections->descriptiondirection}}</td>    
                                                                    
                                                                    <td>
                                                                             <div class="parent">
                                                                                 <div class="parent_items">
                                                                                    <form action="{{route('DELETEDIRECTION',['id'=>$listedirections->id])}}" method="post">
                                                                                       @csrf
                                                                                        <button type="su" 
                                                                                            class="btn btn-navbar items-but"
                                                                                            style=
                                                                                            "background-color:red !important;color:white;"
                                                                                            title="Supprimer"
                                                                                            type="submit"
                                                                                        >
                                                                                         <i class="fas fa-trash"></i>
                                                                                        
                                                                                          </button>
                                                                                    </form>
                                                                     
                                                                                 </div>
                                                                                 <div class="parent_items">
                                                                                    <a 
                                                                                    href="{{route('GETPAGEUPDATEDIRECTION',['id'=>$listedirections->id])}}"
                                                                                       class="btn btn-navbar items-but"
                                                                                        style=
                                                                                          "background-color: #212529;!important;color:white"
                                                                                          title="Modifier"
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
                            <span>{{$listedirection->links()}}</span>
                        @else
                                <span> Il n'existe aucune direction</span>
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