@extends('admin.master')
@section('title', Request::segment(2))

@section('breadcrumb')
<button type="button" class="btn btn-default btn-sm backlink"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Back </button>
<a href="{{ url('admin/schedule/'.Request::segment(3).'/index') }}" class="btn btn-default btn-sm backlink"><i class="fa fa-list" aria-hidden="true"></i> Show List </a>
@endsection

@section('content')
<form class="form-horizontal" role="form" action="{{url('admin/schedule/'.Request::segment(3).'/'.Request::segment(4).'/update')}}" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}    
  <input type="hidden" name="_method" value="PUT" />  
  <div class="col-md-9">
    <!-- Input Fields -->
    <div class="panel">
      <div class="panel-heading">
        <span class="panel-title"> New Schedule </span>
      </div>
      <div class="panel-body"> 

        <div class="form-group">
          <label for="inputStandard" class="col-lg-2 control-label">Start Date</label>
          <div class="col-lg-9">
            <div class="bs-component">
              <input type="text" id="" name="start_date" class="form-control" value="{{$data->start_date}}" placeholder="Start Date" />
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="inputStandard" class="col-lg-2 control-label">End Date</label>
          <div class="col-lg-9">
            <div class="bs-component">
              <input type="text" id="" name="end_date" class="form-control" value="{{$data->end_date}}" placeholder="end Date" />
            </div>
          </div>
        </div>

         <div class="form-group">
          <label for="inputStandard" class="col-lg-2 control-label">Group Size </label>
          <div class="col-lg-9">
            <div class="bs-component">
              <input type="text" id="group_size" name="group_size" value="{{$data->group_size}}" class="form-control" placeholder="" />              
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="inputStandard" class="col-lg-2 control-label">Availability</label>
          <div class="col-lg-4">
            <div class="bs-component">
              <select name="availability" class="form-control input-sm">
                @if($availability)
                @foreach($availability as $row)
                <option value="{{$row}}"> {{$row}} </option> 
                @endforeach
                @endif   
              </select>              
            </div>
          </div>
           <div class="col-lg-5">
            <div class="bs-component">
              <input type="text" id="price" name="price" class="form-control" value="{{$data->price}}" placeholder="Price" />
            </div>
          </div>
        </div>

      </div>
    </div>

    <div class="panel">
      <div class="panel-heading">
        <span class="panel-title">Trip Content</span>
      </div>
      <div class="panel-body">
        <div class="form-group">
          <div class="col-lg-12">
            <div class="bs-component">
              <textarea class="form-control my-editor" id="" name="remarks" rows="3">{{$data->remarks}}</textarea>
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
          Status: <a href="avoid:javascript;" data-toggle="collapse" data-target="#publish_1">{{$data->status}}</a>
        </div>                    
      </div>
      <footer>                        
        <div id="publishing-action">
          <input type="submit" class="btn btn-primary btn-sm" value="Publish" />
        </div>
        <div class="clearfix"></div>
      </footer>
      <div class="clearfix"></div>
    </div>  

    <div class="sid_bvijay mb10">
      <label class="field text">
        <input type="number" id="" name="ordering" class="form-control" placeholder="Ordering" value="{{$data->ordering}}" />   
      </label>
    </div>

  

 </div>         

</div>
</form>
@endsection
@section('scripts')
<script type="text/javascript">

  $('.imagedelete').on('click',function(e){
    e.preventDefault();
    if(!confirm('Are you sure to delete?')) return false;
    var csrf = $('meta[name="csrf-token"]').attr('content');
    var str = $(this).attr('href');
    var id = str.slice(1);
    $.ajax({
      type:'delete',
      url:"{{url('delete_post_thumb') . '/'}}" + id,
      data:{_token:csrf},    
      success:function(data){ 
        $('span.id' + id ).remove();
      },
      error:function(data){  
        alert(data + 'Error!');     
      }
    });
  });


  $(document).ready(function(){
    $('#trip_title').on('keyup',function(){
      var trip_title;
      trip_title = $('#trip_title').val();
      trip_title=trip_title.replace(/[^a-zA-Z0-9 ]+/g,"");
      trip_title=trip_title.replace(/\s+/g, "-");
      $('#uri').val(trip_title);
    });
  });

// Go back link
$('.backlink').click(function(){
  var url = '<?=url()->previous(); ?>';
  window.location=url;
});

</script>
@endsection