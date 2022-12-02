<?php
    $title = 'Edit Profile';
?>



<?php $__env->startSection('css'); ?>
    <style>
        .ui-w-80 {
            width: 80px !important;
            height: auto;
        }

        .btn-default {
            border-color: rgba(24, 28, 33, 0.1);
            background: rgba(0, 0, 0, 0);
            color: #4E5155;
        }

        label.btn {
            margin-bottom: 0;
        }

        .btn-outline-primary {
            border-color: #26B4FF;
            background: transparent;
            color: #26B4FF;
        }

        .btn {
            cursor: pointer;
        }

        .text-light {
            color: #babbbc !important;
        }

        .btn-facebook {
            border-color: rgba(0, 0, 0, 0);
            background: #3B5998;
            color: #fff;
        }

        .btn-instagram {
            border-color: rgba(0, 0, 0, 0);
            background: #000;
            color: #fff;
        }

        .card {
            background-clip: padding-box;
            box-shadow: 0 1px 4px rgba(24, 28, 33, 0.012);
        }

        .row-bordered {
            overflow: hidden;
        }

        .account-settings-fileinput {
            position: absolute;
            visibility: hidden;
            width: 1px;
            height: 1px;
            opacity: 0;
        }

        .account-settings-links .list-group-item.active {
            font-weight: bold !important;
        }

        html:not(.dark-style) .account-settings-links .list-group-item.active {
            background: transparent !important;
        }

        .account-settings-multiselect~.select2-container {
            width: 100% !important;
        }

        .light-style .account-settings-links .list-group-item {
            padding: 0.85rem 1.5rem;
            border-color: rgba(24, 28, 33, 0.03) !important;
        }

        .light-style .account-settings-links .list-group-item.active {
            color: #4e5155 !important;
        }

        .material-style .account-settings-links .list-group-item {
            padding: 0.85rem 1.5rem;
            border-color: rgba(24, 28, 33, 0.03) !important;
        }

        .material-style .account-settings-links .list-group-item.active {
            color: #4e5155 !important;
        }

        .dark-style .account-settings-links .list-group-item {
            padding: 0.85rem 1.5rem;
            border-color: rgba(255, 255, 255, 0.03) !important;
        }

        .dark-style .account-settings-links .list-group-item.active {
            color: #fff !important;
        }

        .light-style .account-settings-links .list-group-item.active {
            color: #4E5155 !important;
        }

        .light-style .account-settings-links .list-group-item {
            padding: 0.85rem 1.5rem;
            border-color: rgba(24, 28, 33, 0.03) !important;
        }

        .avatar-wrapper {
            border-radius: 10%;
            position: relative;
            height: 200px;
            width: 200px;
            overflow: hidden;
            transition: all .3s ease;
        }

        .avatar-wrapper :hover {
            transform: scale(1.05);
            cursor: pointer;
        }

        .profile-pic {
            height: 100%;
            width: 100%;
            transition: all .3s ease;
        }

        .upload-button {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
        }

        .upload-button .fa-arrow-circle-up {
            position: absolute;
            font-size: 234px;
            top: -17px;
            left: 0;
            text-align: center;
            opacity: 0;
            transition: all .3s ease;
            color: #34495e;
        }

        .upload-button .fa-arrow-circle-up :hover .fa-arrow-circle-up {
            opacity: .9;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container light-style flex-grow-1 container-p-y mt-3 mb-3"
        style="box-shadow: 0px 0px 10px #444444;border-radius: 5px">
        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <h4 class="m-4">
                        <?php echo e(__('Account Information')); ?>

                    </h4>
                    <div class="list-group list-group-flush account-settings-links">
                        <?php if(Route::current()->getName() == 'change-infomation'): ?>
                            <a class="list-group-item list-group-item-action active"
                                href="<?php echo e(route('change-infomation')); ?>"><?php echo e(__('Profile')); ?></a>
                        <?php else: ?>
                            <a class="list-group-item list-group-item-action"
                                href="<?php echo e(route('change-infomation')); ?>"><?php echo e(__('Profile')); ?></a>
                        <?php endif; ?>
                        <?php if(Route::current()->getName() == 'change-password'): ?>
                            <a class="list-group-item list-group-item-action active"
                                href="<?php echo e(route('change-password')); ?>"><?php echo e(__('Change Password')); ?></a>
                        <?php else: ?>
                            <a class="list-group-item list-group-item-action"
                                href="<?php echo e(route('change-password')); ?>"><?php echo e(__('Change Password')); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <?php if(Route::current()->getName() == 'change-infomation'): ?>
                            <div class="card-body media d-flex justify-content-center">
                                <form action="<?php echo e(route('update-avatar')); ?>" method="post" enctype="multipart/form-data"
                                    id="avatar">
                                    <?php echo csrf_field(); ?>
                                    <div class="avatar-wrapper">
                                        <img class="profile-pic" src="<?php echo e(Auth::user()->image); ?>">
                                        <div class="upload-button">
                                            <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                                        </div>
                                        <input class="file-upload" type="file" name="avatar">
                                    </div>
                                </form>
                            </div>
                            <hr class="border-light m-0">
                            <div id="message" class="d-flex flex-column m-2 text-center"></div>
                            <form method="POST" action="<?php echo e(route('update-infomation')); ?>">
                                
                                <?php echo csrf_field(); ?>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo e(__('Name')); ?></label>
                                        <input type="text" class="form-control" value="<?php echo e(Auth::user()->name); ?>"
                                            name="txtFullname">
                                        <?php $__errorArgs = ['txtFullname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="text-danger"><?php echo e($message); ?></span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-4">
                                            <label class="form-label"><?php echo e(__('Date Of Birth')); ?></label>
                                            <input type="date" class="form-control"
                                                value="<?php echo e(Auth::user()->date_of_birth); ?>" name="txtDateOfBirth">
                                        </div>
                                        <div class="col-4">
                                            <label class="form-label"><?php echo e(__('Phone Number')); ?></label>
                                            <input type="text" class="form-control"
                                                value="<?php echo e(Auth::user()->phone_number); ?>" name="phone_number">
                                        </div>
                                        <div class="col-4">
                                            <label class="form-label"><?php echo e(__('Gender')); ?></label>
                                            <div class="row m-2">
                                                <div class="form-check mr-5 col-6">
                                                    <input class="form-check-input" type="radio" name="gender"
                                                        value="1" id="gender_male"
                                                        <?php echo e(Auth::user()->sex == '1' ? 'checked' : ''); ?>>
                                                    <label class="form-check-label" for="gender_male">
                                                        <?php echo e(__('Male')); ?>

                                                    </label>
                                                </div>
                                                <div class="form-check col-6">
                                                    <input class="form-check-input" type="radio" name="gender"
                                                        value="0" <?php echo e(Auth::user()->sex == '0' ? 'checked' : ''); ?>

                                                        id="gender_female">
                                                    <label class="form-check-label" for="gender_female">
                                                        <?php echo e(__('Female')); ?>

                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $__errorArgs = ['txtDateOfBirth'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    <?php $__errorArgs = ['phone_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    <?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    <div class="form-group">
                                        <label class="form-label"><?php echo e(__('Address')); ?></label>
                                        <input type="text" class="form-control" value="<?php echo e(Auth::user()->address); ?>"
                                            name="txtAddress">
                                        <?php $__errorArgs = ['txtAddress'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="text-danger"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-6">
                                            <label class="form-label"><?php echo e(__('Gmail')); ?></label>
                                            <input type="text" class="form-control mb-1"
                                                value="<?php echo e(Auth::user()->email); ?>" disabled>
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label"><?php echo e(__('Facebook ID')); ?></label>
                                            <input type="text" class="form-control mb-1"
                                                value="<?php echo e(Auth::user()->facebook_id); ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success mb-3 float-right">Save</button>
                                    </div>
                                </div>
                            </form>
                        <?php endif; ?>
                    </div>
                    <?php echo $__env->yieldContent('change-information'); ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->startSection('js'); ?>
    <script>
        // Post to route change-avatar
        $(document).ready(function() {
            $('#avatar').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('action'),
                    method: $(this).attr('method'),
                    data: new FormData(this),
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    beforeSend: function() {
                        $('div#message').empty();
                    },
                    success: function(data) {
                        if (data.status == 'success') {
                            $("div#message").append(
                                "<span class='" + data.class_name + "'>" + data.message +
                                "</span>");
                            var reader = new FileReader();
                            reader.onload = function(e) {
                                $('.profile-pic').attr('src', e.target.result);
                            }
                            reader.readAsDataURL(e.target[1].files[0]);
                        }
                        if (data.status == 'failed') {
                            data.message.forEach(msg => {
                                $("div#message").append(
                                    "<span class='" + data.class_name + "'>" + msg +
                                    "</span>");
                            });
                        }
                    }
                });

            });

            // enable click click button to input and start Ajax
            $(".upload-button").on('click', function() {
                $(".file-upload").click();

            });

            $(".file-upload").on('change', function() {
                $('#avatar').submit();
            });
        })
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('client.layout.master-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/layouts/edit-profile.blade.php ENDPATH**/ ?>