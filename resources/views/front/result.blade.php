@extends('layouts.front')

@section('content')
    {!! Breadcrumbs::render('pembelian') !!}
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills nav-wizard">
                <li><a href="#" data-toggle="tab">Pembelian</a><div class="nav-arrow"></div></li>
                <li><div class="nav-wedge"></div><a href="#" data-toggle="tab">Pengiriman</a><div class="nav-arrow"></div></li>
                <li class="active"><div class="nav-wedge"></div><a href="#" data-toggle="tab">Pembayaran</a></li>
            </ul>
        </div>
    </div>
    <div class="row"> 
        <div class="col-md-12">
            <h3>Terima Kasih Telah Melakukan Transaksi</h3>
            <table class="table table-striped">
                <tr>
                    <td width="20%">Kode Transaksi</td><td>{!! $data['barang']['kode_transaksi'] !!}<font color="red"> (Silahkan Catat Kode Transaksi Untuk Konfirmasi Pembayaran)</font></td>
                </tr>
                <tr>
                    <td width="20%">Nama</td><td>{!! $data['barang']['nama'] !!}</td>
                </tr>
                <tr>
                    <td width="20%">Telephone</td><td>{!! $data['barang']['telp'] !!}</td>
                </tr>
                <tr>
                    <td width="20%">E-mail</td><td>{!! $data['barang']['email'] !!}</td>
                </tr>
                <tr>
                    <td width="20%">Alamat</td><td>{!! $data['barang']['alamat'] !!}</td>
                </tr>
                <tr>
                    <td width="20%">Tujuan</td><td>{!! $data['tujuan'] !!}</td>
                </tr>
                <tr>
                    <td width="20%">Ekspedisi</td><td>{!! strtoupper($data['barang']['via']) !!}</td>
                </tr>
                <tr>
                    <td width="20%">Paket</td><td>{!! $data['barang']['paket'] !!}</td>
                </tr>
                <tr>
                    <td width="20%">Total</td><td>Rp {!! number_format($data['barang']['total'], "2", ",", ".") !!}</td>
                </tr>
                <tr>
                    <td width="20%">Ongkir</td><td>Rp {!! number_format($data['barang']['ongkir'], "2", ",", ".") !!}</td>
                </tr>
                <tr>
                    <td></td><td><a href="{{ URL('email/'.$data['id']) }}" class="btn btn-success"><i class="fa fa-inbox"></i>
 Kirim E-mail</a>&nbsp;<a href="{{ URL('/') }}" class="btn btn-primary"><i class="fa fa-home"></i>
 Selesai</a></td>
                </tr>
            </table>
        </div>                       
    </div>
@endsection            