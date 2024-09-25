
<?php $__env->startSection('title','Page Type'); ?>
<?php $__env->startSection('breadcrumb'); ?>
<a href="<?php echo e(url('admin',Request::segment(2))); ?>" class="btn btn-primary btn-sm">List</a> 
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<form class="form-horizontal" role="form" action="<?php echo e(url('admin/pagetype')); ?>" method="post" enctype="multipart/form-data">
 <?php echo e(csrf_field()); ?>            
 <div class="col-md-9">
  <!-- Input Fields -->
  <div class="panel">
    <div class="panel-heading">
      <span class="panel-title">New Page Type</span>
    </div>
    <div class="panel-body"> 
      <div class="form-group">
        <label for="inputStandard" class="col-lg-3 control-label">Page Type</label>
        <div class="col-lg-8">
          <div class="bs-component">
            <input type="text" id="page_type" name="page_type" class="form-control" placeholder="" />
          </div>
        </div>
      </div>  

      <div class="form-group">
        <label for="inputStandard" class="col-lg-3 control-label"> Uri</label>
        <div class="col-lg-8">
          <div class="bs-component">
            <input type="text" id="uri" name="uri" class="form-control" placeholder="" />
          </div>
        </div>
      </div> 
      <div class="form-group">
        <label for="inputStandard" class="col-lg-3 control-label"> Brief</label>
        <div class="col-lg-8">
          <div class="bs-component">
         <textarea class="my-editor form-control" id="" name="brief" rows="3"></textarea>
          </div>
        </div>
      </div> 
    <div class="form-group">
        <label for="inputStandard" class="col-lg-3 control-label"> Image</label>
        <div class="col-lg-8">
          <div class="bs-component">
         <input type="file" name="image" />
          </div>
        </div>
      </div> 
  
      

  <div class="form-group">
    <label class="col-lg-3 control-label" for="textArea3">  </label>
    <div class="col-lg-8">
      <div class="bs-component">
       
     </div>
   </div>
 </div> 


</div>
</div>          
</div>

<div class="col-md-3">
   <div class="admin-form">

<div class="sid_bvijay mb10">                   
  <div class="hd_show_con">
    <div class="publice_edi">
      Status: 
      <a href="avoid:javascript;" data-toggle="collapse" data-target="#publish_1">
      Active
    </a>
    </div>                    
  </div>
  <footer>                        
    <div id="publishing-action">
      <input type="submit" class="btn btn-primary btn-lg" value="Publish" />
    </div>
    <div class="clearfix"></div>
  </footer>
  <div class="clearfix"></div>
</div>

 <div class="sid_bvijay mb10">
  <label class="field text">
     <h4> Ordering:  </h4>
   <input type="number" id="ordering" name="ordering" class="form-control" value="<?php echo e($ordering); ?>" />  
  </label>
</div>

 <div class="sid_bvijay mb10">
  <label class="field text">
    <h4> Is Menu:  </h4>
    <select name="is_menu" class="form-control input-sm">
          <option value="0"> No </option> 
          <option value="1"> Yes </option>    
        </select>  
  </label>
</div>

<div class="sid_bvijay mb10">
 <label class="field text">
  <h4> External Link  </h4>
   <input type="text" id="" name="external_link" class="form-control" placeholder="External Link" value="" />   
  </label>
</div> 


</div>          
</div>

</form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script type="text/javascript">
  $(document).ready(function(){
    var page_type;
    $('#page_type').on('keyup', function(){
      page_type = $('#page_type').val();
      page_type=page_type.replace(/[^a-zA-Z0-9 ]+/g,"");
      page_type=page_type.replace(/\s+/g, "-");
      $('#uri').val(page_type);
    });
  });   
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sevensummittreks/public_html/resources/views/admin/page-type/create.blade.php ENDPATH**/ ?>