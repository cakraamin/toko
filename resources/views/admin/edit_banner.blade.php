@extends('layouts.app')

@section('content')
{!! Form::model($banner,['class' => 'form-horizontal','method' => 'PATCH','route'=>['admin.banner.update',$banner->id_banner],'files'=>true]) !!}
                        <div class="form-group">
                            <label class="col-md-4 control-label">Judul Banner</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="judul_banner" value="{{ $banner->judul_banner }}">                                

                                @if ($errors->has('judul_banner'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('judul_banner') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Gambar Banner</label>

                            <div class="col-md-6">                                
                                {!! Form::file('image', null) !!}<br/>
                                <img src="{{asset('upload/banner/'.$banner->gambar_banner)}}" width="300">
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
