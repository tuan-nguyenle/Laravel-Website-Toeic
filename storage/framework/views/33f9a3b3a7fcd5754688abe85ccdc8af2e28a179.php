<?php
$title = 'User Management';
?>


<?php $__env->startSection('css'); ?>
    <style>
        .table-row {
            cursor: pointer;
        }
    </style>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <button type="button" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#modalAddUser">
        Add User
    </button>
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
    <?php if(session('status')): ?>
        <div class="alert alert-success" role="alert">
            <?php echo e(session('status')); ?>

        </div>
    <?php endif; ?>
    <div class="table-responsive">
        <table class="table table-hover">
            <?php echo csrf_field(); ?>
            <tr>
                <th><?php echo e(__('ID')); ?></th>
                <th><?php echo e(__('Full Name')); ?></th>
                <th><?php echo e(__('Email')); ?></th>
                <th><?php echo e(__('Address')); ?></th>
                <th><?php echo e(__('Phone Number')); ?></th>
                <th><?php echo e(__('Role Name')); ?></th>
                <th><?php echo e(__('Image')); ?></th>
                <th><?php echo e(__('Action')); ?></th>
            </tr>
            <?php $__currentLoopData = $listUser; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lstUser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="table-row" data-href="<?php echo e(url("/admin/user/view/{$lstUser->id}")); ?>">
                    <td><?php echo e($lstUser->id); ?></td>
                    <td><?php echo e($lstUser->name); ?></td>
                    <td><?php echo e($lstUser->email); ?></td>
                    <td><?php echo e($lstUser->address); ?></td>
                    <td><?php echo e($lstUser->phone_number); ?></td>
                    <td><?php echo e($lstUser->role->description); ?></td>
                    <td><img src="<?php echo e(asset($lstUser->image)); ?>" alt="avatar user <?php echo e($lstUser->name); ?>" width="30px">
                    </td>
                    <td>
                        <button class="btn btn-danger" onclick="deleteUser(<?php echo e($lstUser->id); ?>)">Delete</button>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
        <?php echo $listUser->links('paginate'); ?>

    </div>
    <!-- The Modal -->
    <div class="modal" id="modalAddUser">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="<?php echo e(route('user.add')); ?>" method="post">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Add New User</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-3 mt-2">
                                <label for="txtFullName">FullName</label>
                            </div>
                            <div class="col-9">
                                <input type="text" name="txtFullName" id="txtFullName" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3 mt-2">
                                <label for="txtEmail">Email</label>
                            </div>
                            <div class="col-9">
                                <input type="text" name="txtEmail" id="txtEmail" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3 mt-2">
                                <label for="txtPhoneNumber">Phone Number</label>
                            </div>
                            <div class="col-9">
                                <input type="text" name="txtPhoneNumber" id="txtPhoneNumber" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3 mt-2">
                                <label for="txtAddress">Address</label>
                            </div>
                            <div class="col-9">
                                <input type="text" name="txtAddress" id="txtAddress" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3 mt-2">
                                <label for="txtPassword">Password</label>
                            </div>
                            <div class="col-9">
                                <input type="password" name="txtPassword" id="txtPassword" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <label class="mt-2" for="cbRole">Role</label>
                            </div>
                            <div class="col-sm-9">
                                <select name="cbRole" id="cbRole" class="form-control">
                                    <?php $__currentLoopData = $listRole; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item->id); ?>">
                                            <?php echo e($item->description); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script>
        $(document).ready(function($) {
            $(".table-row").click(function() {
                window.document.location = $(this).data("href");
            });
        });

        function deleteUser(id) {
            var check = confirm('Do you sure delete this user');
            if (!check) return
            $.ajax({
                type: "POST",
                url: '<?php echo e(route('user.delete')); ?>',
                data: {
                    id: id,
                    _token: '<?php echo e(csrf_token()); ?>'
                },
                success: function(data) {
                    if (data.status == 'success') {
                        alert(data.message);
                        location.reload();
                    }
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master-admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/user/index.blade.php ENDPATH**/ ?>