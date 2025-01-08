@extends('layouts.app')

@section('title')
  Store Detail Page
@endsection

@section('content')
<div class="page-content page-details">
      <section
        class="store-breadcrumbs"
        data-aos="fade-down"
        data-aos-delay="100"
      >
        <div class="container">
          <div class="row">
            <div class="col-12">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">
                    Product Details
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>

      <section class="store-gallery mb-3" id="gallery">
        <div class="container">
          <div class="row">
            <div class="col-lg-8" data-aos="zoom-in">
              <transition name="slide-fade" mode="out-in">
                <img
                  :key="photos[activePhoto].id"
                  :src="photos[activePhoto].url"
                  class="w-100 main-image"
                  alt=""
                />
              </transition>
            </div>
            <div class="col-lg-2">
              <div class="row">
                <div
                  class="col-3 col-lg-12 mt-2 mt-lg-0"
                  v-for="(photo, index) in photos"
                  :key="photo.id"
                  data-aos="zoom-in"
                  data-aos-delay="100"
                >
                  <a href="#" @click="changeActive(index)">
                    <img
                      :src="photo.url"
                      class="w-100 thumbnail-image"
                      :class="{ active: index == activePhoto }"
                      alt=""
                    />
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <div class="store-details-container" data-aos="fade-up">
        <section class="store-heading">
          <div class="container">
            <div class="row">
              <div class="col-lg-8">
                {{-- memanggil data product --}}
                <h1>{{ $product->name }}</h1>
                {{-- memanggil data user dari nama store nya --}}
                <div class="owner">By {{ $product->user->store_name }}</div>
                <div class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
            </div>
            
              <div class="col-lg-2" data-aos="zoom-in">
                @auth
                    <form action="{{ route('detail-add', $product->id) }}" method="POST" enctype="multipart/form-data">
                        {{-- @csrf untuk bisa mengirim form --}}
                        @csrf
                        <button
                            type="submit"
                            class="btn btn-success nav-linkwhite px-4 btn-block mb-3"
                            href="{{ route('detail-add', $product->id) }}">
                                Add to Cart
                        </button>
                    </form>
                @else
                    <a
                        class="btn btn-success nav-linkwhite px-4 btn-block mb-3"
                        href="{{ route('login') }}">
                        Sign in to Add
                    </a>
                @endauth

              </div>
            </div>
          </div>
        </section>

        <section class="store-description">
          <div class="container">
            <div class="row">
              <div class="col-12 col-lg-8">
                {!! $product->description !!}
              </div>
            </div>
          </div>
        </section>


        <section class="store-review">
          <div class="container">
            <div class="row">
              <div class="col-12 col-lg-8 mt-3 mb-3">
                <h5>Customer Review (3)</h5>
              </div>
            </div>
            <div class="row">
              <div class="col-12 col-lg-8">
                <ul class="list-unstyled">
                  <li class="media">
                    <img
                      src="/images/icon-testimonial-1.png"
                      class="mr-3 rounded-circle"
                      alt=""
                    />
                    <div class="media-body">
                      <h5 class="mt-2 mb-1">Siti A., Jakarta</h5>
                      Saya sangat puas dengan produk ikan segar dari Nusea!
                      Saya memesan ikan tongkol dan udang, dan kualitasnya benar-benar luar biasa.
                      Ikannya segar, bersih, dan sampai dengan kondisi dingin seperti baru diambil dari laut.
                      Anak-anak saya suka sekali! Pengiriman juga cepat, dan packaging-nya rapi banget.
                      Pasti saya akan pesan lagi. Terima kasih Nusea!
                    </div>
                  </li>
                  <li class="media my-4">
                    <img
                      src="/images/icon-testimonial-2.png"
                      class="mr-3 rounded-circle"
                      alt=""
                    />
                    <div class="media-body">
                      <h5 class="mt-2 mb-1">Anna S., Bandung</h5>
                      Saya mencoba kerang hijau dan cumi-cumi dari Nusea, dan kualitasnya sesuai ekspektasi. 
                      Kerangnya masih segar dan dagingnya tebal. Walaupun ada sedikit delay di pengiriman karena cuaca buruk, 
                      tim customer service-nya sangat responsif dan membantu. Overall, pengalaman belanja di Nusea memuaskan,
                      dan saya akan merekomendasikan ke teman-teman saya.
                    </div>
                  </li>
                  <li class="media">
                    <img
                      src="/images/icon-testimonial-3.png"
                      class="mr-3 rounded-circle"
                      alt=""
                    />
                    <div class="media-body">
                      <h5 class="mt-2 mb-1"> Maria L., Surabaya</h5>
                      Udang vaname dari Nusea benar-benar juara! Ukurannya besar-besar, 
                      rasanya manis alami, dan sangat mudah diolah. Saya juga suka sekali 
                      dengan transparansi informasi mereka tentang asal produk. Sangat cocok 
                      untuk bisnis catering saya. Pesanan saya sampai tepat waktu dengan kemasan yang aman,
                      sehingga kualitasnya tetap terjaga. Mantap sekali, Nusea!
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </section>

      </div>
    </div>

      {{-- <section class="store-trend-categories">
        <div class="container">
          <div class="row">
            <div class="col-12" data-aos="fade-up">
              <h5>All Categories</h5>
            </div>
          </div>
          <div class="row">
            <div
              class="col-6 col-md-3 col-lg-2"
              data-aos="fade-up"
              data-aos-delay="100"
            >
              <a class="component-categories d-block" href="#">
                <div class="categories-image">
                  <img
                    src="/images/categories-gadgets.svg"
                    alt="Gadgets Categories"
                    class="w-100"
                  />
                </div>
                <p class="categories-text">
                  Gadgets
                </p>
              </a>
            </div>
            <div
              class="col-6 col-md-3 col-lg-2"
              data-aos="fade-up"
              data-aos-delay="200"
            >
              <a class="component-categories d-block" href="#">
                <div class="categories-image">
                  <img
                    src="/images/categories-furniture.svg"
                    alt="Furniture Categories"
                    class="w-100"
                  />
                </div>
                <p class="categories-text">
                  Furniture
                </p>
              </a>
            </div>
            <div
              class="col-6 col-md-3 col-lg-2"
              data-aos="fade-up"
              data-aos-delay="300"
            >
              <a class="component-categories d-block" href="#">
                <div class="categories-image">
                  <img
                    src="/images/categories-makeup.svg"
                    alt="Makeup Categories"
                    class="w-100"
                  />
                </div>
                <p class="categories-text">
                  Makeup
                </p>
              </a>
            </div>
            <div
              class="col-6 col-md-3 col-lg-2"
              data-aos="fade-up"
              data-aos-delay="400"
            >
              <a class="component-categories d-block" href="#">
                <div class="categories-image">
                  <img
                    src="/images/categories-sneaker.svg"
                    alt="Sneaker Categories"
                    class="w-100"
                  />
                </div>
                <p class="categories-text">
                  Sneaker
                </p>
              </a>
            </div>
            <div
              class="col-6 col-md-3 col-lg-2"
              data-aos="fade-up"
              data-aos-delay="500"
            >
              <a class="component-categories d-block" href="#">
                <div class="categories-image">
                  <img
                    src="/images/categories-tools.svg"
                    alt="Tools Categories"
                    class="w-100"
                  />
                </div>
                <p class="categories-text">
                  Tools
                </p>
              </a>
            </div>
            <div
              class="col-6 col-md-3 col-lg-2"
              data-aos="fade-up"
              data-aos-delay="600"
            >
              <a class="component-categories d-block" href="#">
                <div class="categories-image">
                  <img
                    src="/images/categories-baby.svg"
                    alt="Baby Categories"
                    class="w-100"
                  />
                </div>
                <p class="categories-text">
                  Baby
                </p>
              </a>
            </div>
          </div>
        </div>
      </section> --}}

      {{-- <section class="store-new-products">
        <div class="container">
          <div class="row">
            <div class="col-12" data-aos="fade-up">
              <h5>All Products</h5>
            </div>
          </div>
          <div class="row">
            <div
              class="col-6 col-md-4 col-lg-3"
              data-aos="fade-up"
              data-aos-delay="100"
            >
              <a class="component-products d-block" href="/details.html">
                <div class="products-thumbnail">
                  <div
                    class="products-image"
                    style="
                      background-image: url('/images/products-apple-watch.jpg');
                    "
                  ></div>
                </div>
                <div class="products-text">
                  Apple Watch 4
                </div>
                <div class="products-price">
                  $890
                </div>
              </a>
            </div>
            <div
              class="col-6 col-md-4 col-lg-3"
              data-aos="fade-up"
              data-aos-delay="200"
            >
              <a class="component-products d-block" href="/details.html">
                <div class="products-thumbnail">
                  <div
                    class="products-image"
                    style="
                      background-image: url('/images/products-orange-bogotta.jpg');
                    "
                  ></div>
                </div>
                <div class="products-text">
                  Orange Bogotta
                </div>
                <div class="products-price">
                  $94,509
                </div>
              </a>
            </div>
            <div
              class="col-6 col-md-4 col-lg-3"
              data-aos="fade-up"
              data-aos-delay="300"
            >
              <a class="component-products d-block" href="/details.html">
                <div class="products-thumbnail">
                  <div
                    class="products-image"
                    style="
                      background-image: url('/images/products-sofa-ternyaman.jpg');
                    "
                  ></div>
                </div>
                <div class="products-text">
                  Sofa Ternyaman
                </div>
                <div class="products-price">
                  $1,409
                </div>
              </a>
            </div>
            <div
              class="col-6 col-md-4 col-lg-3"
              data-aos="fade-up"
              data-aos-delay="400"
            >
              <a class="component-products d-block" href="/details.html">
                <div class="products-thumbnail">
                  <div
                    class="products-image"
                    style="
                      background-image: url('/images/products-bubuk-maketti.jpg');
                    "
                  ></div>
                </div>
                <div class="products-text">
                  Bubuk Maketti
                </div>
                <div class="products-price">
                  $225
                </div>
              </a>
            </div>
            <div
              class="col-6 col-md-4 col-lg-3"
              data-aos="fade-up"
              data-aos-delay="500"
            >
              <a class="component-products d-block" href="/details.html">
                <div class="products-thumbnail">
                  <div
                    class="products-image"
                    style="
                      background-image: url('/images/products-tatakan-gelas.jpg');
                    "
                  ></div>
                </div>
                <div class="products-text">
                  Tatakan Gelas
                </div>
                <div class="products-price">
                  $45,184
                </div>
              </a>
            </div>
            <div
              class="col-6 col-md-4 col-lg-3"
              data-aos="fade-up"
              data-aos-delay="600"
            >
              <a class="component-products d-block" href="/details.html">
                <div class="products-thumbnail">
                  <div
                    class="products-image"
                    style="
                      background-image: url('/images/products-mavic-kawe.jpg');
                    "
                  ></div>
                </div>
                <div class="products-text">
                  Mavic Kawe
                </div>
                <div class="products-price">
                  $503
                </div>
              </a>
            </div>
            <div
              class="col-6 col-md-4 col-lg-3"
              data-aos="fade-up"
              data-aos-delay="700"
            >
              <a class="component-products d-block" href="/details.html">
                <div class="products-thumbnail">
                  <div
                    class="products-image"
                    style="
                      background-image: url('/images/products-black-edition-nike.jpg');
                    "
                  ></div>
                </div>
                <div class="products-text">
                  Black Edition Nike
                </div>
                <div class="products-price">
                  $70,482
                </div>
              </a>
            </div>
            <div
              class="col-6 col-md-4 col-lg-3"
              data-aos="fade-up"
              data-aos-delay="800"
            >
              <a class="component-products d-block" href="/details.html">
                <div class="products-thumbnail">
                  <div
                    class="products-image"
                    style="
                      background-image: url('/images/products-monkey-toys.jpg');
                    "
                  ></div>
                </div>
                <div class="products-text">
                  Monkey Toys
                </div>
                <div class="products-price">
                  $783
                </div>
              </a>
            </div>
          </div>
        </div>
      </section> --}}

    </div>
@endsection

@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script>
      var gallery = new Vue({
        el: "#gallery",
        mounted() {
          AOS.init();
        },
        data: {
          activePhoto: 0,
          photos: [
            @foreach ($product->galleries as $gallery)
                {
                    id: {{ $gallery->id }},
                    url: "{{ Storage::url($gallery->photos) }}",
                },
            @endforeach
          ],
        },
        methods: {
          changeActive(id) {
            this.activePhoto = id;
          },
        },
      });
    </script>
@endpush
