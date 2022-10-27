<x-layout>
    <div class="container">
        <a href="{{route('HOME')}}"><button type="button" class="btn btn-primary">
            Zurück
        </button></a>
        <h1>Kundenverwaltung</h1>
        <table class="table">
           <tr>
            <th>Name</th>
            <th>E-Mail</th>
            <th>RFID-Nr.</th>
            <th>Aktion</th>
           </tr>
        @foreach ($customers as $customer)
        @if ($customer->active)
        <tr>
            <td>{{$customer->vorname." ".$customer->nachname}}</td>
            <td>{{$customer->email}}</td>
            <td>{{$customer->rfid_nr}}</td>
            <td>
                @can('edit-customer')
                <a href="{{route('EDIT_CUSTOMER', $customer)}}"><button type="button" class="btn btn-primary">
                Edit
                </button></a>
                @endcan
                @can('toggle-customer')
                <a href="{{route('TOGGLE_CUSTOMER', $customer)}}"><button type="button" class="btn btn-primary">
                    Deaktivieren
                </button></a>
                @endcan
                @can('delete-customer')
                <a href="{{route('DESTROY_CUSTOMER', $customer)}}"><button type="button" class="btn btn-primary">
                    Löschen
                </button></a>
                @endcan
            </td>
        </tr>
        @else
            <tr class='bg-danger'>
                <td>{{$customer->vorname." ".$customer->nachname}}</td>
                <td>{{$customer->email}}</td>
                <td>{{$customer->rfid_nr}}</td>
                <td>
                    @can('edit-customer')
                        <a href="{{route('EDIT_CUSTOMER', $customer)}}"><button type="button" class="btn btn-primary">
                        Edit
                        </button></a>
                    @endcan
                    @can('toggle-customer')
                        <a href="{{route('TOGGLE_CUSTOMER', $customer)}}"><button type="button" class="btn btn-primary">
                            Aktivieren
                        </button></a>
                    @endcan
                    @can('delete-customer')
                        <a href="{{route('DESTROY_CUSTOMER', $customer)}}"><button type="button" class="btn btn-primary">
                            Löschen
                        </button></a>
                    @endcan
                </td>
            </tr>
        @endif
        @endforeach
        </table>
        @can('create-customer')
            <a href="{{route('CREATE_CUSTOMER')}}"><button type="button" class="btn btn-primary">
                Hinzufügen
            </button></a>
        @endcan
        <div class="d-flex justify-content-center">
            {!! $customers->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>

  
</x-layout>