@extends('layouts.app')

@section('content')
<div class="row">
                        <div class="col-md-6">
                            <a href="{{ URL('admin/categori/create') }}"><button class="btn btn-success">New Categori</button></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped">
                                <thead>
                                    <th width="50px">ID</th>
                                    <th>Nama Kategori</th>
                                    <th width="230px">Keterangan</th>    
                                </thead>
                                <tbody>
                                @foreach ($categori as $dt_categori)
                                    <tr>
                                        <td>{{ $dt_categori->id_kategori }}</td>
                                        <td>{{ $dt_categori->nama_kategori }}</td>                                                                                                
                                        <td>
                                        <a href="{{url('/admin/categori',$dt_categori->id_kategori)}}" class="btn btn-primary" style="float:left; margin-right:3px;">Read</a>
                                        {!! Form::open(['method' => 'DELETE', 'route'=>['admin.categori.destroy', $dt_categori->id_kategori]]) !!}
                                        <a href="{{route('admin.categori.edit',$dt_categori->id_kategori)}}" class="btn btn-warning">Update</a>
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div> 
@endsection
