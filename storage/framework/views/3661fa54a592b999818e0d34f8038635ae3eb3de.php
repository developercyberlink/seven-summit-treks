<div class="col-md-12">
<div class="panel">
  <div class="panel-heading">
    <span class="panel-title"> Certificates </span>
    <a class="btn btn-primary pull-right add-certificates" data-added="0"><i class="glyphicon glyphicon-plus"></i> Add Row </a>
  </div>
 <div class="panel-body" id="row_certificates_body">     
        <div class="row">             
            <div class="col-md-1">  <label>Ordering</label> </div>
            <div class="col-md-7">  <label>Title</label> </div>  
            <div class="col-md-3">  <label>Image</label> </div>           
            <div class="col-md-1">  <label>Action</label> </div>
        </div>       

 
   <?php if($certificates->count() > 0): ?> 
      <?php $__currentLoopData = $certificates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>       
        <div class="row" id="certificates-rec-<?php echo e($loop->iteration); ?>"> 
           <input type="hidden" name="certificates_id[]" value="<?php echo e($row->id); ?>" />  
            <div class="col-md-1"><input type="number" name="certificates_ordering[]" class="form-control" placeholder="SN" value="<?php echo e($row->ordering); ?>"/></div>
            <div class="col-md-7"><input type="text" name="certificates_title[]" class="form-control" placeholder="Title " value="<?php echo e($row->title); ?>" /></div>
            <div class="col-md-3"><input type="file" name="image[]" class="form-control" value="<?php echo e($row->image); ?>" />
            <?php if($row->image): ?>              
              <img src="<?php echo e(asset(env('PUBLIC_PATH').'uploads/team/' . $row->image)); ?>" width="100" />             
              <?php endif; ?>  </div>            
            <div class="col-md-1"><button class="btn btn-danger delete-certificates" certificates-rowid="<?php echo e($row->id); ?>" certificates-data-id="<?php echo e($loop->iteration); ?>"><i class="glyphicon glyphicon-trash"></i></button></div>  
        </div> 
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>      
  </div>

  <div style="display:none;">
      <div id="row_certificates_additional">
        <div class="row">
          <input type="hidden" name="certificates_id[]" value="" />
            <div class="col-md-1"><input type="number" name="certificates_ordering[]" class="form-control" placeholder="SN" /></div>
            <div class="col-md-7"><input type="text" name="certificates_title[]" class="form-control" placeholder="Title " /></div>
            <div class="col-md-3"><input type="file" name="image[]" class="form-control" /></div>    
            <div class="col-md-1"><button class="btn btn-danger delete-certificates" schedule-data-id="0"><i class="glyphicon glyphicon-trash"></i></button></div>  
        </div>
    </div>
  </div>

  
</div>


</div>   

<?php /**PATH /home/sevensummittreks/public_html/resources/views/admin/team/edit/edit-certificates.blade.php ENDPATH**/ ?>