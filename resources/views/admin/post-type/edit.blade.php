@extends('admin.master')
@section('title','Post Type')
@section('breadcrumb')
 <a href="{{ route('type.posttype.index',Request::segment(2)) }}" class="btn btn-primary btn-sm">List</a> 
@endsection
@section('content')
<form class="form-horizontal" role="form" action="{{ url('type/posttype', $data->id) }}" method="post" enctype="multipart/form-data">
	{{ csrf_field() }}     
	<input type="hidden" name="_method" value="PUT" />          
	<div class="col-md-9">
		<!-- Input Fields -->
		<div class="panel">
			<div class="panel-heading">
				<span class="panel-title">Edit Post Type</span>
			</div>
			<div class="panel-body"> 				
				<div class="form-group">
					<label for="inputStandard" class="col-lg-3 control-label">Post Type</label>
					<div class="col-lg-8">
						<div class="bs-component">
							<input type="text" id="post_type" name="post_type" class="form-control" placeholder="" value="{{$data->post_type}}" />
						</div>
					</div>
				</div>         
				<div class="form-group">
					<label for="inputStandard" class="col-lg-3 control-label"> Uri</label>
					<div class="col-lg-8">
						<div class="bs-component">
							<input type="text" id="uri" name="uri" class="form-control" placeholder="" value="{{$data->uri}}" readonly />
						</div>
					</div>
				</div> 

				<div class="form-group">
					<label for="inputStandard" class="col-lg-3 control-label"> Ordering </label>
					<div class="col-lg-8">
						<div class="bs-component">
							<input type="text" id="ordering" name="ordering" class="form-control" value="{{ $data->ordering }}" />
						</div>
					</div>
				</div>  

				<div class="form-group">
					<label for="inputStandard" class="col-lg-3 control-label"> Is Menu ? </label>
					<div class="col-lg-8">
						<div class="bs-component">
							<select name="is_menu" class="form-control input-sm">
								<option value="0" {{($data->is_menu == '0')?'selected':''}}> No </option> 
								<option value="1" {{($data->is_menu == '1')?'selected':''}}> Yes </option>    
							</select>
						</div>
					</div>
				</div>
				
				 <div class="form-group">
                <label class="col-lg-3 control-label" for="textArea3"> Content </label>
                <div class="col-lg-8">
                  <div class="bs-component">
                   <input type="text" id="content" name="content" class="form-control" value="{{ $data->content }}"/>
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
                Status: 
                <a href="avoid:javascript;" data-toggle="collapse" data-target="#publish_1">
                Active
              </a>
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
        <label class="field select">
          <select id="template" name="template">
           @foreach($templates as $key=>$template)
            <option value="{{$key}}"  {{ ($template == $data->template)?'selected':'' }}>{{ ucfirst($template) }}</option>
            @endforeach 
          </select>
          <i class="arrow"></i>
        </label>
        </div>
         <div class="sid_bvijay mb10">
      <h4> Banner </h4>
      <div class="hd_show_con">
        <div id="xedit-demo">
          @if($data->banner)
          <span class="id{{$data->id}}">
            <img src="{{ asset(env('PUBLIC_PATH').'/uploads/original/' . $data->banner) }}" width="50%" />
            <hr> 
          </span>          
          @endif 
          <input type="file" name="banner" />
        </div>
      </div>
    </div>
        </div>          
        </div>

</form>
@endsection
@section('scripts')
<script type="text/javascript">
  $(document).ready(function(){
    var post_type;
    $('#post_type').on('keyup', function(){
      post_type = $('#post_type').val();
      post_type=post_type.replace(/[^a-zA-Z0-9 ]+/g,"");
      post_type=post_type.replace(/\s+/g, "-");
      $('#uri').val(post_type);
    });
  });   
</script>
@endsection