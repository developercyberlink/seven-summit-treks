
<?php $__env->startSection('content'); ?>
<!-- banner -->
	<section class="uk-cover-container  uk-position-relative   uk-flex uk-flex-middle  uk-background-norepeat uk-background-cover uk-background-top-center" uk-parallax="bgy: -100; easing: -2;  " data-src="https://www.sevensummittreks.com/uploads/original/gear-list-new-hg2wwYpPtRcoIifSAZwCMzrTN0ydLLZW4aRX3Oql.jpg" uk-height-viewport="expand: true; min-height: 450;" uk-img>
		<div class="uk-overlay-primary  uk-position-cover "></div>
		<div class="uk-width-1-1 uk-position-z-index uk-margin-large-top">
			<div class="uk-width-1-1 uk-position-relative" style="z-index: 99;">
				<div class="uk-container    uk-position-relative" uk-scrollspy="cls: uk-animation-fade;  delay: 500; repeat: false">
					<div class=" uk-margin-medium uk-width-large">
						<h1 class=" uk-text-bolder text-white uk-margin-small" uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 400; repeat: false;"><span class="uk-text-bold">Booking</span> </h1> </div>
				</div>
			</div>
		</div>
	</section>
	<!-- end banner -->
<!-- start section -->
<section class="uk-section uk-booking bg-white uk-position-relative">
    <div class="uk-container uk-container-small"
        uk-scrollspy="target:[uk-scrollspy-class], img, h1, h2, h3, h4, h5, h6, hr, .uk-button, li, p; cls: uk-animation-slide-top-small; delay: 50; repeat: false;">
        <div class="uk-text-center uk-card uk-card-default uk-card-body uk-border-rounded">
            <i class="fa fa-check  fa-2x text-green" aria-hidden="true"></i>
            <h1 class="uk-h3 text-green uk-margin-small uk-text-bold">Booking Success!</h1>
            <h1 class="uk-h4  uk-margin-remove">Dear<b> <?php echo e($name); ?></b><p>Thanks for booking!</p></h1>
            <hr class="uk-divider-icon">
            <p><b>Best Wishes</b>
            <br>Seven Summit Treks Pvt. Ltd
            </p>
            <div>
                <a href="<?php echo e(url('/')); ?>" class="uk-button button-primary button-primary-active"><b>Home</b></a>
            </div>
        </div>
    </div>
</section>
<!--end section  -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('themes.default.common.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sevensummittreks/public_html/resources/views/themes/default/booking-success.blade.php ENDPATH**/ ?>