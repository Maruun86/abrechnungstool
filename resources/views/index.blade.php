<x-layout>
    <x-navbar/>
    <div class="container">
        <div class="row">
             @foreach ($vendors as $vendor)
                 <x-vendor_card :vendor="$vendor"/>
             @endforeach
        </div>
      </div>
</x-layout>
