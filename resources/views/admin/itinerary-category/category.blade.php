@extends('admin.master')
@section('title', '')
@section('breadcrumb')
<a href="{{ route('list.show') }}" class="btn btn-primary btn-sm">List</a>
@endsection
@section('content')
<form class="form-horizontal" role="form" action="{{route('category.post')}}" method="post">
 {{ csrf_field() }}
 <div class="col-md-9">
  <!-- Input Fields -->
  <div class="panel">
    <div class="panel-heading">
      <span class="panel-title">Add Itinerary Category </span>
    </div>
    <div class="panel-body">
      <div class="form-group">
        <label for="inputStandard" class="col-lg-3 control-label">Title </label>
        <div class="col-lg-8">
          <div class="bs-component">
            <input type="text" id="category" name="category" class="form-control" />
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
            <div id="publishing-action">
                <input type="submit" class="btn btn-primary btn-lg" value="Publish" />
              </div>
              <div class="clearfix"></div>
            </div>

            <div class="clearfix"></div>
          </div>
          <div class="sid_bvijay mb10">
            <label class="field">
            <input type="number" id="ordering" name="ordering" class="form-control" value="{{$ordering}}" />
            </label>
          </div>
        </div>
</div>

</form>
@endsection
