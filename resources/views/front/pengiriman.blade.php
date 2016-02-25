@extends('layouts.front')

@section('content')
    {!! Breadcrumbs::render('pengiriman') !!}
    <script type="text/javascript">
    function pakete(ID){
        var nilai = $("#"+ID).val();
        $("#biaya").val(nilai);
    }
    function pilih(){
        var tujuan = $("#tujuan").val();
        var via = $("#via").val();
        var jumlah = $("#jumlah").val();    
        var hasil = "";    
        $.ajax({
          url: "pilihan/"+tujuan+"/"+via+"/"+jumlah,
          beforeSend: function( xhr ) {            
            $("#pilihan").html('<label class="col-md-4 control-label"></label><div class="col-md-6"><img src="{{ asset('img/loading.gif') }}"></div>');     
          }
        }).done(function( data ) { 
            var itung = 1;               
            data.forEach(function(entry) {
                hasil = hasil + '<input type="radio" name="paket" value="'+entry["deskripsi"]+'" class="paket" onClick="pakete('+itung+')"> '+entry["deskripsi"]+' Rp '+entry["jumlah"]+' estimasi sampai tujuan '+entry["waktu"]+' hari<input type="hidden" id="'+itung+'" name="'+itung+'" value="'+entry["jumlah"]+'"/><br/>';
                itung++;
            });            
            $("#pilihan").html('<label class="col-md-4 control-label">Paket</label><div class="col-md-6">'+hasil+'</div>');
        });        
    }
    </script>
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills nav-wizard">
                <li><a href="#" data-toggle="tab">Pembelian</a><div class="nav-arrow"></div></li>
                <li class="active"><div class="nav-wedge"></div><a href="#" data-toggle="tab">Pengiriman</a><div class="nav-arrow"></div></li>
                <li><div class="nav-wedge"></div><a href="#" data-toggle="tab">Pembayaran</a></li>
            </ul>
        </div>
    </div>
    <div class="row"> 
        <div class="col-md-12"><br/>                
            @if (count($data['cart']) > 0)                
                {!! Form::open(['url' => 'pengiriman','class' => 'form-horizontal','method' => 'POST','files'=>true]) !!}
                        <input type="hidden" name="biaya" id="biaya"/>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Tujuan</label>

                            <div class="col-md-6">
                                 {!!Form::select('kota', $data['combo'], '', array("class"=>"form-control selectpicker","data-live-search" => "true","onChange" => "pilih()","id" => "tujuan") ) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Pengiriman</label>

                            <div class="col-md-6">
                                 {!!Form::select('pengiriman', $data['pengiriman'], '', array("class"=>"form-control","id" => "via","onChange" => "pilih()") ) !!}
                            </div>
                        </div>
                        <div class="form-group" id="pilihan">
                        </div>                        
                        <div class="form-group">
                            <label class="col-md-4 control-label">Nama</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nama">  
                                <input type="hidden" name="jumlah" value="{{ $data['jumlah'] }}" id="jumlah">                       
                                @if ($errors->has('nama'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">E-mail</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="email">                                
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">No Telp</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="telp">                                
                                @if ($errors->has('telp'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telp') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Alamat</label>

                            <div class="col-md-6">
                                <textarea name="alamat" cols="50" rows="5" class="form-control"></textarea>
                                @if ($errors->has('alamat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('alamat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4 col-md-offset-4">
                                {!! Form::submit('Kirim', ['class' => 'btn btn-primary']) !!}                  
                            </div> 
                        </div> 
            {!! Form::close() !!}  
            @else
                Maaf Kosong
            @endif            
        </div>                       
    </div>
@endsection            