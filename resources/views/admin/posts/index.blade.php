@extends('admin.master')
@section('title', Request::segment(2))

@section('breadcrumb')
    <a href="{{ route('admin.post.create', Request::segment(2)) }}" class="btn btn-primary btn-sm">Create</a>
@endsection

@section('content')

    <section id="" class="table-layout animated fadeIn">
        <!-- begin: .tray-center -->
        <div class="">
            <h4> Posts </h4>
            <!-- recent orders table -->
            <div class="panel">
                <div class="panel-body pn">
                    <div class="table-responsive">
                        <table class="table admin-form table-striped dataTable" id="datatable3">
                            <thead>
                                <tr class="bg-light">
                                    <th class="text-center"> SN </th>
                                    <th>Post Name</th>
                                    <th>Status</th>
                                    <th>Order</th>
                                    <th></th>
                                    <th>Published</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($data as $row)
                                    <tr class="id{{ $row->id }}">
                                        <td class="text-center">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="post_title title_hi_sh">
                                            @if (check_child_post($row->id))
                                                <strong> {{ ucfirst($row->post_title) }} </strong>
                                                <a href="{{ url('admin/' . Request::segment(2) . '/' . $row->id) }}"> <i
                                                        class="fa fa-list" aria-hidden="true"></i> </a>
                                            @else
                                                <strong> {{ ucfirst($row->post_title) }} </strong>
                                            @endif

                                            <div class="row_actions"><span class="id">ID: {{ $row->id }} | </span><span
                                                    class="edit"><a
                                                        href="{{ url('admin/' . Request::segment(2) . '/' . $row->id . '/edit') }}"
                                                        aria-label="">Edit</a>
                                                </span>

                                                @if (!check_child_post($row->id) > 0 && $row->id != 7 && $row->id != 2 && $row->id != 4 && $row->id !=42 && $row->id != 78)
                                                    | <span class="trash"><a href="#{{ $row->id }}"
                                                            class="submitdelete1">Delete</a> </span>
                                                @endif

                                        </td>
                                        <td>
                                             <input class="CheckStatus" type="checkbox" name="status" data-rowid="{{$row->id}}" {{($row->status == 1)?'checked':''}} />
                                            <!--<a href="{{ url('admin/associated/' . Request::segment(2) . '/' . $row->id) }}"><i-->
                                            <!--        class="fa fa-plus"></i></a>-->
                                                    </td>
                                        <td class="categories">
                                            {{ $row->post_order }}
                                        </td>
                                        <td>
                                            <!--<a href="{{ route('doc.multipledocument', $row->id) }}" title="PDF">-->
                                            <!--    <i class="fa fa-file-pdf-o fa fa-2x" aria-hidden="true"></i>-->
                                            <!--</a>-->
                                            @if($row->id == 7 || $row->id == 2 || $row->id == 4 || $row-> id == 42)
                                            <a href="{{ route('admin.multiplephoto', $row->id) }}" title="Photo">
                                                <i class="fa fa-file-image-o fa fa-2x" aria-hidden="true"></i>
                                            </a>
                                            @endif
                                            {{-- <a href="{{ url('admin/multiplevideo/' . $row->id) }}" title="Video">
                                                <i class="fa fa-video-camera fa fa-2x" aria-hidden="true"></i>
                                            </a> --}}

                                        </td>
                                        <td class="date"> {{ $row->created_at }} </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- end: .tray-center -->
    </section>

@endsection

@section('libraries')
    <!-- Datatables -->
    <script src="{{ asset(env('PUBLIC_PATH') . 'vendor/plugins/datatables/media/js/jquery.dataTables.js') }}"></script>

    <!-- Datatables Tabletools addon -->
    <script
        src="{{ asset(env('PUBLIC_PATH') . 'vendor/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js') }}">
    </script>

    <!-- Datatables ColReorder addon -->
    <script
        src="{{ asset(env('PUBLIC_PATH') . 'vendor/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js') }}">
    </script>

    <!-- Datatables Bootstrap Modifications  -->
    <script src="{{ asset(env('PUBLIC_PATH') . 'vendor/plugins/datatables/media/js/dataTables.bootstrap.js') }}">
    </script>
    <script type="text/javascript">
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
        
         $('.CheckStatus').on('click',function(e){
        var csrf = $('meta[name="csrf-token"]').attr('content');
        var id = $(this).attr('data-rowid');
        var url  = '{{ route("admin.poststatus",["id"=>':id']) }}';
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
                "sSwfPath": "{{ asset(env('PUBLIC_PATH')) }}vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf"
            }
        });

    </script>

@endsection
