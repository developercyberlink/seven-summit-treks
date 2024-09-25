<!DOCTYPE html>
<html>

<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <title> <?php echo e(config('app.name', '')); ?> - <?php echo $__env->yieldContent('title'); ?> </title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="Cyberlink">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <base href="<?= url('/') ?>" />
    <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600'>
    <?php echo $__env->yieldContent('additional-css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/skin/default_skin/css/theme.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/skin/default_skin/css/theme2.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/skin/default_skin/css/theme3.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/admin-tools/admin-forms/css/admin-forms.css')); ?>">
    <!-- Favicon -->
     <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/skin/default_skin/css/bootstrap3-wysihtml5.min.css')); ?>">

    <link rel="shortcut icon" href="<?php echo e(asset('themes-assets/images/favicon.ico')); ?>">
      <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    <style>
        span.panel-controls {
    display: none;
}
    </style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
  <![endif]-->
  
    <script src="<?php echo e(asset('js/tinymce/tinymce.min.js')); ?>" referrerpolicy="origin"></script>
    <script>
       var editor_config = {
         path_absolute: "/",
         selector: 'textarea.my-editor',
         relative_urls: false,
         plugins: 'code table lists advlist charmap emoticons fullscreen hr image insertdatetime link media nonbreaking pagebreak paste preview print searchreplace spellchecker tabfocus toc visualblocks visualchars wordcount fontfamily fontsize style',
         toolbar: 'undo redo | blocks | bold italic underline removeformat | fontfamily fontsize style | alignleft aligncenter alignright alignjustify | indent outdent | bullist numlist | link unlink image media code hr | table fullscreen insertdatetime',
         toolbar_mode: 'sliding',
         force_br_newlines: false,
         force_p_newlines: false,
         forced_root_block: '',
         cleanup: true,
         remove_linebreaks: true,
         convert_newlines_to_brs: false,
         inline_styles: false,
         entity_encoding: 'raw',
         paste_auto_cleanup_on_paste: true,
         entities: '160,nbsp,38,amp,60,lt,62,gt',
    
         file_picker_callback: function (callback, value, meta) {
           var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName(
             'body')[0].clientWidth;
           var y = window.innerHeight || document.documentElement.clientHeight || document
             .getElementsByTagName('body')[0].clientHeight;
    
           var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
           if (meta.filetype == 'image') {
             cmsURL = cmsURL + "&type=Images";
           } else {
             cmsURL = cmsURL + "&type=Files";
           }
       
           tinyMCE.activeEditor.windowManager.openUrl({
             url: cmsURL,
             title: 'Filemanager',
             width: x * 0.8,
             height: y * 0.8,
             resizable: "yes",
             close_previous: "no",
             onMessage: (api, message) => {
               callback(message.content);
             }
           });
         }
       };
    
       tinymce.init(editor_config);
     </script>
     <style>
       .tox-editor-container .tox-promotion{
         visibility: hidden!important;
       }
     </style>

</head>

