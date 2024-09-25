@extends('admin.master')
@section('breadcrumb')
    <a href="{{ route('admin.tripvideos.index', Request::segment(2)) }}" class="btn btn-primary btn-sm">List</a>
@endsection
@section('content')
    <div class="alert" id="message" style="display: none"></div>
    <form class="form-horizontal" id="upload_image1" role="form"
        action="{{ route('admin.tripvideos.store', Request::segment(2)) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="col-md-8">
            <!-- Input Fields -->
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Add Video</span>
                </div>
                <div class="panel-body">
                    <input type="hidden" name="trip_id" value="{{ $trip }}">

                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-3 control-label"> Youtube Video ID </label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <input type="text" name="video" id="video" class="form-control" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-3 control-label"> Video Caption </label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <input type="text" name="video_caption" id="video_caption" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-3 control-label"> Ordering </label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <input type="number" name="ordering" id="ordering" class="form-control" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-3 control-label"> </label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr>


        </div>

        <div class="col-md-4">
            <div class="admin-form">
                <div class="sid_bvijay mb10">


                </div>
            </div>
        </div>
    </form>
@endsection

@section('libraries')
    <script type="text/javascript">
        $('document').ready(function() {

        });

    </script>
@endsection
