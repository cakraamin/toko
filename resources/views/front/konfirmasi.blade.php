@extends('layouts.front')

@section('content')
    {!! Breadcrumbs::render('konfirmasi') !!}
    <div class="row">
        <div class="col-md-12">
            {!! Form::open(['url' => 'konfirmasi','class' => 'form-horizontal','method' => 'POST','files'=>true]) !!}
                        <div class="form-group">
                            <label class="col-md-4 control-label">Kode Transaksi</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="kode_transaksi">                                

                                @if ($errors->has('kode_transaksi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kode_transaksi') }}</strong>
                                    </span>
                                @endif
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
                            <label class="col-md-4 control-label">Email</label>

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
                            <label class="col-md-4 control-label">File Bukti Transfer</label>

                            <div class="col-md-6">
                                {!! Form::file('image', null) !!}                              

                                @if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
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
        </div>
    </div>                
@endsection            