
<?php $__env->startSection('title', $data->name); ?>
<?php $__env->startSection('brief', $data->position); ?>
<?php $__env->startSection('thumbnail', $data->thumbnail); ?>
<?php $__env->startSection('meta_keyword', $data->brief); ?>
<?php $__env->startSection('meta_description', $data->brief); ?>
<?php $__env->startSection('content'); ?>

	<!-- banner -->
	<div class="uk-position-relative uk-overflow-hidden">
	    <?php if($data->banner): ?>
		<div class="uk-cover-container <?php echo e(($data->published == '1')?'uk-image-blur':''); ?>  uk-position-relative uk-flex uk-flex-bottom uk-background-norepeat uk-background-cover uk-background-center" uk-parallax="bgy: -100; easing: -2;  " data-src="<?php echo e(asset(env('PUBLIC_PATH').'uploads/team/' . $data->banner)); ?>" uk-height-viewport="expand: true; min-height: 600;" uk-img> </div>
		<?php else: ?>
	<div class="uk-cover-container uk-image-blur uk-position-relative uk-flex uk-flex-bottom uk-background-norepeat uk-background-cover uk-background-center" uk-parallax="bgy: -100; easing: -2;  " data-src="<?php echo e(asset(env('PUBLIC_PATH').'uploads/team/' . $data->thumbnail)); ?>" uk-height-viewport="expand: true; min-height: 600;" uk-img> </div>
        <?php endif; ?>
		<div class="uk-overlay-primary  uk-position-cover "></div>
		<div class="uk-hero-banner-content-inner  uk-position-bottom-center uk-position-z-index">
			<div class="uk-width-xlarge uk-text-center">
				<div class="uk-padding uk-padding-remove-left uk-padding-remove-right uk-text-center">
					<div class="team__single__image uk-margin-auto" uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 800; repeat: false;">
					 <img src="<?php echo e(asset(env('PUBLIC_PATH').'uploads/team/' . $data->thumbnail)); ?>" alt="">
					  </div>
					<h2 class="main-title-font uk-text-bolder text-primary uk-margin-top uk-margin-remove-bottom" uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 1200; repeat: false;"> 
              <?php echo e($data->name); ?>

            </h2>
					<h4 class="text-white  uk-text-bolder uk-margin-remove-top  uk-margin-small-bottom" uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 1600; repeat: false;"><?php echo e($data->position); ?> </h4>
					<ul class="uk-child-width-1-2@s uk-text-center uk-grid-small   text-white  uk-margin-medium-bottom" uk-grid uk-scrollspy="cls: uk-animation-slide-left-small; target:div;  delay: 100; repeat: false;">
						<li>
							<div><span class=" uk-margin-small-right" uk-icon="icon: receiver;"></span><?php echo e($data->phone); ?></div>
						</li>
						<li>
							<div> <span class="uk-margin-small-right" uk-icon="icon: mail;"></span> <?php echo e($data->email); ?></div>
						</li>
					</ul>
					<div class="uk-position-bottom-center">
						<div class="uk-social-single uk-grid-collapse  uk-text-center" uk-grid uk-scrollspy="cls: uk-animation-slide-bottom-small; target:div;  delay: 100; repeat: false;">
							<div class="uk-facebook"><a href="<?php echo e($data->fb_url); ?>" target="_blank"><i class="fa fa-facebook"></i></a></div>
							<div class="uk-instagram"><a href="<?php echo e($data->instagram_url); ?>" target="_blank"><i class="fa fa-instagram"></i></a></div>
							<!--<div class="uk-twitter"><a href="<?php echo e($data->twitter_url); ?>" target="_blank"><i class="fa fa-twitter"></i></a></div>-->
							<!--<div class="uk-linkedin"><a href="<?php echo e($data->linkedin_url); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></div>-->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end banner -->
	<!-- section -->
	<section class="uk-section uk-team-single bg-black-light uk-position-relative ">
		<div class="uk-container uk-container-small text-white ">
			<!--  -->
			<div  class="uk-margin-medium-bottom" uk-scrollspy="cls: uk-animation-slide-left-small; target:div,  li, img, p, h1, tr;  delay: 50; repeat: false;">
				<div>
					<?php echo $data->content; ?>

				</div>
				<?php if($mountains->count()>0): ?>
				
				<h1 class="uk-h3 theme-font-medium-bold uk-text-bold text-white uk-heading-line uk-margin-medium"><span>Mountains Summitted by  <?php echo e($data->name); ?></span></h1>
				<div class="uk-overflow-auto uk-margin-bottom">
					<table class="uk-table uk-table-justify uk-table-divider">
						<thead class="thead-default">
							<tr>
								<th>S.N.</th>
								<th>Name of Mountain</th>
								<th>Total Summited</th>
								<th>Summitted Year(s)</th>
							</tr>
						</thead>
						<tbody>

							<?php $__currentLoopData = $mountains; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e($row->ordering); ?></td>
								<td><?php if($row->link): ?>
								<a href="<?php echo e($row->link); ?>" class="text-white"><?php echo e($row->mountain); ?></a><?php else: ?><?php echo e($row->mountain); ?><?php endif; ?></td>
								<td><?php echo e($row->total); ?></td>
								<td><?php echo e($row->year); ?></td>
							</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>							
						</tbody>
					</table>
				</div>
				<?php endif; ?>
			</div>
			<!--  -->

				<!--  -->
				<?php if($achievements->count()>0): ?>
				<div  class="uk-margin-medium-bottom"  uk-scrollspy="cls: uk-animation-slide-left-small; target:div,  li, img, p, h1, tr;  delay: 50; repeat: false;">
			 
				<h1 class="uk-h3 theme-font-medium-bold uk-text-bold text-white uk-heading-line uk-margin-medium"><span>Achievements</span></h1>

				<div class="uk-grid uk-child-width-1-2" uk-grid>
					<div>
						<ul class="uk-list uk-list-hyphen">
						<?php $__currentLoopData = $achievements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						 <?php if($loop->iteration % 2 != 0): ?>
						<li> <?php echo e($row->title); ?></li>
						<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</ul>
					</div>
					<div>
					<ul class="uk-list uk-list-hyphen">
						<?php $__currentLoopData = $achievements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						 <?php if($loop->iteration % 2 == 0): ?>
						<li> <?php echo e($row->title); ?></li>
						<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</ul>
					</div>

				</div>
				 
			</div>
			<?php endif; ?>
			<!--  -->
			<!--  -->
			<?php if($certificates->count()>0): ?>
			<div>
				<h1 class="uk-h3 theme-font-medium-bold uk-text-bold text-white uk-heading-line uk-margin-medium"><span>Certificates & Awards Of <?php echo e($data->name); ?></span></h1>
				<div class="uk-grid-small uk-child-width-1-3@s " uk-grid uk-lightbox uk-scrollspy="cls: uk-animation-slide-left-small; target:div a;  delay: 50; repeat: false;">
					<!--  -->
					<?php $__currentLoopData = $certificates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div>
				<a class="uk-list-shine uk-cover-container uk-text-bold uk-display-block uk-link-toggle " tabindex="0"   href="<?php echo e(asset(env('PUBLIC_PATH').'uploads/team/' . $row->image)); ?>" data-caption="<?php echo e($row->title); ?>">
					<div class="awards-image"> <img class="uk-image" alt="" uk-img src="<?php echo e(asset(env('PUBLIC_PATH').'uploads/team/' . $row->image)); ?>"> </div>
					<div class="uk-overlay-primary uk-position-cover"></div>
					<div class="uk-position-bottom-center">
						<div class="uk-overlay">
							<h3 class="uk-h4 uk-margin-top uk-margin-remove-bottom text-white"><?php echo e($row->title); ?></h3>
						</div>
					</div>
				</a>
				</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<!--  -->


				
				</div>
			</div>
			<?php endif; ?>
			<!--  -->
		</div>
	</section>
	<!-- end section -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('themes.default.common.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sevensummittreks/public_html/resources/views/themes/default/team-single.blade.php ENDPATH**/ ?>