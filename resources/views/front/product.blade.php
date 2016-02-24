@extends('layouts.front')

@section('content')
    {!! Breadcrumbs::render('product') !!}
                <div class="row">
                    @if (count($data['barang']) > 0)
                        @foreach ($data['barang'] as $barang)
                            <div class="col-sm-4 col-lg-4 col-md-4">
                                <div class="thumbnail">
                                    <div class="box">
                                    <img src="{{ asset('upload/gambar/'.$barang->gambar) }}" alt="">
                                    </div>
                                    <div class="caption">                                        
                                        <h4><a href="{{ URL('product/'.$barang->id_product.'/'.str_slug($barang->nama, '-')) }}">{{ $barang->nama }}</a></h4>
                                        <h4>Rp {{ number_format($barang->harga, "2", ",", ".") }}</h4>                                        
                                        {!! $barang->keterangan !!}
                                    </div>
                                    <div class="ratings">
                                        <a href="{{ URL('order/'.$barang->id_product) }}" class="btn btn-success"><i class="fa fa-shopping-cart"></i>
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