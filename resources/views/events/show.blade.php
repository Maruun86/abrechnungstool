<x-layout>
    <div class="container">
        <h1>{{$event->name}}</h1>
        <h4>Zeitraum: {{$event->start_date}} -  {{$event->end_date}}</h4>
        <h4>Zahlungsart: {{$event->cash_pay ? 'Barzahlung' : 'Bargeldlos'}}</h4>
        <a href="{{route('EDIT_EVENT', $event)}}"><button type="button" class="btn btn-primary">
            Edit
        </button></a>
        <a href="{{route('DESTROY_EVENT', $event)}}"><button type="button" class="btn btn-primary">
            Löschen
        </button></a>
        <br><br>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="history-tab" data-bs-toggle="tab" data-bs-target="#history" type="button" role="tab" aria-controls="history" aria-selected="true">Historie</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="protokoll-tab" data-bs-toggle="tab" data-bs-target="#protokoll" type="button" role="tab" aria-controls="protokoll" aria-selected="false">Protokoll</button>
            </li>
            <li class="nav-item" role="users">
                <button class="nav-link" id="users-tab" data-bs-toggle="tab" data-bs-target="#users" type="button" role="tab" aria-controls="users" aria-selected="false">Benutzer</button>
              </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="history" role="tabpanel" aria-labelledby="history-tab">
                <!--History Tab Content -->
                <table class="table">
                <tr>
                    <th>Kunde</th>
                    <th>Vendor</th>
                    <th>Transaktion</th>
                    <th>Datum</th>
                </tr>
            @foreach ($event->historys as $history)
                <tr>
                    <td>{{$history->customer->vorname}} {{$history->customer->nachname}}</td>
                    <td>{{$history->vendor->name}}</td>
                    <td>{{$history->transaction}}</td>
                    <td>{{$history->created_at}}</td>
                </tr>
            @endforeach
            </table>
        </div>
            <div class="tab-pane fade" id="protokoll" role="tabpanel" aria-labelledby="protokoll-tab">
                <!-- Protokoll Tab Content -->
                <table class="table">
                    <tr>
                        <th>Benutzer</th>
                        <th>Rolle</th>
                        <th>Aktion</th>
                        <th>Datum</th>
                    </tr>
                @foreach ($event->protokolls as $protokoll)
                    <tr>
                        <td>{{$protokoll->user->name}}</td>
                        <td>{{$protokoll->role->name}}</td>
                        <td>{{$protokoll->action}}</td>
                        <td>{{$protokoll->created_at}}</td>
                    </tr>
                @endforeach
                </table>
            </div>
            <div class="tab-pane fade" id="users" role="tabpanel" aria-labelledby="users-tab">
                <form action="{{route('USERS_EVENT', $event)}}" method="post">
                    @csrf
                    @method('put')
                    @if($users)
                    <table>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>E-Mail</th>
                            <th>Rolle</th>
                        </tr>
                        @foreach ($users as $user)
                         <!-- Only users with this event are selected -->
                         @if ($user->hasEvent($event))
                            <tr>
                                <td><input type="checkbox" id="{{$user->id}}" name="{{$user->name}}" value="{{$user->id}}" checked="true"></td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->role->name}}</td>
                            </tr>  
                                @else
                            <tr>
                                <td><input type="checkbox" id="{{$user->id}}" name="{{$user->name}}" value="{{$user->id}}"></td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->role->name}}</td>
                                @endif
                            </tr>
                        @endforeach
                    </tr>
                    @else
                        Es wurden keine Benutzer gefunden, erstellen sie einen Benutzer
                    @endif
                    </table>
                    <br>
                    <input type="submit" value='Update'> 
            </form>
            </div>
          </div>          
    </div>
</x-layout>





    