@extends('layouts.front')

@section('content')
    {!! Breadcrumbs::render('product') !!}
    <div class="row">
        <div class="col-md-4">
        	<img src="{{ asset('upload/gambar/'.$data['barang']->gambar) }}" class="detail">        	
        </div>
        <div class="col-md-8">
        	<table class="table table-striped">
        		<tr>
        			<td>Nama</td><td>{!! $data['barang']->nama !!}</td>
        		</tr>
        		<tr>
        			<td>Merk</td><td>{!! $data['barang']->nama_brand !!}</td>
        		</tr>
        		<tr>
        			<td>Kategori</td><td>{!! $data['barang']->nama_kategori !!}</td>
        		</tr>
        		<tr>
        			<td>Berat</td><td>{!! $data['barang']->berat !!} gram</td>
        		</tr>
        		<tr>
        			<td>Harga</td><td>Rp {!! number_format($data['barang']->harga, "2", ",", ".") !!}</td>
        		</tr>
        		<tr>
        			<td>Keterangan</td><td>{!! $data['barang']->keterangan !!}</td>
        		</tr>
        		<tr>
        			<td></td><td><a href="{{ URL('order/'.$data['barang']->id_product) }}" class="btn btn-success"><i class="fa fa-shopping-cart"></i>
 Order</a></td>
        		</tr>
        	</table>
        </div>
    </div>
@endsection            