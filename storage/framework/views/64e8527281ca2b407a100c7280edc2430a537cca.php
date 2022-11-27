<?php
    $title = 'Edit User';
?>

<?php $__env->startSection('content'); ?>
    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-2">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="<?php echo e(asset($profileUser->image)); ?>" alt="avatar" class="rounded-circle img-fluid"
                                style="width: 150px;">
                        </div>
                    </div>
                </div>
                <div class="col-lg-10">
                    <?php if(session('status') == '1'): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e('Update User Success'); ?>

                        </div>
                    <?php endif; ?>
                    <?php if(session('status') == '0'): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo e('Update User Failed'); ?>

                        </div>
                    <?php endif; ?>
                    <form action="<?php echo e(url("/admin/user/update/{$profileUser->id}")); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="mt-2" for="txtFullName">Full
                                            Name</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="txtFullName" name="txtFullName"
                                            value="<?php echo e($profileUser->name); ?>">
                                    </div>
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
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="mt-2" for="txtEmail">Email</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="txtEmail" name="txtEmail"
                                            value="<?php echo e($profileUser->email); ?>">
                                    </div>
                                    <?php $__errorArgs = ['txtEmail'];
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
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="mt-2" for="txtPhoneNumber">Phone Number</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="phone_number" name="phone_number"
                                            value="<?php echo e($profileUser->phone_number); ?>">
                                    </div>
                                    <?php $__errorArgs = ['phone_number'];
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
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="mt-2" for="txtAddress">Address</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="txtAddress" name="txtAddress"
                                            value="<?php echo e($profileUser->address); ?>">
                                    </div>
                                    <?php $__errorArgs = ['txtAddress'];
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
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="mt-2" for="txtDateOfBirth">Date Of Birth</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" id="txtDateOfBirth" name="txtDateOfBirth"
                                            value="<?php echo e($profileUser->date_of_birth); ?>">
                                    </div>
                                    <?php $__errorArgs = ['txtDateOfBirth'];
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
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="mt-2" for="cbRole">Role</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <select name="cbRole" id="cbRole" class="form-control">
                                            <?php $__currentLoopData = $lstRole; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php $__errorArgs = ['txtFullname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="text-danger"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <option value="<?php echo e($item->id); ?>"
                                                    <?php echo e($item->id == $profileUser->role_id ? 'selected' : ''); ?>>
                                                    <?php echo e($item->description); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                </div>
                                <button type="submit" class="btn btn-primary col-4 mb-5">Save</button>
                                <div class="col-4">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master-admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/user/view.blade.php ENDPATH**/ ?>