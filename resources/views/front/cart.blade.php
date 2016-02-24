@extends('layouts.front')

@section('content')
    {!! Breadcrumbs::render('pembelian') !!}
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills nav-wizard">
                <li class="active"><a href="#" data-toggle="tab">Pembelian</a><div class="nav-arrow"></div></li>
                <li><div class="nav-wedge"></div><a href="#" data-toggle="tab">Pengiriman</a><div class="nav-arrow"></div></li>
                <li><div class="nav-wedge"></div><a href="#" data-toggle="tab">Pembayaran</a></li>
            </ul>
        </div>
    </div>
    <div class="row"> 
        <div class="col-md-12">
            @if (count($data['cart']) > 0)
                <br/>
                <table class="table table-striped">
                @foreach($data['cart'] as $key => $cart)
                    <tr><td>{{ $cart->name }}</td><td>{{ $cart->qty }}</td><td>Rp {{ number_format($cart->price, "2", ",", ".") }}</td><td>Rp {{ number_format($cart->subtotal, "2", ",", ".") }}</td><td><a href="{{ URL('/hapus/'.$cart->rowid) }}" class="btn btn-danger"><i class="fa fa-trash"></i>
 Hapus</a></td></tr>
                @endforeach
                <tr><td colspan="3">Total</td><td>Rp {{ number_format($data['total'], "2", ",", ".") }}</td><td>&nbsp;</td></tr>
                </table>                
                <a href="{{ URL('product') }}" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Lanjutkan Order</a> <a href="{{ URL('/pengiriman') }}" class="btn btn-success">Lanjutkan Transaksi</a>
            @else
                Maaf Kosong
            @endif            
        </div>                       
    </div>
@endsection            