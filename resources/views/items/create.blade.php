<x-layout>
    <a href="{{route('LIST_ITEMS')}}"><button type="button" class="btn btn-primary">
        Zurück
    </button></a>
    <div class="container bg-dark text-white">
        <form action="{{route('ADD_ITEM')}}" method="POST">
            @csrf
            <label for="name">Name</label><br>
            <input type="text" id="name" name="name"><br>
            <label for="preis">Preis</label><br>
            <input type="text" id="preis" name="preis"><br>
            <label for="prozent_in_decimal">Vat auswählen</label>
            <input list="prozent_in_decimal" name="prozent_in_decimal">
            <datalist id="prozent_in_decimal">
                @foreach ($vats as $vat)
                <option value={{$vat->prozent_in_decimal}}>
                @endforeach
            </datalist>
            <br>
            <input type="submit" value='Submit'> 
        </form>
    </div>
</x-layout>