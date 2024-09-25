@extends('themes.default.common.master')
@section('title', $pages->page_type)
@section('brief', $pages->brief)
@section('thumbnail', $pages->image)
@section('meta_keyword', $pages->brief)
@section('meta_description', $pages->brief)
@section('content')

	<!-- banner -->
	<section class="uk-cover-container  uk-position-relative   uk-flex uk-flex-middle  uk-background-norepeat uk-background-cover uk-background-top-center" uk-parallax="bgy: -100; easing: -2;  " data-src="{{ asset(env('PUBLIC_PATH').'uploads/original/' . $pages->image) }}" uk-height-viewport="expand: true; min-height: 450;" uk-img>
		<div class="uk-overlay-primary  uk-position-cover "></div>
		<div class="uk-width-1-1 uk-position-z-index uk-margin-large-top">
			<div class="uk-width-1-1 uk-position-relative" style="z-index: 99;">
				<div class="uk-container    uk-position-relative" uk-scrollspy="cls: uk-animation-fade;  delay: 500; repeat: false">
					<div class=" uk-margin-medium uk-width-large">
						<h1 class=" uk-text-bolder text-white uk-margin-small" uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 400; repeat: false;"><span class="uk-text-bold">{{$pages->page_type}}</span> </h1> </div>
				</div>
			</div>
		</div>
	</section>
	<!-- end banner -->
	<!-- section   -->
	@if($data->count()>0)
	<section class="uk-section bg-white  uk-position-relative">
		<div class="uk-container  ">
		    {!!$pages->brief!!}
			<div class="uk-grid-small uk-child-width-1-2@s uk-text-center uk-margin-medium-top" uk-grid uk-scrollspy="cls: uk-animation-slide-top-small; target:a;  delay: 300; repeat: false;">
				@foreach($data as $row)
				<!--  -->
				<div >
				    @if($row->external_link)
					<a class="uk-list-shine uk-corner-hover uk-cover-container uk-display-block uk-link-toggle " tabindex="0"
					href="{{ $row->external_link }}" target="_blank">
					    @else
					    	<a class="uk-list-shine uk-corner-hover uk-cover-container uk-display-block uk-link-toggle " tabindex="0"
					href="{{ url('info/'.$pages->uri.'/'.teamurl($row['uri'],$row['page_key'])) }}">
					    	    @endif
						<div class="uk-media-300"> 
						@if($row->page_thumbnail)
						<img class="uk-image" alt="" uk-img src="{{ asset(env('PUBLIC_PATH').'uploads/original/' . $row->page_thumbnail) }}">
						@else
							<img class="uk-image" alt="" uk-img src="{{ asset('themes-assets/images/blank.png') }}">
							@endif
						  <!-- corner -->
                     <div class="uk-corner-borders uk-corner-borders--left"></div>
                     <div class="uk-corner-borders uk-corner-borders--right"></div>
                     <!-- end -->
						</div>
						<div class="uk-overlay-primary uk-position-cover"></div>
						<div class="uk-position-center">
							<div class="uk-overlay">
						<h3 class="theme-font-medium-bold uk-margin-remove text-white">
                          {{$row->page_title}}
                          </h3> </div>
						</div>
					</a>
				</div>
				<!--  -->
				@endforeach
			</div>
		</div>
	</section>
	@endif
	<!-- section  -->


@endsection