<x-header/>
    <body>
    <h1>>Protoytyp Abrechnungstool</h1>
    <form class="inline" method="POST" action="{{route('LOGOUT')}}">
        @csrf
        {{Auth::user()->name}}
        <button type="submit">
          <i class="fa-solid fa-door-closed"></i> Logout
        </button>
      </form>
    <main>
        <!--Navbar is here-->
        <x-navbar/>
        {{$slot}}
    </main>
    </body>
</html>