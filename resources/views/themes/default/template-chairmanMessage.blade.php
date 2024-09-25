@extends('themes.default.common.master')
@section('title', $data->post_title)
@section('brief', $data->post_excerpt)
@section('thumbnail', $data->page_thumbnail)
@section('meta_keyword', $data->meta_keyword)
@section('meta_description', $data->meta_description)
@section('content')
    <!-- banner -->
    <div class="uk-position-relative uk-overflow-hidden">
       @if($message->banner)
		<div class="uk-cover-container {{($message->published == '1')?'uk-image-blur':''}}  uk-position-relative uk-flex uk-flex-bottom uk-background-norepeat uk-background-cover uk-background-center" uk-parallax="bgy: -100; easing: -2;  " data-src="{{ asset(env('PUBLIC_PATH').'uploads/team/' . $message->banner) }}" uk-height-viewport="expand: true; min-height: 600;" uk-img> </div>
		@else
	<div class="uk-cover-container uk-image-blur uk-position-relative uk-flex uk-flex-bottom uk-background-norepeat uk-background-cover uk-background-center" uk-parallax="bgy: -100; easing: -2;  " data-src="{{ asset(env('PUBLIC_PATH').'uploads/team/' . $message->thumbnail) }}" uk-height-viewport="expand: true; min-height: 600;" uk-img> </div>
        @endif
        <div class="uk-overlay-primary  uk-position-cover "></div>
        <div class="uk-width-1-1">
            <div class="  uk-position-bottom-center uk-position-z-index uk-text-center">
                <div class="uk-padding uk-padding-remove-left uk-padding-remove-right uk-text-center">
                    <h1 class="uk-text-bolder text-white uk-margin-medium  "
                        uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 800; repeat: false;">
                      {{ $data->post_title }}
                    </h1>
                    <div class="team__single__image uk-margin-auto"
                        uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 1200; repeat: false;"> <img
                            src="{{ asset(env('PUBLIC_PATH').'uploads/team/' . $message->thumbnail) }}" alt="{{ $data->post_title }}"> </div>
                    <h2 class=" uk-text-bolder text-primary uk-margin-top uk-margin-remove-bottom"
                        uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 1600; repeat: false;">
                        {{ $data->sub_title }}
                    </h2>
                    <h4 class="text-white  uk-text-bolder uk-margin-remove-top  uk-margin-medium-bottom"
                        uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 2000; repeat: false;">Chairman </h4>
                    <div class="uk-position-bottom-center">
                        <div class="uk-social-single uk-grid-collapse  uk-text-center" uk-grid
                            uk-scrollspy="cls: uk-animation-slide-bottom-small; target:div;  delay: 100; repeat: false;">
                            	<div class="uk-facebook"><a href="{{$message->fb_url}}" target="_blank"><i class="fa fa-facebook"></i></a></div>
							<div class="uk-instagram"><a href="{{$message->instagram_url}}" target="_blank"><i class="fa fa-instagram"></i></a></div>
							<div class="uk-twitter"><a href="{{$message->twitter_url}}" target="_blank"><i class="fa fa-twitter"></i></a></div>
							<div class="uk-linkedin"><a href="{{$message->linkedin_url}}" target="_blank"><i class="fa fa-linkedin"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    <!-- end banner -->
    <!-- section -->
    <section class="uk-section uk-team-single  uk-position-relative ">
        <div class="uk-container uk-container-small  ">
            <!--  -->
            <div
                uk-scrollspy="cls: uk-animation-slide-left-small; target:div,  li, img, p, h1, tr;  delay: 50; repeat: false;">
                {!! $data->post_excerpt !!}
                
               @if($postimage->count()>0)
				<div class="uk-grid-medium uk-child-width-1-3@s uk-margin-medium" uk-lightbox uk-grid>
					<!--  -->
					@foreach($postimage as $row)
					<div>
						<div class="uk-position-relative uk-img-effect">
						<a href="{{ asset('/uploads/medium/' . $row->file_name) }}" data-caption="{{$row->title}}">
							<div class="uk-media-350"> <img src="{{ asset('/uploads/medium/' . $row->file_name) }}" class="uk-effect-1" alt=""> </div>
							<h1 class="uk-h6 text-black uk-small-title uk-margin-small">{{$row->title}}</h1> </a>
						</div>
					</div>
					@endforeach
					<!--  -->
				</div>
	         		@endif
	         		
	         		 {!! $data->post_content !!}
            </div>
            <!--  -->
        </div>
    </section>
    <!-- end section -->
@endsection
