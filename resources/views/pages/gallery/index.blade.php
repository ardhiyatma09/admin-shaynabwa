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
                        <strong class="card-title">Custom Table</strong>
                    </div>
                    <div class="table-stats order-table ov-h">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name Barang</th>
                                    <th>Foto</th>
                                    <th>Default</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no = 1;    
                                ?>
                                @forelse ($fotos as $foto)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$foto->product->name ?? 'tidak ada'}}</td>
                                    <td>
                                        <img src="{{url($foto->photo)}}" alt="">
                                    </td>
                                    <td>{{$foto->is_default ? 'ya' : 'tidak'}}</td>
                                    <td>
                                        <form action="{{route('photo.destroy',$foto->id)}}" method="post" class="d-inline">
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