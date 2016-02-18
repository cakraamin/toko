@extends('layouts.app')

@section('content')
<div class="row">
                        <div class="col-md-6">
                            <a href="{{ URL('admin/brand/create') }}"><button class="btn btn-success">New Brand</button></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped">
                                <thead>
                                    <th width="50px">ID</th>
                                    <th>Nama</th>
                                    <th width="230px">Keterangan</th>    
                                </thead>
                                <tbody>
                                @foreach ($brand as $dt_brand)
                                    <tr>
                                        <td>{{ $dt_brand->id_brand }}</td>
                                        <td>{{ $dt_brand->nama_brand }}</td>                                                                                                
                                        <td>
                                        <a href="{{url('/admin/brand',$dt_brand->id_brand)}}" class="btn btn-primary" style="float:left; margin-right:3px">Read</a>
                                        {!! Form::open(['method' => 'DELETE', 'route'=>['admin.brand.destroy', $dt_brand->id_brand]]) !!}
                                        <a href="{{route('admin.brand.edit',$dt_brand->id_brand)}}" class="btn btn-warning">Update</a>
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
