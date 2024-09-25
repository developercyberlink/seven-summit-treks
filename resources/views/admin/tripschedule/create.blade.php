@extends('admin.master')
@section('title', Request::segment(2))

@section('breadcrumb')
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<button type="button" class="btn btn-default btn-sm backlink"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Back </button>
<a href="{{ url('admin/schedule/'.Request::segment(3).'/index') }}" class="btn btn-default btn-sm backlink"><i class="fa fa-list" aria-hidden="true"></i> Show List </a>
@endsection

@section('content')
<form class="form-horizontal" role="form" action="{{ url('admin/schedule/'.Request::segment(3).'/store') }}" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}    

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
              <input type="text" id="" name="start_date" class="form-control" placeholder="" />
              <input type="hidden" id="" name="trip_detail_id" value="{{Request::segment(3)}}" />
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="inputStandard" class="col-lg-2 control-label">End Date</label>
          <div class="col-lg-9">
            <div class="bs-component">
              <input type="text" id="" name="end_date" class="form-control" placeholder="" />              
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="inputStandard" class="col-lg-2 control-label">Group Size </label>
          <div class="col-lg-9">
            <div class="bs-component">
              <input type="text" id="group_size" name="group_size" class="form-control" placeholder="" />              
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
              <input type="text" id="price" name="price" class="form-control" placeholder="Price" />
            </div>
          </div>
        </div>

      </div>
    </div>

    <div class="panel">
      <div class="panel-heading">
        <span class="panel-title"> Remarks</span>
      </div>
      <div class="panel-body">    
        <div class="form-group">
          <div class="col-lg-12">
            <div class="bs-component">
              <textarea class="form-control my-editor" id="" name="remarks" rows="3"></textarea>
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
            Action
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
          <input type="number" id="" name="ordering" class="form-control" placeholder="Ordering" value="{{$ordering}}" />   
        </label>
      </div>

    </div>         

  </div>
</form>
@endsection
@section('scripts')
<script type="text/javascript">
  $(document).ready(function(){
    $('#title').on('keyup',function(){
      var title;
      title = $('#title').val();
      title=title.replace(/[^a-zA-Z0-9 ]+/g,"");
      title=title.replace(/\s+/g, "-");
      $('#uri').val(title);
    });
  });

// Go back link
$('.backlink').click(function(){
  var url = '<?=url()->previous(); ?>';
  window.location=url;
});

$('#start_date').datepicker({
        dateFormat: 'yy-mm-dd',
    })

    $('#end_date').datepicker({
        dateFormat: 'yy-mm-dd',
    })

</script>
@endsection