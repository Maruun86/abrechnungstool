<x-layout>
    <a href="{{route('LIST_LAYOUTS')}}"><button type="button" class="btn btn-primary">
        Zurück
    </button></a>
    <div class="container bg-dark text-white">
        <form action="{{route('ADD_LAYOUT')}}" method="POST">
            @csrf
            <label for="name">Layoutname</label><br>
            <input type="text" id="name" name="name"><br>
            <label for="view_path">View auswählen</label>
            <input list="view_path" name="view_path">
            <datalist id="view_path">
                @foreach ($filelist as $file)
                <option value={{$file}}>
                @endforeach
            </datalist>
            <br>
            <input type="submit" value='Submit'> 
        </form>
    </div>
</x-layout>