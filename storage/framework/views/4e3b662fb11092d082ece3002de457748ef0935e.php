<?php $__env->startSection('title','Trip Review'); ?>
<?php $__env->startSection('breadcrumb'); ?>
<a href="<?php echo e(route('post-trip-review')); ?>" class="btn btn-primary btn-sm">Create</a>
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
								<th class="">Trip</th>
								<th class="">Details</th>
								<th class="">Rating <br><small>Above 4 will only be shown</small></th>
								<th class="">Review</th>
								<th class="">Status <br><small>Green will be shown</small></th>
								<th class="text-left">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php if(count($review) > 0): ?>
							<?php $__currentLoopData = $review; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="bg-light">

                                <td class=""><?php echo e($key+=1); ?></td>
								<td class=""><?php echo e($row->trips ? $row->trips->trip_title : ''); ?></td>
								<td class=""><?php if($row->image): ?><img src="<?php echo e(asset('images/reviews/'.$row->image)); ?>" width="150px"><?php endif; ?> <br><?php echo e(ucfirst($row->name)); ?> <br> <?php echo e($row->email); ?> <br> <?php echo e(ucfirst($row->country)); ?></td>
								
								<td class=""><?php echo e(($row->rating)); ?></td>
								<td class=""><?php echo \Illuminate\Support\Str::limit($row->review,50,'...'); ?></td>
								
								<td class="">
                                    <form method="post" action="<?php echo e(route('review-status')); ?>">
                                        <input type="hidden" name="status" value="<?php echo e($row->id); ?>">
                                        <?php echo csrf_field(); ?>
                                        <?php if(($row->status)==0): ?>
                                            <button class="btn btn-danger btn btn-sm" name="inactive"><i
                                                    class="fa fa-times"></i>
                                            </button>
                                        <?php else: ?>
                                            <button class="btn btn-success btn btn-sm" name="active"><i
                                                    class="fa fa-check"></i>
                                            </button>
                                        <?php endif; ?><br>
                                        <small>Click to change status</small>
                                    </form>
                                </td>

								<td class="text-left">
                                    <a class="btn btn-outline-primary confirm"
                                       data-toggle="modal"
                                       data-target="#myEditModal<?php echo e($row->id); ?>"
                                    >Edit </a>
                                    <br/>
                                      <span class="trash">
									<a href="<?php echo e(route('delete-trip-review',$row->id)); ?>" onclick="return confirm('Confirm Delete?')" class="btn-btn-danger">
									   Delete</a></span>
								</td>
                                    <div id="myEditModal<?php echo e($row->id); ?>" class="modal fade" role="dialog">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" align="center"><b>Edit Review</b></h4>

                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="card-body">

                                                    <form method="post" class="form-group" action="<?php echo e(route('edit-trip-review')); ?>" enctype="multipart/form-data">
                                                        <?php echo csrf_field(); ?>
                                                        <input type="hidden" name="id" value="<?php echo e($row->id); ?>">

                                                        <div class="panel">
                                                            <div class="panel-heading">
                                                                <span class="panel-title">Edit Trip Review</span>
                                                            </div>
                                                            <div class="panel-body">

                                                                <div class="form-group">
                                                                    <label for="inputStandard" class="col-lg-3 control-label">Trip</label>
                                                                    <div class="col-lg-8">
                                                                        <div class="bs-component">
                                                                            <select class="form-control" name="trip_id">
                                                                                <option selected disabled>--Please select trip--</option>
                                                                                <?php if($row->trips): ?>
                                                                                <?php $__currentLoopData = $trip; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                    <option <?php if($value->id==$row->trips->id): ?> selected <?php endif; ?> value="<?php echo e($value->id); ?>"><?php echo e($value->trip_title); ?></option>
                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                <?php else: ?>
                                                                                  <?php $__currentLoopData = $trip; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                    <option value="<?php echo e($value->id); ?>"><?php echo e($value->trip_title); ?></option>
                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                <?php endif; ?>

                                                                            </select>
                                                                            <div id="source-button" class="btn btn-primary btn-xs" style="display: none;">&lt; &gt;</div></div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="inputStandard" class="col-lg-3 control-label">Trip Rating</label>
                                                                    <div class="col-lg-8">
                                                                        <div class="bs-component">
                                                                            <select class="form-control" name="rating">
                                                                                <option selected disabled>--Please select trip rating--</option>
                                                                                <option <?php if($row->rating==1): ?> selected <?php endif; ?> value="1">1 star</option>
                                                                                <option <?php if($row->rating==2): ?> selected <?php endif; ?> value="2">2 star</option>
                                                                                <option <?php if($row->rating==3): ?> selected <?php endif; ?> value="3">3 star</option>
                                                                                <option <?php if($row->rating==4): ?> selected <?php endif; ?> value="4">4 star</option>
                                                                                <option <?php if($row->rating==5): ?> selected <?php endif; ?> value="5">5 star</option>

                                                                            </select>
                                                                            <div id="source-button" class="btn btn-primary btn-xs" style="display: none;">&lt; &gt;</div></div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="inputStandard" class="col-lg-3 control-label">Name</label>
                                                                    <div class="col-lg-8">
                                                                        <div class="bs-component">
                                                                            <input type="text" id="category" name="name" value="<?php echo e($row->name); ?>" class="form-control" placeholder="" />
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="inputStandard" class="col-lg-3 control-label">Email</label>
                                                                    <div class="col-lg-8">
                                                                        <div class="bs-component">
                                                                            <input type="text" id="cat_uri" name="email" value="<?php echo e($row->email); ?>" class="form-control" placeholder="" />
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                               

                                                                <div class="form-group">
                                                                    <label for="inputStandard" class="col-lg-3 control-label">Youtube video URL</label>
                                                                    <div class="col-lg-8">
                                                                        <div class="bs-component">
                                                                            <input class="form-control" name="video_url" value="<?php echo e($row->video_url); ?>" type="text" placeholder="">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="inputStandard" class="col-lg-3 control-label">Country</label>
                                                                    <div class="col-lg-8">
                                                                        <div class="bs-component">
                                                                            <input class="form-control" name="country" value="<?php echo e($row->country); ?>" type="text" placeholder="">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="inputStandard" class="col-lg-3 control-label">Review</label>
                                                                    <div class="col-lg-8">
                                                                        <div class="bs-component">
                                                                            <div class="bs-component">
                                                                                <textarea class="my-editor form-control" id="textArea3" name="review"  rows="3" autocomplete="off">
                                                                                    <?php echo $row->review; ?>

                                                                                </textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                 <div class="form-group">
                                                                    <label>Current Image:</label>
                                                                    <br>
                                                                    <?php if($row->image): ?>
                                                                    <img src="<?php echo e(url('images/reviews/'.$row->image)); ?>" width="100">
                                                                    <?php endif; ?>
                                                                    <hr>
                                                                    <label for="inputStandard" class="col-lg-3 control-label">Image</label>
                                                                    <div class="col-lg-8">
                                                                        <div class="bs-component">
                                                                            <input type="file" id="caption" name="photo" class="form-control" placeholder="" />
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

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sevensummittreks/public_html/resources/views/admin/trip-reviews/index.blade.php ENDPATH**/ ?>