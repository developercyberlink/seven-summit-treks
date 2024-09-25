
<?php $__env->startSection('title', $data->page_title); ?>
<?php $__env->startSection('brief', $data->page_excerpt); ?>
<?php $__env->startSection('thumbnail', $data->page_thumbnail); ?>
<?php $__env->startSection('meta_keyword', $data->meta_keyword); ?>
<?php $__env->startSection('meta_description', $data->meta_description); ?>
<?php $__env->startSection('content'); ?>
<!-- banner -->
	<section class="uk-cover-container  uk-position-relative   uk-flex uk-flex-middle  uk-background-norepeat uk-background-cover uk-background-top-center" uk-parallax="bgy: -100; easing: -2;  " data-src="<?php echo e(asset(env('PUBLIC_PATH').'uploads/banners/' . $data->page_banner)); ?>" uk-height-viewport="expand: true; min-height: 450;" uk-img>
		<div class="uk-overlay-primary  uk-position-cover "></div>
		<div class="uk-width-1-1 uk-position-z-index uk-margin-large-top">
			<div class="uk-width-1-1 uk-position-relative" style="z-index: 99;">
				<div class="uk-container    uk-position-relative" uk-scrollspy="cls: uk-animation-fade;  delay: 500; repeat: false">
					<div class=" uk-margin-medium uk-width-xxlarge">
						<h1 class=" uk-text-bolder text-white uk-margin-small" uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 400; repeat: false;"><span class="uk-text-bold">
                          <?php echo e($data->page_title); ?>

                           </span> </h1> </div>
				</div>
			</div>
		</div>
	</section>
	<!-- end banner -->
	<!-- section   -->
	<section class="uk-section bg-white  uk-position-relative">
		<div class="uk-container  ">
			<div uk-grid class="uk-grid">
				<div class="uk-width-expand@m ">
				    <?php if($data->page_thumbnail): ?>
					<div class="uk-media-350 uk-margin uk-position-relative"> <img src="<?php echo e(asset(env('PUBLIC_PATH').'uploads/original/' . $data->page_thumbnail)); ?>" uk-img>
						<div class="uk-image-caption uk-position-bottom uk-padding-small uk-text-white">
							<div class="uk-position-cover uk-overlay-primary"></div>
							<div class="uk-position-relative text-white"><?php echo e($data->sub_title); ?></div>
						</div>
					</div>
					<?php endif; ?>
					
					<?php echo $data->page_content; ?>

					
					 <!--  -->
					 <?php if($doc->count()>0): ?>
                 <div class="uk-grid-small uk-child-width-1-2@s uk-text-center uk-margin-medium-top" uk-grid>
                     <?php $__currentLoopData = $doc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div>
                        <a class="uk-list-shine uk-cover-container uk-display-block uk-link-toggle "
                            tabindex="0" target="_blank"
                            href="<?php echo e(asset('uploads/doc/' . $row->document)); ?>">
                            <?php if($row->thumbnail): ?>
                            <div class="uk-media-150"><img class="uk-image" alt="<?php echo e($row->title); ?>"
                                    uk-img src="<?php echo e(asset('uploads/original/' . $row->thumbnail)); ?>">
                            </div>
                            <?php else: ?>
                            <div class="uk-media-150"><img class="uk-image" alt="<?php echo e($row->title); ?>"
                                    uk-img src="<?php echo e(asset('themes-assets/images/blank.png')); ?>">
                            </div>
                            <?php endif; ?>
                            <div class="uk-overlay-primary uk-position-cover"></div>
                            <div class="uk-position-center">
                                <div class="uk-overlay">
                                    <h4 class="uk-margin-remove text-white uk-text-bold">
                                        <?php echo e($row->title); ?>

                                    </h4>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 
                    </div>
                <?php endif; ?>
            <!--  -->
					
					<?php if($details->count()>0): ?>
					<?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<p><strong><u><?php echo e($row->ordering); ?>. <?php echo e($row->title); ?></u></strong>
						<br/><?php echo $row->content; ?></p>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php endif; ?>
					
				</div>
				<?php if($links->count()>0): ?>
				<div class="uk-width-1-4@m uk-visible@m">
					<!--  -->
					<div class="uk-blog-sidebar " style="z-index: 9;" uk-sticky="offset: 100; bottom: #uk-stop-sticky">
						<h4 class="uk-heading-bullet">Related Links   </h4>
						<div>
							<ul class="uk-list uk-list-divider">
								<?php $__currentLoopData = $links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<li> <a href="<?php echo e(url('info/'.$row->uri)); ?>" class="<?php echo e($row->uri ==  Request::segment(2)?'uk-active':''); ?>"> <?php echo e($row->page_type); ?> </a> </li>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</ul>
						</div>
					</div>
					<!--  -->
				</div>
				<?php endif; ?>
			</div>
			<div id="uk-stop-sticky" class="uk-padding"></div>
		</div>
	</section>
	<!-- section  -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('themes.default.common.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sevensummittreks/public_html/resources/views/themes/default/usefulinfo-detail.blade.php ENDPATH**/ ?>