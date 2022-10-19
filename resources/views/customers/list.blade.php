<x-layout>
    <div class="container">
        <a href="/"><button type="button" class="btn btn-primary">
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
            <td>{{$customer->rfid->rfid_nr}}</td>
            <td>
                <a href="{{route('EDIT_CUSTOMER', $customer)}}"><button type="button" class="btn btn-primary">
                Edit
                </button></a>
                <a href="{{route('TOGGLE_CUSTOMER', $customer)}}"><button type="button" class="btn btn-primary">
                    Toggle
                </button></a>
                <a href="{{route('DESTROY_CUSTOMER', $customer)}}"><button type="button" class="btn btn-primary">
                    Löschen
                </button></a>
            </td>
        </tr>
        @else
            <tr class='bg-danger'>
                <td>{{$customer->vorname." ".$customer->nachname}}</td>
                <td>{{$customer->email}}</td>
                <td>{{$customer->rfid->rfid_nr}}</td>
                <td><a href="{{route('EDIT_CUSTOMER', $customer)}}"><button type="button" class="btn btn-primary">
                    Edit
                </button></a>
                <a href="{{route('TOGGLE_CUSTOMER', $customer)}}"><button type="button" class="btn btn-primary">
                    Toggle
                </button></a>
                <a href="{{route('DESTROY_CUSTOMER', $customer)}}"><button type="button" class="btn btn-primary">
                    Löschen
                </button></a>
            </form>
            </td>
            </tr>
        @endif
        @endforeach
        </table>
        <a href="{{route('CREATE_CUSTOMER')}}"><button type="button" class="btn btn-primary">
            Hinzufügen
        </button></a>
        <div class="d-flex justify-content-center">
            {!! $customers->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>

  
</x-layout>