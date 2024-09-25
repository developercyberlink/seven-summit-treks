
<?php $__env->startSection('title', $data->post_title); ?>
<?php $__env->startSection('brief', $data->post_excerpt); ?>
<?php $__env->startSection('thumbnail', $data->page_thumbnail); ?>
<?php $__env->startSection('meta_keyword', $data->meta_keyword); ?>
<?php $__env->startSection('meta_description', $data->meta_description); ?>
<?php $__env->startSection('content'); ?>
 <!-- trip video and image banner -->
   <section class="uk-cover-container uk-position-relative uk-flex uk-flex-middle uk-background-norepeat uk-background-cover uk-background-top-center" uk-parallax="bgy: -100; easing: -2;  " style="background:url(<?php echo e(asset('uploads/banners/'.$data->page_banner)); ?>);">
      <!-- <div class="uk-position-relative" id="ytbg" data-ytbg-fade-in="true" data-ytbg-mute-button="true" data-youtube="https://www.youtube.com/watch?v=Lbo_zR3HuIA"></div> -->
      <div class="uk-overlay-primary  uk-position-cover "></div>
      <div class="uk-hero-banner-content-inner uk-width-1-1 uk-position-z-index uk-margin-large-top">
         <div class="uk-container  uk-position-relative  uk-flex-middle uk-flex" uk-height-viewport="expand: true; min-height: 500;">
            <div class="uk-margin-large-bottom">
               <h3 class="uk-text-bolder text-white uk-margin-remove" uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 800; repeat: false;"><?php echo e($data->sub_title); ?> </h3>
               <h1 class="uk-text-bolder text-primary uk-margin-remove" uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 1200; repeat: false;"><?php echo e($data->post_title); ?></h1> </div>
         </div>
      </div>
      </div>
   </section>
   <!-- end trip video and image banner -->
	<!-- section -->
	<section class="uk-section uk-position-relative ">
		<div class="uk-container">
			<!--  -->
			<div uk-scrollspy="cls: uk-animation-slide-left-small; target:div,  li, img, p, h1, tr;  delay: 50; repeat: false;">
			    <?php echo $data->post_excerpt; ?>

				 <?php if($postimage->count()>0): ?>
				<div class="uk-grid-medium uk-child-width-1-3@s uk-margin-medium" uk-lightbox uk-grid>
					<!--  -->
					<?php $__currentLoopData = $postimage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div>
						<div class="uk-position-relative uk-img-effect">
						<a href="<?php echo e(asset('/uploads/medium/' . $row->file_name)); ?>" data-caption="<?php echo e($row->title); ?>">
							<div class="uk-media-400"> <img src="<?php echo e(asset('/uploads/medium/' . $row->file_name)); ?>" class="uk-effect-1" alt=""> </div>
							<h1 class="uk-h6 text-black uk-small-title uk-margin-small"><?php echo e($row->title); ?></h1> </a>
						</div>
					</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<!--  -->
				</div>
	         		<?php endif; ?>
			</div>
			<!--  -->
		</div>
	</section>
	<!-- end section -->

	 
   <!-- section -->
	<section class="uk-section-large bg-black uk-position-relative ">
		<div class="uk-container text-white "> 
				<!--  -->
                	<?php echo $data->associated_title; ?>		
                <!--  --> 

       <?php if($data_child->count() > 0): ?>
		<div uk-slider="sets: false; autoplay: true; autoplay-interval: 4000; finite: false;" class="uk-position-relative uk-visible-toggle uk-light uk-margin-large-top" tabindex="-1">

    <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-4@m uk-grid">
          <?php $__currentLoopData = $data_child; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li>
            <div class="uk-panel">
                <?php if($row->page_thumbnail): ?>
                 <img src="<?php echo e(asset('uploads/original/'.$row->page_thumbnail)); ?>" alt="" width="80">
                 <?php else: ?>
              <img src="<?php echo e(asset('themes-assets/images/reward/logo.png')); ?>" alt="" width="80">
              <?php endif; ?>
                <p><?php echo e($row->post_title); ?></p>
             </div>
        </li> 
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>

  <!--   <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
  <!--  <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a> -->
    <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin-large uk-margin-remove-bottom"></ul>

</div>
<?php endif; ?>
		</div>



	</section>
	<!-- end section -->

	<!-- section -->
	<section class="uk-section uk-position-relative ">
		<div class="uk-container">
			<!--  -->
			<div uk-scrollspy="cls: uk-animation-slide-left-small; target:div,  li, img, p, h1, tr;  delay: 50; repeat: false;">
				
             <?php echo $data->post_content; ?>

			</div>
			<!--  -->
		</div>
	</section>
	<!-- end section -->
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('themes.default.common.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sevensummittreks/public_html/resources/views/themes/default/template-reward.blade.php ENDPATH**/ ?>