<div class="col-2 border border-dark text-center m-4 bg-info">
    <a href="#"><button type="button" class="btn btn-info btn-block">
        <div class="container">
            <h5 class="">{{$item->name}}</h5>
            @if ($item->preis >= 1)
                <h4> {{$item->preis}} €</h4>
            @endif
        </div>
    </button></a>
</div>

