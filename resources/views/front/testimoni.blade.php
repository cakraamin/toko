@extends('layouts.front')

@section('content')
    {!! Breadcrumbs::render('testimoni') !!}
    <div class="row">
        <div class="col-md-12">
            {!! Form::open(['url' => 'testimoni','class' => 'form-horizontal','method' => 'POST','files'=>true]) !!}
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
                            <label class="col-md-4 control-label">Instansi</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="instansi">                                

                                @if ($errors->has('instansi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('instansi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Testimoni</label>

                            <div class="col-md-6">
                                <textarea name="teks_testimoni" class="form-control" rows="5"></textarea>                                

                                @if ($errors->has('teks_testimoni'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('teks_testimoni') }}</strong>
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