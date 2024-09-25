
<?php $__env->startSection('title','Post Type'); ?>
<?php $__env->startSection('breadcrumb'); ?>
 <a href="<?php echo e(route('type.posttype.index',Request::segment(2))); ?>" class="btn btn-primary btn-sm">List</a> 
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<form class="form-horizontal" role="form" action="<?php echo e(url('type/posttype', $data->id)); ?>" method="post" enctype="multipart/form-data">
	<?php echo e(csrf_field()); ?>     
	<input type="hidden" name="_method" value="PUT" />          
	<div class="col-md-9">
		<!-- Input Fields -->
		<div class="panel">
			<div class="panel-heading">
				<span class="panel-title">Edit Post Type</span>
			</div>
			<div class="panel-body"> 				
				<div class="form-group">
					<label for="inputStandard" class="col-lg-3 control-label">Post Type</label>
					<div class="col-lg-8">
						<div class="bs-component">
							<input type="text" id="post_type" name="post_type" class="form-control" placeholder="" value="<?php echo e($data->post_type); ?>" />
						</div>
					</div>
				</div>         
				<div class="form-group">
					<label for="inputStandard" class="col-lg-3 control-label"> Uri</label>
					<div class="col-lg-8">
						<div class="bs-component">
							<input type="text" id="uri" name="uri" class="form-control" placeholder="" value="<?php echo e($data->uri); ?>" readonly />
						</div>
					</div>
				</div> 

				<div class="form-group">
					<label for="inputStandard" class="col-lg-3 control-label"> Ordering </label>
					<div class="col-lg-8">
						<div class="bs-component">
							<input type="text" id="ordering" name="ordering" class="form-control" value="<?php echo e($data->ordering); ?>" />
						</div>
					</div>
				</div>  

				<div class="form-group">
					<label for="inputStandard" class="col-lg-3 control-label"> Is Menu ? </label>
					<div class="col-lg-8">
						<div class="bs-component">
							<select name="is_menu" class="form-control input-sm">
								<option value="0" <?php echo e(($data->is_menu == '0')?'selected':''); ?>> No </option> 
								<option value="1" <?php echo e(($data->is_menu == '1')?'selected':''); ?>> Yes </option>    
							</select>
						</div>
					</div>
				</div>
				
				 <div class="form-group">
                <label class="col-lg-3 control-label" for="textArea3"> Content </label>
                <div class="col-lg-8">
                  <div class="bs-component">
                   <input type="text" id="content" name="content" class="form-control" value="<?php echo e($data->content); ?>"/>
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
        <label class="field select">
          <select id="template" name="template">
           <?php $__currentLoopData = $templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($key); ?>"  <?php echo e(($template == $data->template)?'selected':''); ?>><?php echo e(ucfirst($template)); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
          </select>
          <i class="arrow"></i>
        </label>
        </div>
         <div class="sid_bvijay mb10">
      <h4> Banner </h4>
      <div class="hd_show_con">
        <div id="xedit-demo">
          <?php if($data->banner): ?>
          <span class="id<?php echo e($data->id); ?>">
            <img src="<?php echo e(asset(env('PUBLIC_PATH').'/uploads/original/' . $data->banner)); ?>" width="50%" />
            <hr> 
          </span>          
          <?php endif; ?> 
          <input type="file" name="banner" />
        </div>
      </div>
    </div>
        </div>          
        </div>

</form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script type="text/javascript">
  $(document).ready(function(){
    var post_type;
    $('#post_type').on('keyup', function(){
      post_type = $('#post_type').val();
      post_type=post_type.replace(/[^a-zA-Z0-9 ]+/g,"");
      post_type=post_type.replace(/\s+/g, "-");
      $('#uri').val(post_type);
    });
  });   
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sevensummittreks/public_html/resources/views/admin/post-type/edit.blade.php ENDPATH**/ ?>