
<?php $__env->startSection('title', $data->title); ?>
<?php $__env->startSection('brief', $data->content); ?>
<?php $__env->startSection('thumbnail', $data->thumbnail); ?>
<?php $__env->startSection('meta_keyword', $data->content); ?>
<?php $__env->startSection('meta_description', $data->content); ?>
<?php $__env->startSection('content'); ?>
    <!-- trip video and image banner -->
    <section class="uk-cover-container uk-position-relative uk-flex uk-flex-middle uk-background-norepeat uk-background-cover uk-background-top-center"
        uk-parallax="bgy: -100; easing: -2;  " style="background:url(<?php echo e(asset('uploads/original/' . $data->banner)); ?>);">
        <div class="uk-overlay-primary  uk-position-cover "></div>
        <div class="uk-hero-banner-content-inner uk-width-1-1 uk-position-z-index uk-margin-large-top">
            <div class="uk-container  uk-position-relative  uk-flex-middle uk-flex"
                uk-height-viewport="expand: true; min-height: 500;">
                <div class="uk-margin-large-bottom">
                    <h3 class="uk-text-bolder text-white uk-margin-remove" 
                        uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 800; repeat: false;">Expeditions </h3>
                    <h1 class="uk-text-bolder text-primary uk-margin-remove"
                        uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 1200; repeat: false;">
                        <?php echo e($data->title); ?>

                    </h1>
                </div>
            </div>
        </div>
        </div>
    </section>

    <!-- end trip video and image banner -->
    <!-- section -->

   <section class="uk-section   bg-white uk-position-relative  " uk-scrollspy="cls: uk-animation-slide-left-small; target:p;  delay: 50; repeat: false">
        <div class="uk-container">

            <div class="tab-wrapper">
                <ul class="uk-flex-center uk-home-tab uk-margin-medium-bottom" data-uk-tab="{connect:'#hometab'}"
                    uk-scrollspy="cls: uk-animation-slide-left-small; target:a;  delay: 100; repeat: false">
                    <li><a href="" class="theme-font-extra-bold ">All</a></li>
                    <?php if($expeditionGroup->count(0 > 0)): ?>
                        <?php $__currentLoopData = $expeditionGroup; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><a href="" class="theme-font-extra-bold "> <?php echo e($row->group_title); ?> </a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </ul>
                <ul id="home-tab" class="uk-switcher uk-margin-small">
                    <!--  -->
                    <?php if($trips->count() > 0): ?>
                        <li>
                            <div class="uk-grid-small   uk-child-width-1-2@s uk-text-center" uk-grid uk-scrollspy="cls: uk-animation-slide-left-small; target:a;  delay: 100; repeat: false">

                                <!--  -->
                                <?php $__currentLoopData = $trips; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  
                                      <div>
                                    <a class="uk-list-shine uk-corner-hover uk-cover-container uk-display-block uk-link-toggle " tabindex="0" href="<?php echo e(url('page/' . tripurl($row->uri))); ?>">
                                       <div class="uk-media-300"> 
                                        <?php if($row->thumbnail): ?>
                                            <img class="uk-image" alt="<?php echo e($row->trip_title); ?>" uk-img
                                                src="<?php echo e(asset('uploads/original/' . $row->thumbnail)); ?>">
                                        <?php else: ?>
                                            <img class="uk-image" alt="<?php echo e($row->trip_title); ?>" uk-img
                                                src="<?php echo e(asset('themes-assets/images/blank.png')); ?>">
                                        <?php endif; ?>
                                                           
                                          <!-- corner -->
                                          <div class="uk-corner-borders uk-corner-borders--left"></div>
                                          <div class="uk-corner-borders uk-corner-borders--right"></div>
                                          <!-- end -->
                                       </div>
                                       <div class="uk-overlay-primary uk-position-cover"></div>
                                       <div class="uk-position-center">
                                          <div class="uk-overlay">
                                             <h3 class="theme-font-medium-bold uk-margin-remove text-white  uk-text-uppercase">
                                            <?php echo e($row->trip_title); ?>

                                          </h3> </div>
                                       </div>
                                    </a>
                                 </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <!--  -->
                            </div>
                        </li>
                    <?php endif; ?>

                    <!--  -->

                    <?php if($expeditionGroup->count(0 > 0)): ?>
                        <?php $__currentLoopData = $expeditionGroup; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <div class="uk-text-center uk-padding uk-padding-remove-top">
                                    <?php echo e($row->description); ?></p>

                                </div>
                                  <div class="uk-grid-small   uk-child-width-1-2@s uk-text-center" uk-grid uk-scrollspy="cls: uk-animation-slide-left-small; target:div>a;  delay: 100; repeat: false">

                                    <!--  -->
                                    <?php $__currentLoopData = tripfilter_tripgroup($row->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($row->expedition_group_id == $row->id) continue; ?>
                                        <div>
                                            
                                           <a class="uk-list-shine uk-corner-hover uk-cover-container uk-display-block uk-link-toggle"
                                            tabindex="0" href="<?php echo e(url('page/' . tripurl($row->uri))); ?>">
                                                <div class="uk-media-300">
                                                    <?php if($row->thumbnail): ?>
                                                        <img class="uk-image" alt="<?php echo e($row->trip_title); ?>" uk-img
                                                            src="<?php echo e(asset('uploads/original/' . $row->thumbnail)); ?>">
                                                    <?php else: ?>
                                                        <img class="uk-image" alt="<?php echo e($row->trip_title); ?>" uk-img
                                                            src="<?php echo e(asset('themes-assets/images/blank.png')); ?>">
                                                    <?php endif; ?>

                                                </div>
                                                <div class="uk-overlay-primary uk-position-cover"></div>
                                                <div class="uk-position-center">
                                                    <div class="uk-overlay">
                                                        <h3
                                                            class="theme-font-medium-bold uk-margin-remove text-white  uk-text-uppercase">
                                                            <?php echo e($row->trip_title); ?>

                                                        </h3>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <!--  -->
                                </div>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </ul>
            </div>
            <?php if($facts->count()>0): ?>
            <div class="uk-margin-medium-top">
                <h3><b>Geographical facts of the Main <?php echo e($data->title); ?></b></h3>
                <div class="uk-overflow-auto custom-table">
                    <table>
                        <thead>
                            <tr>
                            <td>NAME</td>
                            <td>ALT/m</td>
                            <td>COUNTRIES</td>
                            <td>LATITUDE</td>
                            <td>LONGITUDE </td>
                            <td>RP</td>
                            <td>AREA</td>
                            </tr>
                        </thead>
                        <tbody>
            <?php $__currentLoopData = $facts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <tr>
                  <td><?php echo e($value->name); ?> </td>
                  <td><?php echo e($value->alt); ?></td>
                  <td><?php echo e($value->countries); ?></td>
                  <td><?php echo e($value->latitude); ?></td>
                  <td><?php echo e($value->longitude); ?></td>
                  <td><?php echo e($value->rp); ?></td>
                  <td><?php echo e($value->area); ?></td>
               </tr>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                           
                        </tbody>
                    </table>
                </div>
                <p><strong>›RP</strong> = Range Parts:<br> <strong>›NH</strong> = Nepal-Himalaya, Kk = Karakorum,<br>
                    <strong>›SH</strong> = Sikkim-Himalaya, KH = Kashmir-Himalaya
                </p>
                <p>The altitudes of the Nepalese mountains are taken from the Finnmaps and for the Karakorum mountains they
                    are from the Chinese snow map. The altitude of Shisha Pangma was taken from the Austrian Alpine Club
                    map, it was revised recently also on Chinese maps!</p>
                <p><i>Source: 8000ers.com</i></p>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <!-- end section -->
    <!--   section with trip list -->

    <section class="uk-section uk-padding-remove-top uk-position-relative  bg-white">
        <div class="uk-container ">
            <div class="uk-grid-small uk-child-width-1-2@s  uk-child-width-1-3@l uk-text-center" uk-grid
                uk-scrollspy="cls: uk-animation-slide-left-small; target:h1, p, img;  delay: 100; repeat: false">
                <!--  -->
                <?php if($expeditions->count() > 0): ?>
                    <?php $__currentLoopData = $expeditions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div>
                            <a class="uk-list-shine uk-corner-hover uk-cover-container uk-display-block" tabindex="0"
                                href="<?php echo e(route('page.expeditionlist', $row->uri)); ?>">
                                <div class="uk-media-520">
                                    <?php if($row->thumbnail): ?>
                                        <img class="uk-image" alt="<?php echo e($row->title); ?>" uk-img
                                            src="<?php echo e(asset('uploads/original/' . $row->thumbnail)); ?>" />
                                    <?php else: ?>
                                        <img class="uk-image" alt="<?php echo e($row->title); ?>" uk-img
                                            src="<?php echo e(asset('themes-assets/images/blank.png')); ?>">
                                    <?php endif; ?>

                                    <!-- corner -->
                                    <div class="uk-corner-borders uk-corner-borders--left"></div>
                                    <div class="uk-corner-borders uk-corner-borders--right"></div>
                                    <!-- end -->
                                </div>
                                <div class="uk-overlay-primary uk-position-cover"></div>
                                <div class="uk-position-center">
                                    <div class="uk-overlay">
                                        <h1 class="main-title-font uk-margin-remove text-primary">
                                            <?php echo e($row->title); ?>

                                        </h1>
                                        <p class="uk-margin-remove text-white"> <?php echo e($row->content); ?> </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <!--  -->

            </div>
        </div>
    </section>

    <!-- end   section with trip list -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('themes.default.common.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sevensummittreks/public_html/resources/views/themes/default/expeditionList.blade.php ENDPATH**/ ?>