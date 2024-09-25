@extends('themes.default.common.master')
@section('trip_title', $data->trip_title)
@section('trip_excerpt', $data->trip_excerpt)
@section('thumbnail', $data->thumbnail)
@section('seo_title', $data->seo_title)
@section('meta_keyword', $data->meta_keyword)
@section('meta_description', $data->meta_description)
@section('content')

	<!-- trip video and image banner -->
	<section class="uk-cover-container uk-position-relative uk-flex uk-flex-middle uk-background-norepeat uk-background-cover uk-background-top-center" uk-parallax="bgy: -100; easing: -2;  " style="background:url({{ asset('uploads/banners/' . $trip->banner) }});">
		<div class="uk-overlay-primary  uk-position-cover "></div>
		<div class="uk-hero-banner-content-inner uk-width-1-1 uk-position-z-index uk-margin-large-top">
			<div class="uk-container  uk-position-relative  uk-flex-middle uk-flex" uk-height-viewport="expand: true; min-height: 500;">
				<div class="uk-margin-large-bottom">
					<h3 class="text-primary uk-margin-small" uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 800; repeat: false;">
            <a href="javascript:history.back()" class="text-white"><i class="fa fa-chevron-left" aria-hidden="true"></i> Go Back </a>
             </h3>
					<h1 class="uk-text-bolder text-white uk-margin-remove" uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 1200; repeat: false;">
           {{ $data->title }}
            </h1> </div>
			</div>
		</div>
		</div>
	</section>
	<!-- end trip video and image banner -->
	<!--  -->
	<!-- section -->
	<section class="uk-section bg-white uk-position-relative uk-wave-white-top" uk-scrollspy="cls: uk-animation-slide-left-small; target:div,  li, img, p, h1;  delay: 50; repeat: false;">
		<div class="uk-container">
			<div>
				<div uk-grid>
					<div class="uk-width-expand@m">
					  {!! $data->content !!}
					</div>

				</div>


			</div>
		</div>
	</section>
	<!-- end section -->
	<!--  -->
	<!-- end section -->

@endsection
