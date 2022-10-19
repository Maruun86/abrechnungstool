<x-layout>
    <div class="container">
        <div class="row">
             @foreach ($vendors as $vendor)
                 <x-vendor_card :vendor="$vendor"/>
             @endforeach
        </div>
      </div>
      <div class="d-flex justify-content-center">
        {!! $vendors->withQueryString()->links('pagination::bootstrap-5') !!}
    </div>
</x-layout>
