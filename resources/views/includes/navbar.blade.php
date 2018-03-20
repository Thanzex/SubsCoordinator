@extends('layouts.default')

@section('navbar')
<nav class="navbar navbar-expand-md navbar-light bg-light mb-3">
  <a class="navbar-brand" href="index.php">Subspedia</a>
  <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
    aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
  <div class="collapse navbar-collapse" id="collapsibleNavId">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item <?php if ($caller_page == "index.php") echo "active";?>">
        <a class="nav-link" href="index.php">Home
          {{--  <span class="sr-only">(current)</span>  --}}
        </a>
      </li>
      @if (Auth::user()->role < 5)
      <li class="nav-item">
        <a class="nav-link" href="Traduzioni.php">Traduzioni</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Team</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Voti</a>
      </li>
      @if (Auth::user()->role < 3)
      <li class="nav-item">
        <a class="nav-link" href="#">Utenti</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="serie.php">Serie</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="film.php">Film</a>
      </li>
      @endif
      @endif
    </ul>
    <div class="dropdown open">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="userTrugger" data-toggle="dropdown" aria-haspopup="true"
          aria-expanded="false">
          Ciao {{ Auth::user()->nick }}!
          </button>
      <div class="dropdown-menu" aria-labelledby="userTrugger">
        <div class="text-center">
          <!-- <i class="fas fa-user fa-3x"></i> -->
          <img src="{{ @if (Auth::user()->thumb != '') 
                        Auth::user()->thumb
                       @else
                       thumb_utenti/user.svg }}"
                style="max-width:75%;">
        </div>
        <div class="dropdown-divider"></div>
        <a href="profilo.php"><button class="dropdown-item" href="profilo.php"> Profilo</button></a>
        <a href="media.php"><button class="dropdown-item" href="media.php">   Media</button></a>
        <a href="logout.php"><button class="dropdown-item">  Logout</button></a>
      </div>
    </div>
  </div>
</nav>
@endsection