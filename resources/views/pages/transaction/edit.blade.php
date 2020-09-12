@extends('layouts.default')

@section('title')
    Edit Barang
@endsection

@section('content')
<div class="content">
    <div class="card">
        <div class="card-header">
            <strong>Edit Barang</strong>
            <small class="text-muted"> - {{$item->uuid}}</small>
        </div>
        <div class="card-body card-block">
            <form action="{{route('transaction.update',$item->id)}}" method="post">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="name" class="form-control-label">Nama Pemesan</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name') ? old('name') : $item->name}}">
                    @error('name')
                    <div class="text-muted">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email" class="form-control-label">Email</label>
                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email') ? old('email') : $item->email}}">
                    @error('email')
                    <div class="text-muted">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="number" class="form-control-label">Nomor HP</label>
                            <input type="text" name="number" class="form-control @error('number') is-invalid @enderror" value="{{old('number') ? old('number') : $item->number}}">
                            @error('number')
                            <div class="text-muted">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="address" class="form-control-label">Alamat Pemesan</label>
                            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{old('address') ? old('address') : $item->address}}">
                            @error('address')
                            <div class="text-muted">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Edit Transaksi</button>
                </div>
            </form>
        </div>
    </div>  
</div>  
@endsection