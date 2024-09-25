<?php $__env->startSection('post_title',$data->title); ?>
<?php $__env->startSection('meta_keyword',$data->meta_keyword); ?>
<?php $__env->startSection('meta_description',$data->meta_description); ?>
<?php $__env->startSection('content'); ?>

	<!-- trip video and image banner -->
	<main>
	    <section class="uk-cover-container uk-position-relative uk-flex uk-flex-middle uk-background-norepeat uk-background-cover uk-background-top-center" 
	    uk-parallax="bgy: -100; easing: -2;  " data-src="<?php echo e(asset('uploads/banners/'.$data->banner)); ?>" uk-img>
		<?php if($data->video && $data->video_status == '1'): ?>
		<div class="uk-position-relative" id="ytbg" data-ytbg-fade-in="true" data-ytbg-mute-button="true" data-youtube="<?php echo e($data->video); ?>"></div>
		 <?php endif; ?>
       	<div class="uk-overlay-primary  uk-position-cover "></div>
		<div class="uk-hero-banner-content-inner uk-width-1-1 uk-position-z-index uk-margin-large-top">
			<div class="uk-container  uk-position-relative  uk-flex-middle uk-flex" uk-height-viewport="expand: true; min-height: 550;">
				<div class="uk-margin-large-bottom">
					<h3 class="uk-text-bolder text-white uk-margin-remove" uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 800; repeat: false;">Trekking </h3>
					<h1 class="uk-text-bolder text-primary uk-margin-remove" uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 1200; repeat: false;">
                             <?php echo e($data->title); ?>

                    </h1>
					<div class="uk-width-1-2@m uk-margin-top text-white uk-text-lead">
						
                          <?php echo $data->sub_title; ?>

                       
					</div>
				</div>
			</div>
		</div>
		</div>
	</section>
	<!-- end trip video and image banner -->
	<!-- section -->
	<section class="uk-section bg-white uk-position-relative" uk-scrollspy="cls: uk-animation-slide-left-small; target:p;  delay: 50; repeat: false">
		<div class="uk-container">
		    <?php if($data->content): ?>
			<div class="uk-spoiler uk-margin-top">
				<div class="<?php echo e($blogLength >= '1111'?'uk-show-more':''); ?>">
					<?php echo $data->content; ?>

				</div>
			</div>
			<?php endif; ?>
			<div class="uk-grid-small uk-child-width-1-2@s uk-text-center uk-margin-medium-top" uk-grid uk-scrollspy="cls: uk-animation-slide-top-small; target:a;  delay: 300; repeat: false;">
				<!--  -->
                <?php if($trips->count() > 0): ?>
                <?php $__currentLoopData = $trips; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <div>
					<a class="uk-list-shine uk-corner-hover uk-cover-container uk-display-block uk-link-toggle " tabindex="0" href="<?php echo e(url('page/'.tripurl($row->uri))); ?>">
						<div class="uk-media-300">
						    <?php if($row->thumbnail): ?>
						     <img class="uk-image" uk-img src="<?php echo e(asset('uploads/original/'.$row->thumbnail)); ?>" alt="<?php echo e($row->trip_title); ?>">
						     <?php else: ?>
						       <img class="uk-image" uk-img src="<?php echo e(asset('themes-assets/images/blank.png')); ?>" alt="<?php echo e($row->trip_title); ?>">
						       <?php endif; ?>
							<!-- corner -->
							<div class="uk-corner-borders uk-corner-borders--left"></div>
							<div class="uk-corner-borders uk-corner-borders--right"></div>
							<!-- end -->
						</div>
						<div class="uk-overlay-primary uk-position-cover"></div>
						<div class="uk-position-center">
							<div class="uk-overlay">
								<h3 class="theme-font-medium-bold uk-margin-remove text-white  uk-text-uppercase">
                                      <?php echo e($row->trip_title); ?></h3> </div>
						</div>
					</a>
				</div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>


				<!--  -->
			</div>
		
		</div>
	</section>
	<!-- end section -->
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('themes.default.common.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sevensummittreks/public_html/resources/views/themes/default/template-triplist.blade.php ENDPATH**/ ?>