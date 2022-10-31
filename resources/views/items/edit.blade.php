<x-layout>
   
    <div class="container">
        <a href="{{route('LIST_ITEMS')}}"><button type="button" class="btn btn-primary">
            Zurück
        </button></a><br><br>
        <h4>{{$item->name}} editieren</h4>
        <form action="{{route('UPDATE_ITEM', $item)}}" method="POST">
            @csrf
            @method('PUT')
            <label for="name">Name</label><br>
            <input type="text" id="name" name="name" value="{{$item->name}}"><br>
            <label for="preis">Preis</label><br>
            <input type="number" step="0.01" id="preis" name="preis" value="{{$item->preis}}"><br>
            <label for="prozent_in_decimal">Vat auswählen</label>
            <select name="prozent_in_decimal" id="prozent_in_decimal">
                @foreach ($vats as $vat)
                @if ($vat->id === $item->vat->id)
                    <option value={{$vat->prozent_in_decimal}} selected>{{$vat->prozent_in_decimal}}</option>
                    @else
                    <option value={{$vat->prozent_in_decimal}}>{{$vat->prozent_in_decimal}}</option>
                @endif
                @endforeach
            </select>
            <br>
            <input type="submit" value='Update'> 
        </form>
    </div>
</x-layout>