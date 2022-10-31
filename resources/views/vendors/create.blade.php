<x-layout>
    <a href="{{route('LIST_VENDORS')}}"><button type="button" class="btn btn-primary">
        Zurück
    </button></a>
    <div class="container ">
        <form action="{{route('STORE_VENDOR')}}" method="POST">
            @csrf
            <label for="name">Name</label><br>
            <input type="text" id="name" name="name"><br>
            <label for="layout_id">Layout auswählen</label>
            <select name="layout_id" id="layout_id">
                @foreach ($layouts as $layout)
                <option value={{$layout->name}}>{{$layout->name}}</option>
                @endforeach
            </select>
            <br>
            @foreach ($items as $item)
                <input type="checkbox" id="{{$item->id}}" name="{{$item->name}}" value="true">
                <label for="{{$item->name}}">{{$item->name}}, {{$item->preis}} €</label><br>
            @endforeach
            
            <input type="submit" value='Hinzufügen'> 
        </form>
    </div>
</x-layout>