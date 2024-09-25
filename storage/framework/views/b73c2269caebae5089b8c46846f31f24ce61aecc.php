
<?php $__env->startSection('breadcrumb'); ?>
    <a href="<?php echo e(route('options.index')); ?>" class="btn btn-primary btn-sm">List</a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="alert" id="message" style="display: none"></div>
    <form class="form-horizontal" id="upload_image1" role="form" action="<?php echo e(route('options.update', $data->id)); ?>"
        method="post" enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>

        <input type="hidden" name="_method" value="PUT" />
        <div class="col-md-8">
            <!-- Input Fields -->
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Edit Options</span>
                </div>
                <div class="panel-body">

                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label"> Title </label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <input type="text" name="title" id="title" value="<?php echo e($data->title ? $data->title : ''); ?>"
                                    class="form-control" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label"> Key Name </label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <input type="text" name="key_name" class="form-control"
                                    value="<?php echo e($data->key_name ? $data->key_name : 'key name is required'); ?>" readonly />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label"> Content </label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <input type="text" name="content" value="<?php echo e($data->content ? $data->content : ''); ?>"
                                    class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label"> Sign </label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <input type="text" name="sign" class="form-control" value="<?php echo e($data->sign ? $data->sign : ''); ?>"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label"> </label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <input type="submit" name="submit" class="btn btn-primary" value="Update" />
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('libraries'); ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#title').on('keyup', function() {
                var title;
                title = $('#title').val();
                title = title.replace(/[^a-zA-Z0-9 ]+/g, "");
                title = title.replace(/\s+/g, "-");
                title = title.toLowerCase();
                $('#key_name').val(title);
            });
        });

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sevensummittreks/public_html/resources/views/admin/options/edit.blade.php ENDPATH**/ ?>