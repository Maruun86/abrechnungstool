<x-layout>
  
    <div class="row  border">
        <div class="col-8 border">
            @if($vendor->items)
                @foreach ($vendor->items as $item)
                    <x-item_card :item="$item"/>
                @endforeach
            @endif
        </div>
        <x-cash_register/>

    </div>
</x-layout>

