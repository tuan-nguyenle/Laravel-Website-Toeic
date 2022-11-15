<?php
    $title = 'View Detail Exam ' . $idExam;
?>

<?php $__env->startSection('content'); ?>
    <form action="<?php echo e(route('exam.import')); ?>" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <input type="file" name="file">
        <input type="submit">
    </form>
    <div style="overflow-x: scroll;">
        <table class="table table-hover">
            <?php echo csrf_field(); ?>
            <tr>
                <th><?php echo e(__('No')); ?></th>
                <th><?php echo e(__('Paragraph')); ?></th>
                <th><?php echo e(__('Question')); ?></th>
                <th><?php echo e(__('Option 1')); ?></th>
                <th><?php echo e(__('Option 2')); ?></th>
                <th><?php echo e(__('Option 3')); ?></th>
                <th><?php echo e(__('Option 4')); ?></th>
                <th><?php echo e(__('Correct Answer')); ?></th>
                <th><?php echo e(__('Image')); ?></th>
                <th><?php echo e(__('Audio')); ?></th>
            </tr>
            <?php $__currentLoopData = $listQuestion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = $item->question; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="table-row">
                        <td><?php echo e($question->number_for_exam); ?></td>
                        <td><?php echo $question->paragraph; ?></td>
                        <td><?php echo e($question->question); ?></td>
                        <td><?php echo e($question->option_1); ?></td>
                        <td><?php echo e($question->option_2); ?></td>
                        <td><?php echo e($question->option_3); ?></td>
                        <td><?php echo e($question->option_4); ?></td>
                        <td><?php echo e($question->correct_answer); ?></td>
                        <td>
                            <img src="<?php echo e(asset('storage/exam/' . $question->image)); ?>" alt="" title=""
                                style="max-height: 100px;max-width: 100px;">
                            
                        <td>
                            <?php if($question->audio != null): ?>
                                <audio controls>
                                    <source src="<?php echo e(asset('storage/exam/' . $question->audio)); ?>" type="audio/mpeg">
                                </audio>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master-admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/exam/view.blade.php ENDPATH**/ ?>