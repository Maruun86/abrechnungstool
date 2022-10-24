<x-layout>
    <script type="text/javascript">
        function RoleAuthTypeCheck() {
            if (document.getElementById("YesPin").selected) {
                document.getElementById("pin_needed").style.display = "block";
            } else {
                document.getElementById("pin_needed").style.display = "none";
            }
            if (document.getElementById("YesPassword").selected) {
                document.getElementById("password_needed").style.display = "block";
            } else {
                document.getElementById("password_needed").style.display = "none";
            }
        }
    </script>
    <a href="{{route('LIST_USERS')}}"><button type="button" class="btn btn-primary">
        Zurück
    </button></a>
    <div class="container bg-dark text-white">
        <form action="{{route('STORE_USER')}}" method="POST">
            @csrf
            <label for="name">Name</label>
            <input type="text" id="name" name="name"><br>

            @if ($errors->has('name'))
                <span class="text-danger">Name benötigt!</span><br>
            @endif

            <label for="email">E-Mail</label>
            <input type="email" id="email" name="email"><br>
                @if ($errors->has('email'))
                    <span class="text-danger">E-Mail benötigt!</span><br>
                @endif
            <label for="role_id">Rolle auswählen</label>
            <select name="role_id" id="role_id" onchange="RoleAuthTypeCheck()">
                <option  value='0'>Rolle auswählen</option>
                @foreach ($roles as $role)
                    @if ($role->pin_needed)
                            <option id ='YesPin' value={{$role->id}}>{{$role->name}}</option>
                    @else
                        @if ($role->password_needed)
                            <option id ='YesPassword' value={{$role->id}}>{{$role->name}}</option>
                        @else
                            <option value={{$role->id}}>{{$role->name}}</option>   
                        @endif
                    @endif
               
                @endforeach
            </select>
            <br>
            <label for="vendor_id">Vendor auswählen</label>
            <select name="vendor_id" id="vendor_id">
                <option value= 'NULL'>Kein Vendor</option>
                    @foreach ($vendors as $vendor)
                    <option value={{$vendor->id}}>{{$vendor->name}}</option>
                    @endforeach
            </select>
            <div id='pin_needed' style='display: none'>
                <label for="pin">5-Stelliger Pin</label>
                <input type="pin" id="pin" name="pin"><br>
                   
            </div>
            @if ($errors->has('pin'))
            <span class="text-danger">Ausgewählte Rolle braucht ein 5-stelligen Pin</span><br>
            @endif
            <div id='password_needed' style='display: none'>
                <label for="password">Passwort</label>
                <input type="password" id="password" name="password"><br>
                   
            </div>
            @if ($errors->has('password'))
            <span class="text-danger">Ausgewählte Rolle braucht ein Password</span><br>
        @endif
            <br>
            <label for="password">RFID-Nr.</label>
            <input type="text" id="password" name="password"><br>
            @if ($errors->has('password'))
                <span class="text-danger">RIFD-Nummer benötigt!</span><br>
            @endif
            <input type="submit" value='Hinzufügen'> 
        </form>
        
    </div>

   
       
</x-layout>