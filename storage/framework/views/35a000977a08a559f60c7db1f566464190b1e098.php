
<?php $__env->startSection('trip_title', $data->trip_title); ?>
<?php $__env->startSection('trip_excerpt', $data->trip_excerpt); ?>
<?php $__env->startSection('thumbnail', $data->thumbnail); ?>
<?php $__env->startSection('seo_title', $data->seo_title); ?>
<?php $__env->startSection('meta_keyword', $data->meta_keyword); ?>
<?php $__env->startSection('meta_description', $data->meta_description); ?>
<?php $__env->startSection('content'); ?>

	<!-- trip video and image banner -->
	<section class="uk-cover-container uk-position-relative uk-flex uk-flex-middle uk-background-norepeat uk-background-cover uk-background-top-center" uk-parallax="bgy: -100; easing: -2;  " style="background:url(<?php echo e(asset('uploads/banners/' . $trip->banner)); ?>);">
		<div class="uk-overlay-primary  uk-position-cover "></div>
		<div class="uk-hero-banner-content-inner uk-width-1-1 uk-position-z-index uk-margin-large-top">
			<div class="uk-container  uk-position-relative  uk-flex-middle uk-flex" uk-height-viewport="expand: true; min-height: 500;">
				<div class="uk-margin-large-bottom">
					<h3 class="text-primary uk-margin-small" uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 800; repeat: false;">
            <a href="javascript:history.back()" class="text-white"><i class="fa fa-chevron-left" aria-hidden="true"></i> Go Back </a>
             </h3>
					<h1 class="uk-text-bolder text-white uk-margin-remove" uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 1200; repeat: false;">
           <?php echo e($data->title); ?>

            </h1> </div>
			</div>
		</div>
		</div>
	</section>
	<!-- end trip video and image banner -->
	<!--  -->
	<!-- section -->
	<section class="uk-section bg-white uk-position-relative uk-wave-white-top" uk-scrollspy="cls: uk-animation-slide-left-small; target:div,  li, img, p, h1;  delay: 50; repeat: false;">
		<div class="uk-container">
			<div>
				<div uk-grid>
					<div class="uk-width-expand@m">
					  <?php echo $data->content; ?>

					</div>

				</div>


			</div>
		</div>
	</section>
	<!-- end section -->
	<!--  -->
	<!-- end section -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('themes.default.common.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sevensummittreks/public_html/resources/views/themes/default/weather-report.blade.php ENDPATH**/ ?>