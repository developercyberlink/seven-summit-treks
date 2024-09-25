<?php $__env->startSection('title', Request::segment(2)); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <a href="<?php echo e(route('admin.post.create', Request::segment(2))); ?>" class="btn btn-primary btn-sm">Create</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <section id="" class="table-layout animated fadeIn">
        <!-- begin: .tray-center -->
        <div class="">
            <h4> Posts </h4>
            <!-- recent orders table -->
            <div class="panel">
                <div class="panel-body pn">
                    <div class="table-responsive">
                        <table class="table admin-form table-striped dataTable" id="datatable3">
                            <thead>
                                <tr class="bg-light">
                                    <th class="text-center"> SN </th>
                                    <th>Post Name</th>
                                    <th>Status</th>
                                    <th>Order</th>
                                    <th></th>
                                    <th>Published</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="id<?php echo e($row->id); ?>">
                                        <td class="text-center">
                                            <?php echo e($loop->iteration); ?>

                                        </td>
                                        <td class="post_title title_hi_sh">
                                            <?php if(check_child_post($row->id)): ?>
                                                <strong> <?php echo e(ucfirst($row->post_title)); ?> </strong>
                                                <a href="<?php echo e(url('admin/' . Request::segment(2) . '/' . $row->id)); ?>"> <i
                                                        class="fa fa-list" aria-hidden="true"></i> </a>
                                            <?php else: ?>
                                                <strong> <?php echo e(ucfirst($row->post_title)); ?> </strong>
                                            <?php endif; ?>

                                            <div class="row_actions"><span class="id">ID: <?php echo e($row->id); ?> | </span><span
                                                    class="edit"><a
                                                        href="<?php echo e(url('admin/' . Request::segment(2) . '/' . $row->id . '/edit')); ?>"
                                                        aria-label="">Edit</a>
                                                </span>

                                                <?php if(!check_child_post($row->id) > 0 && $row->id != 7 && $row->id != 2 && $row->id != 4 && $row->id !=42 && $row->id != 78): ?>
                                                    | <span class="trash"><a href="#<?php echo e($row->id); ?>"
                                                            class="submitdelete1">Delete</a> </span>
                                                <?php endif; ?>

                                        </td>
                                        <td>
                                             <input class="CheckStatus" type="checkbox" name="status" data-rowid="<?php echo e($row->id); ?>" <?php echo e(($row->status == 1)?'checked':''); ?> />
                                            <!--<a href="<?php echo e(url('admin/associated/' . Request::segment(2) . '/' . $row->id)); ?>"><i-->
                                            <!--        class="fa fa-plus"></i></a>-->
                                                    </td>
                                        <td class="categories">
                                            <?php echo e($row->post_order); ?>

                                        </td>
                                        <td>
                                            <!--<a href="<?php echo e(route('doc.multipledocument', $row->id)); ?>" title="PDF">-->
                                            <!--    <i class="fa fa-file-pdf-o fa fa-2x" aria-hidden="true"></i>-->
                                            <!--</a>-->
                                            <?php if($row->id == 7 || $row->id == 2 || $row->id == 4 || $row-> id == 42): ?>
                                            <a href="<?php echo e(route('admin.multiplephoto', $row->id)); ?>" title="Photo">
                                                <i class="fa fa-file-image-o fa fa-2x" aria-hidden="true"></i>
                                            </a>
                                            <?php endif; ?>
                                            

                                        </td>
                                        <td class="date"> <?php echo e($row->created_at); ?> </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- end: .tray-center -->
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('libraries'); ?>
    <!-- Datatables -->
    <script src="<?php echo e(asset(env('PUBLIC_PATH') . 'vendor/plugins/datatables/media/js/jquery.dataTables.js')); ?>"></script>

    <!-- Datatables Tabletools addon -->
    <script
        src="<?php echo e(asset(env('PUBLIC_PATH') . 'vendor/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js')); ?>">
    </script>

    <!-- Datatables ColReorder addon -->
    <script
        src="<?php echo e(asset(env('PUBLIC_PATH') . 'vendor/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js')); ?>">
    </script>

    <!-- Datatables Bootstrap Modifications  -->
    <script src="<?php echo e(asset(env('PUBLIC_PATH') . 'vendor/plugins/datatables/media/js/dataTables.bootstrap.js')); ?>">
    </script>
    <script type="text/javascript">
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
        
         $('.CheckStatus').on('click',function(e){
        var csrf = $('meta[name="csrf-token"]').attr('content');
        var id = $(this).attr('data-rowid');
        var url  = '<?php echo e(route("admin.poststatus",["id"=>':id'])); ?>';
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
                "sSwfPath": "<?php echo e(asset(env('PUBLIC_PATH'))); ?>vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf"
            }
        });

    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sevensummittreks/public_html/resources/views/admin/posts/index.blade.php ENDPATH**/ ?>