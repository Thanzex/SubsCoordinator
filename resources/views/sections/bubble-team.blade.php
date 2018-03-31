
              <div class="col-xs-12 col-sm-6 col-md-4 ">
                <div class="card">
                  <img class="card-img-top" src="{{$data['thumb']}}" alt="Thumb Serie">
                  <div class="card-body">
                    <h4 class="card-title">{{$data['name']}}</h4>
                  </div>
                  <div class="card-footer text-muted">
                    Revisore: {{\App\User::find($data['manager'])->nick}}
                  </div>
                </div>
              </div>
