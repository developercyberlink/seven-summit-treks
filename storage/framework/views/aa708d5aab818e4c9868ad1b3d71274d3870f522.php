

<?php $__env->startSection('title','Send Newsletter'); ?>
<?php $__env->startSection('breadcrumb'); ?>
 <button type="button" class="btn btn-sm btn-success send-email"><i class="fa fa-paper-plane"aria-hidden="true"></i> Send Email </button>
 <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?> 
 <h1>Send Newsletter </h1>
    <div class="container">
        <div class="form-group">
        <div class="col-lg-9">
            <div class="bs-component">
                <label for="inputSelect"> Newsletter </label>
                <select name="news_id" class="form-control" id="news">
                <option  selected disabled>Open this select menu</option>
                    <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <option value="<?php echo e($value->id); ?>"><?php echo e($value->title); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <div id="source-button" class="btn btn-primary btn-xs" style="display: none;">&lt;
                    &gt;
                </div>
            </div>
        </div>
        <br/>
    </div>

        <hr/>
     <table class="table admin-form table-striped dataTable" id="datatable3">
        <thead>
            <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            </tr>
            <input type="checkbox" id="checkAll"> Check All
        </thead>
        <tbody>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
            <td><input type="checkbox" class="user-checkbox" name="users[]" value="<?php echo e($user->id); ?>"></td>
            <td><?php echo e($user->name); ?></td>
            <td><?php echo e($user->email); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <div class="row">
		<div class="col-12">
			<!-- Pagination -->
		
				 <?php echo $users->links('admin.pagination'); ?>

				
			<!--/ End Pagination -->
		</div>
	</div>
</div>

  

<?php $__env->stopSection(); ?>
<?php $__env->startSection('libraries'); ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script type="text/javascript">

 $("#checkAll").click(function () {
     $('input:checkbox').not(this).prop('checked', this.checked);
 });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".send-email").click(function(){
        var selectRowsCount = $("input[class='user-checkbox']:checked").length;
        var news_id=$('#news').find(":selected").val();
        // alert(news_id);

        if (selectRowsCount > 0 && news_id !="Open this select menu"){

            var ids = $.map($("input[class='user-checkbox']:checked"), function(c){return c.value; });
            
            
            $.ajax({
               type:'POST',
               url:"<?php echo e(route('ajax.send.email')); ?>",
               data:{
                   ids:ids,
                   news_id:news_id
               },
               success:function(data){
                  
                   toastr.success(data.message);
                   location.reload();
               }
            });

        }else{
            alert("Please select at least one user from list.");
        }
       
    });

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sevensummittreks/public_html/resources/views/admin/send_newsletter.blade.php ENDPATH**/ ?>