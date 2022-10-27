<x-layout>
    <div class="container">
        <a href="{{route('HOME')}}"><button type="button" class="btn btn-primary">
            Zurück
        </button></a>
        <h1>Eventverwaltung</h1>
        <table class="table">
           <tr>
                <th>Zustand</th>
                <th>Name</th>
                <th>Start</th>
                <th>Ende</th>
                <th>Zahlungsart</th>
                <th>Aktion</th>
           </tr>
            @foreach ($events as $event)
                @if ($event->event_running === 0)
                 <tr>
                   
                    <td>
                        @can('toggle-event')
                            <a href="{{route('TOGGLE_EVENT', $event)}}" ><button type="button" class="btn btn-secondary" role="button" disabled>
                            Deaktiviert
                        </button></a>
                        @endcan
                    <td>
                        @can('show-event')
                        <a href={{route("SHOW_EVENT", $event)}}>{{$event->name}}</a>
                        @endcan
                        @cannot('show-event')
                        {{$event->name}}
                        @endcannot
                    </td>
                    <td>{{$event->start_date}}</td>
                    <td>{{$event->end_date}}</td>
                    <td>{{$event->cash_pay ? 'Barzahlung' : 'Bargeldlos'}}</td>
                    <td>
                        @can('edit-event')
                            <a href="{{route('EDIT_EVENT', $event)}}"><button type="button" class="btn btn-primary">
                            Edit
                            </button></a>
                        @endcan
                        @can('delete-event')
                            <a href="{{route('DESTROY_EVENT', $event)}}"><button type="button" class="btn btn-primary">
                                Löschen
                            </button></a>
                        @endcan
                   </td>
                </tr>
                @else
                <tr>
                    <td>
                        @can('toggle-event')
                        <a href="{{route('TOGGLE_EVENT', $event)}}" ><button type="button" class="btn btn-primary" role="button">
                            Aktiviert
                        </button></a>
                        @endcan
                        @cannot('toggle-event')
                        <a href="" ><button type="button" class="btn btn-secondary" role="button">
                            Aktiviert
                        </button></a> 
                        @endcannot
                    <td>
                        @can('show-event')
                        <a href={{route("SHOW_EVENT", $event)}}>{{$event->name}}</a>
                        @endcan
                        @cannot('show-event')
                        {{$event->name}}
                        @endcannot
                    </td>
                        <td>{{$event->start_date}}</td>
                        <td>{{$event->end_date}}</td>
                        <td>{{$event->cash_pay ? 'Barzahlung' : 'Bargeldlos'}}</td>
                        <td>
                            @can('edit-event')
                                <a href="{{route('EDIT_EVENT', $event)}}"><button type="button" class="btn btn-primary">
                                Edit
                                </button></a>
                            @endcan
                            @can('delete-event')
                                <a href="{{route('DESTROY_EVENT', $event)}}"><button type="button" class="btn btn-primary">
                                    Löschen
                                </button></a>
                            @endcan
                        </td>
                </tr>
                @endif
            @endforeach
        </table>
        @can('create-event')
            <a href="{{route('CREATE_EVENT')}}"><button type="button" class="btn btn-primary">
                Hinzufügen
            </button></a>
        @endcan
  </div>
  <div class="d-flex justify-content-center">
    {!! $events->withQueryString()->links('pagination::bootstrap-5') !!}
</div>
</x-layout>