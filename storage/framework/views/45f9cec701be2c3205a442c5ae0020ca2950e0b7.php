
<?php $__env->startSection('title', $data->post_title); ?>
<?php $__env->startSection('brief', $data->post_excerpt); ?>
<?php $__env->startSection('thumbnail', $data->page_thumbnail); ?>
<?php $__env->startSection('meta_keyword', $data->meta_keyword); ?>
<?php $__env->startSection('meta_description', $data->meta_description); ?>
<?php $__env->startSection('content'); ?>
	<!-- banner -->
	    <?php echo $__env->make('themes.default.common.page-banner2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<!-- end banner -->
	 
	<!-- section -->
	<section class="uk-section bg-white uk-position-relative uk-wave-white-top">
		<div class="uk-container">
			<div uk-lightbox>
				<!--  -->
				<?php $__currentLoopData = $data_child; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php if($loop->iteration %2 !=0): ?>
				<div class="uk-grid-collapse uk-flex-middle   uk-img-effect" uk-grid uk-scrollspy="cls: uk-animation-slide-left-small; target:div, p;  delay: 100; repeat: false;">
					<div class="uk-width-1-3@m">
						<div class="uk-media-450 uk-border-rounded">
						    <?php if($value->page_thumbnail): ?>
                          	<a href="<?php echo e(asset('uploads/medium/' . $value->page_thumbnail)); ?>"> <img src="<?php echo e(asset('uploads/medium/' . $value->page_thumbnail)); ?>" alt="" class="uk-effect-1"> </a>
                                    <?php else: ?>
                             <img src="<?php echo e(asset('themes-assets/images/blank.png')); ?>"
                                    alt="<?php echo e($value->post_title); ?>" class="uk-effect-1">
                                <?php endif; ?>
                                                
						
						</div>
					</div>
					<div class="uk-width-expand@m">
						<div class="uk-padding-large uk-text-justify">
 							<div class="uk-margin-small-bottom">
								<h1 class="uk-h2 theme-font-medium-bold text-black"><?php echo e($value->post_title); ?> </h1> </div>
								<?php echo $value->post_excerpt; ?>

						</div>
					</div>
				</div>
				<?php else: ?>
				
				<div class="uk-grid-collapse uk-flex-middle uk-img-effect" uk-grid uk-scrollspy="cls: uk-animation-slide-left-small; target:div, p;  delay: 100; repeat: false;">
					<div class="uk-width-expand@m  uk-flex-last uk-flex-first@m">
						<div class="uk-padding-large">
 							<div class="uk-margin-small-bottom">
								<h1 class="uk-h2 theme-font-medium-bold text-black"><?php echo e($value->post_title); ?></h1> </div>
                	<?php echo $value->post_excerpt; ?>

	                   </div>
					</div>
					<div class="uk-width-1-3@m  uk-flex-first uk-flex-last@m">
						<div class="uk-media-450 uk-border-rounded">
                        <?php if($value->page_thumbnail): ?>
                          	<a href="<?php echo e(asset('uploads/medium/' . $value->page_thumbnail)); ?>"> <img src="<?php echo e(asset('uploads/medium/' . $value->page_thumbnail)); ?>" alt="" class="uk-effect-1"> </a>
                                    <?php else: ?>
                             <img src="<?php echo e(asset('themes-assets/images/blank.png')); ?>"
                                    alt="<?php echo e($value->post_title); ?>" class="uk-effect-1">
                                <?php endif; ?>						
                            </div>
					</div>
				</div>
				<?php endif; ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			
				 
			</div>
		</div>
	</section>
	<!-- end section -->
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('themes.default.common.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sevensummittreks/public_html/resources/views/themes/default/template-patron.blade.php ENDPATH**/ ?>