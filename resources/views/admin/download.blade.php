@extends('layouts.app')

@section('content')
<div class="container">    
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Download</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{ URL('admin/download/create') }}"><button class="btn btn-success">New Product</button></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped">
                                <thead>
                                    <td>Name</td>
                                    <td>Price</td>
                                    <td>File</td>                                    
                                </thead>
                                <tbody>
                                @foreach ($down as $dt_down)
                                    <tr>
                                        <td>{{ $dt_down->id_download }}</td>
                                        <td>{{ $dt_down->nama_download }}</td>                                                                                                
                                        <td>
                                        <a href="{{url('/admin/download',$dt_down->id_download)}}" class="btn btn-primary">Read</a>
                                        {!! Form::open(['method' => 'DELETE', 'route'=>['admin.download.destroy', $dt_down->id_download]]) !!}
                                        <a href="{{route('admin.download.edit',$dt_down->id_download)}}" class="btn btn-warning">Update</a>
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
