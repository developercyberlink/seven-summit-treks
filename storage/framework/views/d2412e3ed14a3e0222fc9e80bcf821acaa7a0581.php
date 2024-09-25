    <!--title end -->
     <div id="itinerary" class="uk-single-section">
            <div class="uk-width-1-1">
        <ul uk-accordion class="uk-accordion uk-accordion-outline uk-itinerary">
            
             <?php $__currentLoopData = $data['itinerary']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <!--<li class="<?php echo e($loop->iteration == 1 ? 'uk-open' : ''); ?>">-->
                <li>
                   <div class="uk-accordion-title  uk-itinerary-title">
                    <div class="uk-grid-small uk-flex-middle " uk-grid uk-tooltip="title:Day <?php echo e($row->days); ?> ; pos:top-left;" title="Day <?php echo e($row->days); ?>">
                       <div class="uk-width-auto@m uk-text-center">
                          <div class="uk-day uk-margin-small-right"> Day <?php echo e($row->days); ?> </div>
                       </div>
                       <div class="uk-width-expand@m">
                          <div class="uk-width-1-1">
                             <h5 class="uk-margin-remove theme-font-medium">  <?php echo e($row->title); ?> </h5>
                          </div>
                          <div class="uk-flex uk-flex-middle" uk-grid>
                                <?php if($row->meals): ?>
                                <div>
                             <div class="uk-itinerary-small-title uk-margin-medium-right"><i class="fa fa-cutlery text-primary uk-margin-small-right" aria-hidden="true"></i>  <span><?php echo e($row->meals); ?></span></div>
                             </div>
                             <?php endif; ?>
                             <?php if($row->accomodation): ?>
                             <div>
                             <div class="uk-itinerary-small-title"><i class="fa fa-bed text-primary uk-margin-small-right" aria-hidden="true"></i>  <span><?php echo e($row->accomodation); ?></span></div>
                             </div>
                             <?php endif; ?>
                          </div>
                       </div>
                    </div>
                 </div>
                 <div class="uk-accordion-content uk-itinerary-content">
                    <p><?php echo e($row->content); ?></p>                    
                    </div>
              </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
            
              
        </ul>
     </div>
        </div>

<!-- end Itinerary -->

<!-- start Map -->
<?php if($data['trip']->trip_map): ?>
    <div id="map" class="uk-single-section">
         <!--title -->
        <div class="uk-main-title   uk-margin-medium-bottom uk-display-block uk-text-left">
            <h1
                class="uk-h4 uk-heading-line  uk-text-left  uk-position-relative text-black  uk-text-uppercase uk-margin-remove">
                <span class="theme-font-extra-bold"> <i
                        class="fa fa-map text-primary uk-margin-small-right"></i> Route Map</span>
            </h1>
        </div>
         <!--title end -->
        <div class="uk-gallery" uk-lightbox>
            <div>
                <a href="<?php echo e(asset('uploads/original/' . $data['trip']->trip_map)); ?>"
                    data-caption="<?php echo e($data['trip']->trip_title); ?>"> <img
                        src="<?php echo e(asset('uploads/original/' . $data['trip']->trip_map)); ?>"
                        alt="<?php echo e($data['trip']->trip_title); ?>" />
                </a>
            </div>
        </div>
    </div>
<?php endif; ?>
 <!--end Map -->

<!-- start  Cost Includes -->

<?php if($data['cost_inc']->count() > 0): ?>
    <div id="cost-includes" class="uk-single-section">
           <!-- title -->
        <div class="uk-main-title uk-margin-medium-bottom uk-display-block uk-text-left">
            <h1 class="uk-h4 uk-heading-line  uk-text-left  uk-position-relative text-black  uk-text-uppercase uk-margin-remove">
                <span class="theme-font-extra-bold"> 
                    <i class="fa fa-check-circle-o text-primary uk-margin-small-right"></i>
                    Cost Includes </span>
               
            </h1>
        </div>

        <!-- title end -->
        <ul class=" uk-includes">
            <?php $__currentLoopData = $data['cost_inc']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><strong><?php echo e(strtoupper($row->title)); ?></strong> : <?php echo e($row->content); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </ul>
    </div>
<?php endif; ?>

<!-- end  Cost Includes -->

<!-- start  Cost excludes -->
<?php if($data['cost_exc']->count() > 0): ?>
    <div id="cost-excludes" class="uk-single-section">
        <!-- title -->
        <div class="uk-main-title   uk-margin-medium-bottom uk-display-block uk-text-left">
            <h1
                class="uk-h4 uk-heading-line  uk-text-left  uk-position-relative text-black  uk-text-uppercase uk-margin-remove">
                <span class="theme-font-extra-bold"> <i
                        class="fa fa-times-circle text-primary uk-margin-small-right"></i> Cost
                    Excludes</span>
            </h1>
        </div>
        <!-- title end -->
        <ul class=" uk-excludes">
            <?php $__currentLoopData = $data['cost_exc']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><strong> <?php echo e(strtoupper($row->title)); ?> </strong>: <?php echo e($row->content); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?><?php /**PATH /home/sevensummittreks/public_html/resources/views/themes/default/Itinerary_filter.blade.php ENDPATH**/ ?>