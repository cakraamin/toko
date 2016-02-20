@extends('layouts.app')

@section('content')
<form class="form-horizontal" role="form">                                        
                        <div class="form-group">
                            <label class="col-md-4 control-label">Nama</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nama" value="{{ $konfirmasi->nama }}" disabled="disabled">                                
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">E-mail</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nama" value="{{ $konfirmasi->email }}" disabled="disabled">                                
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Bukti Transfer</label>

                            <div class="col-md-6">
                                <img src="{{asset('upload/konfirmasi/'.$konfirmasi->screen_shoot)}}" width="300">
                            </div>
                        </div>                                                                

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <a href="{{ url('/admin/banner') }}" class="fa fa-btn fa-sign-in btn btn-primary" >  Back</a>                                
                            </div>
                        </div>                    
                    </form>
@endsection
