
<?php $__env->startSection('breadcrumb'); ?>
<a href="<?php echo e(url('admin/trip/'  . Request::segment(2) . '/edit')); ?>" class="btn btn-success btn-sm"><?php echo e(tripname(Request::segment(2))->trip_title); ?></a>
    <a href="<?php echo e(route('admin.tripdocs.index', Request::segment(2))); ?>" class="btn btn-primary btn-sm">List</a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <form class="form-horizontal" id="upload_image1" role="form"
        action="<?php echo e(route('admin.tripdocs.update', ['admin' => Request::segment(2), 'tripdoc' => $data->id])); ?>"
        method="post" enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>

        <input type="hidden" name="_method" value="PUT" />
        <div class="col-md-8">
            <!-- Input Fields -->
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Trip Document </span>
                </div>
                <div class="panel-body">
                    <input type="hidden" name="post_id" value="<?php echo e(Request::segment(3)); ?>">

                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label"> Title </label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <input type="text" name="title" id="title" value="<?php echo e($data->title ? $data->title : ''); ?>"
                                    class="form-control" />
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label"> Ordering </label>
                        <div class="col-lg-8">
                            <input type="text" name="ordering" value="<?php echo e($data->ordering ? $data->ordering : ''); ?>"
                                class="form-control" />
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label"> Document </label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <input type="file" name="document" class="form-control" />
                            </div>
                        </div>
                    </div>

                    <?php if($data->document): ?>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-2 control-label"> </label>
                            <div class="col-lg-8">
                                <div class="bs-component">
                                    <span class="id<?php echo e($data->id); ?>">
                                        <!--<a href="#<?php echo e($data->id); ?>" class="delete_doc">X</a>-->
                                        <?php echo e($data->title == '' ? $data->document : $data->title); ?> - 
                                        <a href="<?php echo e(asset(env('PUBLIC_PATH') . 'uploads/doc/' . $data->document)); ?>" target="_blank">View File</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    
                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label"> External Link </label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <input type="text" name="external_link" class="form-control" value="<?php echo e($data->external_link); ?>"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label"> </label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <input type="submit" class="btn btn-primary btn-sm" name="submit" value="Submit" />
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
                      <span class="thumbid<?php echo e($data->id); ?>">
                      <a href="#<?php echo e($data->id); ?>" class="imagedelete">X</a>
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

<?php $__env->startSection('libraries'); ?>
    <script type="text/javascript">
         $('.imagedelete').on('click',function(e){
            e.preventDefault();
            if(!confirm('Are you sure to delete?')) return false;
            var csrf = $('meta[name="csrf-token"]').attr('content');
            var str = $(this).attr('href');
            var id = str.slice(1);
            $.ajax({
              type:'delete',
              url:"<?php echo e(url('delete_tripdoc_thumb') . '/'); ?>" + id,
              data:{_token:csrf},    
              success:function(data){ 
                $('span.thumbid' + id ).remove();
              },
              error:function(data){  
              alert(data + 'Error!');     
              }
            });
          });

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sevensummittreks/public_html/resources/views/admin/trip-docs/edit.blade.php ENDPATH**/ ?>