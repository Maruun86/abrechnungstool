<x-layout>
    <div class="container">
        <h1>Benutzerverwaltung</h1>
        <a href="{{route('HOME')}}"><button type="button" class="btn btn-primary">
            Zurück
        </button></a>
        <br><br>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="users-tab" data-bs-toggle="tab" data-bs-target="#users" type="button" role="tab" aria-controls="users" aria-selected="true">Benutzer</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="roles-tab" data-bs-toggle="tab" data-bs-target="#roles" type="button" role="tab" aria-controls="roles" aria-selected="false">Rollen</button>
              </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="users" role="tabpanel" aria-labelledby="users-tab">
                <!-- User Tab Content -->
                <table class="table">
                    <tr>
                     <th>Name</th>
                     <th>E-Mail</th>
                     <th>Rolle</th>
                     <th>Vendor</th>
                     <th>RFID_Nr.</th>
                     <th>Aktion</th>
                    </tr>
                 @foreach ($users as $user)
                 @if ($user->active)
                 <tr>
                     <td>{{$user->name}}</td>
                     <td>{{$user->email}}</td>
                     <td>{{$user->role->name}}</td>
                     <td>{{$user->vendor ? $user->vendor->name : "Kein Vendor"}}</td>
                     <td>{{$user->rfid_nr}}</td>
                     <td>
                         <a href="{{route('EDIT_USER', $user)}}"><button type="button" class="btn btn-primary">
                         Edit
                         </button></a>
                         <a href="{{route('TOGGLE_USER', $user)}}"><button type="button" class="btn btn-primary">
                             Deaktivieren
                         </button></a>
                         <a href="{{route('DESTROY_USER', $user)}}"><button type="button" class="btn btn-primary">
                             Löschen
                         </button></a>
                     </td>
                 </tr>
                 @else
                     <tr class='bg-danger'>
                         <td>{{$user->name}}</td>
                         <td>{{$user->email}}</td>
                         <td>{{$user->role->name}}</td>
                         <td>{{$user->vendor ? $user->vendor->name : "Kein Vendor"}}</td>
                         <td>{{$user->rfid_nr}}</td>
                         <td><a href="{{route('EDIT_USER', $user)}}"><button type="button" class="btn btn-primary">
                             Edit
                         </button></a>
                         <a href="{{route('TOGGLE_USER', $user)}}"><button type="button" class="btn btn-primary">
                             Aktivieren
                         </button></a>
                         <a href="{{route('DESTROY_USER', $user)}}"><button type="button" class="btn btn-primary">
                             Löschen
                         </button></a>
                     </form>
                     </td>
                     </tr>
                 @endif
                 @endforeach
                 </table>
                 <a href="{{route('CREATE_USER')}}"><button type="button" class="btn btn-primary">
                     Hinzufügen
                 </button></a>
                 <div class="d-flex justify-content-center">
                     {!! $users->withQueryString()->links('pagination::bootstrap-5') !!}
                 </div>
            </div>
                 <div class="tab-pane fade show" id="roles" role="tabpanel" aria-labelledby="roles-tab">
                   <!-- Roles Tab Content -->
                <table class="table">
                    <tr>
                     <th>Name</th>
                     <th>Authentifizierungsart</th>
                     <th>Aktion</th>
                    </tr>
                 @foreach ($roles as $role)
                 <tr>
                    <td>{{$role->name}}</td>
                        @if (!$role->pin_needed && !$role->password_needed)
                            <td>Keine zusätzliche Authentifizierung</td>
                        @elseif ($role->pin_needed)
                            <td>5-Stelliger Pin</td>
                    @elseif ($role->password_needed)
                            <td>Password</td>
                    @endif
                    <td>
                        @can('edit-role')
                            <a href="{{route('EDIT_ROLE', $role)}}"><button type="button" class="btn btn-primary">
                                Ändern
                            </button></a>
                        @endcan
                        @can('delete-role')
                        <a href="{{route('DESTROY_ROLE', $role)}}"><button type="button" class="btn btn-primary">
                            Löschen
                        </button></a>
                        @endcan
                    </td>
                 </tr>
                 @endforeach
                 </table>
                    @can('create-role')
                        <a href="{{route('CREATE_ROLE')}}"><button type="button" class="btn btn-primary">
                            Hinzufügen
                        </button></a>
                     @endcan
                     <div class="d-flex justify-content-center">
                         {!! $roles->withQueryString()->links('pagination::bootstrap-5') !!}
                     </div>
        </div>      
    </div>
</x-layout>





    