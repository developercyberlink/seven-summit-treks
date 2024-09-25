@extends('themes.default.common.master')
@section('content')
 
  <section class="padding-lg text-left border-top">
  <div class="container">
    <div class="dashboard_wrapper">
        <div class="row">
         <div class="col-lg-10 col-lg-offset-1">
            <div class="dasboard_iner pb-10">
                <p class="loginas">Hello <span>  {{ ucfirst(find_employee(intval(session('customer_id')))->first_name) }}   {{ ucfirst(find_employee(intval(session('customer_id')))->last_name) }} , </span>Welcome to tundigroup Employee Dashboard.
                 You are logged in as Employee!  </p>
                 
                @if($data->count() > 0)
                    @foreach($data as $row)
                    <?php 
                      $id = Session::get('customer_id');
                      $arr = explode(',',$row->members);
                      ?>
                     @if(in_array($id,$arr))
                     <div class="employee-list">
                       <h3>  {{ $row->circular_title }}</h3>
                         <p>{!! $row->circular_excerpt !!}</p>
                         <a href="{{ route('circular.detail',$row->uri) }}">View more</a>
                         </div>
                     @endif
                     
                    @endforeach
                @endif
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    
   
           
</div>
</div>
 
</section>
@endsection