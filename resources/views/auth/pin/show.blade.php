<x-header/>
    <body>
        <div class="btn-group-vertical ml-4 mt-4" role="group" aria-label="Basic example">
           
                <div class="btn-group">
                    <form action="{{route('authenticate', $user)}}" method='POST'>
                        @csrf
                        <input class="text-center form-control-lg mb-2" type="password" id="password" name="password"> 
                        <input type="submit" class="btn btn-primary py-3" value="OK">
                    </form>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('password').value=document.getElementById('password').value + '1';">1</button>
                    <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('password').value=document.getElementById('password').value + '2';">2</button>
                    <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('password').value=document.getElementById('password').value + '3';">3</button>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('password').value=document.getElementById('password').value + '4';">4</button>
                    <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('password').value=document.getElementById('password').value + '5';">5</button>
                    <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('password').value=document.getElementById('password').value + '6';">6</button>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('password').value=document.getElementById('password').value + '7';">7</button>
                    <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('password').value=document.getElementById('password').value + '8';">8</button>
                    <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('password').value=document.getElementById('password').value + '9';">9</button>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('password').value=document.getElementById('password').value.slice(0, -1);">&lt;</button>
                    <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('password').value=document.getElementById('password').value + '0';">0</button>
                </div>
           
        </div>
</body>
</html>