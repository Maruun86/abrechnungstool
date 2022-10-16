<div class="col-2 border border-dark text-center m-3 bg-info">
    <a href="{{route('SHOW_VENDOR', $vendor->id)}}"><button type="button" class="btn btn-info btn-block">
        <div class="container">
            <h5 class="">{{$vendor->name}}</h5>
            <br>
                {{$vendor->layout->name}}          
        </div>
    </button></a>
</div>

