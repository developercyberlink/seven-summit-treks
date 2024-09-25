@extends('themes.default.common.master')
@section('post_title',$team->category)
@section('meta_keyword',$team->content)
@section('meta_description',$team->content)
@section('content')
	<!-- banner -->
	<section class="uk-cover-container  uk-position-relative uk-flex uk-flex-middle uk-background-norepeat uk-background-cover uk-background-bottom-center" uk-parallax="bgy: -100; easing: -2;  " data-src="{{ asset(env('PUBLIC_PATH').'/uploads/team/' . $team->picture) }}" uk-height-viewport="expand: true; min-height: 600;" uk-img>
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
	<section class="uk-section bg-black-light uk-position-relative " uk-scrollspy="cls: uk-animation-slide-left-small; target:div,  li, img, p, h1;  delay: 50; repeat: false;">
		<div class="uk-container">
					<div uk-filter="target: .js-filter" uk-scrollspy="target:h4, figure; cls: uk-animation-slide-top-medium;   delay: 50; repeat: true;">
				@if($team->id == '4')
					<div class="uk-grid-small uk-grid-divider uk-child-width-auto" uk-grid>
					<div>
						<ul class="uk-subnav  uk-subnav-pill" uk-margin>
							<!--<li class="uk-active" uk-filter-control><a href="#">All</a></li>-->
							@foreach($category2 as $row)
							<li uk-filter-control="[data-category='{{ $row->id }}']" class="{{$loop->first?'uk-active':''}}"><a href="#">{{ $row->category }}</a></li>
							@endforeach
						</ul>
					</div>
				</div>
				@endif
			<ul class="js-filter uk-child-width-1-4@m uk-child-width-1-2 uk-grid-medium uk-light uk-margin-bottom" uk-grid>
				<!--  -->
					@foreach($first_team as $row)
				<li data-category="{{ $row->subcategory }}">
					<div class=" uk-team-list">
						<a href="{{ url('team/'.$team->uri.'/'.team_url($row['uri'], $row['team_key'])) }}">
							<div class="uk-media-300"> 
							@if($row->thumbnail)
                            <img src="{{ asset(env('PUBLIC_PATH').'uploads/team/' . $row->thumbnail) }}" alt="">
                            @else
                            <img src="{{ asset(env('PUBLIC_PATH').'themes-assets/images/users.jpg') }}" alt="">
                            @endif 
						 </div>
							<h4 class="uk-title uk-margin-top uk-margin-remove-bottom">{{$row->name}}</h4>
							<div class="uk-meta uk-text-meta uk-margin-small-top">{{$row->position}}</div>
						</a>
					</div>
				</li>
				@endforeach
				<!--  -->
				
				<!--  -->
			</ul>
		</div>

		</div>
	</section>
	@endif
	<!-- end section -->
@endsection