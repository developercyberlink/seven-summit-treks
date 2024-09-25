    <!--title end -->
     <div id="itinerary" class="uk-single-section">
            <div class="uk-width-1-1">
        <ul uk-accordion class="uk-accordion uk-accordion-outline uk-itinerary">
            
             @foreach ( $data['itinerary'] as $row)
                <!--<li class="{{ $loop->iteration == 1 ? 'uk-open' : '' }}">-->
                <li>
                   <div class="uk-accordion-title  uk-itinerary-title">
                    <div class="uk-grid-small uk-flex-middle " uk-grid uk-tooltip="title:Day {{ $row->days }} ; pos:top-left;" title="Day {{ $row->days }}">
                       <div class="uk-width-auto@m uk-text-center">
                          <div class="uk-day uk-margin-small-right"> Day {{ $row->days }} </div>
                       </div>
                       <div class="uk-width-expand@m">
                          <div class="uk-width-1-1">
                             <h5 class="uk-margin-remove theme-font-medium">  {{ $row->title }} </h5>
                          </div>
                          <div class="uk-flex uk-flex-middle" uk-grid>
                                @if($row->meals)
                                <div>
                             <div class="uk-itinerary-small-title uk-margin-medium-right"><i class="fa fa-cutlery text-primary uk-margin-small-right" aria-hidden="true"></i>  <span>{{ $row->meals }}</span></div>
                             </div>
                             @endif
                             @if($row->accomodation)
                             <div>
                             <div class="uk-itinerary-small-title"><i class="fa fa-bed text-primary uk-margin-small-right" aria-hidden="true"></i>  <span>{{ $row->accomodation }}</span></div>
                             </div>
                             @endif
                          </div>
                       </div>
                    </div>
                 </div>
                 <div class="uk-accordion-content uk-itinerary-content">
                    <p>{{ $row->content }}</p>                    
                    </div>
              </li>
            @endforeach 
            
              
        </ul>
     </div>
        </div>

<!-- end Itinerary -->

<!-- start Map -->
@if ($data['trip']->trip_map)
    <div id="map" class="uk-single-section">
         <!--title -->
        <div class="uk-main-title   uk-margin-medium-bottom uk-display-block uk-text-left">
            <h1
                class="uk-h4 uk-heading-line  uk-text-left  uk-position-relative text-black  uk-text-uppercase uk-margin-remove">
                <span class="theme-font-extra-bold"> <i
                        class="fa fa-map text-primary uk-margin-small-right"></i> Route Map</span>
            </h1>
        </div>
         <!--title end -->
        <div class="uk-gallery" uk-lightbox>
            <div>
                <a href="{{ asset('uploads/original/' . $data['trip']->trip_map) }}"
                    data-caption="{{ $data['trip']->trip_title }}"> <img
                        src="{{ asset('uploads/original/' . $data['trip']->trip_map) }}"
                        alt="{{ $data['trip']->trip_title }}" />
                </a>
            </div>
        </div>
    </div>
@endif
 <!--end Map -->

<!-- start  Cost Includes -->

@if ($data['cost_inc']->count() > 0)
    <div id="cost-includes" class="uk-single-section">
           <!-- title -->
        <div class="uk-main-title uk-margin-medium-bottom uk-display-block uk-text-left">
            <h1 class="uk-h4 uk-heading-line  uk-text-left  uk-position-relative text-black  uk-text-uppercase uk-margin-remove">
                <span class="theme-font-extra-bold"> 
                    <i class="fa fa-check-circle-o text-primary uk-margin-small-right"></i>
                    Cost Includes </span>
               
            </h1>
        </div>

        <!-- title end -->
        <ul class=" uk-includes">
            @foreach ($data['cost_inc'] as $row)
                <li><strong>{{ strtoupper($row->title) }}</strong> : {{ $row->content }}</li>
            @endforeach

        </ul>
    </div>
@endif

<!-- end  Cost Includes -->

<!-- start  Cost excludes -->
@if ($data['cost_exc']->count() > 0)
    <div id="cost-excludes" class="uk-single-section">
        <!-- title -->
        <div class="uk-main-title   uk-margin-medium-bottom uk-display-block uk-text-left">
            <h1
                class="uk-h4 uk-heading-line  uk-text-left  uk-position-relative text-black  uk-text-uppercase uk-margin-remove">
                <span class="theme-font-extra-bold"> <i
                        class="fa fa-times-circle text-primary uk-margin-small-right"></i> Cost
                    Excludes</span>
            </h1>
        </div>
        <!-- title end -->
        <ul class=" uk-excludes">
            @foreach ($data['cost_exc'] as $row)
                <li><strong> {{ strtoupper($row->title) }} </strong>: {{ $row->content }}</li>
            @endforeach
        </ul>
    </div>
@endif