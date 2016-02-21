@extends('layouts.front')

@section('content')
    {!! Breadcrumbs::render('brand',$data['judul']) !!}
                <div class="row">
                    @if (count($data['barang']) > 0)
                        @foreach ($data['barang'] as $barang)
                            <div class="col-sm-4 col-lg-4 col-md-4">
                                <div class="thumbnail">
                                    <img src="{{ asset('upload/gambar/'.$barang->gambar) }}" alt="">
                                    <div class="caption">                                        
                                        <h4><a href="#">{{ $barang->nama }}</a></h4>
                                        <h4>{{ $barang->harga }}</h4>                                        
                                        {{ $barang->keterangan }}
                                    </div>
                                    <div class="ratings">
                                        <p class="pull-right">15 reviews</p>
                                        <p>
                                            <span class="glyphicon glyphicon-star"></span>
                                            <span class="glyphicon glyphicon-star"></span>
                                            <span class="glyphicon glyphicon-star"></span>
                                            <span class="glyphicon glyphicon-star"></span>
                                            <span class="glyphicon glyphicon-star"></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-md-12">Maaf Kosong</div>
                    @endif                    
                </div>
@endsection            