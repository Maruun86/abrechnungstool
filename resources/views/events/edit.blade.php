<x-layout>
    <script>
        $(document).ready(function(){
    
            $('.input-daterange').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true
            });
            
            });
      
        </script>
    <a href="{{route('LIST_EVENTS')}}"><button type="button" class="btn btn-primary">
        Zurück
    </button></a>
    <div class="container ">
        <form action="{{route('UPDATE_EVENT', $event)}}" method="POST">
            @csrf
            @method('put')
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{$event->name}}"><br>
            <div class="flex-row d-flex justify-content-center">
                <div class="col-lg-6 col-11">
                  <div class="input-group input-daterange">
                    <input type="text" class="form-control input1" name='start_date' id='start_date' placeholder="Start Date" readonly value="{{$event->start_date}}">
                    <input type="text" class="form-control input2" name='end_date' id='end_date' placeholder="End Date" readonly value="{{$event->end_date}}" >
                  </div>
                </div>
              </div>
            <input type="submit" value='Update'> 
        </form>
    </div>
    
</x-layout>