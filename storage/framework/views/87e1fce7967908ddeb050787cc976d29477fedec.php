
<!DOCTYPE html>
<html>
    <head>
        <title>Unsubscribe</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="theme-color" content="#e1a74e">
      <link rel="stylesheet" href="<?php echo e(asset('themes-assets/css/app.css')); ?>" />
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    </head>
    <body>
    <div class="uk-section bg-white uk-flex uk-flex-middle uk-animation-fade" uk-height-viewport>
	<div class="uk-width-1-1">
		<div class="uk-container">
			<div class="uk-grid-margin uk-grid uk-grid-stack" uk-grid>
				<div class="uk-width-1-1@m">

					<div class="uk-margin uk-width-xlarge uk-margin-auto uk-card uk-card-default uk-card-body uk-box-shadow-large">
						<h3 class="uk-text-left">Unsubscribe</h3>
                        <p>We're sorry to see you go! Enter your email address to unsubscribe from this list.</p>
						<form class="uk-floating-form" action="<?php echo e(route('unsubscribe')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
							<div class="uk-margin-medium">
                            <label for="Email">
                                <input type="Email" name="email" id="phone" placeholder="Email"> <span>Email *</span> 
                            </label>
							</div>
	
							<div class="uk-margin">
								<button class="uk-button uk-button-primary uk-button-large uk-width-1-1" type="submit">Unsubscribe</button>
							</div>
						 
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
    </body>
</html>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script type="text/javascript">
// alert('ok');
   <?php if(count($errors) > 0): ?>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            toastr.error("<?php echo e($error); ?>");
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
  <?php if(Session::has('success')): ?> 
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.success("<?php echo e(session('success')); ?>");
  <?php endif; ?>

  <?php if(Session::has('error')): ?>
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.error("<?php echo e(session('error')); ?>");
  <?php endif; ?>
  

</script><?php /**PATH /home/sevensummittreks/public_html/resources/views/themes/default/unsubscribe.blade.php ENDPATH**/ ?>