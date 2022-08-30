@extends('templates.based')

@section('title', 'Add Items | Admin Backpacker')

@section('content')
    <div class="container-fluid w-75">
      <h1>Add Item Page</h1>
      <form action="/items/add" method="POST">
        @csrf
        <div class="form-group">
          <label for="email">Name</label>
          <input name="name" value="{{ old('name') }}" type="text" class="form-control" id="email" aria-describedby="nameError" placeholder="Enter item name">
          @error('name')
            <small id="nameError" class="form-text text-danger">{{ $message }}</small>
          @enderror
        </div>
        <div class="form-group">
          <label for="price">Price</label>
          <input name="price" value="{{ old('price') }}" type="number" class="form-control" id="price" aria-describedby="priceError" placeholder="Enter item price">
          @error('price')
            <small id="priceError" class="form-text text-danger">{{ $message }}</small>
          @enderror
        </div>
        <div class="form-group">
          <label for="stock">Stock</label>
          <input name="stock" type="number" value="{{ old('stock') }}" class="form-control" id="stock" aria-describedby="stockError" placeholder="Enter item stock">
          @error('stock')
            <small id="stockError" class="form-text text-danger">{{ $message }}</small>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary">Add Item</button>
      </form>
    </div>
@endsection