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
        This is  Edit Product Panel
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
                    <form action="{{ route('product.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        {{-- PUT adalah method edit data dan mengirim semua data --}}
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                <label>Name Product</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="name"
                                    value = "{{ $item->name }}"
                                    required
                                />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                <label>Pemilik Product</label>
                                <select name="users_id" class="form-control">
                                    <option value="{{ $item->users_id }}" selected>{{ $item->user->name }}</option>
                                    {{-- Menampilkan data yang sudah ada --}}
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
                                        <option value="{{ $item->categories_id }}" selected>{{ $item->category->name }}</option>
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
                                    type="number"
                                    class="form-control"
                                    name="price"
                                    value = "{{ $item->price }}"
                                    required
                                />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                <label>Deskripsi Product</label>
                                <textarea name="description" id="editor">{!! $item->description !!}</textarea>
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
    <script src="https://cdn.tiny.cloud/1/js55li8bx72ucrxjjzz7zy74gwkcznzbx8x18ny8j09ncg30/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#editor',
            menubar: true,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
        });
    </script>
@endpush
