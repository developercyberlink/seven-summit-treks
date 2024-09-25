@extends('themes.default.common.master')
@section('content')
 
  <section class="padding-lg text-left border-top">
  <div class="container">
    <div class="dashboard_wrapper">
        <div class="row">
          
          <div class="col-lg-10 col-lg-offset-1">
            <div class="dasboard_iner pb-10">
                <a href="#" onclick="window.history.back();" class="btn btn-primary"> <i class="fa fa-angle-double-left"></i> Back</a>
                 <div class="clearfix"><br></div>
                @if($data)
                
                  <div class="employee-list">
                 <h3>  {{ $data->circular_title }}</h3>
                 
                 
                 @if($data->circular_thumnail != "")
                    <img src="{{ asset('public/uploads/original/' . $data->circular_thumnail) }}" /> 
                 @endif
 
                   {!! $data->circular_content !!}
                   
                @endif
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        
    </div>
    <br /> <br />
</div>
</div>
</div>
  </section>
@endsection