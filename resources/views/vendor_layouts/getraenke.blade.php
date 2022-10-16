<x-layout>
    <div class="container">
        <div class="row">
             @foreach ($items as $item)
                 <x-item_card :item="$item"/>
             @endforeach
        </div>
      </div>
</x-layout>

