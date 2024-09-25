@extends('admin.master')
@section('breadcrumb')
    <a href="{{ route('admin.tripvideos.index', Request::segment(2)) }}" class="btn btn-primary btn-sm">List</a>
@endsection
@section('content')
    <div class="alert" id="message" style="display: none"></div>
    <form class="form-horizontal" id="upload_image1" role="form"
        action="{{ route('admin.tripvideos.update', ['admin' => Request::segment(2), 'tripvideo' => $data->id]) }}"
        method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT" />
        <div class="col-md-8">
            <!-- Input Fields -->
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Edit Trip Video</span>
                </div>
                <div class="panel-body">
                    <input type="hidden" name="trip_id" value="{{ $trip }}">
                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-3 control-label"> Youtube Video ID </label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <input type="text" name="video" id="video" class="form-control"
                                    value="{{ $data->video ? $data->video : '' }}" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-3 control-label"> Video Caption </label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <input type="text" name="video_caption" id="video_caption"
                                    value="{{ $data->video_caption ? $data->video_caption : '' }}" class="form-control" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-3 control-label"> Ordering </label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <input type="number" name="ordering" id="ordering"
                                    value="{{ $data->ordering ? $data->ordering : '' }}" class="form-control" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-3 control-label"> </label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <input type="submit" name="submit" class="btn btn-primary" value="Update" />
                            </div>
                        </div>
                    </div>

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
