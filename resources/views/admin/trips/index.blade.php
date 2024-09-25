@extends('admin.master')
@section('title', Request::segment(2))

@section('breadcrumb')
    <a href="{{ url('admin/trip/create') }}" class="btn btn-primary btn-sm">Create</a>
@endsection

@section('content')
<div class="tray tray-center" style="height: 647px;">
  <!-- Search Results Panel  -->

<div class="tab-content">        
      <!-- User Search Pane -->
    <div class="row">
      <div class="col-md-12">
        <div class="bs-component">
          <div class="panel">
            <div class="panel-heading">
              <ul class="nav panel-tabs-border panel-tabs panel-tabs-left">
                  @if($expedition)
                <li class="active">
                  <a href="#tab1_1" data-toggle="tab">Expedition</a>
                </li>
                @endif
                 @if($treking)
                <li>
                  <a href="#tab1_2" data-toggle="tab">Trekking</a>
                </li>
                @endif
              </ul>
            </div>
            <div class="panel-body">
              <div class="tab-content pn br-n">
                  @if($expedition)
                <div id="tab1_1" class="tab-pane active">
                  <div class="_row">
                    <div class="col-md-12">
                     
                      <div id="guide" class="tab-pane active">
                       <div class="table-responsive mhn20 mvn15">
                      <table class="table admin-form theme-warning fs13" id="datatable1">
                        <thead>
                           <tr class="bg-light">
                               <th class="text-center"> SN </th>
                              <th width="10%">Trip Title</th>
                               <th width="10%">Region</th> 
                                <th>Status</th>
                               <th class="text-center">Order</th> 
                              <th width="20%">Trip Docs</th>                                     
                              <!--<th width="10%">Published</th>-->
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($expedition as $row)
                                <tr class="id{{ $row->id }}">
                                    <td class="text-center">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="post_title title_hi_sh">
                                        <strong> {{ ucfirst($row->trip_title) }} </strong>
                                        <div class="row_actions">
                                            <span class="id">ID: {{ $row->id }} | </span>
                                            <span class="edit"><a href="{{ url('admin/trip/'  . $row->id . '/edit') }}" aria-label="">Edit</a></span>
                                            <span class="trash"> | <a href="#{{ $row->id }}" class="submitdelete1">Delete</a> </span>
                                        </div>
                                    </td>
                                    <td>
                                  @if($row->expeditions)
                                    @foreach($row->expeditions as $_row)
                                    <a href="{{url( 'admin/trip-expedition'.'/'. $_row->id)}}">{{$_row->title}}</a><br>
                                    @endforeach
                                    @endif
                                    </td>
                                    <td class="text-center">
                                    <input class="CheckStatus" type="checkbox" name="status" data-rowid="{{$row->id}}" {{($row->status == 1)?'checked':''}} />
                                    </td>
                                    
                                    <td class="text-center">
                                        {{ $row->ordering }}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.tripdocs.index', $row->id) }}" title="PDF" class="btn btn-primary btn-sm">  Docs
                                        </a>
                                            <a href="{{ route('category.index', $row->id) }}" title="Itinerary" class="btn btn-success btn-sm">  Itinerary
                                        </a>
                                        <!--<a href="{{ route('admin.multiplephoto', $row->id) }}" title="Photo">-->
                                        <!--    <i class="fa fa-picture-o" aria-hidden="true"></i>-->
                                        <!--</a> -->

                                        <!--<a href="{{ route('admin.tripvideos.index', $row->id) }}" title="Video">-->
                                        <!--    <i class="fa fa-video-camera" aria-hidden="true"></i>-->
                                        <!--</a> -->

                                    </td>
                                    <!--<td class="date" width="10%"> {{ $row->created_at }} </td>-->
                                </tr>
                            @endforeach                  
                            </tbody>
                          </table>
                        </div>
                        </div>
                    </div>
                  </div>
                </div>
                @endif
                @if($treking)
                    <div id="tab1_2" class="tab-pane {{Request::segment(2) == 'trip-region'?'active':''}}">
                      <div class="_row">
                        <div class="col-md-12">
                          <div id="insurance" class="tab-pane active">
                           <div class="table-responsive mhn20 mvn15">
                      <table class="table admin-form theme-warning fs13" id="datatable2">
                        <thead>
                        <tr class="bg-light">
                               <th class="text-center"> SN </th>
                              <th width="10%">Trip Title</th>
                               <th width="10%">Region</th> 
                                <th>Status</th>
                               <th class="text-center">Order</th> 
                              <th width="20%">Trip Docs</th>                                     
                              <!--<th width="10%">Published</th>-->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($treking as $row)
                                <tr class="id{{ $row->id }}">
                                    <td class="text-center">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="post_title title_hi_sh">
                                        <strong> {{ ucfirst($row->trip_title) }} </strong>
                                        <div class="row_actions">
                                            <span class="id">ID: {{ $row->id }} | </span>
                                            <span class="edit"><a href="{{ url('admin/trip/'  . $row->id . '/edit') }}" aria-label="">Edit</a> </span>
                                            <span class="trash"> | <a href="#{{ $row->id }}" class="submitdelete1">Delete</a> </span>
                                        </div>
                                    </td>
                                     <td>
                                        @if($row->regions)
                                        @foreach($row->regions as $value)
                                        <a href="{{url( 'admin/trip-region'.'/'. $value->id)}}">{{$value->title}}</a><br>
                                        @endforeach
                                        @endif
                                        </td>
                                    <td class="text-center">
                                    <input class="CheckStatus" type="checkbox" name="status" data-rowid="{{$row->id}}" {{($row->status == 1)?'checked':''}} />
                                    </td>
                                    
                                    <td class="text-center">
                                        {{ $row->ordering }}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.tripdocs.index', $row->id) }}" title="PDF" class="btn btn-primary btn-sm">  Docs
                                        </a>
                                            <a href="{{ route('category.index', $row->id) }}" title="Itinerary" class="btn btn-success btn-sm">  Itinerary
                                        </a>
                                        <!--<a href="{{ route('admin.multiplephoto', $row->id) }}" title="Photo">-->
                                        <!--    <i class="fa fa-picture-o" aria-hidden="true"></i>-->
                                        <!--</a> -->

                                        <!--<a href="{{ route('admin.tripvideos.index', $row->id) }}" title="Video">-->
                                        <!--    <i class="fa fa-video-camera" aria-hidden="true"></i>-->
                                        <!--</a> -->

                                    </td>
                                    <!--<td class="date" width="10%"> {{ $row->created_at }} </td>-->
                                </tr>
                            @endforeach
                          </tr>                    
                        </tbody>
                      </table>
                    </div>
                    </div>
                    </div>
                  </div>
                </div>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
