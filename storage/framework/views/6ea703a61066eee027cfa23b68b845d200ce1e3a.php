
<?php $__env->startSection('title', Request::segment(2)); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <button type="button" class="btn btn-default btn-sm backlink"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Back </button>
    <a href="<?php echo e(route('travel_guide_index')); ?>" class="btn btn-default btn-sm backlink"><i class="fa fa-list" aria-hidden="true"></i> Show List </a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <form class="form-horizontal" role="form" id="travelguide" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
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
                        <?php echo $__env->make('admin.travel-guide.general-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <!--//-->
                        </div>
                        <!-- /.tab-pane general -->
                        <div class="tab-pane" id="tab_2">
                        <?php echo $__env->make('admin.travel-guide.add-images', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
 </form>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('libraries'); ?>
<script>
// search trip //
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
<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sevensummittreks/public_html/resources/views/admin/travel-guide/create.blade.php ENDPATH**/ ?>