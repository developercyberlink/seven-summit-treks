@extends('admin.master')
@section('breadcrumb')
     <a href="{{ Request::segment(1) }}" class="btn btn-primary btn-sm">List</a>
@endsection
@section('content')

<form class="form-horizontal" role="form" action="{{ url('department', $data->id) }}" method="post" enctype="multipart/form-data">
	 {{ csrf_field() }}     
	<input type="hidden" name="_method" value="PUT" />          
<div class="col-md-8">
            <!-- Input Fields -->
            <div class="panel">
              <div class="panel-heading">
                    <span class="panel-title">Add Department</span>
              </div>
              <div class="panel-body"> 
                           
                  <div class="form-group">
                    <label for="inputStandard" class="col-lg-3 control-label">Department</label>
                    <div class="col-lg-8">
                      <div class="bs-component">
                        <input type="text" id="inputStandard" name="department" class="form-control" placeholder="" value="{{$data->department}}" />
                      </div>
                    </div>
                  </div>         
              
                   <div class="form-group">
                    <label class="col-lg-3 control-label" for="textArea3">  </label>
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