</div>

@endsection

@section('libraries')
    <!-- Datatables -->
    <script src="{{ asset('vendor/plugins/datatables/media/js/jquery.dataTables.js') }}"></script>

    <!-- Datatables Tabletools addon -->
    <script src="{{ asset('vendor/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js') }}">
    </script>

    <!-- Datatables ColReorder addon -->
    <script src="{{ asset('vendor/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js') }}">
    </script>

    <!-- Datatables Bootstrap Modifications  -->
    <script src="{{ asset('vendor/plugins/datatables/media/js/dataTables.bootstrap.js') }}"></script>
    <script type="text/javascript">
    
        $('.CheckStatus').on('click',function(e){
    var csrf = $('meta[name="csrf-token"]').attr('content');
    var id = $(this).attr('data-rowid');
    var url  = '{{ route("admin.tripstatus",["id"=>':id']) }}';
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
        (function($) {
            $('.submitdelete1').on('click', function(e) {
                e.preventDefault();
                if (confirm('Are you sure to delete??')) {
                    var csrf = $('meta[name="csrf-token"]').attr('content');
                    var str = $(this).attr('href');
                    var id = str.slice(1);
                    $.ajax({
                        type: 'delete',
                        url: "{{ url('admin') . '/' . Request::segment(2) . '/' }}" + id,
                        data: {
                            _token: csrf
                        },
                        success: function(data) {
                            $('tbody tr.id' + id).remove();
                        },
                        error: function(data) {
                            alert('Error occurred!');
                        }
                    });
                }
            });

        }(jQuery));

        /********/
        $('document').ready(function() {
            $('#checkAll').on('click', function(e) {
                if ($(this).is(':checked', true)) {
                    $('.check_box').prop('checked', true);
                } else {
                    $('.check_box').prop('checked', false);
                }
            });
            $('.deleteAll').on(function() {

            });
        });

        /************/
        $('#datatable1').dataTable({
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
            "iDisplayLength": 30,
            "aLengthMenu": [
                [5, 10, 25, 50, -1],
                [5, 10, 25, 50, "All"]
            ],
            "sDom": '<"dt-panelmenu clearfix"Tfr>t<"dt-panelfooter clearfix"ip>',
            "oTableTools": {
                "sSwfPath": "{{ asset('vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf') }}"
            }
        });
        /************/
        $('#datatable2').dataTable({
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
            "iDisplayLength": 30,
            "aLengthMenu": [
                [5, 10, 25, 50, -1],
                [5, 10, 25, 50, "All"]
            ],
            "sDom": '<"dt-panelmenu clearfix"Tfr>t<"dt-panelfooter clearfix"ip>',
            "oTableTools": {
                "sSwfPath": "{{ asset('vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf') }}"
            }
        });

    </script>

@endsection
