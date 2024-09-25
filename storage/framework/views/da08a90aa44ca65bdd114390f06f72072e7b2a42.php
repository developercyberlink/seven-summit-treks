<?php $__env->startSection('title', Request::segment(2)); ?>

<?php $__env->startSection('breadcrumb'); ?>
<button type="button" class="btn btn-default btn-sm backlink"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Back </button>
<a href="<?php echo e(url('admin/teams')); ?>" class="btn btn-default btn-sm backlink"><i class="fa fa-list" aria-hidden="true"></i> Show List </a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<form class="form-horizontal" role="form" id="teamData" method="post" enctype="multipart/form-data">
<?php echo csrf_field(); ?>
<input type="hidden" name="_method" value="PUT" />  
<section class="content">
      <div class="container-fluid">

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
                <!-- <h3 class="card-title p-3">Manage Trips</h3> -->
                <ul class="nav nav-pills ml-auto p-2">
                  <li class="nav-item active"><a class="nav-link active" href="#tab_1" data-toggle="tab"> GENERAL</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Mountains Submitted</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab"> Achievements </a></li> 
                  <li class="nav-item"><a class="nav-link" href="#tab_4" data-toggle="tab"> Certificates </a></li>
                                  
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                     <div class="tab-pane active" id="tab_1">
                  <!--General tab starts -->                   
                  <?php echo $__env->make('admin.team.edit.edit-general', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                   <!--//-->
                  </div>
                  <!-- /.tab-pane general -->
                  <div class="tab-pane" id="tab_2">
                  <?php echo $__env->make('admin.team.edit.edit-mountains', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_3">
                  <?php echo $__env->make('admin.team.edit.edit-achievements', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_4">
                  <?php echo $__env->make('admin.team.edit.edit-certificates', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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


  /******** For certificates *******/
  jQuery(document).delegate('a.add-certificates', 'click', function(e) {
     e.preventDefault();    
     var content = jQuery('#row_certificates_additional .row'),
     size = jQuery('#row_certificates_body >.row').length + 1,
     element = null,    
     element = content.clone();
     element.attr('id', 'certificates-rec-'+size);
     element.find('.delete-certificates').attr('certificates-data-id', size);
     element.appendTo('#row_certificates_body');
     element.find('.sn').html(size);
   });

    jQuery(document).delegate('button.delete-certificates', 'click', function(e) {
     e.preventDefault();    
     var makeConfirm = confirm("Are you sure You want to delete");
     if (makeConfirm == true) {
      var id = jQuery(this).attr('certificates-data-id');
      var targetDiv = jQuery(this).attr('targetDiv');
      // For delete certificates individually.              
        var csrf = $('meta[name="csrf-token"]').attr('content');
        var certificates_rowid = jQuery(this).attr('certificates-rowid');         
        var team_id = '<?php echo e($data->id); ?>';
        var url = '<?php echo e(route("certificates.destroy",["id"=>':id',"info_id"=>':info_id'])); ?>';
          url = url.replace(':id',team_id);
          url = url.replace(':info_id',certificates_rowid);   
          if(certificates_rowid) {
            $.ajax({
              type:'DELETE',
              url:url,
              data:{_token:csrf},  

              success:function(data){ 
                $('#certificates-rec-' + certificates_rowid ).remove();                
              },
              error:function(data){       
              alert('Error occurred!');
            }
          });  
          }   
      //End for delete
      jQuery('#certificates-rec-' + id).remove();
      return true;
    } else {
      return false;
    }
  });
/******** End For certificates *******/

/******** For mountains ***********/
jQuery(document).delegate('a.add-mountain', 'click', function(e) {
     e.preventDefault();    
     var content = jQuery('#row_mountain_additional .row'),
     size = jQuery('#row_mountain_body >.row').length + 1,
     element = null,    
     element = content.clone();
     element.attr('id', 'mountain-rec-'+size);
     element.find('.delete-mountain').attr('mountain-data-id', size);
     element.appendTo('#row_mountain_body');
     element.find('.sn').html(size);
   });

   jQuery(document).delegate('button.delete-mountain', 'click', function(e) {
     e.preventDefault();    
     var makeConfirm = confirm("Are you sure You want to delete");
     if (makeConfirm == true) {
      var id = jQuery(this).attr('mountain-data-id');
      var targetDiv = jQuery(this).attr('targetDiv');
      // For delete mountain individually.              
        var csrf = $('meta[name="csrf-token"]').attr('content');
        var mountain_rowid = jQuery(this).attr('mountain-rowid');         
        var team_id = '<?php echo e($data->id); ?>';
        var url = '<?php echo e(route("mountains.destroy",["id"=>':id',"info_id"=>':info_id'])); ?>';
          url = url.replace(':id',team_id);
          url = url.replace(':info_id',mountain_rowid);   
          if(mountain_rowid) {
            $.ajax({
              type:'DELETE',
              url:url,
              data:{_token:csrf},  

              success:function(data){ 
                $('#mountain-rec-' + mountain_rowid ).remove();                
              },
              error:function(data){       
              alert('Error occurred!');
            }
          });  
          }   
      //End for delete
      jQuery('#mountain-rec-' + id).remove();
      return true;
    } else {
      return false;
    }
  });
/******** End For mountains *********/

/******** For achievements ***********/
jQuery(document).delegate('a.add-achievement', 'click', function(e) {
     e.preventDefault();    
     var content = jQuery('#row_achievement_additional .row'),
     size = jQuery('#row_achievement_body >.row').length + 1,
     element = null,    
     element = content.clone();
     element.attr('id', 'achievement-rec-'+size);
     element.find('.delete-achievement').attr('achievement-data-id', size);
     element.appendTo('#row_achievement_body');
     element.find('.sn').html(size);
   });

   jQuery(document).delegate('button.delete-achievement', 'click', function(e) {
     e.preventDefault();    
     var makeConfirm = confirm("Are you sure You want to delete");
     if (makeConfirm == true) {
      var id = jQuery(this).attr('achievement-data-id');
      var targetDiv = jQuery(this).attr('targetDiv');
      // For delete achievement individually.              
        var csrf = $('meta[name="csrf-token"]').attr('content');
        var achievement_rowid = jQuery(this).attr('achievement-rowid');        
        var team_id = '<?php echo e($data->id); ?>';
        var url = '<?php echo e(route("achievements.destroy",["id"=>':id',"info_id"=>':info_id'])); ?>';
          url = url.replace(':id',team_id);
          url = url.replace(':info_id',achievement_rowid);   
          if(achievement_rowid) {
            $.ajax({
              type:'DELETE',
              url:url,
              data:{_token:csrf},  

              success:function(data){ 
                $('#achievement-rec-' + achievement_rowid ).remove();                
              },
              error:function(data){       
              alert('Error occurred!');
            }
          });  
          }   
      //End for delete
      jQuery('#achievement-rec-' + id).remove();
      return true;
    } else {
      return false;
    }
  });
/******** End For achievements *********/

 $(function () {
          $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
          });

          $("#teamData").on('submit',function(e){
          tinymce.triggerSave();
          e.preventDefault();    
          let team = '<?php echo e($data->id); ?>';
          let url = '<?php echo e(route("teams.update",["team"=>':team'])); ?>';
          url = url.replace(':team',team);         
          let teamData = document.getElementById('teamData');
          let data = new FormData(teamData);    
                   
          $.ajax({
              url: url,
              type: 'POST',
              data: data,
              cache: false,
              processData: false,
              contentType : false,
              beforeSend:function() {},
              success: function (data) {     
                console.log('success');   
                console.log(data);
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
                  // console.log(jqXHR, textStatus, errorThrown);
                  console.log('Error');
                  console.log(textStatus);
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

  
   // Delete Thumb
    $('.thumbdelete').on('click',function(e){
    e.preventDefault();
    if(!confirm('Are you sure to delete?')) return false;
    var csrf = $('meta[name="csrf-token"]').attr('content');
    var str = $(this).attr('href');
    var id = str.slice(1);
    $.ajax({
      type:'DELETE',
      url:"<?php echo e(url('thumbdelete') . '/'); ?>" + id,
      data:{_token:csrf},    
      success:function(data){ 
        $('span.thumb_id' + id ).remove();
      },
      error:function(data){  
      alert(data + 'Error!');     
     }
   });
  });

     
   // Delete Banner
    $('.bannerdelete').on('click',function(e){
    e.preventDefault();
    if(!confirm('Are you sure to delete?')) return false;
    var csrf = $('meta[name="csrf-token"]').attr('content');
    var str = $(this).attr('href');
    var id = str.slice(1);
    $.ajax({
      type:'DELETE',
      url:"<?php echo e(url('bannerdelete') . '/'); ?>" + id,
      data:{_token:csrf},    
      success:function(data){ 
        $('span.bannerid' + id ).remove();
      },
      error:function(data){  
      alert(data + 'Error!');     
     }
   });
  });

$(document).ready(function(){
    $('#name').on('keyup',function(){
      var trip_title;
      trip_title = $('#name').val();
      trip_title=trip_title.replace(/[^a-zA-Z0-9 ]+/g,"");
      trip_title=trip_title.replace(/\s+/g, "-");
      $('#uri').val(trip_title);
    });
});

// ## //
// Go back link
$('.backlink').click(function(){
  var url = '<?=url()->previous(); ?>';
  window.location=url;
});
 $(function() {
        $('.team-select').change(function(){
            $('.team-category').hide();
            $('.' + $(this).val()).show();
        });
    });

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sevensummittreks/public_html/resources/views/admin/team/edit.blade.php ENDPATH**/ ?>