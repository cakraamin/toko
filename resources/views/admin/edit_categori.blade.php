@extends('layouts.app')

@section('content')
{!! Form::model($categori,['class' => 'form-horizontal','method' => 'PATCH','route'=>['admin.categori.update',$categori->id_kategori],'files'=>true]) !!}
                        <div class="form-group">
                            <label class="col-md-4 control-label">Nama Kategori</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nama_kategori" value="{{ $categori->nama_kategori }}">                                
                                @if ($errors->has('nama_kategori'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama_kategori') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Logo Kategori</label>

                            <div class="col-md-6">
                                {!! Form::file('image', null) !!}<br/>
                                <img src="{{asset('upload/logo/'.$categori->logo_kategori)}}" width="300">
                                @if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                                                

                        <div class="form-group">
                            <div class="col-md-4 col-md-offset-4">
                                {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}                                
                                <a href="{{ URL('admin/brand') }}" class="btn btn-warning">Cancel</a>
                            </div>                            
                        </div>                    
                    {!! Form::close() !!}
@endsection
