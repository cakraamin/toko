@extends('layouts.front')

@section('content')
    {!! Breadcrumbs::render('pengiriman') !!}
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills nav-wizard">
                <li><a href="#" data-toggle="tab">Pembelian</a><div class="nav-arrow"></div></li>
                <li class="active"><div class="nav-wedge"></div><a href="#" data-toggle="tab">Pengiriman</a><div class="nav-arrow"></div></li>
                <li><div class="nav-wedge"></div><a href="#" data-toggle="tab">Pembayaran</a></li>
            </ul>
        </div>
    </div>
    <div class="row"> 
        <div class="col-md-12"><br/>
            {!! Form::open(['url' => 'pengiriman','class' => 'form-horizontal','method' => 'POST','files'=>true]) !!}
                        <div class="form-group">
                            <label class="col-md-4 control-label">Provinsi</label>

                            <div class="col-md-6">
                                 {!!Form::select('kota', $data['combo'], '', array("class"=>"form-control selectpicker","data-live-search" => "true") ) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Pengiriman</label>

                            <div class="col-md-6">
                                 {!!Form::select('pengiriman', $data['pengiriman'], '', array("class"=>"form-control") ) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Nama</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nama">                                
                                @if ($errors->has('nama'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">E-mail</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="email">                                
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">No Telp</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="telp">                                
                                @if ($errors->has('telp'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telp') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Alamat</label>

                            <div class="col-md-6">
                                <textarea name="alamat" cols="50" rows="5" class="form-control"></textarea>
                                @if ($errors->has('alamat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('alamat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4 col-md-offset-4">
                                {!! Form::submit('Kirim', ['class' => 'btn btn-primary']) !!}                  
                            </div> 
                        </div> 
            {!! Form::close() !!}        
            @if (count($data['cart']) > 0)                
                <div data-theme="light" id="rajaongkir-widget"></div>
                <script type="text/javascript" src="//rajaongkir.com/script/widget.js"></script>              
                <a href="{{ URL('/pembayaran') }}" class="btn btn-success">Lanjutkan Pembayaran</a>
            @else
                Maaf Kosong
            @endif            
        </div>                       
    </div>
@endsection            