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
        This is RYNStore Category Panel
      </p>
    </div>
    <div class="dashboard-content">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <a href="{{ route('category.create') }}" class="btn btn-primary mb-3">
                + Add New Category
              </a>
              <div class="table-responsive">
                <table class="table table-hover scroll-horizontal-vertical w-100 mt-3" id="crudTable">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Slug</th>
                      <th>Photo</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('addon-script')
<script>
  // AJAX DataTable
  var datatable = $('#crudTable').DataTable({
    processing: true,
    serverSide: true,
    ordering: true,
    ajax: {
      url: '{!! url()->current() !!}'
    },
    columns: [
      {data: 'id', name: 'id'},
      {data: 'name', name: 'name'},
      {data: 'photo', name: 'photo'},
      {data: 'slug', name: 'slug'},
      
      {
        data: 'action',
        name: 'action',
        orderable: false,
        searcable: false,
        width: '15%'
      },
    ]
  });
</script>
@endpush