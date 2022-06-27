@include('layout.header');
<div class="content-wrapper">
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">LISTE DES RESERVATIONS  TRAITES</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0"> 
                    @if($listereservation->count()>0)

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

                                                </tr>
                                        </thead>
                                        <tbody>
                                                    @foreach ($listereservation as $listereservations )
                                                                   <td>{{$nombrereservation ++}}</td>
                                                                    <td>{{$listereservations->motif_demande }}</td>
                                                                    <td>{{$listereservations->ville_depart}}</td>

                                                                    <td>{{$listereservations->ville_destination}}</td>
                                                                    <td>{{$listereservations->date_depart}} </td>
                                                                    <td>{{$listereservations->date_retour}} </td>
                                                                    <td>{{$listereservations->nombre_de_place}} </td>

                                                                    <td>
                                                                                @if ($listereservations->statut_chauffeur==0)
                                                                                    Non
                                                                                    @else
                                                                                    Oui
                                                                                @endif
                                                                                
                                                                     </td>

                                                                    <td>
                                                                                @if ($listereservations->statut_convoiture==0)
                                                                                        Non
                                                                                @else
                                                                                    Oui
                                                                                @endif    
                                                                    </td>
                                                                    <td>{{$listereservations->created_at}} </td>


                                                                    <td >
                                                                            non                    
                                                                    <td>
                                                                   
                                                            </tr>  

                                                    @endforeach
                                        
                                    
                                        </tbody>
                            </table>
                            {{-- <span>{{$listeuser->links()}}</span> --}}
                        @else
                                <span>Il ya pas de reservation pour le moment</span>
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
      font-size: 13px
    }
</style>