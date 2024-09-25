@extends('admin.master')
@section('title', '')
@section('breadcrumb')
    <!--<a href="{{ route('options.create') }}" class="btn btn-primary btn-sm">Create</a>-->
@endsection
@section('content')

        <!-- begin: .tray-center -->
        <div class="tray tray-center" style="height: 647px;">
            <h4> Options List </h4>
            <!-- recent orders table -->
            <div class="panel">
                <div class="panel-body pn">
                    <div class="table-responsive">
                        <table class="table admin-form table-striped dataTable" id="datatable3">
                            <thead>
                                <tr class="bg-light">
                                    <th class="text-center"> SN </th>
                                    <th>Post Name</th>
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
                                            <strong> {{ ucfirst($row->title) }} </strong>
                                            <div class="row_actions"><span class="id">ID: {{ $row->id }} | </span><span
                                                    class="edit"><a href="{{ route('options.edit', $row->id) }}"
                                                        aria-label="">Edit</a> 
                                                <!--        |-->
                                                <!--</span><span class="trash"><a href="{{ $row->id }}"-->
                                                <!--        class="submitdelete" aria-label="">Delete</a> </span>-->
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
  

@endsection

@section('libraries')
    <!-- Datatables -->
    <script type="text/javascript">
        $('.submitdelete').on('click', function(e) {
            e.preventDefault();
            if (confirm('Are you sure to delete??')) {
                var csrf = $('meta[name="csrf-token"]').attr('content');
                var id = $(this).attr('href');
                var url =
                    '{{ route('options.destroy', ':id') }}';
                url = url.replace(':id', id);
                $.ajax({
                    type: 'delete',
                    url: url,
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

    </script>
@endsection
