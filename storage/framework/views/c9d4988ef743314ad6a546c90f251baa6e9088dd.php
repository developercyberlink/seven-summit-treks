
<?php $__env->startSection('title', $data->post_title); ?>
<?php $__env->startSection('brief', $data->post_excerpt); ?>
<?php $__env->startSection('thumbnail', $data->page_thumbnail); ?>
<?php $__env->startSection('meta_keyword', $data->meta_keyword); ?>
<?php $__env->startSection('meta_description', $data->meta_description); ?>
<?php $__env->startSection('content'); ?>
    <!-- banner -->
    <section class="uk-cover-container uk-position-relative uk-flex uk-flex-middle uk-background-norepeat uk-background-cover uk-background-top-center"
        uk-parallax="bgy: -100; easing: -2;  " data-src="<?php echo e(asset('uploads/banners/'.$data->page_banner)); ?>"
        uk-height-viewport="expand: true; min-height: 500;" uk-img>
        <div class="uk-overlay-primary  uk-position-cover "></div>
        <div class="uk-hero-banner-content-inner uk-width-1-1 uk-position-z-index uk-margin-large-top">
            <div class="uk-container">
                <h1 class="uk-text-bolder text-white uk-margin-remove"
                    uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 1200; repeat: false;">
                    <?php echo e($data->post_title); ?>

                </h1>
            </div>
        </div>
    </section>
    <!-- end banner -->
    <!-- section -->
    <section class="uk-section uk-team-single bg-white  uk-position-relative uk-wave-white-top">
        <div class="uk-container">       
        
        

            <?php echo $data->post_content; ?>

        	<div class="uk-grid-medium uk-child-width-1-2 uk-child-width-1-3@l uk-margin-medium-top" uk-grid uk-lightbox uk-scrollspy="cls: uk-animation-slide-left-small; target:div a;  delay: 50; repeat: false;">
                
                <!--  -->
                <?php if($data->post_images->count() > 0): ?>
                    <?php $__currentLoopData = $data->post_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div>
					<a class="uk-list-shine uk-corner-hover uk-cover-container uk-text-bold uk-display-block uk-link-toggle " tabindex="0" href="<?php echo e(asset('uploads/medium/'.$row->file_name)); ?>" data-caption="<?php echo e($row->title); ?>">
						<div class="awards-image"> <img class="uk-image" alt="" uk-img src="<?php echo e(asset('uploads/medium/'.$row->file_name)); ?>">
							<!-- corner -->
							<div class="uk-corner-borders uk-corner-borders--left"></div>
							<div class="uk-corner-borders uk-corner-borders--right"></div>
							<!-- end -->
						</div>
						<div class="uk-overlay-primary uk-position-cover"></div>
						<div class="uk-position-bottom-center">
							<div class="uk-overlay">
								<h3 class="uk-h4 uk-margin-top uk-margin-remove-bottom text-white"><?php echo e($row->title); ?></h3> </div>
						</div>
					</a>
				</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
				<!--  -->
				
            </div>
            
            <?php echo $data->associated_title; ?>

        </div>
    </section>
    <!-- end section -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('themes.default.common.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sevensummittreks/public_html/resources/views/themes/default/template-certificatesDocument.blade.php ENDPATH**/ ?>