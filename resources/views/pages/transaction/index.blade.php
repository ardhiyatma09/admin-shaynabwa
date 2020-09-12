@extends('layouts.default')

@section('title')
    Lihat Barang
@endsection

@push('styles')
    <style>
        .text-tr {
            text-transform: initial !important;
        }
    </style>
@endpush
@section('content')
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Daftar Transaksi Masuk</strong>
                    </div>
                    <div class="table-stats order-table ov-h">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Nomor</th>
                                    <th>Total Transaksi</th>
                                    <th>Status</th>
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
                                    <td class="text-tr">{{$product->email}}</td>
                                    <td>{{$product->number}}</td>
                                    <td>${{$product->transaction_total}}</td>
                                    <td>
                                        @if($product->transaction_status == 'PENDING')
                                            <span class="badge badge-info">
                                        @elseif($product->transaction_status == 'SUCCESS')
                                            <span class="badge badge-success">
                                        @elseif($product->transaction_status == 'FAILED')
                                            <span class="badge badge-danger">
                                        @else
                                            <span>
                                        @endif
                                        {{$product->transaction_status}}
                                        </span>
                                    </td>
                                    <td>
                                        @if ($product->transaction_status == 'PENDING')
                                        <a href="{{route('transaction.status',$product->id)}}?status=SUCCESS" class="btn btn-success btn-sm">
                                            <i class="fa fa-check"></i>
                                        </a>
                                        <a href="{{route('transaction.status',$product->id)}}?status=FAILED" class="btn btn-danger btn-sm">
                                            <i class="fa fa-times"></i>
                                        </a>
                                        @endif
                                        <a href="#mymodal" data-remote="{{route('transaction.show',$product->id)}}" data-toggle="modal" data-target="#mymodal" data-title="Detail Transaksi {{$product->uuid}}" class="btn btn-info btn-sm">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{route('transaction.edit',$product->id)}}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <form action="{{route('transaction.destroy',$product->id)}}" method="post" class="d-inline">
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