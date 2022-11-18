<?php
    $title = 'Exams Management';
?>

<?php $__env->startSection('content'); ?>
    <a href="<?php echo e(route('exam.view-add')); ?>">Add New Exam</a>
    <table class="table table-hover">
        <?php echo csrf_field(); ?>
        <tr>
            <th><?php echo e(__('ID')); ?></th>
            <th><?php echo e(__('Description')); ?></th>
            <th><?php echo e(__('Level')); ?></th>
            <th><?php echo e(__('Create At')); ?></th>
            <th><?php echo e(__('Status')); ?></th>
        </tr>
        <?php $__currentLoopData = $listExam; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="table-row" data-href="<?php echo e(url("/admin/exam/view/{$exam->id}")); ?>">
                <td><?php echo e($exam->id); ?></td>
                <td><?php echo e($exam->description); ?></td>
                <td><?php echo e($exam->level); ?></td>
                <td><?php echo e($exam->created_at); ?></td>
                <td>
                    <?php echo e($exam->status == 1 ? 'Active' : 'Inactive'); ?>

                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
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

<?php echo $__env->make('layouts.admin.master-admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/exam/index.blade.php ENDPATH**/ ?>