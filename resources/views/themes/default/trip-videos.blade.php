@extends('themes.default.common.master')
@section('trip_title', '')
@section('trip_excerpt', '')
@section('thumbnail', '')
@section('seo_title', '')
@section('meta_keyword', '')
@section('meta_description', '')
@section('content')
    <!-- trip video and image banner -->
    <!--  @if($trip->trip_type == 1)-->
    <!--<section class="uk-cover-container uk-position-relative uk-flex uk-flex-middle uk-background-norepeat uk-background-cover uk-background-top-center"-->
    <!--    uk-parallax="bgy: -100; easing: -2;  " style="background:url({{ asset(env('PUBLIC_PATH') . 'uploads/original/' . $video_cat1->thumbnail) }});">-->
    <!--    @else-->
    <!--    <section class="uk-cover-container uk-position-relative uk-flex uk-flex-middle uk-background-norepeat uk-background-cover uk-background-top-center"-->
    <!--    uk-parallax="bgy: -100; easing: -2;  " style="background:url({{ asset(env('PUBLIC_PATH') . 'uploads/original/' . $video_cat2->thumbnail) }});">-->
    <!--        @endif-->
            
             <section class="uk-cover-container uk-position-relative uk-flex uk-flex-middle uk-background-norepeat uk-background-cover uk-background-top-center"
        uk-parallax="bgy: -100; easing: -2;  " style="background:url({{ asset('uploads/banners/' . $trip->banner) }});">

        <div class="uk-overlay-primary  uk-position-cover "></div>
        <div class="uk-hero-banner-content-inner uk-width-1-1 uk-position-z-index uk-margin-large-top">
            <div class="uk-container  uk-position-relative  uk-flex-middle uk-flex"
                uk-height-viewport="expand: true; min-height: 500;">
                <div class="uk-margin-large-bottom">
                    <h3 class="text-primary uk-margin-small"
                        uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 800; repeat: false;">
                        <a href="javascript:history.back()" class="text-white"><i class="fa fa-chevron-left"
                                aria-hidden="true"></i> Go Back </a>
                    </h3>
                    <h1 class="uk-text-bolder text-white uk-margin-remove"
                        uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 1200; repeat: false;">
                        {{ $trip->trip_title }}
                    </h1>
                </div>
            </div>
        </div>
        </div>

    </section>
    <!-- end trip video and image banner -->
    <!--  -->
    <section class="uk-section-small bg-white">
        <div class=" uk-container">
            <div class="uk-grid-small uk-child-width-1-3@s uk-text-center" uk-grid
                uk-scrollspy="cls: uk-animation-slide-top-small; target:.youtube-player;  delay: 300; repeat: false;">
                <!--  -->
                @if ($trip_videos->count() > 0)
                    @foreach ($trip_videos as $row)
                        <div>
                            <div class="uk-position-relative">
                                <div class="youtube-player" data-id="{{ $row->video }}"></div>
                                <h5 class="uk-margin-small"> {{ $row->video_caption }} </h5>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="text-center"> Videos Not Available! </div>
                @endif
                {{-- $trip_videos->links() --}}
                <!--  -->
            </div>
        </div>
    </section>
    <!--  -->
    <!-- end section -->
@endsection
