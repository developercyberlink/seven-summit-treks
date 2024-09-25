@extends('themes.default.common.master')
@section('title', $trip->trip_title)
@section('brief', $trip->trip_excerpt)
@section('thumbnail', $trip->thumbnail)
@section('meta_keyword', $trip->meta_key)
@section('meta_description', $trip->meta_description)
@section('content')
    <!-- banner -->
    @if($trip->banner)
    <section class="uk-cover-container  uk-position-relative   uk-flex uk-flex-middle  uk-background-norepeat uk-background-cover uk-background-top-center"
        uk-parallax="bgy: -100; easing: -2;  " data-src="{{ asset('uploads/banners/' . $trip->banner) }}" uk-height-viewport="expand: true; min-height: 600;" uk-img>
        @else
        <section class="uk-cover-container  uk-position-relative   uk-flex uk-flex-middle  uk-background-norepeat uk-background-cover uk-background-top-center"
        uk-parallax="bgy: -100; easing: -2;  " data-src="{{ asset('themes-assets/images/trip/15.jpg') }}" uk-height-viewport="expand: true; min-height: 600;" uk-img>
            @endif
        <div class="uk-overlay-primary  uk-position-cover "></div>
        <div class="uk-width-1-1 uk-position-z-index uk-margin-large-top">
            <div class="uk-width-1-1 uk-position-relative" style="z-index: 99;">
                <div class="uk-container   uk-text-left  uk-position-relative">
                    <div class="uk-grid-small uk-grid uk-flex-middle" uk-grid="">
                        <div class="uk-width-expand@m ">
                            <div class=" uk-margin-small uk-width-large">
                                <h1 class=" uk-text-bolder text-white uk-margin-remove"
                                    uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 400; repeat: false;">
                                    Frequently Asked Questions </h1>
                            </div>
                            <div class="uk-content uk-panel  text-white uk-light "
                                uk-scrollspy="cls: uk-animation-slide-top-small;  delay: 800; repeat: false;">
                                <span id="triptitle"> {{ $trip->trip_title }} </span>
                                <span class="uk-badge uk-margin-left" id="trip_counter">{{ $data->count() }}</span>
                            </div>
                        </div>
                        <div>
                            <div class="uk-content uk-panel">
                                @if ($alltrips->count() > 0)
                                    <div class="uk-width-medium uk-margin-auto">
                                        <select class="uk-select-search uk-select" id="triplist">
                                            <option value="">Please Select</option>
                                            @foreach ($alltrips as $row)
                                                <option value="{{ $row->id }}">{{ $row->trip_title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="uk-clearfix"> </div>
                </div>
            </div>
    </section>
    <!-- end banner -->
    <!-- section   -->
    <section class="uk-section bg-white uk-position-relative">
        <div class="uk-container">
            <ul uk-accordion class="uk-accordion uk-accordion-outline" id="faqlist">
                @if ($data->count() > 0)
                    @foreach ($data as $row)
                        <li class="{{ $loop->iteration == 1 ? 'uk-open' : '' }}">
                            <div class=" uk-accordion-title">
                                <h4 class=" text-primary uk-margin-remove theme-font-medium">{{ $loop->iteration }} -
                                    {{ $row->title }} </h4>
                            </div>
                            <div class="uk-accordion-content">
                                <p> {{ $row->content }} </p>
                            </div>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </section>
    <!-- section  -->
@endsection

@section('scripts')
    <script>
        $('#triplist').change(function() {
            var id = $(this).val();
            var trip = $('#triplist option:selected').text();
            $('#triptitle').html(trip);
            if (id) {
                var csrf = $('meta[name="csrf-token"]').attr('content');
                var url =
                    "{{ route('trip.faqsearch', ':trip_id') }}";
                url = url.replace(':trip_id', id);
                $.ajax({
                    type: "GET",
                    url: url,
                    data: {
                        _token: csrf
                    },
                    beforeSend: function() {},
                    success: function(data) {
                        if (data.length !== 0) {
                            $("#faqlist").empty();
                            $.each(data, function(key, value) {
                                $("#faqlist").append(function(n) {
                                    let sn = key + 1;
                                    let open = (sn == 1) ? 'uk-open' : '';
                                    let list = '<li class="' + open + '">';
                                    list += '<div class=" uk-accordion-title">';
                                    list +=
                                        '<h4 class=" text-primary uk-margin-remove theme-font-medium"> ' +
                                        sn + ' - ' +
                                        value.title + ' </h4> </div>';
                                    list += '<div class="uk-accordion-content">';
                                    list += '<p> ' + value.content + ' </p>';
                                    list += '</div>';
                                    list += '</li>';
                                    return list;
                                });
                            });
                        } else {
                            $('#trip_counter').remove();
                            $("#faqlist").empty();
                            $("#faqlist").append('<li> FAQs Not Available! </li>');
                        }
                    },
                    complete: function() {},
                });
            }
        });

    </script>
@endsection
