<x-layout>
    <a href="{{route('LIST_LAYOUTS')}}"><button type="button" class="btn btn-primary">
        Zurück
    </button></a>
    <div class="container">
        <form action="{{route('STORE_LAYOUT')}}" method="POST">
            @csrf
            
            <label for="name">Layoutname</label><br>
            <input type="text" id="name" name="name"><br>
            <label for="view_path">View auswählen</label>
            <select name="view_path" id="view_path">
                @foreach ($filelist as $file)
                <option value={{$file}}>{{$file}}</option>
                @endforeach
            </select>
            <br>
            <input type="submit" value='Hinzufügen'> 
        </form>
    </div>
</x-layout>