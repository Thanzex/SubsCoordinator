@extends('layouts.default')

@section('navbar')
<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">{{ config('app.name', 'Laravel') }}</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
    aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav column" style="width: 100%;">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Film/Serie</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Traduzioni</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Utenti</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Statistiche</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Voti</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Admin</a>
      </li>
      <li class="nav-item dropdown ml-auto">
        <a class="nav-link dropdown-toggle " href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <div data-feather="user" class="" style="display:inline-block; vertical-align:middle;"></div>
          {{ Auth::user()->name }}
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Profilo</a>
          <a class="dropdown-item" href="#">Media</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Logout</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
<!-- NAVBAR -->
@endsection