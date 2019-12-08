            @foreach($casing as $case)
              <div class="col-sm-3">
                <div class="card">
                <img class="card-img-top" src="{{$case->foto() }}" width="70">
                  <div class="card-body">
                    <h2 class="card-title">{{$case->judul}}</h2>
                  <form action="{{ route('admin.destroy', $case->id) }}" method="POST">  
                    {{ csrf_field() }} {{ method_field('delete') }}  
                    <a href="/show" class="btn btn-primary btn-sm">Lihat</a>
                    <a href="{{ route('edit.case', $case->id) }}" class="btn btn-warning btn-sm">
                    <i class="ni ni-settings-gear-65"></i></a>

                    <button class="btn btn-danger btn-sm" type="submit"
                      onclick="return confirm('Apa Anda Yakin?')">
                      <i class="fa fa-trash"></i>
                    </buttton>
                  </form>
                  </div>
                </div>
                  <div class="mb-2">
                </div>
              </div>
            @endforeach