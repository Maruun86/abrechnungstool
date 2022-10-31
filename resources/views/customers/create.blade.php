<x-layout>
    <a href="{{route('LIST_CUSTOMERS')}}"><button type="button" class="btn btn-primary">
        Zurück
    </button></a>
    <div class="container ">
        <form action="{{route('STORE_CUSTOMER')}}" method="POST">
            @csrf
            <label for="vorname">Vorname</label>
            <input type="text" id="vorname" name="vorname">
            <label for="nachname">Nachname</label>
            <input type="text" id="nachname" name="nachname"><br>
            <label for="email">E-Mail</label>
            <input type="email" id="email" name="email"><br>
            <label for="password">RFID-Nr.</label>
            <input type="number" id="password" name="password"><br>
            <input type="submit" value='Hinzufügen'> 
        </form>
    </div>
</x-layout>