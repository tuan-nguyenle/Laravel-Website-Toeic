<header>
    <div class="header-area">
        <div class="header-top_area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="header_top_wrap d-flex justify-content-between align-items-center">
                            <a href="<?php echo e(url('/home')); ?>">
                                <img src="<?php echo e(asset('favicon/logo.png')); ?>" alt="Logo English For Future">
                            </a>
                            <div class="text_wrap">
                                <?php if(auth()->guard()->guest()): ?>
                                    <p>
                                        <?php if(Route::has('login')): ?>
                                            <a href="<?php echo e(route('login')); ?>"><i class="ti-user"></i><?php echo e(__(' Login')); ?></a>
                                        <?php endif; ?>

                                        <?php if(Route::has('register')): ?>
                                            <a href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                                        <?php endif; ?>
                                    </p>
                                <?php else: ?>
                                    <div class="dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#"
                                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                            v-pre>
                                            <img src="<?php echo e(Auth::user()->image); ?>" alt="avatar of user" height="32px"
                                                width="32px">
                                            <?php echo e(Auth::user()->name); ?>

                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item" href="<?php echo e(route('change-password')); ?>">
                                                    <?php echo e(__('Change Password')); ?>

                                                </a>
                                            </li>
                                            <li><a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                                    <?php echo e(__('Logout')); ?>

                                                </a></li>
                                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST"
                                                class="d-none">
                                                <?php echo csrf_field(); ?>
                                            </form>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php echo $__env->make('layouts.navbar-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
    </div>
</header>

<?php /**PATH /var/www/html/resources/views/layouts/header.blade.php ENDPATH**/ ?>