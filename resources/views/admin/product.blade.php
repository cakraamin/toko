@extends('layouts.app')

@section('content')
<div class="container">    
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Product</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{ URL('admin/product/create') }}"><button class="btn btn-success">New Product</button></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped">
                                <thead>
                                    <td>ID</td>
                                    <td>Nama</td>
                                    <td>Brand</td>
                                    <td>Categori</td>
                                    <td>Keterangan</td>    
                                </thead>
                                <tbody>
                                @foreach ($product as $dt_product)
                                    <tr>
                                        <td>{{ $dt_product->id_product }}</td>
                                        <td>{{ $dt_product->nama_product }}</td>   
                                        <td>
                                        <a href="{{url('/admin/product',$dt_product->id_product)}}" class="btn btn-primary">Read</a>
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
