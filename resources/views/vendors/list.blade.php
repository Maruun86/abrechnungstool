<x-layout>
    <div class="container">
        <a href="{{route('HOME')}}"><button type="button" class="btn btn-primary">
            Zurück
        </button></a>
        <h1>Vendorverwaltung</h1>
        <table class="table">
           <tr>
            <th>Name</th>
            <th>Layout</th>
            <th>Aktion</th>
           </tr>
        @foreach ($vendors as $vendor)
            @if($vendor->layout->view_path != 'no_layout')
                <tr>
                    <td>{{$vendor->name}}</td>
                    <td>{{$vendor->layout->name}}</td>
                    @can('edit-vendor')
                        <td><a href="{{route('EDIT_VENDOR', $vendor)}}"><button type="button" class="btn btn-primary">
                            Edit
                        </button></a>
                    @endcan
                    @can('delete-vendor')
                        <a href="{{route('DESTROY_VENDOR', $vendor)}}"><button type="button" class="btn btn-primary">
                            Löschen
                        </button></a>
                    @endcan
                </td>
                </tr>
            @else
            <tr class="bg-danger">
                <td>{{$vendor->name}}</td>
                <td>{{$vendor->layout->name}}</td>
                @can('edit-vendor')
                        <td><a href="{{route('EDIT_VENDOR', $vendor)}}"><button type="button" class="btn btn-primary">
                            Edit
                        </button></a>
                    @endcan
                    @can('delete-vendor')
                    <a href="{{route('DESTROY_VENDOR', $vendor)}}"><button type="button" class="btn btn-primary">
                        Löschen
                    </button></a>
                @endcan
            </tr>
            @endif

        @endforeach
        </table>
        @can('create-vendor')
        <a href="{{route('CREATE_VENDOR')}}"><button type="button" class="btn btn-primary">
            Hinzufügen
        </button></a>
        @endcan
  </div>
  <div class="d-flex justify-content-center">
    {!! $vendors->withQueryString()->links('pagination::bootstrap-5') !!}
</div>
</x-layout>