<body class="dashboard-page sb-l-o sb-r-c">
    <!-- Start: Main -->
    <div id="main">

        <!-- Start: Header -->
        <header class="navbar navbar-fixed-top">
            <div class="navbar-branding">
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>" target="_blank">
                    <?php if($setting->logo): ?>
                    <img src="<?php echo e(asset('uploads/original/' . $setting->logo)); ?>" alt="<?php echo e(config('app.name')); ?>" width="100"/>
                    <?php else: ?>
                    <img src="<?php echo e(asset('themes-assets/images/blank_logo.png')); ?>" alt="<?php echo e(config('app.name')); ?>" />
                    <?php endif; ?>
                </a>
                <span id="toggle_sidemenu_l" class="ad ad-lines"></span>
            </div>

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="avoid:javascript;" class="dropdown-toggle fw600 p15" data-toggle="dropdown"> <img
                            src="<?php echo e(asset(env('PUBLIC_PATH') . 'assets/img/avatars/1.png')); ?>" alt="avatar"
                            class="mw30 br64 mr15">

                        <?php echo e(Auth::user()->name); ?>


                        <span class="caret caret-tp hidden-xs"></span>
                    </a>
                    <ul class="dropdown-menu list-group dropdown-persist w250" role="menu">
                        <li><a class="nav-link" href="<?php echo e(route('admin.userprofile')); ?>">User Profile</a></li>
                        <li><a class="nav-link" href="<?php echo e(route('admin.changepassword')); ?>">Change Password </a></li>
                        <?php if(auth()->guard()->guest()): ?>
                    <li><a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a></li>
                    <li><a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a></li>
                    <?php else: ?>        
                    <li class="dropdown-footer">
                        <a class="animated animated-short fadeInUp" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <span class="fa fa-power-off pr5"></span>
                                <?php echo e(__('Logout')); ?>

                            </a>

                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                <?php echo e(csrf_field()); ?>

                            </form>

                        </li>

                        <?php endif; ?>


                    </ul>
                </li>
                <li>

                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                    <?php echo e(csrf_field()); ?>

                </form>

            </li>
                
            </ul>
        </header>

        <!-- Start: Sidebar Left -->
        <aside id="sidebar_left" class="nano nano-primary affix">

            <!-- Start: Sidebar Left Content -->
            <div class="sidebar-left-content nano-content">

                <!-- Start: Sidebar Left Menu -->
                <ul class="nav sidebar-menu">
                    <li class="sidebar-label pt15"> Menu </li>
                   <li class="<?php echo e((Request::segment(2) == 'dashboard')?'active':''); ?>">
                        <a href="<?php echo e(url('admin/dashboard')); ?>">
                            <span class="glyphicon glyphicon-home"></span>
                            <span class="sidebar-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="<?php echo e((Request::segment(2) == 'banner')?'active':''); ?>">
                        <a href="<?php echo e(url('admin/banner')); ?>">
                            <span class="fa fa-picture-o text-info"></span>
                            <span class="sidebar-title"> Manage Banners </span>
                        </a>
                    </li>
                    <li class="">
                       <?php if(Request::segment(2) == 'posttype' || Request::segment(2) == 'postcategory' || Request::segment(2) == 'company' || Request::segment(2) == 'partners' || Request::segment(2) == 'blog' || Request::segment(2) == 'policyconditions' || Request::segment(2) == 'contact-us'|| Request::segment(2) == 'options'): ?>
                    <a class="accordion-toggle menu-open">
                    <?php else: ?>
                     <a class="accordion-toggle">
                             <?php endif; ?>
                            <span class="fa fa-archive text-info"></span>
                            <span class="sidebar-title"> Manage Posts </span>
                            <span class="caret"></span>
                        </a>
                        <ul class="nav sub-nav">
                            <li class="<?php echo e((Request::segment(2) == 'posttype')?'active':''); ?>">
                                <a href="<?php echo e(url('type/posttype')); ?>">
                                    <span class="fa fa-arrows"></span>
                                    Post Types
                                </a>
                            </li>
                            <?php /*?>
                            <li>
                                <a href="{{ url('admin/postcategory') }}">
                                    <span class="fa fa-arrows"></span>
                                    Post Categories
                                </a>
                            </li>
                            <?php */?>
                            <!-- Post Type List -->
                            <?php if($posttype): ?>
                            <?php $__currentLoopData = $posttype; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="<?php echo e((Request::segment(2) == $row->uri)?'active':''); ?>">
                                <?php if(has_posts($row->id)): ?>
                                <a href="<?php echo e(url('admin/'.$row->uri)); ?>">
                                    <?php else: ?>
                                    <a href="<?php echo e(url('type/posttype/'.$row->id.'/edit')); ?>">
                                        <?php endif; ?>
                                    <span class="fa fa fa-arrows-h"></span>
                                    <?php echo e($row->post_type); ?>

                                </a>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                              <li class="<?php echo e((Request::segment(2) == 'options')?'active':''); ?>">
                                <a href="<?php echo e(route('options.index')); ?>">
                                    <span class="">></span>
                                   8000'ers
                                </a>
                            </li>
                        </ul>
                    </li>
                    
                    <li class="">
                    <?php if(Request::segment(2) == 'pagetype' || Request::segment(2) == 'terms-and-conditions' || Request::segment(2) == 'gear-list' || Request::segment(2) == 'travel-insurane' || Request::segment(2) == 'embassies-and-consulates' || Request::segment(2) == 'expedition-permit-fees' || Request::segment(2) == 'visa-fee'|| Request::segment(2) == 'faq'): ?>
                    <a class="accordion-toggle menu-open">
                    <?php else: ?>
                     <a class="accordion-toggle">
                        <?php endif; ?>
                        <span class="fa fa-folder-open text-info"></span>
                        <span class="sidebar-title"> Manage Pages </span>
                        <span class="caret"></span>
                      </a>
                      <ul class="nav sub-nav">
                       <li class="<?php echo e((Request::segment(2) == 'pagetype')?'active':''); ?>">
                          <a href="<?php echo e(url('admin/pagetype')); ?>">
                            <span class="fa fa-arrows"></span>
                            Page Types                
                          </a>                
                        </li>
                        <?php /*?>
                      <li>
                        <a href="{{ url('admin/pagecategory') }}">
                          <span class="fa fa-arrows"></span>
                          Page Categories                
                        </a>                
                      </li> 
                    <?php */?>
                  <!-- Page Type List -->
                  <?php if($pagetype): ?>
                  <?php $__currentLoopData = $pagetype; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <li class="<?php echo e((Request::segment(2) == $row->uri)?'active':''); ?>">               
                    <a href="<?php echo e(url('adminpages/'.$row->uri)); ?>">
                      <span class="">></span>
                      <?php echo e($row->page_type); ?>                 
                    </a>                
                  </li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                  <?php endif; ?> 
                   <!-- Page Type List -->
                </ul>
                  </li> 
            <li class="">
                <?php if(Request::segment(2) == 'teamcategory'||Request::segment(2) == 'teams'): ?>
                    <a class="accordion-toggle menu-open">
                    <?php else: ?>
                     <a class="accordion-toggle">
                             <?php endif; ?>
                  <span class="fa fa-users text-info"></span>
                  <span class="sidebar-title">  Manage Team </span>
                  <span class="caret"></span>
                </a>
                <ul class="nav sub-nav">
                     <li class="<?php echo e((Request::segment(2) == 'teamcategory')?'active':''); ?>">
                    <a href="<?php echo e(url('admin/teamcategory')); ?>">
                      <span class="fa fa fa-arrows-h"></span>
                      Team Category                
                    </a>                
                  </li>               
                    <li class="<?php echo e((Request::segment(2) == 'teams')?'active':''); ?>">
                    <a href="<?php echo e(url('admin/teams')); ?>">
                      <span class="fa fa fa-arrows-h"></span>
                      Teams                 
                    </a>                
                  </li>              
                  </ul>
              </li>
                <li class="">
               <?php if(Request::segment(2) == 'expedition-group'||Request::segment(2) == 'expedition'||Request::segment(1) == 'admin-geographical-facts-index'): ?>
                    <a class="accordion-toggle menu-open">
                    <?php else: ?>
                     <a class="accordion-toggle">
                             <?php endif; ?>
                  <span class="fa fa-map-marker text-info"></span>
                  <span class="sidebar-title">  Manage Expedition </span>
                  <span class="caret"></span>
                </a>
                <ul class="nav sub-nav">
                  <li class="<?php echo e((Request::segment(2) == 'expedition-group')?'active':''); ?>">
                    <a href="<?php echo e(route('expedition-group.index')); ?>">
                      <span class="fa fa fa-arrows-h"></span>
                    Expedition Group              
                    </a>                
                  </li>               
                 <li class="<?php echo e((Request::segment(2) == 'expedition')?'active':''); ?>">
                    <a href="<?php echo e(route('expedition.index')); ?>">
                      <span class="fa fa fa-arrows-h"></span>
                      Expeditions                 
                    </a>                
                  </li> 
                    <li class="<?php echo e((Request::segment(1) == 'admin-geographical-facts-index')?'active':''); ?>">
                      <a href="<?php echo e(route('facts')); ?>">
                          <span class="fa fa-tags text-info"></span>
                          <span class="sidebar-title">Geographical Facts</span>
                      </a>
                  </li>
                  </ul>
                 </li>

                    <?php /* ?>
                    <li>
                        <a href="{{ url('admin/destination') }}">
                            <span class="fa fa-dot-circle-o text-info"></span>
                            <span class="sidebar-title"> Manage Destination </span>
                        </a>
                    </li> 
                    <li>
                        <a href="{{ url('admin/activitygroup') }}">
                            <span class="fa fa-dot-circle-o text-info"></span>
                            <span class="sidebar-title"> Manage Activity Group </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('admin/activity') }}">
                            <span class="fa fa-dot-circle-o text-info"></span>
                            <span class="sidebar-title"> Manage Activity </span>
                        </a>
                    </li>
                    <?php */?>
                      <li class="<?php echo e((Request::segment(2) == 'region')?'active':''); ?>">
                        <a href="<?php echo e(url('admin/region')); ?>">
                            <span class="fa fa-square text-info"></span>
                            <span class="sidebar-title"> Trekking Region </span>
                        </a>
                    </li>
                    <!-- <li class="<?php echo e((Request::segment(2) == 'tripgroup')?'active':''); ?>">-->
                    <!--    <a href="<?php echo e(url('admin/tripgroup')); ?>">-->
                    <!--        <span class="fa fa-sitemap text-info"></span>-->
                    <!--        <span class="sidebar-title"> Manage Trip Group </span>-->
                    <!--    </a>-->
                    <!--</li>-->
                      
                 
                    <!--<li class="<?php echo e((Request::segment(2) == 'itinerary-category')?'active':''); ?>">-->
                    <!--    <a href="<?php echo e(route('itinerary-category.create')); ?>">-->
                    <!--        <span class="fa fa-info text-info"></span>-->
                    <!--        <span class="sidebar-title"> Trip Itinerary</span>-->
                    <!--    </a>-->
                    <!--</li>-->

                    <!--<li class="<?php echo e((Request::segment(2) == 'itinerary-category')?'active':''); ?>">-->
                    <!--     <a href="<?php echo e(route('category.post')); ?>">-->
                    <!--         <span class="fa fa-info text-info"></span>-->
                    <!--         <span class="sidebar-title">Itinerary Category</span>-->
                    <!--     </a>-->
                    <!-- </li>-->

                   <li class="<?php echo e((Request::segment(2) == 'trip'||Request::segment(2) == 'trip-region'||Request::segment(2) == 'trip-expedition')?'tripactive':'tripactive'); ?>">
                        <a href="<?php echo e(url('admin/trip')); ?>">
                            <span class="fa fa-tasks text-info"></span>
                            <span class="sidebar-title">  Manage Trips   </span>
                        </a>
                    </li>
                    
                    <li class="">
                   <?php if(Request::segment(1) == 'admin-trip-review'||Request::segment(1) == 'admin-trip-booking'||Request::segment(1) == 'admin-contact-us'||Request::segment(2) == 'subscriber'||Request::segment(1) == 'admin-trip-inquiry'): ?>
                    <a class="accordion-toggle menu-open">
                    <?php else: ?>
                     <a class="accordion-toggle">
                             <?php endif; ?>
                  <span class="fa fa-square text-info"></span>
                  <span class="sidebar-title">Reviews & Inquiries</span>
                  <span class="caret"></span>
                </a>
                <ul class="nav sub-nav">
                <li class="<?php echo e((Request::segment(1) == 'admin-trip-review')?'active':''); ?>">
                  <a href="<?php echo e(url('admin-trip-review')); ?>">
                      <span class="fa fa-newspaper-o text-info"></span>
                      <span class="sidebar-title">Manage Trip Reviews </span>
                  </a>
                </li>
                              
                   <li class="<?php echo e((Request::segment(1) == 'admin-trip-booking')?'active':''); ?>">
                  <a href="<?php echo e(route('trip-booking')); ?>">
                      <span class="fa fa-plus-square text-info"></span>
                      <span class="sidebar-title">Book a Trip </span>
                  </a>
                 </li>
                 
                 <li class="<?php echo e((Request::segment(1) == 'admin-contact-us')?'active':''); ?>">
                     
                  <a href="<?php echo e(route('admin-contact')); ?>">
                      <span class="fa fa-dot-circle-o text-info"></span>
                      <span class="sidebar-title">Contact Us</span>
                  </a>
                </li>
                
                  <li class="<?php echo e((Request::segment(2) == 'subscriber')?'active':''); ?>">
                    <a href="<?php echo e(route('subscribers.index')); ?>">
                        <span class="fa fa-dot-circle-o text-info"></span>
                        <span class="sidebar-title">Subscribers</span>
                    </a>
                </li>
                
                <li class="<?php echo e((Request::segment(1) == 'admin-trip-inquiry')?'active':''); ?>">
                  <a href="<?php echo e(route('trip-inquiry')); ?>">
                      <span class="fa fa-ticket text-info"></span>
                      <span class="sidebar-title">Trip Inquiry</span>
                  </a>
                 </li>
                  </ul>
                 </li>

                    <li class="<?php echo e((Request::segment(1) == 'admin-travel-guide-index'||Request::segment(1) == 'admin-travel-guide'||Request::segment(1) == 'admin-travel-guide-edit')?'active':''); ?>">
                          <a href="<?php echo e(route('travel_guide_index')); ?>">
                              <span class="fa fa-book text-info"></span>
                              <span class="sidebar-title">Travel Guide </span>
                          </a>
                      </li>
                      
                
                     
                      
                      <li class="">
                        <?php if(Request::segment(2) == 'videogallery'||Request::segment(2) == 'videocategory'): ?>
                    <a class="accordion-toggle menu-open">
                    <?php else: ?>
                     <a class="accordion-toggle">
                             <?php endif; ?>
                            <span class="fa fa-wrench text-info"></span>
                            <span class="sidebar-title"> Manage Gear List </span>
                            <span class="caret"></span>
                        </a>
                        <ul class="nav sub-nav">
                            <li>
                                <a href="<?php echo e(url('admin/videocategory')); ?>">
                                    <span class="fa fa fa-arrows-h"></span>
                                    Gear Category
                                </a>
                            </li>
                             <li class="<?php echo e((Request::segment(2) == 'videogallery')?'active':''); ?>">
                                <a href="<?php echo e(url('admin/videogallery')); ?>">
                                    <span class="fa fa fa-arrows-h"></span>
                                   Gear Videos
                                </a>
                            </li>
                        </ul>
                    </li>
                    
                    
      
        
                    <!-- // -->
                    <?php
