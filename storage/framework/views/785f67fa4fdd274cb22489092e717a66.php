

<?php $__env->startSection('title', 'Alternate'); ?>
<?php $__env->startSection('css'); ?>
	
<?php $__env->stopSection(); ?> 
<?php $__env->startSection('content'); ?>
<?php if (isset($component)) { $__componentOriginal8b54caccbdedc8030792c13949386bbd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8b54caccbdedc8030792c13949386bbd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.page-title','data' => ['title' => 'Forms','pagetitle' => 'Checkboxes']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('page-title'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Forms','pagetitle' => 'Checkboxes']); ?>
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
				
        <h6 class="mb-0 text-uppercase">Default Checkbox</h6>
		<hr>
		<div class="card">
			<div class="card-body">
				<div class="form-check">
					<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
					<label class="form-check-label" for="flexCheckDefault">
						Default checkbox
					</label>
					</div>
					<div class="form-check">
					<input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
					<label class="form-check-label" for="flexCheckChecked">
						Checked checkbox
					</label>
					</div>
			</div>
		</div>

		<h6 class="mb-0 text-uppercase">Color Checkbox</h6>
		<hr>
		<div class="card">
			<div class="card-body">

				<div class="d-flex align-items-center gap-3">
					<div class="form-check form-check-success">
						<input class="form-check-input" type="checkbox" value="" id="flexCheckSuccess">
						<label class="form-check-label" for="flexCheckSuccess">
							Success checkbox
						</label>
						</div>
						<div class="form-check form-check-danger">
						<input class="form-check-input" type="checkbox" value="" id="flexCheckDanger">
						<label class="form-check-label" for="flexCheckDanger">
							Danger checkbox
						</label>
						</div>
						<div class="form-check form-check-warning">
						<input class="form-check-input" type="checkbox" value="" id="flexCheckWarning">
						<label class="form-check-label" for="flexCheckWarning">
							Warning checkbox
						</label>
						</div>
						<div class="form-check form-check-dark">
						<input class="form-check-input" type="checkbox" value="" id="flexCheckDark">
						<label class="form-check-label" for="flexCheckDark">
							Dark checkbox
						</label>
						</div>
						<div class="form-check form-check-secondary">
						<input class="form-check-input" type="checkbox" value="" id="flexCheckSecondary">
						<label class="form-check-label" for="flexCheckSecondary">
							Secondary checkbox
						</label>
						</div>
						<div class="form-check form-check-info">
						<input class="form-check-input" type="checkbox" value="" id="flexCheckInfo">
						<label class="form-check-label" for="flexCheckInfo">
							Info checkbox
						</label>
						</div>


				</div>
					<hr>

				<div class="d-flex align-items-center gap-3">
					<div class="form-check form-check-success">
						<input class="form-check-input" type="checkbox" value="" id="flexCheckCheckedSuccess" checked>
						<label class="form-check-label" for="flexCheckCheckedSuccess">
							Checked Success
						</label> 
						</div>
						<div class="form-check form-check-danger">
						<input class="form-check-input" type="checkbox" value="" id="flexCheckCheckedDanger" checked>
						<label class="form-check-label" for="flexCheckCheckedDanger">
							Checked Success
						</label> 
						</div>
						<div class="form-check form-check-warning">
						<input class="form-check-input" type="checkbox" value="" id="flexCheckCheckedWarning" checked>
						<label class="form-check-label" for="flexCheckCheckedWarning">
							Checked Warning
						</label> 
						</div>
						<div class="form-check form-check-dark">
						<input class="form-check-input" type="checkbox" value="" id="flexCheckCheckedDark" checked>
						<label class="form-check-label" for="flexCheckCheckedDark">
							Checked Dark
						</label> 
						</div>
						<div class="form-check form-check-secondary">
						<input class="form-check-input" type="checkbox" value="" id="flexCheckCheckeSecondary" checked>
						<label class="form-check-label" for="flexCheckCheckeSecondary">
							Checked Secondary
						</label> 
						</div>
						<div class="form-check form-check-info">
						<input class="form-check-input" type="checkbox" value="" id="flexCheckCheckedInfo" checked>
						<label class="form-check-label" for="flexCheckCheckedInfo">
							Checked Info
						</label> 
						</div>


				</div>

			</div>
		</div>

		<h6 class="mb-0 text-uppercase">Radios</h6>
		<hr>
		<div class="card">
			<div class="card-body">
				<div class="d-flex align-items-center gap-3">
					<div class="form-check">
						<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
						<label class="form-check-label" for="flexRadioDefault1">
							Default radio
						</label>
						</div>
						<div class="form-check form-check-success">
						<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioSuccess">
						<label class="form-check-label" for="flexRadioSuccess">
							Success radio
						</label>
						</div>
						<div class="form-check form-check-danger">
						<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDanger">
						<label class="form-check-label" for="flexRadioDanger">
							Danger radio
						</label>
						</div>
						<div class="form-check form-check-warning">
						<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioWarning">
						<label class="form-check-label" for="flexRadioWarning">
							Warning radio
						</label>
						</div>
						<div class="form-check form-check-dark">
						<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDark">
						<label class="form-check-label" for="flexRadioDark">
							Dark radio
						</label>
						</div>
						<div class="form-check form-check-secondary">
						<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioSecondary">
						<label class="form-check-label" for="flexRadioSecondary">
							Secondary radio
						</label>
						</div>
						<div class="form-check form-check-info">
						<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioInfo">
						<label class="form-check-label" for="flexRadioInfo">
							Info radio
						</label>
						</div>
				</div>
			</div>
		</div>

		<h6 class="mb-0 text-uppercase">Switches</h6>
		<hr>
		<div class="card">
			<div class="card-body">
				<div class="d-flex align-items-center gap-3">
					<div class="form-check form-switch">
						<input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault1" checked>
						<label class="form-check-label" for="flexSwitchCheckDefault1">Default Switch</label>
						</div>
					<div class="form-check form-switch form-check-success">
						<input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckSuccess" checked>
						<label class="form-check-label" for="flexSwitchCheckSuccess">Success Switch</label>
						</div>
						<div class="form-check form-switch form-check-danger">
						<input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDanger" checked>
						<label class="form-check-label" for="flexSwitchCheckDanger">Danger Switch</label>
						</div>
						<div class="form-check form-switch form-check-warning">
						<input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckWarning" checked>
						<label class="form-check-label" for="flexSwitchCheckWarning">Warning Switch</label>
						</div>
						<div class="form-check form-switch form-check-dark">
						<input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDark" checked>
						<label class="form-check-label" for="flexSwitchCheckDark">Dark Switch</label>
						</div>
						<div class="form-check form-switch form-check-secondary">
						<input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckSecondary" checked>
						<label class="form-check-label" for="flexSwitchCheckSecondary">Secondary Switch</label>
						</div>
						<div class="form-check form-switch form-check-info">
						<input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckInfo" checked>
						<label class="form-check-label" for="flexSwitchCheckInfo">Infi Switch</label>
						</div>
				

				</div>
			</div>
		</div>

<?php $__env->stopSection(); ?>   
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/Thijsie/Downloads/main-files/Matoxi_Laravel_v1.0.0/Admin/resources/views/form-radios-and-checkboxes.blade.php ENDPATH**/ ?>