@extends('admin.master')
@section('title', Request::segment(2))

@section('breadcrumb')
    <a href="{{ url('admin/region/create') }}" class="btn btn-primary btn-sm">Create</a>
    <a href="{{ url('admin/region') }}" class="btn btn-default btn-sm backlink"><i class="fa fa-list"
            aria-hidden="true"></i> Show List </a>
@endsection

@section('content')
    <form class="form-horizontal" role="form" action="{{ url('admin/region/' . $data->id) }}" method="post"
        enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT" />
        <div class="col-md-8">
            <!-- Input Fields -->
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">New Region </span>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label">Title</label>
                        <div class="col-lg-9">
                            <div class="bs-component">
                                <input type="text" id="title" name="title" class="form-control" value="{{ $data->title }}"
                                    placeholder="Title" />
                                <input type="hidden" id="uri" name="uri" value="{{ $data->uri }}" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label">Sub Title</label>
                        <div class="col-lg-9">
                            <div class="bs-component">
                                <input type="text" id="" name="sub_title" class="form-control"
                                    value="{{ $data->sub_title }}" placeholder="Sub Title" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label" for="textArea3"> Brief </label>
                        <div class="col-lg-9">
                            <div class="bs-component">
                                <textarea class="form-control my-editor" id="" name="excerpt"
                                    rows="9">{{ $data->excerpt }}</textarea>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Trip Content</span>
                </div>
                <div class="panel-body">
                    <div class="form-group">

                        <div class="col-lg-12">
                            <div class="bs-component">
                                <textarea class="form-control my-editor" id="" name="content"
                                    rows="30">{{ $data->content }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Trip Video</span>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-lg-12">
                            <div class="bs-component">
                                <input type="text" class="form-control" name="video" value="{{ $data->video }}" />
                                 Video Status : &nbsp;&nbsp; <input type="checkbox" name="video_status" value="1" {{ ($data->video_status)?"checked":"" }} />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Map and Meta data </span>
                </div>
                <div class="panel-body">

                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label">Meta Key</label>
                        <div class="col-lg-9">
                            <div class="bs-component">
                                <input type="text" id="" name="meta_keyword" class="form-control"
                                    value="{{ $data->meta_keyword }}" placeholder="Meta Key" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label" for="textArea3"> Meta Description </label>
                        <div class="col-lg-9">
                            <div class="bs-component">
                                <textarea class="form-control" id="textArea3" name="meta_description"
                                    rows="3">{{ $data->meta_description }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="admin-form">

                <div class="sid_bvijay mb10">
                    <div class="hd_show_con">
                        <div class="publice_edi">
                            Status: <a href="avoid:javascript;" data-toggle="collapse" data-target="#publish_1">{{ $data->status == '1'?'Active':'Inactive' }}</a>
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
                <?php /*?>
                <div class="sid_bvijay mb10">
                    <label class="field select">
                        <select id="template" name="template">
                            @foreach ($templates as $key => $template)
                                <option value="{{ $key }}"
                                    {{ $template == $data->template ? 'selected' : '' }}>
                                    {{ ucfirst($template) }} </option>
                            @endforeach
                        </select>
                        <i class="arrow"></i>
                    </label>
                </div>

             <div class="sid_bvijay mb10">
                    <h4> Activities </h4>
                    <div class="hd_show_con">
                        <div class="tab-content mb15">
                            <div id="tab1" class="tab-pane active">
                                @if ($activities->count() > 0)
                                    <ul class="ctgor">
                                        @foreach ($activities as $row)
                                            <li>
                                                <label class="option">
                                                    <input type="checkbox" name="activity[]" value="{{ $row->id }}"
                                                        {{ in_array($row->id, $checked_activities) ? 'checked' : '' }}>
                                                    <span class="checkbox"></span> {{ $row->title }}
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>  
                <?php */?>

                <div class="sid_bvijay mb10">
                    <label class="field text">
                        <input type="number" id="" name="ordering" class="form-control" placeholder="Ordering"
                            value="{{ $data->ordering }}" />
                    </label>
                </div>

                <div class="sid_bvijay mb10">
                    <h4> Thumbnail </h4>
                    <div class="hd_show_con">
                        @if ($data->banner)
                            <span class="id{{ $data->id }}">
                                <a href="#{{ $data->id }}" class="imagedelete">X</a>
                                <img src="{{ asset(env('PUBLIC_PATH') . 'uploads/banners/' . $data->banner) }}"
                                    width="100%" />
                                <hr />
                            </span>
                        @endif
                        <div id="xedit-demo">
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
        $('.imagedelete').on('click', function(e) {
            e.preventDefault();
            if (!confirm('Are you sure to delete?')) return false;
            var csrf = $('meta[name="csrf-token"]').attr('content');
            var str = $(this).attr('href');
            var id = str.slice(1);
            $.ajax({
                type: 'delete',
                url: "{{ url('delete_region_banner') . '/' }}" + id,
                data: {
                    _token: csrf
                },
                success: function(data) {
                    $('span.id' + id).remove();
                },
                error: function(data) {
                    alert(data + 'Error!');
                }
            });
        });

        $(document).ready(function() {
            $('#title').on('keyup', function() {
                var title;
                title = $('#title').val();
                title = title.replace(/[^a-zA-Z0-9 ]+/g, "");
                title = title.replace(/\s+/g, "-");
                $('#uri').val(title);
            });
        });

        // Go back link
        $('.backlink').click(function() {
            var url = '<?= url()->previous() ?>';
            window.location = url;
        });

    </script>
@endsection
