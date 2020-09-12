@extends('layouts.default')

@section('title')
    Lihat Barang
@endsection

@section('content')
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">List Barang</strong>
                    </div>
                    <div class="table-stats order-table ov-h">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no = 1;    
                                ?>
                                @forelse ($products as $product)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->type}}</td>
                                    <td>${{$product->price}}</td>
                                    <td>{{$product->quantity}}</td>
                                    <td>
                                        <a href="{{route('products.gallery',$product->id)}}" class="btn btn-info btn-sm">
                                            <i class="fa fa-picture-o"></i>
                                        </a>
                                        <a href="{{route('products.edit',$product->id)}}" class="btn btn-info btn-sm">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <form action="{{route('products.destroy',$product->id)}}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">
                                        Tidak ada data
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div> <!-- /.table-stats -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection