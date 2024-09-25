</main>
<footer>
    @if ($partners->count() > 0)
        <section
            class="bg-black uk-position-relative uk-wave-black-top  uk-box-shadow-medium uk-section-small  uk-position-relative">
            <div class="uk-container  uk-position-relative">
                <h1 class="text-white uk-h4 uk-margin-small">Partners</h1>
                <div uk-slider="sets: false; autoplay: true; autoplay-interval: 4000; finite: false;">
                    <div class="uk-position-relative uk-visible-toggle " tabindex="-1">
                        <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-4@s uk-child-width-1-5@m uk-grid-small"
                            uk-grid>
                            <!--  -->
                            @foreach ($partners as $row)
                                <li>
                                    <div class="partners-logo-list bg-white uk-border-rounded uk-img-effect">
                                        @if($row->external_link && $row->page_thumbnail)
                                        <a href="{{ $row->external_link }}" target="_blank">
                                        <img src="{{ asset('uploads/medium/' . $row->page_thumbnail) }}" class="uk-effect-1" alt="{{ $row->post_title }}" >
                                        </a>
                                        @elseif($row->page_thumbnail)
                                        <img src="{{ asset('uploads/medium/' . $row->page_thumbnail) }}" class="uk-effect-1" alt="{{ $row->post_title }}">
                                        @else
                                          <img src="{{ asset('themes-assets/images/blank.png') }}" class="uk-effect-1" alt="{{ $row->post_title }}">
                                        @endif
                                    </div>
                                </li>
                            @endforeach
                            <!--  -->
                        </ul>
                        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#"
                            uk-slidenav-previous uk-slider-item="previous"></a>
                        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next
                            uk-slider-item="next"></a>
                    </div>

                </div>
                <!--  -->
                <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1"
                    uk-slider="sets: true; autoplay: true; finite: true;">
                    <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-5@m uk-grid">
                    </ul>
                </div>
            </div>
        </section>
    @endif

    <!--  -->
    <!--  -->
    <section class="bg-black uk-section  footer-border uk-footer-14-peak uk-position-relative">
        <div class="uk-container">
            <div class="uk-margin-remove-bottom tm-grid-expand uk-grid-large uk-margin-xlarge uk-grid" uk-grid=""
                uk-scrollspy="cls: uk-animation-slide-left-small; target:div,  li, img, p, h1;  delay: 50; repeat: false;">
                @if ($footer->count(0 > 0))
                    <div class="uk-width-1-2@s  uk-width-1-2  uk-width-expand@m">
                        <h1 class="uk-h4 text-white uk-text-bold  uk-scrollspy-inview uk-animation-slide-left-small"
                            uk-scrollspy-class="">
                            About Us
                        </h1>
                        <ul class="uk-list  uk-scrollspy-inview uk-animation-slide-left-small" uk-scrollspy-class="">
                            @foreach ($footer as $row)
                                <li> <a href="{{ url(geturl($row->uri)) }}"> {{ $row->post_title }} </a> </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if ($regions->count() > 0)
                    <div class="uk-width-1-2@s  uk-width-1-2 uk-width-expand@m">
                        <h1 class="uk-h4  text-white uk-text-bold  uk-scrollspy-inview uk-animation-slide-left-small"
                            uk-scrollspy-class="">Trekking</h1>
                        <ul class="uk-list  uk-scrollspy-inview uk-animation-slide-left-small" uk-scrollspy-class="">
                            @foreach ($regions as $row)
                                <li> <a href="{{ url(regionurl($row->uri)) }}">{{ $row->title }}</a> </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if ($expeditions->count() > 0)
                    <div class="uk-width-1-2@s uk-width-1-2 uk-width-expand@m">
                        <h1 class="uk-h4  text-white uk-text-bold  uk-scrollspy-inview uk-animation-slide-left-small"
                            uk-scrollspy-class="">Expeditions </h1>
                        <ul class="uk-list  uk-scrollspy-inview uk-animation-slide-left-small" uk-scrollspy-class="">
                            @foreach ($expeditions as $row)
                                <li><a href="{{ url(expeditionurl($row->uri)) }}"> {{ $row->title }} </a></li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="uk-width-1-3@s">
                    <h1 class="uk-h4  text-white uk-text-bold  uk-scrollspy-inview uk-animation-slide-left-small"
                        uk-scrollspy-class=""> {{ $setting->site_name }} </h1>
                    <ul class="uk-list text-white">

                        <li>
                            <div class="uk-flex uk-flex-middle">
                                <div> <span class="uk-icon-button bg-primary  text-black uk-margin-small-right"
                                        uk-icon="icon: location;"></span> </div>
                                <div><a href="{{$setting->google_map}}" target="_blank">{{ $setting->address }}</a></div>
                            </div>
                        </li>
                        <li>
                            <div class="uk-flex uk-flex-middle">
                                <div> <span class="uk-icon-button bg-primary text-black uk-margin-small-right"
                                        uk-icon="icon: receiver;"></span> </div>
                                <div><a href="tel:{{ $setting->phone }}">{{ $setting->phone }}</a></div>
                            </div>
                        </li>
                        <li>
                            <div class="uk-flex uk-flex-middle">
                                <div> <span class="uk-icon-button bg-primary text-black uk-margin-small-right"
                                        uk-icon="icon: mail;"></span> </div>
                                <div><a
                                        href="mailto:{{ $setting->email_primary }}">{{ $setting->email_primary }}</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                        <!--                <div class="uk-margin-small">-->
                        <!--<h5 class="uk-h4  text-white uk-text-bold  uk-scrollspy-inview uk-animation-slide-left-small">-->
                        <!--    Subscribe our newsletter</h5>-->
                        <!--       @if(session('status'))-->
                        <!--       <div class="alert alert-success alert-dismissible subscribe">-->
                        <!--          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>-->
                        <!--    {{session('status')}}-->
                        <!--    </div>-->
                        <!--@endif-->
