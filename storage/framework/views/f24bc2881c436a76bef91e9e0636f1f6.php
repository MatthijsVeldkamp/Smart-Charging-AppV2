

<?php $__env->startSection('title', 'Chart Js'); ?>
<?php $__env->startSection('css'); ?>
	
<?php $__env->stopSection(); ?> 
<?php $__env->startSection('content'); ?>
<?php if (isset($component)) { $__componentOriginal8b54caccbdedc8030792c13949386bbd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8b54caccbdedc8030792c13949386bbd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.page-title','data' => ['title' => 'Charts','pagetitle' => 'Chart Js']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('page-title'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Charts','pagetitle' => 'Chart Js']); ?>
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

        <div class="row">
          <div class="col-12 col-xl-12">
						<div class="card">
              <div class="card-header py-3">
                <div class="d-flex align-items-center justify-content-between">
                  <h5 class="mb-0">Line Chart</h5>
                  <div class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle-nocaret options dropdown-toggle" data-bs-toggle="dropdown">
                      <span class="material-icons-outlined fs-5">more_vert</span>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                      <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                      <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                    </ul>
                  </div>
                </div>
              </div>
							<div class="card-body">
								<div class="chart-container1">
									<canvas id="chart1"></canvas>
								</div>
							</div>
						</div>
          </div>

          <div class="col-12 col-xl-12">
						<div class="card">
              <div class="card-header py-3">
                <div class="d-flex align-items-center justify-content-between">
                  <h5 class="mb-0">Bar Chart</h5>
                  <div class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle-nocaret options dropdown-toggle" data-bs-toggle="dropdown">
                      <span class="material-icons-outlined fs-5">more_vert</span>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                      <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                      <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                    </ul>
                  </div>
                </div>
              </div>
							<div class="card-body">
								<div class="chart-container1">
									<canvas id="chart2"></canvas>
								</div>
							</div>
						</div>
          </div>

          <div class="col-12 col-xl-12">
						<div class="card">
              <div class="card-header py-3">
                <div class="d-flex align-items-center justify-content-between">
                  <h5 class="mb-0">Pie Chart</h5>
                  <div class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle-nocaret options dropdown-toggle" data-bs-toggle="dropdown">
                      <span class="material-icons-outlined fs-5">more_vert</span>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                      <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                      <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                    </ul>
                  </div>
                </div>
              </div>
							<div class="card-body">
								<div class="chart-container1">
									<canvas id="chart3"></canvas>
								</div>
							</div>
						</div>
          </div>

          <div class="col-12 col-xl-12">
						<div class="card">
              <div class="card-header py-3">
                <div class="d-flex align-items-center justify-content-between">
                  <h5 class="mb-0">Donut Chart</h5>
                  <div class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle-nocaret options dropdown-toggle" data-bs-toggle="dropdown">
                      <span class="material-icons-outlined fs-5">more_vert</span>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                      <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                      <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                    </ul>
                  </div>
                </div>
              </div>
							<div class="card-body">
								<div class="chart-container1">
									<canvas id="chart4"></canvas>
								</div>
							</div>
						</div>
          </div>

          <div class="col-12 col-xl-12">
						<div class="card">
              <div class="card-header py-3">
                <div class="d-flex align-items-center justify-content-between">
                  <h5 class="mb-0">Radar Chart</h5>
                  <div class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle-nocaret options dropdown-toggle" data-bs-toggle="dropdown">
                      <span class="material-icons-outlined fs-5">more_vert</span>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                      <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                      <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                    </ul>
                  </div>
                </div>
              </div>
							<div class="card-body">
								<div class="chart-container1">
									<canvas id="chart5"></canvas>
								</div>
							</div>
						</div>
          </div>

          <div class="col-12 col-xl-12">
						<div class="card">
              <div class="card-header py-3">
                <div class="d-flex align-items-center justify-content-between">
                  <h5 class="mb-0">Radar Donut Chart</h5>
                  <div class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle-nocaret options dropdown-toggle" data-bs-toggle="dropdown">
                      <span class="material-icons-outlined fs-5">more_vert</span>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                      <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                      <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                    </ul>
                  </div>
                </div>
              </div>
							<div class="card-body">
								<div class="chart-container1">
									<canvas id="chart6"></canvas>
								</div>
							</div>
						</div>
          </div>

          <div class="col-12 col-xl-12">
						<div class="card">
              <div class="card-header py-3">
                <div class="d-flex align-items-center justify-content-between">
                  <h5 class="mb-0">Horizontal Bar Chart</h5>
                  <div class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle-nocaret options dropdown-toggle" data-bs-toggle="dropdown">
                      <span class="material-icons-outlined fs-5">more_vert</span>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                      <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                      <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                    </ul>
                  </div>
                </div>
              </div>
							<div class="card-body">
								<div class="chart-container1">
									<canvas id="chart7"></canvas>
								</div>
							</div>
						</div>
          </div>

          <div class="col-12 col-xl-12">
						<div class="card">
              <div class="card-header py-3">
                <div class="d-flex align-items-center justify-content-between">
                  <h5 class="mb-0">Mixed Chart</h5>
                  <div class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle-nocaret options dropdown-toggle" data-bs-toggle="dropdown">
                      <span class="material-icons-outlined fs-5">more_vert</span>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                      <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                      <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                    </ul>
                  </div>
                </div>
              </div>
							<div class="card-body">
								<div class="chart-container1">
									<canvas id="chart8"></canvas>
								</div>
							</div>
						</div>
          </div>

          <div class="col-12 col-xl-12">
						<div class="card">
              <div class="card-header py-3">
                <div class="d-flex align-items-center justify-content-between">
                  <h5 class="mb-0">Area Chart</h5>
                  <div class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle-nocaret options dropdown-toggle" data-bs-toggle="dropdown">
                      <span class="material-icons-outlined fs-5">more_vert</span>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                      <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                      <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                    </ul>
                  </div>
                </div>
              </div>
							<div class="card-body">
								<div class="chart-container1">
									<canvas id="chart9"></canvas>
								</div>
							</div>
						</div>
          </div>

        </div><!--end row-->
    
<?php $__env->stopSection(); ?> 
<?php $__env->startSection('scripts'); ?>
  <script src="<?php echo e(URL::asset('build/plugins/chartjs/js/chart.js')); ?>"></script>
	<script src="<?php echo e(URL::asset('build/plugins/chartjs/js/chartjs-custom.js')); ?>"></script>

<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/Thijsie/Downloads/main-files/Matoxi_Laravel_v1.0.0/Admin/resources/views/charts-chartjs.blade.php ENDPATH**/ ?>