
<?php $__env->startSection('title', $data->post_title); ?>
<?php $__env->startSection('brief', $data->post_excerpt); ?>
<?php $__env->startSection('thumbnail', $data->page_thumbnail); ?>
<?php $__env->startSection('meta_keyword', $data->meta_keyword); ?>
<?php $__env->startSection('meta_description', $data->meta_description); ?>
<?php $__env->startSection('content'); ?>

    <!-- banner -->
    <?php echo $__env->make('themes.default.common.page-banner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- end banner -->
    <!-- section -->
    <section class="uk-section bg-light uk-position-relative uk-wave-grey-top">

        <div class="uk-container">
            <div class="uk-child-width-1-4@s uk-child-width-1-2 uk-text-center uk-grid-divider uk-grid-small" uk-grid>
                <?php echo $__env->make('themes.default.common.facts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>

        </div>
    </section>

    <!-- end section -->
    <!-- section -->
    <?php if($data_child->count() > 0): ?>
        <section class="uk-section bg-white uk-position-relative uk-wave-white-top">
            <div class="uk-container">
                <div uk-lightbox>
                    <!--  -->
                    <?php $__currentLoopData = $data_child; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="uk-grid-collapse uk-flex-middle   uk-img-effect" uk-grid
                            uk-scrollspy="cls: uk-animation-slide-left-small; target:div, p;  delay: 100; repeat: false;">
                            <?php if($loop->odd): ?>
                                <div class="uk-width-1-3@m">
                                    <div class="uk-media-450 uk-border-rounded">
                                         <?php if($row->page_thumbnail): ?>
                                  	<a href="<?php echo e(asset('uploads/medium/' . $row->page_thumbnail)); ?>"> <img src="<?php echo e(asset('uploads/medium/' . $row->page_thumbnail)); ?>" alt="" class="uk-effect-1"> </a>
                                            <?php else: ?>
                                     <img src="<?php echo e(asset('themes-assets/images/blank.png')); ?>"
                                            alt="<?php echo e($row->post_title); ?>" class="uk-effect-1">
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="uk-width-expand@m">
                                <div class="uk-padding-large uk-text-justify">
                                    <div class="uk-count"> <?php echo e($loop->iteration <= 9 ? '0' : ''); ?> <?php echo e($loop->iteration); ?>

                                    </div>
                                    <div class="uk-margin-small-bottom">
                                        <h1 class="uk-h2 theme-font-medium-bold text-black"> <?php echo e($row->post_title); ?> </h1>
                                    </div>
                                    <?php echo $row->post_content; ?>

                                </div>
                            </div>
                            <?php if($loop->even): ?>
                                <div class="uk-width-1-3@m  uk-flex-first uk-flex-last@m">
                                    <div class="uk-media-450 uk-border-rounded">
                                         <?php if($row->page_thumbnail): ?>
                                  	<a href="<?php echo e(asset('uploads/medium/' . $row->page_thumbnail)); ?>"> <img src="<?php echo e(asset('uploads/medium/' . $row->page_thumbnail)); ?>" alt="" class="uk-effect-1"> </a>
                                            <?php else: ?>
                                     <img src="<?php echo e(asset('themes-assets/images/blank.png')); ?>"
                                            alt="<?php echo e($row->post_title); ?>" class="uk-effect-1">
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>

                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <!--  -->
                    <!--  -->

                </div>
            </div>
        </section>
    <?php endif; ?>
    <!-- end section -->


<?php $__env->stopSection(); ?>

<?php echo $__env->make('themes.default.common.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sevensummittreks/public_html/resources/views/themes/default/template-whyWithUs.blade.php ENDPATH**/ ?>