<!--                        <form class="subscribe" id="subscribe_newsletter">-->
                            
<!--{{--                            <input type="hidden" id="g_recaptcha_response" name="g_recaptcha_response"/>--}}-->


<!--                            <div class="uk-grid-collapse   uk-grid" uk-grid="">-->
<!--                                <div class="uk-width-expand@s uk-first-column">-->

<!--                                    <div class="uk-search uk-search-default uk-width-1-1">-->
<!--                                        <input class="uk-input" type="email" name="email" placeholder="Enter email"-->
<!--                                               required>-->
<!--                                    </div>-->
<!--                                    {{-- <input type="hidden" name="task" value="search">--}}-->

<!--                                </div>-->
<!--                                <div class="uk-width-auto@s">-->
<!--                                    <button class="uk-button uk-button-primary uk-width-1-1" type="submit" title="Search">Submit-->
<!--                                    </button>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </form>-->
                    <!--</div>-->

                    <p class="uk-text-small text-white">{!! $setting->copyright_text !!}
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!--  -->
    <!--  -->
    <section class="bg-black   uk-position-relative  uk-section-small footer-border uk-bottom-footer">
        <div class="uk-container">
            <div class="" uk-grid
                uk-scrollspy="cls: uk-animation-slide-left-small; target:div, li, img;  delay: 100; repeat: false;">
                @if ($footers->count() > 0)
                    <div class="uk-width-expand@m">
                        <ul class="uk-grid uk-text-small" uk-grid>
                            @foreach ($footers as $row)
                            @if($row->external_link)
                                <li><a href="{{ $row->external_link }}">{{ $row->post_title }}</a></li>
                                @else
                              <li><a href="{{ url(geturl($row->uri)) }}">{{ $row->post_title }}</a></li>
                              @endif
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="uk-width-auto@m">
                    <div class="uk-child-width-auto uk-flex-left@s uk-flex-center" uk-grid>

                        @if ($setting->facebook_link)
                            <div>
                                <a class="uk-link uk-icon-button bg-primary text-black" rel="noreferrer"
                                    href="{{ $setting->facebook_link }}" uk-icon="icon: facebook;" target="_blank"></a>
                            </div>
                        @endif
                        @if ($setting->youtube_link)
                            <div>
                                <a class="uk-link uk-icon-button bg-primary text-black" rel="noreferrer"
                                    href="{{ $setting->youtube_link }}" uk-icon="icon: youtube;" target="_blank"></a>
                            </div>
                        @endif
                        @if ($setting->twitter_link)
                            <div>
                                <a class="uk-link uk-icon-button bg-primary text-black" rel="noreferrer"
                                    href="{{ $setting->twitter_link }}"   target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 50 50"><path d="M 5.9199219 6 L 20.582031 27.375 L 6.2304688 44 L 9.4101562 44 L 21.986328 29.421875 L 31.986328 44 L 44 44 L 28.681641 21.669922 L 42.199219 6 L 39.029297 6 L 27.275391 19.617188 L 17.933594 6 L 5.9199219 6 z M 9.7167969 8 L 16.880859 8 L 40.203125 42 L 33.039062 42 L 9.7167969 8 z"></path></svg>
                                </a>
                            </div>
                        @endif
                        @if ($setting->google_plus)
                            <div>
                                <a class="uk-link uk-icon-button bg-primary text-black" rel="noreferrer"
                                    href="{{ $setting->google_plus }}" uk-icon="icon: instagram;" target="_blank"></a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  -->
