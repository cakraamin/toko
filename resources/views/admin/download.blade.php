@extends('layouts.app')

@section('content')
<div class="row">
                        <div class="col-md-6">
                            <a href="{{ URL('admin/download/create') }}"><button class="btn btn-success">New Download</button></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped">
                                <thead>
                                    <th width="50px">ID</th>
                                    <th>Judul</th>
                                    <th width="230px">File</th>                                    
                                </thead>
                                <tbody>
                                @foreach ($down as $dt_down)
                                    <tr>
                                        <td>{{ $dt_down->id_download }}</td>
                                        <td>{{ $dt_down->nama_download }}</td>                                                                                                
                                        <td>
                                        <a href="{{url('/admin/download',$dt_down->id_download)}}" class="btn btn-primary" style="float:left; margin-right:3px">Read</a>
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
@endsection
