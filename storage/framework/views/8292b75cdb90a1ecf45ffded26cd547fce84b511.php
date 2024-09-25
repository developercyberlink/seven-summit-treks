
<?php $__env->startSection('title', $data->post_title); ?>
<?php $__env->startSection('brief', $data->post_excerpt); ?>
<?php $__env->startSection('thumbnail', $data->page_thumbnail); ?>
<?php $__env->startSection('meta_keyword', $data->meta_keyword); ?>
<?php $__env->startSection('meta_description', $data->meta_description); ?>
<?php $__env->startSection('content'); ?>
    <!-- banner -->
    <section class="uk-cover-container  uk-position-relative uk-flex uk-flex-middle  uk-background-norepeat uk-background-cover uk-background-top-center"
        uk-parallax="bgy: -100; easing: -2;" data-src="<?php echo e(asset('uploads/banners/' . $data->page_banner)); ?>"
        uk-height-viewport="expand: true; min-height: 500;" uk-img>
        <div class="uk-overlay-primary  uk-position-cover "></div>
        <div class="uk-width-1-1 uk-position-z-index uk-margin-large-top">
            <div class="uk-width-1-1 uk-position-relative" style="z-index: 99;">
                <div class="uk-container    uk-position-relative"
                    uk-scrollspy="cls: uk-animation-fade;  delay: 500; repeat: false">
                    <div class=" uk-margin-medium uk-width-large">
                    <h1 class=" uk-text-bolder text-white uk-margin-small" uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 400; repeat: false;">  <?php echo e($data->post_title); ?></h1>
                       <div class="text-white uk-h5 uk-margin-top uk-margin-remove-bottom"> <?php echo e($data->sub_title); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end banner -->
    <!--  section-->
    <section class="uk-section bg-white uk-position-relative uk-wave-white-top">
        <div class="uk-container uk-position-relative">
            <!--  -->
            <div class="uk-grid-medium" uk-grid
                uk-scrollspy="cls: uk-animation-slide-left-small; target:.uk-article;  delay: 300; repeat: false;">
                 <?php if($latest_blog_post): ?>
                    <div class="uk-position-relative uk-width-1-1">
                        <a class="uk-article uk-inline-clip uk-link-toggle uk-width-1-1" href="<?php echo e(url(geturl($latest_blog_post->uri))); ?>">
                            <div class="uk-overlay-primary  uk-position-cover"></div>
                            <div class="uk-media-500"> 
                            <?php if($latest_blog_post->page_thumbnail): ?>
                            <img class="uk-image" uk-img="" alt="<?php echo e($latest_blog_post->post_title); ?>"
                                    src="<?php echo e(asset('uploads/original/' . $latest_blog_post->page_thumbnail)); ?>"> 
                            <?php else: ?>
                              <img class="uk-image" uk-img="" alt="<?php echo e($latest_blog_post->post_title); ?>"
                                    src="<?php echo e(asset('themes-assets/images/blank.png')); ?>">
                                <?php endif; ?>
                            </div>
                            <div class="uk-position-center uk-padding">
                                <div class="uk-text-left uk-position-z-index">
                                    <div class="uk-width-1-2@m text-white">
                                        <div class="text-white uk-h5 uk-margin-top uk-margin-remove-bottom">
                                            <?php echo e(dateformat($latest_blog_post->post_date)); ?>

                                        </div>
                                        <h2
                                            class="text-white  theme-font-medium-bold uk-margin-small-top uk-margin-small-bottom ">
                                            <?php echo e($latest_blog_post->post_title); ?>

                                        </h2>
                                        <?php echo $latest_blog_post->post_excerpt; ?>

                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endif; ?> 
                </div>
                <!--  -->
              
				  <div class=" uk-child-width-1-2@s uk-child-width-1-3@m  uk-grid-medium uk-grid" uk-grid=""
                    uk-scrollspy="cls: uk-animation-slide-left-small; target:.uk-article;  delay: 300; repeat: false;">
                    <!--  -->
                    <?php if($blogs->count() > 0): ?>
                        <?php $__currentLoopData = $blogs->slice(1,12); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div>
                                <article class="uk-article uk-img-effect">
                                    <div class="uk-margin-small-bottom" property="image">
                                        <a href="<?php echo e(url(geturl($row->uri))); ?>">
                                            <div class="uk-media-200 uk-animated-after"> 
                                            <?php if($row->page_thumbnail): ?>
                                            <img uk-img="" alt="<?php echo e($row->post_title); ?>" src="<?php echo e(asset('uploads/original/' . $row->page_thumbnail)); ?>"
                                                    class="uk-effect-1"> 
                                                    <?php else: ?>
                                            <img uk-img="" alt="<?php echo e($row->post_title); ?>" src="<?php echo e(asset('themes-assets/images/blank.png')); ?>"
                                                    class="uk-effect-1"> 
                                            <?php endif; ?>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="uk-meta uk-text-meta uk-margin-small"><?php echo e(dateformat($row->post_date)); ?>

                                    </div>
                                    <h4 class="uk-margin-remove">
                                        <a class="" href="<?php echo e(url(geturl($row->uri))); ?>">
                                            <?php echo e($row->post_title); ?>

                                        </a>
                                    </h4>
                                </article>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    <!--  -->
                </div>
                <!--  -->
                <?php echo e($blogs->links('themes.default.common.paginate')); ?>


            </div>
    </section>
    <!-- section -->


<?php $__env->stopSection(); ?>

<?php echo $__env->make('themes.default.common.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sevensummittreks/public_html/resources/views/themes/default/template-blog.blade.php ENDPATH**/ ?>