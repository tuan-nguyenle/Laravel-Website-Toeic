<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e($title); ?></title>
    <!-- Fonts -->
    <link rel="icon" type="image/png" href="<?php echo e(asset('favicon/favicon-32x32.png')); ?>">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Scripts -->
    
    <link href="<?php echo e(asset('themes/admin/css/style.min.css')); ?>" rel="stylesheet">
    <?php echo $__env->yieldContent('css'); ?>
    
</head>

<body>
    <div id="app">
        
        <main class="py-4">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
        
    </div>
    
    <script src="<?php echo e(asset('themes/admin/libs/jquery/dist/jquery.min.js')); ?>"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo e(asset('themes/admin/libs/bootstrap/dist/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('themes/admin/js/app-style-switcher.js')); ?>"></script>
    <!--Wave Effects -->
    <script src="<?php echo e(asset('themes/admin/js/waves.js')); ?>"></script>
    <!--Menu sidebar -->
    <script src="<?php echo e(asset('themes/admin/js/sidebarmenu.js')); ?>"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo e(asset('themes/admin/js/custom.js')); ?>"></script>
    <?php echo $__env->yieldContent('js'); ?>
</body>

</html>
<?php /**PATH /var/www/html/resources/views/layouts/app.blade.php ENDPATH**/ ?>