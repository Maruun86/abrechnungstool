
           <div class="col-6">
            <form method="POST" action="{{ route('loginUser') }}">
                @csrf
                <input type="text" id="rfid_nr" name="rfid_nr"><br>
            </form>
        </div> 
