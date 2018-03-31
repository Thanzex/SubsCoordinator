@extends('layouts.master')

@section('content')
<div class="container">
  <div class="row">
    <div class="col">
      <h3>Modifica:</h3>
      @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
          <form action="{{route('Serie.update',['id'=>$id])}}" method="POST">
          {{ method_field('PUT') }}

          {{ csrf_field() }}
          <div class="form-group row">
            <label for="Nome" class="col-sm-auto col-form-label">Nome:</label>
            <div class="col-sm">
              <input type="text" class="form-control" id="Nome" name="name" placeholder="Nome" value="{{$data->name}}">
            </div>
          </div>

          <fieldset class="form-group">
            <div class="row">
              <legend class="col-form-label col-sm-auto pt-0">Tipo:</legend>
              <div class="col-sm-10">
                <div class="form-check-inline">
                <input class="form-check-input" type="radio" name="type" id="gridRadios1" value="Serie" @if($data->type == "Serie") checked @endif>
                  <label class="form-check-label" for="gridRadios1">
                    Serie
                  </label>
                </div>
                <div class="form-check-inline">
                  <input class="form-check-input" type="radio" name="type" id="gridRadios2" value="Film" @if($data->type == "Film") checked @endif>
                  <label class="form-check-label" for="gridRadios2">
                    Film
                  </label>
                </div>
              </div>
            </div>
          </fieldset>
          <div class="form-group row">
            <label for="Nome" class="col-sm-auto col-form-label">Revisore:</label>
            <div class="col-sm">
              <!--  -->
              <select name="manager" id="manager" name="manager" class="selectpicker" data-live-search='true'>
                @foreach($users->where('role', '<','5') as $user)
                <option value="{{$user->id}}" data-tokens="{{$user->nick . ' ' .$user->name . ' ' . $user->surname}}">{{$user->nick}}</option>
                @endforeach
              </select>

            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-auto">Team:</div>
            <div class="col-sm-10">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="createTeam" id="gridCheck1" data-toggle="collapse" href="#collapseExample">
                <label class="form-check-label" for="gridCheck1">
                  Modifica il Team
                </label>

                <div class="collapse" id="collapseExample">
                  <div id="app" class="mt-2">
                    <group-list :present="{{$data['members']->pluck('nick')}}" :users="{{$users}}"></group-list>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <div class="form-group row">
            <label for="Nome" class="col-sm-auto col-form-label">Immagine:</label>
            <div class="col-sm">
              <!--  -->
            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm">
              <button type="submit" class="btn btn-block btn-success">Modifica</button>
            </div>
          </div>

      </form>
    </div>
  </div>
</div>
@endsection