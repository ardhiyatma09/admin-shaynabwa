@extends('layouts.default')

@section('title')
    Tambah Foto Barang
@endsection

@section('content')
<div class="content">
    <div class="card">
        <div class="card-header">
            <strong>Tambah Foto Barang</strong>
        </div>
        <div class="card-body card-block">
            <form action="{{route('photo.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name" class="form-control-label">Nama Barang</label>
                    <select name="products_id" class="form-control @error('products_id') is-invalid @enderror">
                        @foreach ($products as $product)
                        @if (old('products_id') == $product->id)
                        <option value="{{$product->id}}" selected>{{$product->name}}</option>
                        @else
                        <option value="{{$product->id}}">{{$product->name}}</option>
                        @endif
                        @endforeach
                    </select>
                    @error('name')
                    <div class="text-muted">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="photo" class="form-control-label">Foto Barang</label>
                    <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror" value="{{old('photo')}}" accept="image/*" required>
                    @error('photo')
                    <div class="text-muted">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class=" form-control-label mr-3">Jadikan Default</label>
                    <div class="form-check-inline form-check">
                        <label for="inline-radio1" class="form-check-label mr-2">
                            <input type="radio" id="inline-radio1" name="is_default" value="1" class="form-check-input @error('is_default') is-invalid @enderror">Ya
                        </label>
                        <label for="inline-radio2" class="form-check-label ">
                            <input type="radio" id="inline-radio2" name="is_default" value="0" class="form-check-input @error('is_default') is-invalid @enderror">Tidak
                        </label>
                    </div>
                    @error('is_default')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Tambahkan Foto Barang</button>
                </div>
            </form>
        </div>
    </div>  
</div>  
@endsection