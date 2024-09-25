<?php $__env->startSection('title', ''); ?>
<?php $__env->startSection('breadcrumb'); ?>
<!--<a href="<?php echo e(route('expedition-group.create')); ?>" class="btn btn-primary btn-sm">Create</a>-->
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
								<th class="">Title </th>
								<th class="">Status </th>
								<th class=""> Ordering </th>
								<th class="">Date</th>
								<th class="text-left">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php if(count($data) > 0): ?>
							<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr class="id<?php echo e($row->id); ?>">
								<td class=""><?php echo e($loop->iteration); ?></td>
								<td class=""><?php echo e(ucfirst($row->group_title)); ?></td>
								 <td class="text-center">
                                <input class="CheckStatus" type="checkbox" name="status" data-rowid="<?php echo e($row->id); ?>" <?php echo e(($row->status == 1)?'checked':''); ?> />
                                </td>
								<td> <?php echo e($row->ordering); ?> </td>
								<td> <?php echo e($row->created_at); ?> </td>
								<td class="text-left">
									<a href="<?php echo e(route('expedition-group.edit',$row->id)); ?>">Edit</a>
									<!--| <span class="trash"><a href="<?php echo e($row->id); ?>" class="btn-delete">Delete</a></span>-->
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
<?php $__env->startSection('scripts'); ?>
<script type="text/javascript">
jQuery(document).ready(function() {
  $('.btn-delete').on('click',function(e){
    e.preventDefault();
    if(!confirm('Are you sure to delete?')) return false;
    var csrf = $('meta[name="csrf-token"]').attr('content');
    var id = $(this).attr('href');
    var url = '<?php echo e(route("expedition-group.destroy",":id")); ?>';
       url = url.replace(':id',id);
    //    return url;
    $.ajax({
      type:'DELETE',
      url:url,
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

  $('.CheckStatus').on('click',function(e){
    var csrf = $('meta[name="csrf-token"]').attr('content');
    var id = $(this).attr('data-rowid');
    var url  = '<?php echo e(route("admin.expgroupstatus",["id"=>':id'])); ?>';
      url = url.replace(':id',id);
      $.ajax({
        type:'put',
        url:url,
        data:{_token:csrf},
        success:function(data){
         colsole.log(data);
        },
        error:function(data){
          colsole.log(data);
        }
      });
  });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sevensummittreks/public_html/resources/views/admin/expeditions-group/index.blade.php ENDPATH**/ ?>