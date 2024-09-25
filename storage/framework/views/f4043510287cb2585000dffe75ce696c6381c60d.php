
<?php $__env->startSection('title','Trip Guide'); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <a href="<?php echo e(route('travel_guide')); ?>" class="btn btn-primary btn-sm">Create</a>
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
                      <a href="#tab1_1" data-toggle="tab">Guide</a>
                    </li>
                    <li>
                      <a href="#tab1_2" data-toggle="tab">Insurance</a>
                    </li>
                    <li>
                      <a href="#tab1_3" data-toggle="tab">Payment</a>
                    </li>
                  </ul>
                </div>
                <div class="panel-body">
                  <div class="tab-content pn br-n">
                    <div id="tab1_1" class="tab-pane active">
                      <div class="_row">
                        <div class="col-md-12">
                         
                          <div id="guide" class="tab-pane active">
                           <div class="table-responsive mhn20 mvn15">
                          <table class="table admin-form theme-warning fs13" id="datatable1">
                            <thead>
                              <tr class="bg-light">
                                <th class="">SN</th>
                                <th class="">Trip</th>
                                <th class="">Trip Type</th>
                                <th class="">Title</th>
                                <th class="text-left">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(count($guide) > 0): ?>
                                <?php $__currentLoopData = $guide; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="bg-light">
                                    <td class=""><?php echo e($key+=1); ?></td>
                                    <td class=""><?php echo e($row->trips->trip_title); ?></td>
                                    <td class=""><?php echo e($row->trips->trip_type == '1'?'Trekking':'Expedition'); ?></td>
                                    <td class=""><?php echo e(ucfirst($row->title)); ?></td>
                                    <td class="text-left">
                                        <a class="btn btn-outline-primary confirm" href="<?php echo e(route('travel_guide_edit',$row->id)); ?>">Edit </a>|
                                          <span class="trash">
                                        <a href="<?php echo e(route('travel_guide_delete',$row->id)); ?>" onclick="return confirm('Confirm Delete?')" class="btn-btn-danger">Delete</a></span>
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
                              <div id="insurance" class="tab-pane active">
                               <div class="table-responsive mhn20 mvn15">
                          <table class="table admin-form theme-warning fs13" id="datatable2">
                            <thead>
                             <tr class="bg-light">
                            <th class="">SN</th>
                            <th class="">Trip</th>
                            <th class="">Trip Type</th>
                            <th class="">Title</th>
                            <th class="text-left">Action</th>
                        </tr>
                            </thead>
                            <tbody>
                               <?php if(count($insurance) > 0): ?>
                                <?php $__currentLoopData = $insurance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="bg-light">
                                    <td class=""><?php echo e($key+=1); ?></td>
                                    <td class=""><?php echo e($row->trips->trip_title); ?></td>
                                    <td class=""><?php echo e($row->trips->trip_type == '1'?'Trekking':'Expedition'); ?></td>
                                    <td class=""><?php echo e(ucfirst($row->title)); ?></td>
                                    <td class="text-left">
                                        <a class="btn btn-outline-primary confirm" href="<?php echo e(route('travel_guide_edit',$row->id)); ?>">Edit </a>|
                                          <span class="trash">
                                        <a href="<?php echo e(route('travel_guide_delete',$row->id)); ?>" onclick="return confirm('Confirm Delete?')" class="btn-btn-danger">Delete</a></span>
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
                              <div id="payment" class="tab-pane active">
                               <div class="table-responsive mhn20 mvn15">
                          <table class="table admin-form theme-warning fs13" id="datatable3">
                            <thead>
                             <tr class="bg-light">
                            <th class="">SN</th>
                            <th class="">Trip</th>
                            <th class="">Trip Type</th>
                            <th class="">Title</th>
                            <th class="text-left">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php if(count($payment) > 0): ?>
                                <?php $__currentLoopData = $payment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="bg-light">
                                    <td class=""><?php echo e($key+=1); ?></td>
                                    <td class=""><?php echo e($row->trips->trip_title); ?></td>
                                    <td class=""><?php echo e($row->trips->trip_type == '1'?'Trekking':'Expedition'); ?></td>
                                    <td class=""><?php echo e(ucfirst($row->title)); ?></td>
                                    <td class="text-left">
                                        <a class="btn btn-outline-primary confirm" href="<?php echo e(route('travel_guide_edit',$row->id)); ?>">Edit </a>|
                                          <span class="trash">
                                        <a href="<?php echo e(route('travel_guide_delete',$row->id)); ?>" onclick="return confirm('Confirm Delete?')" class="btn-btn-danger">Delete</a></span>
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
<script src="<?php echo e(asset('vendor/plugins/datatables/media/js/jquery.dataTables.js')); ?>"></script>

<!-- Datatables Tabletools addon -->
<script src="<?php echo e(asset('vendor/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js')); ?>"></script>

<!-- Datatables ColReorder addon -->
<script src="<?php echo e(asset('vendor/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js')); ?>"></script>

<!-- Datatables Bootstrap Modifications  -->
<script src="<?php echo e(asset('vendor/plugins/datatables/media/js/dataTables.bootstrap.js')); ?>"></script>
    <script type="text/javascript">
        

/********/
  $('document').ready(function(){
    $('#checkAll').on('click',function(e){
      if($(this).is(':checked', true)){
        $('.check_box').prop('checked', true);
      }else{
        $('.check_box').prop('checked', false);
      }
    });
    $('.deleteAll').on(function(){

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

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sevensummittreks/public_html/resources/views/admin/travel-guide/index.blade.php ENDPATH**/ ?>