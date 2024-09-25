<!DOCTYPE html>
<html>
<head>
    <title><?php echo e($setting->site_name); ?> <?php echo $__env->yieldContent('post_title'); ?> <?php echo $__env->yieldContent('title'); ?> </title>
    <meta charset="utf-8">
    <meta name="theme-color" content="#e1a74e">
    <meta name="keywords" content="<?php echo $__env->yieldContent('meta_keyword'); ?> - <?php echo e($setting->meta_key); ?>">
    <meta name="description" content="<?php echo $__env->yieldContent('meta_description'); ?> -<?php echo e($setting->meta_description); ?>">
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="<?php echo $__env->yieldContent('title'); ?>"/>
    <meta property="og:url" content="<?php echo e(url()->current()); ?>"/>
    <meta property="og:site_name" content="<?php echo e($setting->site_name); ?>"/>
    <meta property="og:description" content="<?php echo $__env->yieldContent('meta_description'); ?>"/>
    <?php if(trim($__env->yieldContent('thumbnail'))): ?>
    <meta property="og:image" content="<?php echo e(asset('uploads/medium/' )); ?>/<?php echo $__env->yieldContent('thumbnail'); ?>"/>
    <?php else: ?>
    <meta property="og:image" content="<?php echo e(asset('themes-assets/images/SST-logo-Gold-12.png')); ?>"/>
    <?php endif; ?>
    <meta property="og:image:width" content="1000"/>
    <meta property="og:image:height" content="600"/>
    <?php if(trim($__env->yieldContent('thumbnail'))): ?>
    <meta name="twitter:image" content="<?php echo e(asset('uploads/medium/' )); ?>/<?php echo $__env->yieldContent('thumbnail'); ?>"/>
    <?php else: ?>
    <meta property="twitter:image" content="<?php echo e(asset('themes-assets/images/SST-logo-Gold-12.png')); ?>"/>
    <?php endif; ?>
    <meta name="twitter:url" content="<?php echo e(url()->current()); ?>">
    <meta name="twitter:title" content="<?php echo $__env->yieldContent('title'); ?>">
    <meta name="twitter:description" content="<?php echo $__env->yieldContent('meta_description'); ?>">
    <meta name="twitter:card" content="summary_large_image"/>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('themes-assets/images/favicon.ico')); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo e(asset('themes-assets/css/app.css')); ?>" />
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
     <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=60361f3a3b3a4b00152e3902&product=sop' async='async'></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-9J1J13RCYQ"></script>
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-75XT4G30YC"></script>

    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-9J1J13RCYQ');
    </script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-75XT4G30YC');
    </script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
   
