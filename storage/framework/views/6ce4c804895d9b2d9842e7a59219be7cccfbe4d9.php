<?php $__env->startSection('title','Page Type'); ?>
<?php $__env->startSection('breadcrumb'); ?>
<a href="<?php echo e(url('admin/pagetype/create')); ?>" class="btn btn-primary btn-sm">Create</a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="tray tray-center" style="">
<div class="panel">         
	<div class="panel-body ph20">
		<div class="tab-content">
			<div id="users" class="tab-pane active">
				<div class="table-responsive mhn20 mvn15">
				    
				<table class="table admin-form theme-warning fs13">
						<thead>
							<tr class="bg-light">
								<th class="">SN</th>
								<th class="">Particulars</th>   
								<th class="">Is Menu </th>   
								<th class="">Ordering </th> 
								<th class="text-left">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php if(count($data) > 0): ?>	            
							<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr class="id<?php echo e($row->id); ?>">
								<td class=""><?php echo e($loop->iteration); ?></td>
								<td class=""><?php echo e(ucfirst($row->page_type)); ?></td>
								<td class="">
								    <?php if($row->is_menu == 1): ?>
								    <span class="text-success">Yes</span>
								    <?php elseif($row->is_menu == 0): ?>
								    <span class="text-danger">No</span>
								    <?php endif; ?>
								</td>
								<td> <?php echo e($row->ordering); ?> </td>								
								<td class="text-left">  
									<a href="<?php echo e(url('admin/pagetype/'.$row->id.'/edit')); ?>">Edit</a> 

									<?php if(!is_empty_pagetype($row->id)): ?>
									|
									<a href="#<?php echo e($row->id); ?>" class="btn-delete">Delete</a>
									<?php endif; ?>
								</td>
							</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php endif; ?>  
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script type="text/javascript">
jQuery(document).ready(function() {
  $('.btn-delete').on('click',function(e){
    e.preventDefault();
    if(!confirm('Are you sure to delete?')) return false;
    var csrf = $('meta[name="csrf-token"]').attr('content');
    var str = $(this).attr('href');
    var id = str.slice(1);
    $.ajax({
      type:'DELETE',
      url:"<?php echo e(url('admin/pagetype') . '/'); ?>" + id,
      data:{_token:csrf},    
      success:function(data){ 
        $('tbody tr.id' + id ).remove();
      },
      error:function(data){       
       alert('Error occurred!');
     }
   });
  });
});
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sevensummittreks/public_html/resources/views/admin/page-type/index.blade.php ENDPATH**/ ?>