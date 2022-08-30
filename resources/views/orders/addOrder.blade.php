@extends('templates.based')

@section('title', 'Add Order | Admin Backpacker')

@section('content')
    <div class="container-fluid w-75" style="overflow: scroll">
      <h1>Add Order</h1>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/orders">Orders</a></li>
          <li class="breadcrumb-item active" aria-current="page">Add</li>
        </ol>
      </nav>
      <form action="" method="post">
        @csrf
        <div class="form-group">
          
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Borrow Date</label>
          <input type="date" name="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Return Date</label>
          <input type="date" name="date2" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <hr>
        <table class="table h-50" style="overflow: scroll; height: 10px;">
          <thead class="bg-primary text-light">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Price</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @if (count($data) == 0)
                <tr>
                  <td colspan="5" class="text-center">Item is empty</td>
                </tr>
            @else
              @foreach ($data as $item)
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $item->name }}</td>
                  <td>{{ "Rp. " . number_format($item->price, 2) }}</td>
                  <td>
                    <div class="form-check">
                      <input class="form-check-input" name="check[]" type="checkbox" value="{{ $item->id }}" id="defaultCheck1">
                      <input type="number" name="qty[]" id="qty" class="form-control">
                    </div>
                  </td>
                </tr>
              @endforeach
            @endif
          </tbody>  
        </table>
        <button class="btn btn-primary" type="submit">Add Order</button>
      </form>
    </div>
@endsection

@section('scripts')
<script>
  $(document).ready(function() {
    $('.js-example-basic-single').select2({
      dropdownCssClass: "form-control",
      placeholder: "Choose Item"
    });
  });
</script>
@endsection