</head>
<!--<body oncontextmenu="return false">-->
<body>
<div id="preloader" class="preloader uk-flex uk-flex-middle uk-flex-center">
<div class="loader"> <img src="<?php echo e(asset('themes-assets/images/loader.svg')); ?>"> </div>
</div>
<header class="uk-position-top">
<!-- end mobile top menu -->
<div class="uk-main-header uk-navbar-container uk-navbar-transparent" uk-sticky="animation: uk-animation-slide-top uk-animation-slow uk-transform-origin-bottom-center">
<div class="uk-container">
<nav class="uk-navbar d-flex uk-flex-middle" uk-navbar>
    <div class="uk-navbar-left ">
        <a class="uk-navbar-item uk-logo" href="<?php echo e(url('/')); ?>"> 
        <img src="<?php echo e(asset('themes-assets/images/SST-logo-white-12.svg')); ?>" alt="<?php echo e($setting->site_name); ?>" class="uk-logo-white">
            <img src="<?php echo e(asset('themes-assets/images/SST-logo-black-12.svg')); ?>" alt="<?php echo e($setting->site_name); ?>" class="uk-logo-dark">
            <img src="<?php echo e(asset('themes-assets/images/SST-logo-Gold-12.svg')); ?>" alt="<?php echo e($setting->site_name); ?>" class="uk-logo-primary"> </a>
    </div>
    <div class="uk-navbar-right">
        <!-- start desktop menu -->
        <ul class="uk-navbar-nav uk-position-relative  uk-visible@m ">
            <li> <a href="<?php echo e(url('/')); ?>"> Home </a> </li>
            <?php if($navigations->count()): ?>
                <?php $__currentLoopData = $navigations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($loop->iteration == 1): ?>
        <li> <a href="#"> <?php echo e($row->post_type); ?>

        <span class="" uk-icon="icon: chevron-down; ratio: .75;"></span>
        </a>
    <div class="uk-navbar-dropdown uk-wave-black-bottom bg-black uk-margin-remove uk-padding-remove uk-border-top" 
    uk-drop="delay-hide: 10; uk-animation-slide-top-small; duration: 300; boundary: .uk-navbar-container; boundary-align: true; pos: bottom-justify;">
        <div class="uk-container">
            <div class="mega-border-top">
                <div class="uk-padding-menu">
                    <ul class="uk-child-width-1-4 uk-flex"
                        uk-grid uk-scrollspy="cls: uk-animation-slide-top-small; delay: 300; repeat: false;">
                        <!-- -->
                        <?php if(has_posts($row->id)): ?>
                            <li>
                                <div>
                                    <ul class="uk-menu-list">
                                        <?php $__currentLoopData = has_posts($row->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $_row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($_row->uri == 'our-team'): ?>
                                         <li> <a href="<?php echo e(url(geturl($_row->uri))); ?>" class="uk-active"><?php echo e(Str::ucfirst($_row->post_title)); ?></a> </li>
                                         <?php else: ?>
                                            <li> <a href="<?php echo e(url(geturl($_row->uri))); ?>"><?php echo e(Str::ucfirst($_row->post_title)); ?></a> </li>
                                            <?php endif; ?>
                                            <?php if($loop->iteration == 9) continue; ?>
                                            <?php if($loop->iteration % 4 == 0): ?>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <div>
                        <ul class="uk-menu-list">
                        <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        </li>

    <?php endif; ?>
    <!-- -->

    <li>
        <div> 
        
        <?php if($navigations->count()): ?>
            <?php $__currentLoopData = $navigations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($loop->iteration == 2): ?>
                     <a href="<?php echo e(route('page.posttype_detail', $row->uri)); ?>" class="uk-button uk-button-primary-outline uk-width-1-1 uk-margin-bottom">
                                <?php echo e($row->post_type); ?>

                 <span class="uk-icon" uk-icon="icon:arrow-right; ratio: 1.5" uk-scrollspy="cls: uk-animation-slide-right; delay: 400; repeat: false;"></span>
                            </a> 
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
            
            <a href="<?php echo e(route('all-trip')); ?>" class="uk-button uk-button-white-outline uk-width-1-1">Book a Trip<span class="uk-icon" uk-icon="icon:arrow-right; ratio: 1.5"
                    uk-scrollspy="cls: uk-animation-slide-right; delay: 400; repeat: false;"></span>
            </a>
        </div>
    </li>
    <!-- -->
    </ul>
</div>
</div>
</div>
</div>
</li>
<!-- -->
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<!--mega menu -->
<?php if($expeditions->count() > 0): ?>
 <li class="uk-active">
   <a href="#" >Expeditions 
   <span class="" uk-icon="icon: chevron-down; ratio: .75;"></span>
   </a>
   <div class="uk-navbar-dropdown bg-black uk-margin-remove uk-padding-remove uk-border-top" uk-drop="delay-hide: 10; uk-animation-slide-top-small; duration: 300; boundary: .uk-navbar-container; boundary-align: true; pos: bottom-justify;">
      <div class="uk-container">
         <div class="mega-border-top">
            <div uk-grid class="uk-grid-small" uk-scrollspy="cls: uk-animation-slide-top-small; delay: 300; repeat: false;">
               <ul class="tab-nav uk-mega-tab uk-padding-menu   uk-tab-left uk-margin-medium-right  " data-uk-tab="{connect:'.uk-switcher'}">
                  <?php $__currentLoopData = $expeditions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li> <a href=""><?php echo e($row->title); ?></a> </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </ul>
               <div class="uk-switcher uk-width-expand@m uk-padding-menu ">
                
                  <!-- region -->
                    <?php $__currentLoopData = $expeditions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(trip_byexpeditions($row->id)->count() > 0): ?>
                  <div>

    <div class="uk-position-relative uk-visible-toggle" tabindex="-1" uk-slider="sets: true; finite: true;">
            <ul class="uk-slider-items uk-child-width-1-1@m uk-grid" uk-grid  >
                 <?php if(trip_byexpeditions($row->id)->count()>0): ?>
               <li>
                  <div class="uk-grid-small uk-child-width-1-4@s uk-text-center" uk-grid>
                     <!--  -->
                       <?php $__currentLoopData = trip_byexpeditions($row->id)->slice(0,8); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $_keyEx => $_rowEx): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($_keyEx >= 8): ?>
                            <?php continue; ?>
                        <?php endif; ?>
                     <div>
                        <a class="uk-list-shine uk-corner-hover uk-cover-container uk-display-block uk-link-toggle " tabindex="0" href="<?php echo e(url('page/' . tripurl($_rowEx->uri))); ?>">
                           <div class="uk-media-200">
                              <?php if($_rowEx->thumbnail): ?>
                                <img class="uk-image"alt="<?php echo e($_rowEx->trip_title); ?>"uk-img src="<?php echo e(asset('uploads/original/' . $_rowEx->thumbnail)); ?>">
                            <?php else: ?>
                                <img class="uk-image"alt="<?php echo e($_rowEx->trip_title); ?>"uk-img src="<?php echo e(asset('themes-assets/images/blank.png')); ?>">
                            <?php endif; ?>
                              <!-- corner -->
                              <div class="uk-corner-borders uk-corner-borders--left"></div>
                              <div class="uk-corner-borders uk-corner-borders--right"></div>
                              <!-- end -->
                           </div>
                           <div class="uk-overlay-primary uk-position-cover"></div>
                           <div class="uk-position-center">
                              <div class="uk-overlay">
                                 <h4 class="uk-margin-top uk-margin-remove-bottom text-white">
                                    <?php echo e($_rowEx->trip_title); ?>

                                 </h4>
                              </div>
                           </div>
                        </a>
                     </div>                    
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     <!--  -->
                  </div>
               </li>
               <?php endif; ?>
               <?php if(trip_byexpeditions($row->id)->count()>8): ?>
               <li>
                  <div class="uk-grid-small uk-child-width-1-4@s uk-text-center" uk-grid>
                     <!--  -->
                      <?php $__currentLoopData = trip_byexpeditions($row->id)->slice(8,8); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $_keyEx => $_rowEx): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($_keyEx >= 16): ?>
                            <?php continue; ?>
                        <?php endif; ?>
                     <div>
                        <a class="uk-list-shine uk-corner-hover uk-cover-container uk-display-block uk-link-toggle " tabindex="0" href="<?php echo e(url('page/' . tripurl($_rowEx->uri))); ?>">
                           <div class="uk-media-200">
                              <?php if($_rowEx->thumbnail): ?>
                                <img class="uk-image"alt="<?php echo e($_rowEx->trip_title); ?>"uk-img src="<?php echo e(asset('uploads/original/' . $_rowEx->thumbnail)); ?>">
                            <?php else: ?>
                                <img class="uk-image"alt="<?php echo e($_rowEx->trip_title); ?>"uk-img src="<?php echo e(asset('themes-assets/images/blank.png')); ?>">
                            <?php endif; ?>
                              <!-- corner -->
                              <div class="uk-corner-borders uk-corner-borders--left"></div>
                              <div class="uk-corner-borders uk-corner-borders--right"></div>
                              <!-- end -->
                           </div>
                           <div class="uk-overlay-primary uk-position-cover"></div>
                           <div class="uk-position-center">
                              <div class="uk-overlay">
                                 <h4 class="uk-margin-top uk-margin-remove-bottom text-white">
                                    <?php echo e($_rowEx->trip_title); ?>

                                 </h4>
                              </div>
                           </div>
                        </a>
                     </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     <!--  -->
                     
                  </div>
               </li>
               <?php endif; ?>
                <?php if(trip_byexpeditions($row->id)->count()>16): ?>
                <li>
                  <div class="uk-grid-small uk-child-width-1-4@s uk-text-center" uk-grid>
                     <!--  -->
                      <?php $__currentLoopData = trip_byexpeditions($row->id)->slice(16,8); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $_keyEx => $_rowEx): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($_keyEx >= 24): ?>
                            <?php continue; ?>
                        <?php endif; ?>
                     <div>
                        <a class="uk-list-shine uk-corner-hover uk-cover-container uk-display-block uk-link-toggle " tabindex="0" href="<?php echo e(url('page/' . tripurl($_rowEx->uri))); ?>">
                           <div class="uk-media-200">
                              <?php if($_rowEx->thumbnail): ?>
                                <img class="uk-image"alt="<?php echo e($_rowEx->trip_title); ?>"uk-img src="<?php echo e(asset('uploads/original/' . $_rowEx->thumbnail)); ?>">
                            <?php else: ?>
                                <img class="uk-image"alt="<?php echo e($_rowEx->trip_title); ?>"uk-img src="<?php echo e(asset('themes-assets/images/blank.png')); ?>">
                            <?php endif; ?>
                              <!-- corner -->
                              <div class="uk-corner-borders uk-corner-borders--left"></div>
                              <div class="uk-corner-borders uk-corner-borders--right"></div>
                              <!-- end -->
                           </div>
                           <div class="uk-overlay-primary uk-position-cover"></div>
                           <div class="uk-position-center">
                              <div class="uk-overlay">
                                 <h4 class="uk-margin-top uk-margin-remove-bottom text-white">
                                    <?php echo e($_rowEx->trip_title); ?>

                                 </h4>
                              </div>
                           </div>
                        </a>
                     </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     <!--  -->
                     
                  </div>
               </li>
               <?php endif; ?>
            </ul>
                  <div class="uk-flex uk-flex-middle uk-flex-between uk-margin uk-margin-remove-bottom">
                     <a class="uk-nav-slider-btn" href="#" uk-icon="icon:arrow-left; ratio: 1.5" uk-slider-item="previous"></a>
                     <a href="<?php echo e(route('page.expeditionlist', $row->uri)); ?>" class="uk-button uk-button-primary-outline"> View All  
                     <span class="uk-icon " uk-icon="icon:arrow-down; ratio: 1.5" uk-scrollspy="cls: uk-animation-slide-down; delay: 400; repeat: false;"></span>
                     </a> 
                     <a class="uk-nav-slider-btn" href="#" uk-icon="icon:arrow-right; ratio: 1.5" uk-slider-item="next"></a>
               </div>
       

         </div>

 
              </div>
              <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              <!-- region end -->
           </div>
        </div>
     </div>
  </div>
