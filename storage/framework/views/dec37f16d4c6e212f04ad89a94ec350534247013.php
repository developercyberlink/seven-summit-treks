<?php $__env->startSection('title', Request::segment(2)); ?>

<?php $__env->startSection('breadcrumb'); ?>
<button type="button" class="btn btn-default btn-sm backlink"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Back </button>
<a href="<?php echo e(route('admin.page.index', Request::segment(2))); ?>" class="btn btn-default btn-sm backlink"><i class="fa fa-list" aria-hidden="true"></i> Show List </a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<form class="form-horizontal" role="form" id="pageData" method="post" enctype="multipart/form-data">
<?php echo csrf_field(); ?>
<input type="hidden" name="_method" value="PUT" />  
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
                  <?php echo $__env->make('admin.page.edit.edit-general', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                   <!--//-->
                  </div>
                  <!-- /.tab-pane general -->
                  <div class="tab-pane" id="tab_2">
                  <?php echo $__env->make('admin.page.edit.edit-details', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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

    $('.imagedelete').on('click',function(e){
            e.preventDefault();
            if(!confirm('Are you sure to delete?')) return false;
            var csrf = $('meta[name="csrf-token"]').attr('content');
            var str = $(this).attr('href');
            var id = str.slice(1);
            $.ajax({
              type:'delete',
              url:"<?php echo e(url('delete_page_thumb') . '/'); ?>" + id,
              data:{_token:csrf},    
              success:function(data){ 
                $('span.id' + id ).remove();
              },
              error:function(data){  
              alert(data + 'Error!');     
              }
            });
          });

          $('.bannerdelete').on('click',function(e){
            e.preventDefault();
            if(!confirm('Are you sure to delete?')) return false;
            var csrf = $('meta[name="csrf-token"]').attr('content');
            var str = $(this).attr('href');
            var id = str.slice(1);
            $.ajax({
              type:'delete',
              url:"<?php echo e(url('delete_pagebanner_thumb') . '/'); ?>" + id,
              data:{_token:csrf},    
              success:function(data){ 
                $('span.banner' + id ).remove();
              },
              error:function(data){  
              alert(data + 'Error!');     
              }
            });
          });                                                  
          
  

/******** For detaila ***********/
jQuery(document).delegate('a.add-details', 'click', function(e) {
     e.preventDefault();    
     var content = jQuery('#row_details_additional .row'),
     size = jQuery('#row_details_body >.row').length + 1,
     element = null,    
     element = content.clone();
     element.attr('id', 'details-rec-'+size);
     element.find('.delete-details').attr('details-data-id', size);
     element.appendTo('#row_details_body');
     element.find('.sn').html(size);
   });

   jQuery(document).delegate('button.delete-details', 'click', function(e) {
     e.preventDefault();    
     var makeConfirm = confirm("Are you sure You want to delete");
     if (makeConfirm == true) {
      var id = jQuery(this).attr('details-data-id');
      var page = '<?php echo e(Request::segment(2)); ?>';
      var targetDiv = jQuery(this).attr('targetDiv');
      // For delete detail individually.              
        var csrf = $('meta[name="csrf-token"]').attr('content');
        var detail_rowid = jQuery(this).attr('details-rowid');         
        var page_id = '<?php echo e($data->id); ?>';
       var url = '<?php echo e(route("details.destroy",["page"=>':page',"id"=>':id',"info_id"=>':info_id'])); ?>';
      
          url = url.replace(':page',page);
          url = url.replace(':id',page_id);
          url = url.replace(':info_id',detail_rowid); 
           
          if(detail_rowid) {
            $.ajax({
              type:'DELETE',
              url:url,
              data:{_token:csrf},  

              success:function(data){ 
                $('#details-rec-' + details_rowid ).remove();                
              },
              error:function(data){       
              alert('Error occurred!');
            }
          });  
          }   
      //End for delete
      jQuery('#details-rec-' + id).remove();
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
          let page = '<?php echo e($data->id); ?>';
          let url = '<?php echo e(route("admin.page.update",["page"=>':page'])); ?>';
          url = url.replace(':page',page);        
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
<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sevensummittreks/public_html/resources/views/admin/page/edit.blade.php ENDPATH**/ ?>