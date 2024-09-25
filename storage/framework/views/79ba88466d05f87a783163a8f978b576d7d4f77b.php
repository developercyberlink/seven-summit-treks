
<?php $__env->startSection('title','User List'); ?>
<?php $__env->startSection('breadcrumb'); ?>
<a href="<?php echo e(route('newsletter.index')); ?>" class="btn btn-primary btn-sm">Newsletter List</a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="container">
    <h1>Edit Newsletter </h1>

 <form action="<?php echo e(route('newsletter.edit')); ?>" method="POST">
    <input type="hidden" name="id" value="<?php echo e($data->id); ?>">
     <?php echo csrf_field(); ?>
  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input type="text" class="form-control" name="title" value="<?php echo e($data->title); ?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter title">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Content</label>
     <textarea class="form-control my-editor" id="editor2" name="content"
                                          rows="20"> 
        <?php echo $data->content; ?>

    </textarea>
  </div>
  <div class="form-group">
      <label  for="exampleCheck1">Publish Date</label>
    <input type="date" name="publish_date" class="form-control" value="<?php echo e($data->publish_date); ?>" id="exampleCheck1">
  </div>
  <hr/>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sevensummittreks/public_html/resources/views/admin/news-edit.blade.php ENDPATH**/ ?>