</div>
</li>
<?php endif; ?>
<!-- end mega menu -->
<!--mega menu trekking -->
<?php if($allregions->count() > 0): ?>

<li> <a href="#">Trekking <span class="" uk-icon="icon: chevron-down; ratio: .75;"></span></a>
<div class="uk-navbar-dropdown uk-wave-black-bottom bg-black uk-margin-remove uk-padding-remove uk-border-top"
    uk-drop="delay-hide: 10; uk-animation-slide-top-small; duration: 300; boundary: .uk-navbar-container; boundary-align: true; pos: bottom-justify;">
    <div class="uk-container">
        <div class="mega-border-top">
            <div uk-grid class="uk-grid-small"
                uk-scrollspy="cls: uk-animation-slide-top-small; delay: 300; repeat: false;">
                <ul class="tab-nav uk-mega-tab uk-padding-menu   uk-tab-left uk-margin-medium-right uk-width-auto@s " data-uk-tab="{connect:'.uk-switcher'}">
                    <?php $__currentLoopData = $allregions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li> <a href=""> <?php echo e($row->title); ?> </a> </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <div class="uk-switcher uk-width-expand@m uk-padding-menu ">
                    <!-- region -->
                    <?php $__currentLoopData = $allregions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(tripbyregions($row->id)->count() > 0): ?>
                            <div>
                                <div class="uk-grid-small uk-child-width-1-3@s uk-text-center" uk-grid uk-scrollspy="cls: uk-animation-slide-top-small; delay: 300; repeat: false;">
                                      
                                    <?php $__currentLoopData = tripbyregions($row->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $_key => $_row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($_key >= 6): ?>

                                            <?php continue; ?>
                                        <?php endif; ?>
                                        <div class="uk-first-column">
                                            <a class="uk-list-shine uk-corner-hover uk-cover-container uk-display-block uk-link-toggle " tabindex="0"  href="<?php echo e(url('page/' . tripurl($_row->uri))); ?>">
                                                <div class="uk-media-200">
                                                    <?php if($_row->thumbnail): ?>
                                                    <img class="uk-image" alt="<?php echo e($_row->trip_title); ?>"  uk-img src="<?php echo e(asset('uploads/original/' . $_row->thumbnail)); ?>" />
                                                     <?php else: ?>
                                                        <img class="uk-image" alt="<?php echo e($_row->trip_title); ?>" uk-img src="<?php echo e(asset('themes-assets/images/blank.png')); ?>">
                                                    <?php endif; ?>
                                                </div>
                                                <div class="uk-corner-borders uk-corner-borders--left"></div>
                                                <div class="uk-corner-borders uk-corner-borders--right"></div>
                                                <div class="uk-overlay-primary uk-position-cover">
                                                </div>
                                                <div class="uk-position-center">
                                                    <div class="uk-overlay">
                                                        <h4 class="uk-margin-top uk-margin-remove-bottom text-white">
                                                            <?php echo e($_row->trip_title); ?>

                                                        </h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      
                                </div>
                                <?php if(tripbyregions($row->id)->count() > 6): ?>
                                    <div class="uk-margin uk-text-center"> <a href="<?php echo e(route('page.regionlist', $row->uri)); ?>" class="uk-button uk-button-primary-outline"> View All
                                        <span class="uk-icon " uk-icon="icon:arrow-right; ratio: 1.5" uk-scrollspy="cls: uk-animation-slide-right; delay: 400; repeat: false;"></span>
                                        </a>
                                    </div>
                                <?php endif; ?>

                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    <!-- region end -->
                </div>
            </div>
        </div>
    </div>
</div>
</li>
<?php endif; ?>
<!-- end mega menu trekking -->
<!-- useful info -->
    	<?php if($pagetypes->count()>0): ?>
    	<li> <a href="#"> Useful Info
       <span class="" uk-icon="icon: chevron-down; ratio: .75;"></span>
       </a>						  
		<ul class="uk-menu-list bg-black " uk-dropdown="delay-hide: 10; uk-animation-slide-top-small; duration: 300;">
		<?php $__currentLoopData = $pagetypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<?php if($row->external_link): ?>
		<li> <a href="<?php echo e($row->external_link); ?>"> <?php echo e($row->page_type); ?> </a> </li>
		<?php else: ?>
		<li> <a href="<?php echo e(url('info/'.$row->uri)); ?>" class="<?php echo e($row->uri == 'travel-advisory'?'uk-active':''); ?>"> <?php echo e($row->page_type); ?> </a> </li>
		<?php endif; ?>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
		
		</ul>
		
	</li>
	<?php endif; ?>
	<!-- useful info -->

    <?php if($navigations->count()): ?>
    <?php $__currentLoopData = $navigations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($loop->iteration == 2): ?>
    <li> <a href="<?php echo e(route('page.posttype_detail', $row->uri)); ?>"> <?php echo e($row->post_type); ?> </a> </li>
    <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <li>
    		<a href="#search-modal" uk-toggle="" class="uk-search-icon-flip uk-icon uk-search-icon" uk-search-icon=""></a>
    	</li>
    </ul>
<!-- end desktop menu -->
 <!-- mobile menu button -->
 <ul class="uk-navbar-nav">
    <li>
       <a class="uk-navbar-toggle uk-hidden@m  uk-light" uk-toggle="target: #offcanvas-reveal" >
          <span class="uk-margin-small-right">
             <div class="uk-flex uk-flex-middle">
                <div class="uk-margin-small-right">	Explore </div>
                <i class="far fa-compass fa-lg"></i> 
             </div>
          </span>
       </a>
    </li>
 </ul>
 <!-- mobile menu button -->
</div>
</nav>
</div>
</div>
</header>
<!-- header end -->
<!-- start mobile menu -->
  <div id="offcanvas-reveal" class="uk-modal-full" uk-modal>
       <div class="uk-modal-dialog uk-flex uk-flex-center   uk-light bg-black" uk-height-viewport>
          <div class="uk-width-2xlarge">
            <div class="uk-flex uk-flex-between uk-flex-middle uk-margin-large-bottom">
    <div>
        <a class="uk-navbar-item uk-logo" href="<?php echo e(url('/')); ?>"> 
        <img src="<?php echo e(asset('/themes-assets/images/SST-logo-Gold-12.svg')); ?>" alt="<?php echo e($setting->site_name); ?>" class="uk-logo-light" width="110"> </a>
    </div>
    <div>
    <button class="uk-modal-close-full uk-margin-medium-right uk-close-large text-white uk-position-relative" type="button" uk-close></button>
    </div>
</div>
  <nav class="uk-margin-large-top uk-margin-large-bottom">
    <ul class="uk-navsidebar  uk-nav-parent-icon uk-nav-left uk-margin-auto-vertical" uk-nav="multiple: false">
    <li><a href="<?php echo e(url('/')); ?>">Home</a></li>
    <!-- -->
    <?php if($company->count()): ?>
        <li class="uk-parent"> <a href="javascript:void(0)">About Us </a>
            <ul class="uknavsub">
                <?php $__currentLoopData = $footer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($row->uri == 'our-team'): ?>
                         <li> <a href="<?php echo e(url(geturl($row->uri))); ?>" class="uk-active"><?php echo e(Str::ucfirst($row->post_title)); ?></a> </li>
                         <?php else: ?>
                            <li> <a href="<?php echo e(url(geturl($row->uri))); ?>"><?php echo e(Str::ucfirst($row->post_title)); ?></a> </li>
                            <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </li>
    <?php endif; ?>
    
    <!-- -->
    <!-- -->
     <?php if($expeditions->count() > 0): ?>
     <li class="uk-parent"> <a href="#" class="uk-active">Expeditions </a>
        <ul class="uknavsub" uk-nav="multiple: false">
            <?php $__currentLoopData = $expeditions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <li><a href="<?php echo e(route('page.expeditionlist', $row->uri)); ?>"><?php echo e($row->title); ?></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                 
        </ul>
    </li>                                
    <?php endif; ?>
    
    <!-- -->
    <!-- -->
    <?php if($regions->count() > 0): ?>
        <li class="uk-parent"> <a href="#">Trekking </a>
        <ul class="uknavsub " uk-nav="multiple: false">
            <?php $__currentLoopData = $regions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <li> <a href="<?php echo e(route('page.regionlist', $row->uri)); ?>"><?php echo e($row->title); ?> </a> </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                    
        </ul>
    </li>
  <?php endif; ?>
    
    <!-- -->
    <!-- -->	

	<?php if($pagetypes->count()>0): ?>
    <li class="uk-parent"> <a href="#">Useful Info </a>
        <ul class="uknavsub " uk-nav="multiple: false">
           	<?php $__currentLoopData = $pagetypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<?php if($row->external_link): ?>
		<li> <a href="<?php echo e($row->external_link); ?>"> <?php echo e($row->page_type); ?> </a> </li>
		<?php else: ?>
		<li> <a href="<?php echo e(url('info/'.$row->uri)); ?>" class="<?php echo e($row->uri == 'travel-advisory'?'uk-active':''); ?>"> <?php echo e($row->page_type); ?> </a> </li>
		<?php endif; ?>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
        </ul>
    </li>
      <?php endif; ?>
    <!-- -->
    <!-- -->
      <?php if($navigations->count()): ?>
<?php $__currentLoopData = $navigations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if($loop->iteration == 2): ?>
    <li><a href="<?php echo e(route('page.posttype_detail', $row->uri)); ?>"> <?php echo e($row->post_type); ?> </a></li>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
    
</ul>
</nav>
<hr>
<div class="uk-child-width-auto uk-flex-left@s uk-flex-center" uk-grid>
<?php if($setting->facebook_link): ?>
    <div>
    <a class="uk-link uk-icon-button bg-primary text-black" rel="noreferrer" href="<?php echo e($setting->facebook_link); ?>" target="_blank" uk-icon="icon: facebook;"></a>
</div>
<?php endif; ?>
<?php if($setting->youtube_link): ?>
    <div>
    <a class="uk-link uk-icon-button bg-primary text-black" rel="noreferrer" href="<?php echo e($setting->youtube_link); ?>" target="_blank" uk-icon="icon: youtube;"></a>
</div>
<?php endif; ?>
<?php if($setting->twitter_link): ?>
    <div>
    <a class="uk-link uk-icon-button bg-primary text-black" rel="noreferrer" href="<?php echo e($setting->twitter_link); ?>" target="_blank" uk-icon="icon: twitter;"></a>
</div>
<?php endif; ?>

<?php if($setting->google_plus): ?>
     <div>
    <a class="uk-link uk-icon-button bg-primary text-black" rel="noreferrer" href="<?php echo e($setting->google_plus); ?>" target="_blank" uk-icon="icon: instagram;"></a>
</div>
<?php endif; ?>
               
</div>
</div>
</div>
</div>
<!-- end mobile menu -->
<!-- search popup -->
<div id="search-modal" class="uk-flex-center uk-overflow-hidden" uk-modal>
<div class="uk-modal-dialog  uk-margin-auto-vertical">
<button class="uk-modal-close-outside" type="button" uk-close></button>
<div class="uk-search-modal uk-padding-small">
<form class="uk-search uk-search-large" action="<?php echo e(route('trip-search')); ?>" method="post">
<?php echo csrf_field(); ?>
<button type="submit" class="uk-search-icon-flip text-primary" uk-search-icon></button>
<input class="uk-search-input" name="search" type="text" placeholder="Search..."> 
</form>
</div>
<div class="uk-padding-small">
<?php if($popular->count() > 0): ?>
<h1 class="uk-h4 uk-margin-remove">Popular Search</h1>
<ul class="uk-search-suggest">
<?php $__currentLoopData = $popular; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<li> <a href="<?php echo e(url('page/' . tripurl($row->uri))); ?>"> <?php echo e($row->trip_title); ?> </a> </li>                        
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>			

</ul>
<?php endif; ?>

</div>
</div>
</div>
<!--  -->
<main id="app">
<?php /**PATH /home/sevensummittreks/public_html/resources/views/themes/default/common/header.blade.php ENDPATH**/ ?>