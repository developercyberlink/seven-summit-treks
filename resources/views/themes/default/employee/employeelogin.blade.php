@extends('themes.default.common.master')
@section('content')

<section class="padding-lg text-left border-top">
    <div class="  ">
    <div class="col-lg-4 col-lg-offset-4">

      <!--  -->
      <div class="login">

        <div class="asideheader"> <h3>Employee Login <i class="fa fa-signin-o"></i></h3></div>
        <br>

                  @if(session()->has('message'))
                            {{ session()->get('message') }}
                            @endif

                            @if ($errors->any())
                            @foreach ($errors->all() as $error)
                            {{ $error }} <br />
                            @endforeach
                            @endif



        <form method="post" action="{{ route('page.employeelogin_action') }}">
                                {{ csrf_field() }}          
          
          <div class="form-group">
            <label>Username</label>
            <input type="text" class="input-text form-control" name="email" id="username" value="" />
          </div>
          
          <!--  -->
          <!--  -->
          
          <div class="form-group">
            <label>Password</label>
            <input type="password" class="input-text form-control" name="password" id="password" value="" />
          </div>
          
          <!--  -->
          
          
          <!--  -->
            <input type="submit" class="btn btn-md btn-primary pull-right" name="login" value="Login" />
           <a href="{{ route('page.password-recover') }}">Lost your password?</a>
          <!--  -->
          <div class="clearfix"></div>
        </form>
      </div>
      
      
    </div>
    <!--  -->
    
    
  </div>
</section>
<div class="clearfix"></div>

@endsection