@extends('layouts.app')

@section('content')
<div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped">
                                <thead>
                                    <th width="50px">ID</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th width="230px">Keterangan</th>   
                                </thead>
                                <tbody>                 
                                    @foreach ($konfirmasi as $dt_konfirm)
                                    <tr>
                                        <td>{{ $dt_konfirm->id_konfirmasi }}</td>
                                        <td>{{ $dt_konfirm->nama }}</td>     
                                        <td>{{ $dt_konfirm->email }}</td><td>
                                        <a href="{{url('/admin/konfirmasi',$dt_konfirm->id_konfirmasi)}}" class="btn btn-primary" style="float:left; margin-right:3px">Read</a> {!! Form::open(['method' => 'DELETE', 'route'=>['admin.konfirmasi.destroy', $dt_konfirm->id_konfirmasi]]) !!}    
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
