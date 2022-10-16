<x-layout>
    <div class="container">
        <a href="/"><button type="button" class="btn btn-primary">
            Zurück
        </button></a>
        <table class="table">
           <tr>
            <th>Name</th>
            <th>Layout</th>
           </tr>
        @foreach ($vendors as $vendor)
            <tr>
                <td>{{$vendor->name}}</td>
                <td>{{$vendor->layout->name}}</td>
            </tr>
        @endforeach
        </table>
        <a href="{{route('CREATE_VENDOR')}}"><button type="button" class="btn btn-primary">
            Hinzufügen
        </button></a>
  </div>
</x-layout>