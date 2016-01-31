@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">    
                    <form class="form-horizontal" role="form">                                        
                        <div class="form-group">
                            <label class="col-md-4 control-label">Nama</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nama" value="{{ $testi->nama }}" disabled="disabled">                                
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Instansi</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="instansi" value="{{ $testi->instansi }}" disabled="disabled">                                
                            </div>
                        </div>                        

                        <div class="form-group">
                            <label class="col-md-4 control-label">Testimoni</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="teks_testimoni" value="{{ $testi->teks_testimoni }}" disabled="disabled">                                
                            </div>
                        </div>                        

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <a href="{{ url('/admin/testimoni') }}" class="fa fa-btn fa-sign-in btn btn-primary" >  Back</a>                                
                            </div>
                        </div>                    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
