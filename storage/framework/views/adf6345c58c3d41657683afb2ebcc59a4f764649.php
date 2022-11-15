<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="English 4 Future">
    <meta name="description" content="English 4 Future">
    <meta name="robots" content="noindex,nofollow">
    <title><?php echo e($title); ?></title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" href="<?php echo e(asset('favicon/favicon-32x32.png')); ?>">
    <!-- Custom CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link href="<?php echo e(asset('mdb5/css/mdb.min.css')); ?>" rel="stylesheet" />
    <?php echo $__env->yieldContent('css'); ?>
</head>

<body>
    <?php echo $__env->yieldContent('content'); ?>
    <script type="text/javascript" src="<?php echo e(asset('mdb5/js/mdb.min.js')); ?>"></script>
</body>

</html>
<?php /**PATH /var/www/html/resources/views/layouts/admin/admin-auth.blade.php ENDPATH**/ ?>