
<?php $__env->startSection('title', ''); ?>
<?php $__env->startSection('breadcrumb'); ?>
<a href="<?php echo e(route('category.index',$id)); ?>" class="btn btn-primary btn-sm">List</a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<form class="form-horizontal" role="form" id="tripData" method="post">
 <?php echo e(csrf_field()); ?>

<section class="content">
    <div class="container-fluid">

        <footer>
            <div id="publishing-action">
                <button type="submit" name="submit" class="btn btn-success" value="publish"> Publish</button>
            </div>
            <div class="clearfix"></div>
        </footer>

        <div class="row">
            <div class="col-12">
                <!-- Custom Tabs -->
                <div class="card">
                    <div class="card-header d-flex p-0">
                        <h3 class="card-title p-3"><?php echo e($trip->trip_title); ?> Itineraries</h3>
                        <ul class="nav nav-pills ml-auto p4 mb10 mt10 nav-custom">
                            <li class="nav-item active"><a class="nav-link active" href="#tab_1" data-toggle="tab">
                                    GENERAL</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">ITINERARY</a>
                              <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">COST INCLUDES</a>
                                <li class="nav-item"><a class="nav-link" href="#tab_4" data-toggle="tab">COST EXCLUDES</a>

                            </li>

                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <!--General tab starts -->
                                <div class="row">
                                <div class="col-md-8">
                                <div class="panel">
                                 <div class="panel-heading">
                                   <span class="panel-title">Add Itinerary Category </span>
                                 </div>
                                 <div class="panel-body">
                                   <div class="form-group">
                                     <label for="inputStandard" class="col-lg-2 control-label">Title </label>
                                     <div class="col-lg-8">
                                       <div class="bs-component">
                                         <input type="text" id="category" name="category" class="form-control" />
                                         <!-- <?php if($itineraryCategory->count() > 0): ?>
                                             <select class="form-control" name="category">
                                                 <option value="" selected disabled>Select Category</option>
                                                 <?php $__currentLoopData = $itineraryCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                     <option value="<?php echo e($row->id); ?>"><?php echo e($row->category); ?></option>
                                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                             </select>
                                         <?php endif; ?> -->
                                       </div>
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
                                <?php echo $__env->make('admin.itinerary-category.create-itinerary', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>

                            <div class="tab-pane" id="tab_3">
                                <?php echo $__env->make('admin.itinerary-category.cost-include', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>

                            <div class="tab-pane" id="tab_4">
                                <?php echo $__env->make('admin.itinerary-category.cost-exclude', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
    /******** For Itinerary *******/
    jQuery(document).delegate('a.add-itinerary', 'click', function(e) {
        e.preventDefault();
        var content = jQuery('#row_additional .row'),
            size = jQuery('#row_body >.row').length + 1,
            element = null,
            element = content.clone();
        var newel = $('.input-form:last').clone();
        element.attr('id', 'rec-' + size);
        element.find('.delete-itinerary').attr('itinerary-data-id', size);
        element.appendTo('#row_body');
        element.find('.sn').html(size);
    });

    jQuery(document).delegate('button.delete-itinerary', 'click', function(e) {
        e.preventDefault();
        var makeConfirm = confirm("Are you sure You want to delete");
        if (makeConfirm == true) {
            var id = jQuery(this).attr('itinerary-data-id');
            var targetDiv = jQuery(this).attr('targetDiv');
            jQuery('#rec-' + id).remove();
            return true;
        } else {
            return false;
        }
    });
    /******** End For Itinerary *******/

    /******** For cOST INCLUDE ***********/
    jQuery(document).delegate('a.add-testimonial', 'click', function(e) {
        e.preventDefault();
        var content = jQuery('#row_testimonial_additional .row'),
            size = jQuery('#row_testimonial_body >.row').length + 1,
            element = null,
            element = content.clone();
        element.attr('id', 'testimonial-rec-' + size);
        element.find('.delete-testimonial').attr('testimonial-data-id', size);
        element.appendTo('#row_testimonial_body');
        element.find('.sn').html(size);
    });

    jQuery(document).delegate('button.delete-testimonial', 'click', function(e) {
        e.preventDefault();
        var makeConfirm = confirm("Are you sure You want to delete");
        if (makeConfirm == true) {
            var id = jQuery(this).attr('testimonial-data-id');
            var targetDiv = jQuery(this).attr('targetDiv');
            jQuery('#testimonial-rec-' + id).remove();
            //regnerate index number on table
            $('#row_testimonial_body .row').each(function(index) {
                $(this).find('span.sn').html(index + 1);
            });
            return true;
        } else {
            return false;
        }
    });
    /******** End COST INCLUDE *********/

    /******** For COST EXCLUDE ***********/
    jQuery(document).delegate('a.add-info', 'click', function(e) {
        e.preventDefault();
        var content = jQuery('#row_info_additional .row'),
            size = jQuery('#row_info_body >.row').length + 1,
            element = null,
            element = content.clone();
        element.attr('id', 'info-rec-' + size);
        element.find('.delete-info').attr('info-data-id', size);
        element.appendTo('#row_info_body');
        element.find('.sn').html(size);
    });

    jQuery(document).delegate('button.delete-info', 'click', function(e) {
        e.preventDefault();
        var makeConfirm = confirm("Are you sure You want to delete");
        if (makeConfirm == true) {
            var id = jQuery(this).attr('info-data-id');
            var targetDiv = jQuery(this).attr('targetDiv');
            jQuery('#info-rec-' + id).remove();
            //regnerate index number on table
            $('#row_info_body .row').each(function(index) {
                $(this).find('span.sn').html(index + 1);
            });
            return true;
        } else {
            return false;
        }
    });
    /******** End COST EXCLUDE *********/
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#tripData").on('submit', function(e) {
            e.preventDefault();
            let url = "<?php echo e(route('itinerary-category.store')); ?>";
            let tripData = document.getElementById('tripData');
            let data = new FormData(tripData);
            data.append('trip_id',<?php echo e($id); ?>);

            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                cache: false,
                processData: false,
                contentType: false,
                beforeSend: function() {},
                success: function(data) {
                    console.log(data);
                    // location.reload();
                    document.getElementById("tripData").reset();
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
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log('Error');
                    console.log(errorThrown);
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
    </script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sevensummittreks/public_html/resources/views/admin/itinerary-category/create.blade.php ENDPATH**/ ?>