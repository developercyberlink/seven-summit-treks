@extends('themes.default.common.master')
@section('title', $data->post_title)
@section('brief', $data->post_excerpt)
@section('thumbnail', $data->page_thumbnail)
@section('meta_keyword', $data->meta_keyword)
@section('meta_description', $data->meta_description)
@section('content')
 <!-- trip video and image banner -->
   <section class="uk-cover-container uk-position-relative uk-flex uk-flex-middle uk-background-norepeat uk-background-cover uk-background-top-center" uk-parallax="bgy: -100; easing: -2;  " style="background:url({{asset('uploads/banners/'.$data->page_banner)}});">
      <!-- <div class="uk-position-relative" id="ytbg" data-ytbg-fade-in="true" data-ytbg-mute-button="true" data-youtube="https://www.youtube.com/watch?v=Lbo_zR3HuIA"></div> -->
      <div class="uk-overlay-primary  uk-position-cover "></div>
      <div class="uk-hero-banner-content-inner uk-width-1-1 uk-position-z-index uk-margin-large-top">
         <div class="uk-container  uk-position-relative  uk-flex-middle uk-flex" uk-height-viewport="expand: true; min-height: 500;">
            <div class="uk-margin-large-bottom">
               <h3 class="uk-text-bolder text-white uk-margin-remove" uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 800; repeat: false;">{{$data->sub_title}} </h3>
               <h1 class="uk-text-bolder text-primary uk-margin-remove" uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 1200; repeat: false;">{{$data->post_title}}</h1> </div>
         </div>
      </div>
      </div>
   </section>
   <!-- end trip video and image banner -->
	<!-- section -->
	<section class="uk-section uk-position-relative ">
		<div class="uk-container">
			<!--  -->
			<div uk-scrollspy="cls: uk-animation-slide-left-small; target:div,  li, img, p, h1, tr;  delay: 50; repeat: false;">
			    {!!$data->post_excerpt!!}
				 @if($postimage->count()>0)
				<div class="uk-grid-medium uk-child-width-1-3@s uk-margin-medium" uk-lightbox uk-grid>
					<!--  -->
					@foreach($postimage as $row)
					<div>
						<div class="uk-position-relative uk-img-effect">
						<a href="{{ asset('/uploads/medium/' . $row->file_name) }}" data-caption="{{$row->title}}">
							<div class="uk-media-400"> <img src="{{ asset('/uploads/medium/' . $row->file_name) }}" class="uk-effect-1" alt=""> </div>
							<h1 class="uk-h6 text-black uk-small-title uk-margin-small">{{$row->title}}</h1> </a>
						</div>
					</div>
					@endforeach
					<!--  -->
				</div>
	         		@endif
			</div>
			<!--  -->
		</div>
	</section>
	<!-- end section -->

	 
   <!-- section -->
	<section class="uk-section-large bg-black uk-position-relative ">
		<div class="uk-container text-white "> 
				<!--  -->
                	{!!$data->associated_title!!}		
                <!--  --> 

       @if ($data_child->count() > 0)
		<div uk-slider="sets: false; autoplay: true; autoplay-interval: 4000; finite: false;" class="uk-position-relative uk-visible-toggle uk-light uk-margin-large-top" tabindex="-1">

    <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-4@m uk-grid">
          @foreach ($data_child as $key => $row)
        <li>
            <div class="uk-panel">
                @if($row->page_thumbnail)
                 <img src="{{asset('uploads/original/'.$row->page_thumbnail)}}" alt="" width="80">
                 @else
              <img src="{{asset('themes-assets/images/reward/logo.png')}}" alt="" width="80">
              @endif
                <p>{{$row->post_title}}</p>
             </div>
        </li> 
        @endforeach
    </ul>

  <!--   <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
  <!--  <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a> -->
    <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin-large uk-margin-remove-bottom"></ul>

</div>
@endif
		</div>



	</section>
	<!-- end section -->

	<!-- section -->
	<section class="uk-section uk-position-relative ">
		<div class="uk-container">
			<!--  -->
			<div uk-scrollspy="cls: uk-animation-slide-left-small; target:div,  li, img, p, h1, tr;  delay: 50; repeat: false;">
				
             {!!$data->post_content!!}
			</div>
			<!--  -->
		</div>
	</section>
	<!-- end section -->
	@endsection