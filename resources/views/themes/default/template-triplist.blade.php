@extends('themes.default.common.master')
@section('post_title',$data->title)
@section('meta_keyword',$data->meta_keyword)
@section('meta_description',$data->meta_description)
@section('content')

	<!-- trip video and image banner -->
	<main>
	    <section class="uk-cover-container uk-position-relative uk-flex uk-flex-middle uk-background-norepeat uk-background-cover uk-background-top-center" 
	    uk-parallax="bgy: -100; easing: -2;  " data-src="{{ asset('uploads/banners/'.$data->banner) }}" uk-img>
		@if ($data->video && $data->video_status == '1')
		<div class="uk-position-relative" id="ytbg" data-ytbg-fade-in="true" data-ytbg-mute-button="true" data-youtube="{{$data->video}}"></div>
		 @endif
       	<div class="uk-overlay-primary  uk-position-cover "></div>
		<div class="uk-hero-banner-content-inner uk-width-1-1 uk-position-z-index uk-margin-large-top">
			<div class="uk-container  uk-position-relative  uk-flex-middle uk-flex" uk-height-viewport="expand: true; min-height: 550;">
				<div class="uk-margin-large-bottom">
					<h3 class="uk-text-bolder text-white uk-margin-remove" uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 800; repeat: false;">Trekking </h3>
					<h1 class="uk-text-bolder text-primary uk-margin-remove" uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 1200; repeat: false;">
                             {{$data->title}}
                    </h1>
					<div class="uk-width-1-2@m uk-margin-top text-white uk-text-lead">
						
                          {!! $data->sub_title !!}
                       
					</div>
				</div>
			</div>
		</div>
		</div>
	</section>
	<!-- end trip video and image banner -->
	<!-- section -->
	<section class="uk-section bg-white uk-position-relative" uk-scrollspy="cls: uk-animation-slide-left-small; target:p;  delay: 50; repeat: false">
		<div class="uk-container">
		    @if($data->content)
			<div class="uk-spoiler uk-margin-top">
				<div class="{{$blogLength >= '1111'?'uk-show-more':''}}">
					{!! $data->content !!}
				</div>
			</div>
			@endif
			<div class="uk-grid-small uk-child-width-1-2@s uk-text-center uk-margin-medium-top" uk-grid uk-scrollspy="cls: uk-animation-slide-top-small; target:a;  delay: 300; repeat: false;">
				<!--  -->
                @if ($trips->count() > 0)
                @foreach ($trips as $row)
                 <div>
					<a class="uk-list-shine uk-corner-hover uk-cover-container uk-display-block uk-link-toggle " tabindex="0" href="{{ url('page/'.tripurl($row->uri)) }}">
						<div class="uk-media-300">
						    @if($row->thumbnail)
						     <img class="uk-image" uk-img src="{{asset('uploads/original/'.$row->thumbnail)}}" alt="{{$row->trip_title }}">
						     @else
						       <img class="uk-image" uk-img src="{{ asset('themes-assets/images/blank.png') }}" alt="{{$row->trip_title }}">
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
                                      {{$row->trip_title}}</h3> </div>
						</div>
					</a>
				</div>
            @endforeach
                @endif


				<!--  -->
			</div>
		
		</div>
	</section>
	<!-- end section -->
</main>
@endsection
