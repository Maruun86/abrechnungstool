<x-layout>
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
            <select name="role_id" id="role_id">
                @foreach ($roles as $role)
                <option value={{$role->id}}>{{$role->name}}</option>
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
            <br>
            <label for="rfid_nr">RFID-Nr.</label>
            <input type="text" id="rfid_nr" name="rfid_nr"><br>
            @if ($errors->has('rfid_nr'))
                <span class="text-danger">RIFD-Nummer benötigt!</span><br>
            @endif
            <input type="submit" value='Hinzufügen'> 
        </form>

    </div>
</x-layout>