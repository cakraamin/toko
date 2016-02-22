@extends('layouts.front')

@section('content')
    {!! Breadcrumbs::render('home') !!}
    <div class="row carousel-holder">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">                                                                                    
                                @foreach ($data['banner'] as $key => $banner)
                                    <div class="item {{ ($key == '0') ? 'active' : '' }}">
                                        <img class="slide-image" src="{{ asset('upload/banner/'.$banner->gambar_banner) }}" alt="">
                                    </div>                                                                                           
                                @endforeach                               
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div>

                <div class="row">
                    @if (count($data['product']) > 0)
                        @foreach($data['product'] as $product)
                            <div class="col-sm-4 col-lg-4 col-md-4">
                                <div class="thumbnail">
                                    <div class="box">
                                        <img src="{{ asset('upload/gambar/'.$product->gambar) }}" alt="">
                                    </div>
                                    <div class="caption">                                        
                                        <h4><a href="#">{{ $product->nama }}</a></h4>
                                        <h4>Rp {{ number_format($product->harga, "2", ",", ".") }}</h4>
                                        {!! $product->keterangan !!}
                                    </div>
                                    <div class="ratings">
                                        <a href="{{ URL('order/'.$product->id_product) }}" class="btn btn-success"><i class="fa fa-shopping-cart"></i>
 Order</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-md-12">Maaf Kosong</div>
                    @endif                    
                </div>
@endsection            