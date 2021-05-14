    <body>
        <div class="flex-center position-ref full-height">
            <?php if(Route::has('login')): ?>
                <div class="top-right links">
                    <?php if(auth()->guard()->check()): ?>
                        <a href="<?php echo e(url('/home')); ?>">Home</a>
                    <?php else: ?>
                        <a href="<?php echo e(route('login')); ?>">Login</a>

                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div class="content">
                <div class="title m-b-md">
                    <img src="<?php echo e(asset('img/shop-icon.png')); ?>" width="150" height="150">
                    Antojitos
                </div>
                <div class="title m-b-md">
                    <img src="<?php echo e(asset('img/supermercado2.jpg')); ?>" alt="">
                </div>
                <div class="links">
                </div>

            </div>
        </div>
    </body>
</html>

<?php echo $__env->make('cabecera', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Almacen\resources\views/welcome.blade.php ENDPATH**/ ?>