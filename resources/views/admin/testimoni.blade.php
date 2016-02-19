@extends('layouts.app')

@section('content')
<div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th width="50px">ID</th>
                                    <th>Nama</th>
                                    <th>Instansi</th>                             
                                    <th width="230px">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($testi as $dt_testi)
                                    <tr>
                                        <td>{{ $dt_testi->id_testimoni }}</td>
                                        <td>{{ $dt_testi->nama }}</td>
                                        <td>{{ $dt_testi->instansi }}</td>                                                                  
                                        <td>
                                        <a href="{{url('/admin/testimoni',$dt_testi->id_testimoni)}}" class="btn btn-primary">Read</a>
                                        {!! Form::open(['method' => 'DELETE', 'route'=>['admin.testimoni.destroy', $dt_testi->id_testimoni]]) !!}
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
