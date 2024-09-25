@extends('themes.default.common.master')
@section('title', $data->name)
@section('brief', $data->position)
@section('thumbnail', $data->thumbnail)
@section('meta_keyword', $data->brief)
@section('meta_description', $data->brief)
@section('content')

	<!-- banner -->
	<div class="uk-position-relative uk-overflow-hidden">
	    @if($data->banner)
		<div class="uk-cover-container {{($data->published == '1')?'uk-image-blur':''}}  uk-position-relative uk-flex uk-flex-bottom uk-background-norepeat uk-background-cover uk-background-center" uk-parallax="bgy: -100; easing: -2;  " data-src="{{ asset(env('PUBLIC_PATH').'uploads/team/' . $data->banner) }}" uk-height-viewport="expand: true; min-height: 600;" uk-img> </div>
		@else
	<div class="uk-cover-container uk-image-blur uk-position-relative uk-flex uk-flex-bottom uk-background-norepeat uk-background-cover uk-background-center" uk-parallax="bgy: -100; easing: -2;  " data-src="{{ asset(env('PUBLIC_PATH').'uploads/team/' . $data->thumbnail) }}" uk-height-viewport="expand: true; min-height: 600;" uk-img> </div>
        @endif
		<div class="uk-overlay-primary  uk-position-cover "></div>
		<div class="uk-hero-banner-content-inner  uk-position-bottom-center uk-position-z-index">
			<div class="uk-width-xlarge uk-text-center">
				<div class="uk-padding uk-padding-remove-left uk-padding-remove-right uk-text-center">
					<div class="team__single__image uk-margin-auto" uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 800; repeat: false;">
					 <img src="{{ asset(env('PUBLIC_PATH').'uploads/team/' . $data->thumbnail) }}" alt="">
					  </div>
					<h2 class="main-title-font uk-text-bolder text-primary uk-margin-top uk-margin-remove-bottom" uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 1200; repeat: false;"> 
              {{$data->name}}
            </h2>
					<h4 class="text-white  uk-text-bolder uk-margin-remove-top  uk-margin-small-bottom" uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 1600; repeat: false;">{{$data->position}} </h4>
					<ul class="uk-child-width-1-2@s uk-text-center uk-grid-small   text-white  uk-margin-medium-bottom" uk-grid uk-scrollspy="cls: uk-animation-slide-left-small; target:div;  delay: 100; repeat: false;">
						<li>
							<div><span class=" uk-margin-small-right" uk-icon="icon: receiver;"></span>{{$data->phone}}</div>
						</li>
						<li>
							<div> <span class="uk-margin-small-right" uk-icon="icon: mail;"></span> {{$data->email}}</div>
						</li>
					</ul>
					<div class="uk-position-bottom-center">
						<div class="uk-social-single uk-grid-collapse  uk-text-center" uk-grid uk-scrollspy="cls: uk-animation-slide-bottom-small; target:div;  delay: 100; repeat: false;">
							<div class="uk-facebook"><a href="{{$data->fb_url}}" target="_blank"><i class="fa fa-facebook"></i></a></div>
							<div class="uk-instagram"><a href="{{$data->instagram_url}}" target="_blank"><i class="fa fa-instagram"></i></a></div>
							<!--<div class="uk-twitter"><a href="{{$data->twitter_url}}" target="_blank"><i class="fa fa-twitter"></i></a></div>-->
							<!--<div class="uk-linkedin"><a href="{{$data->linkedin_url}}" target="_blank"><i class="fa fa-linkedin"></i></a></div>-->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end banner -->
	<!-- section -->
	<section class="uk-section uk-team-single bg-black-light uk-position-relative ">
		<div class="uk-container uk-container-small text-white ">
			<!--  -->
			<div  class="uk-margin-medium-bottom" uk-scrollspy="cls: uk-animation-slide-left-small; target:div,  li, img, p, h1, tr;  delay: 50; repeat: false;">
				<div>
					{!!$data->content!!}
				</div>
				@if($mountains->count()>0)
				
				<h1 class="uk-h3 theme-font-medium-bold uk-text-bold text-white uk-heading-line uk-margin-medium"><span>Mountains Summitted by  {{$data->name}}</span></h1>
				<div class="uk-overflow-auto uk-margin-bottom">
					<table class="uk-table uk-table-justify uk-table-divider">
						<thead class="thead-default">
							<tr>
								<th>S.N.</th>
								<th>Name of Mountain</th>
								<th>Total Summited</th>
								<th>Summitted Year(s)</th>
							</tr>
						</thead>
						<tbody>

							@foreach($mountains as $row)
							<tr>
								<td>{{$row->ordering}}</td>
								<td>@if($row->link)
								<a href="{{$row->link}}" class="text-white">{{$row->mountain}}</a>@else{{$row->mountain}}@endif</td>
								<td>{{$row->total}}</td>
								<td>{{$row->year}}</td>
							</tr>
							@endforeach							
						</tbody>
					</table>
				</div>
				@endif
			</div>
			<!--  -->

				<!--  -->
				@if($achievements->count()>0)
				<div  class="uk-margin-medium-bottom"  uk-scrollspy="cls: uk-animation-slide-left-small; target:div,  li, img, p, h1, tr;  delay: 50; repeat: false;">
			 
				<h1 class="uk-h3 theme-font-medium-bold uk-text-bold text-white uk-heading-line uk-margin-medium"><span>Achievements</span></h1>

				<div class="uk-grid uk-child-width-1-2" uk-grid>
					<div>
						<ul class="uk-list uk-list-hyphen">
						@foreach($achievements as $row)
						 @if($loop->iteration % 2 != 0)
						<li> {{$row->title}}</li>
						@endif
						@endforeach
						</ul>
					</div>
					<div>
					<ul class="uk-list uk-list-hyphen">
						@foreach($achievements as $row)
						 @if($loop->iteration % 2 == 0)
						<li> {{$row->title}}</li>
						@endif
						@endforeach
						</ul>
					</div>

				</div>
				 
			</div>
			@endif
			<!--  -->
			<!--  -->
			@if($certificates->count()>0)
			<div>
				<h1 class="uk-h3 theme-font-medium-bold uk-text-bold text-white uk-heading-line uk-margin-medium"><span>Certificates & Awards Of {{$data->name}}</span></h1>
				<div class="uk-grid-small uk-child-width-1-3@s " uk-grid uk-lightbox uk-scrollspy="cls: uk-animation-slide-left-small; target:div a;  delay: 50; repeat: false;">
					<!--  -->
					@foreach($certificates as $row)
			<div>
				<a class="uk-list-shine uk-cover-container uk-text-bold uk-display-block uk-link-toggle " tabindex="0"   href="{{ asset(env('PUBLIC_PATH').'uploads/team/' . $row->image) }}" data-caption="{{$row->title}}">
					<div class="awards-image"> <img class="uk-image" alt="" uk-img src="{{ asset(env('PUBLIC_PATH').'uploads/team/' . $row->image) }}"> </div>
					<div class="uk-overlay-primary uk-position-cover"></div>
					<div class="uk-position-bottom-center">
						<div class="uk-overlay">
							<h3 class="uk-h4 uk-margin-top uk-margin-remove-bottom text-white">{{$row->title}}</h3>
						</div>
					</div>
				</a>
				</div>
				@endforeach
				<!--  -->


				
				</div>
			</div>
			@endif
			<!--  -->
		</div>
	</section>
	<!-- end section -->

@endsection