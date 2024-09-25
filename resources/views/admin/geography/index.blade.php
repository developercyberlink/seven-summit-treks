@extends('admin.master')
@section('title','Geographical facts')
@section('breadcrumb')
        <a href="{{ route('facts-create') }}" class="btn btn-primary btn-sm">Create</a>
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
                                    <th class="">Name</th>
                                    <th class="">ALT/m</th>
                                    <th class="">Countries</th>
                                    <th class="">Latitude</th>
                                    <th class="">Longitude</th>
                                    <th class="">RP</th>
                                    <th class="">Area</th>
                                    <th class="">Expedition</th>
                                   
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($all) > 0)
                                    @foreach($all as $key=>$row)
                                <tr class="bg-light">

                                    <td class="">{{$key+=1}}</td>
                                   <td class="post_title title_hi_sh">{{ ucfirst($row->name) }}
                                     <div class="row_actions">
                                     <a class="btn btn-outline-primary confirm" data-toggle="modal" data-target="#myEditModal{{ $row->id }}"></i>Edit </a>|
                                       <span class="trash"> <a href="{{route('facts-delete',$row->id)}}" onclick="return confirm('Confirm Delete?')" class="btn-btn-danger">Delete</a></span>
                                      </div>
                                       </td>
                                    <td class="">{{ ($row->alt) }}</td>
                                    <td class="">{{ $row->countries }}</td>
                                    <td class="">{{ $row->latitude }}</td>
                                    <td class="">{{ $row->longitude }}</td>
                                    <td class="">{{ $row->rp }}</td>
                                    <td class="">{{ $row->area }}</td>
                                    <td class="">{{ $row->expedition }}</td>
                                 </tr>
                                   <div id="myEditModal{{ $row->id }}" class="modal fade" role="dialog">
                                                <div class="modal-dialog modal-xs">
                                                    <div class="modal-content">

                                                        <div class="card-body">

                                                            <form method="post" class="form-group" action="{{route('facts-edit',$row->id)}}" enctype="multipart/form-data">
                                                                @csrf
                                                                <input type="hidden" name="id" value="{{$row->id}}">

                                                                <div class="panel">
                                                                    <div class="panel-heading">
                                                                        <span class="panel-title">Edit Trip Review</span>
                                                                    </div>
                                                                    <div class="panel-body">

                                                                        <div class="form-group">
                                                                            <label for="inputStandard" class="col-lg-3 control-label">Expedition</label>


                                                                                    <select class="form-control" name="expedition">
                                                                                        <option selected disabled>--Please select expedition--</option>
                                                                                        @foreach($exp as $value)
                                                                                            <option   @if ($value->title == $row->expedition) selected @endif value="{{$value->title}}">{{$value->title}}</option>
                                                                                        @endforeach
                                                                                    </select>

                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="inputStandard" class="col-lg-3 control-label">Name</label>
                                                                            <div class="col-lg-8">
                                                                                <div class="bs-component">
                                                                                    <input class="form-control" name="name" value="{{$row->name}}" type="text" placeholder="">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="inputStandard" class="col-lg-3 control-label">Alt/m</label>
                                                                            <div class="col-lg-8">
                                                                                <div class="bs-component">
                                                                                    <input class="form-control" name="alt" value="{{$row->alt}}" type="text" placeholder="">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="inputStandard" class="col-lg-3 control-label">Countries</label>
                                                                            <div class="col-lg-8">
                                                                                <div class="bs-component">
                                                                                    <input class="form-control" name="countries" value="{{$row->countries}}" type="text" placeholder="">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="inputStandard" class="col-lg-3 control-label">Latitude</label>
                                                                            <div class="col-lg-8">
                                                                                <div class="bs-component">
                                                                                    <input class="form-control" name="latitude" value="{{$row->latitude}}" type="text" placeholder="">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <!--<div class="form-group">-->
                                                                        <!--    <label for="inputStandard" class="col-lg-3 control-label">Latitude Symbol</label>-->
                                                                        <!--    <div class="col-lg-8">-->
                                                                        <!--        <div class="bs-component">-->
                                                                        <!--            <input class="form-control" name="lat_sym" value="{{$row->lat_sym}}" type="text" placeholder="">-->
                                                                        <!--        </div>-->
                                                                        <!--    </div>-->
                                                                        <!--</div>-->

                                                                        <div class="form-group">
                                                                            <label for="inputStandard" class="col-lg-3 control-label">Longitude</label>
                                                                            <div class="col-lg-8">
                                                                                <div class="bs-component">
                                                                                    <input class="form-control" name="longitude" value="{{$row->longitude}}" type="text" placeholder="">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <!--<div class="form-group">-->
                                                                        <!--    <label for="inputStandard" class="col-lg-3 control-label">Longitude Symbol</label>-->
                                                                        <!--    <div class="col-lg-8">-->
                                                                        <!--        <div class="bs-component">-->
                                                                        <!--            <input class="form-control" name="long_sym" value="{{$row->long_sym}}" type="text" placeholder="">-->
                                                                        <!--        </div>-->
                                                                        <!--    </div>-->
                                                                        <!--</div>-->

                                                                        <div class="form-group">
                                                                            <label for="inputStandard" class="col-lg-3 control-label">RP</label>
                                                                            <div class="col-lg-8">
                                                                                <div class="bs-component">
                                                                                    <input class="form-control" name="rp" value="{{$row->rp}}" type="text" placeholder="">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="inputStandard" class="col-lg-3 control-label">Area</label>
                                                                            <div class="col-lg-8">
                                                                                <div class="bs-component">
                                                                                    <input class="form-control" name="area" value="{{$row->area}}" type="text" placeholder="">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="box-footer">
                                                                            <input class="btn btn-danger btn-xs pull-right" type="submit" value="Update">
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </form>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
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

