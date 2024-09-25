
<?php $__env->startSection('title','Team Category'); ?>
<?php $__env->startSection('breadcrumb'); ?>
<a href="<?php echo e(url('admin/teamcategory')); ?>" class="btn btn-primary btn-sm">List</a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<form class="form-horizontal" role="form" action="<?php echo e(url('admin/teamcategory', $data->id)); ?>" method="post" enctype="multipart/form-data">
 <?php echo e(csrf_field()); ?>            
 <input type="hidden" name="_method" value="PUT" />       
 <div class="col-md-8">
  <!-- Input Fields -->
  <div class="panel">
    <div class="panel-heading">
      <span class="panel-title">Edit Team Category</span>
    </div>
    <div class="panel-body">

     

    <div class="form-group">
      <label for="inputStandard" class="col-lg-3 control-label">Category</label> 
      <div class="col-lg-8">
        <div class="bs-component">
          <input type="text" id="category" name="category" class="form-control" placeholder="" value="<?php echo e($data->category); ?>" />
        </div>
      </div>
    </div>

      <div class="form-group">
        <label for="inputSelect" class="col-lg-3 control-label"> Category </label>
        <div class="col-lg-9">
          <div class="bs-component">

            <select name="team_parent" class="form-control">
              <option value="0"> Select Parent </option>
              <?php if($category): ?>
              <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($row->id); ?>" <?php echo e($row->id == $data->team_parent ? 'selected' : ''); ?>> <?php echo e($row->category); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
              <?php endif; ?> 
            </select>
            <div id="source-button" class="btn btn-primary btn-xs" style="display: none;">&lt; &gt;</div></div>
          </div>
        </div>

    <div class="form-group">
      <label for="inputStandard" class="col-lg-3 control-label">Uri</label>
      <div class="col-lg-8">
        <div class="bs-component">
          <input type="text" id="cat_uri" name="uri" class="form-control" value="<?php echo e($data->uri); ?>"  placeholder="" />
        </div>
      </div>
    </div>     

    <div class="form-group">
     <label for="inputStandard" class="col-lg-3 control-label">Caption</label>
     <div class="col-lg-8">
      <div class="bs-component">
        <input type="text" id="inputStandard" name="caption" class="form-control" value="<?php echo e($data->caption); ?>" placeholder="" />
      </div>
    </div>
  </div> 

  <div class="form-group">
   <label for="inputStandard" class="col-lg-3 control-label">Content</label>
   <div class="col-lg-8">
    <div class="bs-component">                        
      <div class="bs-component">                       
        <div class="bs-component">
          <textarea class="form-control" id="textArea3" name="content" rows="3" autocomplete="off"><?php echo e($data->content); ?></textarea>
        </div>
      </div>
    </div>
  </div>
</div>                    

</div>
</div>          
</div>

<div class="col-md-4">
  <div class="admin-form">
    <div class="sid_bvijay mb10">                   
      <div class="hd_show_con">
        <div class="publice_edi">
          Status: <a href="avoid:javascript;" data-toggle="collapse" data-target="#publish_1">Active</a>
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
        <input type="number" id="inputStandard" name="ordering" class="form-control" value="<?php echo e($data->ordering); ?>" placeholder="Order" />   
      </label>
    </div>

    <div class="sid_bvijay mb10">
      <h4> Thumbnail </h4>
      <div class="hd_show_con">
        <div id="xedit-demo">
          <?php if($data->picture): ?>
          <span class="id<?php echo e($data->id); ?>">
            <a href="#<?php echo e($data->id); ?>" class="imagedelete">X</a>
            <img src="<?php echo e(asset(env('PUBLIC_PATH').'/uploads/team/' . $data->picture)); ?>" width="50%" />
            <hr> 
          </span>          
          <?php endif; ?> 
          <input type="file" name="picture" />
        </div>
      </div>
    </div>

  </div>         

</div>
</form>
<?php $__env->stopSection(); ?>

  <?php $__env->startSection('scripts'); ?>
  <script type="text/javascript">
   // Delete Thumb
    $('.imagedelete').on('click',function(e){
    e.preventDefault();
    if(!confirm('Are you sure to delete?')) return false;
    var csrf = $('meta[name="csrf-token"]').attr('content');
    var str = $(this).attr('href');
    var id = str.slice(1);
    $.ajax({
      type:'DELETE',
      url:"<?php echo e(url('delete_teamcategory_thumb') . '/'); ?>" + id,
      data:{_token:csrf},    
      success:function(data){ 
        $('span.id' + id ).remove();
      },
      error:function(data){  
      alert(data + 'Error!');     
     }
   });
  });

  $(document).ready(function(){
      $('#category').on('keyup',function(){
        var category;
        category = $('#category').val();
        category=category.replace(/[^a-zA-Z0-9 ]+/g,"");
        category=category.replace(/\s+/g, "-");
        $('#cat_uri').val(category);
      });
    });
  </script>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sevensummittreks/public_html/resources/views/admin/team-category/edit.blade.php ENDPATH**/ ?>