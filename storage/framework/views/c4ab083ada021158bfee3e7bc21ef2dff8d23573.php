
<?php $__env->startSection('title','Team'); ?>
<?php $__env->startSection('breadcrumb'); ?>
<a href="<?php echo e(route('teams.create')); ?>" class="btn btn-primary btn-sm">Create</a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="tray tray-center" style="height: 647px;">
  <!-- Search Results Panel  -->

<div class="tab-content">        
      <!-- User Search Pane -->
    <div class="row">
      <div class="col-md-12">
        <div class="bs-component">
          <div class="panel">
            <div class="panel-heading">
              <ul class="nav panel-tabs-border panel-tabs panel-tabs-left">
                <li class="active">
                  <a href="#tab1_1" data-toggle="tab">Board of Directors</a>
                </li>
                <li>
                  <a href="#tab1_2" data-toggle="tab">International Co-Ordinator</a>
                </li>
                 <li>
                  <a href="#tab1_3" data-toggle="tab">Office Staffs</a>
                </li>
                 <li>
                  <a href="#tab1_4" data-toggle="tab">Field Staffs</a>
                </li>
              </ul>
            </div>
            <div class="panel-body">
              <div class="tab-content pn br-n">
                <div id="tab1_1" class="tab-pane active">
                  <div class="_row">
                    <div class="col-md-12">
                      <div id="board-of-director" class="tab-pane active">
                       <div class="table-responsive mhn20 mvn15">
                      <table class="table admin-form theme-warning fs13" id="datatable1">
                        <thead>
                          <tr class="bg-light">
							<th class="">SN</th>
							<th class="">Name</th>
						    <th class="">Ordering</th>                            
							<th class="text-left">Action</th>
							</tr>
                        </thead>
                        <tbody>
                          <?php if(count($bod) > 0): ?>	            
							<?php $__currentLoopData = $bod; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr class="id<?php echo e($row->id); ?>">
								<td class=""><?php echo e($loop->iteration); ?></td>
								<td class=""><?php echo e(ucfirst($row->name)); ?></td>
								<td><?php echo e($row->ordering); ?></td>
								<td class="text-left">  
								<a href="<?php echo e(url('admin/teams/'.$row->id.'/edit')); ?>">Edit</a>
									|
									<span class="trash"><a href="#<?php echo e($row->id); ?>" class="btn-delete">Delete</a> </span>
									
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
                    <div id="tab1_2" class="tab-pane">
                      <div class="_row">
                        <div class="col-md-12">
                          <div id="international_coordinator" class="tab-pane">
                           <div class="table-responsive mhn20 mvn15">
                      <table class="table admin-form theme-warning fs13" id="datatable2">
                        <thead>
                       <tr class="bg-light">
								<th class="">SN</th>
								<th class="">Name</th>  
								<th class="">Ordering</th>                            
								<th class="text-left">Action</th>
							</tr>
                        </thead>
                        <tbody>
                           <?php if(count($int) > 0): ?>	            
							<?php $__currentLoopData = $int; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr class="id<?php echo e($row->id); ?>">
								<td class=""><?php echo e($loop->iteration); ?></td>
								<td class=""><?php echo e(ucfirst($row->name)); ?></td>
								<td><?php echo e($row->ordering); ?></td>
								<td class="text-left">  
								<a href="<?php echo e(url('admin/teams/'.$row->id.'/edit')); ?>">Edit</a>
									|
									<span class="trash"><a href="#<?php echo e($row->id); ?>" class="btn-delete">Delete</a> </span>
									
								</td>
							</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php endif; ?>  
                          </tr>                    
                        </tbody>
                      </table>
                    </div>
                    </div>
                    </div>
                  </div>
                </div>
                 <div id="tab1_3" class="tab-pane">
                      <div class="_row">
                        <div class="col-md-12">
                          <div id="office_staff" class="tab-pane ">
                           <div class="table-responsive mhn20 mvn15">
                      <table class="table admin-form theme-warning fs13" id="datatable3">
                        <thead>
                       <tr class="bg-light">
								<th class="">SN</th>
								<th class="">Name</th>  
								<th class="">Ordering</th>                            
								<th class="text-left">Action</th>
							</tr>
                        </thead>
                        <tbody>
                           <?php if(count($office) > 0): ?>	            
							<?php $__currentLoopData = $office; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr class="id<?php echo e($row->id); ?>">
								<td class=""><?php echo e($loop->iteration); ?></td>
								<td class=""><?php echo e(ucfirst($row->name)); ?></td>
								<td><?php echo e($row->ordering); ?></td>
								<td class="text-left">  
								<a href="<?php echo e(url('admin/teams/'.$row->id.'/edit')); ?>">Edit</a>
									|
									<span class="trash"><a href="#<?php echo e($row->id); ?>" class="btn-delete">Delete</a> </span>
									
								</td>
							</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php endif; ?>  
                          </tr>                    
                        </tbody>
                      </table>
                    </div>
                    </div>
                    </div>
                  </div>
                </div>
                 <div id="tab1_4" class="tab-pane">
                      <div class="_row">
                        <div class="col-md-12">
                          <div id="field_staff" class="tab-pane active">
                           <div class="table-responsive mhn20 mvn15">
                      <table class="table admin-form theme-warning fs13" id="datatable4">
                        <thead>
                       <tr class="bg-light">
								<th class="">SN</th>
								<th class="">Name</th>
                <th class="">Sub Category</th>
								<th class="">Ordering</th>                            
								<th class="text-left">Action</th>
							</tr>
                        </thead>
                        <tbody>
                           <?php if(count($field) > 0): ?>	            
							<?php $__currentLoopData = $field; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr class="id<?php echo e($row->id); ?>">
								<td class=""><?php echo e($loop->iteration); ?></td>
								<td class=""><?php echo e(ucfirst($row->name)); ?></td>
                <td class=""><?php echo e(teamparent($row->subcategory)); ?></td>
								<td><?php echo e($row->ordering); ?></td>
								<td class="text-left">  
								<a href="<?php echo e(url('admin/teams/'.$row->id.'/edit')); ?>">Edit</a>
									|
									<span class="trash"><a href="#<?php echo e($row->id); ?>" class="btn-delete">Delete</a> </span>
								</td>
							</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php endif; ?>  
                          </tr>                    
                        </tbody>
                      </table>
                    </div>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('libraries'); ?>
