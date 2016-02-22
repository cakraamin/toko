@extends('layouts.front')

@section('content')
    {!! Breadcrumbs::render('kami') !!}
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills nav-wizard">
                <li><a href="#" data-toggle="tab">Home</a><div class="nav-arrow"></div></li>
                <li class="active"><div class="nav-wedge"></div><a href="#" data-toggle="tab">About</a><div class="nav-arrow"></div></li>
                <li><div class="nav-wedge"></div><a href="#" data-toggle="tab">Contact</a></li>
            </ul>
        </div>
    </div>
    <div class="row">        
        @if (count($data['cart']) > 0)
            <ol>
            @foreach($data['cart'] as $cart)
                <li>{{ $cart->name }} {{ $cart->qty }} {{ $cart->price }}  {{ $cart->subtotal }}</li>
            @endforeach
            </ol>
            {{ $data['total'] }}
        @else
            <div class="col-md-12">Maaf Kosong</div>
        @endif
    </div>
@endsection            