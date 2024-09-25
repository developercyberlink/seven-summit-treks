
  <div class="col-md-9">
    <!-- Input Fields -->
    <div class="panel">
      <div class="panel-heading">
        <span class="panel-title">New Member</span>
      </div>
      <div class="panel-body">                    
        <div class="form-group"> 
         <label for="inputStandard" class="col-lg-3 control-label">Name</label>         
          <div class="col-lg-8">
            <div class="bs-component">
             
              <input type="text" id="name" name="name" class="form-control" placeholder="Name" value="<?php echo e($data->name); ?>" required /> 
              <input type="hidden" id="uri" name="uri" value="<?php echo e($data->uri); ?>" />
            </div>
          </div>
        </div>

        <div class="form-group"> 
         <label for="inputStandard" class="col-lg-3 control-label">Position</label>        
          <div class="col-lg-8">
            <div class="bs-component">
              <input type="text" name="position" class="form-control" placeholder="Position" value="<?php echo e($data->position); ?>" />
            </div>
          </div>
        </div>  

                           
        <div class="form-group"> 
         <label for="inputStandard" class="col-lg-3 control-label">Category</label>         
          <div class="col-lg-8">
            <div class="bs-component">
              <select name="category" class="form-control team-select">
                <option value="0"> Select Category </option>
              <?php if($category): ?>
                <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($row->id); ?>" <?php echo e(($row->id == $data->category )?'selected':''); ?>> <?php echo e($row->category); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                <?php endif; ?> 
              </select>
              <div id="source-button" class="btn btn-primary btn-xs" style="display: none;">&lt; &gt;</div>
            </div>
          </div>
        </div>

        <div class="form-group team-category 4"> 
         <label for="inputStandard" class="col-lg-3 control-label">Sub Category</label>         
          <div class="col-lg-8">
            <div class="bs-component">
              <select name="subcategory" class="form-control">
                <option value="0"> Select Sub Category </option>
              <?php if($category2): ?>
                <?php $__currentLoopData = $category2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($row->id); ?>" <?php echo e(($row->id == $data->subcategory )?'selected':''); ?>> <?php echo e($row->category); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                <?php endif; ?> 
              </select>
              <div id="source-button" class="btn btn-primary btn-xs" style="display: none;">&lt; &gt;</div>
            </div>
          </div>
        </div>

        <div class="form-group"> 
         <label for="inputStandard" class="col-lg-3 control-label">Phone</label>        
          <div class="col-lg-8">
            <div class="bs-component">
              <input type="text" name="phone" class="form-control" placeholder="phone" value="<?php echo e($data->phone); ?>" />
            </div>
          </div>
        </div>  
                           
        <div class="form-group"> 
         <label for="inputStandard" class="col-lg-3 control-label">Email</label>         
          <div class="col-lg-8">
            <div class="bs-component">
              <input type="text" id="email" name="email" class="form-control" placeholder="Email Address" value="<?php echo e($data->email); ?>" />
           
            </div>
          </div>
        </div>

        
         <span class="panel-title">Brief</span>
      <div class="form-group">         
        <div class="col-lg-12">
          <div class="bs-component">
            <textarea class="form-control my-editor"   name="brief" rows="3"><?php echo e($data->brief); ?></textarea>
          </div>
        </div>
      </div>
   
      <span class="panel-title"> Content</span>  
      <div class="form-group">
        <div class="col-lg-12">
          <div class="bs-component">
            <textarea class="form-control my-editor"   name="content" rows="12"><?php echo e($data->content); ?></textarea>
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
          Active Status: <input type="checkbox" name="status" value="<?php echo e($data->status); ?>" <?php echo e(($data->status == 1)?'checked':''); ?> />
        </div>              
</div>
</div>

<div class="sid_bvijay mb10">
  <label class="field text">
   Ordering: <input type="number"   name="ordering" class="form-control" placeholder="Ordering" value="<?php echo e($data->ordering); ?>" />   
  </label>
</div>

<div class="sid_bvijay mb10">
 <label class="field text">
   <input type="text" id="" name="fb_url" class="form-control" placeholder="Facebook Link" value="<?php echo e($data->fb_url); ?>" />   
  </label>
</div>
<div class="sid_bvijay mb10">
 <label class="field text">
   <input type="text" id="" name="instagram_url" class="form-control" placeholder="Instagram Link" value="<?php echo e($data->instagram_url); ?>" />   
  </label>
</div>
<div class="sid_bvijay mb10">
 <label class="field text">
   <input type="text" id="" name="twitter_url" class="form-control" placeholder="Wikipedia Link" value="<?php echo e($data->twitter_url); ?>" />   
  </label>
</div>
<!--<div class="sid_bvijay mb10">-->
<!-- <label class="field text">-->
<!--   <input type="text" id="" name="linkedin_url" class="form-control" placeholder="Linkedin Link" value="<?php echo e($data->linkedin_url); ?>" />   -->
<!--  </label>-->
<!--</div>-->

  


<div class="sid_bvijay mb10">
  <h4> Thumbnail </h4>
  <div class="hd_show_con">
    <div id="xedit-demo">
        <?php if($data->thumbnail): ?>
              <span class="thumb_id<?php echo e($data->id); ?>">
              <a href="#<?php echo e($data->id); ?>" class="thumbdelete">X</a>
              <img src="<?php echo e(asset(env('PUBLIC_PATH').'uploads/team/' . $data->thumbnail)); ?>" width="150" />
              </span>
              <hr> 
              <?php endif; ?>     
     <input type="file" name="thumbnail" />
   </div>
 </div>
</div>

<div class="sid_bvijay mb10">
  <h4> Banner </h4>
    <h4>  <input type="checkbox" name="published" value="<?php echo e($data->published); ?>" <?php echo e(($data->published == 1)?'checked':''); ?> />   Blur </h4> 
  <div class="hd_show_con">
    <div id="xedit-demo">
        <?php if($data->banner): ?>
              <span class="bannerid<?php echo e($data->id); ?>">
              <a href="#<?php echo e($data->id); ?>" class="bannerdelete">X</a>
              <img src="<?php echo e(asset(env('PUBLIC_PATH').'uploads/team/' . $data->banner)); ?>" width="150" />
              </span>
              <hr> 
              <?php endif; ?>     
    <input type="file" name="banner" /> 
   </div>
 </div>
</div>

</div>       
</div><?php /**PATH /home/sevensummittreks/public_html/resources/views/admin/team/edit/edit-general.blade.php ENDPATH**/ ?>