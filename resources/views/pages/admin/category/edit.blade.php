@extends('layouts.admin')

@section('title')
    Category
@endsection

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
  <div class="container-fluid">
    <div class="dashboard-heading">
      <h2 class="dashboard-title">Category</h2>
      <p class="dashboard-subtitle">
        This is RYNStore Edit Category Panel
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
                    <form action="{{ route('category.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        {{-- PUT adalah method edit data dan mengirim semua data --}}
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                <label>Name Kategori</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="name"
                                    value="{{ $item->name }}"
                                    required
                                />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                <label>Foto</label>
                                <input
                                    type="file"
                                    class="form-control"
                                    name="photo"
                                />
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