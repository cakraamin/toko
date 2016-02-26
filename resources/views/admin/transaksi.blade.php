@extends('layouts.app')

@section('content')
<div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped">
                                <thead>
                                    <th width="50px">ID</th>
                                    <th>Name</th>
                                    <th>Total</th>
                                    <th>Ongkir</th>
                                    <th width="230px">Keterangan</th>
                                </thead>
                                <tbody>
                                    @foreach($transaksi as $dt)
                                        <tr>
                                            <td>{{ $dt->id_transaksi }}</td>
                                            <td>{{ $dt->nama }}</td>
                                            <td>Rp {{ number_format(intVal($dt->total), "2", ",", ".") }}</td>
                                            <td>Rp {{ number_format(intVal($dt->ongkir), "2", ",", ".") }}</td>
                                            <td>
                                                <a href="{{url('/admin/transaksi',$dt->id_transaksi)}}" class="btn btn-primary" style="float:left; margin-right:3px">Read</a>
                                        {!! Form::open(['method' => 'DELETE', 'route'=>['admin.transaksi.destroy', $dt->id_transaksi]]) !!}
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
