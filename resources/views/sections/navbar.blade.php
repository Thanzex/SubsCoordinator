{{--  @section('navbar')  --}}
<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
  <a class="navbar-brand" href="#">{{ config('app.name', 'Laravel') }}</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
    aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav column" style="width: 100%;">
      <li class="nav-item active">
      <a class="nav-link" href="{{route('home')}}">Home
          {{--  <span class="sr-only">(current)</span>  --}}
        </a>
      </li>
      @if (Auth::user()->role < 5)
      <li class="nav-item">
        <a class="nav-link" href="{{route('Serie.index')}}"><div data-feather="folder" class="navbar-icon" style="display:inline-block; "></div>&nbsp;Film/Serie</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><div data-feather="film" class="navbar-icon" style="display:inline-block; "></div>&nbsp;Traduzioni</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><div data-feather="users" class="navbar-icon" style="display:inline-block; "></div>&nbsp;Utenti</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><div data-feather="percent" class="navbar-icon" style="display:inline-block; "></div>&nbsp;Statistiche</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><div data-feather="award" class="navbar-icon" style="display:inline-block; "></div>&nbsp;Voti</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><div data-feather="clipboard" class="navbar-icon" style="display:inline-block; "></div>&nbsp;Admin</a>
      </li>
      @endif
      <li class="nav-item dropdown ml-auto">
        <a class="nav-link dropdown-toggle " href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <div data-feather="user" class="" style="display:inline-block; vertical-align:middle;"></div>
          {{ Auth::user()->name }}
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Profilo</a>
          <a class="dropdown-item" href="#">Media</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Logout</a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
        </div>
      </li>
    </ul>
  </div>
</nav>
<!-- NAVBAR -->
{{--  @endsection  --}}