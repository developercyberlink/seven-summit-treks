
<?php $__env->startSection('title', Request::segment(2)); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <button type="button" class="btn btn-default btn-sm backlink"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Back </button>
    <a href="<?php echo e(route('travel_guide_index')); ?>" class="btn btn-default btn-sm backlink"><i class="fa fa-list" aria-hidden="true"></i> Show List </a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <form class="form-horizontal" role="form" id="travelguide" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
<section class="content">
<div class="container-fluid">
    <div class="alert" id="message" style="display: none"></div>
    <footer>
        <div id="publishing-action">
            <button type="submit" name="submit" class=" btn btn-success"> Publish</button>
        </div>
        <div class="clearfix"></div>
    </footer>

    <div class="row">
        <div class="col-12">
            <!-- Custom Tabs -->
            <div class="card">
                <div class="card-header d-flex p-0">
                    <!-- <h3 class="card-title p-3">Manage Trips</h3> -->
                    <ul class="nav nav-pills ml-auto p-2">
                        <li class="nav-item active"><a class="nav-link active" href="#tab_1" data-toggle="tab"> GENERAL</a></li>
                        <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">IMAGES</a></li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            <!--General tab starts -->
                            <div class="col-md-8">
                                <!-- Input Fields -->
                                <div class="panel">
                                    <div class="panel-heading">
                                        <span class="panel-title">Edit Travel Guide</span>
                                    </div>
                                    <div class="panel-body">

                                        <div class="form-group">
                                            <label for="inputStandard" class="col-lg-2 control-label">Category</label>
                                            <div class="col-lg-9">
                                                <div class="bs-component">
                                                <select class="form-control" name="category">
                                                    <option <?php if($find->category=='guide'): ?> selected <?php endif; ?> value="guide">Travel Guide</option>
                                                    <option <?php if($find->category=='insurance'): ?> selected <?php endif; ?> value="insurance">Trip Insurance</option>
                                                    <option <?php if($find->category=='payment'): ?> selected <?php endif; ?>  value="payment">Application process</option>
                                                </select>
                                                <div id="source-button" class="btn btn-primary btn-xs" style="display: none;">&lt; &gt;</div></div>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="inputStandard" class="col-lg-2 control-label">Title</label>
                                            <div class="col-lg-9">
                                                <div class="bs-component">
                                                    <input type="text" id="category" name="title" value="<?php echo e($find->title); ?>" class="form-control" placeholder="" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputStandard" class="col-lg-2 control-label">Description</label>
                                            <div class="col-lg-9">
                                                <div class="bs-component">
                                                    <div class="bs-component">
                                                        <textarea class="form-control my-editor" id="textArea3" name="description" rows="15" autocomplete="off">
                                                            <?php echo e($find->description); ?>

                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputStandard" class="col-lg-2 control-label">External Link</label>
                                            <div class="col-lg-9">
                                                <div class="bs-component">
                                                    <input class="form-control" name="link" value="<?php echo e($find->link); ?>" type="text" placeholder="">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="admin-form">
                                    <div class="sid_bvijay mb10">
                                        <div class="hd_show_con">
                                            <div class="publice_edi">
                                                Status: <a href="avoid:javascript;" data-toggle="collapse" data-target="#publish_1">Active</a>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>

                                    <div class="sid_bvijay mb10">
                                        <label class="field text">
                                            
                                        </label>
                                    </div>
                                    
                                    <div class="sid_bvijay mb10">
                                         <h4> Trips </h4>
                                         <div class="hd_show_con">
                                    
                                    <div class=" has-feedback has-search">
                                        <input class="category-search form-control" type="text" placeholder="Search.."> 
                                        <span class="glyphicon glyphicon-search form-control-feedback"></span>
                                      </div>
                                            <div class="tab-content mb15">
                                           <div id="tab1" class="tab-pane active">
                                            <?php if($trip->count() > 0): ?>
                                               <ul class="ctgor category-list" id="myTable">
                                                  <?php $__currentLoopData = $trip; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li>
                                                  <label class="">
                                                    <input type="radio" name="trip_id" value="<?php echo e($value->id); ?>" <?php echo e(($value->id == $find->trip_id ) ?'checked':''); ?>>
                                                    <?php echo e($value->trip_title); ?>  
                                                  </label>
                                                </li>    
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                              </ul> 
                                              <?php endif; ?>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                </div>

                                    </div>
                                <!--//-->
                                </div>
                                <!-- /.tab-pane general -->
                                <div class="tab-pane" id="tab_2">
                                    <div class="col-md-12">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <span class="panel-title"> Travel Guide </span>
                                                <a class="btn btn-primary pull-right add-gear" data-added="0"><i class="glyphicon glyphicon-plus"></i> Add Row </a>
                                            </div>

                                            <div class="panel-body" id="row_gear_body">
                                                <div class="row" id="gear-rec-1">
                                                    <div class="col-md-5"><input type="text" name="gear_ordering[]" class="form-control" placeholder="SN" /></div>

                                                    <div class="col-md-6"><input type="file" name="gear_thumbnail[]" class="form-control" /></div>
                                                    <div class="col-md-1"><button class="btn btn-danger delete-gear" gear-data-id="1"><i class="glyphicon glyphicon-trash"></i></button></div>
                                                </div>
                                            </div>

                                            <div style="display:none;">
                                                <div id="row_gear_additional">
                                                    <div class="row">
                                                        <div class="col-md-5"><input type="text" name="gear_ordering[]" class="form-control" placeholder="SN" /></div>
                                                        <div class="col-md-6"><input type="file" name="gear_thumbnail[]" class="form-control" /></div>
                                                        <div class="col-md-1"><button class="btn btn-danger delete-gear" schedule-data-id="0"><i class="glyphicon glyphicon-trash"></i></button></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php $i =0; ?>
                                    <?php if($find->images->count() > 0): ?>
                                        <?php $__currentLoopData = $find->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-lg-2 id<?php echo e($row->id); ?>">
                                                <a href="#<?php echo e($row->id); ?>" class="delete_image">X</a>
                                                <img src="<?php echo e(asset('/uploads/travel-guide/' . $row->image)); ?>" width="100" height="100" />
                                            </div>
                                            <?php $i++;

                                            if($i%5 == 0){
                                                echo '<div class="clearfix"></div>';
                                            }
                                            ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>

                            <!-- /.tab-pane -->

                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- ./card -->
                </div>
                <!-- /.col -->
            </div>
        </div>
    </section>
