@extends('layouts.app')

@section('content')
{!! Form::model($data['product'],['class' => 'form-horizontal','method' => 'PATCH','route'=>['admin.product.update',$data['product']->id_product],'files'=>true]) !!}
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
                                {{ Form::select('brand', $data['brand'],$data['product']->id_brand,array('class'=>'form-control')) }}

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
                                {{ Form::select('categori', $data['categori'],$data['product']->id_kategori,array('class'=>'form-control')) }}

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
                                <input type="text" class="form-control" name="harga" value="{{ $data['product']->harga }}">                                

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
                                <input type="text" class="form-control" name="berat" value="{{ $data['product']->berat }}">                                

                                @if ($errors->has('berat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('berat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Stok Product</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="stok" value="{{ $data['product']->stok }}">                                

                                @if ($errors->has('stok'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('stok') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Keterangan Product</label>

                            <div class="col-md-6">                                
                                <textarea name="keterangan" id="summernote">{{ $data['product']->keterangan }}</textarea>

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
                                {!! Form::file('image', null) !!}<br/>
                                <img src="{{asset('upload/gambar/'.$data['product']->gambar)}}" width="300">
                            </div>
                        </div>                                                

                        <div class="form-group">
                            <div class="col-md-4 col-md-offset-4">
                                {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}                                
                                <a href="{{ URL('admin/product') }}" class="btn btn-warning">Cancel</a>
                            </div>                            
                        </div>                    
                    {!! Form::close() !!}
@endsection
