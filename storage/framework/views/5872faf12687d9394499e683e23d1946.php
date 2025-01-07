

<?php $__env->startSection('title', 'Alternate'); ?>
<?php $__env->startSection('css'); ?>
	
<?php $__env->stopSection(); ?> 
<?php $__env->startSection('content'); ?>
<?php if (isset($component)) { $__componentOriginal8b54caccbdedc8030792c13949386bbd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8b54caccbdedc8030792c13949386bbd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.page-title','data' => ['title' => 'Cards','pagetitle' => 'Contacts']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('page-title'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Cards','pagetitle' => 'Contacts']); ?>
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

      <div class="row g-4">
        <div class="col-12 col-xl-4">
          <div class="card mb-0">
            <div class="card-body">
              <div class="position-relative">
                <img src="<?php echo e(URL::asset('build/images/gallery/14.png')); ?>" class="img-fluid rounded" alt="">
                <div class="position-absolute top-100 start-50 translate-middle">
                  <img src="<?php echo e(URL::asset('build/images/avatars/05.png')); ?>" width="100" height="100"
                    class="rounded-circle raised p-1 bg-primary" alt="">
                </div>
              </div>
              <div class="text-center mt-5 pt-4">
                <h5 class="mb-2">Julinee Moree</h5>
                <p class="mb-0">Marketing Excutive</p>
              </div>
              <div class="d-flex align-items-center justify-content-around mt-5">
                <div class="d-flex flex-column gap-2">
                  <h4 class="mb-0">798</h4>
                  <p class="mb-0">Posts</p>
                </div>
                <div class="d-flex flex-column gap-2">
                  <h4 class="mb-0">48K</h4>
                  <p class="mb-0">Following</p>
                </div>
                <div class="d-flex flex-column gap-2">
                  <h4 class="mb-0">24.3M</h4>
                  <p class="mb-0">Followers</p>
                </div>
              </div>
              <hr>
              <div class="d-flex align-items-center justify-content-between">
                <button class="btn btn-light">Message</button>
                <button class="btn btn-primary">Follow</button>
              </div>
            </div>
          </div>
        </div>

        <div class="col-12 col-xl-4">
          <div class="card mb-0">
            <div class="card-body">
              <div class="position-relative">
                <img src="<?php echo e(URL::asset('build/images/gallery/18.png')); ?>" class="img-fluid rounded" alt="">
                <div class="position-absolute top-100 start-50 translate-middle">
                  <img src="<?php echo e(URL::asset('build/images/avatars/02.png')); ?>" width="100" height="100"
                    class="rounded-circle raised p-1 bg-white" alt="">
                </div>
              </div>
              <div class="text-center mt-5 pt-4">
                <h5 class="mb-2">Julinee Moree</h5>
                <p class="mb-0">Marketing Excutive</p>
              </div>
              <div class="d-flex align-items-center justify-content-around mt-5">
                <div class="d-flex flex-column gap-2">
                  <h4 class="mb-0">798</h4>
                  <p class="mb-0">Posts</p>
                </div>
                <div class="d-flex flex-column gap-2">
                  <h4 class="mb-0">48K</h4>
                  <p class="mb-0">Following</p>
                </div>
                <div class="d-flex flex-column gap-2">
                  <h4 class="mb-0">24.3M</h4>
                  <p class="mb-0">Followers</p>
                </div>
              </div>
              <hr>
              <div class="d-flex align-items-center justify-content-between">
                <button class="btn btn-light">Message</button>
                <button class="btn btn-primary">Follow</button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-xl-4">
          <div class="card mb-0">
            <div class="card-body">
              <div class="position-relative">
                <img src="<?php echo e(URL::asset('build/images/gallery/19.png')); ?>" class="img-fluid rounded" alt="">
                <div class="position-absolute top-100 start-50 translate-middle">
                  <img src="<?php echo e(URL::asset('build/images/avatars/04.png')); ?>" width="100" height="100"
                    class="rounded-circle raised p-1 bg-danger" alt="">
                </div>
              </div>
              <div class="text-center mt-5 pt-4">
                <h5 class="mb-2">Julinee Moree</h5>
                <p class="mb-0">Marketing Excutive</p>
              </div>
              <div class="d-flex align-items-center justify-content-around mt-5">
                <div class="d-flex flex-column gap-2">
                  <h4 class="mb-0">798</h4>
                  <p class="mb-0">Posts</p>
                </div>
                <div class="d-flex flex-column gap-2">
                  <h4 class="mb-0">48K</h4>
                  <p class="mb-0">Following</p>
                </div>
                <div class="d-flex flex-column gap-2">
                  <h4 class="mb-0">24.3M</h4>
                  <p class="mb-0">Followers</p>
                </div>
              </div>
              <hr>
              <div class="d-flex align-items-center justify-content-between">
                <button class="btn btn-light">Message</button>
                <button class="btn btn-primary">Follow</button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-xl-6">
          <div class="card">
            <div class="card-body">
              <div class="row row-cols-1 row-cols-lg-2 g-3">
                <div class="col">
                  <div class="card shadow-none border mb-0">
                    <div class="card-body">
                      <div class="text-center">
                        <img src="<?php echo e(URL::asset('build/images/avatars/07.png')); ?>" width="100" height="100"
                          class="rounded-circle raised bg-white" alt="">
                      </div>
                      <div class="text-center mt-4">
                        <h5 class="mb-2">Michle Web</h5>
                        <p class="mb-0">UI Developer</p>
                      </div>
                      <div class="d-flex align-items-center justify-content-around mt-5">
                        <div class="d-flex flex-column gap-2">
                          <h5 class="mb-0">798</h5>
                          <p class="mb-0">Posts</p>
                        </div>
                        <div class="d-flex flex-column gap-2">
                          <h5 class="mb-0">48K</h5>
                          <p class="mb-0">Following</p>
                        </div>
                        <div class="d-flex flex-column gap-2">
                          <h5 class="mb-0">24.3M</h5>
                          <p class="mb-0">Followers</p>
                        </div>
                      </div>
                      <hr>
                      <div class="d-flex align-items-center justify-content-center gap-3">
                        <a href="javascript:;"
                          class="wh-48 bg-linkedin text-white rounded-circle d-flex align-items-center justify-content-center"><i
                            class="bi bi-linkedin fs-5"></i></a>
                        <a href="javascript:;"
                          class="wh-48 bg-dark text-white rounded-circle d-flex align-items-center justify-content-center"><i
                            class="bi bi-twitter-x fs-5"></i></a>
                        <a href="javascript:;"
                          class="wh-48 bg-facebook text-white rounded-circle d-flex align-items-center justify-content-center"><i
                            class="bi bi-facebook fs-5"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card shadow-none border mb-0">
                    <div class="card-body">
                      <div class="text-center">
                        <img src="<?php echo e(URL::asset('build/images/avatars/08.png')); ?>" width="100" height="100"
                          class="rounded-circle raised bg-white" alt="">
                      </div>
                      <div class="text-center mt-4">
                        <h5 class="mb-2">Andreo Simonds</h5>
                        <p class="mb-0">HR Manager</p>
                      </div>
                      <div class="d-flex align-items-center justify-content-around mt-5">
                        <div class="d-flex flex-column gap-2">
                          <h5 class="mb-0">798</h5>
                          <p class="mb-0">Posts</p>
                        </div>
                        <div class="d-flex flex-column gap-2">
                          <h5 class="mb-0">48K</h5>
                          <p class="mb-0">Following</p>
                        </div>
                        <div class="d-flex flex-column gap-2">
                          <h5 class="mb-0">24.3M</h5>
                          <p class="mb-0">Followers</p>
                        </div>
                      </div>
                      <hr>
                      <div class="d-flex align-items-center justify-content-center gap-3">
                        <a href="javascript:;"
                          class="wh-48 bg-linkedin text-white rounded-circle d-flex align-items-center justify-content-center"><i
                            class="bi bi-google fs-5"></i></a>
                        <a href="javascript:;"
                          class="wh-48 bg-pinterest text-white rounded-circle d-flex align-items-center justify-content-center"><i
                            class="bi bi-youtube fs-5"></i></a>
                        <a href="javascript:;"
                          class="wh-48 bg-whatsapp text-white rounded-circle d-flex align-items-center justify-content-center"><i
                            class="bi bi-whatsapp fs-5"></i></a>
                      </div>
                    </div>
                  </div>
                </div>

              </div><!--end row-->
            </div>
          </div>
        </div>

        <div class="col-12 col-xl-6">
          <div class="card">
            <div class="card-body">
              <div class="row row-cols-1 row-cols-lg-2 g-3">
                <div class="col">
                  <div class="card shadow-none border mb-0 bg-success">
                    <div class="card-body">
                      <div class="text-center">
                        <img src="<?php echo e(URL::asset('build/images/avatars/10.png')); ?>" width="100" height="100"
                          class="rounded-circle raised bg-white p-1" alt="">
                      </div>
                      <div class="text-center mt-4">
                        <h5 class="mb-2 text-white">Andreo Simonds</h5>
                        <p class="mb-0 text-white">HR Manager</p>
                      </div>
                      <div class="d-flex align-items-center justify-content-around mt-5">
                        <div class="d-flex flex-column gap-2">
                          <h5 class="mb-0 text-white">798</h5>
                          <p class="mb-0 text-white">Posts</p>
                        </div>
                        <div class="d-flex flex-column gap-2">
                          <h5 class="mb-0 text-white">48K</h5>
                          <p class="mb-0 text-white">Following</p>
                        </div>
                        <div class="d-flex flex-column gap-2">
                          <h5 class="mb-0 text-white">24.3M</h5>
                          <p class="mb-0 text-white">Followers</p>
                        </div>
                      </div>
                      <hr class="border-light">
                      <div class="d-flex align-items-center justify-content-center gap-3">
                        <a href="javascript:;"
                          class="wh-48 d-flex align-items-center justify-content-center text-white rounded-circle"><i
                            class="bi bi-linkedin fs-5"></i></a>
                        <a href="javascript:;"
                          class="wh-48 d-flex align-items-center justify-content-center text-white rounded-circle"><i
                            class="bi bi-facebook fs-5"></i></a>
                        <a href="javascript:;"
                          class="wh-48 d-flex align-items-center justify-content-center text-white rounded-circle"><i
                            class="bi bi-instagram fs-5"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card shadow-none border mb-0 bg-purple">
                    <div class="card-body">
                      <div class="text-center">
                        <img src="<?php echo e(URL::asset('build/images/avatars/10.png')); ?>" width="100" height="100"
                          class="rounded-circle raised bg-white p-1" alt="">
                      </div>
                      <div class="text-center mt-4">
                        <h5 class="mb-2 text-white">Andreo Simonds</h5>
                        <p class="mb-0 text-white">HR Manager</p>
                      </div>
                      <div class="d-flex align-items-center justify-content-around mt-5">
                        <div class="d-flex flex-column gap-2">
                          <h5 class="mb-0 text-white">798</h5>
                          <p class="mb-0 text-white">Posts</p>
                        </div>
                        <div class="d-flex flex-column gap-2">
                          <h5 class="mb-0 text-white">48K</h5>
                          <p class="mb-0 text-white">Following</p>
                        </div>
                        <div class="d-flex flex-column gap-2">
                          <h5 class="mb-0 text-white">24.3M</h5>
                          <p class="mb-0 text-white">Followers</p>
                        </div>
                      </div>
                      <hr class="border-light">
                      <div class="d-flex align-items-center justify-content-center gap-3">
                        <a href="javascript:;"
                          class="wh-48 d-flex align-items-center justify-content-center text-white rounded-circle"><i
                            class="bi bi-google fs-5"></i></a>
                        <a href="javascript:;"
                          class="wh-48 d-flex align-items-center justify-content-center text-white rounded-circle"><i
                            class="bi bi-pinterest fs-5"></i></a>
                        <a href="javascript:;"
                          class="wh-48 d-flex align-items-center justify-content-center text-white rounded-circle"><i
                            class="bi bi-whatsapp fs-5"></i></a>
                      </div>
                    </div>
                  </div>
                </div>

              </div><!--end row-->
            </div>
          </div>
        </div>
      </div><!--end row-->

<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/Thijsie/Downloads/main-files/Matoxi_Laravel_v1.0.0/Admin/resources/views/component-cards-contact.blade.php ENDPATH**/ ?>