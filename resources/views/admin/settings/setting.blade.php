@extends('admin.master')
@section('title','Setting')
@section('breadcrumb')
@endsection
@section('content')

    <form class="form-horizontal" role="form" action="{{ url('admin/settings',1) }}" method="post"
          enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT"/>
        <div class="col-md-9">
            <!-- Input Fields -->
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Settings</span>
                </div>
                <div class="panel-body">

                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label">Site Name</label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <input type="text" id="" name="site_name" class="form-control" placeholder=""
                                       value="{{$data->site_name}}"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label">Phone</label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <input type="text" id="inputStandard" name="phone" class="form-control" placeholder=""
                                       value="{{$data->phone}}"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label">Email Primary</label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <input type="text" id="inputStandard" name="email_primary" class="form-control"
                                       placeholder="" value="{{$data->email_primary}}"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label">Email Secondary</label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <input type="text" id="inputStandard" name="email_secondary" class="form-control"
                                       placeholder="" value="{{$data->email_secondary}}"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label">Facebook Link</label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <input type="text" id="inputStandard" name="facebook_link" class="form-control"
                                       placeholder="" value="{{$data->facebook_link}}"/>
                            </div>
                        </div>
                    </div>
                 
                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label"> Twitter Link </label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <input type="text" id="inputStandard" name="twitter_link" class="form-control"
                                       placeholder="" value="{{$data->twitter_link}}"/>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label">Youtube Link</label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <input type="text" id="inputStandard" name="youtube_link" class="form-control"
                                       value="{{$data->youtube_link}}"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label">Instagram Link</label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <input type="text" id="inputStandard" name="google_plus" class="form-control"
                                       value="{{$data->google_plus}}"/>
                            </div>
                        </div>
                    </div>
                       <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label">Footer Text 1</label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <input type="text" id="inputStandard" name="text1" class="form-control"
                                       value="{{$data->text1}}"/>
                            </div>
                        </div>
                    </div>
                       <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label">Footer Text 2</label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <input type="text" id="inputStandard" name="text2" class="form-control"
                                       value="{{$data->text2}}"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label">Meta Key</label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                 <textarea class="form-control" id="contentEditor5" name="meta_key"
                                          rows="12">{{$data->meta_key}}</textarea>
                                          </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label">Meta Description</label>
                        <div class="col-lg-8">
                            <div class="bs-component"> <textarea class="form-control" id="contentEditor5" name="meta_description"
                                          rows="12">{{$data->meta_description}}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label" for="textArea2">Location</label>
                        <div class="col-lg-9">
                            <div class="bs-component">
                                <input type="text" class="form-control" id="contentEditor4" name="address"
                                       value="{{$data->address}}"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label" for="textArea2">Post Box No.</label>
                        <div class="col-lg-9">
                            <div class="bs-component">
                                <input type="text" class="form-control" id="contentEditor2" name="welcome_text"
                                       value="{{$data->welcome_text}}"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label" for="textArea2"> Google Map Link </label>
                        <div class="col-lg-9">
                            <div class="bs-component">
                                <textarea class="form-control" id="contentEditor1" name="google_map"
                                          rows="3">{{$data->google_map}}</textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-lg-2 control-label" for="textArea2"> Google Map iframe</label>
                        <div class="col-lg-9">
                            <div class="bs-component">
                                <textarea class="form-control" id="contentEditor1" name="google_map2"
                                          rows="3">{{$data->google_map2}}</textarea>
                            </div>
                        </div>
                    </div>

                    <!--<div class="form-group">-->
                    <!--    <label class="col-lg-2 control-label" for="textArea2"> Contact Person </label>-->
                    <!--    <div class="col-lg-9">-->
                    <!--        <div class="bs-component">-->
                    <!--            <textarea class="form-control" id="contentEditor5" name="google_map2"-->
                    <!--                      rows="3">{{$data->google_map2}}</textarea>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->

                    <div class="form-group">
                        <label class="col-lg-2 control-label" for="textArea2">Copyright Text</label>
                        <div class="col-lg-9">
                            <div class="bs-component">
                                <textarea class="form-control" id="contentEditor3" name="copyright_text"
                                          rows="3">{{$data->copyright_text}}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label" for=""></label>
                        <div class="col-lg-6">
                            <div class="bs-component">
                                <input type="submit" class="form-control btn btn-primary" name="submit" value="Submit"/>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
         <div class="col-md-3">
        <div class="admin-form">
            
        <div class="sid_ mb10">
          <h4> Logo </h4>
            <div class="hd_show_con">
            <div id="xedit-demo">
              
              @if($data->logo)
              <span class="logo{{$data->id}}">
            <a href="{{$data->id}}" id="remove_logo"><span>X</span></a>
               <a href="{{asset('uploads/original/'.$data->logo)}}" target="_blank"><img src="{{asset('uploads/original/'.$data->logo)}}" name="logo" width="150"/></a>
              <hr>
              </span>
              @endif
              <input type="file" name="logo" class="form-control"/>
            </div>
          </div>
        </div>

        <div class="sid_ mb10">
          <h4> Banner </h4>
            <div class="hd_show_con">
            <div id="xedit-demo">
            @if($data->banner_logo != null)
              <span class="banner_logo{{$data->id}}">
            <a href="{{$data->id}}" id="remove_banner_logo"><span>X</span></a>
                <a href="{{asset('uploads/original/'.$data->banner_logo)}}" target="_blank"><img src="{{asset('uploads/original/'.$data->banner_logo)}}" name="banner_logo" width="150"/></a>
              <hr>
              </span>
              @endif
            <input type="file" name="banner_logo" class="form-control"/>
            </div>
          </div>
        </div>
        
        <div class="sid_ mb10">
          <h4> Mobile Banner </h4>
            <div class="hd_show_con">
            <div id="xedit-demo">
              @if($data->mobile_banner_logo)
              <span class="mobile_logo{{$data->id}}">
            <a href="{{$data->id}}" id="remove_mobile_logo"><span>X</span></a>
                 <a href="{{asset('uploads/original/'.$data->mobile_banner_logo)}}" target="_blank"> <img src="{{asset('/uploads/original/'.$data->mobile_banner_logo)}}" name="mobile_logo"  width="150"/></a>
              <hr>
              </span>
              @endif
            <input type="file" name="mobile_logo" class="form-control"/>
            </div>
          </div>
        </div>
         <div class="sid_ mb10">
          <h4> Testimonial Banner </h4>
            <div class="hd_show_con">
            <div id="xedit-demo">
              @if($data->testimonial_img)
              <span class="testimonial_img{{$data->id}}">
                <a href="{{$data->id}}" id="remove_testimonial_img"><span>X</span></a>
                 <a href="{{asset('uploads/original/'.$data->testimonial_img)}}" target="_blank"> <img src="{{asset('/uploads/original/'.$data->testimonial_img)}}" name="testimonial_img"  width="150"/></a>
                 <hr>
              </span>
              @endif
            <input type="file" name="testimonial_img" class="form-control"/>
            </div>
          </div>
        </div>
         <div class="sid_ mb10">
          <h4> Testimonial Banner (mobile) </h4>
            <div class="hd_show_con">
            <div id="xedit-demo">
              @if($data->testimonial_img_sm)
              <span class="testimonial_img_sm{{$data->id}}">
            <a href="{{$data->id}}" id="remove_testimonial_img_sm"><span>X</span></a>
                 <a href="{{asset('uploads/original/'.$data->testimonial_img_sm)}}" target="_blank"> <img src="{{asset('/uploads/original/'.$data->testimonial_img_sm)}}" name="testimonial_img_sm"  width="150"/></a>
              <hr>
              </span>
              @endif
            <input type="file" name="testimonial_img_sm" class="form-control"/>
            </div>
          </div>
        </div>
        
        <div class="sid_ mb10">
          <h4>Footer Animation 1 </h4>
            <div class="hd_show_con">
            <div id="xedit-demo">
              @if($data->animation1)
              <span class="animation1{{$data->id}}">
            <a href="{{$data->id}}" id="remove_animation1"><span>X</span></a>
                 <a href="{{asset('uploads/original/'.$data->animation1)}}" target="_blank"> <img src="{{asset('/uploads/original/'.$data->animation1)}}" name="animation1"  width="150"/></a>
              <hr>
              </span>
              @endif
            <input type="file" name="animation1" class="form-control"/>
            </div>
          </div>
        </div>
        
        <div class="sid_ mb10">
          <h4> Footer Animation 2 </h4>
            <div class="hd_show_con">
            <div id="xedit-demo">
              @if($data->animation2)
              <span class="animation2{{$data->id}}">
            <a href="{{$data->id}}" id="remove_animation2"><span>X</span></a>
                 <a href="{{asset('uploads/original/'.$data->animation2)}}" target="_blank"> <img src="{{asset('/uploads/original/'.$data->animation2)}}" name="animation2"  width="150"/></a>
              <hr>
              </span>
              @endif
            <input type="file" name="animation2" class="form-control"/>
            </div>
          </div>
        </div>

      </div>
    </div>


    </form>
   
