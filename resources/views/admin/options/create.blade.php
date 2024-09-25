@extends('admin.master')
@section('breadcrumb')
    <a href="{{ route('options.index') }}" class="btn btn-primary btn-sm">List</a>
@endsection
@section('content')
    <div class="alert" id="message" style="display: none"></div>
    <form class="form-horizontal" role="form" action="{{ route('options.store') }}" method="post"
        enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="col-md-8">
            <!-- Input Fields -->
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Add Options</span>
                </div>
                <div class="panel-body">

                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label"> Title </label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <input type="text" name="title" id="title" class="form-control" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label"> Key Name </label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <input type="text" name="key_name" id="key_name" class="form-control" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label"> Content </label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <input type="text" name="content" class="form-control" />
                            </div>
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label"> Sign </label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <input type="text" name="sign" class="form-control" />
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label"> </label>
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
        $(document).ready(function() {
            $('#title').on('keyup', function() {
                var title;
                title = $('#title').val();
                title = title.replace(/[^a-zA-Z0-9 ]+/g, "");
                title = title.replace(/\s+/g, "-");
                title = title.toLowerCase();
                $('#key_name').val(title);
            });
        });

    </script>
@endsection
