@extends('layouts.default')

@section('title')
    Edit Barang
@endsection

@section('content')
<div class="content">
    <div class="card">
        <div class="card-header">
            <strong>Edit Barang</strong>
            <small class="text-muted"> - {{$product->name}}</small>
        </div>
        <div class="card-body card-block">
            <form action="{{route('products.update',$product->id)}}" method="post">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="name" class="form-control-label">Nama Barang</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name') ? old('name') : $product->name}}">
                    @error('name')
                    <div class="text-muted">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="type" class="form-control-label">Tipe Barang</label>
                    <input type="text" name="type" class="form-control @error('type') is-invalid @enderror" value="{{old('type') ? old('type') : $product->type}}">
                    @error('type')
                    <div class="text-muted">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description" class="form-control-label">Deskripsi Barang</label>
                    <textarea name="description" cols="30" rows="10" class="form-control ckeditor @error('description') is-invalid @enderror">{{old('description') ? old('description') : $product->description}}</textarea>
                    @error('description')
                    <div class="text-muted">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="price" class="form-control-label">Harga Barang</label>
                            <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" value="{{old('price') ? old('price') : $product->price}}">
                            @error('price')
                            <div class="text-muted">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="quantity" class="form-control-label">Stock Barang</label>
                            <input type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{old('quantity') ? old('quantity') : $product->quantity}}">
                            @error('quantity')
                            <div class="text-muted">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Edit Barang</button>
                </div>
            </form>
        </div>
    </div>  
</div>  
@endsection