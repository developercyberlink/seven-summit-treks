<?php $__env->startSection('content'); ?><!-- trip video and image banner -->
<!-- trip video and image banner -->
<section class="uk-cover-container uk-position-relative uk-flex uk-flex-middle uk-background-norepeat uk-background-cover uk-background-top-center" uk-parallax="bgy: -100; easing: -2;  " style="background:url(<?php echo e(asset('uploads/banners/' . $find->banner)); ?>);">
    <!-- <div class="uk-position-relative" id="ytbg" data-ytbg-fade-in="true"  data-ytbg-mute-button="true"   data-youtube="https://www.youtube.com/watch?v=08VavSbp0YU"></div> -->
    <div class="uk-overlay-primary  uk-position-cover "></div>
    <div class="uk-hero-banner-content-inner uk-width-1-1 uk-position-z-index uk-margin-large-top">
        <div class="uk-container  uk-position-relative  uk-flex-middle uk-flex" uk-height-viewport="expand: true; min-height: 500;">
            <div class="uk-margin-large-bottom">
                <h3 class="text-primary uk-margin-small" uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 800; repeat: false;">
                    <a href="javascript:history.back()" class="text-white"><i class="fa fa-chevron-left" aria-hidden="true"></i> Go Back </a>
                </h3>
                <h1 class="uk-text-bolder text-white uk-margin-remove" uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 1200; repeat: false;">
                    Application Process & Payments
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











            <?php $__currentLoopData = $guide; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <h4 class="uk-text-bold text-primary"><?php echo e($value->title); ?></h4>
                <p>
                    <?php echo $value->description; ?>

                </p>
                <?php if($value->images->isNotEmpty()): ?>
                    <div class="uk-grid-medium uk-child-width-1-3@s uk-margin-medium" uk-lightbox uk-grid>
                        <!--  -->
                        <?php $__currentLoopData = $value->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div>
                                <div class="uk-position-relative uk-img-effect">
                                    <a href="<?php echo e(asset('uploads/travel-guide/'.$val->image)); ?>" data-caption="<?php echo e($val->ordering); ?>">
                                        <div class="uk-media-350"> <img src="<?php echo e(asset('uploads/travel-guide/'.$val->image)); ?>" class="uk-effect-1" alt=""> </div>
                                        <h1 class="uk-h6 text-black uk-small-title uk-margin-small"><?php echo e($val->ordering); ?></h1> </a>
                                </div>
                            </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <!--  -->

                    </div>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <!--  -->

        </div>
    </div>
</section>
<!-- end section -->
<!--  -->
<!-- end section -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('themes.default.common.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sevensummittreks/public_html/resources/views/themes/default/application_process.blade.php ENDPATH**/ ?>