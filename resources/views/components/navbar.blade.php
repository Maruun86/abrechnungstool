@props(['event'])
<nav class="navbar navbar-expand-lg navbar-light  bg-light">
    <div class="container-fluid"> 
      <a class="navbar-brand" href="#"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('HOME')}}">Dashboard</a>
          </li>
          <li class="nav-item">
            @can('list-events')
              <a class="nav-link" href="{{route('LIST_EVENTS')}}">Events</a>
            @endcan
            @cannot('list-events')
            <a class="nav-link text-muted" href="#">Events</a>
            @endcannot
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Verwaltung
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              @can('list-users')
                <li><a class="dropdown-item" href="{{route('LIST_USERS')}}">Benutzer</a></li>
              @endcan
              @cannot('list-users')
                <li><a class="dropdown-item text-muted" href="#">Benutzer</a></li>
              @endcannot
              @can('list-items')
                <li><a class="dropdown-item" href="{{route('LIST_ITEMS')}}">Items</a></li>
              @endcan
              @cannot('list-items')
                <li><a class="dropdown-item text-muted" href="" >Items</a></li> 
              @endcannot
              @can('list-customers')
                <li><a class="dropdown-item" href="{{route('LIST_CUSTOMERS')}}">Kunden</a></li>
              @endcan
              @cannot('list-customers')
                <li><a class="dropdown-item text-muted" href="" >Kunden</a></li> 
              @endcannot
              @can('list-layouts')
                <li><a class="dropdown-item" href="{{route('LIST_LAYOUTS')}}">Layouts</a></li>
              @endcan
              @cannot('list-layouts')
                <li><a class="dropdown-item text-muted" href="">Layouts</a></li>
              @endcannot
              @can('list-vats')
                <li><a class="dropdown-item" href="{{route('LIST_VATS')}}">VATs</a></li>
              @endcan
              @cannot('list-vats')
                <li><a class="dropdown-item text-muted" href="" >VATs</a></li> 
              @endcannot
              @can('list-vendors')
                <li><a class="dropdown-item" href="{{route('LIST_VENDORS')}}">Vendors</a></li>
              @endcan
              @cannot('list-vendors')
                <li><a class="dropdown-item text-muted" href="" >Vendors</a></li> 
              @endcannot
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Einstellungen</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>