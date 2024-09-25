@extends('themes.default.common.master')
@section('title', $data->post_title)
@section('brief', $data->post_excerpt)
@section('thumbnail', $data->page_thumbnail)
@section('meta_keyword', $data->meta_keyword)
@section('meta_description', $data->meta_description)
@section('content')
	<!-- banner -->
	    @include('themes.default.common.page-banner2')
	<!-- end banner -->
	 
	<!-- section -->
	<section class="uk-section bg-white uk-position-relative uk-wave-white-top">
		<div class="uk-container">
			<div uk-lightbox>
				<!--  -->
				@foreach($data_child as $value)
				@if($loop->iteration %2 !=0)
				<div class="uk-grid-collapse uk-flex-middle   uk-img-effect" uk-grid uk-scrollspy="cls: uk-animation-slide-left-small; target:div, p;  delay: 100; repeat: false;">
					<div class="uk-width-1-3@m">
						<div class="uk-media-450 uk-border-rounded">
						    @if($value->page_thumbnail)
                          	<a href="{{ asset('uploads/medium/' . $value->page_thumbnail) }}"> <img src="{{ asset('uploads/medium/' . $value->page_thumbnail) }}" alt="" class="uk-effect-1"> </a>
                                    @else
                             <img src="{{ asset('themes-assets/images/blank.png') }}"
                                    alt="{{ $value->post_title }}" class="uk-effect-1">
                                @endif
                                                
						
						</div>
					</div>
					<div class="uk-width-expand@m">
						<div class="uk-padding-large uk-text-justify">
 							<div class="uk-margin-small-bottom">
								<h1 class="uk-h2 theme-font-medium-bold text-black">{{$value->post_title}} </h1> </div>
								{!!$value->post_excerpt !!}
						</div>
					</div>
				</div>
				@else
				
				<div class="uk-grid-collapse uk-flex-middle uk-img-effect" uk-grid uk-scrollspy="cls: uk-animation-slide-left-small; target:div, p;  delay: 100; repeat: false;">
					<div class="uk-width-expand@m  uk-flex-last uk-flex-first@m">
						<div class="uk-padding-large">
 							<div class="uk-margin-small-bottom">
								<h1 class="uk-h2 theme-font-medium-bold text-black">{{$value->post_title}}</h1> </div>
                	{!!$value->post_excerpt !!}
	                   </div>
					</div>
					<div class="uk-width-1-3@m  uk-flex-first uk-flex-last@m">
						<div class="uk-media-450 uk-border-rounded">
                        @if($value->page_thumbnail)
                          	<a href="{{ asset('uploads/medium/' . $value->page_thumbnail) }}"> <img src="{{ asset('uploads/medium/' . $value->page_thumbnail) }}" alt="" class="uk-effect-1"> </a>
                                    @else
                             <img src="{{ asset('themes-assets/images/blank.png') }}"
                                    alt="{{ $value->post_title }}" class="uk-effect-1">
                                @endif						
                            </div>
					</div>
				</div>
				@endif
				@endforeach
			
				 
			</div>
		</div>
	</section>
	<!-- end section -->
	@endsection