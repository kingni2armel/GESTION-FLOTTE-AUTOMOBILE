@include('layout.header');
<div class="content-wrapper">
    <button class="btn btn-primary but-imprimer"  onClick="imprimer('print')">Imprimer</button>
    

                            <div class="" id="print">
                                <div class="parent">
                                    <h1 class="nameagence">LIGHT RESERVATION</h1>
                        
                                    <div class="conteiner_information">
                                                <div style="margin-right: 170px"b class="conteiner_information_item items-data">
                                                    <p>Telephone : +237 699 666 252</p>
                                                    <p>Email:lightreservation@gmail.com</p>
                                                </div>
                                    </div>
                                </div>
                        
                                @foreach ($informationreservationfiledownload as $items )
                                <div class="datas">

                                    <div class="data">          
                                        <h1 class="title-information">Informations sur le Vehicule</h1>
                                        <p class="data-information">Numero de chassis: {{$items->numero_chassi}}</p>
                                        <p class="data-information">Numero d'immatriculation: {{$items->immatriculation}}</p>
                                        <p class="data-information">Type de carburant: {{$items->nomtypecarburant}}</p>

                                        <p class="data-information">Marque: Tesla</p>
                                        <p class="data-information">Modele: S plaid</p>
                                        <p class="data-information">Nombre de places: 5</p>
                                        <p class="data-information">kilometrage: {{$items->kilometrage}} km/h</p>
                                    </div>
                                
                                
                                        <div class="data">          
                                            <h1 class="title-information" style="margin-right: 135px">Informations sur le chauffeur</h1>
                                            <p class="data-information">Ville de depart: Nom et prenom: {{$items->nom}} {{$items->prenom}}</p>
                                            <p class="data-information"> Email: {{$items->email}}</p>
        
                                            <p class="data-information">Numero de la cni: {{$items->numero_cni}}</p>
                                            <p class="data-information">Numero du permis de conduire: {{$items->numero_permis}}</p>
                                
                                        </div>

                                 </div>



                                <div class="datas">

                                        <div class="data">          
                                            <h1 class="title-information">Informations sur le client</h1>
                                            <p class="data-information">Nom et prenom: {{$items->nom_client}}  {{$items->prenom_client}}</p>
                                            <p class="data-information">Numero de telephone: +237 956 602 696</p>
                                            <p class="data-information">Direction:</p>
                                            <p class="data-information">Departement:</p>
                                            <p class="data-information">Service:</p>
                                        </div>
                                    
                                    
                                            <div class="data">          
                                                <h1 class="title-information">Informations sur la reservation</h1>
                                                <p class="data-information">Ville de depart: {{$items->ville_depart}}</p>
                                                <p class="data-information">Ville de destination: {{$items->ville_destination}}</p>
                                                <p class="data-information">Date de depart: {{$items->date_depart}}</p>
                                                <p class="data-information">Date de retour: {{$items->date_retour}}</p>
                                                <p class="data-information">Heur de demamde de la reservation: {{$items->created_at}}</p>
                                                <p class="data-information">Motif  de la reservation: {{$items->motif_demande}}</p>
                                    
                                            </div>

                                </div>
                            
                                        <img src="{{Storage::url($items->path)}}" alt="">
                            

                                @endforeach
                        
                            </div>
                
                            
        </div>

        

</div>