</footer>
<!-- back to top -->
<a href="#" id="BackToTop"  uk-scroll>
   <img src="{{asset('themes-assets/images/backtotop.svg')}}" alt="{{ $setting->site_name }}" />
</a>
<script src="{{ asset('themes-assets/js/app.js') }}"></script>
<script src="{{ asset('themes-assets/js/captcha.js') }}"></script>
<script src="{{ asset('themes-assets/js/query-youtube.js') }}"></script>
@yield('scripts')

<!-- grading -->
<div id="grading" class="uk-modal-container" uk-modal>
    <div class="uk-modal-dialog">
        <button class="uk-modal-close-full uk-close-large" type="button" uk-close></button>
        <div class="uk-modal-header">
            <h3 class="text-primary uk-margin-remove uk-text-bold">Grading</h3>
            <span class="uk-margin-small-top uk-text-medium">Below the different grades shown in the chart are explained
                in more detail.</span>
        </div>
        <div class="uk-modal-body" uk-overflow-auto>
            <div class="uk-grid uk-grid-divider uk-child-width-1-1@m" uk-grid>
                <!--  -->
                <div>
                    <h4 class="text-secondary  uk-text-bold">For Expeditions</h4>
                    <ol>
                        <li><strong>Easy (E): </strong>Climb requires one-day climbs, or a multiday climbs with
                            non-technical elements.</li>
                        <li><strong>Moderate (M):</strong> Either a serious one-day climbs, or a multiday climbs with
                            some technical elements. Requires an average level of physical fitness.</li>
                        <li><strong>Difficult (D):</strong> Multiday climbs with some moderately technical elements.
                            Requires an above average fitness level and high level of stamina.</li>
                        <li><strong>Hard Difficult (HD):</strong> Multiday, Highly technical climb. Requires high level
                            of physical fitness and stamina.</li>
                        <li><strong>Very Difficult (VD):</strong> Multiday, Extremely technical climb. Requires very
                            high level of Physical fitness and stamina.</li>
                    </ol>
                </div>
                <!--  -->
              
            </div>
        </div>
    </div>
</div>

