@extends('layouts.app')

@section('content')
<form class="form-horizontal" role="form">                                        
                        <div class="form-group">
                            <label class="col-md-4 control-label">Nama Brand</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nama" value="{{ $categori->nama_kategori }}" disabled="disabled">                                
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Logo Brand</label>

                            <div class="col-md-6">                                
                                <img src="{{asset('upload/logo/'.$categori->logo_kategori)}}" width="300">
                            </div>
                        </div>                                                                

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <a href="{{ url('/admin/categori') }}" class="fa fa-btn fa-sign-in btn btn-primary" >  Back</a>                                
                            </div>
                        </div>                    
                    </form>
@endsection
