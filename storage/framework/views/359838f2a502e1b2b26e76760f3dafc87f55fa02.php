<div class="col-md-12">

    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title"> Trip Schedule </span>
            <a class="btn btn-primary pull-right add-schedule" data-added="0"><i
                    class="glyphicon glyphicon-plus"></i> Add Row </a>
        </div>

        <div class="panel-body" id="row_schedule_body">
            <div class="row">
                <div class="col-md-1"><label>Ordering</label></div>
                <div class="col-md-2"><label>Start Date</label></div>
                <div class="col-md-2"><label>End Date</label></div>
                <div class="col-md-2"><label>Group Size</label></div>
                <div class="col-md-1"> <label>Availability</label></div>
                <div class="col-md-1"><label>Price</label></div>
                <div class="col-md-2"><label>Remarks</label></div>
                <div class="col-md-1"></div>
            </div>
            <?php if($schedules->count() > 0): ?>
                <?php $__currentLoopData = $schedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row" id="schedule-rec-<?php echo e($loop->iteration); ?>">
                        <input type="hidden" name="schedule_id[]" value="<?php echo e($row->id); ?>" />
                        <div class="col-md-1">
                            <input type="number" min="1" max="2000" name="schedule_ordering[]"
                                value="<?php echo e($row->ordering); ?>" class="form-control" placeholder="" />
                        </div>
                        <div class="col-md-2">
                            <input type="date" min="01-01-2021" max="31-12-2030" name="schedule_start_date[]"
                                value="<?php echo e($row->start_date); ?>" class="form-control" placeholder="DD-MM-YY" />
                        </div>
                        <div class="col-md-2">
                            <input type="date" min="01-01-2021" max="31-12-2030" name="schedule_end_date[]"
                                value="<?php echo e($row->end_date); ?>" class="form-control" placeholder="DD-MM-YY" />
                        </div>
                        <div class="col-md-2">
                            <input type="text" name="schedule_group_size[]"
                                value="<?php echo e($row->group_size); ?>" class="form-control" placeholder="" />
                        </div>
                        <div class="col-md-1">
                            <select name="schedule_availability[]" class="form-control">
                                <?php if($availability): ?>
                                    <?php $__currentLoopData = $availability; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aRow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($aRow); ?>"
                                            <?php echo e($row->availability == $aRow ? 'selected' : ''); ?>> <?php echo e($aRow); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="col-md-1">
                            <input type="text" name="schedule_price[]" value="<?php echo e($row->price); ?>" class="form-control"
                                placeholder="" />
                        </div>
                        <div class="col-md-2">
                            <input type="text" name="schedule_remarks[]" value="<?php echo e($row->remarks); ?>"
                                class="form-control" placeholder="" />
                        </div>
                        <div class="col-md-1"><button class="btn btn-danger delete-schedule"
                                schedule-rowid="<?php echo e($row->id); ?>" schedule-data-id="<?php echo e($loop->iteration); ?>"><i
                                    class="glyphicon glyphicon-trash"></i></button></div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>

        <div style="display:none;">
            <div id="row_schedule_additional">
                <div class="row">
                    <input type="hidden" name="schedule_id[]" value="" />
                    <div class="col-md-1"><input type="number" min="1" max="2000" name="schedule_ordering[]"
                            class="form-control" /></div>
                    <div class="col-md-2"><input type="date" min="01-01-2021" max="31-12-2030"
                            name="schedule_start_date[]" class="form-control" placeholder="DD-MM-YYYY" /></div>
                    <div class="col-md-2"><input type="date" min="01-01-2021" max="31-12-2030"
                            name="schedule_end_date[]" class="form-control" placeholder="DD-MM-YYYY" /></div>
                     <div class="col-md-2"><input type="text" name="schedule_group_size[]"
                            class="form-control" /></div>
                    <div class="col-md-1">
                        <select name="schedule_availability[]" class="form-control">
                            <?php if($availability): ?>
                                <?php $__currentLoopData = $availability; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($row); ?>"> <?php echo e($row); ?> </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="col-md-1"><input type="text" name="schedule_price[]" class="form-control"
                             /></div>
                    <div class="col-md-2"><input type="text" name="schedule_remarks[]" class="form-control"
                            /></div>
                    <div class="col-md-1"><button class="btn btn-danger delete-schedule" schedule-data-id="0"><i
                                class="glyphicon glyphicon-trash"></i></button></div>
                </div>
            </div>
        </div>

    </div>
</div>
<?php /**PATH /home/sevensummittreks/public_html/resources/views/admin/trips/edit/edit-trip-schedule.blade.php ENDPATH**/ ?>