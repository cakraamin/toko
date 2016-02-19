@extends('layouts.app')

@section('content')
<div class="row">
                        <div class="col-md-6">
                            <a href="{{ URL('admin/banner/create') }}"><button class="btn btn-success">New Banner</button></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped">
                                <thead>
                                    <th width="50px">ID</th>
                                    <th>Nama</th>
                                    <th>Gambar</th>
                                    <th width="230px">Keterangan</th>    
                                </thead>
                                <tbody>
                                @foreach ($banner as $dt_banner)
                                    <tr>
                                        <td>{{ $dt_banner->id_banner }}</td>
                                        <td>{{ $dt_banner->judul_banner }}</td>
                                        <td>{{ $dt_banner->gambar_banner }}              
                                        </td>
                                        <td>
                                        <a href="{{url('/admin/banner',$dt_banner->id_banner)}}" class="btn btn-primary" style="float:left; margin-right: 3px">Read</a>
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
@endsection
