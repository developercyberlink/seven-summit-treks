@extends('themes.default.common.master')
@section('title', $data->page_title)
@section('brief', $data->page_excerpt)
@section('thumbnail', $data->page_thumbnail)
@section('meta_keyword', $data->meta_keyword)
@section('meta_description', $data->meta_description)
@section('content')
<!-- banner -->
	<section class="uk-cover-container  uk-position-relative   uk-flex uk-flex-middle  uk-background-norepeat uk-background-cover uk-background-top-center" uk-parallax="bgy: -100; easing: -2;  " data-src="{{ asset(env('PUBLIC_PATH').'uploads/banners/' . $data->page_banner) }}" uk-height-viewport="expand: true; min-height: 450;" uk-img>
		<div class="uk-overlay-primary  uk-position-cover "></div>
		<div class="uk-width-1-1 uk-position-z-index uk-margin-large-top">
			<div class="uk-width-1-1 uk-position-relative" style="z-index: 99;">
				<div class="uk-container    uk-position-relative" uk-scrollspy="cls: uk-animation-fade;  delay: 500; repeat: false">
					<div class=" uk-margin-medium uk-width-xxlarge">
						<h1 class=" uk-text-bolder text-white uk-margin-small" uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 400; repeat: false;"><span class="uk-text-bold">
                          {{$data->page_title}}
                           </span> </h1> </div>
				</div>
			</div>
		</div>
	</section>
	<!-- end banner -->
	<!-- section   -->
	<section class="uk-section bg-white  uk-position-relative">
		<div class="uk-container  ">
			<div uk-grid class="uk-grid">
				<div class="uk-width-expand@m ">
				    @if($data->page_thumbnail)
					<div class="uk-media-350 uk-margin uk-position-relative"> <img src="{{ asset(env('PUBLIC_PATH').'uploads/original/' . $data->page_thumbnail) }}" uk-img>
						<div class="uk-image-caption uk-position-bottom uk-padding-small uk-text-white">
							<div class="uk-position-cover uk-overlay-primary"></div>
							<div class="uk-position-relative text-white">{{$data->sub_title}}</div>
						</div>
					</div>
					@endif
					
					{!!$data->page_content!!}
					
					 <!--  -->
					 @if($doc->count()>0)
                 <div class="uk-grid-small uk-child-width-1-2@s uk-text-center uk-margin-medium-top" uk-grid>
                     @foreach($doc as $row)
                    <div>
                        <a class="uk-list-shine uk-cover-container uk-display-block uk-link-toggle "
                            tabindex="0" target="_blank"
                            href="{{ asset('uploads/doc/' . $row->document) }}">
                            @if($row->thumbnail)
                            <div class="uk-media-150"><img class="uk-image" alt="{{ $row->title }}"
                                    uk-img src="{{ asset('uploads/original/' . $row->thumbnail) }}">
                            </div>
                            @else
                            <div class="uk-media-150"><img class="uk-image" alt="{{ $row->title }}"
                                    uk-img src="{{ asset('themes-assets/images/blank.png') }}">
                            </div>
                            @endif
                            <div class="uk-overlay-primary uk-position-cover"></div>
                            <div class="uk-position-center">
                                <div class="uk-overlay">
                                    <h4 class="uk-margin-remove text-white uk-text-bold">
                                        {{ $row->title }}
                                    </h4>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                 
                    </div>
                @endif
            <!--  -->
					
					@if($details->count()>0)
					@foreach($details as $row)
					<p><strong><u>{{$row->ordering}}. {{$row->title}}</u></strong>
						<br/>{!!$row->content!!}</p>
					@endforeach
					@endif
					
				</div>
				@if($links->count()>0)
				<div class="uk-width-1-4@m uk-visible@m">
					<!--  -->
					<div class="uk-blog-sidebar " style="z-index: 9;" uk-sticky="offset: 100; bottom: #uk-stop-sticky">
						<h4 class="uk-heading-bullet">Related Links   </h4>
						<div>
							<ul class="uk-list uk-list-divider">
								@foreach($links as $row)
							<li> <a href="{{url('info/'.$row->uri)}}" class="{{$row->uri ==  Request::segment(2)?'uk-active':''}}"> {{$row->page_type}} </a> </li>
								@endforeach
							</ul>
						</div>
					</div>
					<!--  -->
				</div>
				@endif
			</div>
			<div id="uk-stop-sticky" class="uk-padding"></div>
		</div>
	</section>
	<!-- section  -->
@endsection