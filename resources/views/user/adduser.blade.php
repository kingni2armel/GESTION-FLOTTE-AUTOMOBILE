<h1>coucou {{auth()->user()->nom}}</h1>
<form action="{{route('AddUser')}}" method="post">
            @csrf
                        <p>nom</p>
                    <input type="text" name="nom" id=""><br>
                    <p>prenom</p>
                    <input type="text" name="prenom" id=""><br>
             
             
                   
                     <p>numero</p>
                    <input type="number" name="numero" id=""><br>
                    <p>email</p>
                    <input type="email" name="email" id=""><br>
                    <p>password</p>
                    <input type="password" name="password" id=""><br>
                    <p>role</p>
                    <input type="text" name="role">
            
                    <button type="submit">Creer</button>



        </form>