
<?php $__env->startSection('title','User List'); ?>
<?php $__env->startSection('breadcrumb'); ?>
<a href="<?php echo e(route('newsletter.create')); ?>" class="btn btn-primary btn-sm">Add Newsletter</a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="tray tray-center" style="">
<div class="panel">
	<div class="panel-body ph20">
		<div class="tab-content">
			<div id="users" class="tab-pane active">
				<div class="table-responsive mhn20 mvn15">
                <h4>Newsletter List </h4>
                <table class="table admin-form theme-warning fs13" id="datatable3">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Publish Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($key+=1); ?></td>
                            <td><?php echo e($value->title); ?></td>
                            <td><?php echo e($value->publish_date); ?></td>
                            <td>
                                <a href="<?php echo e(route('newsletter.edit',$value->id)); ?>">Edit</a>
                                 <a href="<?php echo e(route('newsletter.delete',$value->id)); ?>">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<script src="<?php echo e(asset( env('PUBLIC_PATH') . '/vendor/plugins/datatables/media/js/jquery.dataTables.js')); ?>"></script> 
<script src="<?php echo e(asset( env('PUBLIC_PATH') . '/vendor/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js')); ?>"></script> 
<script src="<?php echo e(asset( env('PUBLIC_PATH') . '/vendor/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js')); ?>"></script> 
<script src="<?php echo e(asset( env('PUBLIC_PATH') . '/vendor/plugins/datatables/media/js/dataTables.bootstrap.js')); ?>"></script>
<script type="text/javascript">

     /************/
  $('#datatable3').dataTable({
    "aoColumnDefs": [{
      'bSortable': true,
      'aTargets': [-1]

    }],
    "oLanguage": {
      "oPaginate": {
        "sPrevious": "Previous",
        "sNext": "Next"
      }
    },
    "iDisplayLength": 10,
    "aLengthMenu": [
    [5, 10, 25, 50, -1],
    [5, 10, 25, 50, "All"]
    ],
    "sDom": '<"dt-panelmenu clearfix"Tfr>t<"dt-panelfooter clearfix"ip>',
    "oTableTools": {
      "sSwfPath": "<?php echo e(asset('vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf')); ?>"
    }
  });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sevensummittreks/public_html/resources/views/admin/news-index.blade.php ENDPATH**/ ?>