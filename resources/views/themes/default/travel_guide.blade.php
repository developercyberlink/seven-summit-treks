@extends('themes.default.common.master')
{{--@section('post_title',$data->post_title)--}}
{{--@section('meta_keyword',$data->meta_keyword)--}}
{{--@section('meta_description',$data->meta_description)--}}
@section('content')<!-- trip video and image banner -->
<section class="uk-cover-container uk-position-relative uk-flex uk-flex-middle uk-background-norepeat uk-background-cover uk-background-top-center" uk-parallax="bgy: -100; easing: -2;  "style="background:url({{ asset('uploads/banners/' . $find->banner) }});">
    <!-- <div class="uk-position-relative" id="ytbg" data-ytbg-fade-in="true"  data-ytbg-mute-button="true"   data-youtube="https://www.youtube.com/watch?v=08VavSbp0YU"></div> -->
    <div class="uk-overlay-primary  uk-position-cover "></div>
    <div class="uk-hero-banner-content-inner uk-width-1-1 uk-position-z-index uk-margin-large-top">
        <div class="uk-container  uk-position-relative  uk-flex-middle uk-flex" uk-height-viewport="expand: true; min-height: 500;">
            <div class="uk-margin-large-bottom">
                <h3 class="text-primary uk-margin-small" uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 800; repeat: false;">
                    <a href="javascript:history.back()" class="text-white"><i class="fa fa-chevron-left" aria-hidden="true"></i> Go Back </a>
                </h3>
                <h1 class="uk-text-bolder text-white uk-margin-remove" uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 1200; repeat: false;">
                   {{$find->trip_title}} Travel Guide
                </h1> </div>
        </div>
    </div>
    </div>
</section>
<!-- end trip video and image banner -->
<!--  -->
<!-- section -->
<section class="uk-section bg-white uk-position-relative uk-wave-white-top" uk-scrollspy="cls: uk-animation-slide-left-small; target:div,  li, img, p, h1;  delay: 50; repeat: false;">
    <div class="uk-container">
        <div>
{{--            <h3 class="uk-text-bold">Things you Need to Know:</h3>--}}
{{--            <div uk-grid>--}}
{{--                <div class="uk-width-expand@m">--}}
{{--                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>--}}
{{--                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>--}}
{{--                </div>--}}
{{--                <div class="uk-width-1-3@m">--}}
{{--                    <div class="uk-media-350"> <img src="images/trip/17.jpg" class=" " alt=""> </div>--}}
{{--                </div>--}}
{{--            </div>--}}

            @foreach($guide as $value)
            <h4 class="uk-text-bold text-primary">{{$value->title}}</h4>
            <p>
                {!! $value->description !!}
            </p>
            @if($value->images->isNotEmpty())
            <div class="uk-grid-medium uk-child-width-1-3@s uk-margin-medium" uk-lightbox uk-grid>
                <!--  -->
                @foreach($value->images as $val)
                <div>
                    <div class="uk-position-relative uk-img-effect">
                        <a href="{{asset('uploads/travel-guide/'.$val->image)}}" data-caption="{{$val->ordering}}">
                            <div class="uk-media-350"> <img src="{{asset('uploads/travel-guide/'.$val->image)}}" class="uk-effect-1" alt=""> </div>
                            <h1 class="uk-h6 text-black uk-small-title uk-margin-small">{{$val->ordering}}</h1> </a>
                    </div>
                </div>
            @endforeach
                <!--  -->

            </div>
                @endif
            @endforeach

                <!--  -->

        </div>
    </div>
</section>
<!-- end section -->
<!--  -->
<!-- end section -->
@stop
