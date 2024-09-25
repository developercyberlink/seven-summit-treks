@extends('themes.default.common.master')
@section('title', $data->post_title)
@section('brief', $data->post_excerpt)
@section('thumbnail', $data->page_thumbnail)
@section('meta_keyword', $data->meta_keyword)
@section('meta_description', $data->meta_description)
@section('content')
    <div class="uk-history-fixed">
        <ul class="uk-history uk-history-dots">
                @if ($data_child->count() > 0)
                @foreach ($data_child as $row)
                    @if ($loop->iteration == 1)
                        <li><a href="#id1">History </a></li>
                        @else
                        <li><a href="#id{{ $loop->iteration }}"> {{ $row->post_title }} </a></li>
                    @endif                 
                @endforeach
                @endif
        </ul>
    </div>
    <!-- section -->
    @include('themes.default.common.page-banner')
    <!-- end section -->
    <!-- section -->
     @if ($data_child->count() > 0)

        @foreach ($data_child as $row)
            <section id="id{{ $loop->iteration }}" class="uk-background-fixed   uk-position-relative uk-flex uk-flex-middle uk-background-norepeat uk-background-cover uk-background-top-center 
                                           " data-src="{{ asset('uploads/banners/'.$row['page_banner']) }}" uk-img>
                <div class="uk-overlay-history  uk-position-cover "></div>
                <div class="uk-hero-banner-content uk-width-1-1 uk-position-z-index   uk-position-relative">
                    <div class="uk-container uk-flex-middle uk-flex" uk-height-viewport>
                        <div class="uk-section">
                            <!--  -->
                            <div class="uk-grid  text-white uk-flex-middle uk-img-effect" uk-grid
                                uk-scrollspy="cls: uk-animation-slide-left-small; target:div, p;  delay: 100; repeat: false;">

                                @if ($loop->odd)
                                    <div class="uk-width-1-3@m " uk-lightbox>
                                        <div class="uk-media-450 uk-border-rounded">
                                            @if($row->page_thumbnail)
                                            <a href="{{ asset('uploads/medium/' . $row->page_thumbnail) }}"> 
                                            <img src="{{ asset('uploads/medium/' . $row->page_thumbnail) }}"
                                                    alt="{{ $row->post_title }}" class="uk-effect-1"> </a>
                                                    @else
                                             <img src="{{ asset('themes-assets/images/blank.png') }}"
                                                    alt="{{ $row->post_title }}" class="uk-effect-1">
                                                @endif
                                        </div>
                                    </div>
                                @endif

                                <div class="uk-width-expand@m">
                                    <div class="">
                                        <div class="uk-margin-small-bottom">
                                            <h1 class="uk-margin-remove theme-font-extra-bold  text-primary">
                                                {{ $row->post_title }}</h1>
                                        </div>
                                        <p>{!! $row->post_excerpt !!}</p>
                                        <div class="uk-margin">
                                            <a href="{{ route('page.pagedetail_child',['parenturi'=>$data->uri,'uri'=>$row->uri]) }}" class="uk-button uk-button-white">
                                                Learn
                                                More
                                                <span class="uk-icon " uk-icon="icon:arrow-right; ratio: 1.5"
                                                    uk-scrollspy="cls: uk-animation-slide-right; delay: 400; repeat: false;"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                @if ($loop->even)
                                    <div class="uk-width-1-3@m  uk-flex-first uk-flex-last@m" uk-lightbox>
                                        <div class="uk-media-450 uk-border-rounded">
                                           @if($row->page_thumbnail)
                                            <a href="{{ asset('uploads/medium/' . $row->page_thumbnail) }}"> 
                                            <img src="{{ asset('uploads/medium/' . $row->page_thumbnail) }}"
                                                    alt="{{ $row->post_title }}" class="uk-effect-1"> </a>
                                                    @else
                                             <img src="{{ asset('themes-assets/images/blank.png') }}"
                                                    alt="{{ $row->post_title }}" class="uk-effect-1">
                                                @endif
                                        </div>
                                    </div>
                                @endif

                            </div>
                            <!--  -->
                        </div>
                    </div>
                </div>
            </section>
        @endforeach
    @endif
    <!-- end section -->

    <div id="uk-stop-sticky"></div>

@endsection
