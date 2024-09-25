
<?php $__env->startSection('title', Request::segment(2)); ?>

<?php $__env->startSection('breadcrumb'); ?>
<a href="<?php echo e(url('admin/region/create')); ?>" class="btn btn-primary btn-sm">Create</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<section id="" class="table-layout animated fadeIn">
  <!-- begin: .tray-center -->
  <div class="">
   <h4> Regions </h4>
   <!-- recent orders table -->
   <div class="panel">
    <div class="panel-body pn">
      <div class="table-responsive">
        <table class="table admin-form table-striped dataTable" id="datatable3">
          <thead>
            <tr class="bg-light">
              <th class="text-center"> SN </th>
              <th>Title</th>
               <th class="text-center">Order</th> 
                                                  
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
                    <?php if(tripbyregions($row->id)->count() > 0 ): ?>
                    <strong><a href="<?php echo e(url( 'admin/trip-region'.'/'. $row->id)); ?>"> <?php echo e(ucfirst($row->title)); ?> </a></strong> 
                    <?php else: ?>
                      <strong> <?php echo e(ucfirst($row->title)); ?> </strong> 
                      <?php endif; ?>         
                <div class="row_actions"><span class="id">ID: <?php echo e($row->id); ?> | </span><span class="edit"><a href="<?php echo e(url( 'admin/'.Request::segment(2) .'/'. $row->id. '/edit')); ?>" aria-label="">Edit</a> 
                 </span>   
                 
                 <?php if(!tripbyregions($row->id)->count() > 0 ): ?>
                 | <span class="trash"><a href="#<?php echo e($row->id); ?>" class="submitdelete1">Delete</a> </span>
                 <?php endif; ?>
                </td>
                <td class="text-center">                  
                  <?php echo e($row->ordering); ?>

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
<script src="<?php echo e(asset(env('PUBLIC_PATH').'vendor/plugins/datatables/media/js/jquery.dataTables.js')); ?>"></script>

<!-- Datatables Tabletools addon -->
<script src="<?php echo e(asset(env('PUBLIC_PATH').'vendor/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js')); ?>"></script>

<!-- Datatables ColReorder addon -->
<script src="<?php echo e(asset(env('PUBLIC_PATH').'vendor/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js')); ?>"></script>

<!-- Datatables Bootstrap Modifications  -->
<script src="<?php echo e(asset(env('PUBLIC_PATH').'vendor/plugins/datatables/media/js/dataTables.bootstrap.js')); ?>"></script>
<script type="text/javascript">
(function ( $ ) { 
  $('.submitdelete1').on('click',function(e){
    e.preventDefault();
    if(confirm('Are you sure to delete??')){
    var csrf = $('meta[name="csrf-token"]').attr('content');
    var str = $(this).attr('href');
    var id = str.slice(1);
    $.ajax({
      type:'delete',
      url:"<?php echo e(url('admin').'/'.Request::segment(2).'/'); ?>" + id,
      data:{_token:csrf},    
      success:function(data){  
      $('tbody tr.id' + id ).remove();
     },
     error:function(data){       
       alert('Error occurred!');
     }
   });
   }
  });
 
}( jQuery ));

/********/
  $('document').ready(function(){
    $('#checkAll').on('click',function(e){
      if($(this).is(':checked', true)){
        $('.check_box').prop('checked', true);
      }else{
        $('.check_box').prop('checked', false);
      }
    });
    $('.deleteAll').on(function(){

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
<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sevensummittreks/public_html/resources/views/admin/regions/index.blade.php ENDPATH**/ ?>