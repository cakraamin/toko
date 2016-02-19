@extends('layouts.app')

@section('content')
{!! Form::open(['url' => 'admin/download','class' => 'form-horizontal','method' => 'POST','files'=>true]) !!}
                        <div class="form-group">
                            <label class="col-md-4 control-label">Nama File</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nama_download">                                

                                @if ($errors->has('nama_download'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama_download') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">File Download</label>

                            <div class="col-md-6">                                
                                {!! Form::file('image', null) !!}
                            </div>
                        </div>                                                

                        <div class="form-group">
                            <div class="col-md-4 col-md-offset-4">
                                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}                                
                                <a href="{{ URL('admin/download') }}" class="btn btn-warning">Cancel</a>
                            </div> 
                        </div>                    
                    {!! Form::close() !!}
@endsection
