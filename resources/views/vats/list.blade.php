<x-layout>
    <div class="container">
        <a href="/"><button type="button" class="btn btn-primary">
            Zurück
        </button></a>
        <h1>VAT-Verwaltung</h1>
        <table class="table">
           <tr>
            <th>Prozent in Dezimal</th>
            <th>Aktionen<th>
           </tr>
        @foreach ($vats as $vat)
           @if ($vat->prozent_in_decimal > 0)
            <tr>
                <td>{{$vat->prozent_in_decimal}}</td>
                <td><a href="{{route('EDIT_VAT', $vat)}}"><button type="button" class="btn btn-primary">
                    Edit
                </button></a>
                <a href="{{route('DESTROY_VAT', $vat)}}"><button type="button" class="btn btn-primary">
                    Löschen
                </button></a>
                </td>
            </tr>
            @else
            <tr>
                <td>{{$vat->prozent_in_decimal}}</td>
                <td>Keine Aktionen verfügbar</td>
            </tr>

            @endif
        @endforeach
        </table>
        <a href="{{route('CREATE_VAT')}}"><button type="button" class="btn btn-primary">
            Hinzufügen
        </button></a>  
  </div>
  <div class="d-flex justify-content-center">
    {!! $vats->withQueryString()->links('pagination::bootstrap-5') !!}
</div>
</x-layout>