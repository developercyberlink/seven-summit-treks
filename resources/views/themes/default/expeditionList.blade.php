@extends('themes.default.common.master')
@section('title', $data->title)
@section('brief', $data->content)
@section('thumbnail', $data->thumbnail)
@section('meta_keyword', $data->content)
@section('meta_description', $data->content)
@section('content')
    <!-- trip video and image banner -->
    <section class="uk-cover-container uk-position-relative uk-flex uk-flex-middle uk-background-norepeat uk-background-cover uk-background-top-center"
        uk-parallax="bgy: -100; easing: -2;  " style="background:url({{ asset('uploads/original/' . $data->banner) }});">
        <div class="uk-overlay-primary  uk-position-cover "></div>
        <div class="uk-hero-banner-content-inner uk-width-1-1 uk-position-z-index uk-margin-large-top">
            <div class="uk-container  uk-position-relative  uk-flex-middle uk-flex"
                uk-height-viewport="expand: true; min-height: 500;">
                <div class="uk-margin-large-bottom">
                    <h3 class="uk-text-bolder text-white uk-margin-remove" 
                        uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 800; repeat: false;">Expeditions </h3>
                    <h1 class="uk-text-bolder text-primary uk-margin-remove"
                        uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 1200; repeat: false;">
                        {{ $data->title }}
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
                    @if ($expeditionGroup->count(0 > 0))
                        @foreach ($expeditionGroup as $row)
                            <li><a href="" class="theme-font-extra-bold "> {{ $row->group_title }} </a></li>
                        @endforeach
                    @endif
                </ul>
                <ul id="home-tab" class="uk-switcher uk-margin-small">
                    <!--  -->
                    @if ($trips->count() > 0)
                        <li>
                            <div class="uk-grid-small   uk-child-width-1-2@s uk-text-center" uk-grid uk-scrollspy="cls: uk-animation-slide-left-small; target:a;  delay: 100; repeat: false">

                                <!--  -->
                                @foreach ($trips as $row)
                                  
                                      <div>
                                    <a class="uk-list-shine uk-corner-hover uk-cover-container uk-display-block uk-link-toggle " tabindex="0" href="{{ url('page/' . tripurl($row->uri)) }}">
                                       <div class="uk-media-300"> 
                                        @if ($row->thumbnail)
                                            <img class="uk-image" alt="{{ $row->trip_title }}" uk-img
                                                src="{{ asset('uploads/original/' . $row->thumbnail) }}">
                                        @else
                                            <img class="uk-image" alt="{{ $row->trip_title }}" uk-img
                                                src="{{ asset('themes-assets/images/blank.png') }}">
                                        @endif
                                                           
                                          <!-- corner -->
                                          <div class="uk-corner-borders uk-corner-borders--left"></div>
                                          <div class="uk-corner-borders uk-corner-borders--right"></div>
                                          <!-- end -->
                                       </div>
                                       <div class="uk-overlay-primary uk-position-cover"></div>
                                       <div class="uk-position-center">
                                          <div class="uk-overlay">
                                             <h3 class="theme-font-medium-bold uk-margin-remove text-white  uk-text-uppercase">
                                            {{ $row->trip_title }}
                                          </h3> </div>
                                       </div>
                                    </a>
                                 </div>
                                @endforeach
                                <!--  -->
                            </div>
                        </li>
                    @endif

                    <!--  -->

                    @if ($expeditionGroup->count(0 > 0))
                        @foreach ($expeditionGroup as $row)
                            <li>
                                <div class="uk-text-center uk-padding uk-padding-remove-top">
                                    {{ $row->description }}</p>

                                </div>
                                  <div class="uk-grid-small   uk-child-width-1-2@s uk-text-center" uk-grid uk-scrollspy="cls: uk-animation-slide-left-small; target:div>a;  delay: 100; repeat: false">

                                    <!--  -->
                                    @foreach (tripfilter_tripgroup($row->id) as $row)
                                        @continue($row->expedition_group_id == $row->id)
                                        <div>
                                            {{-- tripfilter_expeditiongroup($trips->expedition_group_id) --}}
                                           <a class="uk-list-shine uk-corner-hover uk-cover-container uk-display-block uk-link-toggle"
                                            tabindex="0" href="{{ url('page/' . tripurl($row->uri)) }}">
                                                <div class="uk-media-300">
                                                    @if ($row->thumbnail)
                                                        <img class="uk-image" alt="{{ $row->trip_title }}" uk-img
                                                            src="{{ asset('uploads/original/' . $row->thumbnail) }}">
                                                    @else
                                                        <img class="uk-image" alt="{{ $row->trip_title }}" uk-img
                                                            src="{{ asset('themes-assets/images/blank.png') }}">
                                                    @endif

                                                </div>
                                                <div class="uk-overlay-primary uk-position-cover"></div>
                                                <div class="uk-position-center">
                                                    <div class="uk-overlay">
                                                        <h3
                                                            class="theme-font-medium-bold uk-margin-remove text-white  uk-text-uppercase">
                                                            {{ $row->trip_title }}
                                                        </h3>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                    <!--  -->
                                </div>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
            @if($facts->count()>0)
            <div class="uk-margin-medium-top">
                <h3><b>Geographical facts of the Main {{ $data->title }}</b></h3>
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
            @foreach($facts as $value)
               <tr>
                  <td>{{$value->name}} </td>
                  <td>{{$value->alt}}</td>
                  <td>{{$value->countries}}</td>
                  <td>{{$value->latitude}}</td>
                  <td>{{$value->longitude}}</td>
                  <td>{{$value->rp}}</td>
                  <td>{{$value->area}}</td>
               </tr>
               @endforeach                           
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
            @endif
        </div>
    </section>
    <!-- end section -->
    <!--   section with trip list -->

    <section class="uk-section uk-padding-remove-top uk-position-relative  bg-white">
        <div class="uk-container ">
            <div class="uk-grid-small uk-child-width-1-2@s  uk-child-width-1-3@l uk-text-center" uk-grid
                uk-scrollspy="cls: uk-animation-slide-left-small; target:h1, p, img;  delay: 100; repeat: false">
                <!--  -->
                @if ($expeditions->count() > 0)
                    @foreach ($expeditions as $row)
                        <div>
                            <a class="uk-list-shine uk-corner-hover uk-cover-container uk-display-block" tabindex="0"
                                href="{{ route('page.expeditionlist', $row->uri) }}">
                                <div class="uk-media-520">
                                    @if ($row->thumbnail)
                                        <img class="uk-image" alt="{{ $row->title }}" uk-img
                                            src="{{ asset('uploads/original/' . $row->thumbnail) }}" />
                                    @else
                                        <img class="uk-image" alt="{{ $row->title }}" uk-img
                                            src="{{ asset('themes-assets/images/blank.png') }}">
                                    @endif

                                    <!-- corner -->
                                    <div class="uk-corner-borders uk-corner-borders--left"></div>
                                    <div class="uk-corner-borders uk-corner-borders--right"></div>
                                    <!-- end -->
                                </div>
                                <div class="uk-overlay-primary uk-position-cover"></div>
                                <div class="uk-position-center">
                                    <div class="uk-overlay">
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
@endsection
