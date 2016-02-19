@extends('layouts.front')

@section('content')
    {!! Breadcrumbs::render('kami') !!}
    <div class="row">
        <div class="col-md-12">
            {{ $kami->gambar_kami }}<br/>
            {{ $kami->deskripsi }} 
        </div>
    </div>
@endsection            