@extends('layouts.app')

@section('content')
{!! Form::model($down,['class' => 'form-horizontal','method' => 'PATCH','route'=>['admin.download.update',$down->id_download],'files'=>true]) !!}
                        <div class="form-group">
                            <label class="col-md-4 control-label">Nama File</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nama_download" value="{{ $down->nama_download }}">                                
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">File Download</label>

                            <div class="col-md-6">
                                {!! Form::file('image', null) !!}<br/>
                                {{ $down->file_download }}
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
                                <a href="{{ URL('admin/download') }}" class="btn btn-warning">Cancel</a>
                            </div>                            
                        </div>                    
                    {!! Form::close() !!}
@endsection
