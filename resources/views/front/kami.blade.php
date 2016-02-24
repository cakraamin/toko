@extends('layouts.front')

@section('content')
    {!! Breadcrumbs::render('kami') !!}
    <div class="row">
        <div class="col-md-12">
            {{ $data['kami']->gambar_kami }}<br/>
            {{ $data['kami']->deskripsi }} 
        </div>
    </div>
@endsection            