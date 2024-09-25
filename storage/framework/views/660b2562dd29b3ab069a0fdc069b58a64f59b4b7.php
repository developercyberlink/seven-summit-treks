
<?php $__env->startSection('post_title',$team->category); ?>
<?php $__env->startSection('meta_keyword',$team->content); ?>
<?php $__env->startSection('meta_description',$team->content); ?>
<?php $__env->startSection('content'); ?>
	<!-- banner -->
	<section class="uk-cover-container   uk-position-relative uk-flex uk-flex-middle uk-background-norepeat uk-background-cover uk-background-bottom-center" 
	uk-parallax="bgy: -100; easing: -2;  " data-src="<?php echo e(asset(env('PUBLIC_PATH').'/uploads/team/' . $team->picture)); ?>" uk-height-viewport="expand: true; min-height: 600;" uk-img>
   <div class="uk-overlay-primary  uk-position-cover "></div>
		<div class="uk-hero-banner-content-inner uk-width-1-1 uk-position-z-index">
			<div class="uk-container ">
				<div class="uk-padding">
					<h1 class="main-title-font uk-text-bolder text-white uk-margin-remove" uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 800; repeat: false;"> 
                   <?php echo e($team->category); ?>

                    </h1>
					<div class="uk-width-1-2@m uk-margin-top" uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 1200; repeat: false;">
						<p class="text-white uk-text-lead uk-margin-remove"><?php echo e($team->content); ?></p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end banner -->
	<!--  -->
	<div class="uk-box-shadow-medium   bg-white  uk-padding-small">
		<div class="uk-container uk-position-relative">
			<!--  -->
			<div uk-slider>
				<div class="uk-position-relative uk-inner-nav">
					<?php if($team_cat->count()>0): ?>
					<div class="uk-slider-container ">
						<ul class="uk-slider-items subnavbar uk-text-center uk-child-width-1-2 uk-child-width-1-4@s uk-child-width-1-4@m">
							<?php $__currentLoopData = $team_cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<li> <a href="<?php echo e(url('team/'.$row->uri)); ?>" class="<?php echo e(($team->uri == $row->uri)?' active':''); ?> "><?php echo e($row->category); ?> </a> </li>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</ul>
					</div>
					<?php endif; ?>
					<div>
						<a class="uk-position-center-left-out btn-custom" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
						<a class="uk-position-center-right-out btn-custom" href="#" uk-slidenav-next uk-slider-item="next"></a>
					</div>
				</div>
			</div>
			<!--  -->
		</div>
	</div>
	<!--  -->
	<!-- section -->
	<?php if($first_team->count()>0): ?>
<section class="uk-section bg-black-light uk-position-relative " uk-scrollspy="cls: uk-animation-slide-left-small; target:.team__item, .team__title ;  delay: 50; repeat: false;">
		<div class="uk-container">
      <div class="uk-child-width-1-4@l uk-child-width-1-4@m uk-child-width-1-2 uk-grid-medium uk-light uk-margin-bottom" uk-grid  uk-scrollspy="cls: uk-animation-slide-left-small; target:  li, img,  small, h4;  delay: 50; repeat: false;">
				<?php $__currentLoopData = $first_team; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<!--  -->
				<div>
                <div class="uk-team-list">
                   <div class="uk-media-350 uk-position-relative">
                      <a href="<?php echo e(url('team/'.$team->uri.'/'.team_url($row['uri'], $row['team_key']))); ?>">
                          <?php if($row->thumbnail): ?>
                      <img src="<?php echo e(asset(env('PUBLIC_PATH').'uploads/team/' . $row->thumbnail)); ?>"> 
                      <?php else: ?>
                      <img src="<?php echo e(asset(env('PUBLIC_PATH').'themes-assets/images/users.jpg')); ?>">
                      <?php endif; ?>
                      </a>
                      <div class="uk-position-center-left uk-margin-small-left uk-social-media-team"> 
                    	<a href="<?php echo e($row->fb_url); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
    					 <a href="<?php echo e($row->instagram_url); ?>" target="_blank"><i class="fa fa-instagram"></i></a> 
    					 <a href="<?php echo e($row->twitter_url); ?>" target="_blank"><i class="fa fa-wikipedia-w"></i></a> 
    					 <!--<a href="<?php echo e($row->linkedin_url); ?>" target="_blank"><i class="fa fa-linkedin"></i></a>  -->
                      </div>
                   </div>
                   <a href="<?php echo e(url('team/'.$team->uri.'/'.team_url($row['uri'], $row['team_key']))); ?>">
                      <h4 class="uk-title  uk-margin-top uk-margin-remove-bottom"><?php echo e($row->name); ?></h4>
                      <small class="text-primary uk-margin-remove"><?php echo e($row->position); ?></small>
                   </a>
                </div>
             </div>
				<!--  -->
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		</div>
	</section>
	<?php endif; ?>
	<!-- end section -->


<?php $__env->stopSection(); ?>
<?php echo $__env->make('themes.default.common.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sevensummittreks/public_html/resources/views/themes/default/template-team.blade.php ENDPATH**/ ?>