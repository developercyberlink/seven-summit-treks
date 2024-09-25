<?php $__env->startSection('content'); ?>
    <!-- main video and image banner -->
    <?php echo $__env->make('themes.default.common.banner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- end main video and image banner -->
     <!-- affiliated  logo -->
   <section class="bg-light uk-section-small uk-position-relative" uk-scrollspy="cls: uk-animation-slide-left-small;  delay: 100; repeat: false;">
      <div class="uk-container ">
         <!-- for small device -->
         <div class="uk-hidden@m"> <img src="<?php echo e(asset('uploads/original/'.$settings->first()->mobile_banner_logo)); ?>" alt="" uk-img> </div>
         <!-- for small device -->
         <div class="uk-visible@m"> <img src="<?php echo e(asset('uploads/original/'.$settings->first()->banner_logo)); ?>" alt="" uk-img> </div>
   </section>
   <!-- End affiliated  logo -->
     <?php if($expeditions->count() > 0): ?>
   <!--   section with trip list(visible large) -->
<section class="uk-section   uk-position-relative  bg-white uk-visible@s">
  <div class="uk-container ">
    <div class="uk-position-relative uk-visible-toggle  uk-slider uk-slider-container" tabindex="-1" style="padding-right:0; padding-top:20px;" uk-slider="sets: true; finite: true;" uk-parallax="">
      <ul class="uk-slider-items uk-grid-small uk-text-center" uk-grid uk-scrollspy="cls: uk-animation-slide-left-small; target:h1, p, img;  delay: 100; repeat: false;">
       <?php $__currentLoopData = $expeditions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="uk-item uk-width-5-6 uk-width-1-2@s uk-width-1-4@m uk-active" tabindex="-1" style="">
          <a class="uk-list-shine uk-corner-hover uk-cover-container uk-display-block" tabindex="0" href="<?php echo e(route('page.expeditionlist', $row->uri)); ?>">
            <div class="uk-media-520">
                <?php if($row->thumbnail): ?>
                <img class="uk-image" alt="<?php echo e($row->title); ?>" uk-img src="<?php echo e(asset('uploads/original/' . $row->thumbnail)); ?>">
                <?php else: ?>
                <img class="uk-image" alt="<?php echo e($row->title); ?>" uk-img src="<?php echo e(asset('themes-assets/images/blank.png')); ?>">
                <?php endif; ?>
              <!-- corner -->
              <div class="uk-corner-borders uk-corner-borders--left"></div>
              <div class="uk-corner-borders uk-corner-borders--right"></div>
              <!-- end -->
            </div>
            <div class="uk-overlay-primary uk-position-cover"></div>
            <div class="uk-position-center">
              <div class="uk-overlay">
                <h1 class="main-title-font  uk-margin-remove text-primary">  <?php echo e($row->title); ?></h1>
                <p class="uk-margin-remove  text-white"><?php echo e($row->content); ?></p>
              </div>
            </div>
          </a>
        </li>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
      <a class=" bg-fill uk-nav-slider-btn  uk-position-center-left uk-margin-small-left" href="#" uk-icon="icon:arrow-left; ratio: 1.5" uk-slider-item="previous"></a>
        <a class="  bg-fill uk-nav-slider-btn  uk-position-center-right uk-margin-small-right" href="#" uk-icon="icon:arrow-right; ratio: 1.5" uk-slider-item="next"></a>
      <ul class="uk-visible@s uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>
    </div>

  </div>
  </div>
</section>
<!--   section with trip list(visible small) -->
<section class="uk-section   uk-position-relative  bg-white uk-hidden@s">
  <div class="uk-container ">
      <div class=" uk-grid-small uk-child-width-1-2@s  uk-child-width-1-4@l uk-text-center" uk-grid uk-scrollspy="cls: uk-animation-slide-left-small; target:h1, p, img;  delay: 100; repeat: false;">
     <?php $__currentLoopData = $expeditions->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div>
        <a class="uk-list-shine uk-corner-hover uk-cover-container  uk-display-block" href="<?php echo e(route('page.expeditionlist', $row->uri)); ?>">
          <div class="uk-media-520">
           <?php if($row->thumbnail): ?>
            <img class="uk-image" alt="<?php echo e($row->title); ?>" uk-img src="<?php echo e(asset('uploads/original/' . $row->thumbnail)); ?>">
            <?php else: ?>
            <img class="uk-image" alt="<?php echo e($row->title); ?>" uk-img src="<?php echo e(asset('themes-assets/images/blank.png')); ?>">
            <?php endif; ?>
            <div class="uk-corner-borders uk-corner-borders--left"></div>
            <div class="uk-corner-borders uk-corner-borders--right"></div>
          </div>
          <div class="uk-overlay-primary  uk-position-cover"></div>
          <div class="uk-position-center">
            <div class="uk-overlay ">
              <h1 class="main-title-font uk-margin-remove text-primary"> <?php echo e($row->title); ?> </h1>
              <p class="uk-margin-remove text-white"><?php echo e($row->content); ?></p>
            </div>
          </div>
        </a>
      </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="uk-position-relative uk-visible-toggle  uk-slider uk-slider-container" tabindex="-1" style="padding-right:0; padding-top:20px;" uk-slider="sets: false; finite: true;" uk-parallax="">
      <ul class="uk-slider-items uk-grid-small uk-text-center" uk-grid uk-scrollspy="cls: uk-animation-slide-left-small; target:h1, p, img;  delay: 100; repeat: false;">
      <?php $__currentLoopData = $expeditions->skip(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <!--  -->
        <li class="uk-item uk-width-5-6 uk-width-1-2@s uk-width-1-4@m uk-active " tabindex="-1" style="">
          <a class="uk-list-shine uk-corner-hover uk-cover-container uk-display-block" tabindex="0" href="<?php echo e(route('page.expeditionlist', $row->uri)); ?>">
            <div class="uk-media-520">
              <?php if($row->thumbnail): ?>
            <img class="uk-image" alt="<?php echo e($row->title); ?>" uk-img src="<?php echo e(asset('uploads/original/' . $row->thumbnail)); ?>">
            <?php else: ?>
            <img class="uk-image" alt="<?php echo e($row->title); ?>" uk-img src="<?php echo e(asset('themes-assets/images/blank.png')); ?>">
            <?php endif; ?>
              <!-- corner -->
              <div class="uk-corner-borders uk-corner-borders--left"></div>
              <div class="uk-corner-borders uk-corner-borders--right"></div>
              <!-- end -->
            </div>
            <div class="uk-overlay-primary uk-position-cover"></div>
            <div class="uk-position-center">
              <div class="uk-overlay">
                <h1 class="main-title-font uk-margin-remove text-primary"> <?php echo e($row->title); ?> </h1>
                <p class="uk-margin-remove text-white"><?php echo e($row->content); ?> </p>
              </div>
            </div>
          </a>
        </li>
        <!--  -->
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
      <a class="uk-visible@s  bg-fill uk-nav-slider-btn  uk-position-center-left uk-margin-small-left" href="#" uk-icon="icon:arrow-left; ratio: 1.5" uk-slider-item="previous"></a>
        <a class="uk-visible@s   bg-fill uk-nav-slider-btn  uk-position-center-right uk-margin-small-right" href="#" uk-icon="icon:arrow-right; ratio: 1.5" uk-slider-item="next"></a>
      <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>
    </div>

  </div>
  </div>
</section>
<?php endif; ?>
<!-- end   section with trip list -->
<?php /*?>
    <!--  section with trip list -->
    <section class="uk-section   uk-position-relative  bg-white">
        <div class="uk-container ">
            <div class="uk-grid-small uk-child-width-1-2@s  uk-child-width-1-4@l uk-text-center" uk-grid
                uk-scrollspy="cls: uk-animation-slide-left-small; target:h1, p, img;  delay: 100; repeat: false;">

                <!--  -->
                @if ($expeditions->count() > 0)
                    @foreach ($expeditions as $row)
                        <div>
                            <a class="uk-list-shine uk-corner-hover uk-cover-container uk-display-block"
                                href="{{ route('page.expeditionlist', $row->uri) }}">
                                <div class="uk-media-520">
                                    @if ($row->thumbnail)
                                        <img class="uk-image" alt="{{ $row->title }}" uk-img
                                            src="{{ asset('uploads/original/' . $row->thumbnail) }}">
                                    @else
                                        <img class="uk-image" alt="{{ $row->title }}" uk-img
                                            src="{{ asset('themes-assets/images/blank.png') }}">
                                    @endif
                                    <!-- corner -->
                                    <div class="uk-corner-borders uk-corner-borders--left"></div>
                                    <div class="uk-corner-borders uk-corner-borders--right"></div>
                                    <!-- end -->
                                </div>
                                <div class="uk-overlay-primary  uk-position-cover"></div>
                                <div class="uk-position-center">
                                    <div class="uk-overlay ">
                                        <h1 class="main-title-font uk-margin-remove text-primary">
                                            {{ $row->title }}
                                        </h1>
                                        <p class="uk-margin-remove text-white"> {{ $row->content }} </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif
                <!--  -->
            </div>
        </div>
    </section>
    <!-- end   section with trip list -->
    <?php */?>
    <!-- section -->
    <?php echo $__env->make('themes.default.common.14peaks', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- end section -->

    <!-- section -->
    <?php if($regions->count() > 0): ?>
  <section class="uk-section-large uk-padding-remove-top  uk-position-relative ">
   <div class="uk-container">
      <div class="bg-white   uk-box-shadow-medium uk-border-rounded">
         <!--  -->
           <?php $__currentLoopData = $regions->slice(0, 2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($loop->odd): ?>
         <div class="uk-grid-collapse uk-flex-middle  uk-img-effect" uk-grid uk-scrollspy="cls: uk-animation-slide-left-small; target:div;  delay: 100; repeat: false;">
            <div class="uk-width-1-2@m">
               <div class="uk-media-450 uk-animated-after">
                  <a href="<?php echo e(url(regionurl($row->uri))); ?>"> 
                    <?php if($row->banner): ?>
                    <img src="<?php echo e(asset('uploads/banners/' . $row->banner)); ?>" alt="<?php echo e($row->title); ?>" class="uk-effect-1">
                     <?php else: ?>
                    <img class="uk-image" alt="<?php echo e($row->title); ?>" uk-img src="<?php echo e(asset('themes-assets/images/blank.png')); ?>">
                  <?php endif; ?>
                 </a>
               </div>
            </div>
            <div class="uk-width-1-2@m">
               <div class="uk-padding">
                  <div class="main-animated-title uk-margin-medium-bottom"> <a href="<?php echo e(url(regionurl($row->uri))); ?>" class="uk-h3 theme-font-medium-bold text-black"><?php echo e($row->title); ?></a> </div>
                   <?php echo $row->excerpt; ?>

                  <a href="<?php echo e(url(regionurl($row->uri))); ?>" class="uk-flex-middle uk-button-home uk-button-home-primary uk-flex uk-flex-middle" > <span class="uk-icon bg-primary"  ><i class="fa fa-angle-right" aria-hidden="true"></i></span>  Learn More
                  </a> 
               </div>
            </div>
         </div>
         <!--  -->
          <?php endif; ?>
            <?php if($loop->even): ?>
         <!--  -->
         <div class="uk-grid-collapse uk-flex-middle  uk-img-effect" uk-grid uk-scrollspy="cls: uk-animation-slide-left-small; target:div;  delay: 100; repeat: false;">
            <div class="uk-width-1-2@m  uk-flex-last uk-flex-first@m">
               <div class="uk-padding">
                  <div class="main-animated-title uk-margin-medium-bottom"> <a href="<?php echo e(url(regionurl($row->uri))); ?>" class="uk-h3 theme-font-medium-bold text-black"><?php echo e($row->title); ?> </a> </div>
                  <?php echo $row->excerpt; ?>

                  <a href="<?php echo e(url(regionurl($row->uri))); ?>" class="uk-flex-middle uk-button-home uk-button-home-primary uk-flex uk-flex-middle" > <span class="uk-icon bg-primary"  ><i class="fa fa-angle-right" aria-hidden="true"></i></span>  Learn More
                  </a>
               </div>
            </div>
            <div class="uk-width-1-2@m  uk-flex-first uk-flex-last@m">
               <div class="uk-media-450 uk-animated-after">
                  <a href="<?php echo e(url(regionurl($row->uri))); ?>"> 
                  <?php if($row->banner): ?>
                <img src="<?php echo e(asset('uploads/banners/' . $row->banner)); ?>" alt="<?php echo e($row->title); ?>" class="uk-effect-1">
                <?php else: ?>
                <img class="uk-image" alt="<?php echo e($row->title); ?>" uk-img src="<?php echo e(asset('themes-assets/images/blank.png')); ?>">
                <?php endif; ?>
                 </a>
               </div>
            </div>
         </div>
         <!--  -->
          <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         <!--  -->
      
         <!--  -->
      </div>
      <div class="uk-margin-top">
         <div class="uk-position-relative uk-visible-toggle  " tabindex="-1" uk-slider="sets: true; finite: true;">
            <ul class="uk-slider-items uk-child-width-1-1 uk-child-width-1-3@s uk-child-width-1-3@m uk-grid-small" uk-grid uk-scrollspy="cls: uk-animation-slide-top-small; target:a;  delay: 300; repeat: false;">
               <!--  -->
                <?php $__currentLoopData = $regions->skip(2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <li>
                  <a class="uk-list-shine uk-corner-hover uk-cover-container uk-display-block uk-link-toggle " tabindex="0" href="<?php echo e(url(regionurl($row->uri))); ?>">
                     <div class="uk-media-300">
                         <?php if($row->banner): ?>
                            <img src="<?php echo e(asset('uploads/banners/' . $row->banner)); ?>" alt="<?php echo e($row->title); ?>" class="uk-image">
                            <?php else: ?>
                            <img class="uk-image" alt="<?php echo e($row->title); ?>" uk-img src="<?php echo e(asset('themes-assets/images/blank.png')); ?>">
                            <?php endif; ?>
                        <!-- corner -->
                        <div class="uk-corner-borders uk-corner-borders--left"></div>
                        <div class="uk-corner-borders uk-corner-borders--right"></div>
                        <!-- end -->
                     </div>
                     <div class="uk-overlay-primary uk-position-cover"></div>
                     <div class="uk-position-center">
                        <div class="uk-overlay">
                           <h3 class="theme-font-medium-bold uk-margin-remove text-white">
                              <?php echo e($row->title); ?> 
                           </h3>
                        </div>
                     </div>
                  </a>
               </li>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               <!--  -->
               
            </ul>
          <a class="uk-nav-slider-btn  uk-position-center-left uk-margin-small-left" href="#" uk-icon="icon:arrow-left; ratio: 1.5" uk-slider-item="previous"></a>
            <a class="uk-nav-slider-btn  uk-position-center-right uk-margin-small-right" href="#" uk-icon="icon:arrow-right; ratio: 1.5" uk-slider-item="next"></a>
            <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>
         </div>
      </div>
   </div>
</section>
    <?php endif; ?>
    <!-- end section -->
    <!-- section -->
   <?php if($reviews->count() > 0): ?>
   <section class="uk-position-relative">
   <div class="uk-container">
      <div class="uk-testimonials-home uk-trip-list-nav ">
         <!--  -->
         <div uk-slider="sets: true;">
            <div class="uk-position-relative ">
               <div class="uk-slider-container  ">
                  <ul class="uk-slider-items uk-child-width-1-1 uk-child-width-1-1@s uk-child-width-1-1@m">    
                  <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>     
                     <li>
                        <div>
                           <div class="uk-testimonials-author uk-margin-medium-bottom">
                              <div class="uk-flex  uk-flex-middle">
                                 <div>
                                    <div class="uk-media-60 uk-margin-small-right"> 
                                      <?php if($row->image): ?>
                                    <img src="<?php echo e(asset('images/reviews/'.$row->image)); ?>" alt="" class="uk-border-circle">
                                        <?php else: ?>
                                    <img src="<?php echo e(asset('themes-assets/images/users.jpg')); ?>" alt="" class="uk-border-circle">
                                    <?php endif; ?>  
                                    </div>
                                 </div>
                                 <div>
                                    <div>
                                       <h1 class="uk-h4 uk-margin-remove theme-font-extra-bold">
                                            <?php echo e($row->name); ?>

                                       </h1>
                                       <h1 class="text-primary uk-margin-remove theme-font-medium uk-h4">
                                           <?php echo e($row->country); ?> 
                                       </h1>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="uk-testimonials-content">
                              <div class="uk-flex">
                                 
                                 <div class="uk-margin-small-bottom">
                                       <div class="uk-show-more uk-h4 theme-font-medium uk-text-justify">
                                        <?php echo Str::limit($row->review, 300); ?>

                                           
                                          <a href="#"  uk-toggle="target:#ReviewDetails<?php echo e($loop->iteration); ?>" class="uk-flex-middle uk-button-home uk-button-home-primary uk-flex uk-flex-middle" >
                                               <span class="uk-icon bg-primary"  ><i class="fa fa-angle-right" aria-hidden="true"></i></span>  Read More
                                       </a>
                                       </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </ul>
               </div>
            </div>
            <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>
         </div>
         <!--  -->
      </div>
   </div>
   <div>
   </div>
   <div class="uk-hidden@l"> 
      <img src="<?php echo e(asset('uploads/original/'.$settings->first()->testimonial_img_sm)); ?>" alt="" uk-img> 
   </div>
   <!-- for small device -->
   <div class="uk-visible@l"> 
      <img src="<?php echo e(asset('uploads/original/'.$settings->first()->testimonial_img)); ?>" alt="" uk-img> 
   </div>
</section>
    <?php endif; ?>
   
    <!-- end section -->
    <!-- blog -->
    <?php if($blogs->count() > 0): ?>
        <section class="uk-section  bg-white">
            <div class=" uk-container">
                <div class="uk-main-title   uk-margin-medium-bottom uk-text-left"
                    uk-scrollspy="cls: uk-animation-slide-left-small; target:h1, h4, a;  delay: 300; repeat: false;">
                    <div class="uk-flex-middle uk-flex-between uk-flex">
                        <div>
                            <h4 class=" text-primary uk-margin-remove">Recent from </h4>
                            <h1 class="uk-h2 text-black uk-margin-remove"> Our <span class="theme-font-extra-bold">Blog</span>
                            </h1>
                        </div>
                        <div> <a href="<?php echo e(url(geturl('our-blog'))); ?>" class="uk-button-home uk-button-home-primary uk-flex uk-flex-middle" uk-scrollspy="cls: uk-animation-slide-top;   delay: 1600; repeat: false;"> 
               <span class="uk-icon bg-primary"uk-scrollspy="cls: uk-animation-slide-right; delay: 2000; repeat: false;"><i class="fa fa-angle-right" aria-hidden="true"></i></span> View All
                       </a>
                        </div>
                    </div>
                </div>
                <!--  -->
                <?php if($blog_thumbs->count() > 0): ?>
                <div class=" uk-child-width-1-2@s uk-child-width-1-2@m  uk-grid-medium uk-grid" uk-grid  uk-scrollspy="cls: uk-animation-slide-left-small; target:.uk-article;  delay: 300; repeat: false;">

                        <!--  -->
                        <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="uk-blog-lg">
                                <div class="uk-position-relative">
                                    <a class="uk-article uk-display-block uk-link-toggle "
                                        href="<?php echo e(url(geturl($row->uri))); ?>">
                                        <div class="uk-overlay-primary  uk-position-cover"></div>
                                        <div class="uk-media-300">
                                            <?php if($row->page_thumbnail): ?>
                                                <img class="uk-image" uk-img=""
                                                    src="<?php echo e(asset('uploads/original/' . $row->page_thumbnail)); ?>"
                                                    alt="<?php echo e($row->post_title); ?>" />
                                            <?php else: ?>
                                                <img src="<?php echo e(asset('themes-assets/images/blank.png')); ?>"
                                                    alt="<?php echo e($row->post_title); ?>">
                                            <?php endif; ?>

                                        </div>
                                        <div class="uk-position-bottom-center uk-padding">
                                            <div class="uk-text-left uk-position-z-index">
                                                <div class="uk-width-1-1@m">
                                                    <div class="text-white uk-h5 uk-margin-top uk-margin-remove-bottom">
                                                        <?php echo e(dateformat($row->post_date)); ?>

                                                    </div>
                                                    <h3
                                                        class="text-white theme-font-medium-bold uk-margin-small-top uk-margin-small-bottom ">
                                                        <?php echo e($row->post_title); ?>

                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <!--  -->
                    </div>
                <?php endif; ?>

                </div>
      
        </section>

    <!-- blog-->  
    <!-- instagram -->
    <section class="uk-section bg-white">
        <div class="uk-container">
               <div>
          <h4 class=" text-primary uk-margin-remove uk-text-center">
              <a href="https://www.instagram.com/sevensummittreks/" target="_blank" class="text-primary ">@sevensummittreks  </a>
              <img src="<?php echo e(asset('themes-assets/images/icon/verified.png')); ?>" width="20px">
              </h4>
                
                </div> 
                <style>
               a.eapps-link {
            display: none !important;
            visibility: hidden;
            opacity: 0 !important;
            font-size: 0 !important;
         }
         .eui-widget-title.es-widget-title.eapps-instagram-feed-title {
    padding: 10px 0 35px;
}
             <?php endif; ?>

            </style>
        
        <script src="https://apps.elfsight.com/p/platform.js" defer></script>
        <div class="elfsight-app-66f35a8f-4019-45d8-9621-c61a672878fd"></div>     
               
        </div>
    </section>   
    <!-- end instagram -->
     <!--section -->
   <!--<section class=" bg-white  uk-position-relative uk-flex uk-flex-middle  uk-overflow-hidden" uk-height-viewport="offset-bottom: 20;">-->
   <section class="uk-section-xlarge bg-white  uk-position-relative   uk-overflow-hidden" >
   <!--  -->
   <div class="scene-position">
      <ul id="scene">
         <li class="layer" data-depth="0.1"> <img src="<?php echo e(asset('uploads/original/'.$settings->first()->animation1)); ?>" alt="<?php echo e($setting->site_name); ?>" class="bg-img bg-img-0"> </li>
         <li class="layer" data-depth="0.2"> <img src="<?php echo e(asset('uploads/original/'.$settings->first()->animation2)); ?>" alt="<?php echo e($setting->site_name); ?>" class="bg-img bg-img-1"> </li>
         <li class="layer" data-depth="0.6"> <img src="<?php echo e(asset('themes-assets/images/animation/big-clouds.png')); ?>" alt="<?php echo e($setting->site_name); ?>" class="bg-img bg-img-2"> </li>
         <li class="layer" data-depth=".8"> <img src="<?php echo e(asset('themes-assets/images/animation/big-clouds.png')); ?>" alt="<?php echo e($setting->site_name); ?>" class="bg-img bg-img-3"> </li>
      </ul>
   </div>
   <!--  -->
   <div class="uk-container uk-container-small uk-align-center">
      <!--<div class="uk-child-width-1-3@s uk-flex-middle uk-text-center uk-grid" uk-grid uk-scrollspy="cls: uk-animation-slide-left-small; target:div;  delay: 300; repeat: false;">-->
        <div class="uk-child-width-expand@s uk-flex-middle uk-text-center uk-grid" uk-grid uk-scrollspy="cls: uk-animation-slide-top-small; target:div, path;  delay: 50; repeat: false;">
         <div>
            <h1 class="uk-h3 theme-font-medium-bold"> <?php echo e($setting->text1); ?></h1>
         </div>
         
         <div>
         <style type="text/css">
           #animationfooter path.same-color
           {
            fill:#262626;
           }
        </style>
        <svg version="1.1" id="animationfooter" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 180 180" style="enable-background:new 0 0 180 180;" xml:space="preserve" width="150">
 
<g id="dhikka">
  <g id="dots">
     <path id="_x31_" class="same-color" d="M99.3,10.8c0,3.3-2.7,6-6,6s-6-2.7-6-6s2.7-6,6-6C96.7,4.8,99.3,7.5,99.3,10.8z"/>
       <path id="_x32_" class="same-color" d="M87.7,40.8c0,4.3-3.4,7.7-7.7,7.7c-4.3,0-7.7-3.4-7.7-7.7s3.4-7.7,7.7-7.7
      C84.3,33.1,87.7,36.6,87.7,40.8z"/>
     <path id="_x33_" class="same-color" d="M111.8,40.8c0,2.8-2.3,5.1-5.1,5.1c-2.8,0-5.1-2.3-5.1-5.1s2.3-5.1,5.1-5.1
      C109.5,35.7,111.8,38,111.8,40.8z"/>
  

      <path id="_x36_" class="same-color" d="M126.3,71c0,3.3-2.7,6-6,6s-6-2.7-6-6c0-3.3,2.7-6,6-6S126.3,67.7,126.3,71z"/>
    <path id="_x35_" class="same-color" d="M101,71c0,4.3-3.4,7.7-7.7,7.7s-7.7-3.4-7.7-7.7c0-4.3,3.4-7.7,7.7-7.7C97.6,63.3,101,66.8,101,71
      z"/>
    <path id="_x34_" class="same-color" d="M75.8,71c0,5.2-4.2,9.4-9.4,9.4S57,76.3,57,71c0-5.2,4.2-9.4,9.4-9.4C71.6,61.6,75.8,65.9,75.8,71
      z"/>
<path id="_x31_0" class="same-color" d="M141.7,101.5c0,3.8-3.1,6.9-6.9,6.9s-6.9-3.1-6.9-6.9s3.1-6.9,6.9-6.9S141.7,97.7,141.7,101.5z"
      />
    <path id="_x39_" class="same-color" d="M116.3,101.5c0,4.3-3.4,7.7-7.7,7.7c-4.3,0-7.7-3.4-7.7-7.7s3.4-7.7,7.7-7.7
      C112.9,93.8,116.3,97.2,116.3,101.5z"/>
    <path id="_x38_" class="same-color" d="M91.8,101.5c0,5.2-4.2,9.4-9.4,9.4s-9.4-4.2-9.4-9.4c0-5.2,4.2-9.4,9.4-9.4
      C87.6,92,91.8,96.2,91.8,101.5z"/>
    <path id="_x37_" class="same-color" d="M62.9,101.5c0,6.1-5,11.1-11.1,11.1s-11.1-5-11.1-11.1s5-11.1,11.1-11.1
      C58,90.3,62.9,95.3,62.9,101.5z"/>


    <path id="_x31_4" class="same-color" d="M154.3,132c0,4.7-3.8,8.5-8.5,8.5s-8.5-3.8-8.5-8.5c0-4.7,3.8-8.5,8.5-8.5
      C150.5,123.5,154.3,127.3,154.3,132z"/>
    <path id="_x31_3" class="same-color" d="M121.1,132c0,5.7-4.6,10.2-10.2,10.2s-10.2-4.6-10.2-10.2c0-5.7,4.6-10.2,10.2-10.2
      S121.1,126.4,121.1,132z"/>
    <path id="_x31_2" class="same-color" d="M87,132c0,6.1-5,11.1-11.1,11.1s-11.1-5-11.1-11.1c0-6.1,5-11.1,11.1-11.1
      C82.1,120.9,87,125.9,87,132z"/>
    <path id="_x31_1" class="same-color" d="M53.8,132c0,7.1-5.8,12.8-12.8,12.8s-12.8-5.8-12.8-12.8c0-7.1,5.8-12.8,12.8-12.8
      C48,119.2,53.8,124.9,53.8,132z"/>
    
    
    
   
  </g>
  <g id="name">
    <!-- seven -->
    <path class="same-color" d="M10.1,161c0.7,0.4,1.2,0.7,1.7,0.9c0.5,0.1,1,0.3,1.4,0.3c0.5,0,0.8-0.1,1.1-0.3c0.3-0.2,0.4-0.5,0.4-0.8
      c0-0.4-0.5-1-1.4-1.5c-0.1-0.1-0.3-0.1-0.3-0.2l-0.8-0.5c-0.7-0.4-1.2-0.9-1.6-1.4c-0.3-0.5-0.5-1.1-0.5-1.7c0-0.9,0.3-1.6,1-2.1
      c0.6-0.5,1.5-0.8,2.5-0.8c0.4,0,0.8,0.1,1.2,0.1c0.5,0.1,1,0.2,1.5,0.4v2.5c-0.5-0.4-1-0.6-1.4-0.8c-0.5-0.2-0.9-0.3-1.2-0.3
      c-0.3,0-0.7,0.1-0.9,0.2c-0.2,0.1-0.3,0.3-0.3,0.6c0,0.2,0.1,0.3,0.2,0.5s0.3,0.3,0.5,0.5l1.3,0.7c1.1,0.6,1.8,1.2,2.1,1.6
      c0.3,0.5,0.5,1.1,0.5,1.8c0,1-0.3,1.9-1.1,2.6s-1.7,1-2.9,1c-0.4,0-0.8-0.1-1.3-0.1s-1-0.2-1.6-0.4L10.1,161z"/>
       <path class="same-color" d="M19,164.1v-10.8h6.7v2.3h-4.1v2H25v2.3h-3.5v2.1h4.2v2.3C25.7,164.1,19,164.1,19,164.1z"/>
       <path class="same-color" d="M31.4,164.5h-0.2l-5.1-11.2h2.7l2.5,5.9l2.6-5.9h2.5L31.4,164.5z"/>
       <path class="same-color" d="M37.3,164.1v-10.8h6.7v2.3h-4.1v2h3.5v2.3h-3.5v2.1H44v2.3C44,164.1,37.3,164.1,37.3,164.1z"/>
       <path class="same-color" d="M46,164.1V153h0.3l6.7,6.3v-6h2.4v11.2h-0.2l-6.8-6.3v5.9L46,164.1L46,164.1z"/>
       <!-- seven -->
        <!-- summit -->
       <path class="same-color" d="M61.8,161c0.7,0.4,1.2,0.7,1.7,0.9c0.5,0.1,1,0.3,1.4,0.3c0.5,0,0.8-0.1,1.1-0.3c0.3-0.2,0.4-0.5,0.4-0.8
      c0-0.4-0.5-1-1.4-1.5c-0.1-0.1-0.3-0.1-0.3-0.2l-0.8-0.5c-0.7-0.4-1.2-0.9-1.6-1.4c-0.3-0.5-0.5-1.1-0.5-1.7c0-0.9,0.3-1.6,1-2.1
      c0.6-0.5,1.5-0.8,2.5-0.8c0.4,0,0.8,0.1,1.2,0.1c0.5,0.1,1,0.2,1.5,0.4v2.5c-0.5-0.3-1-0.6-1.5-0.8c-0.5-0.2-0.9-0.3-1.2-0.3
      s-0.7,0.1-0.9,0.2c-0.2,0.1-0.3,0.3-0.3,0.6c0,0.2,0.1,0.3,0.2,0.5s0.3,0.3,0.5,0.5l1.3,0.7c1.1,0.6,1.8,1.2,2.1,1.6
      c0.3,0.5,0.5,1.1,0.5,1.8c0,1-0.3,1.9-1.1,2.6c-0.8,0.7-1.7,1-2.9,1c-0.4,0-0.8-0.1-1.3-0.1c-0.5-0.1-1-0.2-1.6-0.4V161z"/>
      <path class="same-color" d="M73,153.3v5.9c0,1,0.2,1.7,0.5,2.2s0.9,0.7,1.6,0.7s1.2-0.2,1.6-0.7s0.5-1.1,0.5-1.9v-6.2h2.3v6.2
      c0,1.6-0.4,2.8-1.2,3.6c-0.8,0.9-1.9,1.3-3.3,1.3s-2.6-0.4-3.3-1.3s-1.2-2.1-1.2-3.6v-6.2L73,153.3L73,153.3z"/>
      <path class="same-color" d="M116.2,164.1v-8.6h-3.4v-2.3h9.5v2.3h-3.4v8.6H116.2z"/>
    <path class="same-color" d="M108.9,164.1v-10.8h2.6v10.8H108.9z"/>
    <path class="same-color" d="M94.5,164.1l2.3-11.1H97l4.1,7l3.8-7h0.2l2.3,11.1h-2.5l-0.9-4.9l-3,5.3h-0.2l-3.2-5.4l-1,5H94.5z"/>
    <path class="same-color" d="M81.1,164.1l2.3-11.1h0.2l4.1,7l3.8-7h0.2l2.3,11.1h-2.5l-0.9-4.9l-3,5.3h-0.2l-3.2-5.4l-1,5H81.1z"/>
    <!-- summit -->

    <!-- treks -->
     <path class="same-color" d="M130,164.1v-8.6h-3.4v-2.3h9.5v2.3h-3.4v8.6H130z"/>
     <path class="same-color" d="M137.3,164.1v-10.8h2.8c0.9,0,1.6,0.1,2.1,0.2c0.5,0.1,1,0.3,1.3,0.6c0.4,0.3,0.7,0.6,1,1.1
      c0.3,0.5,0.3,0.9,0.3,1.4c0,0.7-0.2,1.3-0.5,1.8c-0.3,0.5-0.8,0.9-1.5,1.2l3.3,4.6h-3l-2.9-4.2h-0.3v4.2L137.3,164.1L137.3,164.1z
       M140.2,155.3h-0.4v3h0.5c0.7,0,1.2-0.1,1.5-0.4c0.3-0.3,0.5-0.6,0.5-1.2s-0.1-0.9-0.5-1.1C141.5,155.4,140.9,155.3,140.2,155.3z"
      />
      <path class="same-color" d="M147,164.1v-10.8h6.7v2.3h-4.1v2h3.5v2.3h-3.5v2.1h4.2v2.3C153.7,164.1,147,164.1,147,164.1z"/>
      <path class="same-color" d="M155.6,164.1v-10.8h2.5v4.7l3.5-4.7h3.1l-4.1,5.1l4.4,5.6h-3.2l-3.8-4.9v4.9
      C158.1,164.1,155.6,164.1,155.6,164.1z"/>
      <path class="same-color" d="M165.6,161c0.7,0.4,1.2,0.7,1.7,0.9c0.5,0.1,0.9,0.3,1.4,0.3c0.5,0,0.8-0.1,1.1-0.3c0.3-0.2,0.4-0.5,0.4-0.8
      c0-0.4-0.5-1-1.4-1.5c-0.1-0.1-0.3-0.1-0.3-0.2l-0.8-0.4c-0.7-0.4-1.2-0.9-1.6-1.4c-0.3-0.5-0.5-1.1-0.5-1.7c0-0.9,0.3-1.6,1-2.1
      c0.7-0.5,1.5-0.8,2.5-0.8c0.4,0,0.8,0.1,1.2,0.1c0.5,0.1,1,0.2,1.5,0.4v2.5c-0.5-0.3-1-0.6-1.5-0.8c-0.5-0.2-0.9-0.3-1.2-0.3
      s-0.7,0.1-0.9,0.2c-0.2,0.1-0.3,0.3-0.3,0.6c0,0.2,0.1,0.3,0.2,0.5c0.1,0.2,0.3,0.3,0.5,0.5l1.3,0.7c1.1,0.6,1.8,1.2,2.1,1.6
      c0.3,0.5,0.5,1.1,0.5,1.8c0,1-0.3,1.9-1.1,2.6c-0.8,0.7-1.7,1-2.9,1c-0.4,0-0.8-0.1-1.3-0.1c-0.5-0.1-1-0.2-1.6-0.4L165.6,161z"/>
    <!-- treks --> 
    
  </g>
</g>
</svg>
      </div>
         <div>
            <h1 class="uk-h3 theme-font-medium-bold"><?php echo e($setting->text2); ?></h1>
         </div>
      </div>
   </div>
</section>

<section class="uk-section-large bg-white uk-position-relative uk-wave-white-top">
  <!--<i class="fa fa-envelope uk-newsletter uk-position-center-left uk-margin-large"></i>-->
   <div class="filter product_filter_result">
   <div class="uk-container uk-container-small"> 
      
       <?php if(session('status')): ?>
        <div class="alert alert-success alert-dismissible subscribe">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                     <?php echo e(session('status')); ?>

                            </div>
                            <?php endif; ?>
      <h3 class="uk-h3 theme-font-medium-bold text-black">Our newsletter</h3>
      <p>Sign on to the Seven Summit Treks newsletter for our latest news,updates & annnoucements.</p>
     
      <form class="uk-grid-medium uk-floating-form" uk-grid id="subscribe_newsletter">
         <div class="uk-width-1-2@s">
            <label for="name">
            <input type="text" id="name" name="name" placeholder="Name"> <span>Full Name *</span> 
            </label>
         </div>
         <div class="uk-width-1-2@s">
            <label for="Email">
            <input type="Email" id="phone" name="email" placeholder="Email"> <span>Email *</span> 
            </label>
         </div>
         <div class="uk-width-2-2@s">
            <div class="uk-text-small">
               <p class="uk-margin-small">Privacy of your data is important to us and we always keep your data received from the website secure. You can 
               <a target="_blank" rel="noopener" href="<?php echo e(route('unsubscribe')); ?>">unsubscribe</a> from our newsletter whenever you want to. You can also view our privacy policy 
               <a target="_blank" rel="noopener" href="<?php echo e(url(geturl('privacy-policy'))); ?>">here in detail</a>.</p>
            </div>
         </div>
         <div class="uk-width-1-2@s">
            <button type="submit" class="uk-button uk-button-primary"> Subscribe  </button>
         </div>
      </form>
   </div>
   </div>
</section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('themes.default.common.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sevensummittreks/public_html/resources/views/themes/default/frontpage.blade.php ENDPATH**/ ?>