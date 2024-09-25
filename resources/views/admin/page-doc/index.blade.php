@extends('admin.master')
@section('title', 'Post')

@section('breadcrumb')

    <a href="{{ route('pagedoc.create', Request::segment(3)) }}" class="btn btn-primary btn-sm">Create</a>
@endsection

@section('content')
        @if(session('message'))
        <div class="alert alert-success alert-dismissible ">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{session('message')}}
                </div>
            @endif
    <section id="" class="">
        <!-- begin: .tray-center -->
        <div class="tray tray-center">
            <h4> Document List  </h4>
            <!-- recent orders table -->
            <div class="panel">
                <div class="panel-body pn">
                    <div class="table-responsive">
                        <table class="table admin-form table-striped dataTable" id="datatable3">
                            <thead>
                                <tr class="bg-light">
                                    <th class="text-center"> SN </th>
                                    <th>Page Name</th>
                                    <th></th>
                                    <th>Published</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($data->count() > 0)
                                    @foreach ($data as $row)
                                        <tr class="id{{ $row->id }}">
                                            <td class="text-center">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td class="post_title title_hi_sh">
                                                <strong> {{ ucfirst($row->title) }} </strong>
                                                <div class="row_actions"><span class="id">ID: {{ $row->id }} |
                                                    </span><span class="edit">
                                                        <a href="{{ route('pagedoc.edit', ['post_id' => Request::segment(3), 'id' => $row->id]) }}"
                                                            aria-label="">Edit</a> |
                                                    </span><span class="trash"><a href="{{ $row->id }}"
                                                            class="row-delete" aria-label="">Delete</a> </span>
                                            </td>
                                            <td>
                                            </td>
                                            <td class="date"> {{ $row->created_at }} </td>
                                        </tr>
                                    @endforeach
                                @endif
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
    <script type="text/javascript">
        $('.row-delete').on('click', function(e) {
            e.preventDefault();
            var csrf = $('meta[name="csrf-token"]').attr('content');
            var id = $(this).attr('href');
            var url = "{{ route('pagedoc.delete', ['id' => ':id']) }}";
            // url = url.replace(":admin", {{ Request::segment(2) }});
            url = url.replace(":id", id);
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
        });

    </script>
@endsection