@endsection
@section('scripts')
    <script type="text/javascript">
        (function ($) {
            $('#remove_logo').on('click', function (e) {
                e.preventDefault();
                if (confirm('Are you sure to delete??')) {
                    var csrf = $('meta[name="csrf-token"]').attr('content');
                    var id = $(this).attr('href');
                    var url = '{{ route("settings.destroy",["setting"=>':id']) }}';

                    url = url.replace(':id', id);
                    $.ajax({
                        type: 'delete',
                        url: url,
                        data: {_token: csrf},
                        success: function (data) {
                            $('.logo' + id).remove();
                        },
                        error: function (data) {
                            alert('Error occurred!');
                        }
                    });
                }
            });

        }(jQuery));

        (function ($) {
            $('#remove_banner_logo').on('click', function (e) {
                e.preventDefault();
                if (confirm('Are you sure to delete??')) {
                    var csrf = $('meta[name="csrf-token"]').attr('content');
                    var id = $(this).attr('href');
                    var url = '{{ route('banner-destroy',['id'=>':id']) }}';
                    // alert(url);
                    url = url.replace(':id', id);
                    $.ajax({
                        type: 'get',
                        url: url,
                        data: {_token: csrf},
                        success: function (data) {
                            $('.banner_logo' + id).remove();
                        },
                        error: function (data) {
                            alert('Error occurred!');
                        }
                    });
                }
            });

        }(jQuery));

        (function ($) {
            $('#remove_mobile_logo').on('click', function (e) {
                e.preventDefault();
                if (confirm('Are you sure to delete??')) {
                    var csrf = $('meta[name="csrf-token"]').attr('content');
                    var id = $(this).attr('href');
                    var url = '{{ route('mob-banner-destroy',['id'=>':id']) }}';
                    // alert(url);
                    url = url.replace(':id', id);
                    $.ajax({
                        type: 'get',
                        url: url,
                        data: {_token: csrf},
                        success: function (data) {
                            $('.mobile_logo' + id).remove();
                        },
                        error: function (data) {
                            alert('Error occurred!');
                        }
                    });
                }
            });

        }(jQuery));
        
         (function ($) {
            $('#remove_testimonial_img').on('click', function (e) {
                e.preventDefault();
                if (confirm('Are you sure to delete??')) {
                    var csrf = $('meta[name="csrf-token"]').attr('content');
                    var id = $(this).attr('href');
                    var url = '{{ route('testimonial_img-destroy',['id'=>':id']) }}';
                    // alert(url);
                    url = url.replace(':id', id);
                    $.ajax({
                        type: 'get',
                        url: url,
                        data: {_token: csrf},
                        success: function (data) {
                            $('.testimonial_img' + id).remove();
                        },
                        error: function (data) {
                            alert('Error occurred!');
                        }
                    });
                }
            });

        }(jQuery));
        
         (function ($) {
            $('#remove_testimonial_img_sm').on('click', function (e) {
                e.preventDefault();
                if (confirm('Are you sure to delete??')) {
                    var csrf = $('meta[name="csrf-token"]').attr('content');
                    var id = $(this).attr('href');
                    var url = '{{ route('testimonial_img_sm-destroy',['id'=>':id']) }}';
                    // alert(url);
                    url = url.replace(':id', id);
                    $.ajax({
                        type: 'get',
                        url: url,
                        data: {_token: csrf},
                        success: function (data) {
                            $('.testimonial_img_sm' + id).remove();
                        },
                        error: function (data) {
                            alert('Error occurred!');
                        }
                    });
                }
            });

        }(jQuery));
        
         (function ($) {
            $('#remove_animation1').on('click', function (e) {
                e.preventDefault();
                if (confirm('Are you sure to delete??')) {
                    var csrf = $('meta[name="csrf-token"]').attr('content');
                    var id = $(this).attr('href');
                    var url = '{{ route('animation1-destroy',['id'=>':id']) }}';
                    // alert(url);
                    url = url.replace(':id', id);
                    $.ajax({
                        type: 'get',
                        url: url,
                        data: {_token: csrf},
                        success: function (data) {
                            $('.animation1' + id).remove();
                        },
                        error: function (data) {
                            alert('Error occurred!');
                        }
                    });
                }
            });

        }(jQuery));
        
         (function ($) {
            $('#remove_animation2').on('click', function (e) {
                e.preventDefault();
                if (confirm('Are you sure to delete??')) {
                    var csrf = $('meta[name="csrf-token"]').attr('content');
                    var id = $(this).attr('href');
                    var url = '{{ route('animation2-destroy',['id'=>':id']) }}';
                    // alert(url);
                    url = url.replace(':id', id);
                    $.ajax({
                        type: 'get',
                        url: url,
                        data: {_token: csrf},
                        success: function (data) {
                            $('.animation2' + id).remove();
                        },
                        error: function (data) {
                            alert('Error occurred!');
                        }
                    });
                }
            });

        }(jQuery));
    </script>:
@endsection
