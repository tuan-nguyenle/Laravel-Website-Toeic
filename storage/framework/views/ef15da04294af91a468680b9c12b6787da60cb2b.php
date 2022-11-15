<?php $__env->startSection('change-information'); ?>
    <form method="POST" action="<?php echo e(route('update-password')); ?>">
        <?php echo csrf_field(); ?>
        <div class="card-body">
            <?php if(session('status')): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo e(session('status')); ?>

                </div>
            <?php elseif(session('error')): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo e(session('error')); ?>

                </div>
            <?php endif; ?>
            <div class="form-group">
                <label for="oldPasswordInput">Current Password</label>
                <input type="password" class="form-control  <?php $__errorArgs = ['old_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                    id="oldPasswordInput" required="" name="old_password">
                <?php $__errorArgs = ['old_password'];
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
            <div class="form-group">
                <label for="newPasswordInput">New Password</label>
                <input type="password" class="form-control <?php $__errorArgs = ['new_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                    id="newPasswordInput" required="" name="new_password">
                <div class="form-text small text-muted">
                    The password must be 8-20 characters, and must <em>not</em> contain
                    spaces.
                </div>
                <?php $__errorArgs = ['new_password'];
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
            <div class="form-group">
                <label for="confirmNewPasswordInput">Confirm Your Password</label>
                <input type="password" class="form-control" id="confirmNewPasswordInput" required=""
                    name="new_password_confirmation">
                <span class="form-text small text-muted">
                    To confirm, type the new password again.
                </span>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success mb-3 float-right">Save</button>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.edit-profile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/layouts/change-password.blade.php ENDPATH**/ ?>