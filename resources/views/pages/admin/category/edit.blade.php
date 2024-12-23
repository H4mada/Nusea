@extends('layouts.admin')

@section('title')
    Edit Category
@endsection

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
  <div class="container-fluid">
    <div class="dashboard-heading text-center mb-4">
      <h2 class="dashboard-title">Edit Category</h2>
      <p class="dashboard-subtitle">
        Update your category details
      </p>
    </div>
    <div class="dashboard-content">
      <div class="row justify-content-center">
        <div class="col-md-8">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Edit Category Form</h4>
                    <a href="{{ route('category.index') }}" class="btn btn-light btn-sm">
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ route('category.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="name">Category Name</label>
                            <input
                                type="text"
                                class="form-control"
                                id="name"
                                name="name"
                                value="{{ $item->name }}"
                                required
                            />
                        </div>
                        <div class="form-group">
                            <label for="photos">Foto</label>
                            <input
                                type="file"
                                class="form-control-file"
                                id="photos"
                                name="photos"
                            />
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-success px-5">
                                Save Now
                            </button>
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
