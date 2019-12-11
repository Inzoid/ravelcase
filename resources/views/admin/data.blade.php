<div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Option</th>
                  </tr>
                </thead>
                <tbody>
                <?php $no=1; ?>       
                  @foreach ($casing as $a)
                  <tr>
                  <td>{{$no++}}</td>
                    <th scope="row">
                        <div class="media-body">
                          <span class="mb-0 text-sm">{{$a->judul}} </span>
                        </div>
                      </div>
                    </th>

                    <td>
                    <a href="{{ route('edit.case', $a->id) }}" class="avatar avatar-lg" data-toggle="tooltip" data-original-title="{{$a->first_name}}">
                          <img src="{{$a->foto()}}" class="rounded">
                        </a>
                      
                    </td>

      <td>
        <form action="{{ route('admin.destroy', $a->id) }}" method="POST" >    
                   
          <a class="btn btn-icon ni ni-settings text-primary" 
          href="{{ route( 'edit.case', $a->id ) }}" data-toggle="tooltip" data-original-title="Edit"></a>

          {{ csrf_field() }} {{ method_field('delete') }}  
          <button class="btn btn-icon btn-2 btn-danger" type="submit" onclick="return confirm('Apa Anda Yakin?')" data-toggle="tooltip" data-original-title="Delete">
            <span class="btn-inner--icon"><i class="ni ni-atom"></i></span>
          </button>
        </form>
      </td>
      @endforeach