</form>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript">

        /******** For Gear *******/
        jQuery(document).delegate('a.add-gear', 'click', function(e) {
            e.preventDefault();
            var content = jQuery('#row_gear_additional .row'),
                size = jQuery('#row_gear_body >.row').length + 1,
                element = null,
                element = content.clone();
            element.attr('id', 'gear-rec-'+size);
            element.find('.delete-gear').attr('gear-data-id', size);
            element.appendTo('#row_gear_body');
            element.find('.sn').html(size);
        });

        jQuery(document).delegate('button.delete-gear', 'click', function(e) {
            e.preventDefault();
            var makeConfirm = confirm("Are you sure You want to delete");
            if (makeConfirm == true) {
                var id = jQuery(this).attr('gear-data-id');
                var targetDiv = jQuery(this).attr('targetDiv');
                jQuery('#gear-rec-' + id).remove();
                return true;
            } else {
                return false;
            }
        });
        /******** End For Gear *******/

        // Delete Product Image
        $('.delete_image').on('click',function(e){
            e.preventDefault();
            var csrf = $('meta[name="csrf-token"]').attr('content');
            var str = $(this).attr('href');
            var id = str.slice(1);
            $.ajax({
                type:'delete',
                url:"<?php echo e(url('admin-travel-guide/photo/') . '/'); ?>" + id,
                data:{_token:csrf},
                success:function(data){
                    $('#message').css('display','block');
                    $('#message').html(data.message);
                    $('#message').addClass(data.class_name);
                    $('div .id'+id ).remove();
                },
                error:function(data){
                    alert('Error occurred!');
                }
            });
        });

        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $("#travelguide").on('submit',function(e){
                e.preventDefault();
                let url = "<?php echo e(route('travel_guide_edit')); ?>";
                let tripData = document.getElementById('travelguide');
                let data = new FormData(tripData);
                data.append('id',<?php echo e($find->id); ?>);


                $.ajax({
                    url: url,
                    type: 'POST',
                    data: data,
                    cache: false,
                    processData: false,
                    contentType : false,
                    beforeSend:function() {},
                    success: function (data) {
                        console.log(data);
                        location.reload();
                        document.getElementById("travelguide").reset();
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                        })
                        Toast.fire({
                            icon: 'success',
                            title: data.message
                        })
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        // console.log(jqXHR, textStatus, errorThrown);
                        console.log('Error');
                        console.log(textStatus);
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                        })
                        Toast.fire({
                            icon: 'warning',
                            title: textStatus
                        })
                    }
                });
            });


        });
        $(document).ready(function(){
$(".category-search").on("keyup", function() {
var value = $(this).val().toLowerCase();
$(".category-list li").filter(function() {
$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
});
});
});

    </script>
        <?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sevensummittreks/public_html/resources/views/admin/travel-guide/edit.blade.php ENDPATH**/ ?>