<x-layout>
    
    <div class="container">
        <a href="{{route('LIST_LAYOUTS')}}"><button type="button" class="btn btn-primary">
            Zurück
        </button></a><br><br>
        <h4>{{$layout->name}} editieren</h4>
        <form action="{{route('UPDATE_LAYOUT', $layout)}}" method="POST">
            @csrf
            @method('put')
            <label for="name">Layoutname</label><br>
            <input type="text" id="name" name="name" value="{{$layout->name}}"><br>
            <label for="view_path">Layout auswählen</label>
            <select name="view_path" id="view_path">
                @foreach ($filelist as $file)
                <option value={{$file}}>{{$file}}</option>
                @endforeach
            </select>
            <br>
            <input type="submit" value='Update'> 
        </form>
    </div>
</x-layout>