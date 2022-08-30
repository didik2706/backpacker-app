@extends('templates.based')

@section('title', 'List Orders | Admin Backpacker')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Items</h1>
      </div>

      <!-- Content Row -->
      <a href="/orders/add" class="btn btn-outline-primary">Add Item</a>
      <br><br>
      <table class="table">
          <thead class="bg-primary text-light">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Status</th>
              <th scope="col">Borrow Date</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @if (count($data) == 0)
                <tr>
                  <td colspan="5" class="text-center">Order is empty</td>
                </tr>
            @else
              @foreach ($data as $order)
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $order->customer->name }}</td>
                  <td>
                    @switch($order->status)
                        @case("accepted")
                          <span class="badge badge-primary"><i class="fas fa-truck-pickup"></i> {{ $order->status }}</span>
                          @break
                        @case("returned")
                          <span class="badge badge-success"><i class="fas fa-check">{{ $order->status }}</span>
                          @break
                        @default
                          <span class="badge badge-danger"><i class="fas fa-exclamation">{{ $order->status }}</span>
                    @endswitch
                    <span class="badge"></span>
                  </td>
                  <td>{{ $order->borrow_date }}</td>
                  <td>
                      <a href="/items/edit/{{ $order->id }}" class="badge badge-primary">edit</a>
                      <a href="/items/delete/{{ $order->id }}" class="badge badge-danger delete">delete</a>
                  </td>
                </tr>
              @endforeach
            @endif
          </tbody>  
      </table>

      {{-- <nav aria-label="...">
        <ul class="pagination">
          <li class="page-item {{ ($data->currentPage() == 1) ? "disabled" : "" }}">
            <a class="page-link" href="?page={{ $data->currentPage() - 1 }}" tabindex="-1">Previous</a>
          </li>
          @for ($i = 1; $i <= $data->lastPage(); $i++)
            <li class="page-item {{ ($i == $data->currentPage()) ? "active" : "" }}"><a class="page-link" href="?page={{$i}}">{{ $i }}</a></li>
          @endfor
          <li class="page-item  {{ ($data->currentPage() == $data->lastPage()) ? "disabled" : "" }}">
            <a class="page-link" href="?page={{ $data->currentPage() + 1 }}">Next</a>
          </li>
        </ul>
      </nav> --}}
  </div>
<!-- /.container-fluid -->
@endsection