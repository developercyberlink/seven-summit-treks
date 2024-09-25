@extends('admin.master')
@section('breadcrumb')
     <a href="{{ 'admin/'.Request::segment(2) }}" class="btn btn-primary btn-sm">List</a>
@endsection
@section('content')
<form class="form-horizontal" role="form" action="{{url('admin/videogallery', $data->id)}}" method="post" enctype="multipart/form-data">
	{{ csrf_field() }}   
	<input type="hidden" name="_method" value="PUT" />         
	<div class="col-md-10">
		<!-- Input Fields -->
		<div class="panel">
			<div class="panel-heading">
				<span class="panel-title">Change Video  </span>
			</div>
			<div class="panel-body"> 
				<div class="form-group">
                    <label for="inputSelect" class="col-lg-3 control-label"> Trip Type </label>
                    <div class="col-lg-8">
                      <div class="bs-component">
                        <select class="form-control" name="trip_type">
                          <option value="0"> Select Trip Type </option>
                         @foreach($trip_type as $row)
                         <option value="{{$row->id}}" @if($data->trip_type == $row->id) selected @endif >{{$row->trip_type}}</option>
                         @endforeach
                        </select>
                      <div id="source-button" class="btn btn-primary btn-xs" style="display: none;">&lt; &gt;</div></div>
                    </div>
                  </div>

				  <div class="form-group">
                    <label class="col-lg-3 control-label" for="textArea3"> Video Link </label>
                    <div class="col-lg-8">
                      <div class="bs-component">
						  <input type="text" class="form-control" name="video" value="{{$data->video}}" />   
						  <br>
						  <iframe width="400" src="https://www.youtube.com/embed/{{$data->video}}" frameborder="0" allow="accelerometer; autoplay;  allowfullscreen"></iframe>
                      </div>
                    </div>
                  </div>                   

				<div class="form-group">
					<label for="inputStandard" class="col-lg-3 control-label">Caption </label>
					<div class="col-lg-8">
						<div class="bs-component">
							<input type="text" id="inputStandard" name="caption" class="form-control" placeholder="" value="{{$data->caption}}" />
						</div>
					</div>
				</div>         

				<div class="form-group">
					<label class="col-lg-3 control-label" for="textArea3"> </label>
					<div class="col-lg-8">
						<div class="bs-component">
							<input type="submit" class="btn btn-primary btn-lg" value="Submit" />
						</div>
					</div>
				</div> 


			</div>
		</div>          
	</div>

</form>
@endsection
