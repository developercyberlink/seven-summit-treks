 @if ($banners != null)
   <div class="swiper-container video-carousel">
  <div class="swiper-wrapper">
      @foreach($banners as $row)
      @if($row->video)
    <div class="swiper-slide" data-slide-type="vdo">
      <div class="hero-items">
        <video id="my-player" class="video-js" src="{{asset('uploads/videos/'.$row->video)}}" muted="muted" preload="auto" ></video>
        <div class="uk-position-cover uk-hero-banner-content uk-flex uk-flex-middle uk-container uk-position-z-index">
          <div class="uk-width-xlarge uk-text-left uk-margin-large-top">
            <h1 class="uk-text-bolder text-primary uk-margin-remove" data-swiper-parallax="-300"> {{ $row->title }}  </h1>
            <p class="uk-h4 text-white uk-margin-small"  data-swiper-parallax="-200">
                {{ $row->content }}
            </p>
             @if($row->caption)
            <a href="{{ $row->link }}" class="uk-padding-remove-left uk-padding-remove-bottom uk-flex-middle uk-button-home uk-button-home-white uk-flex uk-flex-middle" data-swiper-parallax="-100">
              <span class="uk-icon bg-primary">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
              </span> {{$row->caption}} </a>
              @endif
              
              
          </div>
        </div>
        <div class="uk-overlay-primary uk-position-cover"></div>
      </div>
    </div>
      @elseif($row->picture)
    <div class="swiper-slide" data-slide-type="img">
      <div class="hero-items">
        <img src="{{ asset('uploads/banners/' . $row->picture) }}" alt="">
        <div class="uk-position-cover uk-hero-banner-content uk-flex uk-flex-middle uk-container uk-position-z-index">
          <div class="uk-width-xlarge uk-text-left uk-margin-large-top">
            <h1 class="uk-text-bolder text-primary uk-margin-remove"  data-swiper-parallax="-300" data-swiper-parallax-opacity="0.5"> {{ $row->title }}  </h1>
            <p class="uk-h4 text-white uk-margin-small"  data-swiper-parallax="-200" data-swiper-parallax-opacity="0.5">
               {{ $row->content }}
                </p>
                 @if($row->caption)
            <a href="{{ $row->link }}" class="uk-padding-remove-left uk-padding-remove-bottom uk-flex-middle uk-button-home uk-button-home-white uk-flex uk-flex-middle" 
            data-swiper-parallax="-100">
              <span class="uk-icon bg-primary">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
              </span> {{$row->caption}}</a>
              @endif
          </div>
        </div>
        <div class="uk-overlay-primary uk-position-cover"></div>
      </div>
    </div>
    @endif
    @endforeach
  </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  <div class="swiper-pagination uk-light"></div>
</div>
   @endif


