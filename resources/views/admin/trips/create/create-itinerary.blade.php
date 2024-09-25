<div class="col-md-12">
    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title"> Trip Itinerary </span>
            <a class="btn btn-primary pull-right add-itinerary" data-added="0"><i
                    class="glyphicon glyphicon-plus"></i> Add Row </a>
        </div>
        <div class="panel-body" id="row_body">
        <div class="row">
                <div class="col-md-1"> <label>Ordering </label></div>
                <div class="col-md-1"> <label>Meals</label></div>
                <div class="col-md-2"> <label>Category</label></div>
                <div class="col-md-3"> <label>Title</label></div>
                <div class="col-md-4"> <label>Description</label></div>
                <div class="col-md-1"> </div>
            </div>
            <div class="row" id="rec-1">
            </div>
        </div>

        <div style="display:none;">
            <div id="row_additional">
                <div class="row">
                    <div class="col-md-1"> <input type="number" min="1" max="2000" name="itinerary_ordering[]"
                            class="form-control" placeholder="" /></div>
                    <div class="col-md-1"><input type="text" name="itinerary_days[]" class="form-control"
                            placeholder="" /></div>
                            
                <div class="col-md-2">
                        <select name="category_id[]" class="form-control">
                            @if ($itineraryCategory)
                                @foreach ($itineraryCategory as $row)
                                    <option value="{{ $row->id }}"> {{ $row->category }} </option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="col-md-3"><input type="text" name="itinerary_title[]" class="form-control"
                            placeholder="" /></div>
                    <div class="col-md-4"><input type="text" name="itinerary_content[]" class="form-control"
                            placeholder="" /></div>
                    <div class="col-md-1"><button class="btn btn-danger delete-itinerary" itinerary-data-id="0"><i
                                class="glyphicon glyphicon-trash"></i></button></div>
                </div>
            </div>
        </div>


    </div>
</div>
