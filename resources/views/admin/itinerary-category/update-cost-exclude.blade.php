<div class="col-md-12">
    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title"> Cost Excludes </span>
            <a class="btn btn-primary pull-right add-info" data-added="0"><i class="glyphicon glyphicon-plus"></i> Add
                Row </a>
        </div>

        <div class="panel-body" id="row_info_body">
            <div class="row">
                <div class="col-md-1"><label>Ordering</label>

                </div>
                <div class="col-md-3"><label>Title</label>

                </div>
                <div class="col-md-7"><label>Content</label>

                </div>
                <div class="col-md-1">
                </div>
            </div>
            @if ($cost_excludes->count() > 0)
                @foreach ($cost_excludes as $row)
                    <div class="row" id="info-rec-{{ $loop->iteration }}">
                        <input type="hidden" name="info_id[]" value="{{ $row->id }}" />
                        <div class="col-md-1">
                            <input type="number" min="1" max="2000" name="info_ordering[]"
                                value="{{ $row->ordering }}" class="form-control" placeholder="" />
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="info_title[]" value="{{ $row->title }}" class="form-control"
                                placeholder="" />
                        </div>
                        <div class="col-md-7">
                            <input type="text" name="info_content[]" value="{{ $row->content }}" class="form-control"
                                placeholder="" />
                        </div>
                        <div class="col-md-1"><button class="btn btn-danger delete-info"
                                info-rowid="{{ $row->id }}" info-data-id="{{ $loop->iteration }}"><i
                                    class="glyphicon glyphicon-trash"></i></button></div>
                    </div>
                @endforeach
            @endif
        </div>

        <div style="display:none;">
            <div id="row_info_additional">
                <div class="row">
                  <input type="hidden" name="info_id[]" value="" />

                    <div class="col-md-1"><input type="number" min="1" max="2000" name="info_ordering[]"
                            class="form-control" placeholder="" /></div>
                    <div class="col-md-3"><input type="text" name="info_title[]" class="form-control" placeholder="" />
                    </div>
                    <div class="col-md-7"><input type="text" name="info_content[]" class="form-control"
                            placeholder="" /></div>
                    <div class="col-md-1"><button class="btn btn-danger delete-info" info-data-id="0"><i
                                class="glyphicon glyphicon-trash"></i></button></div>
                </div>
            </div>
        </div>


    </div>


</div>
