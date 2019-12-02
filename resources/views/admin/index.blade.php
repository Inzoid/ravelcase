@extends('layout.admin')
@section('content')
@section('title', 'Dashboard')

<!-- Header -->
<div class="header bg-gradient-primary pb-4 pt-3 pt-md-4">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Case</h5>
                      <span class="h2 font-weight-bold mb-0">
                      <?php  $conn = new mysqli('localhost', 'root', '', 'ravel');
                        $sqlCommand = "SELECT COUNT(*) FROM casings"; 
                        $query = mysqli_query($conn, $sqlCommand) or die (mysqli_error()); 
                        $row = mysqli_fetch_row($query);
                        echo $row[0];
                        mysqli_free_result($query); 
                        mysqli_close($conn);
                      ?>
                      </span>
                    </div>
                    <div class="col-auto">
                    <a href="{{route('create')}}">
                      <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                        <i class="ni ni-mobile-button"></i>
                      </div>
                    </a>  
                    </div>
                  </div>
                  </p>
                </div>
              </div>
            </div>
 
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">User</h5>
                      <span class="h2 font-weight-bold mb-0">
                      <?php  $conn = new mysqli('localhost', 'root', '', 'job');
                        $sqlCommand = "SELECT COUNT(*) FROM users"; 
                        $query = mysqli_query($conn, $sqlCommand) or die (mysqli_error()); 
                        $row = mysqli_fetch_row($query);
                        echo $row[0];
                        mysqli_free_result($query); 
                        mysqli_close($conn);
                      ?>
                      </span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                        <i class="ni ni-bell-55"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
<div class="container mt-2">
  <div class="main-content">
              @if(session('notice'))
                  <div class="alert alert-default alert-dismissible fade show" role="alert">
                      <span class="alert-inner--text"><strong>Selamat! </strong> {!!session('notice') !!}</span>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                @endif
                          
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header"><h3>List Case</h3></div>
          <div class="card-body">
            <div class="row">
            @foreach($casing as $case)
              <div class="col-sm-4">
                <div class="card">
                <img class="card-img-top" src="{{$case->foto() }}" width="70" alt="Card image cap">

                  <div class="card-body">
                    <h2 class="card-title">{{$case->judul}}</h2>

                  <form action="{{ route('admin.destroy', $case->id) }}" method="POST">  
                    {{ csrf_field() }} {{ method_field('delete') }}  
                    <a href="#" class="btn btn-primary">Detail</a>
                    <a href="{{ route('edit.case', $case->id) }}" class="btn btn-info">
                    <i class="ni ni-settings"></i></a>

                    <button class="btn btn-danger" type="submit"
                      onclick="return confirm('Apa Anda Yakin?')">
                      <i class="ni ni-button-power"></i>
                    </buttton>
                  </form>
                  </div>
                </div>
                  <div class="mb-2">
                </div>
              </div>
              @endforeach
            
            {!! $casing->links() !!}

@endsection