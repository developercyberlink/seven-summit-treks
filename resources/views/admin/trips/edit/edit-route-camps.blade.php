<div class="col-md-12">
    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title"> Route Camp </span>
            <a class="btn btn-primary pull-right add-routecamp" data-added="0"><i class="glyphicon glyphicon-plus"></i> Add
                Row </a>
        </div>

        <div class="panel-body" id="row_routecamp_body">
            <div class="row">
                <div class="col-md-1"><label>Ordering </label></div>
                <div class="col-md-3"><label>Title</label> </div>
                <div class="col-md-7"><label>Content</label> </div>
                <div class="col-md-1"></div>
            </div>
            @if ($routecamp->count() > 0)
                @foreach ($routecamp as $row)
                    <div class="row" id="routecamp-rec-{{ $loop->iteration }}">
                        <input type="hidden" name="routecamp_id[]" value="{{ $row->id }}" />
                        <div class="col-md-1">
                            <input type="number" min="1" max="2000" name="routecamp_ordering[]"
                                value="{{ $row->ordering }}" class="form-control" />
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="routecamp_title[]" value="{{ $row->title }}" class="form-control"
                                />
                        </div>
                        <div class="col-md-7">
                            <input type="text" name="routecamp_content[]" value="{{ $row->content }}" class="form-control"
                                />
                        </div>
                        <div class="col-md-1"><button class="btn btn-danger delete-routecamp"
                                routecamp-rowid="{{ $row->id }}" routecamp-data-id="{{ $loop->iteration }}"><i
                                    class="glyphicon glyphicon-trash"></i></button></div>
                    </div>
                @endforeach
            @endif
        </div>

        <div style="display:none;">
            <div id="row_routecamp_additional">
                <div class="row">
                    <input type="hidden" name="routecamp_id[]" value="" />
                    <div class="col-md-1"><input type="number" min="1" max="2000" name="routecamp_ordering[]"
                            class="form-control" placeholder="" /></div>
                    <div class="col-md-3"><input type="text" name="routecamp_title[]" class="form-control"  />
                    </div>
                    <div class="col-md-7"><input type="text" name="routecamp_content[]" class="form-control"
                             /></div>
                    <div class="col-md-1"><button class="btn btn-danger delete-routecamp" routecamp-data-id="0"><i
                                class="glyphicon glyphicon-trash"></i></button></div>
                </div>
            </div>
        </div>

    </div>


</div>
