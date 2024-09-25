@extends('themes.default.common.master')
@section('content')
<!-- HEADER START -->

<section class="uk-section bg-secondary uk-background-texture">
    <div class="uk-width-1-1 uk-position-z-index uk-margin-large-top">
        <div class="uk-container"
            uk-scrollspy="target:h1, h2, h3, h4, h5, h6, p; cls: uk-animation-slide-top-medium;   delay: 100; repeat: true;">
            <h1 class="f-w-600 text-white uk-margin-remove">Make a Payment</h1>
        </div>
    </div>
</section>
<!-- HEADER END -->
<!-- start section -->
<section class="uk-section uk-booking bg-white uk-position-relative">
    <div class="uk-container"
        uk-scrollspy="target:[uk-scrollspy-class], img, h1, h2, h3, h4, h5, h6, hr, .uk-button, li, p; cls: uk-animation-slide-top-small; delay: 50; repeat: false;">
        <div class="uk-grid-large uk-grid" uk-grid>
            <!--  -->
            <div class="uk-width-expand@m">
                <form class="uk-grid-medium" uk-grid method="POST" action="{{ route('paynowbook') }}">
                @csrf 
                    <input  class="uk-input" name="api_key" type="hidden" placeholder="" value="c850a40341fa402fb50d37e45e5dbcc1" readonly>
                    <input class="uk-input" name="merchant_id" type="hidden" placeholder="" value="9104234836" readonly>
                    <input class="uk-input" name="success_url" type="hidden" placeholder="" value="https://sevensummittreks.com/hbl-redirect?payment=success" readonly>
                    <input class="uk-input" name="fail_url" type="hidden" placeholder="" value="https://sevensummittreks.com/hbl-redirect?payment=failed" readonly>
                    <input class="uk-input" name="cancel_url" type="hidden" placeholder="" value="https://sevensummittreks.com/hbl-redirect?payment=cancel" readonly>
                    <input class="uk-input" name="backend_url" type="hidden" placeholder="" value="https://sevensummittreks.com/hbl-redirect?payment=backend" readonly>
                    <input type="hidden" name="input_3d" value="Y">

                    <input type="hidden" name="input_currency" value="USD">
                    <!--  -->
                    @include('themes.default.common.flash-message')
                    <div class="uk-width-1-1">
                        <h4 class="uk-margin-small text-primary uk-text-bold">Trip & Amount</h4>
                        <h5><span style="color:red">Fields marked with * are required.</span></h5>
                    </div>
                    <!--  -->
                    <!--  -->
                    <div class="uk-width-1-2@s">
                    <label>Trip <span class="text-red">*</span></label>
                    <!--<select name="trip_id" class="uk-select uk-select-search">-->
                    <!--    <option value="0">Select Trip</option>-->
                    <!--    @foreach($trips as $trip)-->
                    <!--    <option value="{{$trip->id}}">{{$trip->trip_title}}</option>-->
                    <!--    @endforeach-->
                    <!--</select>-->
                  <input class="uk-input" name="trip_id" type="text" placeholder="Enter your trip here.." required>

                    </div>
                    <!--  -->
                    <!--  -->
                    <div class="uk-width-1-2@s">
                    <label>Amount (USD)<span class="text-red">*</span></label>
                    <input class="uk-input" id="amount" name="input_amount" type="number" min="1" step=".01" placeholder="USD" required>
                    </div>
                    <!--  -->
                    <!--  -->
                    <div class="uk-width-1-1">
                        <h4 class="uk-margin-small text-primary uk-text-bold">Personal info:</h4>
                    </div>
                    <!--  -->
                    <!--  -->
                    <div class="uk-width-1-2@s">
                        <label>Full Name <span class="text-red">*</span></label>
                        <input class="uk-input" name="full_name" type="text" placeholder=" " required>
                    </div>
                    <!--  -->
                    <!--  -->
                    <div class="uk-width-1-2@s">
                        <label>Email Address <span class="text-red">*</span></label>
                        <input class="uk-input" name="email" type="text" placeholder="" required>
                    </div>
                    <!--  -->
                    <!--  -->
                    <div class="uk-width-1-2@s">
                        <label>Country <span class="text-red">*</span></label>
                       <select name="country" class="uk-select">
                        @foreach($country as $row)
                            <option value="{{$row->country}}">{{$row->country}}</option>
                           @endforeach
                        </select>
                    </div>
                    <!--  -->
                    <!--  -->
                    <div class="uk-width-1-2@s">
                        <label>Contact Number <span class="text-red">*</span></label>
                        <input class="uk-input" name="phone" type="tel" placeholder="Enter number with country code" required>
                    </div>
                    <!--  -->

                    <!--  -->
                    <div class="uk-width-1-1">
                        <label>Remarks</label>
                        <textarea name="comments" class="uk-textarea" rows="4" placeholder=""></textarea><br>
                        <span style="color:red"> Note*: All Fields Required! </span>
                    </div>
                    <!--  -->
                    <!--  -->
                    <div class="uk-width-1-1">
                    <label><input class="uk-checkbox" value="1" name="terms_conditions" type="checkbox" placeholder=""> I accept terms and Conditions 
                    <a href="{{route('info.list','terms-and-conditions')}}" target="_blank" class="text-primary"><i class="fa fa-question-circle"></i></a></label>
                    </div>
                     <!--  -->
                    
                    <!--  -->
        
                    <div class="uk-width-1-1">
                        <div class="uk-margin-small-top">
                            <button type="submit" class="uk-button uk-button-primary">Proceed to Payment</button>
                        </div>
                    </div>
                    <!--  -->
                </form>
            </div>
            <!--  -->
        </div>
        </ul>
    </div>
</section>
<!--end section  -->  

@stop
@section('scripts')
<script type="text/javascript"></script>
<script>
$( '#amount' ).on( 'input', function() {
  var val = $( this ).val(),
      arr = val.split( '.' );

  if ( arr.length > 1 )
    $( this ).val( arr[ 0 ] + val.substr( val.length - 1 ) + '.00' )
  else
    $( this ).val( val + '.00' )
} ).on( 'keypress', function( e ) {
  return e.charCode == 46 || ( e.charCode >= 48 && e.charCode <= 57 )
} )
</script>
@stop
