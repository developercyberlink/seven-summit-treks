<div class="col-md-12">
<div class="panel">
  <div class="panel-heading">
     <span class="panel-title">Page Details</span>
  <a class="btn btn-primary pull-right add-details" data-added="0"><i class="glyphicon glyphicon-plus"></i> Add Row </a>
  </div>
  <div class="panel-body" id="row_details_body">     
        <div class="row">             
            <div class="col-md-1">  <label>Ordering</label> </div>
            <div class="col-md-3">  <label>Title</label> </div>
            <div class="col-md-7">  <label>Content</label> </div>          
            <div class="col-md-1">  <label>Action</label> </div>
        </div>       

    <?php if($details->count() > 0): ?> 
      <?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
    
        <div class="row" id="details-rec-<?php echo e($loop->iteration); ?>">   
         <input type="hidden" name="detail_id[]" value="<?php echo e($row->id); ?>" />           
          <div class="col-md-1"><input type="number" name="ordering[]" class="form-control" placeholder="SN" value="<?php echo e($row->ordering); ?>"/></div>
          <div class="col-md-3"><input type="text" name="title[]" class="form-control" placeholder="Name " value="<?php echo e($row->title); ?>"/></div>
           <div class="col-md-7">
            <textarea class="my-editor form-control" name="content[]"><?php echo e($row->content); ?></textarea>
          </div>                      
          <div class="col-md-1"><button class="btn btn-danger delete-details"  details-rowid="<?php echo e($row->id); ?>" details-data-id="<?php echo e($loop->iteration); ?>"><i class="glyphicon glyphicon-trash"></i></button></div>  
        </div>       
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <?php endif; ?>
  </div>
  <div style="display:none;">
      <div id="row_details_additional">
        <div class="row"> 
           <input type="hidden" name="detail_id[]" value="" />              
           <div class="col-md-1"><input type="number" name="ordering[]" class="form-control" placeholder="SN" /></div>
          <div class="col-md-3"><input type="text" name="title[]" class="form-control" placeholder="Name " /></div>
           <div class="col-md-7"><textarea class="form-control" name="content[]"></textarea></div>                      
          <div class="col-md-1"><button class="btn btn-danger delete-details" details-data-id="0"><i class="glyphicon glyphicon-trash"></i></button></div>   
        </div>
    </div>
  </div>
  
</div>


</div>   

<?php /**PATH /home/sevensummittreks/public_html/resources/views/admin/page/edit/edit-details.blade.php ENDPATH**/ ?>