<div id="grading_trek" class="uk-modal-container" uk-modal>
    <div class="uk-modal-dialog">
        <button class="uk-modal-close-full uk-close-large" type="button" uk-close></button>
        <div class="uk-modal-header">
            <h3 class="text-primary uk-margin-remove uk-text-bold">Grading</h3>
            <span class="uk-margin-small-top uk-text-medium">Below the different grades shown in the chart are explained
                in more detail.</span>
        </div>
        <div class="uk-modal-body" uk-overflow-auto>
            <div class="uk-grid uk-grid-divider uk-child-width-1-1@m" uk-grid>

                <div>
                    <h4 class="text-secondary uk-text-bold">For Trekking </h4>
                    <ol>
                        <li><strong>Light:</strong> Light walking and generally level hiking that is good for most
                            fitness levels. During these trips, hill-walking experience is desirable.</li>
                        <li><strong>Moderate:</strong> Trek has various types of moderate to difficult terrain,
                            including rough trails and normally 3 to 5 hours a day. Requires an average to above average
                            fitness level.</li>
                        <li><strong>Moderate+</strong>: High altitude treks above 3000 meters or in fairly difficult
                            terrain- normally 4 to 6 hours a day. Requires an above average fitness level and high level
                            of stamina.</li>
                        <li><strong>Extreme:</strong> These high altitude treks or passes are known to be the most
                            strenuous and has difficult terrain and conditions. These treks may require a degree of
                            mountaineering skills and you capability of carrying on normally at an altitude of 4000-5600
                            meters. Daily walking is 5-8 hours approx.</li>
                    </ol>
                </div>
                <!--  -->
            </div>
        </div>
    </div>
</div>
<!-- end grading -->

@if($freviews->count()>0)
<!-- review details -->
@foreach($freviews as $row)
<div id="ReviewDetails{{$loop->iteration}}" class="uk-modal" uk-modal>
        <div class="uk-modal-dialog uk-bg-pattern-primary">
            <div class="uk-text-center  uk-padding-remove uk-box-shadow-small">
                <button class="uk-modal-close-default" type="button" uk-close></button>
                <div class="uk-text-center uk-padding-small">
                    <div class="uk-member-img"> 
                     @if($row->image)
                    <img src="{{ asset('images/reviews/'.$row->image) }}" alt="" class="uk-border-circle">
                        @else
                    <img src="{{ asset('themes-assets/images/users.jpg') }}" alt="" class="uk-border-circle">
                    @endif 
                     </div>
               <h1 class="uk-h4 uk-margin-remove theme-font-extra-bold">
                       {{$row->name}}
                  </h1>
                  <h1 class="text-primary uk-margin-remove theme-font-medium uk-h4">
                     {{$row->country}} 
                  </h1>
            </div>
                 
            </div>
            <div class="uk-modal-body " uk-overflow-auto>           
                {!!$row->review!!} 
            </div>
            <div class="uk-padding-small"></div>
        </div>
    </div>
    @endforeach
    <!-- end review details -->
    @endif
<script type ="text/javascript">
    //subscription//
   $(document).ready(function () {
        $('#subscribe_newsletter').on('submit', function (e) {
            
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        let myform = document.getElementById('subscribe_newsletter');
        let formData = new FormData(myform);
        $.ajax({
            type: 'POST',
            url: '{{route('subscribe')}}',
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                jQuery.each(data.errors, function (key, value) {
                    toastr.error(value);
                    // hideLoading();
                });
                if (data.status == 'success') {
                   $('.product_filter_result').replaceWith($('.product_filter_result')).html(data.html);
                    toastr.success(data.message);
               
                }
            },
            error: function (a) {
                // hideLoading();
                alert("An error occured while uploading data.\n error code : " + a.statusText);
            }
        });
    });
   }); 
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
   @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
    @endif
  @if(Session::has('message'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.success("{{ session('message') }}");
  @endif

  @if(Session::has('error'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.error("{{ session('error') }}");
  @endif
</script>
<script type="text/javascript">
    $('#add_trip_review').on('click', function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();

        let myform = document.getElementById('form_review');
        let formData = new FormData(myform);

        $.ajax({
            type: 'POST',
            url: '{{route('add-review')}}',
            data: formData,
            contentType: false,
            cache: false,
            processData: false,

            success: function (data) {
                jQuery.each(data.errors, function (key, value) {
                    toastr.error(value);
                    // hideLoading();

                });

                if (data.status == 'success') {
                    document.getElementById("form_review"). reset();
                    toastr.success(data.message);
                    location.reload();
                }
            },
            error: function (a) {
                // hideLoading();
                alert("An error occured while uploading data.\n error code : " + a.statusText);
            }
        });
    });
</script>
</body>
</html>