@extends('themes.default.common.trip-master')
@section('title', $data->trip_title)
@section('trip_excerpt', $data->trip_excerpt)
@section('thumbnail', $data->thumbnail)
@section('seo_title', $data->seo_title)
@section('meta_keyword', $data->meta_key)
@section('meta_description', $data->meta_description)
@section('content')

     <section class="uk-cover-container uk-position-relative uk-flex uk-flex-middle uk-background-norepeat uk-background-cover uk-background-top-center" uk-parallax="bgy: -100; easing: -2; "  data-src="{{ asset('uploads/banners/' . $data->banner) }}" uk-img>
        @if ($data->trip_video && $data->video_status==1)
        <div class="uk-position-relative" id="ytbg" data-ytbg-fade-in="true" data-ytbg-mute-button="true" data-youtube="{{ $data->trip_video }}"></div>
        @endif
      <div class="uk-overlay-primary  uk-position-cover "></div>
        <<div class="uk-hero-banner-content-inner uk-width-1-1 uk-position-z-index uk-margin-large-top">
          <div class="uk-container  uk-position-relative  uk-flex-bottom uk-flex" uk-height-viewport="expand: true; min-height: 600;">
             <div class="uk-margin-large-bottom">
                    <h1 class="uk-text-bolder text-white uk-margin-remove" uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 1200; repeat: false;"> 
                        {{ $data->trip_title }}
                    </h1>
                    <div class="uk-width-1-2@m uk-margin-top">
                        <p class="text-white uk-text-lead uk-margin-remove" uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 1600; repeat: false;">
                            {{ $data->sub_title }}
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
                      @if($data->trip_type==2)
                        <a href="#grading" uk-toggle uk-tooltip="{{ grade_message_exp($data->exp_grade) }}" aria-expanded="false"
                            style="width: 150px; height: auto;">
                            <div class="uk-margin-small">
                                @if ($data->exp_grade)
                                    <img src="{{ asset('themes-assets/images/icon/grade/' . $data->exp_grade . '.svg') }}"
                                        alt="{{ $data->trip_tag }} " width="150">
                                @else
                                    <img src="{{ asset('themes-assets/images/icon/grade/1.svg') }}"
                                        alt="{{ $data->trip_tag }} " width="150">
                                @endif

                            </div>
                            <div class="uk-text-center text-white">
                                @if ($data->trip_tag)
                                    <span class="uk-margin-remove uk-h5 text-white">
                                        {{ $data->trip_tag }} <i uk-icon="icon: question; ratio: 1"
                                            class="uk-icon text-white">
                                        </i>
                                    </span>
                                @endif
                        </a>
                        @else
                        <a href="#grading_trek" uk-toggle uk-tooltip="{{ grade_message_trek($data->trip_grade) }}" aria-expanded="false"
                            style="width: 150px; height: auto;">
                            <div class="uk-margin-small">
                                @if ($data->trip_grade)
                                    <img src="{{ asset('themes-assets/images/icon/grade/' . $data->trip_grade . '.svg') }}"
                                        alt="{{ $data->trip_tag }} " width="150">
                                @else
                                    <img src="{{ asset('themes-assets/images/icon/grade/1.svg') }}"
                                        alt="{{ $data->trip_tag }} " width="150">
                                @endif

                            </div>
                            <div class="uk-text-center text-white">
                                @if ($data->trip_tag)
                                    <span class="uk-margin-remove uk-h5 text-white">
                                        {{ $data->trip_tag }} <i uk-icon="icon: question; ratio: 1"
                                            class="uk-icon text-white">
                                        </i>
                                    </span>
                                @endif
                        </a>
                        @endif
                    </div>
                    @if ($data->duration)
                        <div class="uk-margin-small uk-text-center text-white">
                            <span class="uk-margin-remove uk-h4">
                                {{ $data->duration }}
                            </span>
                        </div>
                    @endif

                    @if ($data->rating)
                        <div class="uk-trip-review uk-text-small uk-margin-small-top uk-scrollspy-inview uk-animation-slide-left-small">
                            <span class="star-rating">
                        {!! str_repeat('<i class="fa fa-star checked" aria-hidden="true"></i>', $data->rating) !!}
                        {!! str_repeat('<i class="fa fa-star" aria-hidden="true"></i>', 5 - $data->rating) !!}
                            </span>
                            {{ $data->rating }} {{ rating($data->rating)['title'] }}
                        </div>
                    @endif
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

                    @if ($data->max_altitude)
                        <li>
                            <div uk-grid="" class="uk-flex uk-flex-between uk-grid-small uk-flex-middle uk-grid">
                                <div> <span class="uk-trip-icons uk-margin-small-right"><i
                                            class="fa fa-area-chart"></i></span>
                                    Max. Elevation: </div>
                                <div> {{ $data->max_altitude }} </div>
                            </div>
                        </li>
                    @endif
                    @if ($data->walking_per_day)
                        <li>
                            <div uk-grid="" class="uk-flex uk-flex-between uk-grid-small uk-flex-middle uk-grid">
                                <div> <span class="uk-trip-icons uk-margin-small-right"><i class="fas fa-walking"></i></span>
                                    Walking Per Day: </div>
                                <div>{{ $data->walking_per_day }}</div>
                            </div>
                        </li>
                    @endif
                    @if ($data->accommodation)
                        <li>
                            <div uk-grid="" class="uk-flex uk-flex-between uk-grid-small uk-flex-middle uk-grid">
                                <div> <span class="uk-trip-icons uk-margin-small-right"><i class="fa fa-bed"></i></span>
                                    Accommodation:</div>
                                <div> {{ $data->accommodation }} </div>
                            </div>
                        </li>
                    @endif
                    @if ($data->best_season)
                        <li>
                            <div uk-grid="" class="uk-flex uk-flex-between uk-grid-small uk-flex-middle uk-grid">
                                <div> <span class="uk-trip-icons uk-margin-small-right"><i
                                            class="fa fa-thumbs-o-up"></i></span>
                                    Best Season: </div>
                                <div> {{ season($data->best_season) }} </div>
                            </div>
                        </li>
                    @endif
                    @if ($data->group_size)
                        <li>
                            <div uk-grid="" class="uk-flex uk-flex-between uk-grid-small uk-flex-middle uk-grid">
                                <div> <span class="uk-trip-icons uk-margin-small-right"><i class="fa fa-users"></i></span>
                                    Group
                                    Size: </div>
                                <div> {{ $data->group_size }} </div>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>
            <div class="uk-width-1-3@m ">
                <div class="">
                    @if ($setting->phone)
                        <div class="uk-flex uk-flex-middle uk-text-small">
                            <span uk-icon="icon: receiver; ratio: 1" class="uk-margin-small-right uk-icon">
                            </span>
                            <div>
                                <!--<span>Contact at:</span>-->
                                <h4 class="uk-margin-remove   text-white">{{ $setting->phone }}</h4>
                            </div>
                        </div>
                        <hr>
                    @endif

                    @if ($setting->email_primary)
                        <div class="uk-flex uk-flex-middle uk-text-small">
                            <span uk-icon="icon: mail; ratio: 1" class="uk-margin-small-right uk-icon">
                            </span>
                            <div>
                                <!--<span>Email us at:</span>-->
                                <h4 class="uk-margin-remove text-white">
                                    {{ $setting->email_primary }}
                                </h4>
                            </div>
                        </div>
                        <hr class="uk-margin">
                    @endif

                    <div>
                         <a href="#inquire-now" uk-toggle class="uk-button uk-button-white uk-width-1-1 uk-margin-bottom">
                         <!--<a href="{{route('page.posttype_detail','contact-us')}}" class="uk-button uk-button-white uk-width-1-1 uk-margin-bottom">-->
                            Inquiry
                            <span class="uk-icon " uk-icon="icon:arrow-right; ratio: 1.5"
                                uk-scrollspy="cls: uk-animation-slide-right; delay: 400; repeat: false;"></span>
                        </a>
                    </div>
                    <div> <a href="{{route('random-trip',$data->uri)}}" class="uk-button uk-button-primary uk-width-1-1  "> Book Now
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
                      @if ($photo_videos->count() > 0)
                     <li>
                        <a href="#photo-videos">  <i class="uk-margin-small-right fa fa-image"></i> Photo/Videos </a>
                     </li>
                     @endif
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
                     @if ($data->country)
                     <div>
                        <div class="uk-grid uk-grid-small uk-child-width-expand uk-flex-nowrap uk-flex-middle" uk-grid="">
                           <div class="uk-width-auto"><img src="{{ asset('themes-assets/images/icon/trip/country.png') }}" alt=""> 
                           </div>
                           <div>
                              <div>
                                 <p class="uk-margin-remove"><strong>Country</strong></p>
                                 <p class="uk-margin-remove">{{ country($data->country) }}</p>
                              </div>
                           </div>
                        </div>
                     </div>
                      @endif
                        @if ($data->peak_name)
                     <div>
                        <div class="uk-grid uk-grid-small uk-child-width-expand uk-flex-nowrap uk-flex-middle" uk-grid="">
                           <div class="uk-width-auto"> <img src="{{ asset('themes-assets/images/icon/trip/peak.png') }}" alt=""> </div>
                           <div>
                              <div>
                                 <p class="uk-margin-remove"><strong>Peak Name</strong></p>
                                 <p class="uk-margin-remove">{{ $data->peak_name }}</p>
                              </div>
                           </div>
                        </div>
                     </div>
                      @endif
                        @if ($data->duration)
                     <div>
                        <div class="uk-grid uk-grid-small uk-child-width-expand uk-flex-nowrap uk-flex-middle" uk-grid="">
                           <div class="uk-width-auto"> 
                              <img src="{{ asset('themes-assets/images/icon/trip/duration.png') }}" alt="">  
                           </div>
                           <div>
                              <div>
                                 <p class="uk-margin-remove"><strong>Duration</strong></p>
                                 <p class="uk-margin-remove">{{ $data->duration }} </p>
                              </div>
                           </div>
                        </div>
                     </div>
                      @endif
                        @if ($data->route)
                     <div>
                        <div class="uk-grid uk-grid-small uk-child-width-expand uk-flex-nowrap uk-flex-middle" uk-grid="">
                           <div class="uk-width-auto"> <img src="{{ asset('themes-assets/images/icon/trip/route.png') }}" alt=""> </div>
                           <div>
                              <div>
                                 <p class="uk-margin-remove"><strong>Route</strong></p>
                                 <p class="uk-margin-remove">{{ $data->route }}</p>
                              </div>
                           </div>
                        </div>
                     </div>
                      @endif
                        @if ($data->rank)
                     <div>
                        <div class="uk-grid uk-grid-small uk-child-width-expand uk-flex-nowrap uk-flex-middle" uk-grid="">
                           <div class="uk-width-auto"> <img src="{{ asset('themes-assets/images/icon/trip/rank.png') }}" alt=""> </div>
                           <div>
                              <div>
                                 <p class="uk-margin-remove"><strong>Rank</strong></p>
                                 <p class="uk-margin-remove">{{ $data->rank }}</p>
                              </div>
                           </div>
                        </div>
                     </div>
                      @endif
                        @if ($data->coordinate)
                     <div class="uk-grid-margin">
                        <div class="uk-grid uk-grid-small uk-child-width-expand uk-flex-nowrap uk-flex-middle" uk-grid="">
                           <div class="uk-width-auto"> <img src="{{ asset('themes-assets/images/icon/trip/Co-ordinates.png') }}" alt=""> </div>
                           <div>
                              <div>
                                 <p class="uk-margin-remove"><strong>Co-ordinates</strong></p>
                                 <p class="uk-margin-remove"><a href="https://www.google.com/maps/place/{{ $data->coordinate }}" target="_blank">{{ $data->coordinate }}</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                      @endif
                        @if (weather_report($data->id))
                     <div class="uk-grid-margin">
                        <div class="uk-grid uk-grid-small uk-child-width-expand uk-flex-nowrap uk-flex-middle" uk-grid="">
                           <div class="uk-width-auto"> <img src="{{ asset('themes-assets/images/icon/trip/weather.png') }}" alt=""> </div>
                           <div>
                              <div>
                                 <p class="uk-margin-remove"><strong> Weather Reports</strong></p>
                                 <p class="uk-margin-remove"><a href="{{ url('/weather-report/' . weather_report($data->id)) }}">Report</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                      @endif
                        @if ($data->trip_range)
                     <div class="uk-grid-margin">
                        <div class="uk-grid uk-grid-small uk-child-width-expand uk-flex-nowrap uk-flex-middle" uk-grid="">
                           <div class="uk-width-auto"> <img src="{{ asset('themes-assets/images/icon/trip/range.png') }}" alt=""> </div>
                           <div>
                              <div>
                                 <p class="uk-margin-remove"><strong> Range</strong></p>
                                 <p class="uk-margin-remove">{{ $data->trip_range }}</p>
                              </div>
                           </div>
                        </div>
                     </div>
                     @endif
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
                       {!! $data->trip_content !!} 
                    </div>
                </div>
                <!-- // -->
                        
            @if ($routecamps->count() > 0 || $faqs->count() > 0)
                <div class="uk-route">
                <div class="uk-route-border">
                    <div class="uk-grid uk-flex  uk-flex-middle uk-flex-between  " uk-grid>
                        @if ($routecamps->count() > 0)
                            <div>
                                <a class="uk-button uk-button-primary toggle-content" href="#toggle-content"
                                    uk-toggle="target: .toggle-content; animation: uk-animation-fade">{{$data->trip_grade_msg}} <span
                                        class="uk-icon uk-scrollspy-inview uk-animation-slide-right"
                                        uk-icon="icon:arrow-down; ratio: 1.5"
                                        uk-scrollspy="cls: uk-animation-slide-right;   delay: 400; repeat: false;"></span></a>

                                <a class="uk-button uk-button-primary toggle-content" href="#toggle-content"
                                    uk-toggle="target: .toggle-content; animation: uk-animation-fade"
                                    hidden>{{$data->trip_grade_msg}} <span
                                        class="uk-icon uk-scrollspy-inview uk-animation-slide-right"
                                        uk-icon="icon:arrow-up; ratio: 1.5"
                                        uk-scrollspy="cls: uk-animation-slide-right;   delay: 400; repeat: false;"></span></a>
                            </div>
                        @endif
                        @if ($faqs->count() > 0)
                            <div>
                                <a href="{{ route('faq', $data->uri) }}" class="uk-button uk-button-secondary">Read  Faq
                                    <span class="uk-icon uk-scrollspy-inview uk-animation-slide-right"
                                        uk-icon="icon:arrow-right; ratio: 1.5"
                                        uk-scrollspy="cls: uk-animation-slide-right;   delay: 400; repeat: false;"></span>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>

                @if ($routecamps->count() > 0)
                    <div class="uk-route-content uk-margin-top toggle-content" hidden id="toggle-content">
                        @foreach ($routecamps as $row)
                            <h4><b>{{ $row->title }}</b></h4>
                            <p>{{ $row->content }}</p>
                        @endforeach
                    </div>
                @endif
            </div>
            @endif            
            <!-- // -->
        </div>                    
        <!-- end Overview -->
           @if ($itinerary)
          <!-- title -->
        <div class="uk-main-title uk-margin-medium-bottom uk-display-block uk-text-left">
            <h1 class="uk-h4 uk-heading-line  uk-text-left  uk-position-relative text-black  uk-text-uppercase uk-margin-remove">
                <span class="theme-font-extra-bold"> 
                    <i class="fa fa-calendar-o text-primary uk-margin-small-right"></i>
                    Itinerary </span>
                @if ($itinerary_cat->count() > 0)
                    <select class="news_sort uk-align-right uk-select-itinerary" name="itinerary_cat">
                        <!-- id="itinerary_cat"> -->
                          <option value="0" disabled> Select Itinerary </option>
                        @foreach ($itinerary_cat as $row)
                     <option {{ $row->id == $itinerary->first()->category? 'selected':''}}  value="{{ $row->id }}"> {{ $row->category }} </option>
                        @endforeach
                    </select>
                @endif
            </h1>
        </div>
        @endif
            <!-- title end -->
   
    <!-- start Itinerary -->
    <span class="filter_result">
    @if ($itinerary)
        <div id="itinerary" class="uk-single-section">
            <div class="uk-width-1-1">
           <ul uk-accordion class="uk-accordion uk-accordion-outline uk-itinerary">
                <!--  -->
                
                 @foreach ($itinerary as $row)
                     <!--<li class="{{ $loop->iteration == 1 ? 'uk-open' : '' }}">-->
                     <li>
                       <div class="uk-accordion-title  uk-itinerary-title" >
                        <div class="uk-grid-small uk-flex-middle " uk-grid  >
                           <div class="uk-width-auto uk-text-center">
                              <div class="uk-day uk-margin-small-right"> Day {{ $row->days }} </div>
                           </div>
                           <div class="uk-width-expand">
                              <div class="uk-width-1-1">
                                 <h5 class="uk-margin-remove theme-font-medium">  {{ $row->title }} </h5>
                              </div>
                              <div class="uk-flex uk-flex-middle" uk-grid>
                                @if($row->meals)
                                <div>
                             <div class="uk-itinerary-small-title uk-margin-medium-right"><i class="fa fa-cutlery text-primary uk-margin-small-right" aria-hidden="true"></i>  <span>{{ $row->meals }}</span></div>
                             </div>
                             @endif
                             @if($row->accomodation)
                             <div>
                             <div class="uk-itinerary-small-title"><i class="fa fa-bed text-primary uk-margin-small-right" aria-hidden="true"></i>  <span>{{ $row->accomodation }}</span></div>
                             </div>
                             @endif
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="uk-accordion-content uk-itinerary-content">
                        <p>{{ $row->content }}</p>                    
                        </div>
                  </li>
                    
                @endforeach 
                
                <!--  -->
            </ul>
            </div>
        </div>
    @endif
   
    <!-- end Itinerary -->

    <!-- start Map -->
    @if ($data->trip_map)
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
                    <a href="{{ asset('uploads/original/' . $data->trip_map) }}" data-caption="{{ $data->trip_title }}"> 
                    <img src="{{ asset('uploads/original/' . $data->trip_map) }}" alt="{{ $data->trip_title }}" />
                    </a>
                </div>
            </div>
        </div>
    @endif
    <!-- end Map -->
    <!-- start  Cost Includes -->

    @if ($cost_includes)
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
                @foreach ($cost_includes as $row)
                    <li><strong>{{ strtoupper($row->title) }}</strong> : {{ $row->content }}</li>
                @endforeach

            </ul>
        </div>
    @endif

    <!-- end  Cost Includes -->

    <!-- start  Cost excludes -->
    @if ($cost_excludes)
        <div id="cost-excludes" class="uk-single-section">
            <!-- title -->
            <div class="uk-main-title   uk-margin-medium-bottom uk-display-block uk-text-left">
                <h1 class="uk-h4 uk-heading-line  uk-text-left  uk-position-relative text-black  uk-text-uppercase uk-margin-remove">
                    <span class="theme-font-extra-bold"> <i class="fa fa-times-circle text-primary uk-margin-small-right"></i> Cost Excludes</span>
                </h1>
            </div>
            <!-- title end -->
            <ul class=" uk-excludes">
                @foreach ($cost_excludes as $row)
                    <li><strong> {{ strtoupper($row->title) }} </strong>: {{ $row->content }}</li>
                @endforeach
            </ul>
        </div>
    @endif
   </span>
    <!-- end  Cost excludes -->
    <!-- start Cost Dates -->
    @if ($fixed_dates->count() > 0)
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
                  @foreach ($data->schedules as $value)
                  <tr>
                     <?php
                        $cDate = \Carbon\Carbon::parse($value->start_date)->diffInDays(\Carbon\Carbon::parse($value->end_date)) + 1;
                        ?>
                     <td>
                        <strong>{{$cDate}} Days</strong>
                        <br>Start <span class="uk-hidden@m">Date</span>- {{ $value->start_date }}  <br>  End <span class="uk-hidden@m">Date</span>-{{ $value->end_date }}
                     </td>
                     <td class="uk-text-center@m">
                         @if ($value->availability == 'AVAILABLE')
                        <span class="uk-text-success">Booking Open</span>
                         @else
                       <span class="uk-text-danger">Booking Closed</span>
                        @endif
                     </td>
                     <td class="uk-text-center@m">
                     <span class="uk-hidden@m"> Group Size  </span> {{$value->group_size}}
                     </td>
                     <td class="uk-text-center@m">
                    @if ($value->availability == 'AVAILABLE')
                     <a class="uk-button-xsmall uk-button-primary-outline uk-margin-small-bottom" href="#inquire-now-fixed" uk-toggle="">Inquire Now</a>
                        <a class="uk-button-xsmall uk-button-secondary" href="{{ route('book-trip', [$data->uri, $value->start_date, $value->end_date]) }}">Book Now</a>
                    @else
                      NA
                      @endif
                     </td>
                  </tr>
                   @endforeach
               </tbody>
            </table>
               </div>
            </div>
    @endif
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
            @if ($trip_docs->count() > 0)
                @foreach ($trip_docs as $row)
                    <div>
                        @if($row->external_link)
                        <a class="uk-list-shine uk-cover-container uk-display-block uk-link-toggle " tabindex="0" target="_blank" href="{{ $row->external_link }}">
                        @else
                        <a class="uk-list-shine uk-cover-container uk-display-block uk-link-toggle " tabindex="0" target="_blank" href="{{ asset('uploads/doc/' . $row->document) }}">
                         @endif
                            @if($row->thumbnail)
                            <div class="uk-media-150"><img class="uk-image" alt="{{ $row->title }}" uk-img src="{{ asset('uploads/original/' . $row->thumbnail) }}">
                            </div>
                            @else
                            <div class="uk-media-150"><img class="uk-image" alt="{{ $row->title }}" uk-img src="{{ asset('themes-assets/images/blank.png') }}">
                            </div>
                            @endif
                            <div class="uk-overlay-primary uk-position-cover"></div>
                            <div class="uk-position-center">
                                <div class="uk-overlay">
                                    <h4 class="uk-margin-remove text-white uk-text-bold"> {{ $row->title }}</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @endif
            <!-- Gear Info Videos -->
            <div>
                <a class="uk-list-shine uk-cover-container uk-transition-toggle uk-display-block uk-link-toggle "
                    tabindex="0" href="{{ route('trip.tripvideos', $data->uri) }}">
                    @if($data->trip_type == 1)
                    <div class="uk-media-250"><img class="uk-image" alt="" uk-img
                            src="{{ asset(env('PUBLIC_PATH') . 'uploads/original/' . $video_cat1->thumbnail) }}">
                    </div>
                    <div class="uk-overlay-primary uk-position-cover"></div>
                    <div class="uk-position-center">
                        <div class="uk-overlay">
                            <h4 class="uk-margin-remove text-white uk-text-bold">
                                {{$video_cat1->caption}}
                            </h4>
                        </div>
                    </div>
                    @else
                    <div class="uk-media-250"><img class="uk-image" alt="" uk-img
                            src="{{ asset(env('PUBLIC_PATH') . 'uploads/original/' . $video_cat2->thumbnail) }}">
                    </div>
                    <div class="uk-overlay-primary uk-position-cover"></div>
                    <div class="uk-position-center">
                        <div class="uk-overlay">
                            <h4 class="uk-margin-remove text-white uk-text-bold">
                                {{$video_cat2->caption}}
                            </h4>
                        </div>
                    </div>
                    @endif
                </a>
            </div>
            <!--Gear Info Videos End  -->
            <!--Travel Info  -->
         
              @if($data->trip_type == 1)
            <div>
                
                  @if(get_trip_guide($data->id) != NULL )
                    <a class="uk-list-shine uk-cover-container uk-transition-toggle uk-display-block uk-link-toggle "
                    tabindex="0" href="{{ get_trip_guide($data->id)->link }}" target="_blank">
                 @else 
                    <a class="uk-list-shine uk-cover-container uk-transition-toggle uk-display-block uk-link-toggle "
                        tabindex="0" href="{{ route('trip-guide', $data->uri) }}" target="_blank">
                @endif
                        <div class="uk-media-250"><img class="uk-image" alt="" uk-img
                                src="{{ asset(env('PUBLIC_PATH') . 'uploads/original/' . $travelguide1->thumbnail) }}">
                        </div>
                        <div class="uk-overlay-primary uk-position-cover"></div>
                        <div class="uk-position-center">
                            <div class="uk-overlay">
                                <h4 class="uk-margin-remove text-white uk-text-bold">
                                     {{$travelguide1->caption}}
                                </h4>
                            </div>
                        </div>
                    </a>
            </div>
            @else
              <div>
               @if(get_trip_guide($data->id) != NULL)
                  <a class="uk-list-shine uk-cover-container uk-transition-toggle uk-display-block uk-link-toggle "
                    tabindex="0" href="{{ get_trip_guide($data->id)->link }}" target="_blank">
                  @else 
                <a class="uk-list-shine uk-cover-container uk-transition-toggle uk-display-block uk-link-toggle "
                    tabindex="0" href="{{ route('trip-guide', $data->uri) }}" target="_blank">
                    @endif 
                    <div class="uk-media-250"><img class="uk-image" alt="" uk-img
                            src="{{ asset(env('PUBLIC_PATH') . 'uploads/original/' . $travelguide2->thumbnail) }}">
                    </div>
                    <div class="uk-overlay-primary uk-position-cover"></div>
                    <div class="uk-position-center">
                        <div class="uk-overlay">
                            <h4 class="uk-margin-remove text-white uk-text-bold">
                                {{$travelguide2->caption}}
                            </h4>
                        </div>
                    </div>
                </a>
            </div>
            @endif
            <!-- travel Info end -->
            <!--  -->
            @if($data->trip_type == 1)
            <div>
             @if(get_trip_insurance($data->id) != NULL)
                 <a class="uk-list-shine uk-cover-container uk-transition-toggle uk-display-block uk-link-toggle "
                    tabindex="0" href="{{ get_trip_insurance($data->id)->link }}" target="_blank">
                 @else 
                <a class="uk-list-shine uk-cover-container uk-transition-toggle uk-display-block uk-link-toggle "
                    tabindex="0" href="{{route('trip-insurance',$data->uri)}}" target="_blank">
                    @endif 
                    <div class="uk-media-250"><img class="uk-image" alt="" uk-img
                            src="{{ asset(env('PUBLIC_PATH') . 'uploads/original/' . $tripinsurance1->thumbnail) }}">
                    </div>
                    <div class="uk-overlay-primary uk-position-cover"></div>
                    <div class="uk-position-center">
                        <div class="uk-overlay">
                            <h4 class="uk-margin-remove text-white uk-text-bold">
                              {{$tripinsurance1->caption}}
                            </h4>
                        </div>
                    </div>
                </a>
            </div>
            @else
            <div>
                @if(get_trip_insurance($data->id) != NULL)
                 <a class="uk-list-shine uk-cover-container uk-transition-toggle uk-display-block uk-link-toggle "
                    tabindex="0" href="{{ get_trip_insurance($data->id)->link }}" target="_blank">
                 @else 
                <a class="uk-list-shine uk-cover-container uk-transition-toggle uk-display-block uk-link-toggle "
                    tabindex="0" href="{{route('trip-insurance',$data->uri)}}" target="_blank">
                    @endif
                    <div class="uk-media-250"><img class="uk-image" alt="" uk-img
                            src="{{ asset(env('PUBLIC_PATH') . 'uploads/original/' . $tripinsurance2->thumbnail) }}">
                    </div>
                    <div class="uk-overlay-primary uk-position-cover"></div>
                    <div class="uk-position-center">
                        <div class="uk-overlay">
                            <h4 class="uk-margin-remove text-white uk-text-bold">
                               {{$tripinsurance2->caption}}
                            </h4>
                        </div>
                    </div>
                </a>
            </div>
            @endif
            <!--  -->
            <!--  -->
               @if($data->trip_type == 1)
            <div>
                 @if(get_trip_payment($data->id) != NULL)
                <a class="uk-list-shine uk-cover-container uk-transition-toggle uk-display-block uk-link-toggle "
                    tabindex="0" href="{{ get_trip_payment($data->id)->link }}" target="_blank">
                @else 
                <a class="uk-list-shine uk-cover-container uk-transition-toggle uk-display-block uk-link-toggle "
                    tabindex="0" href="{{route('payment',$data->uri)}}" target="_blank">
                   @endif 
                    <div class="uk-media-250"><img class="uk-image" alt="" uk-img
                            src="{{ asset(env('PUBLIC_PATH') . 'uploads/original/' . $application1->thumbnail) }}">
                    </div>
                    <div class="uk-overlay-primary uk-position-cover"></div>
                    <div class="uk-position-center">
                        <div class="uk-overlay">
                            <h4 class="uk-margin-remove text-white uk-text-bold">
                                {{$application1->caption}}
                            </h4>
                        </div>
                    </div>
                </a>
            </div>
            @else
            <div>
             @if(get_trip_payment($data->id) != NULL)
                <a class="uk-list-shine uk-cover-container uk-transition-toggle uk-display-block uk-link-toggle "
                    tabindex="0" href="{{ get_trip_payment($data->id)->link }}" target="_blank">
                @else 
                <a class="uk-list-shine uk-cover-container uk-transition-toggle uk-display-block uk-link-toggle "
                    tabindex="0" href="{{route('payment',$data->uri)}}" target="_blank">
                   @endif 
                    <div class="uk-media-250"><img class="uk-image" alt="" uk-img
                            src="{{ asset(env('PUBLIC_PATH') . 'uploads/original/' . $application2->thumbnail) }}">
                    </div>
                    <div class="uk-overlay-primary uk-position-cover"></div>
                    <div class="uk-position-center">
                        <div class="uk-overlay">
                            <h4 class="uk-margin-remove text-white uk-text-bold">
                               {{$application2->caption}}
                            </h4>
                        </div>
                    </div>
                </a>
            </div>
            @endif
            <!--  -->
        </div>
    </div>
    <!-- end Equipments List -->

    <!-- start Photo/Videos -->
    @if ($photo_videos->count() > 0)
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
        @if($videos->isNotEmpty())
           <!--  -->
        @foreach ($videos as $row)
          <div class="uk-video">
             <a class="uk-video-player" href="#modal-media-youtube" uk-toggle>
                <div class="uk-media-400 uk-position-relative"> 
                   <img class="uk-image" alt="" uk-img src="https://img.youtube.com/vi/{{ $row->video }}/maxresdefault.jpg"> 
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
               <iframe src="https://www.youtube-nocookie.com/embed/{{ $row->video }}"  width="854" height="480" uk-video uk-responsive></iframe>
             </div>
          </div> 
          </div>
            @endforeach
         @endif
          <!--  -->
          @if($photos->count()>0)
          <ul class="uk-grid-collapse uk-grid-small" uk-grid="masonry: true" uk-lightbox="animation: slide;">
            @if($videos->isEmpty())
             @foreach ($photos->slice(0,1) as $row)
              <li class="uk-width-1-1">
                   <a href="{{ asset('/uploads/original/' . $row->thumbnail) }}" data-caption="{{ $row->title }}">
                <div class="uk-media-400 uk-list-shine">
                 <img src="{{ asset('/uploads/original/' . $row->thumbnail) }}" uk-img>
                </div>
                </a>
             </li>
             @endforeach
              @foreach ($photos->skip(1) as $row)
                @continue($row->thumbnail == null)
                @continue($loop->iteration >= 4)

             <li class=" uk-width-1-3@m">
                   <a href="{{ asset('/uploads/original/' . $row->thumbnail) }}" data-caption="{{ $row->title }}">
                <div class="uk-media-150 uk-list-shine">
                 <img src="{{ asset('/uploads/original/' . $row->thumbnail) }}" uk-img>
                 @if ($loop->iteration >= 3)
                 <div class="uk-overlay-primary uk-position-cover"></div>
                    <h1 class="uk-position-center uk-light uk-margin-remove text-white"
                        style="z-index: 1;">+ {{ $loop->remaining }}</h1>
                @endif
                </div>
                </a>
             </li>
             @endforeach
             @else
              @foreach ($photos as $row)
                @continue($row->thumbnail == null)
                @continue($loop->iteration >= 4)

             <li class=" uk-width-1-3@m">
                   <a href="{{ asset('/uploads/original/' . $row->thumbnail) }}" data-caption="{{ $row->title }}">
                <div class="uk-media-150 uk-list-shine">
                 <img src="{{ asset('/uploads/original/' . $row->thumbnail) }}" uk-img>
                 @if ($loop->iteration >= 3)
                 <div class="uk-overlay-primary uk-position-cover"></div>
                    <h1 class="uk-position-center uk-light uk-margin-remove text-white"
                        style="z-index: 1;">+ {{ $loop->remaining }}</h1>
                @endif
                </div>
                </a>
             </li>
             @endforeach
             @endif
             <!-- more images -->
            @foreach ($photo_videos as $row)
            <li>
                <a href="{{ asset('/uploads/original/' . $row->thumbnail) }}"
                    data-caption="{{ $row->title }}"> </a>
            </li>
            @endforeach
            <!-- end -->
          </ul>
          @endif
       </div>
    </div>
       @endif
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
                                 @if ($trip_review->isNotEmpty())
                                    @foreach ($trip_review as $value)
                                  <li>
                                            <div>
                                                <div class="uk-testimonials-author uk-margin-medium-bottom">
                                                    <div class="uk-flex  uk-flex-middle">
                                                        <div>
                                                            <div class="uk-media-60 uk-margin-small-right">
                                                                <img src="{{ asset('images/reviews/' . $value->image) }}"
                                                                    alt="" class="uk-border-circle">
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div>
                                                                <h1
                                                                    class=" uk-h4 uk-margin-remove theme-font-extra-bold">
                                                                    {{ $value->name }}</h1>
                                                                <h1
                                                                    class="text-primary uk-margin-remove theme-font-medium uk-h5">
                                                                    {{ $value->country }}</h1>
                                                            </div>
                                                        </div>
                                                        @if($value->video_url)
                                                        <div>
                                                            <div class="uk-position-relative uk-margin-large-left"
                                                                uk-lightbox>
                                                                <a id="play-video" class="video-play-button"
                                                                    href="{{ $value->video_url }}">
                                                                    <span></span> </a>
                                                            </div>
                                                        </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="uk-testimonials-content uk-margin-small-left">
                                                    <div class="uk-flex">
                                                        <div class="uk-margin-small-right uk-visible@s"><i
                                                                class="fas fa-quote-left  fa-2x text-primary"></i>
                                                        </div>
                                                       <div class="uk-spoiler1">
                                                        <div class="uk-show-more1  ">
                                                            {!! $value->review !!}
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                @endif
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
                       {{ csrf_field() }}
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
     @include('themes.default.common.sidebar-trip')
    <!-- sidebar end -->
    </div>
