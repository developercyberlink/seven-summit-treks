<div class="col-md-12">
    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title"> Trip FAQs </span>
            <a class="btn btn-primary pull-right add-faq" data-added="0"><i class="glyphicon glyphicon-plus"></i> Add
                Row </a>
        </div>

        <div class="panel-body" id="row_faq_body">

            <div class="row">
                <div class="col-md-1"><label>Ordering</label></div>
                <div class="col-md-3"><label>Title</label> </div>
                <div class="col-md-7"><label>Content</label></div>
                <div class="col-md-1"></div>
            </div>

            <?php if($faqs->count() > 0): ?>
                <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row" id="faq-rec-<?php echo e($loop->iteration); ?>">
                        <input type="hidden" name="faq_id[]" value="<?php echo e($row->id); ?>" />
                        <div class="col-md-1">
                            <input type="number" min="1" max="2000" name="faq_ordering[]" value="<?php echo e($row->ordering); ?>"
                                class="form-control" placeholder="" />
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="faq_title[]" value="<?php echo e($row->title); ?>" class="form-control"
                                placeholder="" />
                        </div>
                        <div class="col-md-7">
                            <input type="text" name="faq_content[]" value="<?php echo e($row->content); ?>" class="form-control"
                                placeholder="" />
                        </div>
                        <div class="col-md-1"><button class="btn btn-danger delete-faq" faq-rowid="<?php echo e($row->id); ?>"
                                faq-data-id="<?php echo e($loop->iteration); ?>"><i
                                    class="glyphicon glyphicon-trash"></i></button>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>

        <div style="display:none;">
            <div id="row_faq_additional">
                <div class="row">
                    <input type="hidden" name="faq_id[]" value="" />
                    <div class="col-md-1"><input type="number" name="faq_ordering[]" class="form-control"
                            placeholder="" /></div>
                    <div class="col-md-3"><input type="text" name="faq_title[]" class="form-control" placeholder="" />
                    </div>
                    <div class="col-md-7"><input type="text" name="faq_content[]" class="form-control" placeholder="" />
                    </div>
                    <div class="col-md-1"><button class="btn btn-danger delete-faq" faq-data-id="0"><i
                                class="glyphicon glyphicon-trash"></i></button></div>
                </div>
            </div>
        </div>

    </div>
</div>
<?php /**PATH /home/sevensummittreks/public_html/resources/views/admin/trips/edit/edit-faqs.blade.php ENDPATH**/ ?>