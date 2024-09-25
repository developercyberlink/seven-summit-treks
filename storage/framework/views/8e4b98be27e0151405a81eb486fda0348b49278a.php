<?php $__env->startSection('title','Geographical facts'); ?>
<?php $__env->startSection('breadcrumb'); ?>
        <a href="<?php echo e(route('facts-create')); ?>" class="btn btn-primary btn-sm">Create</a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="tray tray-center" style="height: 647px;">
        <div class="panel">
            <div class="panel-body ph20">
                <div class="tab-content">
                    <div id="users" class="tab-pane active">
                        <div class="table-responsive mhn20 mvn15">
                            <table class="table admin-form table-striped dataTable" id="datatable3">
                                <thead>
                                <tr class="bg-light">
                                    <th class="">SN</th>
                                    <th class="">Name</th>
                                    <th class="">ALT/m</th>
                                    <th class="">Countries</th>
                                    <th class="">Latitude</th>
                                    <th class="">Longitude</th>
                                    <th class="">RP</th>
                                    <th class="">Area</th>
                                    <th class="">Expedition</th>
                                   
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(count($all) > 0): ?>
                                    <?php $__currentLoopData = $all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="bg-light">

                                    <td class=""><?php echo e($key+=1); ?></td>
                                   <td class="post_title title_hi_sh"><?php echo e(ucfirst($row->name)); ?>

                                     <div class="row_actions">
                                     <a class="btn btn-outline-primary confirm" data-toggle="modal" data-target="#myEditModal<?php echo e($row->id); ?>"></i>Edit </a>|
                                       <span class="trash"> <a href="<?php echo e(route('facts-delete',$row->id)); ?>" onclick="return confirm('Confirm Delete?')" class="btn-btn-danger">Delete</a></span>
                                      </div>
                                       </td>
                                    <td class=""><?php echo e(($row->alt)); ?></td>
                                    <td class=""><?php echo e($row->countries); ?></td>
                                    <td class=""><?php echo e($row->latitude); ?></td>
                                    <td class=""><?php echo e($row->longitude); ?></td>
                                    <td class=""><?php echo e($row->rp); ?></td>
                                    <td class=""><?php echo e($row->area); ?></td>
                                    <td class=""><?php echo e($row->expedition); ?></td>
                                 </tr>
                                   <div id="myEditModal<?php echo e($row->id); ?>" class="modal fade" role="dialog">
                                                <div class="modal-dialog modal-xs">
                                                    <div class="modal-content">

                                                        <div class="card-body">

                                                            <form method="post" class="form-group" action="<?php echo e(route('facts-edit',$row->id)); ?>" enctype="multipart/form-data">
                                                                <?php echo csrf_field(); ?>
                                                                <input type="hidden" name="id" value="<?php echo e($row->id); ?>">

                                                                <div class="panel">
                                                                    <div class="panel-heading">
                                                                        <span class="panel-title">Edit Trip Review</span>
                                                                    </div>
                                                                    <div class="panel-body">

                                                                        <div class="form-group">
                                                                            <label for="inputStandard" class="col-lg-3 control-label">Expedition</label>


                                                                                    <select class="form-control" name="expedition">
                                                                                        <option selected disabled>--Please select expedition--</option>
                                                                                        <?php $__currentLoopData = $exp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                            <option   <?php if($value->title == $row->expedition): ?> selected <?php endif; ?> value="<?php echo e($value->title); ?>"><?php echo e($value->title); ?></option>
                                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                    </select>

                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="inputStandard" class="col-lg-3 control-label">Name</label>
                                                                            <div class="col-lg-8">
                                                                                <div class="bs-component">
                                                                                    <input class="form-control" name="name" value="<?php echo e($row->name); ?>" type="text" placeholder="">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="inputStandard" class="col-lg-3 control-label">Alt/m</label>
                                                                            <div class="col-lg-8">
                                                                                <div class="bs-component">
                                                                                    <input class="form-control" name="alt" value="<?php echo e($row->alt); ?>" type="text" placeholder="">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="inputStandard" class="col-lg-3 control-label">Countries</label>
                                                                            <div class="col-lg-8">
                                                                                <div class="bs-component">
                                                                                    <input class="form-control" name="countries" value="<?php echo e($row->countries); ?>" type="text" placeholder="">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="inputStandard" class="col-lg-3 control-label">Latitude</label>
                                                                            <div class="col-lg-8">
                                                                                <div class="bs-component">
                                                                                    <input class="form-control" name="latitude" value="<?php echo e($row->latitude); ?>" type="text" placeholder="">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <!--<div class="form-group">-->
                                                                        <!--    <label for="inputStandard" class="col-lg-3 control-label">Latitude Symbol</label>-->
                                                                        <!--    <div class="col-lg-8">-->
                                                                        <!--        <div class="bs-component">-->
                                                                        <!--            <input class="form-control" name="lat_sym" value="<?php echo e($row->lat_sym); ?>" type="text" placeholder="">-->
                                                                        <!--        </div>-->
                                                                        <!--    </div>-->
                                                                        <!--</div>-->

                                                                        <div class="form-group">
                                                                            <label for="inputStandard" class="col-lg-3 control-label">Longitude</label>
                                                                            <div class="col-lg-8">
                                                                                <div class="bs-component">
                                                                                    <input class="form-control" name="longitude" value="<?php echo e($row->longitude); ?>" type="text" placeholder="">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <!--<div class="form-group">-->
                                                                        <!--    <label for="inputStandard" class="col-lg-3 control-label">Longitude Symbol</label>-->
                                                                        <!--    <div class="col-lg-8">-->
                                                                        <!--        <div class="bs-component">-->
                                                                        <!--            <input class="form-control" name="long_sym" value="<?php echo e($row->long_sym); ?>" type="text" placeholder="">-->
                                                                        <!--        </div>-->
                                                                        <!--    </div>-->
                                                                        <!--</div>-->

                                                                        <div class="form-group">
                                                                            <label for="inputStandard" class="col-lg-3 control-label">RP</label>
                                                                            <div class="col-lg-8">
                                                                                <div class="bs-component">
                                                                                    <input class="form-control" name="rp" value="<?php echo e($row->rp); ?>" type="text" placeholder="">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="inputStandard" class="col-lg-3 control-label">Area</label>
                                                                            <div class="col-lg-8">
                                                                                <div class="bs-component">
                                                                                    <input class="form-control" name="area" value="<?php echo e($row->area); ?>" type="text" placeholder="">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="box-footer">
                                                                            <input class="btn btn-danger btn-xs pull-right" type="submit" value="Update">
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </form>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
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


<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sevensummittreks/public_html/resources/views/admin/geography/index.blade.php ENDPATH**/ ?>