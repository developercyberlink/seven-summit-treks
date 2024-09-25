@extends('themes.default.common.master')
@section('post_title', $data->post_title)
@section('meta_keyword', $data->meta_keyword)
@section('meta_description', $data->meta_description)
@section('content')
    <!-- banner -->
    <section class="uk-cover-container  uk-position-relative   uk-flex uk-flex-middle  uk-background-norepeat uk-background-cover uk-background-top-center"
        uk-parallax="bgy: -100; easing: -2;  " data-src="{{ asset('uploads/banners/' . $data->banner) }}"
        uk-height-viewport="expand: true; min-height: 500;" uk-img>
        <div class="uk-overlay-primary  uk-position-cover "></div>
        <div class="uk-width-1-1 uk-position-z-index uk-margin-large-top">
            <div class="uk-width-1-1 uk-position-relative" style="z-index: 99;">
                <div class="uk-container    uk-position-relative"
                    uk-scrollspy="cls: uk-animation-fade;  delay: 500; repeat: false">
                    <div class=" uk-margin-medium uk-width-large">
                        <h1 class="theme-font-extra-bold text-white uk-margin-small" uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 400; repeat: false;">
                            <span class="uk-text-bold">Trip Booking</span> </h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end banner -->
            @include('themes.default.common.flash-message')

    <!-- section -->
    <section class="uk-section bg-white">
        <div class=" uk-container">
            <div class="uk-grid" uk-grid>
                <div class="uk-width-expand@m">
                     <div class="uk-booking bg-white uk-border-rounded uk-card uk-card-default  uk-overflow-hidden">
                        <div class="uk-booking-header bg-primary">
                            <div class="uk-grid uk-flex uk-flex-middle uk-grid-small" uk-grid>
                                <div class="uk-width-1-5@m  " uk-visible@m>
                                    <div class="uk-media-selected-trip"><img class="uk-image" id="image_src" alt="" uk-img="" src="{{ asset('uploads/original/' . $data->thumbnail) }}"> </div>
                                </div>
                                <div class="uk-width-expand@m">
                                    <h1 class="uk-h3 uk-margin-remove text-white  main-title-font">{{$data->trip_title}}
                                    </h1><div class="uk-selected-brief text-white" id="desc">{{$data->sub_title}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="uk-booking-body">
                    <form method="post" action="{{ route('post-trip') }}">
                         {!! csrf_field() !!}
                        <input type="hidden" name="type" value="1">
                            <input type="hidden" id="g_recaptcha_response" name="g_recaptcha_response">
                       <div class="uk-grid-medium" uk-grid>
                                 <div class="uk-width-1-1">
                                <h4 class="uk-text-bold  text-primary uk-heading-bullet uk-margin-remove ">
                                    Personal Detail
                                </h4>
                                </div>
                                <div class="uk-width-1-1">
                                    <div class="uk-width-small">
                                        <label class="uk-margin-small uk-display-block">Title</label>
                                        <select name="title" class="uk-select">
                                            <option value="" selected="selected">Select Title</option>
                                            <option value="Mr.">Mr.</option>
                                            <option value="Ms.">Ms.</option>
                                            <option value="Mrs.">Mrs.</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>
                                  
                                  
                                <div class="uk-width-1-2@s">
                                    <label class="uk-margin-small uk-display-block">Full Name <span
                                            class="text-red">*</span></label>
                                    <input class="uk-input" name="full_name" type="text" placeholder="">
                                </div>
                                  
                                  
                                <div class="uk-width-1-2@s">
                                    <label class="uk-margin-small uk-display-block">Email Address <span
                                            class="text-red">*</span></label>
                                    <input class="uk-input" name="email" type="email" placeholder="">
                                </div>
                                  
                                  
                                <div class="uk-width-1-2@s">
                                    <label class="uk-margin-small uk-display-block">Contact Number</label>
                                    <input class="uk-input" name="contact" type="text" placeholder="">
                                    <small>Eg: (Country Code + City Code + Phone Number)</small>
                                </div>
                                  
                                  
                                <div class="uk-width-1-2@s">
                                    <label class="uk-margin-small uk-display-block">Country<span class="text-red">*</span></label>
                                    <select name="country" class="uk-select  uk-select-search" required>
                                        <option>Select Nationality </option>
            	                       @foreach($country as $row)
                                      <option value="{{$row->country}}">{{$row->country}}</option>
                                       @endforeach
                                    </select>
                                </div>

                                  

                                  
                                <div class="uk-width-1-1">
                                    <div class="tab-wrapper">
                                        <ul class="font-size-small uk-tab-booking uk-tab" data-uk-tab="{connect:'#hometab'}"
                                            uk-scrollspy="cls: uk-animation-slide-left-small; target:a;  delay: 100; repeat: false">

                                            @if ($data->expeditions->isNotEmpty())
                                                {{-- @if ($data->expeditions->first()->pivot->trip_id == $data->id) --}}
                                                <li class="uk-active"><a href="" class="theme-font-extra-bold"
                                                        aria-expanded="true">Expedition</a></li>
                                            @else

                                                {{-- <li class="uk-active" style="display:none;"><a href="" class="theme-font-extra-bold" aria-expanded="true" >Expedition</a></li> --}}
                                                <li class=""><a href="" class="theme-font-extra-bold">Trekking</a></li>

                                            @endif

                                        </ul>
                                        <ul id="home-tab" class="uk-switcher">
                                              
                                            @if ($data->expeditions->isNotEmpty())

                                                <li class="uk-active">
                                                    <div>
                                                        <label class="uk-margin-small uk-display-block">Expedition <span
                                                                class="text-red">*</span></label>
                                                        <select name="expedition_id" id="tour_name" class="uk-select">
                                                            <option @if ($data->expeditions->first()->pivot->trip_id == $data->id)  @endif selected
                                                                value="{{ $data->id }}">{{ $data->trip_title }}
                                                            </option>
                                                        </select>
                                                    </div>
                                                </li>
                                                  
                                                  
                                            @else
                                                <li class="">
                                                    <div>
                                                        <label class="uk-margin-small uk-display-block">Trip Name <span
                                                                class="text-red">*</span></label>
                                                        <select name="trip_id" id="tour_name" class="uk-select">
                                                            <option value="{{ $data->id }}" selected>
                                                                {{ $data->trip_title }}</option>
                                                        </select>
                                                    </div>
                                                </li>
                                            @endif

                                              

                                        </ul>
                                    </div>
                                </div>
                                  
                                  
                                <div class="uk-width-1-2@s">
                                    <label class="uk-margin-small uk-display-block">Arrival Date</label>
                                    <input class="uk-input" name="arrival_date" value="{{ $arrival }}" readonly
                                        placeholder="">
                                </div>
                                  
                                  
                                <div class="uk-width-1-2@s">
                                    <label class="uk-margin-small uk-display-block">Final Depature Date</label>
                                    <input class="uk-input" name="departure_date" value="{{ $departure }}" readonly
                                        placeholder="">
                                </div>
                                  
                                  
                                <div class="uk-width-1-1@s">
                                    <label class="uk-margin-small uk-display-block">How do you find us?</label>
                                    <select name="reference" class="uk-select">
                                        <option value=""> - Select - </option>
                                        <option value="Client Referral">Client Referral</option>
                                        <option value="By Web Search">By Web Search</option>
                                    </select>
                                </div>
                                  
                              
                                <div class="uk-width-1-1">
                                    <h4 class="uk-title uk-heading-bullet uk-margin-remove ">
                                        Special Requirement
                                    </h4>
                                </div>
                                
                                  
                                <div class="uk-width-1-1@s">
                                    <label class="uk-margin-small uk-display-block">Let us know all your inquiries and we
                                        will get back to you shortly</label>
                                    <textarea name="comments" class="uk-textarea" rows="5" placeholder=""></textarea>
                                </div>
                                  
                                  
                    
                                
                                <div class="uk-width-1-1@s">
                                    <label>
                                        <input name="terms" class="uk-checkbox uk-margin-small-right" value="1" type="checkbox" required> I accept terms and Conditions 
                                        <a href="{{route('info.list','terms-and-conditions')}}" target="_blank"><i class="fa fa-question-circle text-primary" aria-hidden="true"></i></a></label>
                                </div>
                            </div>
                        
                       <div class="uk-booking-footer">
                        <div class="uk-flex uk-flex-middle uk-flex-between">
                            <div>
                            <button type="submit" class="uk-button uk-button-primary uk-border-pill">Submit</button>
                                <div class="uk-text-small">
                                    <i><span class="text-red">*</span> All Fields Required</i>
                                </div>
                            </div>
                          <div>
                            <button class="uk-button uk-button-danger  uk-border-pill" type="reset">Reset</button>
                         </div>
                        </div>
                    </div>
                      
                    </form>
                </div>
                    </div>
                </div>
                <!-- sidebar -->
                @include('themes.default.common.booking-sidebar')
                <!-- sidebar end -->
            </div>
        </div>
        <div id="uk-stop-sticky" class="uk-clearfix"></div>
    </section>
    <!-- end section -->
@stop
@section('scripts')
    <script src="https://www.google.com/recaptcha/api.js?render={{env('SITE_KEY')}}"></script>
    <script>
        grecaptcha.ready(function () {
            grecaptcha.execute('<?php echo env("SITE_KEY"); ?>', {action: 'homepage'}).then(function (token) {
                document.getElementById('g_recaptcha_response').value = token;
            });
        });
    </script>
@endsection
