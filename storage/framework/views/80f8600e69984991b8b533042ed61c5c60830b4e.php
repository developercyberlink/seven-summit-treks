
<?php $__env->startSection('breadcrumb'); ?>
     <a href="<?php echo e('admin/'. Request::segment(2)); ?>" class="btn btn-primary btn-sm">List</a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
 <?php if(session('message')): ?>
    <div class="alert alert-success alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <?php echo e(session('message')); ?>

    </div>
<?php endif; ?>
<form class="form-horizontal" role="form" action="<?php echo e(url('admin/videocategory', $data->id)); ?>" method="post" enctype="multipart/form-data">
           <?php echo e(csrf_field()); ?>    
           <input type="hidden" name="_method" value="PUT" />        
<div class="col-md-8">
            <!-- Input Fields -->
            <div class="panel">
              <div class="panel-heading">
                <span class="panel-title">Edit Video Category </span>
              </div>
              <div class="panel-body"> 
                           
                  <div class="form-group">
                    <label for="inputStandard" class="col-lg-2 control-label"> Category </label>
                    <div class="col-lg-8">
                      <div class="bs-component">
                        <input type="text" id="inputStandard" name="category" class="form-control" placeholder="" value="<?php echo e($data->category); ?>" readonly/>
                      </div>
                    </div>
                  </div> 

                  <!-- <div class="form-group">-->
                  <!--  <label class="col-lg-2 control-label" for="textArea3"> Video Link </label>-->
                  <!--  <div class="col-lg-8">-->
                  <!--    <div class="bs-component">-->
                  <!--      <textarea class="form-control" id="textArea3" name="video" rows="3" autocomplete="off"><?php echo e($data->video); ?></textarea>-->
                  <!--    </div>-->
                  <!--  </div>-->
                  <!--</div> -->
                  <!--<?php if($data->video): ?>-->
                  <!--<div class="form-group">-->
                  <!--  <label class="col-lg-2 control-label" for="textArea3">  </label>-->
                  <!--  <div class="col-lg-8">-->
                  <!--    <div class="bs-component">-->
                  <!--      <?php echo $data->video; ?>-->
                  <!--    </div>-->
                  <!--  </div>-->
                  <!--</div> -->
                  <!--<?php endif; ?>                 -->
                  <div class="form-group">
                    <label for="inputStandard" class="col-lg-2 control-label"> Caption </label>
                    <div class="col-lg-8">
                      <div class="bs-component">
                        <input type="text" id="inputStandard" name="caption" class="form-control" placeholder="" value="<?php echo e($data->caption); ?>" />
                      </div>
                    </div>
                  </div>         
              
                   <div class="form-group">
                    <label class="col-lg-2 control-label" for=""> </label>
                    <div class="col-lg-8">
                      <div class="bs-component">
                       <input type="submit" class="btn btn-primary btn-lg" value="Submit" />
                      </div>
                    </div>
                  </div> 

                               
              </div>
            </div>          
          </div>
             <aside class="col-lg-4 ">
 <!-- menu quick links -->

        <div class="admin-form">
          <div class="sid_bvijay mb10">
            <h4> Thumbnail </h4>
            <div class="hd_show_con">
              <div id="xedit-demo">
                   <?php if($data->thumbnail): ?>
                      <span class="banner<?php echo e($data->id); ?>">
                      <!--<a href="#<?php echo e($data->id); ?>" class="bannerdelete">X</a>-->
                      <img src="<?php echo e(asset(env('PUBLIC_PATH') . 'uploads/original/' . $data->thumbnail)); ?>" width="150" />
                      <hr>
                      </span>             
                      <?php endif; ?>
               <input type="file" name="thumbnail" />
             </div>
           </div>
         </div>
       </div>
 
</aside>
          </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sevensummittreks/public_html/resources/views/admin/video-gallery-category/edit.blade.php ENDPATH**/ ?>