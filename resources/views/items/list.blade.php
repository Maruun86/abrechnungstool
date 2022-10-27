<x-layout>
    <div class="container">
        <a href="{{route('HOME')}}"><button type="button" class="btn btn-primary">
            Zurück
        </button></a>
        <h1>Itemverwaltung</h1>
        <table class="table">
           <tr>
            <th>Name</th>
            <th>Preis</th>
            <th>VAT</th>
            <th>Aktionen<th>
           </tr>
        @foreach ($items as $item)
            <tr>
                <td>{{$item->name}}</td>
                <td>{{$item->preis}}€</td>
                <td>{{$item->vat->prozent_in_decimal ? $item->vat->prozent_in_decimal :  0}}</td>
                @can('edit-item')
                <td><a href="{{route('EDIT_ITEM', $item)}}"><button type="button" class="btn btn-primary">
                    Edit
                </button></a>
                @endcan
                @can('delete-item')
                <a href="{{route('DESTROY_ITEM', $item)}}"><button type="button" class="btn btn-primary">
                    Löschen
                </button></a>
                @endcan
                </td>
            </tr>
        @endforeach
        </table>
        @can('create-item')
        <a href="{{route('CREATE_ITEM')}}"><button type="button" class="btn btn-primary">
            Hinzufügen
        </button></a>  
        @endcan
  </div>
  <div class="d-flex justify-content-center">
    {!! $items->withQueryString()->links('pagination::bootstrap-5') !!}
</div>
</x-layout>