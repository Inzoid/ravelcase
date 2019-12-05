@extends('layout.admin')
@section('content')
@section('title', 'Create Testimoni')

<div class="container mt-3">
<div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Silahkan Isi data</h3>
                </div>
                <div class="col-4 text-right">
                  <a href="{{route('dashboard')}}" class="btn btn-sm btn-primary">Back</a>
                </div>
              </div>
            </div>
            <div class="card-body">
        
                <form action="{{route('create.testimoni')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                <h6 class="heading-small text-muted mb-4">Ravel Case</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Judul Testi</label>
                        <input type="text" name="judul" class="form-control form-control-alternative" placeholder="Title">
                      </div>
                    </div>
                  </div>
                </div>
               
                <div class="pl-lg-4">
                  <div class="row">
                  <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Image</label>
                        <input type="file" name="foto" class="form-control form-control-alternative">
                      </div>
                    </div>
                  </div>
                  
              <input type="submit" value="Create Testi" class="btn btn-primary btn-md text-white">
            </div>
          </div>
        </div>
      </div>


@endsection