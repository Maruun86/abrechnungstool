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
        <form action="{{route('STORE_EVENT')}}" method="POST">
            @csrf
            <label for="name">Name</label>
            <input type="text" id="name" name="name"><br>
            <div class="flex-row d-flex justify-content-center">
                <div class="col-lg-6 col-11">
                  <div class="input-group input-daterange">
                    <input type="text" class="form-control input1" name='start_date' id='start_date' placeholder="Start Date" readonly>
                    <input type="text" class="form-control input2" name='end_date' id='end_date' placeholder="End Date" readonly >
                  </div>
                </div>
              </div>
            <input type="submit" value='Hinzufügen'> 
        </form>
    </div>
    
</x-layout>