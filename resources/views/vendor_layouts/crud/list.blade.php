<x-layout>
    <div class="container ">
        <a href="/"><button type="button" class="btn btn-primary">
            Zurück
        </button></a>
        <h1>Layoutverwaltung</h1>
        <table class="table">
           <tr>
            <th>Layoutname</th>
            <th>view_name</th>
            <th>Aktion</th>
           </tr>
        @foreach ($layouts as $layout)
            @if ($layout->view_path != 'no_layout')
                <tr>
                    <td>{{$layout->name}}</td>
                    <td>/vendor_layout/{{$layout->view_path}}.blade.php</td>
                    <td><a href="{{route('EDIT_LAYOUT', $layout)}}"><button type="button" class="btn btn-primary">
                        Edit
                    </button></a>
                    <a href="{{route('DESTROY_LAYOUT', $layout)}}"><button type="button" class="btn btn-primary">
                        Löschen
                    </button></a>
                    </td>
                </tr>
                @else
                <tr>
                    <td>{{$layout->name}}</td>
                    <td>/vendor_layout/{{$layout->view_path}}.blade.php</td>
                    <td>Keine Aktionen verfügbar </td>
                </tr>
            @endif
        @endforeach
        </table>
        <a href="{{route('CREATE_LAYOUT')}}"><button type="button" class="btn btn-primary">
            Hinzufügen
        </button></a>
  </div>
  <div class="d-flex justify-content-center">
    {!! $layouts->withQueryString()->links('pagination::bootstrap-5') !!}
</div>
</x-layout>