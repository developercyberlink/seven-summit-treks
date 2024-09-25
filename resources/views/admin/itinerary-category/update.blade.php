@extends('admin.master')
@section('title', '')
@section('breadcrumb')
<a href="{{ route('category.index',$trip_id) }}" class="btn btn-primary btn-sm">List</a>
@endsection
@section('content')
<form class="form-horizontal" role="form" id="tripData" method="post">
  @csrf
  <input type="hidden" name="_method" value="PUT" />
<section class="content">
    <div class="container-fluid">

        <footer>
            <div id="publishing-action">
                <button type="submit" name="submit" class="btn btn-success" value="publish">Update</button>
            </div>
            <div class="clearfix"></div>
        </footer>

        <div class="row">
            <div class="col-12">
                <!-- Custom Tabs -->
                <div class="card">
                    <div class="card-header d-flex p-0">
                        <!-- <h3 class="card-title p-3">Manage Trips</h3> -->
                        <ul class="nav nav-pills ml-auto p4 mb10 mt10 nav-custom">
                            <li class="nav-item active"><a class="nav-link active" href="#tab_1" data-toggle="tab">
                                    GENERAL</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">ITINERARY</a>
                              <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">COST INCLUDES</a>
                                <li class="nav-item"><a class="nav-link" href="#tab_4" data-toggle="tab">COST EXCLUDES</a>
                            </li>

                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <!--General tab starts -->
                                <div class="row">
                                <div class="col-md-8">
                                <div class="panel">
                                 <div class="panel-heading">
                                   <span class="panel-title">Add Itinerary Category </span>
                                 </div>
                                 <div class="panel-body">
                                   <div class="form-group">
                                     <label for="inputStandard" class="col-lg-2 control-label">Title </label>
                                     <div class="col-lg-8">
                                       <div class="bs-component">
                                         <input type="text" id="category" name="category" value="{{$data->category}}" class="form-control" />
                                         <!--@if ($itineraryCategory->count() > 0)-->
                                         <!--    <select class="form-control" name="category">-->
                                         <!--        @foreach ($itineraryCategory as $row)-->
                                         <!--            <option @if ($row->id==$data->id) selected @endif  value="{{ $row->id }}">{{ $row->category }}</option>-->
                                         <!--        @endforeach-->
                                         <!--    </select>-->
                                         <!--@endif-->
                                       </div>
                                     </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                                <!--//-->
                            </div>
                            <!-- /.tab-pane general -->
                            <div class="tab-pane" id="tab_2">
                                @include('admin.itinerary-category.update-itinerary')
                            </div>

                            <div class="tab-pane" id="tab_3">
                                @include('admin.itinerary-category.update-cost-include')
                            </div>

                            <div class="tab-pane" id="tab_4">
                                @include('admin.itinerary-category.update-cost-exclude')
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
@endsection
@section('scripts')
    <script type="text/javascript">
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
            var trip_id = '{{ $data->id }}';
            var url = '{{ route('itinerary-category.destroy', ['id' => ':id', 'info_id' => ':info_id']) }}';
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

    /******** For cOST INCLUDE ***********/
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
            var trip_id = '{{ $data->id }}';
            var url ='{{ route('itinerary-cost-include.destroy', ['id' => ':admin', 'info_id' => ':testimonial']) }}';
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
    /******** For cOST INCLUDE ***********/
    /******** For COST EXCLUDE ***********/
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
            var trip_id = '{{ $data->id }}';
            var url = '{{ route('itinerary-cost-exclude.destroy', ['id' => ':id', 'info_id' => ':info_id']) }}';
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
    /******** For COST EXCLUDE ***********/
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#tripData").on('submit', function(e) {
            e.preventDefault();
            // let trip = '{{ $data->id }}';
            // alert(trip);
            // let url = '{{ route('itinerary.update', ['trip' => ':trip']) }}';
            // url = url.replace(':trip', trip);
            let tripData = document.getElementById('tripData');
            let data = new FormData(tripData);
            data.append('id',{{$data->id}});
            data.append('trip_id',{{$trip_id}});


            $.ajax({
                url: '{{route('itinerary.update')}}',
                type: 'POST',
                data: data,
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {},
                success: function(data) {
                    console.log('success');
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
                error: function(jqXHR, textStatus, errorThrown) {
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
    </script>
    @stop
