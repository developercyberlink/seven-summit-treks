@extends('admin.master')
@section('title', '')
@section('breadcrumb')
    <a href="{{ route('expedition-group.index') }}" class="btn btn-primary btn-sm">List</a>
@endsection
@section('content')
    <form class="form-horizontal" role="form" action="{{ route('expedition-group.store') }}" method="post">
        {{ csrf_field() }}
        <div class="col-md-9">
            <!-- Input Fields -->
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Add Expedition Group</span>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-3 control-label"> Expedition </label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                @if ($expeditions->count() > 0)
                                    <select name="expedition" class="form-control" required>
                                        <option value=""> Select Expedition </option>
                                        @foreach ($expeditions as $row)
                                            <option value="{{ $row->id }}"> {{ $row->title }} </option>
                                        @endforeach
                                    </select>
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-3 control-label">Title </label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <input type="text" name="group_title" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-3 control-label"> content </label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <textarea type="text" name="description" class="form-control"> </textarea>
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
                    <label class="field">
                        <input type="number" id="ordering" name="ordering" class="form-control"
                            value="{{ $ordering }}" />
                    </label>
                </div>

            </div>
        </div>

    </form>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#title').on('keyup', function() {
                var title;
                title = $('#title').val();
                title = title.replace(/[^a-zA-Z0-9 ]+/g, "");
                title = title.replace(/\s+/g, "-");
                $('#uri').val(title);
            });
        });

    </script>
@endsection
