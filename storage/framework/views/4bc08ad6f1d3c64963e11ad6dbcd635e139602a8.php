
<?php $__env->startSection('title', $data->post_title); ?>
<?php $__env->startSection('brief', $data->post_excerpt); ?>
<?php $__env->startSection('thumbnail', $data->page_thumbnail); ?>
<?php $__env->startSection('meta_keyword', $data->meta_keyword); ?>
<?php $__env->startSection('meta_description', $data->meta_description); ?>
<?php $__env->startSection('content'); ?>
    <!-- banner -->
    <div class="uk-position-relative uk-overflow-hidden">
       <?php if($message->banner): ?>
		<div class="uk-cover-container <?php echo e(($message->published == '1')?'uk-image-blur':''); ?>  uk-position-relative uk-flex uk-flex-bottom uk-background-norepeat uk-background-cover uk-background-center" uk-parallax="bgy: -100; easing: -2;  " data-src="<?php echo e(asset(env('PUBLIC_PATH').'uploads/team/' . $message->banner)); ?>" uk-height-viewport="expand: true; min-height: 600;" uk-img> </div>
		<?php else: ?>
	<div class="uk-cover-container uk-image-blur uk-position-relative uk-flex uk-flex-bottom uk-background-norepeat uk-background-cover uk-background-center" uk-parallax="bgy: -100; easing: -2;  " data-src="<?php echo e(asset(env('PUBLIC_PATH').'uploads/team/' . $message->thumbnail)); ?>" uk-height-viewport="expand: true; min-height: 600;" uk-img> </div>
        <?php endif; ?>
        <div class="uk-overlay-primary  uk-position-cover "></div>
        <div class="uk-width-1-1">
            <div class="  uk-position-bottom-center uk-position-z-index uk-text-center">
                <div class="uk-padding uk-padding-remove-left uk-padding-remove-right uk-text-center">
                    <h1 class="uk-text-bolder text-white uk-margin-medium  "
                        uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 800; repeat: false;">
                      <?php echo e($data->post_title); ?>

                    </h1>
                    <div class="team__single__image uk-margin-auto"
                        uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 1200; repeat: false;"> <img
                            src="<?php echo e(asset(env('PUBLIC_PATH').'uploads/team/' . $message->thumbnail)); ?>" alt="<?php echo e($data->post_title); ?>"> </div>
                    <h2 class=" uk-text-bolder text-primary uk-margin-top uk-margin-remove-bottom"
                        uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 1600; repeat: false;">
                        <?php echo e($data->sub_title); ?>

                    </h2>
                    <h4 class="text-white  uk-text-bolder uk-margin-remove-top  uk-margin-medium-bottom"
                        uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 2000; repeat: false;">Chairman </h4>
                    <div class="uk-position-bottom-center">
                        <div class="uk-social-single uk-grid-collapse  uk-text-center" uk-grid
                            uk-scrollspy="cls: uk-animation-slide-bottom-small; target:div;  delay: 100; repeat: false;">
                            	<div class="uk-facebook"><a href="<?php echo e($message->fb_url); ?>" target="_blank"><i class="fa fa-facebook"></i></a></div>
							<div class="uk-instagram"><a href="<?php echo e($message->instagram_url); ?>" target="_blank"><i class="fa fa-instagram"></i></a></div>
							<div class="uk-twitter"><a href="<?php echo e($message->twitter_url); ?>" target="_blank"><i class="fa fa-twitter"></i></a></div>
							<div class="uk-linkedin"><a href="<?php echo e($message->linkedin_url); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    <!-- end banner -->
    <!-- section -->
    <section class="uk-section uk-team-single  uk-position-relative ">
        <div class="uk-container uk-container-small  ">
            <!--  -->
            <div
                uk-scrollspy="cls: uk-animation-slide-left-small; target:div,  li, img, p, h1, tr;  delay: 50; repeat: false;">
                <?php echo $data->post_excerpt; ?>

                
               <?php if($postimage->count()>0): ?>
				<div class="uk-grid-medium uk-child-width-1-3@s uk-margin-medium" uk-lightbox uk-grid>
					<!--  -->
					<?php $__currentLoopData = $postimage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div>
						<div class="uk-position-relative uk-img-effect">
						<a href="<?php echo e(asset('/uploads/medium/' . $row->file_name)); ?>" data-caption="<?php echo e($row->title); ?>">
							<div class="uk-media-350"> <img src="<?php echo e(asset('/uploads/medium/' . $row->file_name)); ?>" class="uk-effect-1" alt=""> </div>
							<h1 class="uk-h6 text-black uk-small-title uk-margin-small"><?php echo e($row->title); ?></h1> </a>
						</div>
					</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<!--  -->
				</div>
	         		<?php endif; ?>
	         		
	         		 <?php echo $data->post_content; ?>

            </div>
            <!--  -->
        </div>
    </section>
    <!-- end section -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('themes.default.common.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sevensummittreks/public_html/resources/views/themes/default/template-chairmanMessage.blade.php ENDPATH**/ ?>