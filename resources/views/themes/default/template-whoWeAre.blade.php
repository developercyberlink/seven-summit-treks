@extends('themes.default.common.master')
@section('title', $data->post_title)
@section('brief', $data->post_excerpt)
@section('thumbnail', $data->page_thumbnail)
@section('meta_keyword', $data->meta_keyword)
@section('meta_description', $data->meta_description)
@section('content')
    <!-- banner -->
    @include('themes.default.common.page-banner')
    <!-- end banner -->
    <!-- section -->
   <!-- section -->
	<section class="uk-section bg-white uk-position-relative uk-wave-white-top" uk-scrollspy="cls: uk-animation-slide-left-small; target:div,  li, img, p, h1;  delay: 50; repeat: false;">
		<div class="uk-container">
			<div>
			     {!! $data->post_excerpt !!}
			   
			   @if($postimage->count()>0)
				<div class="uk-grid-medium uk-child-width-1-3@s uk-margin-medium" uk-lightbox uk-grid>
					<!--  -->
					@foreach($postimage as $row)
					<div>
						<div class="uk-position-relative uk-img-effect">
						<a href="{{ asset('/uploads/medium/' . $row->file_name) }}" data-caption="{{$row->title}}">
							<div class="uk-media-500"> <img src="{{ asset('/uploads/medium/' . $row->file_name) }}" class="uk-effect-1" alt=""> </div>
							<h1 class="uk-h6 text-black uk-small-title uk-margin-small">{{$row->title}}</h1> </a>
						</div>
					</div>
					@endforeach
					<!--  -->
					
				</div>
	         		@endif
	         		
	         		{!!$data->post_content!!}
	            </div>
		</div>
	</section>
	<!-- end section -->
    <!-- end section -->


@endsection
