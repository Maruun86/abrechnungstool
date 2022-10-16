<x-layout>
    <a href="{{route('LIST_VENDORS')}}"><button type="button" class="btn btn-primary">
        Zurück
    </button></a>
    <div class="container bg-dark text-white">
        <form action="{{route('ADD_VENDOR')}}" method="POST">
            @csrf
            <label for="name">Name</label><br>
            <input type="text" id="name" name="name"><br>
            <label for="layout_id">Layout auswählen</label>
            <input list="layout_id" name="layout_id">
            <datalist id="layout_id">
                @foreach ($layouts as $layout)
                <option value={{$layout->name}}>
                @endforeach
            </datalist>
            <br>
            <input type="submit" value='Submit'> 
        </form>
    </div>
</x-layout>