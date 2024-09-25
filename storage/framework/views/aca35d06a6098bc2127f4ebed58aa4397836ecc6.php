<?php $__env->startSection('title', Request::segment(2)); ?>

<?php $__env->startSection('breadcrumb'); ?>
<a href="<?php echo e(route('admin.page.create', Request::segment(2))); ?>" class="btn btn-primary btn-sm">Create</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<section id="" class="table-layout animated fadeIn">
  <!-- begin: .tray-center -->
  <div class="">
   <h4> Pages </h4>
   <!-- recent orders table -->
   <div class="panel">
    <div class="panel-body pn">
      <div class="table-responsive">
        <table class="table admin-form table-striped dataTable" id="datatable3">
          <thead>
            <tr class="bg-light">
              <th class="text-center"> SN </th>
              <th>Page Name</th>
              <th>Status</th>
              <th>Order</th>  
              <th>Link</th>                          
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
                <strong> <?php echo e(ucfirst($row->page_title)); ?> </strong> 
                <div class="row_actions"><span class="id">ID: <?php echo e($row->id); ?> | </span><span class="edit"><a href="<?php echo e(url( 'adminpages/'.Request::segment(2) .'/'. $row->id. '/edit')); ?>" aria-label="">Edit</a> 
                 </span> | <span class="trash"><a href="#<?php echo e($row->id); ?>" class="submitdelete1">Delete</a> </span>
                

                </td>
                <td> 
                 <input class="pagestatus" type="checkbox" name="status" data-rowid="<?php echo e($row->id); ?>" <?php echo e(($row->status == 1)?'checked':''); ?> />
               
                </td>
                <td class="categories">                  
                  <?php echo e($row->page_order); ?>

                </td>
                <td>
                     <?php if(Request::segment(2) == 'important-links'): ?>
                   <!--<a type="text" id="myInput"><?php echo e('https://www.sevensummittreks.com/info/important-links/'.$row->uri); ?></a> -->
                 <a class="copy_text"  data-toggle="tooltip" title="Copy to Clipboard" href="<?php echo e('https://www.sevensummittreks.com/info/important-links/'.$row->uri); ?>">Copy Link</a>
                   <?php endif; ?>
                   <!--<button onclick="myFunction()">Copy text</button>-->
                </td>
              <td>                
                    <?php if(Request::segment(2) == 'gear-list'): ?>
                <a href="<?php echo e(route('pagedoc.index', $row->id)); ?>" title="PDF">
                    <i class="fa fa-file-pdf-o fa fa-2x" aria-hidden="true"></i>
                </a><?php endif; ?>         
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

$('.copy_text').click(function (e) {
   e.preventDefault();
   var copyText = $(this).attr('href');

   document.addEventListener('copy', function(e) {
      e.clipboardData.setData('text/plain', copyText);
      e.preventDefault();
   }, true);

   document.execCommand('copy');  
   console.log('copied text : ', copyText);
   alert('copied text: ' + copyText); 
 });
 
(function ( $ ) { 
  $('.submitdelete1').on('click',function(e){
    e.preventDefault();
    if(confirm('Are you sure to delete??')){
    var csrf = $('meta[name="csrf-token"]').attr('content');
    var str = $(this).attr('href');
    var id = str.slice(1);
    $.ajax({
      type:'delete',
      url:"<?php echo e(url('adminpages').'/'.Request::segment(2).'/'); ?>" + id,     
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
  
   $('.pagestatus').on('click',function(e){
    var csrf = $('meta[name="csrf-token"]').attr('content');
    var id = $(this).attr('data-rowid');
    var url  = '<?php echo e(route("admin.pagestatus",["id"=>':id'])); ?>';
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
<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sevensummittreks/public_html/resources/views/admin/page/index.blade.php ENDPATH**/ ?>