</div>
<div id="uk-stop-sticky" class="uk-clearfix"></div>
</section>
<!-- end section -->
   
    <!--  section-->
    @if ($data->relatedtrips->count() > 0)
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
                        @foreach ($data->relatedtrips as $row)
                            <div>
                                <a class="uk-list-shine uk-cover-container uk-display-block uk-link-toggle " tabindex="0"
                                    href="{{ url('page/' . tripurl($row->uri)) }}">
                                    @if($row->thumbnail)
                                    <div class="uk-media-300"> <img class="uk-image" alt="" uk-img src="{{ asset('uploads/original/' . $row->thumbnail) }}">
                                    </div>
                                    @else
                                    <div class="uk-media-300"> <img class="uk-image" alt="" uk-img src="{{ asset('themes-assets/images/blank.png') }}">
                                    </div>
                                    @endif
                                    <div class="uk-overlay-primary uk-position-cover"></div>
                                    <div class="uk-position-center">
                                        <div class="uk-overlay">
                                            <h3 class="theme-font-medium-bold uk-margin-remove text-white  uk-text-uppercase">
                                                {{ $row->trip_title }}
                                            </h3>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                        <!--  -->
                    </div>
                  <a class="uk-nav-slider-btn  uk-position-center-left uk-margin-small-left" href="#" uk-icon="icon:arrow-left; ratio: 1.5" uk-slider-item="previous"></a>
            <a class="uk-nav-slider-btn  uk-position-center-right uk-margin-small-right" href="#" uk-icon="icon:arrow-right; ratio: 1.5" uk-slider-item="next"></a>
                </div>
            </div>
        </section>
    @endif
    <!-- section -->

    <!-- Inquire Now popup -->
    <div id="inquire-now" uk-modal>
        <div class="uk-modal-dialog uk-modal-border-rounded">
            <button class="uk-modal-close-default" type="button" uk-close></button>
            <div class="uk-modal-header uk-background-muted uk-text-center uk-padding">
                <h3 class="uk-margin-remove">Have Questions? </h3>
                <h5 class="uk-margin-remove text-primary">{{ $data->trip_title }}</h5>
            </div>
            <div class="uk-modal-body uk-padding">
                <form class="uk-grid-small" action="{{ route('post-inquiry') }}" method="post" uk-grid>
                    {{ csrf_field() }}
                    <input type="hidden" value="{{ $data->id }}" name="trip_id" />
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
                            @foreach($country as $row)
                            <option value="{{$row->country}}">{{$row->country}}</option>
                           @endforeach
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
                <h5 class="uk-margin-remove text-primary">{{ $data->trip_title }}</h5>
            </div>
            <div class="uk-modal-body uk-padding">
                <form class="uk-grid-small" action="{{ route('post-inquiry') }}" method="post" uk-grid>
                    {{ csrf_field() }}
                    <input type="hidden" value="{{ $data->id }}" name="trip_id" />
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
                            @foreach($country as $row)
                            <option value="{{$row->country}}">{{$row->country}}</option>
                           @endforeach
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

@endsection

@section('scripts')
<script type="text/javascript">
$(document).ready(function (){
    $('.alert').hide(8000);
});

$(document).ready(function () {
    $('.news_sort').change(function (e) {    
        var val = $(this).find(':checked').val();
         var csrf = $('meta[name="csrf-token"]').attr('content');
         var url =
            "{{ route('trip-cost-inc', ['trip_id' => ':trip_id', 'trip_category' => ':trip_category']) }}";                   
        url = url.replace(':trip_id', {{ $data->id }});
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
    formData.append('trip_id',{{$data->id}});
    
    $.ajax({
        type: 'POST',
        url: '{{route('add-review')}}',
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
<script src="https://www.google.com/recaptcha/api.js?render={{env('SITE_KEY')}}"></script>
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
@endsection
