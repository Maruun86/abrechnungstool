<x-layout>
    <div class="container">
        <div class="col-3">
            @if ($items != NULL)
                @foreach ($items as $item)
                    <x-item_card :item="$item"/>
                @endforeach  
            @else
                <p>No items Found</p>
            @endif
        </div>
    </div>  

    <div class="container">
        <div class="row">
          <div class="col">Column</div>
          <div class="col">Column</div>
          <div class="w-100"></div>
          <div class="col">Column</div>
          <div class="col">Column</div>
        </div>
      </div>
</x-layout>

