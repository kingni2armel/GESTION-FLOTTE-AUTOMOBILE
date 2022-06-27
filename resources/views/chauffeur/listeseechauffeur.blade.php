@include('layout.header')
<div class="content-wrapper">
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">LISTE DES RESERVATIONS AUX QUELLES SUIS AFFECTES</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0 "> 


              @if (session()->has('notification.message'))
                  <div class="alert alert-{{session('notification.type')}}" style="margin-top: 15px">
                    {{session()->get('notification.message')}}
                  </div>
          
              @endif
                    @if($reservation->count()>0)

                            <div class="">
                                <table id="example1" class="table table-bordered  table-hover text-nowrap">
                                    <thead>
                                            <tr>
                                            <th>numero</th>
                                            <th>Ville depart</th>
                                            <th>Ville destination</th>
                                            <th>Date depart</th>
                                            <th>Date retour</th>
                                            <th>Nombre de place</th>
                                            <th>Statut chauffeur</th>
                                            <th>Statut convoiture</th>
                                            <th>Date et heure de l'operation</th>
                                            <th>Statut</th>
                                            <th>Operations</th>

                                            </tr>
                                    </thead>
                                    <tbody>
                                                @foreach ($reservation as $reservations )
                                                               <td>{{$numero ++}}</td>
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
                                                                    <div class="parent">
                                                                            <div class="parent_items">

                                                                                              @if ($reservations->statut_reservation==0)
                                                                                                      Non
                                                                                              @else
                                                                                                      Oui
                                                                                            @endif  
                                                                            </div>
                                                                            <div class="parent_items">
                                                                                      <form action="{{route('MODIFIERMONSTATUT',['id'=>$reservations->id])}}" method="post">
                                                                                              @csrf
                                                                                                  <button
                                                                                                        class="items-but"
                                                                                                        style="border:red;background-color: red;!important;color:white"type="submit">
                                                                                                        <i  title="Mettre fin a la reservation"class="fas fa-pen"></i>
                                                                                                  </button>
                                                                                      </form>
                                                                            </div>
                                                                    </div>
                                                                </td>
                                                                <td>

                                                                  @if ($reservations->statut_reservation==1)
                                                                        <div class="parent">


                                                                          
                                                
                                                                          <div class="parent_items">
                                                                                        <a 
                                                                                        href="{{route('SEEMYNOTE',['id'=>$reservations->id])}}"
                                                                                            class="btn btn-navbar items-but" style=
                                                                                              "  background-color: #212529;!important;color:white"
                                                                                                
                                                                                                >
                                                                                                <i  title="Voir ma note"class="fas fa-pen"></i>

                                                                                          </a>
                                                                          </div>
                                                                   </div>
                                                          @else 
                                                              Note pas encore disponible
                                                          @endif  
                                                 
                                                         </td>
                                                                                         
                                                              
                                                        </tr>  

                                                @endforeach
                                    
                                
                                    </tbody>
                        </table>
                            </div>
                            {{-- <span>{{$reservation->links()}}</span> --}}
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