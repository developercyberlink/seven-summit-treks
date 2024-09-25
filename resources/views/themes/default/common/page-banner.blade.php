@if ($data)
<section class="uk-cover-container uk-position-relative uk-flex uk-flex-middle uk-background-norepeat uk-background-cover uk-background-top-center uk-position-relative "
uk-parallax="bgy: -100; easing: -2;" @if ($data['page_banner']) data-src="{{ asset('uploads/banners/'. $data->page_banner) }}" @endif
uk-height-viewport="expand: true; min-height: 700;" uk-img>  
<div class="uk-overlay-primary  uk-position-cover "></div>
<div class="uk-hero-banner-content uk-width-1-1 uk-position-z-index uk-margin-large-top">
    <div class="uk-container ">
        <h3 class="uk-text-bolder text-white uk-margin-remove"
            uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 800; repeat: false;">
            {{ $data->sub_title }}
        </h3>
        <h1 class="uk-text-bolder text-primary uk-margin-remove"
            uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 1200; repeat: false;">
            {{ $data->post_title }}
        </h1>
        <div class="uk-width-1-2@m uk-margin-top text-white uk-text-lead"
            uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 1600; repeat: false;">
                {!! $data->associated_title !!}
        </div>
    </div>
</div>
</section>        
@endif