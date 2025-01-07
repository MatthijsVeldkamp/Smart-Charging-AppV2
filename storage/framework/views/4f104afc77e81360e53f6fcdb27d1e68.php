<!doctype html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="<?php echo e(URL::asset('build/images/favicon-32x32.png')); ?>" type="image/png">
    <title><?php echo $__env->yieldContent('title'); ?> | Laravel & Bootstrap 5 Admin Dashboard Template</title>

    <?php echo $__env->yieldContent('css'); ?>

    <?php echo $__env->make('layouts.head-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</head>

<body>

<?php echo $__env->make('layouts.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!--start main wrapper-->
<main class="main-wrapper">
    <div class="main-content">

        <?php echo $__env->yieldContent('content'); ?>

    </div>
</main>
<!--end main wrapper-->

<!--start overlay-->
    <div class="overlay btn-toggle"></div>
<!--end overlay-->

  <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <?php echo $__env->make('layouts.cart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <?php echo $__env->make('layouts.right-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <?php echo $__env->make('layouts.vendor-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <?php echo $__env->yieldContent('scripts'); ?>

</body>
  
</html>
<?php /**PATH /Users/Thijsie/Downloads/main-files/Matoxi_Laravel_v1.0.0/Admin/resources/views/layouts/master.blade.php ENDPATH**/ ?>