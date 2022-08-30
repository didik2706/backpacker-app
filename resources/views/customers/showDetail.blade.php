@extends('templates.based')

@section('title', 'Detail Customer | Admin Backpacker')
    
@section('content')
    <div class="container-fluid">
      <h1>Info Customer</h1>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/customers">Customers</a></li>
          <li class="breadcrumb-item active" aria-current="page">Detail</li>
        </ol>
      </nav>
      <div class="row">
        <div class="col-6">
          <h5 class="text-dark text-bold">Name</h5>
          <p>{{ $data->name }}</p>
          <h5 class="text-dark text-bold">Phone Number</h5>
          <p>{{ $data->phone_number }}</p>
          <h5 class="text-dark text-bold">Type Identity</h5>
          @if ($data->type_identity == "ktp")
              <p>Kartu Tanda Penduduk</p>
          @endif
          @if ($data->type_identity == "kp")
              <p>Kartu Pelajar</p>
          @endif
          @if ($data->type_identity == "sim")
              <p>Surat Izin Mengemudi</p>
          @endif
          @if ($data->type_identity == "ka")
              <p>Kartu Anggota</p>
          @endif
          <img src="{{ asset($data->image_identity) }}" alt="" class="img-thumbnail">
        </div>
        <div class="col-6">
          <h5 class="text-dark text-bold">Photo</h5>
          <img src="{{ asset($data->photo) }}" alt="..." class="img-thumbnail">
        </div>
      </div>
    </div>
@endsection