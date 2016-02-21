@extends('layouts.app')

@section('content')
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
                                <textarea name="deskripsi" id="summernote">{{ $data->deskripsi }}</textarea>

                                @if ($errors->has('deskripsi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('deskripsi') }}</strong>
                                    </span>
                                @endif                                
                            </div>
                        </div>                        

                        <div class="form-group">
                            <div class="col-md-4 col-md-offset-4">
                                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}                                                                
                            </div> 
                        </div>                    
                    {!! Form::close() !!}
@endsection
