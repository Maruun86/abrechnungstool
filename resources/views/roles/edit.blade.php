<x-layout>
   
    <div class="container">
        <a href="{{route('LIST_USERS')}}"><button type="button" class="btn btn-primary">
            Zurück
        </button></a><br><br>
        <form action="{{route('UPDATE_ROLE', $role)}}" method="POST">
            @csrf
            @method('put')
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{$role->name}}"><br>
                @if ($errors->has('name'))
                    <span class="text-danger">Name benötigt!</span><br>
                @endif
                @if ($role->pin_needed)
                    <input type="radio" id="pin_needed" name="auth_needed" value="pin" checked>
                    <label for="pin_needed">Pin benötigt!</label><br>
                @else
                    <input type="radio" id="pin_needed" name="auth_needed" value="pin">
                    <label for="pin_needed">Pin benötigt!</label><br>
                @endif
                @if ($role->password_needed)
                    <input type="radio" id="password_needed" name="auth_needed" value="password" checked>
                    <label for="password_needed">Password benötigt</label><br>
                @else
                    <input type="radio" id="password_needed" name="auth_needed" value="password">
                    <label for="password_needed">Password benötigt</label><br>
                @endif
                @if (!$role->password_needed && !$role->pin_needed)
                    <input type="radio" id="none" name="auth_needed" value="NONE" checked>
                    <label for="none">Keine zusätzliche Authentifizierung nötig</label><br>
                @else
                    <input type="radio" id="none" name="auth_needed" value="NONE" >
                    <label for="none">Keine zusätzliche Authentifizierung nötig</label><br>
                @endif
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
                @if ($role->hasPermission($permission))
                <tr>
                    <td>
                        <input type="checkbox" id="{{$permission->id}}" name="{{$permission->gate_name}}" value="true" checked>                    
                    </td>
                    <td>{{$permission->name}}</td>
                    <td>{{$permission->description}}</td>
                    <td>{{$permission->gate_name}}</td>
                </tr>
                @else
                <tr>
                    <td>
                        <input type="checkbox" id="{{$permission->id}}" name="{{$permission->gate_name}}" value="true">                    
                    </td>
                    <td>{{$permission->name}}</td>
                    <td>{{$permission->description}}</td>
                    <td>{{$permission->gate_name}}</td>
                </tr>
                @endif
            @endforeach
            <tr><td colspan="3">---------------------------Kartegorie Vendor--------------------</td> </tr>
            @foreach ($perm_vendors as $permission)
                @if ($role->hasPermission($permission))
                <tr>
                    <td>
                        <input type="checkbox" id="{{$permission->id}}" name="{{$permission->gate_name}}" value="true" checked>                    
                    </td>
                    <td>{{$permission->name}}</td>
                    <td>{{$permission->description}}</td>
                    <td>{{$permission->gate_name}}</td>
                </tr>
                @else
                <tr>
                    <td>
                        <input type="checkbox" id="{{$permission->id}}" name="{{$permission->gate_name}}" value="true">                    
                    </td>
                    <td>{{$permission->name}}</td>
                    <td>{{$permission->description}}</td>
                    <td>{{$permission->gate_name}}</td>
                </tr>
                @endif  
            @endforeach
            <tr><td colspan="3">---------------------------Kartegorie Items--------------------</td> </tr>
            @foreach ($perm_items as $permission)
                @if ($role->hasPermission($permission))
                <tr>
                    <td>
                        <input type="checkbox" id="{{$permission->id}}" name="{{$permission->gate_name}}" value="true" checked>                    
                    </td>
                    <td>{{$permission->name}}</td>
                    <td>{{$permission->description}}</td>
                    <td>{{$permission->gate_name}}</td>
                </tr>
                @else
                <tr>
                    <td>
                        <input type="checkbox" id="{{$permission->id}}" name="{{$permission->gate_name}}" value="true">                    
                    </td>
                    <td>{{$permission->name}}</td>
                    <td>{{$permission->description}}</td>
                    <td>{{$permission->gate_name}}</td>
                </tr>
                @endif  
            @endforeach
            <tr><td colspan="3">---------------------------Kartegorie Layouts--------------------</td> </tr>
            @foreach ($perm_layouts as $permission)
                @if ($role->hasPermission($permission))
                <tr>
                    <td>
                        <input type="checkbox" id="{{$permission->id}}" name="{{$permission->gate_name}}" value="true" checked>                    
                    </td>
                    <td>{{$permission->name}}</td>
                    <td>{{$permission->description}}</td>
                    <td>{{$permission->gate_name}}</td>
                </tr>
                @else
                <tr>
                    <td>
                        <input type="checkbox" id="{{$permission->id}}" name="{{$permission->gate_name}}" value="true">                    
                    </td>
                    <td>{{$permission->name}}</td>
                    <td>{{$permission->description}}</td>
                    <td>{{$permission->gate_name}}</td>
                </tr>
                @endif  
            @endforeach
            <tr><td colspan="3">---------------------------Kartegorie VATS--------------------</td> </tr>
            @foreach ($perm_vats as $permission)
                @if ($role->hasPermission($permission))
                <tr>
                    <td>
                        <input type="checkbox" id="{{$permission->id}}" name="{{$permission->gate_name}}" value="true" checked>                    
                    </td>
                    <td>{{$permission->name}}</td>
                    <td>{{$permission->description}}</td>
                    <td>{{$permission->gate_name}}</td>
                </tr>
                @else
                <tr>
                    <td>
                        <input type="checkbox" id="{{$permission->id}}" name="{{$permission->gate_name}}" value="true">                    
                    </td>
                    <td>{{$permission->name}}</td>
                    <td>{{$permission->description}}</td>
                    <td>{{$permission->gate_name}}</td>
                </tr>
                @endif  
            @endforeach
            <tr><td colspan="3">---------------------------Kartegorie Events--------------------</td> </tr>
            @foreach ($perm_events as $permission)
                @if ($role->hasPermission($permission))
                <tr>
                    <td>
                        <input type="checkbox" id="{{$permission->id}}" name="{{$permission->gate_name}}" value="true" checked>                    
                    </td>
                    <td>{{$permission->name}}</td>
                    <td>{{$permission->description}}</td>
                    <td>{{$permission->gate_name}}</td>
                </tr>
                @else
                <tr>
                    <td>
                        <input type="checkbox" id="{{$permission->id}}" name="{{$permission->gate_name}}" value="true">                    
                    </td>
                    <td>{{$permission->name}}</td>
                    <td>{{$permission->description}}</td>
                    <td>{{$permission->gate_name}}</td>
                </tr>
                @endif  
            @endforeach
            <tr><td colspan="3">---------------------------Kartegorie Rollen--------------------</td> </tr>
            @foreach ($perm_roles as $permission)
                @if ($role->hasPermission($permission))
                <tr>
                    <td>
                        <input type="checkbox" id="{{$permission->id}}" name="{{$permission->gate_name}}" value="true" checked>                    
                    </td>
                    <td>{{$permission->name}}</td>
                    <td>{{$permission->description}}</td>
                    <td>{{$permission->gate_name}}</td>
                </tr>
                @else
                <tr>
                    <td>
                        <input type="checkbox" id="{{$permission->id}}" name="{{$permission->gate_name}}" value="true">                    
                    </td>
                    <td>{{$permission->name}}</td>
                    <td>{{$permission->description}}</td>
                    <td>{{$permission->gate_name}}</td>
                </tr>
                @endif  
            @endforeach
        </table>
            <input type="submit" value='Hinzufügen'> 
        </form>
        
        
    </div>


   
       
</x-layout>