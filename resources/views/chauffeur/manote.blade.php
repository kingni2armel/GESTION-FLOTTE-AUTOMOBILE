@include('layout.header');
<div class="content-wrapper">
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">MA NOTE</h3>
        </div>

        <div class="card-body"> 
                 

                            @if ($note->count()>0)
                            

                                    <table id="example1" class="table table-bordered table-striped">
                                                    <thead>
                                                            <tr>

                                                                
                                                                <th>Note / 20</th>
                                                                <th>Commentaire</th>
                                                    
                                                            </tr>
                                                    </thead>
                                                    <tbody>
                                                                @foreach ($note as $data )
                                                                        <tr>
                                                                        
                                                                                <td>{{$data->note_chauffeur}}</td>
                                                                                <td>{{$data->commentaire}}</td>    
                                                                                
                                                                        
                                                                        </tr>  

                                                                @endforeach
                                                    
                                                
                                                    </tbody>
                                </table>

                                    @else

                                    <p>Le client ne vous a pas encore note</p>


                                
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