/* ?>
                    <li class="active">
                        <a href="avoid:javascript;" class="accordion-toggle">
                            <span class="fa fa-dot-circle-o text-info"></span>
                            <span class="sidebar-title"> Manage Photo Gallery </span>
                            <span class="caret"></span>
                        </a>
                        <ul class="nav sub-nav">
                            <li>
                                <a href="{{ url('admin/imagecategory') }}">
                                    <span class="fa fa fa-arrows-h"></span>
                                    Gallery Category
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('admin/imagegallery') }}">
                                    <span class="fa fa fa-arrows-h"></span>
                                    Photos
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="avoid:javascript;" class="accordion-toggle">
                            <span class="fa fa-dot-circle-o text-info"></span>
                            <span class="sidebar-title"> Manage Video Gallery </span>
                            <span class="caret"></span>
                        </a>
                        <ul class="nav sub-nav">
                            <li>
                                <a href="{{ url('admin/videocategory') }}">
                                    <span class="fa fa fa-arrows-h"></span>
                                    Video Category
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('admin/videogallery') }}">
                                    <span class="fa fa fa-arrows-h"></span>
                                    Videos
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li>
                        <a href="{{ url('newsletter/subcribers') }}">
                            <span class="fa fa-dot-circle-o text-info"></span>
                            &nbsp; Newsletter Subcribers
                        </a>
                    </li>
                    <li class="active">
                        <a href="{{ url('admin/circular') }}" class="accordion-toggle">
                            <span class="fa fa-dot-circle-o text-info"></span>
                            <span class="sidebar-title">Manage Circular </span>
                            <span class="caret"></span>
                        </a>
                        <ul class="nav sub-nav">
                            <li>
                                <a href="{{ url('admin/circulartype') }}">
                                    <span class="fa fa fa-arrows-h"></span>
                                    Circular Type
                                </a>
                            </li>
                            @if ($circulartype)
                            @foreach ($circulartype as $circular)
                            <li>
                                <a href="{{ url('admin/circulartype/' . $circular->uri) }}">
                                    <span class="fa fa fa-arrows-h"></span>
                                    {{ ucfirst($circular->circular_type) }}
                                </a>
                            </li>
                            @endforeach
                            @endif
                        </ul>
                    </li>
                    <li class="active">
                        <a href="{{ url('admin/user') }}" class="accordion-toggle">
                            <span class="glyphicon glyphicon-user"></span>
                            <span class="sidebar-title">Manage Users </span>
                            <span class="caret"></span>
                        </a>
                        <ul class="nav sub-nav">
                            <li>
                                <a href="{{ url('admin/member') }}">
                                    <span class="fa fa fa-arrows-h"></span>
                                    Users
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('admin/department') }}">
                                    <span class="fa fa fa-arrows-h"></span>
                                    Department Setup
                                </a>
                            </li>
                        </ul>
                    </li>
                    <?php */?>
                    <!--  <li>
            <a href="">
              <span class="fa fa-dot-circle-o text-info"></span>
              &nbsp; Download Info
            </a>
          </li> -->
          <li class="">
                   <?php if(Request::segment(1) == 'newsletter-create' || Request::segment(1) == 'subscriber-create'|| Request::segment(1) == 'send-newsletter'|| Request::segment(1) == 'subscriber-index'|| Request::segment(1) == 'subscriber-edit'|| Request::segment(1) == 'newsletter-index'|| Request::segment(1) == 'newsletter-edit'): ?>
                    <a class="accordion-toggle menu-open">
                    <?php else: ?>
                     <a class="accordion-toggle">
                             <?php endif; ?> 
                        <span class="glyphicon glyphicon-user text-info"></span>
                        <span class="sidebar-title"> Manage Newsletter </span>
                        <span class="caret"></span>
                    </a>
                    <ul class="nav sub-nav">
                       <li class="<?php echo e((Request::segment(1) == 'newsletter-create'|| Request::segment(1) == 'newsletter-index'|| Request::segment(1) == 'newsletter-edit')?'active':''); ?>">
                            <a href="<?php echo e(route('newsletter.create')); ?>">
                                <span class="fa fa fa-arrows-h"></span>
                                Add Newsletter
                            </a>
                        </li>
                        <li class="<?php echo e((Request::segment(1) == 'subscriber-create'|| Request::segment(1) == 'subscriber-index'|| Request::segment(1) == 'subscriber-edit')?'active':''); ?>">
                            <a href="<?php echo e(route('subscriber.create')); ?>">
                                <span class="fa fa fa-arrows-h"></span>
                               Add Subscriber
                            </a>
                        </li>
                         <li class="<?php echo e((Request::segment(1) == 'send-newsletter')?'active':''); ?>">
                            <a href="<?php echo e(route('send.newsletter')); ?>">
                                <span class="fa fa fa-arrows-h"></span>
                               Send Newsletter
                            </a>
                        </li>
                    </ul>
                </li>

                     <li class="<?php echo e((Request::segment(2) == 'settings')?'active':''); ?>">
                        <a href="<?php echo e(url('admin/settings')); ?>">
                            <span class="fa fa-cog text-info"></span>
                            <span class="sidebar-title"> Settings </span>
                        </a>
                    </li>
                       <li class="<?php echo e((Request::segment(2) == 'payment-index')?'active':''); ?>">
                        <a href="<?php echo e(url('admin/payment-index')); ?>">
                            <span class="fa fa-cog text-info"></span>
                            <span class="sidebar-title">HBL Payment</span>
                        </a>
                    </li>
                   <li class="<?php echo e((Request::segment(2) == 'settings')?'active':''); ?>">
                        <a href="<?php echo e(url('/laravel-filemanager?type=Images')); ?>">
                            <span class="fa fa-cog text-info"></span>
                            <span class="sidebar-title"> Image Manager </span>
                        </a>
                    </li>
                        <li class="<?php echo e((Request::segment(2) == 'settings')?'active':''); ?>">
                        <a href="<?php echo e(url('/laravel-filemanager?type=pdf')); ?>">
                            <span class="fa fa-cog text-info"></span>
                            <span class="sidebar-title"> PDF Manager </span>
                        </a>
                    </li>
                    <!--<div class="sidebar-toggle-mini">-->
                    <!--    <a href="avoid:javascript;">-->
                    <!--        <span class="fa fa-sign-out"></span>-->
                    <!--    </a>-->
                    <!--</div>-->
            </div>
        </aside>

        <section id="content_wrapper">

            <!-- End: Topbar-Dropdown -->
            <!-- Start: Topbar -->
            

            <!-- End: Topbar -->
            <header id="topbar">
                <div class="topbar-left">
                    <ol class="breadcrumb">
                        <!-- <li class="crumb-active">
              <a href="<?php echo e(url('dashboard')); ?>">Dashboard</a>
            </li> -->
                        <li class="crumb-icon">
                            <a href="<?php echo e(url('dashboard')); ?>">
                                <span class="glyphicon glyphicon-home"></span>
                            </a>
                        </li>
                        <!-- <li class="crumb-link">
              <a href="<?php echo e(url('dashboard')); ?>">Home</a>
            </li>
            <li class="crumb-trail">Dashboard </li> -->
                    </ol>
                </div>

                <div class="topbar-right">
                    <?php echo $__env->yieldContent('breadcrumb'); ?>
                </div>
            </header>

            <!-- Begin: Content -->
            <section id="content" class="animated fadeIn">
                <!-- Admin-panels -->
                <div class="admin-panels fade-onload">
                    <div class="row">
                        <div class="container">
                        <?php echo $__env->make('admin.common.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->yieldContent('content'); ?>
                        </div>
                    </div>
                </div>

                <!-- Begin: Page Footer -->
                <?php
/* ?> <footer id="content-footer">
                    <div class="row">
                        <div class="col-md-6">
                            <span class="footer-legal">&copy; <?php echo date('Y'); ?> Cyberlink Pvt. Ltd. </span>
                        </div>
                        <div class="col-md-6 text-right">
                            <span class="footer-meta"></span>
                            <a href="#content" class="footer-return-top">
                                <span class="fa fa-arrow-up"></span>
                            </a>
                        </div>
                    </div>
                </footer> <?php */
?>
                <!-- End: Page Footer -->
            </section>



        </section>
        <!-- End: Content-Wrapper -->

        <!-- Start: Right Sidebar -->
    </div>
    <!-- End: Main -->

    <!-- BEGIN: PAGE SCRIPTS -->

    <!-- jQuery -->
    <script src="<?php echo e(asset('vendor/jquery/jquery-1.11.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/jquery/jquery_ui/jquery-ui.min.js')); ?>"></script>

    <!-- HighCharts Plugin -->
    <script src="<?php echo e(asset('vendor/plugins/highcharts/highcharts.js')); ?>"></script>

    <!-- Sparklines Plugin -->
    <script src="<?php echo e(asset('vendor/plugins/sparkline/jquery.sparkline.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/bootstrap3-wysihtml5.all.min.js')); ?>"></script>
<script>
  $('.textarea').wysihtml5({
        toolbar: {
        "fa": true,
        "font-styles": false,
        "emphasis": true,
        "lists": true,
        "html": false,
        "link": true,
        "image": false,
        "color": false,
        "blockquote": true
    }
  });
</script>
    <!-- Simple Circles Plugin -->
    <script src="<?php echo e(asset('vendor/plugins/circles/circles.js')); ?>"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.5/angular.min.js"></script>

    <!-- JvectorMap Plugin + US Map (more maps in plugin/assets folder) -->
    <script src="<?php echo e(asset('vendor/plugins/jvectormap/jquery.jvectormap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/plugins/jvectormap/assets/jquery-jvectormap-us-lcc-en.js')); ?>">
    </script>

    <?php echo $__env->yieldContent('libraries'); ?>

    <!-- Theme Javascript -->
    <script src="<?php echo e(asset('assets/js/utility/utility.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/demo/demo.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/main.js')); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- Widget Javascript -->
    <script src="<?php echo e(asset('assets/js/demo/widgets.js')); ?>"></script>

    <?php echo $__env->yieldContent('scripts'); ?>
    <!--<script src="https://cdn.tiny.cloud/1/za0jmba7ox4tewobcbd11wgwllirmau1pe9a4edp9b15iq49/tinymce/5/tinymce.min.js"-->
    <!--    referrerpolicy="origin"></script>-->
    <!--<script src="<?php echo e(asset('tinymce/init-tinymce.js')); ?>"></script>-->

    <script src="https://www.google.com/recaptcha/api.js?render=<?php echo e(env('SITE_KEY')); ?>"></script>
    <script>
    grecaptcha.ready(function() {
        grecaptcha.execute('<?php echo env('SITE_KEY'); ?>', {
            action: 'homepage'
        }).then(function(token) {
            document.getElementById('g_recaptcha_response').value = token;
        });
    });
    </script>
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
   
    <script type="text/javascript">
    jQuery(document).ready(function() {

        "use strict";

        // Init Theme Core
        Core.init();

        // Init Demo JS
        //Demo.init();

        // Init Widget Demo JS
        // demoHighCharts.init();

        // Because we are using Admin Panels we use the OnFinish
        // callback to activate the demoWidgets. It's smoother if
        // we let the panels be moved and organized before
        // filling them with content from various plugins

        // Init plugins used on this page
        // HighCharts, JvectorMap, Admin Panels

        // Init Admin Panels on widgets inside the ".admin-panels" container
        $('.admin-panels').adminpanel({
            grid: '.admin-grid',
            draggable: true,
            preserveGrid: true,
            mobile: false,
            onStart: function() {
                // Do something before AdminPanels runs
            },
            onFinish: function() {
                $('.admin-panels').addClass('animated fadeIn').removeClass('fade-onload');

                // Init the rest of the plugins now that the panels
                // have had a chance to be moved and organized.
                // It's less taxing to organize empty panels
                demoHighCharts.init();
                runVectorMaps(); // function below
            },
            onSave: function() {
                $(window).trigger('resize');
            }
        });

        

    });

    // Date picker for tender form
    $(function() {
        $("#datepicker1").datepicker({
            dateFormat: 'dd-mm-yy'
        });
        $("#datepicker2").datepicker({
            dateFormat: 'dd-mm-yy'
        });
    });
    </script>

    <!-- END: PAGE SCRIPTS -->
</body>

</html>
<?php /**PATH /home/sevensummittreks/public_html/resources/views/admin/master.blade.php ENDPATH**/ ?>