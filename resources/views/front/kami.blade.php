@extends('layouts.front')

@section('content')
    {!! Breadcrumbs::render('kami') !!}
    <div class="row">
        <div class="col-md-12">
        	<img src="{{ asset('upload/gambar/'.$data['kami']->gambar_kami) }}" alt="Tentang Kami" class="tentang_kami">       
            {!! $data['kami']->deskripsi !!} 
        </div>
    </div>
@endsection            