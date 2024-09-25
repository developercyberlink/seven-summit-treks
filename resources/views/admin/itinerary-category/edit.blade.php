@extends('admin.master')
@section('title', '')
@section('breadcrumb')
<a href="{{ route('itinerary-category.index') }}" class="btn btn-primary btn-sm">List</a>
@endsection
@section('content')
<form class="form-horizontal" role="form" action="{{route('itinerary-category.update',$data->id)}}" method="post">
 {{ csrf_field() }}  
 @method('PUT')          
 <div class="col-md-9">
  <!-- Input Fields -->
  <div class="panel">
    <div class="panel-heading">
      <span class="panel-title">Edit Itinerary Category </span>
    </div>
    <div class="panel-body"> 
      <div class="form-group">
        <label for="inputStandard" class="col-lg-3 control-label"> Title </label>
        <div class="col-lg-8">
          <div class="bs-component">
            <input type="text" id="category" name="category" class="form-control" value="{{$data->category}}" />
            </div>
        </div>
      </div>  

</div>
</div>          
</div>

<div class="col-md-3">
   <div class="admin-form">

<div class="sid_bvijay mb10">                   
            <div class="hd_show_con">
              <div class="publice_edi">
              <div id="publishing-action">
                <input type="submit" class="btn btn-primary btn-lg" value="Publish" />
              </div>
              <div class="clearfix"></div>
              </div>                    
            </div>
           
            <div class="clearfix"></div>
          </div>

          <div class="sid_bvijay mb10">
            <label class="field">
            <input type="number" id="ordering" name="ordering" class="form-control" value="{{$data->ordering}}" />            
            </label>
          </div>


        </div>          
</div>

</form>
@endsection