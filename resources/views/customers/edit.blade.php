<x-layout>
    <a href="{{route('LIST_CUSTOMERS')}}"><button type="button" class="btn btn-primary">
        Zurück
    </button></a>
    <div class="container bg-dark text-white">
        <form action="{{route('UPDATE_CUSTOMER', $customer)}}" method="POST">
            @csrf
            @method('put')
            <label for="vorname">Vorname</label>
            <input type="text" id="vorname" name="vorname" value="{{$customer->vorname}}">
            <label for="nachname">Nachname</label>
            <input type="text" id="nachname" name="nachname" value="{{$customer->nachname}}"><br>
            <label for="email">E-Mail</label>
            <input type="email" id="email" name="email" value="{{$customer->email}}"><br>
            <label for="password">RFID-Nr.</label>
            <input type="number" id="password" name="password" value="{{$customer->password}}"><br>
            <input type="submit" value='Update'> 
        </form>
    </div>
</x-layout>