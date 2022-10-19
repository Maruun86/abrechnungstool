<x-layout>
    <div class="container text-center">
        <div>
            <h1>{{$vendor->name}}</h1>
        </div>
        <div class="row">
            @if ($vendor->items)
            @foreach ($vendor->items as $item)
                <x-item_card :item="$item"/>
            @endforeach
            @else
            No Items found
            @endif
        </div>
      </div>
</x-layout>

