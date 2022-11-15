<?php
    $title = 'News Management';
?>


<?php $__env->startSection('css'); ?>
    <style>
        .table-row {
            cursor: pointer;
        }
    </style>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <a href="<?php echo e(route('news.view')); ?>" class="btn btn-primary">Add New</a>
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
                <th><?php echo e(__('Title')); ?></th>
                <th><?php echo e(__('href-param')); ?></th>
                <th><?php echo e(__('Thumbnail')); ?></th>
                <th><?php echo e(__('Author')); ?></th>
                <th><?php echo e(__('Create At')); ?></th>
                <th><?php echo e(__('Status')); ?></th>
            </tr>
            <?php $__currentLoopData = $listNews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lstNews): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="table-row" data-href="<?php echo e(url("/admin/news/view/{$lstNews->id}")); ?>">
                    <td><?php echo e($lstNews->id); ?></td>
                    <td><?php echo e($lstNews->title); ?></td>
                    <td><?php echo e($lstNews->href_param); ?></td>
                    <td><img src="<?php echo e(asset($lstNews->thumbnail)); ?>" alt="Thumbnail <?php echo e($lstNews->title); ?>" width="30px">
                    </td>
                    <td><?php echo e($lstNews->user->name); ?></td>
                    <td><?php echo e($lstNews->create_at); ?></td>
                    <td>
                        <?php echo e($lstNews->is_active == 1 ? 'Active' : 'Inactive'); ?>

                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script>
        $(document).ready(function($) {
            $(".table-row").click(function() {
                window.document.location = $(this).data("href");
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master-admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/news/index.blade.php ENDPATH**/ ?>