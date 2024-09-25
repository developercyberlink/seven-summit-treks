
<?php $__env->startSection('title', $data->post_title); ?>
<?php $__env->startSection('brief', $data->post_excerpt); ?>
<?php $__env->startSection('thumbnail', $data->page_thumbnail); ?>
<?php $__env->startSection('meta_keyword', $data->meta_keyword); ?>
<?php $__env->startSection('meta_description', $data->meta_description); ?>
<?php $__env->startSection('content'); ?>
    <!-- banner -->
    <section class="uk-cover-container uk-position-relative uk-flex uk-flex-middle uk-background-norepeat uk-background-cover uk-background-top-center uk-position-relative "
        uk-parallax="bgy: -100; easing: -2;" data-src="<?php echo e(asset('uploads/banners/' . $data->page_banner)); ?>" uk-height-viewport="expand: true; min-height: 500;" uk-img>
        <div class="uk-overlay-primary  uk-position-cover "></div>
        <div class="uk-hero-banner-content uk-width-1-1 uk-position-z-index uk-margin-large-top">
            <div class="uk-container ">
            <h3 class=" theme-font-extra-bold text-white uk-margin-remove" uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 800; repeat: false;"> <?php echo e($data->sub_title); ?></h3>
            <h1 class=" theme-font-extra-bold text-primary uk-margin-remove" uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 1200; repeat: false;">
                <?php echo e($data->post_title); ?>

            </h1>
            </div>
        </div>
    </section>
    <!-- end banner -->
    <!-- section -->
    <section class="uk-section bg-white uk-position-relative uk-wave-white-top"
        uk-scrollspy="cls: uk-animation-slide-left-small; target:div,  li, img, p, h1;  delay: 50; repeat: false;">
        <div class="uk-container">
            <div> <?php echo $data->post_content; ?></div>
        </div>
    </section>
    <!-- end section -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('themes.default.common.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sevensummittreks/public_html/resources/views/themes/default/single.blade.php ENDPATH**/ ?>