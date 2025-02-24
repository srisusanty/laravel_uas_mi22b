<?php $__env->startSection('contents'); ?>
    <!-- Title page -->
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('/cozas/images/bg-01.jpg');">
        <h2 class="ltext-105 cl0 txt-center">
            Category
        </h2>
    </section>
    <section class="bg0 p-t-23 p-b-140">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <form action="<?php echo e(url()->current()); ?>" method="get">
                        <div class="filter">
                            <h4>Filter</h4>
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select name="category" id="category" class="form-control">
                                    <option value="">All Category</option>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($category->id); ?>"
                                            <?php echo e(request()->query('category') == $category->id ? 'selected' : ''); ?>>
                                            <?php echo e($category->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="price_range">Price Range</label>
                                <select name="price_range" id="price_range" class="form-control">
                                    <option value="">All Price</option>
                                    <option value="0-100000"
                                        <?php echo e(request()->query('price_range') == '0-100000' ? 'selected' : ''); ?>>Rp 0 - Rp
                                        100.000</option>
                                    <option value="100000-500000"
                                        <?php echo e(request()->query('price_range') == '100000-500000' ? 'selected' : ''); ?>>Rp
                                        100.000 - Rp 500.000</option>
                                    <option value="500000-1000000"
                                        <?php echo e(request()->query('price_range') == '500000-1000000' ? 'selected' : ''); ?>>Rp
                                        500.000 - Rp 1.000.000</option>
                                    <option value="1000000-5000000"
                                        <?php echo e(request()->query('price_range') == '1000000-5000000' ? 'selected' : ''); ?>>Rp
                                        1.000.000 - Rp 5.000.000</option>
                                    <option value="5000000-10000000"
                                        <?php echo e(request()->query('price_range') == '5000000-10000000' ? 'selected' : ''); ?>>Rp
                                        5.000.000 - Rp 10.000.000</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                                <!-- Block2 -->

                                <div class="block2">
                                    <div class="block2-pic hov-img0">
                                        <img src="<?php echo e(url($value->images->where('is_primary', 1)->first()->image_url)); ?>"
                                            alt="IMG-PRODUCT">

                                        <button type="button"
                                            class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04"
                                            data-bs-toggle="modal" data-bs-target="#productModal<?php echo e($value->id); ?>">
                                            Quick View
                                        </button>
                                    </div>

                                    <div class="block2-txt flex-w flex-t p-t-14">
                                        <div class="block2-txt-child1 flex-col-l ">
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
                                <div class="modal-dialog modal-lg" style="margin-top:7rem">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalLabel<?php echo e($value->id); ?>"><?php echo e($value->name); ?>

                                            </h5>
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
                                                            <input type="hidden" name="product_id"
                                                                value="<?php echo e($value->product_id); ?>">

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
                                                                    <button class="btn btn-outline-secondary"
                                                                        type="button"
                                                                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                                        -
                                                                    </button>
                                                                    <input type="number" class="form-control text-center"
                                                                        name="quantity" value="1" min="1"
                                                                        max="<?php echo e($value->stock); ?>" required>
                                                                    <button class="btn btn-outline-secondary"
                                                                        type="button"
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
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <p>Data is empty</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\toko-online\resources\views/front/category.blade.php ENDPATH**/ ?>