@extends('layouts.app')

@section('content')
<form class="form-horizontal" role="form">                                        
                        <div class="form-group">
                            <table class="table table-striped">
                <tr>
                    <td width="20%">Kode Transaksi</td><td>{!! $data['barang']['kode_transaksi'] !!}</td>
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
                    <td width="20%">Total</td><td>Rp {!! number_format(intVal($data['barang']['total']), "2", ",", ".") !!}</td>
                </tr>
                <tr>
                    <td width="20%">Ongkir</td><td>Rp {!! number_format(intVal($data['barang']['ongkir']), "2", ",", ".") !!}</td>
                </tr>
                <tr>
                    <td></td><td> <a href="{{ url('/admin/transaksi') }}" class="fa fa-btn fa-sign-in btn btn-primary" >  Back</a></td>
                </tr>
            </table>
                        </div>
                    </form>
@endsection
