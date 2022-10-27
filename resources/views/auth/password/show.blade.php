<x-header/>
    <body>
        <div class="btn-group-vertical ml-4 mt-4" role="group" aria-label="Basic example">
           
                <div class="btn-group">
                    <form action="{{route('authenticate', $user)}}" method='POST'>
                        @csrf
                        <label for="password"> Password benötigt:</label><br>
                        <input class="text-center form-control-lg mb-2" type="password" id="password" name="password"> 
                        <input type="submit" class="btn btn-primary py-3" value="OK">
                    </form>
                </div>
        </div>
</body>
</html>