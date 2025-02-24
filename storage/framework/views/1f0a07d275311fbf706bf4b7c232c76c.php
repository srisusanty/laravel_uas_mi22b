<?php $__env->startSection('contents'); ?>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Dashboard Customer Selamat Datang</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="card info-card revenue-card">



                        <div class="card-body">
                            <h5 class="card-title">Total Order</h5>

                            <div class="d-flex align-items-center">

                                <div class="ps-3">
                                    <h6><?php echo e($orders->count()); ?></h6>


                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card info-card revenue-card">



                        <div class="card-body">
                            <h5 class="card-title">Total Transaction</h5>

                            <div class="d-flex align-items-center">

                                <div class="ps-3">
                                    <h6>Rp <?php echo e(number_format($orders->sum('grand_total'), 0, ',', '.')); ?></h6>


                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.cust', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\toko-online\resources\views/customer/index.blade.php ENDPATH**/ ?>