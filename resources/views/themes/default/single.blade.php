@extends('themes.default.common.master')
@section('title', $data->post_title)
@section('brief', $data->post_excerpt)
@section('thumbnail', $data->page_thumbnail)
@section('meta_keyword', $data->meta_keyword)
@section('meta_description', $data->meta_description)
@section('content')
    <!-- banner -->
    <section class="uk-cover-container uk-position-relative uk-flex uk-flex-middle uk-background-norepeat uk-background-cover uk-background-top-center uk-position-relative "
        uk-parallax="bgy: -100; easing: -2;" data-src="{{ asset('uploads/banners/' . $data->page_banner) }}" uk-height-viewport="expand: true; min-height: 500;" uk-img>
        <div class="uk-overlay-primary  uk-position-cover "></div>
        <div class="uk-hero-banner-content uk-width-1-1 uk-position-z-index uk-margin-large-top">
            <div class="uk-container ">
            <h3 class=" theme-font-extra-bold text-white uk-margin-remove" uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 800; repeat: false;"> {{ $data->sub_title }}</h3>
            <h1 class=" theme-font-extra-bold text-primary uk-margin-remove" uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 1200; repeat: false;">
                {{ $data->post_title }}
            </h1>
            </div>
        </div>
    </section>
    <!-- end banner -->
    <!-- section -->
    <section class="uk-section bg-white uk-position-relative uk-wave-white-top"
        uk-scrollspy="cls: uk-animation-slide-left-small; target:div,  li, img, p, h1;  delay: 50; repeat: false;">
        <div class="uk-container">
            <div> {!! $data->post_content !!}</div>
        </div>
    </section>
    <!-- end section -->
@endsection