@extends('layout.admin')
@section('content')
@section('title', 'Data Casing')

<div class="container mt-3">
<a href="{{route('create')}}" class="btn btn-primary">Tambah Case</a><br><br>

    @if(session('notice'))
          <div class="alert alert-default">
                  <strong>{!!session('notice') !!}</strong>
          </div>
    @endif
            
              <div class="data_case">
               @include('admin.data')
              </div>
  
@endsection