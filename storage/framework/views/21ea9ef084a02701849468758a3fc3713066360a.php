<?php $__env->startSection('title', ''); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <!--<a href="<?php echo e(route('options.create')); ?>" class="btn btn-primary btn-sm">Create</a>-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

        <!-- begin: .tray-center -->
        <div class="tray tray-center" style="height: 647px;">
            <h4> Options List </h4>
            <!-- recent orders table -->
            <div class="panel">
                <div class="panel-body pn">
                    <div class="table-responsive">
                        <table class="table admin-form table-striped dataTable" id="datatable3">
                            <thead>
                                <tr class="bg-light">
                                    <th class="text-center"> SN </th>
                                    <th>Post Name</th>
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
                                            <strong> <?php echo e(ucfirst($row->title)); ?> </strong>
                                            <div class="row_actions"><span class="id">ID: <?php echo e($row->id); ?> | </span><span
                                                    class="edit"><a href="<?php echo e(route('options.edit', $row->id)); ?>"
                                                        aria-label="">Edit</a> 
                                                <!--        |-->
                                                <!--</span><span class="trash"><a href="<?php echo e($row->id); ?>"-->
                                                <!--        class="submitdelete" aria-label="">Delete</a> </span>-->
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
  

<?php $__env->stopSection(); ?>

<?php $__env->startSection('libraries'); ?>
    <!-- Datatables -->
    <script type="text/javascript">
        $('.submitdelete').on('click', function(e) {
            e.preventDefault();
            if (confirm('Are you sure to delete??')) {
                var csrf = $('meta[name="csrf-token"]').attr('content');
                var id = $(this).attr('href');
                var url =
                    '<?php echo e(route('options.destroy', ':id')); ?>';
                url = url.replace(':id', id);
                $.ajax({
                    type: 'delete',
                    url: url,
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

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sevensummittreks/public_html/resources/views/admin/options/index.blade.php ENDPATH**/ ?>