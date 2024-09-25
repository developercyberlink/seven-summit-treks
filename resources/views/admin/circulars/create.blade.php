@extends('admin.master')
@section('title','Post')

@section('breadcrumb')
     <a href="{{ url('admin/circulartype',Request::segment(3)) }}" class="btn btn-primary btn-sm">List</a>
@endsection

@section('content')
<form class="form-horizontal" role="form" action="{{ url('admin/circulartype/'.Request::segment(3).'/store') }}" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}    
<input type="hidden" name="circular_type" value="{{ Request::segment(3) }}" /> 
  <div class="col-md-9">
    <!-- Input Fields -->
    <div class="panel">
      <div class="panel-heading">
        <span class="panel-title">New Circular</span>
      </div>
      <div class="panel-body"> 
        <input type="hidden" name="circular_date" value="<?=date('Y-m-d h:i:s')?>" />     
              
        <div class="form-group">
          <label for="inputStandard" class="col-lg-3 control-label">Title</label>
          <div class="col-lg-8">
            <div class="bs-component">
              <input type="text" id="inputStandard" name="circular_title" class="form-control" value="{{ old('circular_title') }}" />
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="inputStandard" class="col-lg-3 control-label">Sub Title</label>
          <div class="col-lg-8">
            <div class="bs-component">
              <input type="text" id="inputStandard" name="sub_title" class="form-control" value="{{ old('sub_title') }}" />
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="inputStandard" class="col-lg-3 control-label">Uri</label>
          <div class="col-lg-8">
            <div class="bs-component">
              <input type="text" id="inputStandard" name="uri" class="form-control" value="{{ old('uri') }}" />
            </div>
          </div>
        </div>

          <div class="form-group">
            <label class="col-lg-3 control-label" for="textArea3"> Brief </label>
            <div class="col-lg-8">
              <div class="bs-component">
                <textarea class="form-control" id="textArea3" name="circular_excerpt" rows="3"> {{ old('circular_excerpt') }} </textarea>
              </div>
            </div>
          </div>

        </div>
      </div> 
                     <div class="panel">
                    <div class="panel-heading">Content</div>

                    <div class="panel-body">
                       
                            <div class="form-group">
                                 <textarea class="form-control my-editor" id="" name="circular_content" rows="3">{{ old('circular_content') }}</textarea>
                            </div>
                       
                    </div>
                </div>
      
    </div>

    <div class="col-md-3" ng-app="userfilter" ng-controller="userfilterCtrl">
      <div id="" class="admin-form">
        <div class="sid_bvijay mb10">                   
          <div class="hd_show_con">
            <div class="publice_edi">
              Status: <a href="avoid:javascript;" data-toggle="collapse" data-target="#publish_1">Active</a>
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
        
        <div class="section mb10">
               <label class="field select">
                        <select id="dpt" name="department" ng-model="dept" ng-change="changedValue(dept)" ng-options="department.id as department.department for department in departments track by department.id">
                        <option value="" disabled selected>Choose Department </option>
                        </select>
                        <i class="arrow"></i>
                      </label>
            </div> 
            
            <div class="sid_bvijay mb10" ng-show="showBox">
                    <h4> Member List</h4>
                    <div class="hd_show_con">
                        <div class="tab-content mb15">
                            <div id="tab18_1" class="tab-pane active">
                                <ul class="ctgor">
                                    <li ng-repeat="user in users track by user.id">
                                        <label class="option"> <input type="checkbox" name="user[]" value="@{{ user.id }}" ng-checked="checkall"> <span class="checkbox"></span> @{{ user.first_name }} @{{ user.last_name }} </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
           </div>
               </div>
              

 <div class="sid_bvijay mb10">
          <label class="field text">
            <input type="number" id="inputStandard" name="ordering" class="form-control" placeholder="Circular Order" value="{{ old('ordering') }}" />   
          </label>
        </div>

          <div class="sid_bvijay mb10">
            <h4> Thumbnail </h4>
            <div class="hd_show_con">
              <div id="xedit-demo">
               <input type="file" name="circular_thumbnail" />
              </div>
            </div>
          </div>
      
        </div>         

      </div>
    </form>
    @endsection
    @section('scripts')
    
    @endsection