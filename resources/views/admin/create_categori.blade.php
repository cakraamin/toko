@extends('layouts.app')

@section('content')
{!! Form::open(['url' => 'admin/categori','class' => 'form-horizontal','method' => 'POST','files'=>true]) !!}
                        <div class="form-group">
                            <label class="col-md-4 control-label">Nama Kategori</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nama_kategori">                                

                                @if ($errors->has('nama_kategori'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama_kategori') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Gambar Categori</label>

                            <div class="col-md-6">                                
                                {!! Form::file('image', null) !!}
                                @if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                                                

                        <div class="form-group">
                            <div class="col-md-4 col-md-offset-4">
                                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}                                
                                <a href="{{ URL('admin/brand') }}" class="btn btn-warning">Cancel</a>
                            </div>                            
                        </div>                    
                    {!! Form::close() !!}
@endsection
