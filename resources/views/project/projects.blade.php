@extends('layouts.master')
@section('content')
<div class="container mt-3">
  <div class="row">
    <div class="col">
    <a name="crea-serie" id="crea-serie" class="btn  btn-lg btn-success" href="{{route('Serie.create')}}" role="button">Crea una Serie</a>
      <a name="crea-serie" id="crea-serie" class="btn  btn-lg btn-primary" href="#" role="button" data-toggle="collapse" data-target="#modificaProgetto">Modifica una Serie</a>
      <a name="crea-serie" id="crea-serie" class="btn  btn-lg btn-danger" href="#" role="button" data-toggle="collapse" data-target="#eliminaProgetto">Elimina una Serie</a>
      <div class="collapse" id="modificaProgetto">
        <div class="card card-body">
          <h4>Modifica un progetto:</h4>
          <form action="{{route('Serie.formEdit')}}" method="post">
            {{csrf_field()}}
            <div class="form-group">
              <label for="scegliProgetto">Nome:</label>
              <select id="scegliProgetto" class="selectpicker" name="project" data-width="auto"data-live-search="true">
                @foreach($projects as $project)
                <option value="{{$project->id}}">{{$project->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <button name="submit" type="submit" class="btn btn-primary" href="#">Modifica</button>
            </div>
          </form>


        </div>
      </div>
      <div class="collapse" id="eliminaProgetto">
        <div class="card card-body">
          <h4>Elimina un progetto:</h4>
          <form action="{{route('Serie.formDestroy')}}" method="post">
            {{csrf_field()}}
            <div class="form-group">
              <label for="scegliProgetto">Nome:</label>
              <select id="scegliProgetto" class="selectpicker" name="project" data-width="auto"data-live-search="true">
                @foreach($projects as $project)
                <option value="{{$project->id}}">{{$project->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <button name="submit" type="submit" class="btn btn-danger">Modifica</button>
            </div>
          </form>


        </div>
      </div>
    </div>
  </div>
  <div class="row mt-3">
    <div class="col">
      <h3>Ultimi Progetti:</h3>
      <table class="table">
        <thead>
          <tr>
            <th>Nome:</th>
            <th>Tipo:</th>
            <th>Revisore:</th>
            <th>Episodi:</th>
            <th>Creata:</th>
            <th>Menu:</th>
          </tr>
        </thead>
        <tbody>
          @foreach($projects as $project)
          <tr>
            <td scope="row">{{$project->name}}</td>
            <td>{{$project->type}}</td>
            <td>{{$project->manager()->get()->pluck('nick')->first()}}</td>
            <td>{{count($project->tasks()->get())}}</td>
            <td>{{$project->created_at}}</td>
            <td style="white-space: nowrap; width: 1%;">
              <a href="" class="btn btn-danger btn-sm" onclick="event.preventDefault();
              document.getElementById('delete-form-{{$project->id}}').submit();">Elimina</a>
              <form id="delete-form-{{$project->id}}" action="{{ route('Serie.destroy',['id'=>$project->id]) }}" method="POST" style="display: none;">
                  {{ method_field('DELETE') }}
                  @csrf
              </form>
              <a href="{{route('Serie.edit',['Serie' => $project->id])}}" class="btn btn-primary btn-sm">Modifica</a>
              <button type="button" class="btn btn-info btn-sm">Info</button>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection