@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Download</div>
                <div class="panel-body">                        
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
                            <div class="col-md-6 col-md-offset-4">
                                {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
                            </div>
                        </div>                    
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection