@include('layout.header');
<div class="content-wrapper">
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">LISTE DE MES RESERVATIONS</h3>
          
        </div>
        @if (session()->has('notification.message'))
        <div class="alert alert-{{session('notification.type')}}" style="margin-top: 15px">
                {{session('notification.message')}}
        </div>
@endif

        <!-- /.card-header -->
        <div class="card-body table-responsive"> 
                    @if($infomesreservation->count()>0)

                            <table id="example1" class="table table-bordered table-hover text-nowrap">
                                        <thead>
                                                <tr>
                                                <th>numero</th>
                                                <th>Motif reservation</th>
                                                <th>Ville depart</th>
                                                <th>Ville destination</th>
                                                <th>Date depart</th>
                                                <th>Date retour</th>
                                                <th>Nombre de place</th>
                                                <th>Statut chauffeur</th>
                                                <th>Statut convoiture</th>
                                                <th>Date et heure de l'operation</th>
                                                <th>Statut</th>
                                                <th>Operation</th>

                                                </tr>
                                        </thead>
                                        <tbody>
                                                    @foreach ($infomesreservation as $infomesreservations )
                                                                   <td>{{$nombrereservation++}}</td>
                                                                    <td>{{$infomesreservations->motif_demande }}</td>
                                                                    <td>{{$infomesreservations->ville_depart}}</td>    
                                                                    <td>{{$infomesreservations->ville_destination}}</td>
                                                                    <td>{{$infomesreservations->date_depart}} </td>
                                                                    <td>{{$infomesreservations->date_retour}} </td>
                                                                    <td>{{$infomesreservations->nombre_de_place}} </td>

                                                                    <td>
                                                                                @if ($infomesreservations->statut_chauffeur==0)
                                                                                    Non
                                                                                    @else
                                                                                    Oui
                                                                                @endif
                                                                                
                                                                     </td>

                                                                    <td>
                                                                                @if ($infomesreservations->statut_convoiture==0)
                                                                                        Non
                                                                                @else
                                                                                    Oui
                                                                                @endif    
                                                                    </td>
                                                                    <td>{{$infomesreservations->created_at}} </td>


                                                                    <td >
                                                                                             
                                                                    <td>
                                                                      <div class="parent">
                                                                          <div class="parent_items">
                                                                             <form action="{{route('DELETERESERVATION',['id'=>$infomesreservations->id])}}" method="post">
                                                                                @csrf
                                                                                 <button type="su" class="btn btn-navbar items-but"
                                                                                 title ="Supprimer"
                                                                                 style=
                                                                                 "background-color:red !important;color:white;pa"type="submit">
                                                                                 <i class="fas fa-trash"></i>
                                                                                 
                                                                                   </button>
                                                                             </form>
                                                              
                                                                          </div>
                                                                          <div class="parent_items">
                                                                             <a 
                                                                             href="{{route('GETPAGEUPDATRESERVATION',['id'=>$infomesreservations->id])}}"
                                                                                class="btn btn-navbar items-but" style=
                                                                                  "  background-color: #212529;!important;color:white"
                                                                                  title="Modifier"
                                                                                      type="button"
                                                                                     >
                                                                                     <i class="fas fa-pen"></i>
  
                                                                           </a>
                                                                          </div>
                                                                      </div>
                                                             </td>
                                                                    </td>
                                                            
                                                            </tr>  

                                                    @endforeach
                                        
                                    
                                        </tbody>
                            </table>
                            {{-- <span>{{$listeuser->links()}}</span> --}}
                        @else
                                <span> Vous n'avez effectue aucune reservation</span>
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

    th,td{
      font-size: 15px
    }
</style>