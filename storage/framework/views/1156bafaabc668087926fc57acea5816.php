<?php $__env->startSection('contents'); ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .select2-container {
            z-index: 100000;
        }

        .modal {
            z-index: 1050;
        }

        .select2-dropdown {
            z-index: 100051;
        }

        .select2-container--open {
            z-index: 100051;
        }

        .modal-dialog {
            z-index: 1051;
        }
    </style>

    <div class="row">
        <div class="col-xl-4">

            <div class="card">
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                    <?php if($user->image): ?>
                        <img src="<?php echo e(url($user->image)); ?>" alt="Profile" class="rounded-circle" style="width: 189px">
                    <?php endif; ?>
                    <h2><?php echo e($user->name); ?></h2>

                </div>
            </div>

        </div>

        <div class="col-xl-8">

            <div class="card">
                <div class="card-body pt-3">
                    <!-- Bordered Tabs -->
                    <ul class="nav nav-tabs nav-tabs-bordered">

                        <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="tab"
                                data-bs-target="#profile-overview">Overview</button>
                        </li>

                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                Profile</button>
                        </li>


                    </ul>
                    <div class="tab-content pt-2">

                        <div class="tab-pane fade show active profile-overview" id="profile-overview">
                            <h5 class="card-title">Profile </h5>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Name</div>
                                <div class="col-lg-9 col-md-8"><?php echo e($user->name); ?></div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Phone</div>
                                <div class="col-lg-9 col-md-8"><?php echo e($user->phone); ?></div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Email</div>
                                <div class="col-lg-9 col-md-8"><?php echo e($user->email); ?></div>
                            </div>

                        </div>

                        <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                            <!-- Profile Edit Form -->
                            <form action="<?php echo e(route('customer.update')); ?>" method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="row mb-3">
                                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label"> foto profile</label>
                                    <div class="col-md-8 col-lg-9">
                                        <?php if($user->image): ?>
                                            <img src="<?php echo e(url($user->image)); ?>" alt="Profile" style="width: 189px">
                                        <?php endif; ?>
                                        <div class="pt-2">
                                            <input type="file" class="form-control" id="profileImage"
                                                name="image"accept=".jpg, .jpeg, .png, .JPG"
                                                onchange="validateFile(this)">
                                            <script>
                                                function validateFile(input) {
                                                    const file = input.files[0];
                                                    if (file) {
                                                        const validExtensions = ['image/jpeg', 'image/png', 'image/jpg'];
                                                        if (!validExtensions.includes(file.type)) {
                                                            alert('Hanya gambar dengan format jpg, jpeg, atau png yang boleh diupload.');
                                                            input.value = '';
                                                        }
                                                    }
                                                }
                                            </script>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Name</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="name" type="text" class="form-control" id="fullName"
                                            value="<?php echo e($user->name); ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="phone" type="text" class="form-control" id="Phone"
                                            value="<?php echo e($user->phone); ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="email" type="email" class="form-control" id="Email"
                                            value="<?php echo e($user->email); ?>">
                                    </div>
                                </div>

                                <span class="text-danger">* Jika tidak ingin mengganti password, maka kosongkan saja.</span>
                                <div class="row mb-3">
                                    <label for="Email" class="col-md-4 col-lg-3 col-form-label">password</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="password" type="password" class="form-control" id="Email"
                                            value="">
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form><!-- End Profile Edit Form -->

                        </div>

                    </div><!-- End Bordered Tabs -->

                </div>
            </div>



        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-title">Address</h5>
                    <?php if($user->user_address->count() > 0): ?>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>status</th>
                                        <th>Address</th>
                                        <th>city</th>
                                        <th>province</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $user->user_address; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <?php if($slider->is_primary == 1): ?>
                                                    <a href="<?php echo e(route('activeinactive', $slider->id)); ?>"
                                                        class="badge rounded-pill bg-success text-white"><i
                                                            class="bi bi-check-circle-fill"></i> utama</a>
                                                <?php else: ?>
                                                    <a href="<?php echo e(route('activeinactive', $slider->id)); ?>"
                                                        class="badge rounded-pill bg-danger text-white"><i
                                                            class="bi bi-x-circle-fill"></i> tidak utama</a>
                                                <?php endif; ?>
                                                
                                            </td>
                                            <td><?php echo e($slider->address); ?></td>
                                            <td><?php echo e($slider->city->name); ?></td>
                                            <td><?php echo e($slider->province->name); ?></td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <a href="#" class="btn btn-primary btn-sm edit-address"
                                                        data-id="<?php echo e($slider->id); ?>"
                                                        data-address="<?php echo e($slider->address); ?>"
                                                        data-province-id="<?php echo e($slider->province_id); ?>"
                                                        data-province-name="<?php echo e($slider->province->name); ?>"
                                                        data-city-id="<?php echo e($slider->city_id); ?>"
                                                        data-city-name="<?php echo e($slider->city->name); ?>"
                                                        onclick="showEditForm(this)">
                                                        Edit
                                                    </a>
                                                    <form action="<?php echo e(route('deleteaddressprofile', $slider->id)); ?>"
                                                        method="POST">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Are you sure you want to delete this address?')">Delete</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                        <p>No sliders available. Please add some sliders.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <!-- Add Address Form -->
            <div id="add-form">
                <div class="card">
                    <div class="card-body m-3">
                        <h5 class="card-title">Add Address</h5>
                        <form method="POST" action="<?php echo e(route('addaddressprofile')); ?>" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="row mb-3">
                                <label for="title" class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="address" id="title" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="province" class="col-sm-2 col-form-label">Province</label>
                                <div class="col-sm-10">
                                    <select name="origin_province" id="origin_province"
                                        class="origin_province form-select form-control" style="width: 100%">
                                        <option>Choose Province</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="city" class="col-sm-2 col-form-label">City</label>
                                <div class="col-sm-10">
                                    <select name="origin_city" id="origin_city"
                                        class="origin_city form-select form-control" style="width: 100%">
                                        <option>Choose City</option>
                                    </select>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Edit Address Form (Initially Hidden) -->
            <div id="edit-form" style="display: none;">
                <div class="card">
                    <div class="card-body m-3">
                        <h5 class="card-title">Edit Address</h5>
                        <form action="<?php echo e(route('updatedaddressprofile')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="id" id="edit_address_id">
                            <div class="row mb-3">
                                <label for="edit_address" class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="address" id="edit_address"
                                        required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="edit_province" class="col-sm-2 col-form-label">Province </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control mb-1 disabled" id="edit_province" readonly>
                                    <select name="origin_province" id="origin_province2"
                                        class="form-select form-control origin_province">
                                        <option>Choose Province</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="edit_city" class="col-sm-2 col-form-label">City
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control mb-1 disabled" id="edit_city" readonly>
                                    <select name="origin_city" id="origin_city2"
                                        class="form-select form-control origin_city">
                                        <option>Choose City</option>
                                    </select>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                <button type="button" class="btn btn-secondary" onclick="hideEditForm()">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            // Initialize Select2 for the main form
            initializeSelect2('#origin_province', '#origin_city');
            initializeSelect23('#origin_province2', '#origin_city2');
            // Initialize Select2 for each modal
            $('.modal').each(function(index) {
                let modalId = $(this).attr('id');
                let provinceSelect = '#' + modalId + ' select[name="origin_province"]';
                let citySelect = '#' + modalId + ' select[name="origin_city"]';

                // Initialize Select2 when modal is shown
                $(this).on('shown.bs.modal', function() {
                    initializeSelect2(provinceSelect, citySelect);
                    initializeSelect23(provinceSelect, citySelect);
                });
            });
        });

        function initializeSelect2(provinceSelector, citySelector) {
            $(provinceSelector).select2({
                dropdownParent: $(provinceSelector).parent(),
                ajax: {
                    url: "<?php echo e(route('provinces')); ?>",
                    type: 'GET',
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            keyword: params.term
                        }
                    },
                    processResults: function(response) {
                        return {
                            results: response
                        }
                    },
                }
            });

            $(citySelector).select2({
                dropdownParent: $(citySelector).parent()
            });

            // Province change handler
            $(provinceSelector).on('change', function() {
                let citySelect = $(citySelector);
                citySelect.empty();
                citySelect.append('<option>Choose City</option>');
                citySelect.select2({
                    dropdownParent: citySelect.parent(),
                    ajax: {
                        url: "<?php echo e(route('cities')); ?>",
                        type: 'GET',
                        dataType: 'json',
                        delay: 250,
                        data: function(params) {
                            return {
                                keyword: params.term,
                                province_id: $(provinceSelector).val()
                            }
                        },
                        processResults: function(response) {
                            return {
                                results: response
                            }
                        },
                    }
                });
            });
        }


        function initializeSelect23(provinceSelector, citySelector) {
            $(provinceSelector).select2({
                dropdownParent: $(provinceSelector).parent(),
                ajax: {
                    url: "<?php echo e(route('provinces')); ?>",
                    type: 'GET',
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            keyword: params.term
                        }
                    },
                    processResults: function(response) {
                        return {
                            results: response
                        }
                    },
                }
            });

            $(citySelector).select2({
                dropdownParent: $(citySelector).parent()
            });

            // Province change handler
            $(provinceSelector).on('change', function() {
                let citySelect = $(citySelector);
                citySelect.empty();
                citySelect.append('<option>Choose City</option>');
                citySelect.select2({
                    dropdownParent: citySelect.parent(),
                    ajax: {
                        url: "<?php echo e(route('cities')); ?>",
                        type: 'GET',
                        dataType: 'json',
                        delay: 250,
                        data: function(params) {
                            return {
                                keyword: params.term,
                                province_id: $(provinceSelector).val()
                            }
                        },
                        processResults: function(response) {
                            return {
                                results: response
                            }
                        },
                    }
                });
            });
        }
    </script>
    <script>
        function showEditForm(element) {
            // Hide add form and show edit form
            document.getElementById('add-form').style.display = 'none';
            document.getElementById('edit-form').style.display = 'block';

            // Get data from clicked element
            const data = element.dataset;

            // Update form action URL
            // document.getElementById('edit-address-form').action =
            //     "<?php echo e(route('admin.setting.slider.update', '')); ?>/" + data.id;

            // Populate form fields
            document.getElementById('edit_address_id').value = data.id;
            document.getElementById('edit_address').value = data.address;
            document.getElementById('edit_province').value = data.provinceName;
            document.getElementById('edit_city').value = data.cityName;
            // Create and select province option
            const provinceSelect = $('#edit_province');
            const provinceOption = new Option(data.provinceName, data.provinceId, true, true);
            provinceSelect.append(provinceOption).trigger('change');

            // Create and select city option
            const citySelect = $('#edit_city');
            const cityOption = new Option(data.cityName, data.cityId, true, true);
            citySelect.append(cityOption).trigger('change');
        }

        function hideEditForm() {
            document.getElementById('add-form').style.display = 'block';
            document.getElementById('edit-form').style.display = 'none';
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.cust', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\toko-online\resources\views/customer/profile/index.blade.php ENDPATH**/ ?>