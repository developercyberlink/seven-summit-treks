@extends('themes.default.common.master')
@section('content')
	<!-- banner -->
	<section class="uk-cover-container  uk-position-relative   uk-flex uk-flex-middle  uk-background-norepeat uk-background-cover uk-background-top-center" 
	uk-parallax="bgy: -100; easing: -2;" data-src="{{asset('themes-assets/images/trip/06.jpg')}}" uk-height-viewport="expand: true; min-height: 350;" uk-img>
		<div class="uk-overlay-primary  uk-position-cover "></div>
		<div class="uk-width-1-1 uk-position-z-index uk-margin-large-top">
			<div class="uk-width-1-1 uk-position-relative" style="z-index: 99;">
				<div class="uk-container    uk-position-relative" uk-scrollspy="cls: uk-animation-fade;  delay: 500; repeat: false">
					<div class=" uk-margin-medium ">
						<h2 class=" uk-text-bolder text-white uk-margin-small" uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 400; repeat: false;">Search Result </h2> </div>
					 
				</div>
			</div>
		</div>
	</section>
	<!-- end banner -->
	<!-- section   -->
	<section class=" bg-light uk-section  uk-position-relative ">
		<div class="uk-container">
		  
  <div class="uk-card uk-card-default">
  	<div class="uk-card-header">
      <form action="{{route('trip-search')}}" method="post">
  		<div class="uk-grid-small  uk-grid" uk-grid="">
              @csrf
              <div class="uk-width-expand@s uk-first-column">
                  <div class="uk-search uk-search-default uk-width-1-1">
                      <input id="searchword" class="uk-input " type="text" name="search" placeholder="Search Trips" size="30" maxlength="200" />
                  </div>                          
              </div>
              <div class="uk-width-auto@s">
                  <button class="uk-button uk-button-primary uk-width-1-1" type="submit">Search</button>
              </div>
           </div>
          </form>
          	</div>
          	<div class="uk-card-body">
        
            @if ($data->where('status','1')->isEmpty() )
             <p>Result Not Found!</p>
            @else
                 @if ($data->count() > 0)        
                   <ul class="uk-search-list bg-light">
                        @foreach ($data->where('status','1') as $row)
                          <li>
                            <a href="{{ url('page/' . tripurl($row['uri'])) }}" ><mark>{{$row['trip_title']}}</mark></a>
                            <p>{!!$row['trip_excerpt']!!}</p>  
                          </li>
                        @endforeach
                    </ul>    
                    
                 @endif	
            @endif 		
                          
                {{$data->links('themes.default.common.paginate')}}
        
          	</div>  	 
          </div>
		</div>
	</section>
	<!-- section  -->
@endsection