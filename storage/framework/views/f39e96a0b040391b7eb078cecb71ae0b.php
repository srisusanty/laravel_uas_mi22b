<?php $__env->startSection('contents'); ?>
    <section>
        <div class="container">
            <h2>Data Review</h2>
            <div class="row">
                <div class="col-lg-12">
                    <?php if(session()->has('success')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?php echo e(session('success')); ?>

                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <?php if(session()->has('error')): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?php echo e(session('error')); ?>

                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Data Review</h5>
                            
                            <!-- Table with stripped rows -->
                            <div class="table-responsive">

                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th>
                                                #
                                            </th>
                                            <th>
                                                ID Order
                                            </th>
                                            <th>Date</th>
                                            <th>Rating</th>
                                            <th>Review</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td> <?php echo e($loop->iteration); ?> </td>
                                                </td>
                                                <td><a
                                                        href="<?php echo e(route('createmyreview', $item->id)); ?>"><?php echo e($item->invoice_number); ?></a>
                                                </td>
                                                <td><?php echo e(\Carbon\Carbon::parse($item->created_at)->translatedFormat('l d F Y')); ?>

                                                </td>
                                                <td><?php echo e($item->review ? $item->review->rating : 'NA'); ?></td>
                                                <td><?php echo e($item->review ? $item->review->review : 'NA'); ?></td>

                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </tbody>
                                </table>
                                <!-- End Table with stripped rows -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.cust', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\toko-online\resources\views/customer/review/index.blade.php ENDPATH**/ ?>