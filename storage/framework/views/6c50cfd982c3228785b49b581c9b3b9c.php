

<?php $__env->startSection('title', 'Basic'); ?>
<?php $__env->startSection('css'); ?>
	
<?php $__env->stopSection(); ?> 
<?php $__env->startSection('content'); ?>
<?php if (isset($component)) { $__componentOriginal8b54caccbdedc8030792c13949386bbd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8b54caccbdedc8030792c13949386bbd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.page-title','data' => ['title' => 'Cards','pagetitle' => 'Basic']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('page-title'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Cards','pagetitle' => 'Basic']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8b54caccbdedc8030792c13949386bbd)): ?>
<?php $attributes = $__attributesOriginal8b54caccbdedc8030792c13949386bbd; ?>
<?php unset($__attributesOriginal8b54caccbdedc8030792c13949386bbd); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8b54caccbdedc8030792c13949386bbd)): ?>
<?php $component = $__componentOriginal8b54caccbdedc8030792c13949386bbd; ?>
<?php unset($__componentOriginal8b54caccbdedc8030792c13949386bbd); ?>
<?php endif; ?>

        <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-4">
          <div class="col">
            <div class="card">
              <img src="<?php echo e(URL::asset('build/images/gallery/01.png')); ?>" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Stay at home</h5>
                <p class="card-text">Nam libero tempore, cum soluta nobis est
                  eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas
                  assumenda est, omnis dolor repellendus Temporibus autem
                  quibusdam et aut officiis debitis aut rerum necessitatibus saepe.</p>
  
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <img src="<?php echo e(URL::asset('build/images/gallery/02.png')); ?>" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Stay at home</h5>
                <p class="card-text">Nam libero tempore, cum soluta nobis est
                  eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas
                  assumenda est, omnis dolor repellendus Temporibus autem
                  quibusdam et aut officiis debitis aut rerum necessitatibus saepe.</p>
  
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <img src="<?php echo e(URL::asset('build/images/gallery/03.png')); ?>" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Stay at home</h5>
                <p class="card-text">Nam libero tempore, cum soluta nobis est
                  eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas
                  assumenda est, omnis dolor repellendus Temporibus autem
                  quibusdam et aut officiis debitis aut rerum necessitatibus saepe.</p>
  
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <img src="<?php echo e(URL::asset('build/images/gallery/04.png')); ?>" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Stay at home</h5>
                <p class="card-text">Nam libero tempore, cum soluta nobis est
                  eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas
                  assumenda est, omnis dolor repellendus Temporibus autem
                  quibusdam et aut officiis debitis aut rerum necessitatibus saepe.</p>
  
              </div>
            </div>
          </div>
  
          <div class="col">
            <div class="card">
              <div class="card-body">
                <img src="<?php echo e(URL::asset('build/images/gallery/05.png')); ?>" class="w-100 mb-4 rounded" alt="...">
                <h5 class="card-title mb-4">Why do we use it?</h5>
                <p class="card-text mb-4">Many desktop publishing packages and web page editors now use Lorem Ipsum.</p>
                <button class="btn btn-primary w-100 raised">Add Payment</button>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <div class="card-body">
                <img src="<?php echo e(URL::asset('build/images/gallery/06.png')); ?>" class="w-100 mb-4 rounded" alt="...">
                <h5 class="card-title mb-4">Why do we use it?</h5>
                <p class="card-text mb-4">Many desktop publishing packages and web page editors now use Lorem Ipsum.</p>
                <button class="btn btn-danger w-100 raised">Add Payment</button>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <div class="card-body">
                <img src="<?php echo e(URL::asset('build/images/gallery/07.png')); ?>" class="w-100 mb-4 rounded" alt="...">
                <h5 class="card-title mb-4">Why do we use it?</h5>
                <p class="card-text mb-4">Many desktop publishing packages and web page editors now use Lorem Ipsum.</p>
                <button class="btn btn-success w-100 raised">Add Payment</button>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <div class="card-body">
                <img src="<?php echo e(URL::asset('build/images/gallery/08.png')); ?>" class="w-100 mb-4 rounded" alt="...">
                <h5 class="card-title mb-4">Why do we use it?</h5>
                <p class="card-text mb-4">Many desktop publishing packages and web page editors now use Lorem Ipsum.</p>
                <button class="btn btn-warning w-100 raised">Add Payment</button>
              </div>
            </div>
          </div>
        </div><!--end row-->
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/Thijsie/Downloads/main-files/Matoxi_Laravel_v1.0.0/Admin/resources/views/component-cards-basic.blade.php ENDPATH**/ ?>