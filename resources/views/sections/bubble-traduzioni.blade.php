{{-- 
@section('bubble-traduzioni') --}}
            <div class="card border-{{ $bubble['type'] }} mb-1">
              <div class="card-body">
                <div class="row inline align-items-center">
                  <div class="col-auto card-text">
                    <strong>{{ $data['task']['project']['name'] }}</strong>
                  </div>
                  <div class="col-auto card-text">
                    S:{{ $data['task']['season'] }} E:{{$data['task']['episode'] }} Consegna: {{$data['task']['deadline']}}
                  </div>
                  <div class="col text-right">
                    <a name="magnet" id="magnet" class="btn btn-primary mr-1" href="{{$data['task']['magnet']}}" role="button">
                      <i class="fas fa-magnet"></i>
                    </a>
                    <a name="diretto" id="dirett" class="btn btn-primary mr-1" href="{{--  DIRETTO --}}" role="button">
                      <i class="fas fa-cloud-download-alt"></i>
                    </a>
                    <a name="base" id="base" class="btn btn-primary mr-1" href="{{$data['task']['base']}}" role="button">
                      <i class="fas fa-file-alt"></i>
                    </a>
                    <a name="facebook" id="facebook" class="btn btn-primary mr-1" href="{{$data['task']['facebook']}}" role="button">
                      <i class="fab fa-facebook-f"></i>
                    </a>
                    <a name="users" id="users" class="btn btn-primary mr-1" href="#multiCollapseExample1" role="button" data-toggle="collapse">
                      <i class="fas fa-users"></i>
                    </a>
                    <a name="guida" id="guida" class="btn btn-primary mr-1" href="#" role="button">
                      <i class="fas fa-question"></i>
                    </a>
                    <a name="upload" id="upload" class="btn btn-primary mr-1" href="#" role="button">
                      <i class="fas fa-upload"></i>
                    </a>
                  </div>
                </div>
                <div class="row collapse multi-collapse" id="multiCollapseExample1">
                  <div class="col">
                    <strong>Team:</strong>
                    <ol>
                      @foreach($data['members'] as $member)
                      <li>{{$member['nick']}}</li>
                      @endforeach
                    </ol>
                  </div>
                </div>
              </div>
            </div>
{{--
@endsection
 --}}