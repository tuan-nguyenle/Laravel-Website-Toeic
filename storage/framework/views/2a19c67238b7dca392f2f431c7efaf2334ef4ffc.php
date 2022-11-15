<?php
$title = 'Role Management';
?>


<?php $__env->startSection('content'); ?>
    <div class="row">
        <?php if(session('error')): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?>
        <div class="col-4 mt-3 mb-3">
            <form action="<?php echo e(route('role.add')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="txtRoleName">Add New Role</label>
                    <input type="text" name="txtRoleName" class="form-control mt-3" placeholder="Enter New Role">
                </div>
                <div class="form-group">
                    <button class="btn btn-success m-r-10" style="float: right">Add Role</button>
                </div>
            </form>
        </div>
        <div class="col-8">
            <div class="table-responsive">
                <table class="table table-hover">
                    <tr>
                        <th><?php echo e(__('No')); ?></th>
                        <th><?php echo e(__('Name Role')); ?></th>
                        <th><?php echo e(__('Date Create')); ?></th>
                        <th><?php echo e(__('Delete')); ?></th>
                    </tr>
                    <?php $__currentLoopData = $lstRole; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lstRole): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($lstRole->id); ?></td>
                            <td contenteditable class="role_value" data-role_value="description"
                                data-id="<?php echo e($lstRole->id); ?>">
                                <?php echo e($lstRole->description); ?>

                            </td>
                            <td><?php echo e($lstRole->create_at); ?></td>
                            <td>
                                <button class="btn btn-danger" onclick="deleteRole(<?php echo e($lstRole->id); ?>)">Delete</button>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script>
        $(document).on('blur', '.role_value', function() {
            var id = $(this).data("id");
            var col = $(this).data("role_value");
            var value = $(this).text();
            if (value.trim() != '') {
                $.ajax({
                    type: "POST",
                    url: '<?php echo e(route('role.update')); ?>',
                    data: {
                        id: id,
                        col: col,
                        value: value,
                        _token: '<?php echo e(csrf_token()); ?>'
                    },
                    success: function(data) {
                        if (data.status == 'success') {
                            alert(data.message);
                        }
                    }
                });
            }
        })

        function deleteRole(id) {
            var check = confirm('Do you sure delete this item');
            if (!check) return

            $.ajax({
                type: "POST",
                url: '<?php echo e(route('role.delete')); ?>',
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

<?php echo $__env->make('layouts.admin.master-admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/role/index.blade.php ENDPATH**/ ?>