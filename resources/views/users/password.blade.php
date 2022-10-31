<x-header/>
    <div class="container">
        <h1>Der Benutzer: {{$user->name}} hat die Rolle: {{$user->role->name}}</h2>
        <h2>ein {{$user->role->pin_needed ? 'Pin' : 'Password'}} wird benötigt</h1>
        <form action="{{route('SET_PASSWORD_USER', $user)}}" method="POST">
            @csrf
            @method('put')
                <label for="password">{{$user->role->pin_needed ? 'Pin' : 'Password'}} eingeben</label>
                <input type="password" id="password" name="password"><br>
            @if ($errors->has('password'))
                <span class="text-danger">{{$user->role->pin_needed ? 'Pin' : 'Password'}} eingeben</span><br>
            @endif
            <label for="repeat">Eingabe wiederholen</label>
            <input type="text" id="repeat" name="repeat"><br>
            @if ($errors->has('repeat'))
                <span class="text-danger">Eingabe stimmt nicht überein</span><br>
            @endif
            <input type="submit" value='Setzen'> 
        </form>
        <a href="{{route('DESTROY_USER', $user)}}"><button type="button" class="btn btn-primary">
            Abbrechen
        </button></a>
    </div>
