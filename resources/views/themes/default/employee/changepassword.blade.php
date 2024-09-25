@extends('themes.default.common.master')
@section('content')
<div id="main">
	<div class="section">
		<div class="breadcrumb_wraper">
			<div class="container">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.php">Home</a></li>

					<li class="breadcrumb-item active">Password Change </li>
				</ol>
			</div>
		</div>

		<div class="container">
			<div class="dashboard_wrapper">
				<div class="row">
					<div class="col-lg-12">
						<h4>My Account</h4>
					</div>
					<hr>
					<div class="col-md-2">
						@include('themes.default.aside')
					</div>

					<div class="col-md-10">
						<div class="dasboard_iner">    
							<h4>Password Change </h4> 
							<hr>
							@include('admin.common.message')
		<form action="{{ route('customer.changepassword_action') }}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT" />  
            <!--  -->
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label>Old Password <span class="required" title="required">*</span></label>
                  <input type="password" maxlength="30" name="oldpassword" value="" class="form-control">
                </div>
              </div>              
            </div>
            <!--  -->
           
            <!--  -->
            <div class="row">
             
              <div class="col-lg-6">
                <div class="form-group">
                  <label>New Password <span class="required" title="required">*</span></label>
                  <input type="password" maxlength="30" name="newpassword" value="" class="form-control">
                </div>
              </div>
              
            </div>
            <!--  -->

            <div class="row">
              <div class="col-lg-6">
                <button type="submit" class="btn btn-primary"> Update Account Detail</button>
              </div>

            </div>
            <!--  -->

          </form>
         
  

						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>


@endsection	