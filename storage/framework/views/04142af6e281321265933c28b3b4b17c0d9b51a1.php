<div class="col-md-12">
<div class="panel">
  <div class="panel-heading">
    <span class="panel-title"> Member's Achievements</span>
    <a class="btn btn-primary pull-right add-achievement" data-added="0"><i class="glyphicon glyphicon-plus"></i> Add Row </a>
  </div>
 <div class="panel-body" id="row_achievement_body">     
        <div class="row">             
            <div class="col-md-1">  <label>Ordering</label> </div>
            <div class="col-md-10">  <label>Title</label> </div>           
            <div class="col-md-1">  <label>Action</label> </div>
        </div>       

 
   <?php if($achievements->count() > 0): ?> 
      <?php $__currentLoopData = $achievements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>       
        <div class="row" id="achievement-rec-<?php echo e($loop->iteration); ?>">  
         <input type="hidden" name="achievement_id[]" value="<?php echo e($row->id); ?>" />            
            <div class="col-md-1"><input type="number" name="achievement_ordering[]" class="form-control" placeholder="SN" value="<?php echo e($row->ordering); ?>"/></div>
            <div class="col-md-10"><input type="text" name="achievement_title[]" class="form-control" placeholder="Title " value="<?php echo e($row->title); ?>"/></div>
            <div class="col-md-1"><button class="btn btn-danger delete-achievement" achievement-rowid="<?php echo e($row->id); ?>" achievement-data-id="<?php echo e($loop->iteration); ?>"><i class="glyphicon glyphicon-trash"></i></button></div>  
        </div> 
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>     
      <?php endif; ?>      
    </div>
    
  <div style="display:none;">
      <div id="row_achievement_additional">
        <div class="row">       
         <input type="hidden" name="achievement_id[]" value="" />     
            <div class="col-md-1"><input type="number" name="achievement_ordering[]" class="form-control" placeholder="SN" /></div>
            <div class="col-md-10"><input type="text" name="achievement_title[]" class="form-control" placeholder="Title" /></div>
            <div class="col-md-1"><button class="btn btn-danger delete-achievement" achievement-data-id="0"><i class="glyphicon glyphicon-trash"></i></button></div>  
        </div>
    </div>
  </div>

  
</div>
</div><?php /**PATH /home/sevensummittreks/public_html/resources/views/admin/team/edit/edit-achievements.blade.php ENDPATH**/ ?>