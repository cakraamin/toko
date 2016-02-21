@extends('layouts.app')

@section('content')
<div class="row">
                        <div class="col-md-6">
                            <a href="{{ URL('admin/product/create') }}"><button class="btn btn-success">New Product</button></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped">
                                <thead>
                                    <th width="50px">ID</th>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th>Brand</th>
                                    <th>Categori</th>
                                    <th width="230px">Keterangan</th>    
                                </thead>
                                <tbody>
                                @foreach ($product as $dt_product)
                                    <tr>
                                        <td>{{ $dt_product->id_product }}</td>
                                        <td>{{ $dt_product->nama }}</td>   
                                        <td>{{ $dt_product->harga }}</td>   
                                        <td>{{ $dt_product->nama_brand }}</td>   
                                        <td>{{ $dt_product->nama_kategori }}
                                        </td>   
                                        <td>                                        
                                        {!! Form::open(['method' => 'DELETE', 'route'=>['admin.product.destroy', $dt_product->id_product]]) !!}
                                        <a href="{{route('admin.product.edit',$dt_product->id_product)}}" class="btn btn-warning">Update</a>
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
