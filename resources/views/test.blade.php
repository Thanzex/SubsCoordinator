@extends('layouts.master') 
@section('content')

<div class="container">
  <div class="row">
    <div class="col">
      <div id="app">
        <group-list :group="{{$group}}" :users="{{$users}}"></group-list>
      </div>
    </div>
  </div>
</div>
@endsection