@extends('templates.based')

@section('title', 'Add Customer | Admin Backpacker')

@section('content')
    <div class="container-fluid w-75 mb-5">
      <h1>Add Customer Page</h1>
      <form action="/customers/add" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="name">Name</label>
          <input name="name" value="{{ old('name') }}" type="text" class="form-control" id="name" aria-describedby="nameError" placeholder="Enter customer name">
          @error('name')
            <small id="nameError" class="form-text text-danger">{{ $message }}</small>
          @enderror
        </div>
        <div class="form-group">
          <label for="address">Address</label>
          <input name="address" value="{{ old('address') }}" type="text" class="form-control" id="address" aria-describedby="addressError" placeholder="Enter customer address">
          @error('address')
            <small id="addressError" class="form-text text-danger">{{ $message }}</small>
          @enderror
        </div>
        <div class="form-group">
          <label for="phoneNumber">Phone Number</label>
          <input name="phone_number" value="{{ old('phone_number') }}" type="text" class="form-control" id="phoneNumber" aria-describedby="phoneNumberError" placeholder="Enter customer phone number">
          @error('phone_number')
            <small id="phoneNumberError" class="form-text text-danger">{{ $message }}</small>
          @enderror
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Type Identity</label>
          <select class="form-control" name="type_identity" id="exampleFormControlSelect1" aria-describedby="typeIdentityError">
            <option selected>Choose Type Identity</option>
            <option value="ktp">Kartu Tanda Penduduk (KTP)</option>
            <option value="kp">Kartu Pelajar (KP)</option>
            <option value="sim">Surat Izin Mengemudi (SIM)</option>
            <option value="ka">Kartu Anggota (KA)</option>
          </select>
          @error('type_identity')
            <small id="typeIdentityError" class="form-text text-danger">{{ $message }}</small>
          @enderror
        </div>
        <div class="form-group">
          <label>Image Identity</label>
          <div class="custom-file">
            <input type="file" name="image_identity" class="custom-file-input type-identity" id="image_identity" aria-describedby="imageIdentityError">
            <label class="custom-file-label type-identity-label" for="image_identity">Choose Image Identity</label>
          </div>
          @error('image_identity')
            <small id="imageIdentityError" class="form-text text-danger">{{ $message }}</small>
          @enderror
        </div>
        <div class="form-group">
          <label>Photo</label>
          <div class="custom-file">
            <input type="file" name="photo" class="custom-file-input photo" id="photo" aria-describedby="photoError">
            <label class="custom-file-label photo-label" for="photo">Choose Photo</label>
          </div>
          @error('photo')
            <small id="photoError" class="form-text text-danger">{{ $message }}</small>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary">Add Customer</button>
      </form>
    </div>
@endsection

@section('scripts')
    <script>
      $(document).ready(function() {
        $(".type-identity").change(function(e) {
          $('.type-identity-label').html(e.target.files[0].name)
        });

        $(".photo").change(function(e) {
          $('.photo-label').html(e.target.files[0].name)
        });
      });
    </script>
@endsection