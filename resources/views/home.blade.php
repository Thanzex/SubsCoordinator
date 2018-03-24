@extends('layouts.master') 
@section('content')
<div class="container-fluid">
  <div class="col"></div>
  <div class="col">
    <div class="container">
      <div class="row">
        <div class="col">
          <h2>Traduzioni in corso:</h2>
          @if (count($tasks)) 
          @foreach($tasks as $data)
          @include('sections.bubble-traduzioni',['bubble' => ["type" => "warning"],'data'=>$data])
          @endforeach 
          @else
          <div class="row">
            <div class="col text-center">
              <h4>Al momento non hai traduzioni in corso.</h4>
            </div>
          </div>
          @endif
        </div>
      </div>
      @if (Auth::user()->role
      < 5) <hr>
        <div class="row">
          <div class="col">
            <h2>Revisioni in corso:</h2>
            @if (count($revs)) 
            @foreach($revs as $data)
            @include('sections.bubble-revisioni',['bubble' => ["type" => "warning"],'data'=>$data])
            @endforeach 
            @else
            <div class="row">
              <div class="col text-center">
                <h4>Al momento non hai revisioni in corso.</h4>
              </div>
            </div>
            @endif
          </div>
        </div>
        @endif
        <div class="row mt-2">
          <div class="col">
            <h2>Fai parte di questi Team:</h2>
            <div class="row">
              @if(count($teams)) 
              @foreach($teams as $data)
              @include('sections.bubble-team',['data' => $data]) @endforeach @else
              <div class="col text-center">
                <h4>Al momento non fai parte di alcun team.</h4>
              </div>
              @endif
            </div>
          </div>
        </div>
    </div>
  </div>
  <div class="col"></div>
</div>


@endsection