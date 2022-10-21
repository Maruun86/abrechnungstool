<x-layout>
    <a href="{{route('LIST_VATS')}}"><button type="button" class="btn btn-primary">
        Zurück
    </button></a>
    <div class="container bg-dark text-white">
        <form action="{{route('UPDATE_VAT', $vat)}}" method="POST">
            @csrf
            @method('put')
            <label for="prozent_in_decimal">Prozent in Dezimal</label><br>
            <input type="number" id="prozent_in_decimal" name="prozent_in_decimal" value="{{$vat->prozent_in_decimal}}"><br>
            <br>
            <input type="submit" value='Update'> 
        </form>
    </div>
</x-layout>