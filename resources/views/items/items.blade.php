@extends('templates.based')

@section('title', 'List Items | Admin Backpacker')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Items</h1>
      </div>

      <!-- Content Row -->
      <a href="/items/add" class="btn btn-outline-primary">Add Item</a>
      <br><br>
      <table class="table">
          <thead class="bg-primary text-light">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Price</th>
              <th scope="col">Stock</th>
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
                  <td>{{ $item->stock }}</td>
                  <td>
                      <a href="/items/edit/{{ $item->id }}" class="badge badge-primary">edit</a>
                      <a href="/items/delete/{{ $item->id }}" class="badge badge-danger delete">delete</a>
                  </td>
                </tr>
              @endforeach
            @endif
          </tbody>  
      </table>

      <nav aria-label="...">
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
      </nav>
  </div>
<!-- /.container-fluid -->
@endsection

@section('scripts')
    <script>
      $(document).ready(function() {
        $(".delete").on("click", function(e) {
          e.preventDefault();

          Swal.fire({
            title: 'Apa kamu yakin?',
            text: "Kamu akan menghapus item ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
              Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
              )
              setTimeout(() => {
                window.location.href = $(this).attr("href")
              }, 700);
            }
          })
        })
      })
    </script>
@endsection