<?php $__env->startSection('title', 'Register'); ?>

<?php $__env->startSection('content'); ?>

  <!--authentication-->

<div class="mx-3 mx-lg-0">
  <div class="card my-5 col-xl-9 col-xxl-8 mx-auto rounded-4 overflow-hidden border-3 p-4">
    <div class="row g-4">
      <div class="col-lg-6 d-flex">
        <div class="card-body">
          <img src="<?php echo e(URL::asset('build/images/logo1.png')); ?>" class="mb-4" width="145" alt="">
          <h4 class="fw-bold">Get Started Now</h4>
          <p class="mb-0">Enter your credentials to login your account</p>
          <div class="row gy-2 gx-0 my-4">
            <div class="col-12 col-lg-12">
              <button class="btn btn-filter py-2 px-4 font-text1 fw-bold d-flex align-items-center justify-content-center w-100">
                <span class="auth-social-login"><img src="<?php echo e(URL::asset('build/images/apps/05.png')); ?>" width="20" class="me-2" alt="">Google</span>
              </button>
            </div>
            <div class="col-12 col-lg-12">
              <button class="btn btn-filter py-2 px-4 font-text1 fw-bold d-flex align-items-center justify-content-center w-100">
                <span class="auth-social-login"><img src="<?php echo e(URL::asset('build/images/apps/17.png')); ?>" width="20" class="me-2" alt="">Facebook</span>
              </button>
            </div>
            <div class="col-12 col-lg-12">
              <button class="btn btn-filter py-2 px-4 font-text1 fw-bold d-flex align-items-center justify-content-center w-100">
                <span class="auth-social-login"><img src="<?php echo e(URL::asset('build/images/apps/18.png')); ?>" width="20" class="me-2" alt="">LinkedIn</span>
              </button>
            </div>
          </div>
          <div class="separator">
            <div class="line"></div>
            <p class="mb-0 fw-bold">OR</p>
            <div class="line"></div>
          </div>
          <div class="form-body mt-4">
            <form class="row g-3" method="POST" action="<?php echo e(route('register')); ?>">
            <?php echo csrf_field(); ?>
              <div class="col-12">
                <label for="inputUsername" class="form-label">Username</label>
                <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" value="<?php echo e(old('name')); ?>" id="inputUsername" placeholder="Enter Name">
                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
              <div class="col-12">
                <label for="inputEmailAddress" class="form-label">Email Address</label>
                <input type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" id="inputEmailAddress" placeholder="example@user.com">
                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
              <div class="col-12">
                <label for="inputChoosePassword" class="form-label">Password</label>
                <div class="input-group" id="show_hide_password">
                  <input type="password" class="form-control border-end-0 <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" id="inputChoosePassword" placeholder="Enter Password"> 
                  <a href="javascript:;" class="input-group-text bg-transparent"><i class="bi bi-eye-slash-fill"></i></a>
                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
              </div>
              <div class="col-12">
                <label for="inputChoosePassword" class="form-label">Confirm Password</label>
                <div class="input-group" id="show_hide_password">
                  <input type="password" class="form-control border-end-0" name="password_confirmation" id="inputChoosePassword" placeholder="Enter Confirm Password"> 
                  <a href="javascript:;" class="input-group-text bg-transparent"><i class="bi bi-eye-slash-fill"></i></a>
                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
              </div>
              
              <div class="col-12">
                <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                  <label class="form-check-label" for="flexSwitchCheckChecked">I read and agree to Terms &amp; Conditions</label>
                </div>
              </div>
              <div class="col-12">
                <div class="d-grid">
                  <button type="submit" class="btn btn-primary">Register</button>
                </div>
              </div>
              <div class="col-12">
                <div class="text-start">
                  <p class="mb-0">Already have an account? <a href="<?php echo e(route('login')); ?>">Sign in here</a></p>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-lg-6 d-lg-flex d-none">
        <div class="p-3 rounded-4 w-100 d-flex align-items-center justify-content-center bg-light">
          <img src="<?php echo e(URL::asset('build/images/auth/register1.png')); ?>" class="img-fluid" alt="">
        </div>
      </div>
    </div><!--end row-->
  </div>
</div>

<!--authentication-->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/Thijsie/Downloads/main-files/Matoxi_Laravel_v1.0.0/Admin/resources/views/auth/register.blade.php ENDPATH**/ ?>