<?php $__env->startSection('contents'); ?>

    <section class="section-slide">
        <div class="wrap-slick1">
            <div class="slick1">
                <?php $__empty_1 = true; $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="item-slick1" style="background-image: url(<?php echo e(url($value->image)); ?>);">
                        <div class="container h-full" style="margin-top: 5rem">
                            <div class="card border-0" style="background-color: rgba(255, 255, 255, 0.5); border-radius:20px">
                                <div class="card-body">
                                    <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                                        <div class="layer-slick1 animated visible-false" data-appear="fadeInDown"
                                            data-delay="0">
                                            <span class="ltext-101 cl2 respon2">
                                                <?php echo e($value->title); ?>

                                            </span>
                                        </div>

                                        <div class="layer-slick1 animated visible-false" data-appear="fadeInUp"
                                            data-delay="800">
                                            <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                                                <?php echo e($value->description); ?>

                                            </h2>
                                        </div>

                                        <div class="layer-slick1 animated visible-false" data-appear="zoomIn"
                                            data-delay="1600">
                                            <a href="<?php echo e($value->button_link); ?>"
                                                class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                                Shop Now
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p>No sliders available. Please add some sliders.</p>
                <?php endif; ?>





            </div>
        </div>
    </section>


    <!-- Banner -->
    <div class="sec-banner bg0 p-t-80 p-b-50">
        <div class="container">
            <?php if(session()->has('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo e(session('success')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
        </div>
    </div>


    <!-- Product -->
    <section class="bg0 p-t-23 p-b-140">
        <div class="container">
            <div class="p-b-10">
                <h3 class="ltext-103 cl5">
                    Product Overview
                </h3>
            </div>

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
            </div>

            <div class="row isotope-grid">

                <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <!-- Product Card -->

                    <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                        <div class="block2">
                            <div class="block2-pic hov-img0">
                                <?php if($value->images->count() > 0): ?>
                                    <?php $__currentLoopData = $value->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($image->is_primary == 1): ?>
                                            <img src="<?php echo e(url($image->image_url)); ?>" alt="IMG-PRODUCT">
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <img src="/cozas/images/no-image.png" alt="IMG-PRODUCT">
                                <?php endif; ?>

                                <!-- Button trigger modal -->
                                <button type="button"
                                    class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04"
                                    data-bs-toggle="modal" data-bs-target="#productModal<?php echo e($value->id); ?>">
                                    Quick View
                                </button>
                            </div>

                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l">
                                    <a href="<?php echo e(route('front.detailproduct', ['id' => $value->id])); ?>"
                                        class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        <?php echo e($value->name); ?>

                                    </a>
                                    <span class="stext-105 cl3">
                                        Rp. <?php echo e(number_format($value->price, 0, ',', '.')); ?>

                                    </span>
                                </div>

                                <div class="block2-txt-child2 flex-r p-t-3">
                                    <a href="<?php echo e(route('wishlist.store', $value->id)); ?>" class="">
                                        <?php if(in_array($value->id, array_column($value->wishlist->toArray(), 'product_id'))): ?>
                                            <img class="icon-heart1 dis-block trans-04"
                                                src="/cozas/images/icons/icon-heart-02.png" alt="ICON">
                                        <?php else: ?>
                                            <img class="icon-heart1 dis-block trans-04"
                                                src="/cozas/images/icons/icon-heart-01.png" alt="ICON">
                                        <?php endif; ?>
                                        
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal for each product -->
                    <div class="modal fade" id="productModal<?php echo e($value->id); ?>" tabindex="-1"
                        aria-labelledby="modalLabel<?php echo e($value->id); ?>" aria-hidden="true">
                        <div class="modal-dialog modal-lg" style="margin-top:5rem">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalLabel<?php echo e($value->id); ?>"><?php echo e($value->name); ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <!-- Product Images -->
                                            <div class="col-md-6">
                                                <div id="carousel<?php echo e($value->id); ?>" class="carousel slide"
                                                    data-bs-ride="carousel">
                                                    <div class="carousel-inner">
                                                        <?php if($value->images->count() > 0): ?>
                                                            <?php $__currentLoopData = $value->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <div
                                                                    class="carousel-item <?php echo e($key === 0 ? 'active' : ''); ?>">
                                                                    <img src="<?php echo e(url($image->image_url)); ?>"
                                                                        class="d-block w-100" alt="Product Image">
                                                                </div>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php else: ?>
                                                            <div class="carousel-item active">
                                                                <img src="/cozas/images/no-image.png"
                                                                    class="d-block w-100" alt="No Image">
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                    <?php if($value->images->count() > 1): ?>
                                                        <button class="carousel-control-prev" type="button"
                                                            data-bs-target="#carousel<?php echo e($value->id); ?>"
                                                            data-bs-slide="prev">
                                                            <span class="carousel-control-prev-icon"
                                                                aria-hidden="true"></span>
                                                            <span class="visually-hidden">Previous</span>
                                                        </button>
                                                        <button class="carousel-control-next" type="button"
                                                            data-bs-target="#carousel<?php echo e($value->id); ?>"
                                                            data-bs-slide="next">
                                                            <span class="carousel-control-next-icon"
                                                                aria-hidden="true"></span>
                                                            <span class="visually-hidden">Next</span>
                                                        </button>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <!-- Product Details -->
                                            <div class="col-md-6">
                                                <form action="<?php echo e(route('cart.store')); ?>" method="POST"
                                                    enctype="multipart/form-data">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('POST'); ?>
                                                    <input type="hidden" name="product_id" value="<?php echo e($value->id); ?>">

                                                    <h3><?php echo e($value->name); ?></h3>
                                                    <!-- Update price and variant section in modal -->
                                                    <p class="fs-4 fw-bold mb-3" id="price<?php echo e($value->id); ?>">
                                                        Rp. <?php echo e(number_format($value->price, 0, ',', '.')); ?>

                                                    </p>
                                                    <p class="mb-4"><?php echo e($value->description); ?></p>

                                                    <!-- Size Selection -->
                                                    

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
                                                                max="<?php echo e($value->stock); ?>" required>
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
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mt-4">
                                                    <h4>Review</h4>
                                                    <ul class="list-unstyled">
                                                        <?php if(!empty($value->reviews)): ?>
                                                            <?php $__currentLoopData = $value->reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <li class="mb-3">
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="ms-3">
                                                                            <h5><?php echo e($review->user->name); ?></h5>
                                                                            <p><?php echo e($review->review); ?></p>
                                                                            <p class="text-muted">
                                                                                Rating:
                                                                                <?php for($i = 1; $i <= 5; $i++): ?>
                                                                                    <i
                                                                                        class="fas fa-star<?php echo e($i <= $review->rating ? '' : '-o'); ?>"></i>
                                                                                <?php endfor; ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php else: ?>
                                                            <li class="text-center">No reviews available</li>
                                                        <?php endif; ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p>No products available</p>
                <?php endif; ?>

            </div>
            <!-- Load more -->
            
    </section>
    <!-- Add this script at the bottom of your file -->
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\toko-online\resources\views/front/index.blade.php ENDPATH**/ ?>