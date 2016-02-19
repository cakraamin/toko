@extends('layouts.app')

@section('content')
{!! Form::model($data['product'],['class' => 'form-horizontal','method' => 'PATCH','route'=>['admin.product.update',$data['product']->id_product]]) !!}
                        <div class="form-group">
                            <label class="col-md-4 control-label">Nama Product</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nama" value="{{ $data['product']->nama }}">                                

                                @if ($errors->has('nama'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Brand Product</label>

                            <div class="col-md-6">
                                {{ Form::select('brand', $data['brand'],null,array('class'=>'form-control')) }}

                                @if ($errors->has('nama_product'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama_product') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Categori Product</label>

                            <div class="col-md-6">
                                {{ Form::select('categori', $data['categori'],null,array('class'=>'form-control')) }}

                                @if ($errors->has('nama_product'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama_product') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Harga Product</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="harga">                                

                                @if ($errors->has('harga'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('harga') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Berat Product</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="berat">                                

                                @if ($errors->has('berat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('berat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Keterangan Product</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="keterangan">                                

                                @if ($errors->has('keterangan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('keterangan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Gambar Product</label>

                            <div class="col-md-6">                                
                                {!! Form::file('image', null) !!}
                            </div>
                        </div>                                                

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>                    
                    {!! Form::close() !!}
@endsection
