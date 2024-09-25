<?php $__env->startSection('title', Request::segment(2)); ?>

<?php $__env->startSection('breadcrumb'); ?>
<button type="button" class="btn btn-default btn-sm backlink"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Back </button>
<a href="<?php echo e(route('admin.page.index', Request::segment(2))); ?>" class="btn btn-default btn-sm backlink"><i class="fa fa-list" aria-hidden="true"></i> Show List </a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<form class="form-horizontal" role="form" id="pageData" method="post" enctype="multipart/form-data">
<?php echo csrf_field(); ?>
<section class="content">
      <div class="container-fluid">
 <input type="hidden" name="page_type" value="<?php echo e(Request::segment(2)); ?>" />
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
               
                <ul class="nav nav-pills ml-auto p-2">
                  <li class="nav-item active"><a class="nav-link active" href="#tab_1" data-toggle="tab"> GENERAL</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">DETAILS</a></li>           
                                  
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                     <div class="tab-pane active" id="tab_1">
                  <!--General tab starts -->                   
                  <?php echo $__env->make('admin.page.create.create-general', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                   <!--//-->
                  </div>
                  <!-- /.tab-pane general -->
                  <div class="tab-pane" id="tab_2">
                  <?php echo $__env->make('admin.page.create.create-details', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                  </div>                 
                 
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


  

/******** For detaila ***********/
jQuery(document).delegate('a.add-details', 'click', function(e) {
     e.preventDefault();    
     var content = jQuery('#row_detail_additional .row'),
     size = jQuery('#row_detail_body >.row').length + 1,
     element = null,    
     element = content.clone();
     element.attr('id', 'detail-rec-'+size);
     element.find('.delete-detail').attr('detail-data-id', size);
     element.appendTo('#row_detail_body');
     element.find('.sn').html(size);
   });

   jQuery(document).delegate('button.delete-detail', 'click', function(e) {
     e.preventDefault();    
     var makeConfirm = confirm("Are you sure You want to delete");
     if (makeConfirm == true) {
      var id = jQuery(this).attr('detail-data-id');
      var targetDiv = jQuery(this).attr('targetDiv');
      jQuery('#detail-rec-' + id).remove();
      //regnerate index number on table
      $('#row_detail_body .row').each(function(index) {
        $(this).find('span.sn').html(index+1);
      });
      return true;
    } else {
      return false;
    }
  });   
/******** End For detaila *********/

 $(function () {
     $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
    $("#pageData").on('submit',function(e){
    tinymce.triggerSave();
    e.preventDefault();    
    let url = "<?php echo e(route('admin.page.store', ':page')); ?>";
    url = url.replace(':page','<?php echo e(Request::segment(2)); ?>');
    let pageData = document.getElementById('pageData');
    let data = new FormData(pageData);    
    $.ajax({
        url: url,
        type: 'POST',
        data: data,
        cache: false,
        processData: false,
        contentType : false,
        beforeSend:function() {},
        success: function (data) {     
           location.reload();
            document.getElementById("pageData").reset();
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

// ## //
$(document).ready(function(){
    $('#name').on('keyup',function(){
      var page_title;
      page_title = $('#name').val();
      page_title=page_title.replace(/[^a-zA-Z0-9 ]+/g,"");
      page_title=page_title.replace(/\s+/g, "-");
      $('#uri').val(page_title);
    });
});

// Go back link
$('.backlink').click(function(){
  var url = '<?=url()->previous(); ?>';
  window.location=url;
});

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sevensummittreks/public_html/resources/views/admin/page/create.blade.php ENDPATH**/ ?>