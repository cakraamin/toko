@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Testimoni</div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr class="bg-info">
                            <th>NO</th>
                            <th>Nama</th>
                            <th>Instansi</th>                             
                            <th>Actions</th>
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
        </div>
    </div>
</div>
@endsection
