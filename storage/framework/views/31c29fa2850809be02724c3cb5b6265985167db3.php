
<?php $__env->startSection('title', $data->trip_title); ?>
<?php $__env->startSection('trip_excerpt', $data->trip_excerpt); ?>
<?php $__env->startSection('thumbnail', $data->thumbnail); ?>
<?php $__env->startSection('seo_title', $data->seo_title); ?>
<?php $__env->startSection('meta_keyword', $data->meta_key); ?>
<?php $__env->startSection('meta_description', $data->meta_description); ?>
<?php $__env->startSection('content'); ?>

     <section class="uk-cover-container uk-position-relative uk-flex uk-flex-middle uk-background-norepeat uk-background-cover uk-background-top-center" uk-parallax="bgy: -100; easing: -2; "  data-src="<?php echo e(asset('uploads/banners/' . $data->banner)); ?>" uk-img>
        <?php if($data->trip_video && $data->video_status==1): ?>
        <div class="uk-position-relative" id="ytbg" data-ytbg-fade-in="true" data-ytbg-mute-button="true" data-youtube="<?php echo e($data->trip_video); ?>"></div>
        <?php endif; ?>
      <div class="uk-overlay-primary  uk-position-cover "></div>
        <<div class="uk-hero-banner-content-inner uk-width-1-1 uk-position-z-index uk-margin-large-top">
          <div class="uk-container  uk-position-relative  uk-flex-bottom uk-flex" uk-height-viewport="expand: true; min-height: 600;">
             <div class="uk-margin-large-bottom">
                    <h1 class="uk-text-bolder text-white uk-margin-remove" uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 1200; repeat: false;"> 
                        <?php echo e($data->trip_title); ?>

                    </h1>
                    <div class="uk-width-1-2@m uk-margin-top">
                        <p class="text-white uk-text-lead uk-margin-remove" uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 1600; repeat: false;">
                            <?php echo e($data->sub_title); ?>

                        </p>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- end trip video and image banner -->

    <!--  section-->
     <section class="bg-black-light uk-section-small uk-position-relative">
        <div class="uk-container">
      <div class="uk-grid-large   uk-flex-middle text-white" uk-grid uk-scrollspy="cls: uk-animation-slide-left-small; target:div,  li, img, p, h1, tr;  delay: 50; repeat: false;">
                <div class=" uk-width-1-3@m">
                    <div class="uk-width-2-3 uk-margin-auto uk-text-center">
                      <?php if($data->trip_type==2): ?>
                        <a href="#grading" uk-toggle uk-tooltip="<?php echo e(grade_message_exp($data->exp_grade)); ?>" aria-expanded="false"
                            style="width: 150px; height: auto;">
                            <div class="uk-margin-small">
                                <?php if($data->exp_grade): ?>
                                    <img src="<?php echo e(asset('themes-assets/images/icon/grade/' . $data->exp_grade . '.svg')); ?>"
                                        alt="<?php echo e($data->trip_tag); ?> " width="150">
                                <?php else: ?>
                                    <img src="<?php echo e(asset('themes-assets/images/icon/grade/1.svg')); ?>"
                                        alt="<?php echo e($data->trip_tag); ?> " width="150">
                                <?php endif; ?>

                            </div>
                            <div class="uk-text-center text-white">
                                <?php if($data->trip_tag): ?>
                                    <span class="uk-margin-remove uk-h5 text-white">
                                        <?php echo e($data->trip_tag); ?> <i uk-icon="icon: question; ratio: 1"
                                            class="uk-icon text-white">
                                        </i>
                                    </span>
                                <?php endif; ?>
                        </a>
                        <?php else: ?>
                        <a href="#grading_trek" uk-toggle uk-tooltip="<?php echo e(grade_message_trek($data->trip_grade)); ?>" aria-expanded="false"
                            style="width: 150px; height: auto;">
                            <div class="uk-margin-small">
                                <?php if($data->trip_grade): ?>
                                    <img src="<?php echo e(asset('themes-assets/images/icon/grade/' . $data->trip_grade . '.svg')); ?>"
                                        alt="<?php echo e($data->trip_tag); ?> " width="150">
                                <?php else: ?>
                                    <img src="<?php echo e(asset('themes-assets/images/icon/grade/1.svg')); ?>"
                                        alt="<?php echo e($data->trip_tag); ?> " width="150">
                                <?php endif; ?>

                            </div>
                            <div class="uk-text-center text-white">
                                <?php if($data->trip_tag): ?>
                                    <span class="uk-margin-remove uk-h5 text-white">
                                        <?php echo e($data->trip_tag); ?> <i uk-icon="icon: question; ratio: 1"
                                            class="uk-icon text-white">
                                        </i>
                                    </span>
                                <?php endif; ?>
                        </a>
                        <?php endif; ?>
                    </div>
                    <?php if($data->duration): ?>
                        <div class="uk-margin-small uk-text-center text-white">
                            <span class="uk-margin-remove uk-h4">
                                <?php echo e($data->duration); ?>

                            </span>
                        </div>
                    <?php endif; ?>

                    <?php if($data->rating): ?>
                        <div class="uk-trip-review uk-text-small uk-margin-small-top uk-scrollspy-inview uk-animation-slide-left-small">
                            <span class="star-rating">
                        <?php echo str_repeat('<i class="fa fa-star checked" aria-hidden="true"></i>', $data->rating); ?>

                        <?php echo str_repeat('<i class="fa fa-star" aria-hidden="true"></i>', 5 - $data->rating); ?>

                            </span>
                            <?php echo e($data->rating); ?> <?php echo e(rating($data->rating)['title']); ?>

                        </div>
                    <?php endif; ?>
                    <!-- ShareThis BEGIN -->
                       <div class="uk-share-button uk-margin-top">
                          <p> Share with friends</p>
                          <div class="sharethis-inline-share-buttons"></div>
                       </div>
                       <!-- ShareThis END -->
                </div>
            </div>
            <div class="uk-width-1-3@m">
                <ul class="uk-list uk-h5 uk-margin-remove text-white">

                    <?php if($data->max_altitude): ?>
                        <li>
                            <div uk-grid="" class="uk-flex uk-flex-between uk-grid-small uk-flex-middle uk-grid">
                                <div> <span class="uk-trip-icons uk-margin-small-right"><i
                                            class="fa fa-area-chart"></i></span>
                                    Max. Elevation: </div>
                                <div> <?php echo e($data->max_altitude); ?> </div>
                            </div>
                        </li>
                    <?php endif; ?>
                    <?php if($data->walking_per_day): ?>
                        <li>
                            <div uk-grid="" class="uk-flex uk-flex-between uk-grid-small uk-flex-middle uk-grid">
                                <div> <span class="uk-trip-icons uk-margin-small-right"><i class="fas fa-walking"></i></span>
                                    Walking Per Day: </div>
                                <div><?php echo e($data->walking_per_day); ?></div>
                            </div>
                        </li>
                    <?php endif; ?>
                    <?php if($data->accommodation): ?>
                        <li>
                            <div uk-grid="" class="uk-flex uk-flex-between uk-grid-small uk-flex-middle uk-grid">
                                <div> <span class="uk-trip-icons uk-margin-small-right"><i class="fa fa-bed"></i></span>
                                    Accommodation:</div>
                                <div> <?php echo e($data->accommodation); ?> </div>
                            </div>
                        </li>
                    <?php endif; ?>
                    <?php if($data->best_season): ?>
                        <li>
                            <div uk-grid="" class="uk-flex uk-flex-between uk-grid-small uk-flex-middle uk-grid">
                                <div> <span class="uk-trip-icons uk-margin-small-right"><i
                                            class="fa fa-thumbs-o-up"></i></span>
                                    Best Season: </div>
                                <div> <?php echo e(season($data->best_season)); ?> </div>
                            </div>
                        </li>
                    <?php endif; ?>
                    <?php if($data->group_size): ?>
                        <li>
                            <div uk-grid="" class="uk-flex uk-flex-between uk-grid-small uk-flex-middle uk-grid">
                                <div> <span class="uk-trip-icons uk-margin-small-right"><i class="fa fa-users"></i></span>
                                    Group
                                    Size: </div>
                                <div> <?php echo e($data->group_size); ?> </div>
                            </div>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="uk-width-1-3@m ">
                <div class="">
                    <?php if($setting->phone): ?>
                        <div class="uk-flex uk-flex-middle uk-text-small">
                            <span uk-icon="icon: receiver; ratio: 1" class="uk-margin-small-right uk-icon">
                            </span>
                            <div>
                                <!--<span>Contact at:</span>-->
                                <h4 class="uk-margin-remove   text-white"><?php echo e($setting->phone); ?></h4>
                            </div>
                        </div>
                        <hr>
                    <?php endif; ?>

                    <?php if($setting->email_primary): ?>
                        <div class="uk-flex uk-flex-middle uk-text-small">
                            <span uk-icon="icon: mail; ratio: 1" class="uk-margin-small-right uk-icon">
                            </span>
                            <div>
                                <!--<span>Email us at:</span>-->
                                <h4 class="uk-margin-remove text-white">
                                    <?php echo e($setting->email_primary); ?>

                                </h4>
                            </div>
                        </div>
                        <hr class="uk-margin">
                    <?php endif; ?>

                    <div>
                         <a href="#inquire-now" uk-toggle class="uk-button uk-button-white uk-width-1-1 uk-margin-bottom">
                         <!--<a href="<?php echo e(route('page.posttype_detail','contact-us')); ?>" class="uk-button uk-button-white uk-width-1-1 uk-margin-bottom">-->
                            Inquiry
                            <span class="uk-icon " uk-icon="icon:arrow-right; ratio: 1.5"
                                uk-scrollspy="cls: uk-animation-slide-right; delay: 400; repeat: false;"></span>
                        </a>
                    </div>
                    <div> <a href="<?php echo e(route('random-trip',$data->uri)); ?>" class="uk-button uk-button-primary uk-width-1-1  "> Book Now
                            <span class="uk-icon " uk-icon="icon:arrow-right; ratio: 1.5"
                                uk-scrollspy="cls: uk-animation-slide-right; delay: 400; repeat: false;"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    
    <!-- section -->
   <section class="uk-position-relative uk-small-nav">
   <div class="uk-grid-margin uk-grid-small uk-grid-stack" uk-grid>
      <div class="uk-width-1-1@m">
         <div class="bg-primary uk-light uk-sticky"  uk-sticky="offset: 0; uk-sticky; animation: uk-animation-slide-top uk-animation-slow uk-transform-origin-bottom-center" style="z-index:9;">
            <div class="uk-small-details-nav">
               <div class="uk-container uk-position-relative">
                  <ul class="uk-navbar-single uk-flex uk-flex-between uk-flex-middle uk-margin-remove-bottom">
                     <li>
                        <a href="#overview"> <i class="uk-margin-small-right fa fa-file-text"></i> Overview </a>
                     </li>
                     <li>
                        <a href="#itinerary"> <i class="uk-margin-small-right fa fa-calendar-o"></i> Itinerary </a>
                     </li>
                     <li>
                        <a href="#map"> <i class="uk-margin-small-right fa fa-map"></i> Map </a>
                     </li>
                     <li>
                        <a href="#cost-includes"> <i class="uk-margin-small-right fa fa-check-circle-o"></i> Cost Includes </a>
                     </li>
                     <li>
                        <a href="#cost-excludes"> <i class="uk-margin-small-right fa fa-times-circle"></i> Cost Excludes </a>
                     </li>
                     <li>
                        <a href="#cost-dates"> <i class="uk-margin-small-right fa fa-calendar"></i> Fixed Dates </a>
                     </li>
                     <li>
                        <a href="#gears-list"> <i class="uk-margin-small-right fa fa-cogs"></i>Gears List </a>
                     </li>
                      <?php if($photo_videos->count() > 0): ?>
                     <li>
                        <a href="#photo-videos">  <i class="uk-margin-small-right fa fa-image"></i> Photo/Videos </a>
                     </li>
                     <?php endif; ?>
                     <li>
                        <a href="#reviews"> <i class="uk-margin-small-right fa fa-comment"></i> Reviews </a>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

    <!-- end section -->
    <section class="uk-section uk-trip-facts" id="overview"  uk-scrollspy="target:img, p; cls: uk-animation-slide-top-small;   delay: 50; repeat: false;">
   <div class="uk-container ">
      <div class="uk-grid-margin uk-grid uk-grid-stack" uk-grid="">
         <div class="uk-grid-item-match uk-flex-middle uk-width-expand@m">
            <div class="uk-panel">
               <div  class="uk-margin">
                  <div class="uk-child-width-1-2 uk-child-width-1-2@s uk-child-width-1-4@m uk-grid-match uk-grid uk-flex-left" uk-grid="">
                     <?php if($data->country): ?>
                     <div>
                        <div class="uk-grid uk-grid-small uk-child-width-expand uk-flex-nowrap uk-flex-middle" uk-grid="">
                           <div class="uk-width-auto"><img src="<?php echo e(asset('themes-assets/images/icon/trip/country.png')); ?>" alt=""> 
                           </div>
                           <div>
                              <div>
                                 <p class="uk-margin-remove"><strong>Country</strong></p>
                                 <p class="uk-margin-remove"><?php echo e(country($data->country)); ?></p>
                              </div>
                           </div>
                        </div>
                     </div>
                      <?php endif; ?>
                        <?php if($data->peak_name): ?>
                     <div>
                        <div class="uk-grid uk-grid-small uk-child-width-expand uk-flex-nowrap uk-flex-middle" uk-grid="">
                           <div class="uk-width-auto"> <img src="<?php echo e(asset('themes-assets/images/icon/trip/peak.png')); ?>" alt=""> </div>
                           <div>
                              <div>
                                 <p class="uk-margin-remove"><strong>Peak Name</strong></p>
                                 <p class="uk-margin-remove"><?php echo e($data->peak_name); ?></p>
                              </div>
                           </div>
                        </div>
                     </div>
                      <?php endif; ?>
                        <?php if($data->duration): ?>
                     <div>
                        <div class="uk-grid uk-grid-small uk-child-width-expand uk-flex-nowrap uk-flex-middle" uk-grid="">
                           <div class="uk-width-auto"> 
                              <img src="<?php echo e(asset('themes-assets/images/icon/trip/duration.png')); ?>" alt="">  
                           </div>
                           <div>
                              <div>
                                 <p class="uk-margin-remove"><strong>Duration</strong></p>
                                 <p class="uk-margin-remove"><?php echo e($data->duration); ?> </p>
                              </div>
                           </div>
                        </div>
                     </div>
                      <?php endif; ?>
                        <?php if($data->route): ?>
                     <div>
                        <div class="uk-grid uk-grid-small uk-child-width-expand uk-flex-nowrap uk-flex-middle" uk-grid="">
                           <div class="uk-width-auto"> <img src="<?php echo e(asset('themes-assets/images/icon/trip/route.png')); ?>" alt=""> </div>
                           <div>
                              <div>
                                 <p class="uk-margin-remove"><strong>Route</strong></p>
                                 <p class="uk-margin-remove"><?php echo e($data->route); ?></p>
                              </div>
                           </div>
                        </div>
                     </div>
                      <?php endif; ?>
                        <?php if($data->rank): ?>
                     <div>
                        <div class="uk-grid uk-grid-small uk-child-width-expand uk-flex-nowrap uk-flex-middle" uk-grid="">
                           <div class="uk-width-auto"> <img src="<?php echo e(asset('themes-assets/images/icon/trip/rank.png')); ?>" alt=""> </div>
                           <div>
                              <div>
                                 <p class="uk-margin-remove"><strong>Rank</strong></p>
                                 <p class="uk-margin-remove"><?php echo e($data->rank); ?></p>
                              </div>
                           </div>
                        </div>
                     </div>
                      <?php endif; ?>
                        <?php if($data->coordinate): ?>
                     <div class="uk-grid-margin">
                        <div class="uk-grid uk-grid-small uk-child-width-expand uk-flex-nowrap uk-flex-middle" uk-grid="">
                           <div class="uk-width-auto"> <img src="<?php echo e(asset('themes-assets/images/icon/trip/Co-ordinates.png')); ?>" alt=""> </div>
                           <div>
                              <div>
                                 <p class="uk-margin-remove"><strong>Co-ordinates</strong></p>
                                 <p class="uk-margin-remove"><a href="https://www.google.com/maps/place/<?php echo e($data->coordinate); ?>" target="_blank"><?php echo e($data->coordinate); ?></a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                      <?php endif; ?>
                        <?php if(weather_report($data->id)): ?>
                     <div class="uk-grid-margin">
                        <div class="uk-grid uk-grid-small uk-child-width-expand uk-flex-nowrap uk-flex-middle" uk-grid="">
                           <div class="uk-width-auto"> <img src="<?php echo e(asset('themes-assets/images/icon/trip/weather.png')); ?>" alt=""> </div>
                           <div>
                              <div>
                                 <p class="uk-margin-remove"><strong> Weather Reports</strong></p>
                                 <p class="uk-margin-remove"><a href="<?php echo e(url('/weather-report/' . weather_report($data->id))); ?>">Report</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                      <?php endif; ?>
                        <?php if($data->trip_range): ?>
                     <div class="uk-grid-margin">
                        <div class="uk-grid uk-grid-small uk-child-width-expand uk-flex-nowrap uk-flex-middle" uk-grid="">
                           <div class="uk-width-auto"> <img src="<?php echo e(asset('themes-assets/images/icon/trip/range.png')); ?>" alt=""> </div>
                           <div>
                              <div>
                                 <p class="uk-margin-remove"><strong> Range</strong></p>
                                 <p class="uk-margin-remove"><?php echo e($data->trip_range); ?></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <?php endif; ?>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
    <!-- section -->
    <section class="uk-section bg-white">
   <div class=" uk-container">
      <div class="uk-grid" uk-grid >
         <div class="uk-width-expand@m" uk-scrollspy="cls: uk-animation-slide-left-small; target:  li, img, p, h1;  delay: 50; repeat: false;">
            <!-- start Overview -->
            <div  class="uk-single-section">
               <!-- title -->
               <div class="uk-main-title   uk-margin-medium-bottom uk-display-block uk-text-left">
                  <h1 class="uk-h4 uk-heading-line  uk-text-left  uk-position-relative text-black  uk-text-uppercase uk-margin-remove">
                     <span class="theme-font-extra-bold"> <i class="fa fa-file-text text-primary uk-margin-small-right"></i> Trip  Overview</span>  
                  </h1>
               </div>
                <!-- title end -->
              
               <div class="uk-spoiler uk-margin-top">
                    <div class="uk-show-more  ">
                       <?php echo $data->trip_content; ?> 
                    </div>
                </div>
                <!-- // -->
                        
            <?php if($routecamps->count() > 0 || $faqs->count() > 0): ?>
                <div class="uk-route">
                <div class="uk-route-border">
                    <div class="uk-grid uk-flex  uk-flex-middle uk-flex-between  " uk-grid>
                        <?php if($routecamps->count() > 0): ?>
                            <div>
                                <a class="uk-button uk-button-primary toggle-content" href="#toggle-content"
                                    uk-toggle="target: .toggle-content; animation: uk-animation-fade"><?php echo e($data->trip_grade_msg); ?> <span
                                        class="uk-icon uk-scrollspy-inview uk-animation-slide-right"
                                        uk-icon="icon:arrow-down; ratio: 1.5"
                                        uk-scrollspy="cls: uk-animation-slide-right;   delay: 400; repeat: false;"></span></a>

                                <a class="uk-button uk-button-primary toggle-content" href="#toggle-content"
                                    uk-toggle="target: .toggle-content; animation: uk-animation-fade"
                                    hidden><?php echo e($data->trip_grade_msg); ?> <span
                                        class="uk-icon uk-scrollspy-inview uk-animation-slide-right"
                                        uk-icon="icon:arrow-up; ratio: 1.5"
                                        uk-scrollspy="cls: uk-animation-slide-right;   delay: 400; repeat: false;"></span></a>
                            </div>
                        <?php endif; ?>
                        <?php if($faqs->count() > 0): ?>
                            <div>
                                <a href="<?php echo e(route('faq', $data->uri)); ?>" class="uk-button uk-button-secondary">Read  Faq
                                    <span class="uk-icon uk-scrollspy-inview uk-animation-slide-right"
                                        uk-icon="icon:arrow-right; ratio: 1.5"
                                        uk-scrollspy="cls: uk-animation-slide-right;   delay: 400; repeat: false;"></span>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <?php if($routecamps->count() > 0): ?>
                    <div class="uk-route-content uk-margin-top toggle-content" hidden id="toggle-content">
                        <?php $__currentLoopData = $routecamps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <h4><b><?php echo e($row->title); ?></b></h4>
                            <p><?php echo e($row->content); ?></p>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>
            </div>
            <?php endif; ?>            
            <!-- // -->
        </div>                    
        <!-- end Overview -->
           <?php if($itinerary): ?>
          <!-- title -->
        <div class="uk-main-title uk-margin-medium-bottom uk-display-block uk-text-left">
            <h1 class="uk-h4 uk-heading-line  uk-text-left  uk-position-relative text-black  uk-text-uppercase uk-margin-remove">
                <span class="theme-font-extra-bold"> 
                    <i class="fa fa-calendar-o text-primary uk-margin-small-right"></i>
                    Itinerary </span>
                <?php if($itinerary_cat->count() > 0): ?>
                    <select class="news_sort uk-align-right uk-select-itinerary" name="itinerary_cat">
                        <!-- id="itinerary_cat"> -->
                          <option value="0" disabled> Select Itinerary </option>
                        <?php $__currentLoopData = $itinerary_cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <option <?php echo e($row->id == $itinerary->first()->category? 'selected':''); ?>  value="<?php echo e($row->id); ?>"> <?php echo e($row->category); ?> </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                <?php endif; ?>
            </h1>
        </div>
        <?php endif; ?>
            <!-- title end -->
   
    <!-- start Itinerary -->
    <span class="filter_result">
    <?php if($itinerary): ?>
        <div id="itinerary" class="uk-single-section">
            <div class="uk-width-1-1">
           <ul uk-accordion class="uk-accordion uk-accordion-outline uk-itinerary">
                <!--  -->
                
                 <?php $__currentLoopData = $itinerary; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <!--<li class="<?php echo e($loop->iteration == 1 ? 'uk-open' : ''); ?>">-->
                     <li>
                       <div class="uk-accordion-title  uk-itinerary-title" >
                        <div class="uk-grid-small uk-flex-middle " uk-grid  >
                           <div class="uk-width-auto uk-text-center">
                              <div class="uk-day uk-margin-small-right"> Day <?php echo e($row->days); ?> </div>
                           </div>
                           <div class="uk-width-expand">
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
                
                <!--  -->
            </ul>
            </div>
        </div>
    <?php endif; ?>
   
    <!-- end Itinerary -->

    <!-- start Map -->
    <?php if($data->trip_map): ?>
        <div id="map" class="uk-single-section">
             <!--title -->
            <div class="uk-main-title   uk-margin-medium-bottom uk-display-block uk-text-left">
                <h1 class="uk-h4 uk-heading-line  uk-text-left  uk-position-relative text-black  uk-text-uppercase uk-margin-remove">
                    <span class="theme-font-extra-bold"> <i class="fa fa-map text-primary uk-margin-small-right"></i> Route Map</span>
                </h1>
            </div>
             <!--title end -->
            <div class="uk-gallery" uk-lightbox>
                <div>
                    <a href="<?php echo e(asset('uploads/original/' . $data->trip_map)); ?>" data-caption="<?php echo e($data->trip_title); ?>"> 
                    <img src="<?php echo e(asset('uploads/original/' . $data->trip_map)); ?>" alt="<?php echo e($data->trip_title); ?>" />
                    </a>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <!-- end Map -->
    <!-- start  Cost Includes -->

    <?php if($cost_includes): ?>
        <div id="cost-includes" class="uk-single-section">
               <!-- title -->
            <div class="uk-main-title uk-margin-medium-bottom uk-display-block uk-text-left">
                <h1 class="uk-h4 uk-heading-line  uk-text-left  uk-position-relative text-black  uk-text-uppercase uk-margin-remove">
                    <span class="theme-font-extra-bold"> 
                        <i class="fa fa-check-circle-o text-primary uk-margin-small-right"></i> Cost Includes </span>
                </h1>
            </div>

            <!-- title end -->
            <ul class=" uk-includes">
                <?php $__currentLoopData = $cost_includes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><strong><?php echo e(strtoupper($row->title)); ?></strong> : <?php echo e($row->content); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </ul>
        </div>
    <?php endif; ?>

    <!-- end  Cost Includes -->

    <!-- start  Cost excludes -->
    <?php if($cost_excludes): ?>
        <div id="cost-excludes" class="uk-single-section">
            <!-- title -->
            <div class="uk-main-title   uk-margin-medium-bottom uk-display-block uk-text-left">
                <h1 class="uk-h4 uk-heading-line  uk-text-left  uk-position-relative text-black  uk-text-uppercase uk-margin-remove">
                    <span class="theme-font-extra-bold"> <i class="fa fa-times-circle text-primary uk-margin-small-right"></i> Cost Excludes</span>
                </h1>
            </div>
            <!-- title end -->
            <ul class=" uk-excludes">
                <?php $__currentLoopData = $cost_excludes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><strong> <?php echo e(strtoupper($row->title)); ?> </strong>: <?php echo e($row->content); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
   </span>
    <!-- end  Cost excludes -->
    <!-- start Cost Dates -->
    <?php if($fixed_dates->count() > 0): ?>
     <div id="cost-dates" class="uk-single-section">
               <!-- title -->
               <div class="uk-main-title   uk-margin-medium-bottom uk-display-block uk-text-left">
                  <h1 class="uk-h4 uk-heading-line  uk-text-left  uk-position-relative text-black  uk-text-uppercase uk-margin-remove">
                     <span class="theme-font-extra-bold"> <i class="fa fa-calendar text-primary uk-margin-small-right"></i>  Fixed Dates</span>  
                  </h1>
               </div>
               <!-- title end -->
               <div class="uk-overflow-auto">
               <table class="uk-table uk-table-hover uk-table-responsive uk-table-middle uk-table-divider">
               <thead class="uk-depature-thead">
                  <tr>
                     <td class="uk-text-bold" width="35%">
                         Date
                     </td>
                     <td class="uk-text-bold uk-text-center@m" width="20%">
                        Status 
                     </td>
                     <td class="uk-text-bold uk-text-center@m" width="20%">
                     Group Size 
                     </td>
                     <td class="uk-text-bold uk-text-center@m" width="45%">
                         Action
                     </td>
                  </tr>
               </thead>
               <tbody>
                  <?php $__currentLoopData = $data->schedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                     <?php
                        $cDate = \Carbon\Carbon::parse($value->start_date)->diffInDays(\Carbon\Carbon::parse($value->end_date)) + 1;
                        ?>
                     <td>
                        <strong><?php echo e($cDate); ?> Days</strong>
                        <br>Start <span class="uk-hidden@m">Date</span>- <?php echo e($value->start_date); ?>  <br>  End <span class="uk-hidden@m">Date</span>-<?php echo e($value->end_date); ?>

                     </td>
                     <td class="uk-text-center@m">
                         <?php if($value->availability == 'AVAILABLE'): ?>
                        <span class="uk-text-success">Booking Open</span>
                         <?php else: ?>
                       <span class="uk-text-danger">Booking Closed</span>
                        <?php endif; ?>
                     </td>
                     <td class="uk-text-center@m">
                     <span class="uk-hidden@m"> Group Size  </span> <?php echo e($value->group_size); ?>

                     </td>
                     <td class="uk-text-center@m">
                    <?php if($value->availability == 'AVAILABLE'): ?>
                     <a class="uk-button-xsmall uk-button-primary-outline uk-margin-small-bottom" href="#inquire-now-fixed" uk-toggle="">Inquire Now</a>
                        <a class="uk-button-xsmall uk-button-secondary" href="<?php echo e(route('book-trip', [$data->uri, $value->start_date, $value->end_date])); ?>">Book Now</a>
                    <?php else: ?>
                      NA
                      <?php endif; ?>
                     </td>
                  </tr>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </tbody>
            </table>
               </div>
            </div>
    <?php endif; ?>
    <!-- end Cost Dates -->
    <!-- start Equipments List -->
    <div id="gears-list" class="uk-single-section">
        <!-- title -->
        <div class="uk-main-title   uk-margin-medium-bottom uk-display-block uk-text-left">
            <h1 class="uk-h4 uk-heading-line  uk-text-left  uk-position-relative text-black  uk-text-uppercase uk-margin-remove">
                <span class="theme-font-extra-bold"> <i class="fa fa-cogs text-primary uk-margin-small-right"></i> Gears List</span>
            </h1>
        </div>
        <!-- title end -->
        <div class="uk-grid-small uk-child-width-1-2@s uk-text-center uk-margin-medium-top"  uk-grid="masonry: true">
            <!--  -->
            <?php if($trip_docs->count() > 0): ?>
                <?php $__currentLoopData = $trip_docs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div>
                        <?php if($row->external_link): ?>
                        <a class="uk-list-shine uk-cover-container uk-display-block uk-link-toggle " tabindex="0" target="_blank" href="<?php echo e($row->external_link); ?>">
                        <?php else: ?>
                        <a class="uk-list-shine uk-cover-container uk-display-block uk-link-toggle " tabindex="0" target="_blank" href="<?php echo e(asset('uploads/doc/' . $row->document)); ?>">
                         <?php endif; ?>
                            <?php if($row->thumbnail): ?>
                            <div class="uk-media-150"><img class="uk-image" alt="<?php echo e($row->title); ?>" uk-img src="<?php echo e(asset('uploads/original/' . $row->thumbnail)); ?>">
                            </div>
                            <?php else: ?>
                            <div class="uk-media-150"><img class="uk-image" alt="<?php echo e($row->title); ?>" uk-img src="<?php echo e(asset('themes-assets/images/blank.png')); ?>">
                            </div>
                            <?php endif; ?>
                            <div class="uk-overlay-primary uk-position-cover"></div>
                            <div class="uk-position-center">
                                <div class="uk-overlay">
                                    <h4 class="uk-margin-remove text-white uk-text-bold"> <?php echo e($row->title); ?></h4>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            <!-- Gear Info Videos -->
            <div>
                <a class="uk-list-shine uk-cover-container uk-transition-toggle uk-display-block uk-link-toggle "
                    tabindex="0" href="<?php echo e(route('trip.tripvideos', $data->uri)); ?>">
                    <?php if($data->trip_type == 1): ?>
                    <div class="uk-media-250"><img class="uk-image" alt="" uk-img
                            src="<?php echo e(asset(env('PUBLIC_PATH') . 'uploads/original/' . $video_cat1->thumbnail)); ?>">
                    </div>
                    <div class="uk-overlay-primary uk-position-cover"></div>
                    <div class="uk-position-center">
                        <div class="uk-overlay">
                            <h4 class="uk-margin-remove text-white uk-text-bold">
                                <?php echo e($video_cat1->caption); ?>

                            </h4>
                        </div>
                    </div>
                    <?php else: ?>
                    <div class="uk-media-250"><img class="uk-image" alt="" uk-img
                            src="<?php echo e(asset(env('PUBLIC_PATH') . 'uploads/original/' . $video_cat2->thumbnail)); ?>">
                    </div>
                    <div class="uk-overlay-primary uk-position-cover"></div>
                    <div class="uk-position-center">
                        <div class="uk-overlay">
                            <h4 class="uk-margin-remove text-white uk-text-bold">
                                <?php echo e($video_cat2->caption); ?>

                            </h4>
                        </div>
                    </div>
                    <?php endif; ?>
                </a>
            </div>
            <!--Gear Info Videos End  -->
            <!--Travel Info  -->
         
              <?php if($data->trip_type == 1): ?>
            <div>
                
                  <?php if(get_trip_guide($data->id) != NULL ): ?>
                    <a class="uk-list-shine uk-cover-container uk-transition-toggle uk-display-block uk-link-toggle "
                    tabindex="0" href="<?php echo e(get_trip_guide($data->id)->link); ?>" target="_blank">
                 <?php else: ?> 
                    <a class="uk-list-shine uk-cover-container uk-transition-toggle uk-display-block uk-link-toggle "
                        tabindex="0" href="<?php echo e(route('trip-guide', $data->uri)); ?>" target="_blank">
                <?php endif; ?>
                        <div class="uk-media-250"><img class="uk-image" alt="" uk-img
                                src="<?php echo e(asset(env('PUBLIC_PATH') . 'uploads/original/' . $travelguide1->thumbnail)); ?>">
                        </div>
                        <div class="uk-overlay-primary uk-position-cover"></div>
                        <div class="uk-position-center">
                            <div class="uk-overlay">
                                <h4 class="uk-margin-remove text-white uk-text-bold">
                                     <?php echo e($travelguide1->caption); ?>

                                </h4>
                            </div>
                        </div>
                    </a>
            </div>
            <?php else: ?>
              <div>
               <?php if(get_trip_guide($data->id) != NULL): ?>
                  <a class="uk-list-shine uk-cover-container uk-transition-toggle uk-display-block uk-link-toggle "
                    tabindex="0" href="<?php echo e(get_trip_guide($data->id)->link); ?>" target="_blank">
                  <?php else: ?> 
                <a class="uk-list-shine uk-cover-container uk-transition-toggle uk-display-block uk-link-toggle "
                    tabindex="0" href="<?php echo e(route('trip-guide', $data->uri)); ?>" target="_blank">
                    <?php endif; ?> 
                    <div class="uk-media-250"><img class="uk-image" alt="" uk-img
                            src="<?php echo e(asset(env('PUBLIC_PATH') . 'uploads/original/' . $travelguide2->thumbnail)); ?>">
                    </div>
                    <div class="uk-overlay-primary uk-position-cover"></div>
                    <div class="uk-position-center">
                        <div class="uk-overlay">
                            <h4 class="uk-margin-remove text-white uk-text-bold">
                                <?php echo e($travelguide2->caption); ?>

                            </h4>
                        </div>
                    </div>
                </a>
            </div>
            <?php endif; ?>
            <!-- travel Info end -->
            <!--  -->
            <?php if($data->trip_type == 1): ?>
            <div>
             <?php if(get_trip_insurance($data->id) != NULL): ?>
                 <a class="uk-list-shine uk-cover-container uk-transition-toggle uk-display-block uk-link-toggle "
                    tabindex="0" href="<?php echo e(get_trip_insurance($data->id)->link); ?>" target="_blank">
                 <?php else: ?> 
                <a class="uk-list-shine uk-cover-container uk-transition-toggle uk-display-block uk-link-toggle "
                    tabindex="0" href="<?php echo e(route('trip-insurance',$data->uri)); ?>" target="_blank">
                    <?php endif; ?> 
                    <div class="uk-media-250"><img class="uk-image" alt="" uk-img
                            src="<?php echo e(asset(env('PUBLIC_PATH') . 'uploads/original/' . $tripinsurance1->thumbnail)); ?>">
                    </div>
                    <div class="uk-overlay-primary uk-position-cover"></div>
                    <div class="uk-position-center">
                        <div class="uk-overlay">
                            <h4 class="uk-margin-remove text-white uk-text-bold">
                              <?php echo e($tripinsurance1->caption); ?>

                            </h4>
                        </div>
                    </div>
                </a>
            </div>
            <?php else: ?>
            <div>
                <?php if(get_trip_insurance($data->id) != NULL): ?>
                 <a class="uk-list-shine uk-cover-container uk-transition-toggle uk-display-block uk-link-toggle "
                    tabindex="0" href="<?php echo e(get_trip_insurance($data->id)->link); ?>" target="_blank">
                 <?php else: ?> 
                <a class="uk-list-shine uk-cover-container uk-transition-toggle uk-display-block uk-link-toggle "
                    tabindex="0" href="<?php echo e(route('trip-insurance',$data->uri)); ?>" target="_blank">
                    <?php endif; ?>
                    <div class="uk-media-250"><img class="uk-image" alt="" uk-img
                            src="<?php echo e(asset(env('PUBLIC_PATH') . 'uploads/original/' . $tripinsurance2->thumbnail)); ?>">
                    </div>
                    <div class="uk-overlay-primary uk-position-cover"></div>
                    <div class="uk-position-center">
                        <div class="uk-overlay">
                            <h4 class="uk-margin-remove text-white uk-text-bold">
                               <?php echo e($tripinsurance2->caption); ?>

                            </h4>
                        </div>
                    </div>
                </a>
            </div>
            <?php endif; ?>
            <!--  -->
            <!--  -->
               <?php if($data->trip_type == 1): ?>
            <div>
                 <?php if(get_trip_payment($data->id) != NULL): ?>
                <a class="uk-list-shine uk-cover-container uk-transition-toggle uk-display-block uk-link-toggle "
                    tabindex="0" href="<?php echo e(get_trip_payment($data->id)->link); ?>" target="_blank">
                <?php else: ?> 
                <a class="uk-list-shine uk-cover-container uk-transition-toggle uk-display-block uk-link-toggle "
                    tabindex="0" href="<?php echo e(route('payment',$data->uri)); ?>" target="_blank">
                   <?php endif; ?> 
                    <div class="uk-media-250"><img class="uk-image" alt="" uk-img
                            src="<?php echo e(asset(env('PUBLIC_PATH') . 'uploads/original/' . $application1->thumbnail)); ?>">
                    </div>
                    <div class="uk-overlay-primary uk-position-cover"></div>
                    <div class="uk-position-center">
                        <div class="uk-overlay">
                            <h4 class="uk-margin-remove text-white uk-text-bold">
                                <?php echo e($application1->caption); ?>

                            </h4>
                        </div>
                    </div>
                </a>
            </div>
            <?php else: ?>
            <div>
             <?php if(get_trip_payment($data->id) != NULL): ?>
                <a class="uk-list-shine uk-cover-container uk-transition-toggle uk-display-block uk-link-toggle "
                    tabindex="0" href="<?php echo e(get_trip_payment($data->id)->link); ?>" target="_blank">
                <?php else: ?> 
                <a class="uk-list-shine uk-cover-container uk-transition-toggle uk-display-block uk-link-toggle "
                    tabindex="0" href="<?php echo e(route('payment',$data->uri)); ?>" target="_blank">
                   <?php endif; ?> 
                    <div class="uk-media-250"><img class="uk-image" alt="" uk-img
                            src="<?php echo e(asset(env('PUBLIC_PATH') . 'uploads/original/' . $application2->thumbnail)); ?>">
                    </div>
                    <div class="uk-overlay-primary uk-position-cover"></div>
                    <div class="uk-position-center">
                        <div class="uk-overlay">
                            <h4 class="uk-margin-remove text-white uk-text-bold">
                               <?php echo e($application2->caption); ?>

                            </h4>
                        </div>
                    </div>
                </a>
            </div>
            <?php endif; ?>
            <!--  -->
        </div>
    </div>
    <!-- end Equipments List -->

    <!-- start Photo/Videos -->
    <?php if($photo_videos->count() > 0): ?>
    <div id="photo-videos" class="uk-single-section ">
       <!-- title -->
       <div class="uk-main-title   uk-margin-medium-bottom uk-display-block uk-text-left">
          <h1 class="uk-h4 uk-heading-line  uk-text-left  uk-position-relative text-black  uk-text-uppercase uk-margin-remove">
             <span class="theme-font-extra-bold"> <i class="fa fa-image text-primary uk-margin-small-right"></i> Photo/Videos</span>  
          </h1>
       </div>
       <!-- title end -->
       <div class="uk-gallery" >
          <!--  -->
            <!--  -->
        <?php if($videos->isNotEmpty()): ?>
           <!--  -->
        <?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="uk-video">
             <a class="uk-video-player" href="#modal-media-youtube" uk-toggle>
                <div class="uk-media-400 uk-position-relative"> 
                   <img class="uk-image" alt="" uk-img src="https://img.youtube.com/vi/<?php echo e($row->video); ?>/maxresdefault.jpg"> 
                <div class="uk-overlay-primary uk-position-cover"></div>
                <div class="uk-position-center">
                   <div class="uk-overlay">
                      <h4 class="uk-margin-top uk-margin-remove-bottom text-white">
                         <span class="uk-light uk-icon" uk-icon="icon:play-circle; ratio: 3.5 "></span>
                      </h4>
                   </div>
                </div>
                </div>
             </a>

             <div id="modal-media-youtube" class="uk-flex-top" uk-modal>
                <div class="uk-modal-dialog uk-width-auto uk-margin-auto-vertical">
               <button class="uk-modal-close-outside" type="button" uk-close></button>
               <iframe src="https://www.youtube-nocookie.com/embed/<?php echo e($row->video); ?>"  width="854" height="480" uk-video uk-responsive></iframe>
             </div>
          </div> 
          </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         <?php endif; ?>
          <!--  -->
          <?php if($photos->count()>0): ?>
          <ul class="uk-grid-collapse uk-grid-small" uk-grid="masonry: true" uk-lightbox="animation: slide;">
            <?php if($videos->isEmpty()): ?>
             <?php $__currentLoopData = $photos->slice(0,1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li class="uk-width-1-1">
                   <a href="<?php echo e(asset('/uploads/original/' . $row->thumbnail)); ?>" data-caption="<?php echo e($row->title); ?>">
                <div class="uk-media-400 uk-list-shine">
                 <img src="<?php echo e(asset('/uploads/original/' . $row->thumbnail)); ?>" uk-img>
                </div>
                </a>
             </li>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php $__currentLoopData = $photos->skip(1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($row->thumbnail == null) continue; ?>
                <?php if($loop->iteration >= 4) continue; ?>

             <li class=" uk-width-1-3@m">
                   <a href="<?php echo e(asset('/uploads/original/' . $row->thumbnail)); ?>" data-caption="<?php echo e($row->title); ?>">
                <div class="uk-media-150 uk-list-shine">
                 <img src="<?php echo e(asset('/uploads/original/' . $row->thumbnail)); ?>" uk-img>
                 <?php if($loop->iteration >= 3): ?>
                 <div class="uk-overlay-primary uk-position-cover"></div>
                    <h1 class="uk-position-center uk-light uk-margin-remove text-white"
                        style="z-index: 1;">+ <?php echo e($loop->remaining); ?></h1>
                <?php endif; ?>
                </div>
                </a>
             </li>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             <?php else: ?>
              <?php $__currentLoopData = $photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($row->thumbnail == null) continue; ?>
                <?php if($loop->iteration >= 4) continue; ?>

             <li class=" uk-width-1-3@m">
                   <a href="<?php echo e(asset('/uploads/original/' . $row->thumbnail)); ?>" data-caption="<?php echo e($row->title); ?>">
                <div class="uk-media-150 uk-list-shine">
                 <img src="<?php echo e(asset('/uploads/original/' . $row->thumbnail)); ?>" uk-img>
                 <?php if($loop->iteration >= 3): ?>
                 <div class="uk-overlay-primary uk-position-cover"></div>
                    <h1 class="uk-position-center uk-light uk-margin-remove text-white"
                        style="z-index: 1;">+ <?php echo e($loop->remaining); ?></h1>
                <?php endif; ?>
                </div>
                </a>
             </li>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             <?php endif; ?>
             <!-- more images -->
            <?php $__currentLoopData = $photo_videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                <a href="<?php echo e(asset('/uploads/original/' . $row->thumbnail)); ?>"
                    data-caption="<?php echo e($row->title); ?>"> </a>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <!-- end -->
          </ul>
          <?php endif; ?>
       </div>
    </div>
       <?php endif; ?>
    <!-- end Photo/Videos -->
    <!-- start Reviews -->
    <div id="reviews" class="uk-single-section">
               <!-- title -->
               <div class="uk-main-title   uk-margin-medium-bottom uk-display-block uk-text-left">
                  <h1 class="uk-h4 uk-heading-line  uk-text-left  uk-position-relative text-black  uk-text-uppercase uk-margin-remove">
                     <span class="theme-font-extra-bold"> <i class="fa fa-comment text-primary uk-margin-small-right"></i> Reviews</span>  
                  </h1>
               </div>
               <!-- title end -->
               <div class="uk-container uk-position-relative">
                  <div class="uk-testimonials-home  uk-margin-medium-bottom ">
                     <!--  -->
                     <div uk-slider="autoplay: true; finite: true;">
                        <div class="uk-position-relative ">
                           <div class="uk-slider-container  ">
                              <ul class="uk-slider-items uk-child-width-1-1 uk-child-width-1-1@s uk-child-width-1-1@m">
                                 <?php if($trip_review->isNotEmpty()): ?>
                                    <?php $__currentLoopData = $trip_review; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <li>
                                            <div>
                                                <div class="uk-testimonials-author uk-margin-medium-bottom">
                                                    <div class="uk-flex  uk-flex-middle">
                                                        <div>
                                                            <div class="uk-media-60 uk-margin-small-right">
                                                                <img src="<?php echo e(asset('images/reviews/' . $value->image)); ?>"
                                                                    alt="" class="uk-border-circle">
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div>
                                                                <h1
                                                                    class=" uk-h4 uk-margin-remove theme-font-extra-bold">
                                                                    <?php echo e($value->name); ?></h1>
                                                                <h1
                                                                    class="text-primary uk-margin-remove theme-font-medium uk-h5">
                                                                    <?php echo e($value->country); ?></h1>
                                                            </div>
                                                        </div>
                                                        <?php if($value->video_url): ?>
                                                        <div>
                                                            <div class="uk-position-relative uk-margin-large-left"
                                                                uk-lightbox>
                                                                <a id="play-video" class="video-play-button"
                                                                    href="<?php echo e($value->video_url); ?>">
                                                                    <span></span> </a>
                                                            </div>
                                                        </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="uk-testimonials-content uk-margin-small-left">
                                                    <div class="uk-flex">
                                                        <div class="uk-margin-small-right uk-visible@s"><i
                                                                class="fas fa-quote-left  fa-2x text-primary"></i>
                                                        </div>
                                                       <div class="uk-spoiler1">
                                                        <div class="uk-show-more1  ">
                                                            <?php echo $value->review; ?>

                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                              </ul>
                           </div>
                        </div>
                        <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin-small"></ul>
                     </div>
                     <!--  -->
                  </div>
                  <!--  -->
                  <a class="uk-button uk-button-primary toggle-review" href="#toggle-review" uk-toggle="target: .toggle-review; animation: uk-animation-fade"  >Write a Review <span class="uk-icon uk-scrollspy-inview uk-animation-slide-right" uk-icon="icon:arrow-down; ratio: 1.5" uk-scrollspy="cls: uk-animation-slide-right;   delay: 400; repeat: false;" ></span></a>
                  <a class="uk-button uk-button-primary toggle-review" href="#toggle-review" uk-toggle="target: .toggle-review; animation: uk-animation-fade"  hidden>Write a Review <span class="uk-icon uk-scrollspy-inview uk-animation-slide-right" uk-icon="icon:arrow-up; ratio: 1.5" uk-scrollspy="cls: uk-animation-slide-right;   delay: 400; repeat: false;" ></span></a>
                  <div class="uk-card uk-card-default toggle-review uk-margin-top" hidden id="toggle-review">
                     <div class="uk-card-header">
                        <!-- title -->
                        <h1 class="uk-h4 uk-text-left  uk-position-relative text-black  uk-text-uppercase uk-margin-remove">
                           <span class="theme-font-extra-bold"> <i class="fa fa-pencil  text-primary uk-margin-small-right"></i>  Write a Review</span>  
                        </h1>
                        <!-- title end -->
                     </div>
                     <div class="uk-card-body ">
                        <form class="uk-grid-small" id="review_form" uk-grid method="post">
                       <?php echo e(csrf_field()); ?>

                        <!--<input type="hidden" id="g_recaptcha_response" value="" name="g_recaptcha_response" />-->
                        <div class="uk-width-1-2@s  ">
                            <label>Full Name</label>
                            <input class="uk-input" name="name" type="text" placeholder=" ">
                        </div>
                        <div class="uk-width-1-2@s  ">
                            <label>Email Address</label>
                            <input class="uk-input" name="email" type="email" placeholder=" ">
                        </div>
                        <div class="uk-width-1-1@s uk-margin-small">
                            <label>Your Photo</label>
                            <input class="uk-input" type="file" name="photo" placeholder=" ">
                        </div>

                        <div class="uk-width-1-1@s uk-margin-small">
                            <label>Youtube video URL</label>
                            <input class="uk-input" name="video_url" type="text" placeholder=" ">
                        </div>
                        <div class="uk-width-1-1@s uk-margin-small">
                            <label>Rating</label>
                            <div class="uk-rating">
                                <input id="radio1" type="radio" name="star" value="5" class="uk-star" />
                                <label for="radio1">&#9733;</label>
                                <input id="radio2" type="radio" name="star" value="4" class="uk-star" />
                                <label for="radio2">&#9733;</label>
                                <input id="radio3" type="radio" name="star" value="3" class="uk-star" />
                                <label for="radio3">&#9733;</label>
                                <input id="radio4" type="radio" name="star" value="2" class="uk-star" />
                                <label for="radio4">&#9733;</label>
                                <input id="radio5" type="radio" name="star" value="1" class="uk-star" />
                                <label for="radio5">&#9733;</label>
                            </div>
                        </div>
                        <div class="uk-width-1-1@s uk-margin-small">
                            <label>Review </label>
                            <textarea name="review" class="uk-textarea" rows="5" placeholder="Write Review"> </textarea>
                        </div>
                     
                        <div class="uk-width-1-1@s uk-margin-top">
                            <button id="btn_trip_review" class="uk-button uk-button-primary" type="button">Submit Review </button>
                        </div>
                    </form>
                     </div>
                     <!--  -->
                  </div>
               </div>
            </div>

    <!-- end Reviews -->
</div>
<!-- sidebar -->
     <?php echo $__env->make('themes.default.common.sidebar-trip', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- sidebar end -->
    </div>
</div>
<div id="uk-stop-sticky" class="uk-clearfix"></div>
</section>
<!-- end section -->
   
    <!--  section-->
    <?php if($data->relatedtrips->count() > 0): ?>
        <section class="bg-light  uk-section uk-wave-grey-top uk-position-relative">
            <div class="uk-container">
                <!-- title -->
                <div class="uk-main-title   uk-margin-medium-bottom uk-display-block uk-text-left">
                    <h1 class="uk-h4 uk-heading-line  uk-text-left  uk-position-relative  text-black  uk-text-uppercase uk-margin-remove">
                        <span class="theme-font-extra-bold"> <i class="fa fa-file-text text-primary uk-margin-small-right"></i>Similar Trips </span>
                    </h1>
                </div>
                <!-- title end -->
                <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider>
                    <div class="uk-grid-small uk-slider-items uk-child-width-1-2@s uk-text-center  " uk-grid
                        uk-scrollspy="cls: uk-animation-slide-top-small; target:a;  delay: 300; repeat: false;">
                        <!--  -->
                        <?php $__currentLoopData = $data->relatedtrips; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div>
                                <a class="uk-list-shine uk-cover-container uk-display-block uk-link-toggle " tabindex="0"
                                    href="<?php echo e(url('page/' . tripurl($row->uri))); ?>">
                                    <?php if($row->thumbnail): ?>
                                    <div class="uk-media-300"> <img class="uk-image" alt="" uk-img src="<?php echo e(asset('uploads/original/' . $row->thumbnail)); ?>">
                                    </div>
                                    <?php else: ?>
                                    <div class="uk-media-300"> <img class="uk-image" alt="" uk-img src="<?php echo e(asset('themes-assets/images/blank.png')); ?>">
                                    </div>
                                    <?php endif; ?>
                                    <div class="uk-overlay-primary uk-position-cover"></div>
                                    <div class="uk-position-center">
                                        <div class="uk-overlay">
                                            <h3 class="theme-font-medium-bold uk-margin-remove text-white  uk-text-uppercase">
                                                <?php echo e($row->trip_title); ?>

                                            </h3>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <!--  -->
                    </div>
                  <a class="uk-nav-slider-btn  uk-position-center-left uk-margin-small-left" href="#" uk-icon="icon:arrow-left; ratio: 1.5" uk-slider-item="previous"></a>
            <a class="uk-nav-slider-btn  uk-position-center-right uk-margin-small-right" href="#" uk-icon="icon:arrow-right; ratio: 1.5" uk-slider-item="next"></a>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <!-- section -->

    <!-- Inquire Now popup -->
    <div id="inquire-now" uk-modal>
        <div class="uk-modal-dialog uk-modal-border-rounded">
            <button class="uk-modal-close-default" type="button" uk-close></button>
            <div class="uk-modal-header uk-background-muted uk-text-center uk-padding">
                <h3 class="uk-margin-remove">Have Questions? </h3>
                <h5 class="uk-margin-remove text-primary"><?php echo e($data->trip_title); ?></h5>
            </div>
            <div class="uk-modal-body uk-padding">
                <form class="uk-grid-small" action="<?php echo e(route('post-inquiry')); ?>" method="post" uk-grid>
                    <?php echo e(csrf_field()); ?>

                    <input type="hidden" value="<?php echo e($data->id); ?>" name="trip_id" />
                    <input type="hidden" value="0" name="type" />
                    <input type="hidden" id="g_recaptcha_response" name="g_recaptcha_response" />

                    <h4 class="uk-margin-small text-primary uk-text-bold uk-heading-bullet ">Your Personal Details</h4>
                    <div class="uk-width-1-1@s uk-margin-small">
                        <label>Full Name <span class="text-red">*</span></label>
                        <input class="uk-input" type="text" name="name" required>
                    </div>
                    <div class="uk-width-1-1@s uk-margin-small">
                        <label>Email Address <span class="text-red">*</span></label>
                        <input class="uk-input" type="email" name="email" required>
                    </div>
                    <div class="uk-width-1-1@s uk-margin-small">
                        <label>Country<span class="text-red">*</span></label>
                        <select name="country" class="uk-select">
                            <option>Select Nationality </option>
                            <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($row->country); ?>"><?php echo e($row->country); ?></option>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="uk-width-1-1@s uk-margin-small">
                        <label>Contact Number</label>
                        <input class="uk-input" type="text" name="number">
                    </div>
                    <div class="uk-width-1-1@s uk-margin-small">
                        <label>Your Message/Questions </label>
                        <textarea name="message" class="uk-textarea" rows="5"
                            placeholder="Let us know all your enquiries and we will get back to you shortly.."> </textarea>
                    </div>
           
                    <div class="uk-width-1-1@s uk-text-center">
                        <button class="uk-button uk-button-primary" type="submit">Send Your Inquiry </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="inquire-now-fixed" uk-modal>
        <div class="uk-modal-dialog uk-modal-border-rounded">
            <button class="uk-modal-close-default" type="button" uk-close></button>
            <div class="uk-modal-header uk-background-muted uk-text-center uk-padding">
                <h3 class="uk-margin-remove">Have Questions? </h3>
                <h5 class="uk-margin-remove text-primary"><?php echo e($data->trip_title); ?></h5>
            </div>
            <div class="uk-modal-body uk-padding">
                <form class="uk-grid-small" action="<?php echo e(route('post-inquiry')); ?>" method="post" uk-grid>
                    <?php echo e(csrf_field()); ?>

                    <input type="hidden" value="<?php echo e($data->id); ?>" name="trip_id" />
                    <input type="hidden" value="1" name="type" />
                         <input type="hidden" id="g_recaptcha_response" name="g_recaptcha_response" />
                    <h4 class="uk-margin-small text-primary uk-text-bold uk-heading-bullet ">Your Personal Details</h4>
                    <div class="uk-width-1-1@s uk-margin-small">
                        <label>Full Name <span class="text-red">*</span></label>
                        <input class="uk-input" type="text" name="name" required>
                    </div>
                    <div class="uk-width-1-1@s uk-margin-small">
                        <label>Email Address <span class="text-red">*</span></label>
                        <input class="uk-input" type="email" name="email" required>
                    </div>
                    <div class="uk-width-1-1@s uk-margin-small">
                        <label>Country<span class="text-red">*</span></label>
                        <select name="country" class="uk-select">
                            <option>Select Nationality </option>
                            <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($row->country); ?>"><?php echo e($row->country); ?></option>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="uk-width-1-1@s uk-margin-small">
                        <label>Contact Number</label>
                        <input class="uk-input" type="text" name="number">
                    </div>
                    <div class="uk-width-1-1@s uk-margin-small">
                        <label>Your Message/Questions </label>
                        <textarea name="message" class="uk-textarea" rows="5"
                            placeholder="Let us know all your enquiries and we will get back to you shortly.."> </textarea>
                    </div>
           
                    <div class="uk-width-1-1@s uk-text-center">
                        <button class="uk-button uk-button-primary" type="submit">Send Your Inquiry </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- slider -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script type="text/javascript">
$(document).ready(function (){
    $('.alert').hide(8000);
});

$(document).ready(function () {
    $('.news_sort').change(function (e) {    
        var val = $(this).find(':checked').val();
         var csrf = $('meta[name="csrf-token"]').attr('content');
         var url =
            "<?php echo e(route('trip-cost-inc', ['trip_id' => ':trip_id', 'trip_category' => ':trip_category'])); ?>";                   
        url = url.replace(':trip_id', <?php echo e($data->id); ?>);
        url = url.replace(':trip_category', val);

        $.ajax({
            url: url,
            type: "GET",
            data: {
                 _token: csrf
            },
            success: function (data) {                    
            $('.filter_result').replaceWith($('.filter_result')).html(data);
            }
        });
    })
});
</script>

  <script type="text/javascript">
    $('#btn_trip_review').on('click', function (e) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    e.preventDefault();
    
    let myform = document.getElementById('review_form');
    let formData = new FormData(myform);
    formData.append('trip_id',<?php echo e($data->id); ?>);
    
    $.ajax({
        type: 'POST',
        url: '<?php echo e(route('add-review')); ?>',
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
    
        success: function (data) {
            jQuery.each(data.errors, function (key, value) {
                toastr.error(value);
                // hideLoading();
            });
            if (data.status == 'success') {
                document.getElementById("review_form"). reset();
                location.reload();
                toastr.success(data.message);
            }
        },
        error: function (a) {
            alert("An error occured while uploading data.\n error code : " + a.statusText);
        }
    });
    });
</script>
<script src="https://www.google.com/recaptcha/api.js?render=<?php echo e(env('SITE_KEY')); ?>"></script>
<script>
grecaptcha.ready(function() {
    grecaptcha.execute('<?php echo env("SITE_KEY"); ?>', {action: 'homepage'}).then(function(token) {
      document.getElementById('g_recaptcha_response').value=token;
    });
});
</script>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    let smallNav = document.querySelector('.uk-small-nav');
    let mainHeader = document.querySelector('.uk-main-header');
    let smallNavOffset = smallNav.offsetTop;
    let prevScrollPos = sessionStorage.getItem('scrollPosition') || 0;

    function handleScroll() {
        const currentScrollPos = window.pageYOffset;

        if (window.scrollY >= smallNavOffset) {
            if (prevScrollPos > currentScrollPos) {
                mainHeader.classList.remove('uk-hidden');
            } else {
                // user has scrolled down
                mainHeader.classList.add('uk-hidden');
            }
            prevScrollPos = currentScrollPos;
        } else {
            mainHeader.classList.remove('uk-hidden');
        }

        // Save the current scroll position to session storage
        sessionStorage.setItem('scrollPosition', currentScrollPos);
    }

    window.addEventListener('scroll', handleScroll);
});

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('themes.default.common.trip-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sevensummittreks/public_html/resources/views/themes/default/tripdetail.blade.php ENDPATH**/ ?>