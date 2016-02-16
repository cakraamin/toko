@extends('layouts.app')

@section('content')
<div class="container">    
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Banner</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{ URL('admin/banner/create') }}"><button class="btn btn-success">New Brand</button></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped">
                                <thead>
                                    <td>ID</td>
                                    <td>Nama</td>
                                    <td>Keterangan</td>    
                                </thead>
                                <tbody>
                                @foreach ($banner as $dt_banner)
                                    <tr>
                                        <td>{{ $dt_banner->id_banner }}</td>
                                        <td>{{ $dt_banner->nama_banner }}</td>                                                                                                
                                        <td>
                                        <a href="{{url('/admin/banner',$dt_banner->id_banner)}}" class="btn btn-primary">Read</a>
                                        {!! Form::open(['method' => 'DELETE', 'route'=>['admin.banner.destroy', $dt_banner->id_banner]]) !!}
                                        <a href="{{route('admin.banner.edit',$dt_banner->id_banner)}}" class="btn btn-warning">Update</a>
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
