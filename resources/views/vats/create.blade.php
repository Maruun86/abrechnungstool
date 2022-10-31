<x-layout>
    <a href="{{route('LIST_VATS')}}"><button type="button" class="btn btn-primary">
        Zurück
    </button></a>
    <div class="container ">
        <form action="{{route('STORE_VAT')}}" method="POST">
            @csrf
            <label for="prozent_in_decimal">Prozent in Dezimal</label><br>
            <input type="number" step="0.01" id="prozent_in_decimal" name="prozent_in_decimal"><br>
            <br>
            <input type="submit" value='Hinzufügen'> 
        </form>
    </div>
</x-layout>