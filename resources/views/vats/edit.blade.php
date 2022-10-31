<x-layout>
   
    <div class="container">
        <a href="{{route('LIST_VATS')}}"><button type="button" class="btn btn-primary">
            Zurück
        </button></a><br><br>
        <h4>VAT editieren</h4>
        <form action="{{route('UPDATE_VAT', $vat)}}" method="POST">
            @csrf
            @method('put')
            <label for="prozent_in_decimal">Prozent in Dezimal</label><br>
            <input type="number" step="0.01" id="prozent_in_decimal" name="prozent_in_decimal" value="{{$vat->prozent_in_decimal}}"><br>
            <br>
            <input type="submit" value='Update'> 
        </form>
    </div>
</x-layout>