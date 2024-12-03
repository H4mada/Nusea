@extends('layouts.dashboard')

@section('title')
  Account Settings
@endsection

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
  <div class="container-fluid">
    <div class="dashboard-heading">
      <h2 class="dashboard-title">My Account</h2>
      <p class="dashboard-subtitle">Update your current profile</p>
    </div>
    <div class="dashboard-content">
      <div class="row">
        <div class="col-12">
          <form action="{{ route('dashboard-settings-redirect','dashboard-settings-account') }}" method="POST" id="locations" enctype="multipart/form-data">
          @csrf
            <div class="card">
              <div class="card-body">
                <div class="row mb-2">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="name">Your Name</label>
                      <input
                        type="text"
                        class="form-control"
                        id="name"
                        name="name"
                        value="{{ $user->name }}"
                      />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="email">Your Email</label>
                      <input
                        type="email"
                        class="form-control"
                        id="email"
                        name="email"
                        value="{{ $user->email }}"
                      />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="address_one">Address 1</label>
                      <input
                        type="text"
                        class="form-control"
                        id="address_one"
                        name="address_one"
                        value="{{ $user->address_one }}"
                      />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="address_two">Address 2</label>
                      <input
                        type="text"
                        class="form-control"
                        id="address_two"
                        name="address_two"
                        value="{{ $user->address_two }}"
                      />
                    </div>
                  </div>
                  <!-- Province -->
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="provinces_id">Province</label>
                      <select name="provinces_id" id="provinces_id" class="form-control" v-if="provinces" v-model="provinces_id">
                        <option disabled value="">Select Province</option>
                        <option v-for="province in provinces" :key="province.id" :value="province.id">@{{ province.name }}</option>
                      </select>
                      <p v-else>Loading provinces...</p>
                    </div>
                  </div>

                  <!-- City -->
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="regencies_id">City</label>
                      <select name="regencies_id" id="regencies_id" class="form-control" v-if="regencies" v-model="regencies_id">
                        <option disabled value="">Select City</option>
                        <option v-for="regency in regencies" :key="regency.id" :value="regency.id">@{{ regency.name }}</option>
                      </select>
                      <p v-else>Loading cities...</p>
                    </div>
                  </div>

                  <!-- Zip code and other fields -->
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="zip_code">Kode Pos</label>
                      <input
                        type="text"
                        class="form-control"
                        id="zip_code"
                        name="zip_code"
                        value="{{ $user->zip_code }}"
                      />
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="phone_number">Nomor Handphone</label>
                    <input
                      type="phone_number"
                      class="form-control"
                      id="phone_number"
                      name="phone_number"
                      value="{{ $user->phone_number }}"
                    />
                  </div>
                </div>
                <div class="row">
                  <div class="col text-right">
                    <button
                      type="submit"
                      class="btn btn-success px-5"
                    >
                      Save Now
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script src="https://unpkg.com/vue-toasted"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
      var locations = new Vue({
        el: "#locations",
        mounted() {
          AOS.init();
          this.getProvincesData();
        },
        data: {
          provinces: null,
          regencies: null,
          provinces_id: "{{ $user->provinces_id }}",  // Set default province id from the user model
          regencies_id: "{{ $user->regencies_id }}",  // Set default regency id from the user model
        },
        methods: {
          getProvincesData() {
            var self = this;
            axios
              .get('{{ route('api-provinces') }}')
              .then(function (response) {
                self.provinces = response.data;
                console.log("Provinces:", response.data);
                if (self.provinces_id) {
                  self.getRegenciesData(); // Fetch cities if province is already selected
                }
              })
              .catch(function (error) {
                console.log("Error fetching provinces:", error);
              });
          },
          getRegenciesData() {
            var self = this;
            axios
              .get('{{ url('api/regencies') }}/' + self.provinces_id)
              .then(function (response) {
                self.regencies = response.data;
                console.log("Cities:", response.data);
              })
              .catch(function (error) {
                console.log("Error fetching cities:", error);
              });
          },
        },
        watch: {
          provinces_id(val, oldVal) {
            this.regencies_id = null;
            this.getRegenciesData();
          },
        },
      });
    </script>
@endpush
