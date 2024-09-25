
<?php $__env->startSection('title', Request::segment(2)); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <a href="<?php echo e(url('admin/trip/create')); ?>" class="btn btn-primary btn-sm">Create</a>
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
                  <?php if($expedition): ?>
                <li class="active">
                  <a href="#tab1_1" data-toggle="tab">Expedition</a>
                </li>
                <?php endif; ?>
                 <?php if($treking): ?>
                <li>
                  <a href="#tab1_2" data-toggle="tab">Trekking</a>
                </li>
                <?php endif; ?>
              </ul>
            </div>
            <div class="panel-body">
              <div class="tab-content pn br-n">
                  <?php if($expedition): ?>
                <div id="tab1_1" class="tab-pane active">
                  <div class="_row">
                    <div class="col-md-12">
                     
                      <div id="guide" class="tab-pane active">
                       <div class="table-responsive mhn20 mvn15">
                      <table class="table admin-form theme-warning fs13" id="datatable1">
                        <thead>
                           <tr class="bg-light">
                               <th class="text-center"> SN </th>
                              <th width="10%">Trip Title</th>
                               <th width="10%">Region</th> 
                                <th>Status</th>
                               <th class="text-center">Order</th> 
                              <th width="20%">Trip Docs</th>                                     
                              <!--<th width="10%">Published</th>-->
                            </tr>
                        </thead>
                        <tbody>
                          <?php $__currentLoopData = $expedition; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="id<?php echo e($row->id); ?>">
                                    <td class="text-center">
                                        <?php echo e($loop->iteration); ?>

                                    </td>
                                    <td class="post_title title_hi_sh">
                                        <strong> <?php echo e(ucfirst($row->trip_title)); ?> </strong>
                                        <div class="row_actions">
                                            <span class="id">ID: <?php echo e($row->id); ?> | </span>
                                            <span class="edit"><a href="<?php echo e(url('admin/trip/'  . $row->id . '/edit')); ?>" aria-label="">Edit</a></span>
                                            <span class="trash"> | <a href="#<?php echo e($row->id); ?>" class="submitdelete1">Delete</a> </span>
                                        </div>
                                    </td>
                                    <td>
                                  <?php if($row->expeditions): ?>
                                    <?php $__currentLoopData = $row->expeditions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $_row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e(url( 'admin/trip-expedition'.'/'. $_row->id)); ?>"><?php echo e($_row->title); ?></a><br>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                    <input class="CheckStatus" type="checkbox" name="status" data-rowid="<?php echo e($row->id); ?>" <?php echo e(($row->status == 1)?'checked':''); ?> />
                                    </td>
                                    
                                    <td class="text-center">
                                        <?php echo e($row->ordering); ?>

                                    </td>
                                    <td>
                                        <a href="<?php echo e(route('admin.tripdocs.index', $row->id)); ?>" title="PDF" class="btn btn-primary btn-sm">  Docs
                                        </a>
                                            <a href="<?php echo e(route('category.index', $row->id)); ?>" title="Itinerary" class="btn btn-success btn-sm">  Itinerary
                                        </a>
                                        <!--<a href="<?php echo e(route('admin.multiplephoto', $row->id)); ?>" title="Photo">-->
                                        <!--    <i class="fa fa-picture-o" aria-hidden="true"></i>-->
                                        <!--</a> -->

                                        <!--<a href="<?php echo e(route('admin.tripvideos.index', $row->id)); ?>" title="Video">-->
                                        <!--    <i class="fa fa-video-camera" aria-hidden="true"></i>-->
                                        <!--</a> -->

                                    </td>
                                    <!--<td class="date" width="10%"> <?php echo e($row->created_at); ?> </td>-->
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                  
                            </tbody>
                          </table>
                        </div>
                        </div>
                    </div>
                  </div>
                </div>
                <?php endif; ?>
                <?php if($treking): ?>
                    <div id="tab1_2" class="tab-pane <?php echo e(Request::segment(2) == 'trip-region'?'active':''); ?>">
                      <div class="_row">
                        <div class="col-md-12">
                          <div id="insurance" class="tab-pane active">
                           <div class="table-responsive mhn20 mvn15">
                      <table class="table admin-form theme-warning fs13" id="datatable2">
                        <thead>
                        <tr class="bg-light">
                               <th class="text-center"> SN </th>
                              <th width="10%">Trip Title</th>
                               <th width="10%">Region</th> 
                                <th>Status</th>
                               <th class="text-center">Order</th> 
                              <th width="20%">Trip Docs</th>                                     
                              <!--<th width="10%">Published</th>-->
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $treking; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="id<?php echo e($row->id); ?>">
                                    <td class="text-center">
                                        <?php echo e($loop->iteration); ?>

                                    </td>
                                    <td class="post_title title_hi_sh">
                                        <strong> <?php echo e(ucfirst($row->trip_title)); ?> </strong>
                                        <div class="row_actions">
                                            <span class="id">ID: <?php echo e($row->id); ?> | </span>
                                            <span class="edit"><a href="<?php echo e(url('admin/trip/'  . $row->id . '/edit')); ?>" aria-label="">Edit</a> </span>
                                            <span class="trash"> | <a href="#<?php echo e($row->id); ?>" class="submitdelete1">Delete</a> </span>
                                        </div>
                                    </td>
                                     <td>
                                        <?php if($row->regions): ?>
                                        <?php $__currentLoopData = $row->regions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a href="<?php echo e(url( 'admin/trip-region'.'/'. $value->id)); ?>"><?php echo e($value->title); ?></a><br>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                        </td>
                                    <td class="text-center">
                                    <input class="CheckStatus" type="checkbox" name="status" data-rowid="<?php echo e($row->id); ?>" <?php echo e(($row->status == 1)?'checked':''); ?> />
                                    </td>
                                    
                                    <td class="text-center">
                                        <?php echo e($row->ordering); ?>

                                    </td>
                                    <td>
                                        <a href="<?php echo e(route('admin.tripdocs.index', $row->id)); ?>" title="PDF" class="btn btn-primary btn-sm">  Docs
                                        </a>
                                            <a href="<?php echo e(route('category.index', $row->id)); ?>" title="Itinerary" class="btn btn-success btn-sm">  Itinerary
                                        </a>
                                        <!--<a href="<?php echo e(route('admin.multiplephoto', $row->id)); ?>" title="Photo">-->
                                        <!--    <i class="fa fa-picture-o" aria-hidden="true"></i>-->
                                        <!--</a> -->

                                        <!--<a href="<?php echo e(route('admin.tripvideos.index', $row->id)); ?>" title="Video">-->
                                        <!--    <i class="fa fa-video-camera" aria-hidden="true"></i>-->
                                        <!--</a> -->

                                    </td>
                                    <!--<td class="date" width="10%"> <?php echo e($row->created_at); ?> </td>-->
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </tr>                    
                        </tbody>
                      </table>
                    </div>
                    </div>
                    </div>
                  </div>
                </div>
                <?php endif; ?>
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
    <script src="<?php echo e(asset('vendor/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js')); ?>">
    </script>

    <!-- Datatables ColReorder addon -->
    <script src="<?php echo e(asset('vendor/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js')); ?>">
    </script>

    <!-- Datatables Bootstrap Modifications  -->
    <script src="<?php echo e(asset('vendor/plugins/datatables/media/js/dataTables.bootstrap.js')); ?>"></script>
    <script type="text/javascript">
    
        $('.CheckStatus').on('click',function(e){
    var csrf = $('meta[name="csrf-token"]').attr('content');
    var id = $(this).attr('data-rowid');
    var url  = '<?php echo e(route("admin.tripstatus",["id"=>':id'])); ?>';
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
        (function($) {
            $('.submitdelete1').on('click', function(e) {
                e.preventDefault();
                if (confirm('Are you sure to delete??')) {
                    var csrf = $('meta[name="csrf-token"]').attr('content');
                    var str = $(this).attr('href');
                    var id = str.slice(1);
                    $.ajax({
                        type: 'delete',
                        url: "<?php echo e(url('admin') . '/' . Request::segment(2) . '/'); ?>" + id,
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

        /********/
        $('document').ready(function() {
            $('#checkAll').on('click', function(e) {
                if ($(this).is(':checked', true)) {
                    $('.check_box').prop('checked', true);
                } else {
                    $('.check_box').prop('checked', false);
                }
            });
            $('.deleteAll').on(function() {

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
            "iDisplayLength": 30,
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
            "iDisplayLength": 30,
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

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sevensummittreks/public_html/resources/views/admin/trips/index.blade.php ENDPATH**/ ?>