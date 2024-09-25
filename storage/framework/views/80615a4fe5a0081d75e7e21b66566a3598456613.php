<div class="col-md-12">
    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title"> Trip Gear </span>
            <a class="btn btn-primary pull-right add-gear" data-added="0"><i class="glyphicon glyphicon-plus"></i> Add
                Row </a>
        </div>

        <div class="panel-body" id="row_gear_body">
            <div class="row">
                <div class="col-md-1">
                    <label>Ordering</label>

                </div>
                <div class="col-md-2">
                    <label>Title</label>

                </div>
                <div class="col-md-4">
                    <label>Content</label>

                </div>
                <div class="col-md-2">
                    <label>Video</label>

                </div>
                <div class="col-md-2">
                    <label>Thumbnail</label>

                </div>
                <div class="col-md-1"></div>
            </div>
            <div class="row" id="gear-rec-1">

            </div>
        </div>

        <div style="display:none;">
            <div id="row_gear_additional">
                <input type="hidden" name="gear_id[]" value="" />
                <div class="row">
                    <div class="col-md-1"><input type="number" min="1" max="2000" name="gear_ordering[]"
                            class="form-control" placeholder="" /></div>
                    <div class="col-md-2"><input type="text" name="gear_title[]" class="form-control" placeholder="" />
                    </div>
                    <div class="col-md-4">


                        <textarea class="form-control" name="gear_content[]"
                                  rows="3"></textarea>
                    </div>
                    <div class="col-md-2"><input type="text" name="gear_video[]" class="form-control" placeholder="" />
                    </div>
                    <div class="col-md-2"><input type="file" name="gear_thumbnail[]" class="form-control" />
                     <small> (Width: 1600px Height: 1200px) </small>
                    </div>
                    <div class="col-md-1"><button class="btn btn-danger delete-gear" schedule-data-id="0"><i
                                class="glyphicon glyphicon-trash"></i></button></div>
                </div>
            </div>
        </div>


    </div>


</div>
<?php /**PATH /home/sevensummittreks/public_html/resources/views/admin/trips/create/create-gear.blade.php ENDPATH**/ ?>