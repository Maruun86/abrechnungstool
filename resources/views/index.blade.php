<x-layout>
    <div class="container">
        @if($event)
            <h1>Vendors für {{$event->name}}</h1>
            <div class="row">
                @foreach ($vendors as $vendor)
                    @if ($vendor->hasUserWithActiveEvent($event))
                        <x-vendor_card :vendor="$vendor"/>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="d-flex justify-content-center">
        {!! $vendors->withQueryString()->links('pagination::bootstrap-5') !!}
        @else
        Kein aktives Event erkannt!
        @endif

    </div>
</x-layout>
