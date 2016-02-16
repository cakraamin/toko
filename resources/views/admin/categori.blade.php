@extends('layouts.app')

@section('content')
<div class="container">    
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Kategori</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{ URL('admin/categori/create') }}"><button class="btn btn-success">New Categori</button></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped">
                                <thead>
                                    <td>ID</td>
                                    <td>Nama Kategori</td>
                                    <td>Keterangan</td>    
                                </thead>
                                <tbody>
                                @foreach ($categori as $dt_categori)
                                    <tr>
                                        <td>{{ $dt_categori->id_categori }}</td>
                                        <td>{{ $dt_categori->nama_categori }}</td>                                                                                                
                                        <td>
                                        <a href="{{url('/admin/categori',$dt_categori->id_categori)}}" class="btn btn-primary">Read</a>
                                        {!! Form::open(['method' => 'DELETE', 'route'=>['admin.categori.destroy', $dt_categori->id_categori]]) !!}
                                        <a href="{{route('admin.categori.edit',$dt_categori->id_categori)}}" class="btn btn-warning">Update</a>
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
