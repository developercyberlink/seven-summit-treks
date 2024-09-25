@extends('themes.default.common.master')
@section('post_title',$team->category)
@section('meta_keyword',$team->content)
@section('meta_description',$team->content)
@section('content')
	<!-- banner -->
	<section class="uk-cover-container uk-position-relative uk-flex uk-flex-middle uk-background-norepeat uk-background-cover uk-background-bottom-center" uk-parallax="bgy: -100; easing: -2;  " data-src="{{ asset(env('PUBLIC_PATH').'/uploads/team/' . $team->picture) }}" uk-height-viewport="expand: true; min-height: 600;" uk-img>
		<div class="uk-overlay-primary  uk-position-cover "></div>
		<div class="uk-hero-banner-content-inner uk-width-1-1 uk-position-z-index">
			<div class="uk-container ">
				<div class="uk-padding">
					<h1 class="main-title-font uk-text-bolder text-white uk-margin-remove" uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 800; repeat: false;"> 
		              {{$team->category}}
		            </h1>
					<div class="uk-width-1-2@m uk-margin-top" uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 1200; repeat: false;">
						<p class="text-white uk-text-lead uk-margin-remove">{{$team->content}}</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end banner -->
	<!--  -->
	<div class="uk-box-shadow-medium   bg-white  uk-padding-small">
		<div class="uk-container ">
			<!--  -->
			<div uk-slider>
				<div class="uk-position-relative uk-inner-nav">
					@if($team_cat->count()>0)
					<div class="uk-slider-container ">
						<ul class="uk-slider-items subnavbar uk-text-center uk-child-width-1-2 uk-child-width-1-4@s uk-child-width-1-4@m">
							@foreach($team_cat as $row)
							<li> <a href="{{ url('team/'.$row->uri) }}" class="{{($team->uri == $row->uri)?' active':''}} ">{{$row->category}} </a> </li>
							@endforeach
						</ul>
					</div>
					@endif
					<div>
						<a class="uk-position-center-left-out btn-custom" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
						<a class="uk-position-center-right-out btn-custom" href="#" uk-slidenav-next uk-slider-item="next"></a>
					</div>
				</div>
			</div>
			<!--  -->
		</div>
	</div>
	<!--  -->
	<!-- section -->
	@if($first_team->count()>0)
<section class="uk-section bg-black-light uk-position-relative " uk-scrollspy="cls: uk-animation-slide-left-small; target:.team__item, .team__title ;  delay: 50; repeat: false;">
		<div class="uk-container uk-container-xsmall">
			 <div class="uk-child-width-1-2 uk-grid-medium uk-light uk-margin-bottom" uk-grid  uk-scrollspy="cls: uk-animation-slide-left-small; target:  li, img,  small, h4;  delay: 50; repeat: false;">
				@foreach($first_team as $row)
				<!--  -->
				<div>
                <div class="uk-team-list">
                   <div class="uk-media-350 uk-position-relative">
                      <a href="{{ url('team/'.$team->uri.'/'.team_url($row['uri'], $row['team_key'])) }}">
                     @if($row->thumbnail)
                      <img src="{{ asset(env('PUBLIC_PATH').'uploads/team/' . $row->thumbnail) }}"> 
                      @else
                      <img src="{{ asset(env('PUBLIC_PATH').'themes-assets/images/users.jpg') }}">
                      @endif 
                      </a>
          <!--            <div class="uk-position-center-left uk-margin-small-left uk-social-media-team"> -->
          <!--          	<a href="{{$row->fb_url}}" target="_blank"><i class="fa fa-facebook"></i></a>-->
    					 <!--<a href="{{$row->instagram_url}}" target="_blank"><i class="fa fa-instagram"></i></a> -->
    					 <!--<a href="{{$row->twitter_url}}" target="_blank"><i class="fa fa-twitter"></i></a> -->
    					 <!--<a href="{{$row->linkedin_url}}" target="_blank"><i class="fa fa-linkedin"></i></a> -->
          <!--            </div>-->
                   </div>
                   <a href="{{ url('team/'.$team->uri.'/'.team_url($row['uri'], $row['team_key'])) }}">
                      <h4 class="uk-title  uk-margin-top uk-margin-remove-bottom">{{$row->name}}</h4>
                      <small class="text-primary uk-margin-remove">{{$row->position}}</small>
                   </a>
                </div>
             </div>
				<!--  -->
			@endforeach
			</div>
		</div>
	</section>
	@endif
	<!-- end section -->
@endsection