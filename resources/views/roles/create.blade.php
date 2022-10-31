<x-layout>
   
    <div class="container">
        <a href="{{route('LIST_USERS')}}"><button type="button" class="btn btn-primary">
            Zurück
        </button></a><br><br>
        <form action="{{route('STORE_ROLE')}}" method="POST">
            @csrf
            <label for="name">Name</label>
            <input type="text" id="name" name="name"><br>
                @if ($errors->has('name'))
                    <span class="text-danger">Name benötigt!</span><br>
                @endif
            <input type="radio" id="pin_needed" name="auth_needed" value="pin">
                <label for="pin_needed">Pin benötigt!</label><br>
            <input type="radio" id="password_needed" name="auth_needed" value="password">
                <label for="password_needed">Password benötigt</label><br>
            <input type="radio" id="none" name="auth_needed" value="NONE" >
                <label for="none">Keine zusätzliche Authentifizierung nötig</label><br>
            @if ($errors->has('auth_needed'))
                <span class="text-danger">Authentifizierung auswählen</span><br>
            @endif
            <br>
            <!---- Permissions Checkboxes -->
            <table class="table">
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Beschreibung</th>
                    <th>Interner Name</th>
                </tr>
                <tr><td colspan="3">---------------------------Kartegorie Kunden--------------------</td> </tr>
            @foreach ($perm_customers as $permission)
                <tr>
                    <td>
                        <input type="checkbox" id="{{$permission->id}}" name="{{$permission->gate_name}}" value="true" >                    
                    </td>
                    <td>{{$permission->name}}</td>
                    <td>{{$permission->description}}</td>
                    <td>{{$permission->gate_name}}</td>
                </tr>
            @endforeach
            <tr><td colspan="3">---------------------------Kartegorie Vendor--------------------</td> </tr>
            @foreach ($perm_vendors as $permission)
                <tr>
                    <td>
                        <input type="checkbox" id="{{$permission->id}}" name="{{$permission->gate_name}}" value="true" >                    
                    </td>
                    <td>{{$permission->name}}</td>
                    <td>{{$permission->description}}</td>
                    <td>{{$permission->gate_name}}</td>
                    </tr>
            @endforeach
            <tr><td colspan="3">---------------------------Kartegorie Items--------------------</td> </tr>
            @foreach ($perm_items as $permission)
                <tr>
                    <td>
                        <input type="checkbox" id="{{$permission->id}}" name="{{$permission->gate_name}}" value="true" >                    
                    </td>
                    <td>{{$permission->name}}</td>
                    <td>{{$permission->description}}</td>
                    <td>{{$permission->gate_name}}</td>
                </tr>
            @endforeach
            <tr><td colspan="3">---------------------------Kartegorie Layouts--------------------</td> </tr>
            @foreach ($perm_layouts as $permission)
                <tr>
                    <td>
                        <input type="checkbox" id="{{$permission->id}}" name="{{$permission->gate_name}}" value="true" >                    
                    </td>
                    <td>{{$permission->name}}</td>
                    <td>{{$permission->description}}</td>
                    <td>{{$permission->gate_name}}</td>
                </tr>
            @endforeach
            <tr><td colspan="3">---------------------------Kartegorie VATS--------------------</td> </tr>
            @foreach ($perm_vats as $permission)
                <tr>
                    <td>
                        <input type="checkbox" id="{{$permission->id}}" name="{{$permission->gate_name}}" value="true" >                    
                    </td>
                    <td>{{$permission->name}}</td>
                    <td>{{$permission->description}}</td>
                    <td>{{$permission->gate_name}}</td>
                </tr>
            @endforeach
            <tr><td colspan="3">---------------------------Kartegorie Events--------------------</td> </tr>
            @foreach ($perm_events as $permission)
                <tr>
                    <td>
                        <input type="checkbox" id="{{$permission->id}}" name="{{$permission->gate_name}}" value="true" >                    
                    </td>
                    <td>{{$permission->name}}</td>
                    <td>{{$permission->description}}</td>
                    <td>{{$permission->gate_name}}</td>
                </tr>
            @endforeach
            <tr><td colspan="3">---------------------------Kartegorie Rollen--------------------</td> </tr>
            @foreach ($perm_roles as $permission)
                <tr>
                    <td>
                        <input type="checkbox" id="{{$permission->id}}" name="{{$permission->gate_name}}" value="true">                    
                    </td>
                    <td>{{$permission->name}}</td>
                    <td>{{$permission->description}}</td>
                    <td>{{$permission->gate_name}}</td>
                </tr>
            @endforeach
            <tr><td colspan="3">---------------------------Kartegorie Benutzer--------------------</td> </tr>
            @foreach ($perm_users as $permission)
                <tr>
                    <td>
                        <input type="checkbox" id="{{$permission->id}}" name="{{$permission->gate_name}}" value="true">                    
                    </td>
                    <td>{{$permission->name}}</td>
                    <td>{{$permission->description}}</td>
                    <td>{{$permission->gate_name}}</td>
                </tr>
            @endforeach
        </table>
            <input type="submit" value='Hinzufügen'> 
        </form>
        
    </div>


   
       
</x-layout>