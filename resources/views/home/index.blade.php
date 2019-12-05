@extends('layout.home')
@section('content')

<section id="case" class="ftco-section">
      <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4">Produk Case Terlaris</h2>
            </div>
        </div>      
      </div>

      <div class="container">
        <div class="row">
          @foreach ($casing as $case)
          <div class="col-md-6 col-lg-3 ftco-animate">
            <div class="product">
              <a class="img-prod"><img class="img-fluid" src="{{$case->foto() }}">
                <div class="overlay"></div>
              </a>
              <div class="text py-3 pb-4 px-3 text-center">
                <h3><a>{{$case->judul}}</a></h3>
                <div class="d-flex">
                  <div class="pricing">
                    <p><a href="http://bit.ly/ravelcase" 
                      class="btn btn-primary"><i class="ion-md-cart"></i>&nbsp Order</a></p>
                  </div>
                </div>
                <div class="bottom-area">    
                  <a href="http://bit.ly/ravelcase">             
                   <img class="img-fluid" src="images/wa.png" 
                   width="200" height="150" alt="Chat Via WA">  
                  </a>                
                </div>
              </div>
            </div>
          </div>
        @endforeach
      
        {!! $casing->links() !!}

@endsection