<nav class="navbar navbar-expand-lg navbar-light  bg-light">
    <div class="container-fluid"> 
      <a class="navbar-brand" href="#">Administration</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Events</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Verwaltung
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="{{route('LIST_LAYOUTS')}}">Layouts</a></li>
              <li><a class="dropdown-item" href="#">Kunden</a></li>
              <li><a class="dropdown-item" href="{{route('LIST_VENDORS')}}">Vendor</a></li>
              <li><a class="dropdown-item" href="{{route('LIST_ITEMS')}}">Items</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Einstellungen</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>