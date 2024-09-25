
<?php $__env->startSection('title', 'Post'); ?>

<?php $__env->startSection('breadcrumb'); ?>
<a href="<?php echo e(url('admin/trip/')); ?>" class="btn btn-success btn-sm">Trip List</a>
    <a href="<?php echo e(route('admin.tripdocs.create', Request::segment(2))); ?>" class="btn btn-primary btn-sm">Create</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
        <?php if(session('message')): ?>
        <div class="alert alert-success alert-dismissible ">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?php echo e(session('message')); ?>

                </div>
            <?php endif; ?>
    <section id="" class="">
        <!-- begin: .tray-center -->
        <div class="tray tray-center">
            <h4> Document List - <?php echo e(tripname(Request::segment(2))->trip_title); ?> </h4>
            <!-- recent orders table -->
            <div class="panel">
                <div class="panel-body pn">
                    <div class="table-responsive">
                        <table class="table admin-form table-striped dataTable" id="datatable3">
                            <thead>
                                <tr class="bg-light">
                                    <th class="text-center"> SN </th>
                                    <th>Post Name</th>
                                    <th></th>
                                    <th>Published</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($data->count() > 0): ?>
                                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="id<?php echo e($row->id); ?>">
                                            <td class="text-center">
                                                <?php echo e($loop->iteration); ?>

                                            </td>
                                            <td class="post_title title_hi_sh">
                                                <strong> <?php echo e(ucfirst($row->title)); ?> </strong>
                                                <div class="row_actions"><span class="id">ID: <?php echo e($row->id); ?> |
                                                    </span><span class="edit">
                                                        <a href="<?php echo e(route('admin.tripdocs.edit', ['admin' => Request::segment(2), 'tripdoc' => $row->id])); ?>"
                                                            aria-label="">Edit</a> |
                                                    </span><span class="trash"><a href="<?php echo e($row->id); ?>"
                                                            class="row-delete" aria-label="">Delete</a> </span>
                                            </td>
                                            <td>
                                            </td>
                                            <td class="date"> <?php echo e($row->created_at); ?> </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
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
    <script type="text/javascript">
        $('.row-delete').on('click', function(e) {
            e.preventDefault();
            var csrf = $('meta[name="csrf-token"]').attr('content');
            var id = $(this).attr('href');
            var url = "<?php echo e(route('admin.tripdocs.destroy', ['admin' => ':admin', 'tripdoc' => ':tripdoc'])); ?>";
            url = url.replace(":admin", <?php echo e(Request::segment(2)); ?>);
            url = url.replace(":tripdoc", id);
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
        });

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sevensummittreks/public_html/resources/views/admin/trip-docs/index.blade.php ENDPATH**/ ?>