@extends('admin.master')
@section('title', '')
@section('breadcrumb')
<a href="{{ url('admin/trip/'  . $id . '/edit') }}" class="btn btn-success btn-sm">{{tripname($id)->trip_title}}</a>
<a href="{{ route('category.create',$id) }}" class="btn btn-primary btn-sm">Create</a>
@endsection
@section('content')

<div class="tray tray-center" style="">
<div class="panel">
	<div class="panel-body ph20">
		<div class="tab-content">
			<div id="users" class="tab-pane active">
				<div class="table-responsive mhn20 mvn15">
				<table class="table admin-form theme-warning fs13">
						<thead>
							<tr class="bg-light">
								<th class="">SN</th>
								<th class="">Category </th>
								<th class="">Is Default?</th>
								<th class="text-left">Action</th>
							</tr>
						</thead>
						<tbody>
							@if($data->count() > 0)
							@foreach($data as $row)
							<tr class="id{{$row->id}}">
								<td class="">{{$loop->iteration}}</td>
								<td class="">{{ $row->category  }}</td>
								<td> 
									<form action="{{route('itinerary-category.isdefault',$row->id)}}" method="POST">
										@csrf	
										 @if(($row->default)==0)
                                    <button class="btn btn-danger btn btn-sm" name="No" type="submit"><i
                                            class="fa fa-times"></i>
                                    </button>
                               		 @else
                                    <button class="btn btn-success btn btn-sm" name="Yes" type="submit"><i
                                            class="fa fa-check"></i>
                                    </button>
                             	   @endif								 									
									
									</form>								 
								</td>
								<td class="text-left">
									<a href="{{ route('category.edit',[$row->id,$id]) }}">Edit</a>
									|   <span class="trash"><a href="{{route('itinerary.destroy',$row->id)}}" class="btn-delete">Delete</a></span>
								</td>
							</tr>
							@endforeach
							@else
							 <tr>
							 	<td colspan="5" class="text-center"> Data Not Available! </td>
							 </tr>
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
<!-- <script type="text/javascript">
(function($) {
    $('.btn-delete').on('click', function(e) {
        e.preventDefault();
        if (confirm('Are you sure to delete??')) {
            var csrf = $('meta[name="csrf-token"]').attr('content');
            var str = $(this).attr('href');
            var id = str.slice(1);
            var url = '{{route("itinerary-category.destroy",':id')}}';
            url = url.replace(':id',id);
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

}(jQuery));

</script> -->

@endsection