<!-- Datatables -->
<script src="<?php echo e(asset('vendor/plugins/datatables/media/js/jquery.dataTables.js')); ?>"></script>

<!-- Datatables Tabletools addon -->
<script src="<?php echo e(asset('vendor/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js')); ?>"></script>

<!-- Datatables ColReorder addon -->
<script src="<?php echo e(asset('vendor/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js')); ?>"></script>

<!-- Datatables Bootstrap Modifications  -->
<script src="<?php echo e(asset('vendor/plugins/datatables/media/js/dataTables.bootstrap.js')); ?>"></script>

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
      url:"<?php echo e(url('admin/teams') . '/'); ?>" + id,
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
 /************/
  $('#datatable1').dataTable({
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
    "iDisplayLength": 20,
    "aLengthMenu": [
    [5, 10, 25, 50, -1],
    [5, 10, 25, 50, "All"]
    ],
    "sDom": '<"dt-panelmenu clearfix"Tfr>t<"dt-panelfooter clearfix"ip>',
    "oTableTools": {
      "sSwfPath": "<?php echo e(asset('vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf')); ?>"
    }
  });
   /************/
  $('#datatable2').dataTable({
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
    "iDisplayLength": 20,
    "aLengthMenu": [
    [5, 10, 25, 50, -1],
    [5, 10, 25, 50, "All"]
    ],
    "sDom": '<"dt-panelmenu clearfix"Tfr>t<"dt-panelfooter clearfix"ip>',
    "oTableTools": {
      "sSwfPath": "<?php echo e(asset('vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf')); ?>"
    }
  });
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
    "iDisplayLength": 20,
    "aLengthMenu": [
    [5, 10, 25, 50, -1],
    [5, 10, 25, 50, "All"]
    ],
    "sDom": '<"dt-panelmenu clearfix"Tfr>t<"dt-panelfooter clearfix"ip>',
    "oTableTools": {
      "sSwfPath": "<?php echo e(asset('vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf')); ?>"
    }
  });
 /************/
  $('#datatable4').dataTable({
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
    "iDisplayLength": 20,
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
<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sevensummittreks/public_html/resources/views/admin/team/index.blade.php ENDPATH**/ ?>