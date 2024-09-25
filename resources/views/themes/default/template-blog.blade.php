@extends('themes.default.common.master')
@section('title', $data->post_title)
@section('brief', $data->post_excerpt)
@section('thumbnail', $data->page_thumbnail)
@section('meta_keyword', $data->meta_keyword)
@section('meta_description', $data->meta_description)
@section('content')
    <!-- banner -->
    <section class="uk-cover-container  uk-position-relative uk-flex uk-flex-middle  uk-background-norepeat uk-background-cover uk-background-top-center"
        uk-parallax="bgy: -100; easing: -2;" data-src="{{ asset('uploads/banners/' . $data->page_banner) }}"
        uk-height-viewport="expand: true; min-height: 500;" uk-img>
        <div class="uk-overlay-primary  uk-position-cover "></div>
        <div class="uk-width-1-1 uk-position-z-index uk-margin-large-top">
            <div class="uk-width-1-1 uk-position-relative" style="z-index: 99;">
                <div class="uk-container    uk-position-relative"
                    uk-scrollspy="cls: uk-animation-fade;  delay: 500; repeat: false">
                    <div class=" uk-margin-medium uk-width-large">
                    <h1 class=" uk-text-bolder text-white uk-margin-small" uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 400; repeat: false;">  {{ $data->post_title }}</h1>
                       <div class="text-white uk-h5 uk-margin-top uk-margin-remove-bottom"> {{ $data->sub_title }}</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end banner -->
    <!--  section-->
    <section class="uk-section bg-white uk-position-relative uk-wave-white-top">
        <div class="uk-container uk-position-relative">
            <!--  -->
            <div class="uk-grid-medium" uk-grid
                uk-scrollspy="cls: uk-animation-slide-left-small; target:.uk-article;  delay: 300; repeat: false;">
                 @if ($latest_blog_post)
                    <div class="uk-position-relative uk-width-1-1">
                        <a class="uk-article uk-inline-clip uk-link-toggle uk-width-1-1" href="{{ url(geturl($latest_blog_post->uri)) }}">
                            <div class="uk-overlay-primary  uk-position-cover"></div>
                            <div class="uk-media-500"> 
                            @if($latest_blog_post->page_thumbnail)
                            <img class="uk-image" uk-img="" alt="{{ $latest_blog_post->post_title }}"
                                    src="{{ asset('uploads/original/' . $latest_blog_post->page_thumbnail) }}"> 
                            @else
                              <img class="uk-image" uk-img="" alt="{{ $latest_blog_post->post_title }}"
                                    src="{{ asset('themes-assets/images/blank.png') }}">
                                @endif
                            </div>
                            <div class="uk-position-center uk-padding">
                                <div class="uk-text-left uk-position-z-index">
                                    <div class="uk-width-1-2@m text-white">
                                        <div class="text-white uk-h5 uk-margin-top uk-margin-remove-bottom">
                                            {{ dateformat($latest_blog_post->post_date) }}
                                        </div>
                                        <h2
                                            class="text-white  theme-font-medium-bold uk-margin-small-top uk-margin-small-bottom ">
                                            {{ $latest_blog_post->post_title }}
                                        </h2>
                                        {!! $latest_blog_post->post_excerpt !!}
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif 
                </div>
                <!--  -->
              
				  <div class=" uk-child-width-1-2@s uk-child-width-1-3@m  uk-grid-medium uk-grid" uk-grid=""
                    uk-scrollspy="cls: uk-animation-slide-left-small; target:.uk-article;  delay: 300; repeat: false;">
                    <!--  -->
                    @if ($blogs->count() > 0)
                        @foreach ($blogs->slice(1,12) as $row)
                            <div>
                                <article class="uk-article uk-img-effect">
                                    <div class="uk-margin-small-bottom" property="image">
                                        <a href="{{ url(geturl($row->uri)) }}">
                                            <div class="uk-media-200 uk-animated-after"> 
                                            @if($row->page_thumbnail)
                                            <img uk-img="" alt="{{ $row->post_title }}" src="{{ asset('uploads/original/' . $row->page_thumbnail) }}"
                                                    class="uk-effect-1"> 
                                                    @else
                                            <img uk-img="" alt="{{ $row->post_title }}" src="{{ asset('themes-assets/images/blank.png') }}"
                                                    class="uk-effect-1"> 
                                            @endif
                                            </div>
                                        </a>
                                    </div>
                                    <div class="uk-meta uk-text-meta uk-margin-small">{{ dateformat($row->post_date) }}
                                    </div>
                                    <h4 class="uk-margin-remove">
                                        <a class="" href="{{ url(geturl($row->uri)) }}">
                                            {{ $row->post_title }}
                                        </a>
                                    </h4>
                                </article>
                            </div>
                        @endforeach
                    @endif
                    <!--  -->
                </div>
                <!--  -->
                {{ $blogs->links('themes.default.common.paginate') }}

            </div>
    </section>
    <!-- section -->


@endsection
