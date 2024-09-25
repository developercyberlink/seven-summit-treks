@extends('themes.default.common.master')
@section('title', $data->post_title)
@section('brief', $data->post_excerpt)
@section('thumbnail', $data->page_thumbnail)
@section('meta_keyword', $data->meta_keyword)
@section('meta_description', $data->meta_description)
@section('content')

	<!-- banner -->
	 	<section class="uk-cover-container  uk-position-relative uk-flex uk-flex-middle uk-background-norepeat uk-background-cover uk-background-top-center" uk-parallax="bgy: -100; easing: -2;" 
		data-src="{{ asset('uploads/banners/'.$data->page_banner) }}" uk-height-viewport="expand: true; min-height: 500;" uk-img>
		<div class="uk-overlay-primary  uk-position-cover "></div>
		<div class="uk-hero-banner-content-inner uk-width-1-1 uk-position-z-index uk-margin-large-top">
			<div class="uk-width-1-1 uk-position-relative" style="z-index: 99;">
				<div class="uk-container   uk-text-left  uk-position-relative">
					<div class="uk-grid-small uk-grid uk-flex-middle" uk-grid="">
						<div class="uk-width-expand@m ">
							<div class=" uk-margin-medium uk-width-large">
								<h1 class=" uk-text-bolder text-white uk-margin-remove" uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 400; repeat: false;"> {{ $data->post_title }}</h1> </div>
						</div>
						<div>
							<div class="uk-content uk-panel" uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 800; repeat: false;"> <a href="#write-a-review" uk-toggle class="uk-button uk-button-white-outline uk-width-1-1 "> Write a Review 
                     <span class="uk-icon uk-scrollspy-inview uk-animation-slide-right" uk-icon="icon:arrow-right; ratio: 1.5" uk-scrollspy="cls: uk-animation-slide-right; delay: 400; repeat: false;" style=""></span>
                     </a> </div>
						</div>
					</div>
					<div class="uk-clearfix"> </div>
				</div>
			</div>
		</div>
	</section>
	<!-- end banner -->
	<!--  section-->
	<section class="uk-section bg-white  uk-position-relative uk-wave-white-top ">
		<div class="uk-container uk-position-relative" uk-scrollspy="cls: uk-animation-slide-left-small; target:div;  delay: 100; repeat: false;">
			<!--  -->
			@if ($trip_review->count(0 > 0))
				@foreach ($trip_review as $row)
					<div>
				<div class="uk-card uk-card-default uk-margin-medium-bottom   uk-border-rounded uk-testimonials-list">
					<div class="uk-card-header uk-bg-pattern-primary">
						<div class="uk-text-center">
							<div class="uk-media-80 uk-margin-auto"> 
							@if($row->image)
							<img class="uk-border-circle" width="80" height="80" src="{{asset('images/reviews/'.$row->image)}}">
							@else
							<img class="uk-border-circle" width="80" height="80" src="{{asset('themes-assets/images/users.jpg')}}">
							@endif
							</div>
							<h1 class=" uk-h3 uk-margin-small uk-margin-remove-bottom theme-font-extra-bold">{{$row->name}}</h1>
							<h1 class="text-primary  uk-margin-small uk-margin-remove-top   uk-h4">{{$row->country}}</h1>
							<div class="uk-trip-review uk-text-small uk-margin-small-top"> 
								<span class="star-rating ">									
									@if (intval($row->rating))
										@for ($i = 0; $i <= 5; $i++)
											@if ($i < intval($row->rating) )
												<span class="fa fa-star checked"></span> 
											@elseif($i > intval($row->rating))
												<span class="fa fa-star"></span>
											@endif											 
										@endfor										
									@endif                 
								</span> 
										{{intval($row->rating)}}
					</div>
						</div>
					</div>
					<div class="uk-card-body uk-padding-large uk-quote uk-text-center uk-position-relative">
						<h4 class="theme-font-medium">
                        {!! $row->review !!}
                       </h4>
					@if ($row['video_url'])
					<!-- video -->
					<div class="uk-position-relative " uk-lightbox>
						<a href="{{$row['video_url']}}">
							<div id="play-video" class="video-play-button"> <span></span> </div>Watch Video </a>
					</div>
					<!-- end video -->
					@endif						
					</div>
				</div>
			</div>
				@endforeach
			@else
				<p>Reviews Not Available!</p>
			@endif			
			
			{{ $trip_review->links('themes.default.common.paginate') }}
			<!--  -->
		</div>
	</section>
	<!-- section -->
	
	<!-- write a review popup -->
<div id="write-a-review" uk-modal>
<div class="uk-modal-dialog uk-modal-border-rounded">
   <button class="uk-modal-close-default" type="button" uk-close></button>
   <div class="uk-modal-header uk-background-muted uk-text-center uk-padding">
      <h3 class="uk-margin-remove">Write a Review </h3>
   </div>
   <div class="uk-modal-body uk-padding">
      <form class="uk-grid-small" id="form_review" uk-grid>
         <div class="uk-width-1-2@s  ">
            <label>Full Name</label>
            <input class="uk-input" name="name" type="text" placeholder=" ">
         </div>
         <div class="uk-width-1-2@s  ">
            <label>Email Address</label>
             <input class="uk-input" name="email" type="email" placeholder=" ">
         </div>
         <div class="uk-width-1-1@s uk-margin-small">
            <label>Your Photo</label>
            <input class="uk-input" type="file" name="photo" placeholder=" ">
         </div>
         <div class="uk-width-1-1@s uk-margin-small">
            <!-- <label>Upload your trip photo</label> -->
            {{-- <div class="js-upload uk-placeholder uk-text-center">
               <span uk-icon="icon: cloud-upload"></span> <span class="uk-text-middle">Upload your trip photo</span>
               <div uk-form-custom>
                  <input type="file" multiple> <span class="uk-link">Choose</span> 
               </div>
            </div> --}}
            <div class="uk-width-1-1@s uk-margin-small">
               <label>Youtube video URL</label>
                 <input class="uk-input" name="video_url" type="text" placeholder=" ">   
                         </div>
            <div class="uk-width-1-1@s uk-margin-small">
               <label>Rating</label>
               <div class="uk-rating">
                  <input id="radio1" type="radio" name="star" value="5" class="uk-star" />
                                <label for="radio1">&#9733;</label>
                                <input id="radio2" type="radio" name="star" value="4" class="uk-star" />
                                <label for="radio2">&#9733;</label>
                                <input id="radio3" type="radio" name="star" value="3" class="uk-star" />
                                <label for="radio3">&#9733;</label>
                                <input id="radio4" type="radio" name="star" value="2" class="uk-star" />
                                <label for="radio4">&#9733;</label>
                                <input id="radio5" type="radio" name="star" value="1" class="uk-star" />
                                <label for="radio5">&#9733;</label>
               </div>
            </div>
            <div class="uk-width-1-1@s uk-margin-small">
               <label>Review </label>
                <textarea name="review" class="uk-textarea" rows="5" placeholder="Write Review"> </textarea>

            </div>
          
            <div class="uk-width-1-1@s uk-text-center">  
               <button id="add_trip_review" class="uk-button uk-button-primary" type="button">Submit </button>
            </div>
      </form>
      </div>
   </div>
</div>
@endsection