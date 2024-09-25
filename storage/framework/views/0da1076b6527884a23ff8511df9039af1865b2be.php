
<?php $__env->startSection('title', ''); ?>
<?php $__env->startSection('breadcrumb'); ?>
<a href="<?php echo e(url('admin/trip/'  . $id . '/edit')); ?>" class="btn btn-success btn-sm"><?php echo e(tripname($id)->trip_title); ?></a>
<a href="<?php echo e(route('category.create',$id)); ?>" class="btn btn-primary btn-sm">Create</a>
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
								<th class="">Category </th>
								<th class="">Is Default?</th>
								<th class="text-left">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php if($data->count() > 0): ?>
							<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr class="id<?php echo e($row->id); ?>">
								<td class=""><?php echo e($loop->iteration); ?></td>
								<td class=""><?php echo e($row->category); ?></td>
								<td> 
									<form action="<?php echo e(route('itinerary-category.isdefault',$row->id)); ?>" method="POST">
										<?php echo csrf_field(); ?>	
										 <?php if(($row->default)==0): ?>
                                    <button class="btn btn-danger btn btn-sm" name="No" type="submit"><i
                                            class="fa fa-times"></i>
                                    </button>
                               		 <?php else: ?>
                                    <button class="btn btn-success btn btn-sm" name="Yes" type="submit"><i
                                            class="fa fa-check"></i>
                                    </button>
                             	   <?php endif; ?>								 									
									
									</form>								 
								</td>
								<td class="text-left">
									<a href="<?php echo e(route('category.edit',[$row->id,$id])); ?>">Edit</a>
									|   <span class="trash"><a href="<?php echo e(route('itinerary.destroy',$row->id)); ?>" class="btn-delete">Delete</a></span>
								</td>
							</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php else: ?>
							 <tr>
							 	<td colspan="5" class="text-center"> Data Not Available! </td>
							 </tr>
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

<?php $__env->startSection('libraries'); ?>
<!-- Datatables -->
<!-- <script type="text/javascript">
(function($) {
    $('.btn-delete').on('click', function(e) {
        e.preventDefault();
        if (confirm('Are you sure to delete??')) {
            var csrf = $('meta[name="csrf-token"]').attr('content');
            var str = $(this).attr('href');
            var id = str.slice(1);
            var url = '<?php echo e(route("itinerary-category.destroy",':id')); ?>';
            url = url.replace(':id',id);
            $.ajax({
                type: 'delete',
                url: url,
                data: {
                    _token: csrf
                },
                success: function(data) {
                    $('tbody tr.id' + id).remove();
                },
                error: function(data) {
                    alert('Error occurred!');
                }
            });
        }
    });

}(jQuery));

</script> -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sevensummittreks/public_html/resources/views/admin/itinerary-category/index.blade.php ENDPATH**/ ?>