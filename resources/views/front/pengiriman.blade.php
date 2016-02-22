@extends('layouts.front')

@section('content')
    {!! Breadcrumbs::render('pengiriman') !!}
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills nav-wizard">
                <li><a href="#" data-toggle="tab">Pembelian</a><div class="nav-arrow"></div></li>
                <li class="active"><div class="nav-wedge"></div><a href="#" data-toggle="tab">Pengiriman</a><div class="nav-arrow"></div></li>
                <li><div class="nav-wedge"></div><a href="#" data-toggle="tab">Pembayaran</a></li>
            </ul>
        </div>
    </div>
    <div class="row"> 
        <div class="col-md-12">
            <div data-theme="light" id="rajaongkir-widget"></div>
            <script type="text/javascript" src="//rajaongkir.com/script/widget.js"></script>              
            @if (count($data['cart']) > 0)
                <br/>
                <div data-theme="light" id="rajaongkir-widget"></div>
                <script type="text/javascript" src="//rajaongkir.com/script/widget.js"></script>              
                <a href="{{ URL('/pembayaran') }}" class="btn btn-success">Lanjutkan Pembayaran</a>
            @else
                Maaf Kosong
            @endif            
        </div>                       
    </div>
@endsection            