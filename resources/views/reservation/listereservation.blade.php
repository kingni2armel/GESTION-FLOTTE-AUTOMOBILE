@include('layout.header');
<div class="content-wrapper">
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">LISTE DES RESERVATIONS TOUTE LES RESERVATIONS</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body  table-responsive"> 
                    @if($reservation->count()>0)

                            <div class="table-responsive">
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
                                                @foreach ($reservation as $reservations )
                                                               <td>{{$numero ++}}</td>
                                                                <td>{{$reservations->motif_demande }}</td>
                                                                <td>{{$reservations->ville_depart}}</td>

                                                                <td>{{$reservations->ville_destination}}</td>
                                                                <td>{{$reservations->date_depart}} </td>
                                                                <td>{{$reservations->date_retour}} </td>
                                                                <td>{{$reservations->nombre_de_place}} </td>

                                                                <td>
                                                                            @if ($reservations->statut_chauffeur==0)
                                                                                Non
                                                                                @else
                                                                                Oui
                                                                            @endif
                                                                            
                                                                 </td>

                                                                <td>
                                                                            @if ($reservations->statut_convoiture==0)
                                                                                    Non
                                                                            @else
                                                                                Oui
                                                                            @endif    
                                                                </td>
                                                                <td>{{$reservations->created_at}} </td>


                                                                <td >
                                                                        non                    
                                                              
                                                        </tr>  

                                                @endforeach
                                    
                                
                                    </tbody>
                        </table>
                            </div>
                            <span>{{$reservation->links()}}</span>
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