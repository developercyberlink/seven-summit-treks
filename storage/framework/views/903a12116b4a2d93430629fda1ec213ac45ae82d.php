
<?php $__env->startSection('title', $data->post_title); ?>
<?php $__env->startSection('brief', $data->post_excerpt); ?>
<?php $__env->startSection('thumbnail', $data->page_thumbnail); ?>
<?php $__env->startSection('meta_keyword', $data->meta_keyword); ?>
<?php $__env->startSection('meta_description', $data->meta_description); ?>
<?php $__env->startSection('content'); ?>
    <div class="uk-history-fixed">
        <ul class="uk-history uk-history-dots">
                <?php if($data_child->count() > 0): ?>
                <?php $__currentLoopData = $data_child; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($loop->iteration == 1): ?>
                        <li><a href="#id1">History </a></li>
                        <?php else: ?>
                        <li><a href="#id<?php echo e($loop->iteration); ?>"> <?php echo e($row->post_title); ?> </a></li>
                    <?php endif; ?>                 
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
        </ul>
    </div>
    <!-- section -->
    <?php echo $__env->make('themes.default.common.page-banner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- end section -->
    <!-- section -->
     <?php if($data_child->count() > 0): ?>

        <?php $__currentLoopData = $data_child; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <section id="id<?php echo e($loop->iteration); ?>" class="uk-background-fixed   uk-position-relative uk-flex uk-flex-middle uk-background-norepeat uk-background-cover uk-background-top-center 
                                           " data-src="<?php echo e(asset('uploads/banners/'.$row['page_banner'])); ?>" uk-img>
                <div class="uk-overlay-history  uk-position-cover "></div>
                <div class="uk-hero-banner-content uk-width-1-1 uk-position-z-index   uk-position-relative">
                    <div class="uk-container uk-flex-middle uk-flex" uk-height-viewport>
                        <div class="uk-section">
                            <!--  -->
                            <div class="uk-grid  text-white uk-flex-middle uk-img-effect" uk-grid
                                uk-scrollspy="cls: uk-animation-slide-left-small; target:div, p;  delay: 100; repeat: false;">

                                <?php if($loop->odd): ?>
                                    <div class="uk-width-1-3@m " uk-lightbox>
                                        <div class="uk-media-450 uk-border-rounded">
                                            <?php if($row->page_thumbnail): ?>
                                            <a href="<?php echo e(asset('uploads/medium/' . $row->page_thumbnail)); ?>"> 
                                            <img src="<?php echo e(asset('uploads/medium/' . $row->page_thumbnail)); ?>"
                                                    alt="<?php echo e($row->post_title); ?>" class="uk-effect-1"> </a>
                                                    <?php else: ?>
                                             <img src="<?php echo e(asset('themes-assets/images/blank.png')); ?>"
                                                    alt="<?php echo e($row->post_title); ?>" class="uk-effect-1">
                                                <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <div class="uk-width-expand@m">
                                    <div class="">
                                        <div class="uk-margin-small-bottom">
                                            <h1 class="uk-margin-remove theme-font-extra-bold  text-primary">
                                                <?php echo e($row->post_title); ?></h1>
                                        </div>
                                        <p><?php echo $row->post_excerpt; ?></p>
                                        <div class="uk-margin">
                                            <a href="<?php echo e(route('page.pagedetail_child',['parenturi'=>$data->uri,'uri'=>$row->uri])); ?>" class="uk-button uk-button-white">
                                                Learn
                                                More
                                                <span class="uk-icon " uk-icon="icon:arrow-right; ratio: 1.5"
                                                    uk-scrollspy="cls: uk-animation-slide-right; delay: 400; repeat: false;"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <?php if($loop->even): ?>
                                    <div class="uk-width-1-3@m  uk-flex-first uk-flex-last@m" uk-lightbox>
                                        <div class="uk-media-450 uk-border-rounded">
                                           <?php if($row->page_thumbnail): ?>
                                            <a href="<?php echo e(asset('uploads/medium/' . $row->page_thumbnail)); ?>"> 
                                            <img src="<?php echo e(asset('uploads/medium/' . $row->page_thumbnail)); ?>"
                                                    alt="<?php echo e($row->post_title); ?>" class="uk-effect-1"> </a>
                                                    <?php else: ?>
                                             <img src="<?php echo e(asset('themes-assets/images/blank.png')); ?>"
                                                    alt="<?php echo e($row->post_title); ?>" class="uk-effect-1">
                                                <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>

                            </div>
                            <!--  -->
                        </div>
                    </div>
                </div>
            </section>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <!-- end section -->

    <div id="uk-stop-sticky"></div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('themes.default.common.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sevensummittreks/public_html/resources/views/themes/default/template-history.blade.php ENDPATH**/ ?>