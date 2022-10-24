<x-layout>
    <div class="container">
        <a href="/"><button type="button" class="btn btn-primary">
            Zurück
        </button></a>
        <h1>Benutzerverwaltung</h1>
        <table class="table">
           <tr>
            <th>Name</th>
            <th>E-Mail</th>
            <th>Rolle</th>
            <th>Vendor</th>
            <th>RFID-Nr.</th>
            <th>Aktion</th>
           </tr>
        @foreach ($users as $user)
        @if ($user->active)
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->role->name}}</td>
            <td>{{$user->vendor ?  $user->vendor->name: 'Kein Vendor'}}</td>
            <td>{{$user->password}}</td>
            <td>
                <a href="{{route('EDIT_USER', $user)}}"><button type="button" class="btn btn-primary">
                Edit
                </button></a>
                <a href="{{route('TOGGLE_USER', $user)}}"><button type="button" class="btn btn-primary">
                Toggle
                </button></a>
                <a href="{{route('DESTROY_USER', $user)}}"><button type="button" class="btn btn-primary">
                Löschen
                </button></a>
            </td>
        </tr>
        @else
            <tr class='bg-danger'>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->role->name}}</td>
                <td>{{$user->vendor->name}}</td>
                <td>{{$user->password}}</td>
                <td>
                    <a href="{{route('EDIT_USER', $user)}}"><button type="button" class="btn btn-primary">
                    Edit
                    </button></a>
                    <a href="{{route('TOGGLE_USER', $user)}}"><button type="button" class="btn btn-primary">
                    Toggle
                    </button></a>
                    <a href="{{route('DESTROY_USER', $user)}}"><button type="button" class="btn btn-primary">
                    Löschen
                    </button></a>
                </td>
            </tr>
        @endif
        @endforeach
        </table>
        <a href="{{route('CREATE_USER')}}"><button type="button" class="btn btn-primary">
            Hinzufügen
        </button></a>
        <div class="d-flex justify-content-center">
            {!! $users->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>

  
</x-layout>