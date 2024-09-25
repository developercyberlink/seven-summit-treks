
<?php $__env->startSection('title', $data->post_title); ?>
<?php $__env->startSection('brief', $data->post_excerpt); ?>
<?php $__env->startSection('thumbnail', $data->page_thumbnail); ?>
<?php $__env->startSection('meta_keyword', $data->meta_keyword); ?>
<?php $__env->startSection('meta_description', $data->meta_description); ?>

<?php $__env->startSection('content'); ?>
    <!-- banner -->
    <section  class="uk-cover-container  uk-position-relative uk-flex uk-flex-middle  uk-background-norepeat uk-background-cover uk-background-bottom-center"
        uk-parallax="bgy: -100; easing: -2;  " data-src="<?php echo e(asset('uploads/banners/' . $data->page_banner)); ?>"
        uk-height-viewport="expand: true; min-height: 700;" uk-img>
        <div class="uk-overlay-primary  uk-position-cover "></div>
        <div class="uk-width-1-1 uk-position-z-index uk-margin-large-top">
            <div class="uk-width-1-1 uk-position-relative" style="z-index: 99;">
                <div class="uk-container uk-position-relative"
                    uk-scrollspy="cls: uk-animation-fade;  delay: 500; repeat: false">
                    <div class=" uk-margin-medium uk-width-xxlarge">
                        <h1 class=" uk-text-bolder text-white uk-margin-small"
                            uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 400; repeat: false;">
                            <?php echo $data->post_excerpt; ?>

                        </h1>
                        <div class="text-white uk-h5 uk-margin-top uk-margin-remove-bottom">
                            <?php echo e(dateformat($data->post_date)); ?>

                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- end banner -->
    <!--  section-->
    <section class="uk-section bg-white  uk-position-relative uk-wave-white-top">
        <div class="uk-container uk-position-relative"
            uk-scrollspy="cls: uk-animation-slide-top-small; target: p, img;  delay: 50; repeat: false;">
            <div uk-grid class="uk-grid-medium uk-grid-divider">
                <div class="uk-width-expand@m ">
                    <div class="uk-padding uk-padding-remove-left uk-padding-remove-right">
                        <?php echo $data->post_content; ?>

                           <!-- ShareThis BEGIN -->
                       <div class="uk-share-button">
                          <p> Share with friends</p>
                          <div class="uk-align-left sharethis-inline-share-buttons"></div>
                       </div>
                       <!-- ShareThis END -->
                    </div>
                </div>
                <div class="uk-width-1-3@m uk-visible@m">
                    <!--  -->
                    <div class="uk-blog-sidebar uk-padding uk-padding-remove-left uk-padding-remove-right "
                        style="z-index: 9;" uk-sticky="offset: 100; bottom: #uk-stop-sticky">
                        <div
                            uk-scrollspy="cls: uk-animation-slide-left-small; target:div, li, h3;  delay: 100; repeat: false;">
                            <h3 class="uk-heading-bullet">Latest Blog Posts</h3>
                            <ul class="uk-list uk-list-large uk-list-divider">
                                <?php if($latest_posts->count() > 0): ?>
                                    <?php $__currentLoopData = $latest_posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <a class="uk-display-block" href="<?php echo e(url(geturl($row->uri))); ?>">
                                                <div class="uk-grid uk-grid-small">
                                                    <div class="uk-width-1-3">
                                                        <?php if($row->page_thumbnail): ?>
                                                            <img src="<?php echo e(asset('uploads/original/' . $row->page_thumbnail)); ?>"
                                                                alt="<?php echo e($row->post_title); ?>">
                                                        <?php else: ?>
                                                            <img src="<?php echo e(asset('themes-assets/images/blank.png')); ?>"
                                                                alt="<?php echo e($row->post_title); ?>">
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="uk-width-expand">
                                                        <h5><?php echo $row->post_excerpt; ?></h5>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <p>Post Not Avalable!</p>
                                <?php endif; ?>


                            </ul>
                        </div>
                    </div>
                    <!--  -->
                </div>
            </div>
            <div id="uk-stop-sticky"></div>
        </div>
        </div>
    </section>
    <!-- section -->


<?php $__env->stopSection(); ?>

<?php echo $__env->make('themes.default.common.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sevensummittreks/public_html/resources/views/themes/default/blog-single.blade.php ENDPATH**/ ?>