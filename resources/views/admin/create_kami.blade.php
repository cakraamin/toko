@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Download</div>
                <div class="panel-body">                        
                    {!! Form::open(['url' => 'admin/kami','class' => 'form-horizontal','method' => 'POST','files'=>true]) !!}                        

                        <div class="form-group">
                            <label class="col-md-4 control-label">Gambar Tentang Kami</label>

                            <div class="col-md-6">                                
                                {!! Form::file('image', null) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Deskripsi</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="deskripsi">                                

                                @if ($errors->has('deskripsi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('deskripsi') }}</strong>
                                    </span>
                                @endif
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
