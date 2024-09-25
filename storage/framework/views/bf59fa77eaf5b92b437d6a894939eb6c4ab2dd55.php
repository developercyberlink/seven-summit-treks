
<?php $__env->startSection('content'); ?>
	<!-- banner -->
	<section class="uk-cover-container  uk-position-relative   uk-flex uk-flex-middle  uk-background-norepeat uk-background-cover uk-background-top-center" 
	uk-parallax="bgy: -100; easing: -2;" data-src="<?php echo e(asset('themes-assets/images/trip/06.jpg')); ?>" uk-height-viewport="expand: true; min-height: 350;" uk-img>
		<div class="uk-overlay-primary  uk-position-cover "></div>
		<div class="uk-width-1-1 uk-position-z-index uk-margin-large-top">
			<div class="uk-width-1-1 uk-position-relative" style="z-index: 99;">
				<div class="uk-container    uk-position-relative" uk-scrollspy="cls: uk-animation-fade;  delay: 500; repeat: false">
					<div class=" uk-margin-medium ">
						<h2 class=" uk-text-bolder text-white uk-margin-small" uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 400; repeat: false;">Search Result </h2> </div>
					 
				</div>
			</div>
		</div>
	</section>
	<!-- end banner -->
	<!-- section   -->
	<section class=" bg-light uk-section  uk-position-relative ">
		<div class="uk-container">
		  
  <div class="uk-card uk-card-default">
  	<div class="uk-card-header">
      <form action="<?php echo e(route('trip-search')); ?>" method="post">
  		<div class="uk-grid-small  uk-grid" uk-grid="">
              <?php echo csrf_field(); ?>
              <div class="uk-width-expand@s uk-first-column">
                  <div class="uk-search uk-search-default uk-width-1-1">
                      <input id="searchword" class="uk-input " type="text" name="search" placeholder="Search Trips" size="30" maxlength="200" />
                  </div>                          
              </div>
              <div class="uk-width-auto@s">
                  <button class="uk-button uk-button-primary uk-width-1-1" type="submit">Search</button>
              </div>
           </div>
          </form>
          	</div>
          	<div class="uk-card-body">
        
            <?php if($data->where('status','1')->isEmpty() ): ?>
             <p>Result Not Found!</p>
            <?php else: ?>
                 <?php if($data->count() > 0): ?>        
                   <ul class="uk-search-list bg-light">
                        <?php $__currentLoopData = $data->where('status','1'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <li>
                            <a href="<?php echo e(url('page/' . tripurl($row['uri']))); ?>" ><mark><?php echo e($row['trip_title']); ?></mark></a>
                            <p><?php echo $row['trip_excerpt']; ?></p>  
                          </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>    
                    
                 <?php endif; ?>	
            <?php endif; ?> 		
                          
                <?php echo e($data->links('themes.default.common.paginate')); ?>

        
          	</div>  	 
          </div>
		</div>
	</section>
	<!-- section  -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('themes.default.common.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sevensummittreks/public_html/resources/views/themes/default/search-result.blade.php ENDPATH**/ ?>