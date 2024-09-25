@extends('admin.master')
@section('title','Banner')
@section('breadcrumb')
     <a href="admin/banner" class="btn btn-primary btn-sm">List</a>
@endsection
@section('content')

<form class="form-horizontal" role="form" action="{{ url('admin/banner', $data->id) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}   
<input type="hidden" name="_method" value="PUT" />          
<div class="col-md-12">
            <!-- Input Fields -->
            <div class="panel">
              <div class="panel-heading">
                <span class="panel-title">Edit Banner</span>
              </div>
              <div class="panel-body"> 
             
                  <div class="form-group">
                    <label for="inputStandard" class="col-lg-3 control-label">Title</label>
                    <div class="col-lg-6">
                      <div class="bs-component">
                        <input type="text" id="inputStandard" name="title" class="form-control"  value="{{$data->title}}" />
                      </div>
                    </div>
                  </div>
                  
                         <div class="form-group">
                    <label for="inputStandard" class="col-lg-3 control-label">Ordering</label>
                    <div class="col-lg-6">
                      <div class="bs-component">
                        <input type="text" id="inputStandard" name="banner_ordering" class="form-control" value="{{$data->banner_ordering}}" />
                      </div>
                    </div>
                  </div>

                   <div class="form-group">
                    <label for="inputStandard" class="col-lg-3 control-label">Caption</label>
                    <div class="col-lg-6">
                      <div class="bs-component">
                        <input type="text" id="inputStandard" name="caption" class="form-control" placeholder="" value="{{$data->caption}}" />
                      </div>
                    </div>
                  </div>
               
                  <div class="form-group">
                    <label class="col-lg-3 control-label" for="textArea2">Content</label>
                    <div class="col-lg-6">
                      <div class="bs-component">
                        <textarea class="form-control" id="textArea2" name="content" rows="3">{{$data->content }}</textarea>
                      </div>
                    </div>
                  </div>                 
                  
               <div class="form-group">
                    <label class="col-lg-3 control-label" for="banner">Banner</label>
                    <div class="col-lg-6">
                      <div class="bs-component">
                        <input type="file" class="form-control" name="picture"/>
                      </div> <br />
                       ( Width: 1900px, Height:560px all time fix size )
                    </div>
                    
                  </div>

                  @if($data->picture != '' OR $data->picture != null)
                  <div class="form-group">
                    <label class="col-lg-3 control-label" for="banner"></label>
                    <div class="col-lg-6">
                      <div class="bs-component">
                        <img src="{{url(env('PUBLIC_PATH').'uploads/banners/' . $data->picture )}}" width="70%" />
                      </div>
                    </div>
                  </div>                    
                  @endif
                  
                        <div class="form-group">
                    <label class="col-lg-3 control-label" for="link">Banner Video</label>
                    <div class="col-lg-6">
                      <div class="bs-component">
                        <input type="file" class="form-control" name="video"  />                 
                      </div>
                    </div>
                  </div> 
                   @if($data->video != '' OR $data->video != null)
                         <div class="form-group">
                    <label class="col-lg-3 control-label" for="link"></label>
                    <div class="col-lg-6">
                      <div class="bs-component">
                          <!--<a href="#{{ $data->id }}" class="bannerdelete">X</a>-->
            <video uk-video uk-cover preload="auto" width="100%" height="auto" loop playsinline
               autoplay muted data-setup='{"fluid": true,"controls": false,"loop":true}'>
               <source src="{{asset('uploads/videos/'.$data->video)}}" type="video/mp4" muted>
            </video>              
                      </div>
                    </div>
                  </div> 
                  @endif
                  
                  <!--    <div class="form-group">-->
                  <!--  <label class="col-lg-3 control-label" for="ordering">Show in Home</label>-->
                  <!--  <div class="col-lg-6">-->
                     
                  <!--      <select class="form-control" name="ordering">-->
                                   
                  <!--                  <option  @if($data->ordering=='yes') selected @endif value="yes">Yes</option>-->
                  <!--                  <option @if($data->ordering=='no')  selected @endif value="no">No</option>-->
                  <!--              </select>-->
                  <!--  </div>  -->
                  <!--</div> -->


                  <!--<div class="form-group">-->
                  <!--  <label class="col-lg-3 control-label" for="link">Youtube Link</label>-->
                  <!--  <div class="col-lg-6">-->
                  <!--    <div class="bs-component">-->
                  <!--      <input type="text" class="form-control" name="youtube_link" value="{{$data->youtube_link}}" placeholder="http://www.youtube.com" /> <br />                       -->
                  <!--    </div>-->
                  <!--  </div>-->
                  <!--</div> -->


                 <div class="form-group">
                    <label class="col-lg-3 control-label" for="link">Redirect Link</label>
                    <div class="col-lg-6">
                      <div class="bs-component">
                        <input type="text" class="form-control" name="link" value="{{$data->link}}" placeholder="http://www.google.com" /> <br />
                       
                      </div>
                    </div>
                  </div> 
                 
                  <div class="form-group">
                    <label class="col-lg-3 control-label" for=""></label>
                    <div class="col-lg-6">
                      <div class="bs-component">
                        <input type="submit" class="form-control btn btn-primary" name="submit" value="Submit" />
                      </div>
                    </div>
                  </div> 
                
              </div>
            </div>          
          </div>

          
          </form>
@endsection