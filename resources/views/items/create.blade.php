<x-layout>
    <a href="{{route('LIST_ITEMS')}}"><button type="button" class="btn btn-primary">
        Zurück
    </button></a>
    <div class="container ">
        <form action="{{route('STORE_ITEM')}}" method="POST">
            @csrf
            <label for="name">Name</label><br>
            <input type="text" id="name" name="name"><br>
            <label for="preis">Preis</label><br>
            <input type="number" step="0.01" id="preis" name="preis"><br>
            <label for="prozent_in_decimal">Vat auswählen</label>
            <select name="prozent_in_decimal" id="prozent_in_decimal">
                @foreach ($vats as $vat)
                <option value={{$vat->prozent_in_decimal}}>{{$vat->prozent_in_decimal}}</option>
                @endforeach
            </select>
            <br>
            <input type="submit" value='Hinzufügen'> 
        </form>
    </div>
</x-layout>