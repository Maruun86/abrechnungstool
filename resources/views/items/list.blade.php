<x-layout>
    <div class="container">
        <a href="/"><button type="button" class="btn btn-primary">
            Zurück
        </button></a>
        <table class="table">
           <tr>
            <th>Name</th>
            <th>Preis</th>
            <th>VAT</th>
           </tr>
        @foreach ($items as $item)
            <tr>
                <td>{{$item->name}}</td>
                <td>{{$item->preis}}€</td>
                <td>{{$item->vat->prozent_in_decimal ? $item->vat->prozent_in_decimal :  0}}</td>
            </tr>
        @endforeach
        </table>
        <a href="{{route('CREATE_ITEM')}}"><button type="button" class="btn btn-primary">
            Hinzufügen
        </button></a>
  </div>
</x-layout>