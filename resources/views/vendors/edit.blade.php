<x-layout>
    <a href="{{route('LIST_VENDORS')}}"><button type="button" class="btn btn-primary">
        Zurück
    </button></a>
    <div class="container bg-dark text-white">
        <form action="{{route('UPDATE_VENDOR', $vendor)}}" method="POST">
            @csrf
            @method('PUT')
            <label for="name">Name</label><br>
            <input type="text" id="name" name="name" value="{{$vendor->name}}"><br>
            <label for="layout_id">Layout auswählen</label>
            <select name="layout_id" id="layout_id" value='{{$vendor->layout->name}}'>
                @foreach ($layouts as $layout)
                @if ($layout->id == $vendor->layout->id)
                    <option value="{{$layout->name}}" selected >{{$layout->name}}</option>
                    @else
                    <option value="{{$layout->name}}">{{$layout->name}}</option>
                @endif
                
                @endforeach
            </select>
            <br>
            @foreach ($items as $item)
            <!-- Only items that has vendor are alreay selected-->
            @if ($item->hasVendor($vendor))
                <input type="checkbox" id="{{$item->id}}" name="{{$item->name}}" value="true" checked="true">
                <label for="{{$item->name}}">{{$item->name}}, {{$item->preis}} €</label><br>
            @else
                <input type="checkbox" id="{{$item->id}}" name="{{$item->name}}" value="true">
                <label for="{{$item->name}}">{{$item->name}}, {{$item->preis}} €</label><br>
            @endif
            
            @endforeach
            
            <input type="submit" value='Update'> 
        </form>
    </div>
</x-layout>