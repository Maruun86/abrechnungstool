<x-layout>
    <div class="container ">
        <a href="/"><button type="button" class="btn btn-primary">
            Zurück
        </button></a>
        <table class="table">
           <tr>
            <th>Layoutname</th>
            <th>view_name</th>
           </tr>
        @foreach ($layouts as $layout)
            <tr>
                <td>{{$layout->name}}</td>
                <td>/vendor_layout/{{$layout->view_path}}.blade.php</td>
            </tr>
        @endforeach
        </table>
        <!-- Button trigger modal -->
        <a href="{{route('CREATE_LAYOUT')}}"><button type="button" class="btn btn-primary">
            Hinzufügen
        </button></a>
  </div>
</x-layout>