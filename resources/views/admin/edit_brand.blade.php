@extends('layouts.app')

@section('content')
{!! Form::model($brand,['class' => 'form-horizontal','method' => 'PATCH','route'=>['admin.brand.update',$brand->id_brand],'files'=>true]) !!}
                        <div class="form-group">
                            <label class="col-md-4 control-label">Nama Brand</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nama_brand" value="{{ $brand->nama_brand }}">                                
                                @if ($errors->has('nama_brand'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama_brand') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Logo Brand</label>

                            <div class="col-md-6">
                                {!! Form::file('image', null) !!}<br/>
                                <img src="{{asset('upload/logo/'.$brand->logo_brand)}}" width="300">
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
