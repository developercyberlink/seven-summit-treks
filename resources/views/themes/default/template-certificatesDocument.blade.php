@extends('themes.default.common.master')
@section('title', $data->post_title)
@section('brief', $data->post_excerpt)
@section('thumbnail', $data->page_thumbnail)
@section('meta_keyword', $data->meta_keyword)
@section('meta_description', $data->meta_description)
@section('content')
    <!-- banner -->
    <section class="uk-cover-container uk-position-relative uk-flex uk-flex-middle uk-background-norepeat uk-background-cover uk-background-top-center"
        uk-parallax="bgy: -100; easing: -2;  " data-src="{{asset('uploads/banners/'.$data->page_banner)}}"
        uk-height-viewport="expand: true; min-height: 500;" uk-img>
        <div class="uk-overlay-primary  uk-position-cover "></div>
        <div class="uk-hero-banner-content-inner uk-width-1-1 uk-position-z-index uk-margin-large-top">
            <div class="uk-container">
                <h1 class="uk-text-bolder text-white uk-margin-remove"
                    uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 1200; repeat: false;">
                    {{ $data->post_title }}
                </h1>
            </div>
        </div>
    </section>
    <!-- end banner -->
    <!-- section -->
    <section class="uk-section uk-team-single bg-white  uk-position-relative uk-wave-white-top">
        <div class="uk-container">       
        
        

            {!! $data->post_content !!}
        	<div class="uk-grid-medium uk-child-width-1-2 uk-child-width-1-3@l uk-margin-medium-top" uk-grid uk-lightbox uk-scrollspy="cls: uk-animation-slide-left-small; target:div a;  delay: 50; repeat: false;">
                
                <!--  -->
                @if ($data->post_images->count() > 0)
                    @foreach ($data->post_images as $row)
				<div>
					<a class="uk-list-shine uk-corner-hover uk-cover-container uk-text-bold uk-display-block uk-link-toggle " tabindex="0" href="{{asset('uploads/medium/'.$row->file_name)}}" data-caption="{{$row->title}}">
						<div class="awards-image"> <img class="uk-image" alt="" uk-img src="{{asset('uploads/medium/'.$row->file_name)}}">
							<!-- corner -->
							<div class="uk-corner-borders uk-corner-borders--left"></div>
							<div class="uk-corner-borders uk-corner-borders--right"></div>
							<!-- end -->
						</div>
						<div class="uk-overlay-primary uk-position-cover"></div>
						<div class="uk-position-bottom-center">
							<div class="uk-overlay">
								<h3 class="uk-h4 uk-margin-top uk-margin-remove-bottom text-white">{{$row->title}}</h3> </div>
						</div>
					</a>
				</div>
				@endforeach
                @endif
				<!--  -->
				
            </div>
            
            {!! $data->associated_title !!}
        </div>
    </section>
    <!-- end section -->
@endsection
