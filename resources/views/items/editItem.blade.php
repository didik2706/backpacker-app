@extends('templates.based')

@section('title', 'Edit Items | Admin Backpacker')

@section('content')
    <div class="container-fluid w-75">
      <h1>Edit Item Page</h1>
      <form action="/items/edit" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $data->id }}">
        <div class="form-group">
          <label for="email">Name</label>
          <input name="name" value="{{ $data->name }}" type="text" class="form-control" id="email" aria-describedby="nameError" placeholder="Enter item name">
          @error('name')
            <small id="nameError" class="form-text text-danger">{{ $message }}</small>
          @enderror
        </div>
        <div class="form-group">
          <label for="price">Price</label>
          <input name="price" value="{{ $data->price }}" type="number" class="form-control" id="price" aria-describedby="priceError" placeholder="Enter item price">
          @error('price')
            <small id="priceError" class="form-text text-danger">{{ $message }}</small>
          @enderror
        </div>
        <div class="form-group">
          <label for="stock">Stock</label>
          <input name="stock" type="number" value="{{ $data->stock }}" class="form-control" id="stock" aria-describedby="stockError" placeholder="Enter item stock">
          @error('stock')
            <small id="stockError" class="form-text text-danger">{{ $message }}</small>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary">Edit Item</button>
      </form>
    </div>
@endsection