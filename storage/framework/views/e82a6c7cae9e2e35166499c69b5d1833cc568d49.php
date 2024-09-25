<div class="col-md-12">
    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title"> Trip Gear </span>
            <a class="btn btn-primary pull-right add-gear" data-added="0"><i class="glyphicon glyphicon-plus"></i> Add
                Row </a>
        </div>

        <div class="panel-body" id="row_gear_body">
            <div class="row">
                <div class="col-md-1"><label>Ordering</label></div>
                <div class="col-md-2"><label>Title</label></div>
                <div class="col-md-4"><label>Content</label></div>
                <div class="col-md-2"><label>Video</label></div>
                <div class="col-md-2"><label>Thumbnail</label></div>
                <div class="col-md-1"></div>
            </div>
            <?php if($gears->count() > 0): ?>
                <?php $__currentLoopData = $gears; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row" id="gear-rec-<?php echo e($loop->iteration); ?>">
                        <input type="hidden" name="gear_id[]" value="<?php echo e($row->id); ?>" />
                        <div class="col-md-1">
                            <input type="number" min="1" max="2000" name="gear_ordering[]"
                                value="<?php echo e($row->ordering); ?>" class="form-control" placeholder="" />
                        </div>
                        <div class="col-md-2">
                            <input type="text" name="gear_title[]" value="<?php echo e($row->title); ?>" class="form-control"
                                placeholder="" />
                        </div>
                        <div class="col-md-4">
                            <textarea class="form-control" name="gear_content[]"
                                      rows="3"><?php echo e($row->content); ?></textarea>


                        </div>
                        <div class="col-md-2">
                            <input type="text" name="gear_video[]" value="<?php echo e($row->video); ?>" class="form-control"
                                placeholder="" />
                        </div>
                        <div class="col-md-2">
                            <input type="file" name="gear_thumbnail[]" class="form-control gearthumb"
                                file-rowid="<?php echo e($row->id); ?>" />
                            <?php if($row->thumbnail): ?>
                                <span class="del-<?php echo e($row->id); ?>">
                                    <img src="<?php echo e(asset('uploads/original/' . $row->thumbnail)); ?>" width="60"
                                        height="60" />
                                    <a href="<?php echo e($row->id); ?>" class="delete_gear_thumb">X</a>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-1"><button class="btn btn-danger delete-gear"
                                gear-rowid="<?php echo e($row->id); ?>" gear-data-id="<?php echo e($loop->iteration); ?>"><i
                                    class="glyphicon glyphicon-trash"></i></button></div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>

        <div style="display:none;">
            <div id="row_gear_additional">
                <div class="row">
                    <input type="hidden" name="gear_id[]" value="" />
                    <div class="col-md-1"><input type="number" min="1" max="2000" name="gear_ordering[]"
                            class="form-control" placeholder="" /></div>
                    <div class="col-md-2"><input type="text" name="gear_title[]" class="form-control" placeholder="" />
                    </div>
                    <div class="col-md-4"><input type="text" name="gear_content[]" class="form-control"
                            placeholder="" /></div>
                    <div class="col-md-2"><input type="text" name="gear_video[]" class="form-control" placeholder="" />
                    </div>
                    <div class="col-md-2"><input type="file" name="gear_thumbnail[]" class="form-control gearthumb" />
                     <small> (Width: 1600px Height: 1200px) </small>
                    </div>
                    <div class="col-md-1"><button class="btn btn-danger delete-gear" gear-data-id="0"><i
                                class="glyphicon glyphicon-trash"></i></button></div>
                </div>
            </div>
        </div>


    </div>


</div>
<?php /**PATH /home/sevensummittreks/public_html/resources/views/admin/trips/edit/edit-gear.blade.php ENDPATH**/ ?>