@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Brand</div>
                <div class="panel-body">    
                    <form class="form-horizontal" role="form">                                        
                        <div class="form-group">
                            <label class="col-md-4 control-label">Nama Brand</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nama" value="{{ $brand->nama_brand }}" disabled="disabled">                                
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Logo Brand</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="instansi" value="{{ $brand->logo_brand }}" disabled="disabled">                                
                            </div>
                        </div>                                                                

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <a href="{{ url('/admin/download') }}" class="fa fa-btn fa-sign-in btn btn-primary" >  Back</a>                                
                            </div>
                        </div>                    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection