
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
   <!-- section -->
	<section class="uk-section bg-white uk-position-relative uk-wave-white-top" uk-scrollspy="cls: uk-animation-slide-left-small; target:div,  li, img, p, h1;  delay: 50; repeat: false;">
		<div class="uk-container">
			<div>
			     <?php echo $data->post_excerpt; ?>

			   
			   <?php if($postimage->count()>0): ?>
				<div class="uk-grid-medium uk-child-width-1-3@s uk-margin-medium" uk-lightbox uk-grid>
					<!--  -->
					<?php $__currentLoopData = $postimage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div>
						<div class="uk-position-relative uk-img-effect">
						<a href="<?php echo e(asset('/uploads/medium/' . $row->file_name)); ?>" data-caption="<?php echo e($row->title); ?>">
							<div class="uk-media-500"> <img src="<?php echo e(asset('/uploads/medium/' . $row->file_name)); ?>" class="uk-effect-1" alt=""> </div>
							<h1 class="uk-h6 text-black uk-small-title uk-margin-small"><?php echo e($row->title); ?></h1> </a>
						</div>
					</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<!--  -->
					
				</div>
	         		<?php endif; ?>
	         		
	         		<?php echo $data->post_content; ?>

	            </div>
		</div>
	</section>
	<!-- end section -->
    <!-- end section -->


<?php $__env->stopSection(); ?>

<?php echo $__env->make('themes.default.common.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sevensummittreks/public_html/resources/views/themes/default/template-whoWeAre.blade.php ENDPATH**/ ?>