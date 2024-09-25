
<?php $__env->startSection('title', Request::segment(2)); ?>
<?php $__env->startSection('breadcrumb'); ?>

    <a href="<?php echo e(route('category.index', $data->id)); ?>" class="btn btn-default btn-sm backlink"><i class="fa fa-list"
            aria-hidden="true"></i> Show Itinerary </a>
    <button type="button" class="btn btn-default btn-sm backlink"><i class="fa fa-angle-double-left" aria-hidden="true"></i>
        Back </button>
    <a href="<?php echo e(url('admin/trip')); ?>" class="btn btn-default btn-sm backlink"><i class="fa fa-list"
            aria-hidden="true"></i> Show List </a>
           
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <form class="form-horizontal" role="form" id="tripData" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="_method" value="PUT" />
        <section class="content">
            <div class="container-fluid">

                <footer>
                    <div id="publishing-action">
                        <button type="submit" name="submit" class="btn btn-success" value="publish"> Publish </button>
                    </div>
                    <div class="clearfix"></div>
                </footer>

                <div class="row">
                    <div class="col-12">
                        <h3><?php echo e($data->trip_title); ?></h3> 
                        <!-- Custom Tabs -->
                        <div class="card">
                            <div class="card-header d-flex p-0">
                                <ul class="nav nav-pills ml-auto p4 mb10 mt10 nav-custom">
                                    <li class="nav-item active"><a class="nav-link active" href="#tab_1" data-toggle="tab">
                                            GENERAL</a></li>
                                    
                                    <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab"> SCHEDULE </a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="#tab_4" data-toggle="tab"> PHOTO/VIDEOS
                                        </a></li>
                                    <li class="nav-item"><a class="nav-link" href="#tab_5" data-toggle="tab"> FAQs </a></li>
                                   
                                    <li class="nav-item"><a class="nav-link" href="#tab_8" data-toggle="tab">
                                            ROUTE CAMPS
                                        </a></li>
                                    <li class="nav-item"><a class="nav-link" href="#tab_9" data-toggle="tab">
                                            WEATHER REPORTS
                                        </a></li>
                                        <li class="nav-item"><a class="nav-link" href="#tab_10" data-toggle="tab">
                                        HIGHLIGHTS
                                        </a></li>

                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1">
                                        <!--General tab starts -->
                                        <?php echo $__env->make('admin.trips.edit.edit-general', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <!--//-->
                                    </div>
                                    <!-- /.tab-pane general -->
                                 
                                    <div class="tab-pane" id="tab_3">

                                        <?php echo $__env->make('admin.trips.edit.edit-trip-schedule', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="tab_4">

                                        <?php echo $__env->make('admin.trips.edit.edit-gear', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="tab_5">
                                        <?php echo $__env->make('admin.trips.edit.edit-faqs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>
                                    <!-- /.tab-pane -->
                                  

                                    <div class="tab-pane" id="tab_8">
                                        <?php echo $__env->make('admin.trips.edit.edit-route-camps', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>

                                    <div class="tab-pane" id="tab_9">
                                        <?php echo $__env->make('admin.trips.edit.edit-weather-reports', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>
                                     <div class="tab-pane" id="tab_10">
                                      <?php echo $__env->make('admin.trips.edit.edit-highlights', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>                      
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript">
      // Go back link
        $('.backlink').click(function(){
        var url = '<?= url()->previous() ?>';
        window.location=url;
        });
        
       /**weather report**/

        $(document).ready(function() {
            $('#weather_report_title').on('keyup', function() {
                var weather_report_title;
                weather_report_title = $('#weather_report_title').val();
                weather_report_title = weather_report_title.replace(/[^a-zA-Z0-9 ]+/g, "");
                weather_report_title = weather_report_title.replace(/\s+/g, "-");
                $('#weather_report_uri').val(weather_report_title);
            });
        });
    
    /******** For highlights *******/
  jQuery(document).delegate('a.add-highlights', 'click', function(e) {
     e.preventDefault();    
     var content = jQuery('#row_highlights_additional .row'),
     size = jQuery('#row_highlights_body >.row').length + 1,
     element = null,    
     element = content.clone();
     element.attr('id', 'highlights-rec-'+size);
     element.find('.delete-highlights').attr('highlights-data-id', size);
     element.appendTo('#row_highlights_body');
     element.find('.sn').html(size);
   });

    jQuery(document).delegate('button.delete-highlights', 'click', function(e) {
     e.preventDefault();    
     var makeConfirm = confirm("Are you sure You want to delete");
     if (makeConfirm == true) {
      var id = jQuery(this).attr('highlights-data-id');
      var targetDiv = jQuery(this).attr('targetDiv');
      // For delete highlights individually.              
        var csrf = $('meta[name="csrf-token"]').attr('content');
        var highlights_rowid = jQuery(this).attr('highlights-rowid');         
        var team_id = '<?php echo e($data->id); ?>';
        var url = '<?php echo e(route("highlights.destroy",["id"=>':id',"info_id"=>':info_id'])); ?>';
          url = url.replace(':id',team_id);
          url = url.replace(':info_id',highlights_rowid);   
          if(highlights_rowid) {
            $.ajax({
              type:'DELETE',
              url:url,
              data:{_token:csrf},  

              success:function(data){ 
                $('#highlights-rec-' + highlights_rowid ).remove();                
              },
              error:function(data){       
              alert('Error occurred!');
            }
          });  
          }   
      //End for delete
      jQuery('#highlights-rec-' + id).remove();
      return true;
    } else {
      return false;
    }
  });
/******** End For highlights *******/
        /******** For Itinerary *******/
        jQuery(document).delegate('a.add-itinerary', 'click', function(e) {
            e.preventDefault();
            var content = jQuery('#row_additional .row'),
                size = jQuery('#row_body >.row').length + 1,
                element = null,
                element = content.clone();
            var newel = $('.input-form:last').clone();
            element.attr('id', 'rec-' + size);
            element.find('.delete-itinerary').attr('itinerary-data-id', size);
            element.appendTo('#row_body');
            element.find('.sn').html(size);
        });

        jQuery(document).delegate('button.delete-itinerary', 'click', function(e) {
            e.preventDefault();
            var makeConfirm = confirm("Are you sure You want to delete");
            if (makeConfirm == true) {
                var id = jQuery(this).attr('itinerary-data-id');
                var targetDiv = jQuery(this).attr('targetDiv');
                // For delete itinerary individually.
                var csrf = $('meta[name="csrf-token"]').attr('content');
                var rowid = jQuery(this).attr('itinerary-rowid');
                var trip_id = '<?php echo e($data->id); ?>';
                var url = '<?php echo e(route('itinerary.destroy', ['id' => ':id', 'info_id' => ':info_id'])); ?>';
                url = url.replace(':id', trip_id);
                url = url.replace(':info_id', rowid);
                if (rowid) {
                    $.ajax({
                        type: 'DELETE',
                        url: url,
                        data: {
                            _token: csrf
                        },
                        success: function(data) {
                            $('#rec-' + id).remove();
                        },
                        error: function(data) {
                            alert('Error occurred!');
                        }
                    });
                }
                //End for delete
                jQuery('#rec-' + id).remove();
                return true;
            } else {
                return false;
            }
        });
        /******** End For Itinerary *******/
        /******** For Schedule *******/
        jQuery(document).delegate('a.add-schedule', 'click', function(e) {
            e.preventDefault();
            var content = jQuery('#row_schedule_additional .row'),
                size = jQuery('#row_schedule_body >.row').length + 1,
                element = null,
                element = content.clone();
            element.attr('id', 'schedule-rec-' + size);
            element.find('.delete-schedule').attr('schedule-data-id', size);
            element.appendTo('#row_schedule_body');
            element.find('.sn').html(size);
        });

        jQuery(document).delegate('button.delete-schedule', 'click', function(e) {
            e.preventDefault();
            var makeConfirm = confirm("Are you sure You want to delete");
            if (makeConfirm == true) {
                var id = jQuery(this).attr('schedule-data-id');
                var targetDiv = jQuery(this).attr('targetDiv');
                // For delete sehedule individually.
                var csrf = $('meta[name="csrf-token"]').attr('content');
                var rowid = jQuery(this).attr('schedule-rowid');
                var trip_id = '<?php echo e($data->id); ?>';
                var url = '<?php echo e(route('schedule.destroy', ['id' => ':id', 'info_id' => ':info_id'])); ?>';
                url = url.replace(':id', trip_id);
                url = url.replace(':info_id', rowid);
                if (rowid) {
                    $.ajax({
                        type: 'DELETE',
                        url: url,
                        data: {
                            _token: csrf
                        },
                        success: function(data) {
                            $('#schedule-rec-' + rowid).remove();
                        },
                        error: function(data) {
                            alert('Error occurred!');
                        }
                    });
                }
                //End for delete
                jQuery('#schedule-rec-' + id).remove();
                return true;
            } else {
                return false;
            }
        });
        /******** End For Schedule *******/
        /******** For Gear *******/
        jQuery(document).delegate('a.add-gear', 'click', function(e) {
            e.preventDefault();
            var content = jQuery('#row_gear_additional .row'),
                size = jQuery('#row_gear_body >.row').length + 1,
                element = null,
                element = content.clone();
            element.attr('id', 'gear-rec-' + size);
            element.find('.delete-gear').attr('gear-data-id', size);
            element.appendTo('#row_gear_body');
            element.find('.sn').html(size);
        });

        jQuery(document).delegate('button.delete-gear', 'click', function(e) {
            e.preventDefault();
            var makeConfirm = confirm("Are you sure You want to delete");
            if (makeConfirm == true) {
                var id = jQuery(this).attr('gear-data-id');
                var targetDiv = jQuery(this).attr('targetDiv');
                // For delete sehedule individually.
                var csrf = $('meta[name="csrf-token"]').attr('content');
                var gear_rowid = jQuery(this).attr('gear-rowid');
                var trip_id = '<?php echo e($data->id); ?>';
                var url =
                    '<?php echo e(route('admin.trip-gear.destroy', ['admin' => ':admin', 'trip_gear' => ':trip_gear'])); ?>';
                url = url.replace(':admin', trip_id);
                url = url.replace(':trip_gear', gear_rowid);
                if (gear_rowid) {
                    $.ajax({
                        type: 'DELETE',
                        url: url,
                        data: {
                            _token: csrf
                        },
                        success: function(data) {
                            $('#gear-rec-' + gear_rowid).remove();
                        },
                        error: function(data) {
                            alert('Error occurred!');
                        }
                    });
                }
                //End for delete
                jQuery('#gear-rec-' + id).remove();
                return true;
            } else {
                return false;
            }
        });
        /******** End For Gear *******/
        /******** For FAQs *******/
        jQuery(document).delegate('a.add-faq', 'click', function(e) {
            e.preventDefault();
            var content = jQuery('#row_faq_additional .row'),
                size = jQuery('#row_faq_body >.row').length + 1,
                element = null,
                element = content.clone();
            element.attr('id', 'faq-rec-' + size);
            element.find('.delete-faq').attr('faq-data-id', size);
            element.appendTo('#row_faq_body');
            element.find('.sn').html(size);
        });

        jQuery(document).delegate('button.delete-faq', 'click', function(e) {
            e.preventDefault();
            var makeConfirm = confirm("Are you sure You want to delete");
            if (makeConfirm == true) {
                var id = jQuery(this).attr('faq-data-id');
                var targetDiv = jQuery(this).attr('targetDiv');
                // For delete FAQs individually.
                var csrf = $('meta[name="csrf-token"]').attr('content');
                var faq_rowid = jQuery(this).attr('faq-rowid');
                var trip_id = '<?php echo e($data->id); ?>';
                var url = '<?php echo e(route('admin.faq.destroy', ['admin' => ':admin', 'faq' => ':faq'])); ?>';
                url = url.replace(':admin', trip_id);
                url = url.replace(':faq', faq_rowid);
                if (faq_rowid) {
                    $.ajax({
                        type: 'DELETE',
                        url: url,
                        data: {
                            _token: csrf
                        },
                        success: function(data) {
                            $('#faq-rec-' + faq_rowid).remove();
                        },
                        error: function(data) {
                            alert('Error occurred!');
                        }
                    });
                }
                //End for delete
                jQuery('#faq-rec-' + id).remove();
                //regnerate index number on table
                // $('#row_body .row').each(function(index) {
                //   $(this).find('span.sn').html(index+1);
                // });
                return true;
            } else {
                return false;
            }
        });
        /******** End For FAQs *******/
        /******** For Testimonial ***********/
        jQuery(document).delegate('a.add-testimonial', 'click', function(e) {
            e.preventDefault();
            var content = jQuery('#row_testimonial_additional .row'),
                size = jQuery('#row_testimonial_body >.row').length + 1,
                element = null,
                element = content.clone();
            element.attr('id', 'testimonial-rec-' + size);
            element.find('.delete-testimonial').attr('testimonial-data-id', size);
            element.appendTo('#row_testimonial_body');
            element.find('.sn').html(size);
        });

        jQuery(document).delegate('button.delete-testimonial', 'click', function(e) {
            e.preventDefault();
            var makeConfirm = confirm("Are you sure You want to delete");
            if (makeConfirm == true) {
                var id = jQuery(this).attr('testimonial-data-id');
                var targetDiv = jQuery(this).attr('targetDiv');
                // For delete FAQs individually.
                var csrf = $('meta[name="csrf-token"]').attr('content');
                var testimonial_rowid = jQuery(this).attr('testimonial-rowid');
                var trip_id = '<?php echo e($data->id); ?>';
                var url =
                    '<?php echo e(route('admin.testimonials.destroy', ['admin' => ':admin', 'testimonial' => ':testimonial'])); ?>';
                url = url.replace(':admin', trip_id);
                url = url.replace(':testimonial', testimonial_rowid);
                if (testimonial_rowid) {
                    $.ajax({
                        type: 'DELETE',
                        url: url,
                        data: {
                            _token: csrf
                        },
                        success: function(data) {
                            console.log('success');
                            $('#testimonial-rec-' + testimonial_rowid).remove();
                        },
                        error: function(data) {
                            alert('Error occurred!');
                        }
                    });
                }
                //End for delete
                jQuery('#testimonial-rec-' + id).remove();
                //regnerate index number on table admin.faq.update
                // $('#row_testimonial_body .row').each(function(index) {
                //   $(this).find('span.sn').html(index+1);
                // });
                return true;
            } else {
                return false;
            }
        });
        /******** End For Testimonial *********/
        /******** For Info ***********/
        jQuery(document).delegate('a.add-info', 'click', function(e) {
            e.preventDefault();
            var content = jQuery('#row_info_additional .row'),
                size = jQuery('#row_info_body >.row').length + 1,
                element = null,
                element = content.clone();
            element.attr('id', 'info-rec-' + size);
            element.find('.delete-info').attr('info-data-id', size);
            element.appendTo('#row_info_body');
            element.find('.sn').html(size);
        });

        jQuery(document).delegate('button.delete-info', 'click', function(e) {
            e.preventDefault();
            var makeConfirm = confirm("Are you sure You want to delete");
            if (makeConfirm == true) {
                var id = jQuery(this).attr('info-data-id');
                var targetDiv = jQuery(this).attr('targetDiv');
                // For delete FAQs individually.
                var csrf = $('meta[name="csrf-token"]').attr('content');
                var info_rowid = jQuery(this).attr('info-rowid');
                var trip_id = '<?php echo e($data->id); ?>';
                var url = '<?php echo e(route('supporting-info.destroy', ['id' => ':id', 'info_id' => ':info_id'])); ?>';
                url = url.replace(':id', trip_id);
                url = url.replace(':info_id', info_rowid);
                if (info_rowid) {
                    $.ajax({
                        type: 'DELETE',
                        url: url,
                        data: {
                            _token: csrf
                        },
                        success: function(data) {
                            console.log('success');
                            // $('#info-rec-' + info_rowid ).remove();
                        },
                        error: function(data) {
                            alert('Error occurred!');
                        }
                    });
                }
                //End for delete
                jQuery('#info-rec-' + id).remove();
                //regnerate index number on table
                // $('#row_info_body .row').each(function(index) {
                //   $(this).find('span.sn').html(index+1);
                // });
                return true;
            } else {
                return false;
            }
        });
        /******** End For Info *********/


        /******** For Route Camp ***********/
        jQuery(document).delegate('a.add-routecamp', 'click', function(e) {
            e.preventDefault();
            var content = jQuery('#row_routecamp_additional .row'),
                size = jQuery('#row_routecamp_body >.row').length + 1,
                element = null,
                element = content.clone();
            element.attr('id', 'routecamp-rec-' + size);
            element.find('.delete-routecamp').attr('routecamp-data-id', size);
            element.appendTo('#row_routecamp_body');
            element.find('.sn').html(size);
        });

        jQuery(document).delegate('button.delete-routecamp', 'click', function(e) {
            e.preventDefault();
            var makeConfirm = confirm("Are you sure You want to delete");
            if (makeConfirm == true) {
                var id = jQuery(this).attr('routecamp-data-id');
                var targetDiv = jQuery(this).attr('targetDiv');
                // For delete FAQs individually.
                var csrf = $('meta[name="csrf-token"]').attr('content');
                var routecamp_rowid = jQuery(this).attr('routecamp-rowid');
                var trip_id = '<?php echo e($data->id); ?>';
                var url = '<?php echo e(route('routecamp.destroy', ['id' => ':id', 'routecamp_id' => ':routecamp_id'])); ?>';
                url = url.replace(':id', trip_id);
                url = url.replace(':routecamp_id', routecamp_rowid);
                if (routecamp_rowid) {
                    $.ajax({
                        type: 'DELETE',
                        url: url,
                        data: {
                            _token: csrf
                        },
                        success: function(data) {
                            console.log('success');
                            // $('#routecamp-rec-' + routecamp_rowid ).remove();
                        },
                        error: function(data) {
                            alert('Error occurred!');
                        }
                    });
                }
                //End for delete
                jQuery('#routecamp-rec-' + id).remove();
                //regnerate index number on table
                return true;
            } else {
                return false;
            }
        });

        // Delete gear thumb
        jQuery(document).delegate('.delete_gear_thumb', 'click', function(e) {
            e.preventDefault();
            if (!confirm('Are you sure to delete?')) return false;
            var csrf = $('meta[name="csrf-token"]').attr('content');
            var id = $(this).attr('href');
            var url = '<?php echo e(route('delete_gear_thumb', ['id' => ':id'])); ?>';
            url = url.replace(':id', id);
            $.ajax({
                type: 'DELETE',
                url: url,
                data: {
                    _token: csrf
                },
                success: function(data) {
                    $('.del-' + id).remove();
                    console.log('success');
                },
                error: function(data) {
                    alert('Error occurred!');
                }
            });
        });


        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $("#tripData").on('submit', function(e) {
                tinymce.triggerSave();
                e.preventDefault();
                let trip = '<?php echo e($data->id); ?>';
                let url = '<?php echo e(route('trip.update', ['trip' => ':trip'])); ?>';
                url = url.replace(':trip', trip);
                let tripData = document.getElementById('tripData');
                let data = new FormData(tripData);
                // let trip_content = $('#trip_content').val();
                // console.log(trip_content);
                // data.append("trip_content", trip_content);
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function() {},
                    success: function(data) {
                        //  console.log(data);
                          if (data.status == 'success') {
                            toastr.success(data.message);
                        }
                        location.reload();
                        jQuery.each(data.errors, function (key, value) {
                            toastr.error(value);

                        });
                        
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        //  console.log(data);
                        jQuery.each(data.errors, function (key, value) {
                            toastr.error(value);
                        });
                    }
                });
            });
            
            /**/
            $('.thumbdelete').on('click',function(e){
    e.preventDefault();
    if(!confirm('Are you sure to delete?')) return false;
    var csrf = $('meta[name="csrf-token"]').attr('content');
    var str = $(this).attr('href');
    var id = str.slice(1);
    $.ajax({
      type:'delete',
      url:"<?php echo e(url('delete_trip_thumb') . '/'); ?>" + id,
      data:{_token:csrf},    
      success:function(data){ 
        $('span.thumb_id' + id ).remove();
      },
      error:function(data){  
        alert(data + 'Error!');     
      }
    });
  });
  /******/
   $('.bannerdelete').on('click',function(e){
    e.preventDefault();
    if(!confirm('Are you sure to delete?')) return false;
    var csrf = $('meta[name="csrf-token"]').attr('content');
    var str = $(this).attr('href');
    var id = str.slice(1);
    $.ajax({
      type:'delete',
      url:"<?php echo e(url('delete_trip_banner_thumb') . '/'); ?>" + id,
      data:{_token:csrf},    
      success:function(data){ 
        $('span.banner_id' + id ).remove();
      },
      error:function(data){  
        alert(data + 'Error!');     
      }
    });
  });

  //mapdelete
    $('.mapdelete').on('click',function(e){
    e.preventDefault();
    if(!confirm('Are you sure to delete?')) return false;
    var csrf = $('meta[name="csrf-token"]').attr('content');
    var str = $(this).attr('href');
    var id = str.slice(1);
    $.ajax({
      type:'delete',
      url:"<?php echo e(url('delete_map_thumb') . '/'); ?>" + id,
      data:{_token:csrf},    
      success:function(data){ 
        $('span.map_id' + id ).remove();
      },
      error:function(data){  
        alert(data + 'Error!');     
      }
    });
  });

         
        // Select Related Trips
        $('.realted-trips').select2();
    });
    
     // ## //
        $(document).ready(function() {
            $('#trip_title').on('keyup', function() {
                var trip_title;
                trip_title = $('#trip_title').val();
                trip_title = trip_title.replace(/[^a-zA-Z0-9 ]+/g, "");
                trip_title = trip_title.replace(/\s+/g, "-");
                $('#uri').val(trip_title);
            });
        });
        
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('additional-css'); ?>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sevensummittreks/public_html/resources/views/admin/trips/edit.blade.php ENDPATH**/ ?>