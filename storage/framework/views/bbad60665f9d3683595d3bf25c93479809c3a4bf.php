<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title><?php echo e(config('app.name', 'Cyberlink')); ?></title>
      <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('images/favicon.ico')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('css/login.css')); ?>">
      <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
   </head>
   <body>
      <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
         <div class="container">
            <div class="card login-card">
               <div class="row no-gutters">
                  <div class="col-md-6">
                     <img src="<?php echo e(asset('images/login.jpg')); ?>" alt="login" class="login-card-img">
                    <!--  <p class="text-white font-weight-bold text-center flex-grow align-self-end footer-link text-small">
                        MT. EVEREST EXPEDITION - SOUTH (8848.86 M)
                     </p> -->
                  </div>

                  <div class="col-md-6">
                     <div class="card-body">
                        <div class="brand-wrapper">
                           <img src="<?php echo e(asset('images/logo.svg')); ?>" alt="logo" class="logo">
                        </div>
                          <!-- Error Message -->
                            <?php if(session('status')): ?>
                                <div class="alert alert-success alert-dismissible">
                                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <?php echo e(session('status')); ?>

                                </div>
                            <?php endif; ?>
                        <p class="login-card-description">Sign into your account</p>
                         
                        <form class="needs-validation"  method="POST" action="<?php echo e(route('login')); ?>">
                            <?php echo e(csrf_field()); ?>

                           <div class="form-group">
                              <label for="email" class="sr-only">Username</label>
                              <input type="email" name="email" id="email" class="form-control" value="<?php echo e(old('email')); ?>"  placeholder="Username" required >
                               <?php if($errors->has('email')): ?>
                              <div class="invalid-tooltip">
                                <?php echo e($errors->first('email')); ?>

                              </div>
                               <?php endif; ?>
                           </div>
                           <div class="form-group">
                              <label for="password" class="sr-only">Password</label>
                              <input type="password" name="password" id="password" class="form-control" placeholder="Password" required >
                              <?php if($errors->has('password')): ?>
                              <div class="invalid-tooltip">
                                <?php echo e($errors->first('password')); ?>

                              </div>
                               <?php endif; ?>
                           </div>
                           <div class="form-group mb-4">
                              <label for="pin" class="sr-only">PIN</label>
                              <input type="number" name="pin" id="pin" class="form-control" placeholder="PIN" required>
                              <?php if($errors->has('pin')): ?>
                              <div class="invalid-tooltip">
                                <?php echo e($errors->first('pin')); ?>

                              </div>
                               <?php endif; ?>
                           </div>
                             <!-- Recaptcha Input -->
                            <input type="hidden" id="g_recaptcha_response" name="g_recaptcha_response" />
                           <button id="login" class="btn btn-block login-btn mb-4" type="submit">Sign In</button>                
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </main>
      <script src="https://www.google.com/recaptcha/api.js?render=<?php echo e(env('SITE_KEY')); ?>"></script>
<script>
grecaptcha.ready(function() {
    grecaptcha.execute('<?php echo env("SITE_KEY"); ?>', {action: 'homepage'}).then(function(token) {
      document.getElementById('g_recaptcha_response').value=token;
    });
});
</script>
   </body>
   
</html><?php /**PATH /home/sevensummittreks/public_html/resources/views/auth/login.blade.php ENDPATH**/ ?>