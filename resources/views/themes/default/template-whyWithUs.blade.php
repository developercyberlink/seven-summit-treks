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
    <section class="uk-section bg-light uk-position-relative uk-wave-grey-top">

        <div class="uk-container">
            <div class="uk-child-width-1-4@s uk-child-width-1-2 uk-text-center uk-grid-divider uk-grid-small" uk-grid>
                @include('themes.default.common.facts')
            </div>
        </div>

        </div>
    </section>

    <!-- end section -->
    <!-- section -->
    @if ($data_child->count() > 0)
        <section class="uk-section bg-white uk-position-relative uk-wave-white-top">
            <div class="uk-container">
                <div uk-lightbox>
                    <!--  -->
                    @foreach ($data_child as $key => $row)
                        <div class="uk-grid-collapse uk-flex-middle   uk-img-effect" uk-grid
                            uk-scrollspy="cls: uk-animation-slide-left-small; target:div, p;  delay: 100; repeat: false;">
                            @if ($loop->odd)
                                <div class="uk-width-1-3@m">
                                    <div class="uk-media-450 uk-border-rounded">
                                         @if($row->page_thumbnail)
                                  	<a href="{{ asset('uploads/medium/' . $row->page_thumbnail) }}"> <img src="{{ asset('uploads/medium/' . $row->page_thumbnail) }}" alt="" class="uk-effect-1"> </a>
                                            @else
                                     <img src="{{ asset('themes-assets/images/blank.png') }}"
                                            alt="{{ $row->post_title }}" class="uk-effect-1">
                                        @endif
                                    </div>
                                </div>
                            @endif
                            <div class="uk-width-expand@m">
                                <div class="uk-padding-large uk-text-justify">
                                    <div class="uk-count"> {{ $loop->iteration <= 9 ? '0' : '' }} {{ $loop->iteration }}
                                    </div>
                                    <div class="uk-margin-small-bottom">
                                        <h1 class="uk-h2 theme-font-medium-bold text-black"> {{ $row->post_title }} </h1>
                                    </div>
                                    {!! $row->post_content !!}
                                </div>
                            </div>
                            @if ($loop->even)
                                <div class="uk-width-1-3@m  uk-flex-first uk-flex-last@m">
                                    <div class="uk-media-450 uk-border-rounded">
                                         @if($row->page_thumbnail)
                                  	<a href="{{ asset('uploads/medium/' . $row->page_thumbnail) }}"> <img src="{{ asset('uploads/medium/' . $row->page_thumbnail) }}" alt="" class="uk-effect-1"> </a>
                                            @else
                                     <img src="{{ asset('themes-assets/images/blank.png') }}"
                                            alt="{{ $row->post_title }}" class="uk-effect-1">
                                        @endif
                                    </div>
                                </div>
                            @endif

                        </div>
                    @endforeach
                    <!--  -->
                    <!--  -->

                </div>
            </div>
        </section>
    @endif
    <!-- end section -->


@endsection
