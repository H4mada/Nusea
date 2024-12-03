@extends('layouts.admin')

@section('title')
    Product
@endsection

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
  <div class="container-fluid">
    <div class="dashboard-heading">
      <h2 class="dashboard-title">Product</h2>
      <p class="dashboard-subtitle">
        This is Admin Create New Product Panel
      </p>
    </div>
    <div class="dashboard-content">
      <div class="row">
        <div class="col-md-12">
            {{-- Membuat validasi error dengan menggunakan blade template laravel --}}
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                <label>Name Product</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="name"
                                    required
                                />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                <label>Pemilik Product</label>
                                <select name="users_id" class="form-control">
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Kategori Product</label>
                                    <select name="categories_id" class="form-control">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Harga Product</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="price"
                                        id="price"
                                        required
                                        oninput="formatPrice()"
                                    />
                                </div>
                                
                                <script>
                                    function formatPrice() {
                                        let priceInput = document.getElementById('price');
                                        let value = priceInput.value;
                                
                                        // Remove non-numeric characters except for the last digit
                                        value = value.replace(/[^0-9]/g, "");
                                
                                        // Format number with commas
                                        if (value) {
                                            value = "Rp " + value.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                        }
                                
                                        // Set the formatted value back to the input
                                        priceInput.value = value;
                                    }
                                
                                    // When the form is submitted, extract the raw number from the input
                                    document.querySelector("form").addEventListener("submit", function(e) {
                                        let priceInput = document.getElementById('price');
                                        let value = priceInput.value;
                                
                                        // Remove "Rp" and commas before submitting the form
                                        value = value.replace(/[^0-9]/g, "");
                                        
                                        priceInput.value = value;  // Update the price input to just the integer value
                                    });
                                </script>
                                
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                <label>Deskripsi Product</label>
                                <textarea name="description" id="editor"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row"></div>
                            <div class="col text-right">
                                <button
                                    type="submit"
                                    class="btn btn-success px-5">
                                    Save Now
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('addon-script')
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>
    <script>
        // Initialize CKEditor
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
