@extends('admin.master')
@section('breadcrumb')
     <a href="{{ 'admin/'.Request::segment(2) }}" class="btn btn-primary btn-sm">List</a>
@endsection
@section('content')
 @if(session('message'))
    <div class="alert alert-success alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {{session('message')}}
    </div>
@endif
<form class="form-horizontal" role="form" action="{{url('admin/videocategory')}}" method="post" enctype="multipart/form-data">
           {{ csrf_field() }}            
<div class="col-md-8">
            <!-- Input Fields -->
            <div class="panel">
              <div class="panel-heading">
                <span class="panel-title">New Video Category </span>
              </div>
              <div class="panel-body"> 
                           
                  <div class="form-group">
                    <label for="inputStandard" class="col-lg-2 control-label">Category </label>
                    <div class="col-lg-8">
                      <div class="bs-component">
                        <input type="text" id="inputStandard" name="category" class="form-control" placeholder="" />
                      </div>
                    </div>
                  </div> 

                  <!-- <div class="form-group">-->
                  <!--  <label class="col-lg-2 control-label" for="textArea3"> Video Link </label>-->
                  <!--  <div class="col-lg-8">-->
                  <!--    <div class="bs-component">-->
                  <!--      <textarea class="form-control" id="textArea3" name="video" rows="3" autocomplete="off"></textarea>-->
                  <!--    </div>-->
                  <!--  </div>-->
                  <!--</div> -->

                  <div class="form-group">
                    <label for="inputStandard" class="col-lg-2 control-label">Caption </label>
                    <div class="col-lg-8">
                      <div class="bs-component">
                        <input type="text" id="inputStandard" name="caption" class="form-control" placeholder="" />
                      </div>
                    </div>
                  </div>         
              
                   <div class="form-group">
                    <label class="col-lg-2 control-label" for="textArea3"> </label>
                    <div class="col-lg-8">
                      <div class="bs-component">
                       <input type="submit" class="btn btn-primary btn-lg" value="Submit" />
                      </div>
                    </div>
                  </div> 

                               
              </div>
            </div>          
          </div>
           <aside class="col-lg-4 ">
 <!-- menu quick links -->

        <div class="admin-form">
          <div class="sid_bvijay mb10">
            <h4> Thumbnail </h4>
            <div class="hd_show_con">
              <div id="xedit-demo">
               <input type="file" name="thumbnail" />
             </div>
           </div>
         </div>
       </div>
 
</aside>

          </form>
@endsection
