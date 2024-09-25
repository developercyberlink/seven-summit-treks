@extends('admin.master')
@section('title','Post Category')
@section('breadcrumb')
<a href="{{ route('trip-review')}}" class="btn btn-primary btn-sm">List</a>
@endsection
@section('content')
<form class="form-horizontal" role="form" action="{{ route('post-trip-review') }}" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}
  <div class="col-md-8">
    <!-- Input Fields -->
    <div class="panel">
      <div class="panel-heading">
        <span class="panel-title">Create Trip Review</span>
      </div>
      <div class="panel-body">

          <div class="form-group">
              <label for="inputStandard" class="col-lg-2 control-label">Trip</label>
              <div class="col-lg-9">
                  <div class="bs-component">
                      <select class="form-control" name="trip_id">
                          <option selected disabled>--Please select trip--</option>
                          @foreach($trip as $value)
                          <option value="{{$value->id}}">{{$value->trip_title}}</option>
                          @endforeach

                      </select>
                      <div id="source-button" class="btn btn-primary btn-xs" style="display: none;">&lt; &gt;</div></div>
              </div>
          </div>

          <div class="form-group">
        <label for="inputStandard" class="col-lg-2 control-label">Trip Rating</label>
        <div class="col-lg-9">
         <div class="bs-component">
          <select class="form-control" name="rating">
              <option selected disabled>--Please select trip rating--</option>
            <option value="1">1 star</option>
            <option value="2">2 star</option>
            <option value="3">3 star</option>
            <option value="4">4 star</option>
            <option value="5">5 star</option>

          </select>
          <div id="source-button" class="btn btn-primary btn-xs" style="display: none;">&lt; &gt;</div></div>
        </div>
      </div>

      <div class="form-group">
        <label for="inputStandard" class="col-lg-2 control-label">Name</label>
        <div class="col-lg-9">
          <div class="bs-component">
            <input type="text" name="name" class="form-control" placeholder="" />
          </div>
        </div>
      </div>

      <div class="form-group">
        <label for="inputStandard" class="col-lg-2 control-label">Email</label>
        <div class="col-lg-9">
          <div class="bs-component">
            <input type="text" name="email" class="form-control" placeholder="" />
          </div>
        </div>
      </div>

      <div class="form-group">
       <label for="inputStandard" class="col-lg-2 control-label">Image</label>
       <div class="col-lg-9">
        <div class="bs-component">
          <input type="file" name="photo" class="form-control" placeholder="" />
        </div>
      </div>
    </div>

          <div class="form-group">
              <label for="inputStandard" class="col-lg-2 control-label">Youtube video URL</label>
              <div class="col-lg-9">
                  <div class="bs-component">
                      <input class="form-control" name="video_url" type="text" placeholder="">
                  </div>
              </div>
          </div>

          <div class="form-group">
              <label for="inputStandard" class="col-lg-2 control-label">Country</label>
              <div class="col-lg-9">
                  <div class="bs-component">
                      <input class="form-control" name="country" type="text" placeholder="">
                  </div>
              </div>
          </div>

    <div class="form-group">
     <label for="inputStandard" class="col-lg-2 control-label">Review</label>
     <div class="col-lg-9">
      <div class="bs-component">
        <div class="bs-component">
          <textarea class="my-editor form-control" id="textArea3" name="review" rows="12" autocomplete="off"></textarea>
        </div>
      </div>
    </div>
  </div>

</div>
</div>
</div>

<div class="col-md-4">
  <div class="admin-form">
    <div class="sid_bvijay mb10">
      <div class="hd_show_con">
        <div class="publice_edi">
          Status: <a href="avoid:javascript;" data-toggle="collapse" data-target="#publish_1">Active</a>
        </div>
      </div>
      <footer>
        <div id="publishing-action">
          <input type="submit" class="btn btn-primary btn-lg" value="Publish" />
        </div>
        <div class="clearfix"></div>
      </footer>
      <div class="clearfix"></div>
    </div>

    <div class="sid_bvijay mb10">
      <label class="field text">
{{--        <input type="number" id="inputStandard" name="ordering" class="form-control" value="{{$ordering}}" placeholder="Order" />--}}
      </label>
    </div>



 </div>

</div>
</form>
@endsection

 @section('scripts')
   <script type="text/javascript">
    $(document).ready(function(){
      $('#category').on('keyup',function(){
        var category;
        category = $('#category').val();
        category=category.replace(/[^a-zA-Z0-9 ]+/g,"");
        category=category.replace(/\s+/g, "-");
        $('#cat_uri').val(category);
      });
    });

// Go back link
$('.backlink').click(function(){
  var url = '<?=url()->previous(); ?>';
  window.location=url;
});

  </script>
  @endsection
