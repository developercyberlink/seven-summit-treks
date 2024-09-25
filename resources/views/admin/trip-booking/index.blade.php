@extends('admin.master')
@section('title','Trip Booking')
@section('breadcrumb')
{{--    <a href="{{ route('post-trip-review') }}" class="btn btn-primary btn-sm">Create</a>--}}
@endsection
@section('content')
    <div class="tray tray-center" style="height: 647px;">
        <div class="panel">
            <div class="panel-body ph20">
                <div class="tab-content">
                    <div id="users" class="tab-pane active">
                        <div class="table-responsive mhn20 mvn15">
                            <table class="table admin-form table-striped dataTable" id="datatable3">
                                <thead>
                                <tr class="bg-light">
                                    <th class="">SN</th>
                                    <th class="">Trip</th>
                                    <th class="">Arrival / Departure</th>
                                    <th class="">Comments</th>
                                  <th class="text-left">Action</th
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($book) > 0)
                                    @foreach($book as $key=>$row)
                                        <tr class="bg-light">

                                            <td class="">{{$key+=1}}</td>
                                           
                                            <td class="">{{$row->trips ? $row->trips->trip_title : $row->expeditions->trip_title}}<br>
                                             <i class="fa fa-user"></i> {{ ucfirst($row->full_name) }} <br> 
                                             <i class="fa fa-envelope"></i> {{ ($row->email) }} <br> 
                                              <i class="fa fa-phone"></i> {{$row->contact}} <br>
                                             <i class="fa fa-flag"></i> {{ ucfirst($row->country) }}<br>
                                             Type:  <a class="btn btn-success btn btn-sm" name="active">{{$row->expeditions ? 'Expedition' : 'Trek'}}</a> | 
                                             @if(($row->type)==0)
                                                    <a class="btn btn-primary btn btn-sm" name="inactive">
                                                       <b>Trip Booking</b>
                                                    </a>
                                                @else
                                                    <a class="btn btn-primary btn btn-sm" name="active">
                                                        <b>Fixed Departure</b>
                                                    </a>
                                                @endif
                                                </td>
                                            <td class="">{{ ($row->arrival_date) }} <br> {{ ($row->departure_date) }}</td>
                                            
                                            <td class=""><textarea class="form-control" row="9" readonly>{!! $row->comments !!}</textarea></td>
                                              <td class="text-left">
                                                  <span class="trash"><a href="{{route('delete-booking',$row->id)}}" onclick="return confirm('Confirm Delete?')" class="btn-btn-danger">
                                                   Delete</a></span>
                                              </td>
                                </tr>

                                @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('libraries')
<!-- Datatables -->
<script src="{{asset('vendor/plugins/datatables/media/js/jquery.dataTables.js')}}"></script>

<!-- Datatables Tabletools addon -->
<script src="{{asset('vendor/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js')}}"></script>

<!-- Datatables ColReorder addon -->
<script src="{{asset('vendor/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js')}}"></script>

<!-- Datatables Bootstrap Modifications  -->
<script src="{{asset('vendor/plugins/datatables/media/js/dataTables.bootstrap.js')}}"></script>

<script type="text/javascript">
jQuery(document).ready(function() {
  $('.btn-delete').on('click',function(e){
    e.preventDefault();
    if(!confirm('Are you sure to delete?')) return false;
    var csrf = $('meta[name="csrf-token"]').attr('content');
    var str = $(this).attr('href');
    var id = str.slice(1);
    $.ajax({
      type:'DELETE',
      url:"{{url('admin/teams') . '/'}}" + id,
      data:{_token:csrf},    
      success:function(data){ 
        $('tbody tr.id' + id ).remove();
      },
      error:function(data){       
       alert('Error occurred!');
     }
   });
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
    "iDisplayLength": 20,
    "aLengthMenu": [
    [5, 10, 25, 50, -1],
    [5, 10, 25, 50, "All"]
    ],
    "sDom": '<"dt-panelmenu clearfix"Tfr>t<"dt-panelfooter clearfix"ip>',
    "oTableTools": {
      "sSwfPath": "{{asset('vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf')}}"
    }
  });
  </script>
@endsection

