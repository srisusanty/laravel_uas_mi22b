@extends('layouts.front')
@section('contents')
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('/cozas/images/bg-01.jpg');">
        <h2 class="ltext-105 cl0 txt-center">
            Shop
        </h2>
    </section>
    <div class="bg0 m-t-23 p-b-140">
        <div class="container">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="flex-w flex-sb-m p-b-52">

                <div class="flex-w flex-c-m m-tb-10">

                    <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
                        <i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
                        <i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                        Search
                    </div>
                </div>

                <!-- Search product -->
                <div class="dis-none panel-search w-full p-t-10 p-b-15">
                    <div class="bor8 dis-flex p-l-15">
                        <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                            <i class="zmdi zmdi-search"></i>
                        </button>
                        <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" id="search-product"
                            placeholder="Search">
                    </div>
                </div>

                <!-- Filter -->

            </div>

            <div class="row isotope-grid">
                {{-- {{ dd($wishlist) }} --}}
                @forelse($product as $key => $value)
                    {{-- <a href="{{ route('front.detailproduct', ['id' => $value->id]) }}"> --}}
                    <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-pic hov-img0">
                                <img src="{{ url($value->images->where('is_primary', 1)->first()->image_url) }}"
                                    alt="IMG-PRODUCT">

                                <button type="button"
                                    class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04"
                                    data-bs-toggle="modal" data-bs-target="#productModal{{ $value->id }}">
                                    Quick View
                                </button>
                            </div>

                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    <a href="{{ route('front.detailproduct', ['id' => $value->id]) }}"
                                        class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        {{ $value->name }}
                                    </a>

                                    <span class="stext-105 cl3">
                                        Rp. {{ number_format($value->price, 0, ',', '.') }}
                                    </span>
                                </div>

                                <div class="block2-txt-child2 flex-r p-t-3">
                                    <a href="{{ route('wishlist.store', $value->id) }}" class="">
                                        @if (in_array($value->id, array_column($value->wishlist->toArray(), 'product_id')))
                                            <img class="icon-heart1 dis-block trans-04"
                                                src="/cozas/images/icons/icon-heart-02.png" alt="ICON">
                                        @else
                                            <img class="icon-heart1 dis-block trans-04"
                                                src="/cozas/images/icons/icon-heart-01.png" alt="ICON">
                                        @endif
                                        {{-- <img class="icon-heart1 dis-block trans-04"
                                            src="/cozas/images/icons/icon-heart-01.png" alt="ICON">
                                        <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                            src="/cozas/images/icons/icon-heart-02.png" alt="ICON"> --}}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- </a> --}}
                    <!-- Modal for each product -->
                    <div class="modal fade" id="productModal{{ $value->id }}" tabindex="-1"
                        aria-labelledby="modalLabel{{ $value->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg" style="margin-top:7rem">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalLabel{{ $value->id }}">{{ $value->name }}
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <!-- Product Images -->
                                            <div class="col-md-6">
                                                <div id="carousel{{ $value->id }}" class="carousel slide"
                                                    data-bs-ride="carousel">
                                                    <div class="carousel-inner">
                                                        @if ($value->images->count() > 0)
                                                            @foreach ($value->images as $key => $image)
                                                                <div
                                                                    class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                                                    <img src="{{ url($image->image_url) }}"
                                                                        class="d-block w-100" alt="Product Image">
                                                                </div>
                                                            @endforeach
                                                        @else
                                                            <div class="carousel-item active">
                                                                <img src="/cozas/images/no-image.png" class="d-block w-100"
                                                                    alt="No Image">
                                                            </div>
                                                        @endif
                                                    </div>
                                                    @if ($value->images->count() > 1)
                                                        <button class="carousel-control-prev" type="button"
                                                            data-bs-target="#carousel{{ $value->id }}"
                                                            data-bs-slide="prev">
                                                            <span class="carousel-control-prev-icon"
                                                                aria-hidden="true"></span>
                                                            <span class="visually-hidden">Previous</span>
                                                        </button>
                                                        <button class="carousel-control-next" type="button"
                                                            data-bs-target="#carousel{{ $value->id }}"
                                                            data-bs-slide="next">
                                                            <span class="carousel-control-next-icon"
                                                                aria-hidden="true"></span>
                                                            <span class="visually-hidden">Next</span>
                                                        </button>
                                                    @endif
                                                </div>
                                            </div>

                                            <!-- Product Details -->
                                            <div class="col-md-6">
                                                <form action="{{ route('cart.store') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('POST')
                                                    <input type="hidden" name="product_id" value="{{ $value->id }}">

                                                    <h3>{{ $value->name }}</h3>
                                                    <!-- Update price and variant section in modal -->
                                                    <p class="fs-4 fw-bold mb-3" id="price{{ $value->id }}">
                                                        Rp. {{ number_format($value->price, 0, ',', '.') }}
                                                    </p>
                                                    <p class="mb-4">{{ $value->description }}</p>

                                                    <!-- Size Selection -->
                                                    {{-- <div class="mb-3">
                                                        <label class="form-label">Product variant</label>
                                                        <select class="form-select" name="variant"
                                                            id="variant{{ $value->id }}"
                                                            onchange="updatePrice({{ $value->id }}, {{ $value->price }}, this.value)">
                                                            <option value="">Choose variant</option>
                                                            @foreach ($value->variants as $variant)
                                                                <option value="{{ $variant->id }}"
                                                                    data-price-adjustment="{{ $variant->price_adjustment }}">
                                                                    {{ $variant->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div> --}}

                                                    <!-- Quantity -->
                                                    <div class="mb-4">
                                                        <label class="form-label">Quantity</label>
                                                        <div class="input-group">
                                                            <button class="btn btn-outline-secondary" type="button"
                                                                onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                                -
                                                            </button>
                                                            <input type="number" class="form-control text-center"
                                                                name="quantity" value="1" min="1"
                                                                max="{{ $value->stock }}" required>
                                                            <button class="btn btn-outline-secondary" type="button"
                                                                onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                                +
                                                            </button>
                                                        </div>
                                                    </div>

                                                    <!-- Add to Cart Button -->
                                                    <button type="submit" class="btn btn-primary w-100 mb-3">
                                                        Add to Cart
                                                    </button>
                                                </form>

                                                <!-- Social Sharing -->
                                                <div class="d-flex gap-2 mt-4 pt-3 border-top">
                                                    <button class="btn btn-outline-secondary">
                                                        <i class="fas fa-heart"></i>
                                                    </button>
                                                    <button class="btn btn-outline-secondary">
                                                        <i class="fab fa-facebook-f"></i>
                                                    </button>
                                                    <button class="btn btn-outline-secondary">
                                                        <i class="fab fa-twitter"></i>
                                                    </button>
                                                    <button class="btn btn-outline-secondary">
                                                        <i class="fab fa-google-plus-g"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>Wishlist is empty</p>
                @endforelse

            </div>

            <!-- Load more -->
            {{-- <div class="flex-c-m flex-w w-full p-t-45">
                <a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
                    Load More
                </a>
            </div> --}}
        </div>
    </div>
    <script>
        function updatePrice(productId, basePrice, variantId) {
            const select = document.getElementById('variant' + productId);
            const priceElement = document.getElementById('price' + productId);

            if (!select.value) {
                // If no variant is selected, show base price
                priceElement.textContent = 'Rp. ' + new Intl.NumberFormat('id-ID').format(basePrice);
                return;
            }

            // Get selected option
            const selectedOption = select.options[select.selectedIndex];
            const priceAdjustment = parseInt(selectedOption.getAttribute('data-price-adjustment')) || 0;

            // Calculate new price
            const newPrice = basePrice + priceAdjustment;

            // Update price display
            priceElement.textContent = 'Rp. ' + new Intl.NumberFormat('id-ID').format(newPrice);
        }
    </script>
    <script>
        // Event listener untuk mendeteksi perubahan pada input pencarian
        document.getElementById('search-product').addEventListener('input', function() {
            // Ambil nilai pencarian
            const searchTerm = this.value.toLowerCase();

            // Ambil semua elemen produk
            const products = document.querySelectorAll('.isotope-item');

            // Loop melalui setiap produk dan sembunyikan atau tampilkan berdasarkan pencarian
            products.forEach(function(product) {
                const productName = product.querySelector('.js-name-b2').textContent.toLowerCase();
                const productDescription = product.querySelector('.stext-105').textContent.toLowerCase();

                // Cek apakah nama atau deskripsi produk mengandung kata kunci pencarian
                if (productName.includes(searchTerm) || productDescription.includes(searchTerm)) {
                    product.style.display = ''; // Tampilkan produk
                } else {
                    product.style.display = 'none'; // Sembunyikan produk
                }
            });
        });
    </script>
@endsection
