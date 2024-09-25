
<?php $__env->startSection('title', $pages->page_type); ?>
<?php $__env->startSection('brief', $pages->brief); ?>
<?php $__env->startSection('thumbnail', $pages->image); ?>
<?php $__env->startSection('meta_keyword', $pages->brief); ?>
<?php $__env->startSection('meta_description', $pages->brief); ?>
<?php $__env->startSection('content'); ?>

	<!-- banner -->
	<section class="uk-cover-container  uk-position-relative   uk-flex uk-flex-middle  uk-background-norepeat uk-background-cover uk-background-top-center" uk-parallax="bgy: -100; easing: -2;  " data-src="<?php echo e(asset(env('PUBLIC_PATH').'uploads/original/' . $pages->image)); ?>" uk-height-viewport="expand: true; min-height: 450;" uk-img>
		<div class="uk-overlay-primary  uk-position-cover "></div>
		<div class="uk-width-1-1 uk-position-z-index uk-margin-large-top">
			<div class="uk-width-1-1 uk-position-relative" style="z-index: 99;">
				<div class="uk-container    uk-position-relative" uk-scrollspy="cls: uk-animation-fade;  delay: 500; repeat: false">
					<div class=" uk-margin-medium uk-width-large">
						<h1 class=" uk-text-bolder text-white uk-margin-small" uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 400; repeat: false;"><span class="uk-text-bold"><?php echo e($pages->page_type); ?></span> </h1> </div>
				</div>
			</div>
		</div>
	</section>
	<!-- end banner -->
	<!-- section   -->
	<?php if($data->count()>0): ?>
	<section class="uk-section bg-white  uk-position-relative">
		<div class="uk-container  ">
		    <?php echo $pages->brief; ?>

			<div class="uk-grid-small uk-child-width-1-2@s uk-text-center uk-margin-medium-top" uk-grid uk-scrollspy="cls: uk-animation-slide-top-small; target:a;  delay: 300; repeat: false;">
				<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<!--  -->
				<div >
				    <?php if($row->external_link): ?>
					<a class="uk-list-shine uk-corner-hover uk-cover-container uk-display-block uk-link-toggle " tabindex="0"
					href="<?php echo e($row->external_link); ?>" target="_blank">
					    <?php else: ?>
					    	<a class="uk-list-shine uk-corner-hover uk-cover-container uk-display-block uk-link-toggle " tabindex="0"
					href="<?php echo e(url('info/'.$pages->uri.'/'.teamurl($row['uri'],$row['page_key']))); ?>">
					    	    <?php endif; ?>
						<div class="uk-media-300"> 
						<?php if($row->page_thumbnail): ?>
						<img class="uk-image" alt="" uk-img src="<?php echo e(asset(env('PUBLIC_PATH').'uploads/original/' . $row->page_thumbnail)); ?>">
						<?php else: ?>
							<img class="uk-image" alt="" uk-img src="<?php echo e(asset('themes-assets/images/blank.png')); ?>">
							<?php endif; ?>
						  <!-- corner -->
                     <div class="uk-corner-borders uk-corner-borders--left"></div>
                     <div class="uk-corner-borders uk-corner-borders--right"></div>
                     <!-- end -->
						</div>
						<div class="uk-overlay-primary uk-position-cover"></div>
						<div class="uk-position-center">
							<div class="uk-overlay">
						<h3 class="theme-font-medium-bold uk-margin-remove text-white">
                          <?php echo e($row->page_title); ?>

                          </h3> </div>
						</div>
					</a>
				</div>
				<!--  -->
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		</div>
	</section>
	<?php endif; ?>
	<!-- section  -->


<?php $__env->stopSection(); ?>
<?php echo $__env->make('themes.default.common.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sevensummittreks/public_html/resources/views/themes/default/usefulinfo.blade.php ENDPATH**/ ?>