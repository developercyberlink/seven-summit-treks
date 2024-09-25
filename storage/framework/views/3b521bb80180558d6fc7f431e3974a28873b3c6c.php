
<?php $__env->startSection('title','Add Newsletter'); ?>
<?php $__env->startSection('breadcrumb'); ?>
<a href="<?php echo e(route('newsletter.index')); ?>" class="btn btn-primary btn-sm">List</a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="container">
    <h1>Add Newsletter </h1>

 <form action="<?php echo e(route('newsletter.submit')); ?>" method="POST">
     <?php echo csrf_field(); ?>
  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input type="text" class="form-control" name="title" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter title">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Content</label>
    <textarea  class="form-control my-editor" name="content" id="exampleInputPassword1" placeholder="Your Content here"></textarea>

  </div>
  <div class="form-group">
      <label  for="exampleCheck1">Publish Date</label>
    <input type="date" name="publish_date" class="form-control" id="exampleCheck1">
  </div>
  <hr/>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sevensummittreks/public_html/resources/views/admin/newsletter.blade.php ENDPATH**/ ?>