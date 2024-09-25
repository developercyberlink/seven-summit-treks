
<?php $__env->startSection('trip_title', ''); ?>
<?php $__env->startSection('trip_excerpt', ''); ?>
<?php $__env->startSection('thumbnail', ''); ?>
<?php $__env->startSection('seo_title', ''); ?>
<?php $__env->startSection('meta_keyword', ''); ?>
<?php $__env->startSection('meta_description', ''); ?>
<?php $__env->startSection('content'); ?>
    <!-- trip video and image banner -->
    <!--  <?php if($trip->trip_type == 1): ?>-->
    <!--<section class="uk-cover-container uk-position-relative uk-flex uk-flex-middle uk-background-norepeat uk-background-cover uk-background-top-center"-->
    <!--    uk-parallax="bgy: -100; easing: -2;  " style="background:url(<?php echo e(asset(env('PUBLIC_PATH') . 'uploads/original/' . $video_cat1->thumbnail)); ?>);">-->
    <!--    <?php else: ?>-->
    <!--    <section class="uk-cover-container uk-position-relative uk-flex uk-flex-middle uk-background-norepeat uk-background-cover uk-background-top-center"-->
    <!--    uk-parallax="bgy: -100; easing: -2;  " style="background:url(<?php echo e(asset(env('PUBLIC_PATH') . 'uploads/original/' . $video_cat2->thumbnail)); ?>);">-->
    <!--        <?php endif; ?>-->
            
             <section class="uk-cover-container uk-position-relative uk-flex uk-flex-middle uk-background-norepeat uk-background-cover uk-background-top-center"
        uk-parallax="bgy: -100; easing: -2;  " style="background:url(<?php echo e(asset('uploads/banners/' . $trip->banner)); ?>);">

        <div class="uk-overlay-primary  uk-position-cover "></div>
        <div class="uk-hero-banner-content-inner uk-width-1-1 uk-position-z-index uk-margin-large-top">
            <div class="uk-container  uk-position-relative  uk-flex-middle uk-flex"
                uk-height-viewport="expand: true; min-height: 500;">
                <div class="uk-margin-large-bottom">
                    <h3 class="text-primary uk-margin-small"
                        uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 800; repeat: false;">
                        <a href="javascript:history.back()" class="text-white"><i class="fa fa-chevron-left"
                                aria-hidden="true"></i> Go Back </a>
                    </h3>
                    <h1 class="uk-text-bolder text-white uk-margin-remove"
                        uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 1200; repeat: false;">
                        <?php echo e($trip->trip_title); ?>

                    </h1>
                </div>
            </div>
        </div>
        </div>

    </section>
    <!-- end trip video and image banner -->
    <!--  -->
    <section class="uk-section-small bg-white">
        <div class=" uk-container">
            <div class="uk-grid-small uk-child-width-1-3@s uk-text-center" uk-grid
                uk-scrollspy="cls: uk-animation-slide-top-small; target:.youtube-player;  delay: 300; repeat: false;">
                <!--  -->
                <?php if($trip_videos->count() > 0): ?>
                    <?php $__currentLoopData = $trip_videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div>
                            <div class="uk-position-relative">
                                <div class="youtube-player" data-id="<?php echo e($row->video); ?>"></div>
                                <h5 class="uk-margin-small"> <?php echo e($row->video_caption); ?> </h5>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <div class="text-center"> Videos Not Available! </div>
                <?php endif; ?>
                
                <!--  -->
            </div>
        </div>
    </section>
    <!--  -->
    <!-- end section -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('themes.default.common.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sevensummittreks/public_html/resources/views/themes/default/trip-videos.blade.php ENDPATH**/ ?>