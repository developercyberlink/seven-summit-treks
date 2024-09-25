<div class="col-md-12">
<div class="panel">
  <div class="panel-heading">
     <span class="panel-title"> Mountains Submitted</span>
    <a class="btn btn-primary pull-right add-mountain" data-added="0"><i class="glyphicon glyphicon-plus"></i> Add Row </a>
  </div>
  <div class="panel-body" id="row_mountain_body">     
        <div class="row">             
            <div class="col-md-1">  <label>Ordering</label> </div>
            <div class="col-md-4">  <label>Mountain</label> </div>
            <div class="col-md-1">  <label>Total</label> </div> 
            <div class="col-md-2">  <label >Year</label> </div> 
            <div class="col-md-3">  <label>Link</label> </div> 
            <div class="col-md-1">  <label>Action</label> </div>
        </div>       
 

     <?php if($mountains->count() > 0): ?> 
      <?php $__currentLoopData = $mountains; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>    
        <div class="row" id="mountain-rec-<?php echo e($loop->iteration); ?>"> 
        <input type="hidden" name="mountains_id[]" value="<?php echo e($row->id); ?>" />             
          <div class="col-md-1"><input type="number" name="mountain_ordering[]" class="form-control" placeholder="SN" value="<?php echo e($row->ordering); ?>"/></div>
          <div class="col-md-4"><input type="text" name="mountain_name[]" class="form-control" placeholder="Mountain Name " value="<?php echo e($row->mountain); ?>" /></div>
           <div class="col-md-1"><input type="text" name="total_submitted[]" class="form-control" placeholder="Total" value="<?php echo e($row->total); ?>" /></div>
            <div class="col-md-2"><input type="text" name="year[]" class="form-control" placeholder="Year " value="<?php echo e($row->year); ?>"/></div>
          <div class="col-md-3"><input type="text" name="link[]" class="form-control" placeholder=" Example: http://www.example.com /" value="<?php echo e($row->link); ?>" /></div>                        
          <div class="col-md-1"><button class="btn btn-danger delete-mountain" mountain-rowid="<?php echo e($row->id); ?>" mountain-data-id="<?php echo e($loop->iteration); ?>"><i class="glyphicon glyphicon-trash"></i></button></div>  
        </div>  
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>   
         </div>

  <div style="display:none;">
      <div id="row_mountain_additional">
        <div class="row">
         <input type="hidden" name="mountains_id[]" value="" />            
           <div class="col-md-1"><input type="number" name="mountain_ordering[]" class="form-control" placeholder="SN" /></div>
          <div class="col-md-4"><input type="text" name="mountain_name[]" class="form-control" placeholder="Mountain Name " /></div>
           <div class="col-md-1"><input type="text" name="total_submitted[]" class="form-control" placeholder="Total " /></div>
            <div class="col-md-2"><input type="text" name="year[]" class="form-control" placeholder="Year " /></div>
          <div class="col-md-3"><input type="text" name="link[]" class="form-control" placeholder=" Example: http://www.example.com /" /></div>                        
          <div class="col-md-1"><button class="btn btn-danger delete-mountain" mountain-data-id="0"><i class="glyphicon glyphicon-trash"></i></button></div>   
        </div>
    </div>
  </div>

  
</div>


</div>   

<?php /**PATH /home/sevensummittreks/public_html/resources/views/admin/team/edit/edit-mountains.blade.php ENDPATH**/ ?>