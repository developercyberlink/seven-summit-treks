<div class="col-md-8">
    <!-- Input Fields -->
    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title">Create Travel Guide</span>
        </div>
        <div class="panel-body">

            <div class="form-group">
                <label for="inputStandard" class="col-lg-2 control-label">Category</label>
                <div class="col-lg-9">
                    <div class="bs-component">
                    <select class="form-control" name="category">
                        <option selected disabled>--Please select type--</option>
                            <option value="guide">Travel Guide</option>
                            <option value="insurance">Trip Insurance</option>
                            <option value="payment">Application process</option>
                    </select>
                    <div id="source-button" class="btn btn-primary btn-xs" style="display: none;">&lt; &gt;</div></div>
                </div>
            </div>

            <div class="form-group">
                <label for="inputStandard" class="col-lg-2 control-label">Title</label>
                <div class="col-lg-9">
                    <div class="bs-component">
                        <input type="text" id="category" name="title" class="form-control" placeholder="" />
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="inputStandard" class="col-lg-2 control-label">Description</label>
                <div class="col-lg-9">
                    <div class="bs-component">
                        <div class="bs-component">
                            <textarea class="form-control my-editor" id="textArea3" name="description" rows="15" autocomplete="off"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="inputStandard" class="col-lg-2 control-label">External Link</label>
                <div class="col-lg-9">
                    <div class="bs-component">
                        <input class="form-control" name="link" type="text" placeholder="">
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="admin-form">
        <div class="sid_bvijay mb10">
            <div class="hd_show_con">
                <div class="publice_edi">
                    Status: <a href="avoid:javascript;" data-toggle="collapse" data-target="#publish_1">Active</a>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="sid_bvijay mb10">
            <label class="field text">
                {{--<input type="number" id="inputStandard" name="ordering" class="form-control" value="{{$ordering}}" placeholder="Order" />--}}
            </label>
        </div>
        
        <div class="sid_bvijay mb10">
         <h4>Trips </h4>
         <div class="hd_show_con">
    
            <div class=" has-feedback has-search">
            <input class="category-search form-control" type="text" placeholder="Search.."> 
            <span class="glyphicon glyphicon-search form-control-feedback"></span>
          </div>
            <div class="tab-content mb15">
           <div id="tab1" class="tab-pane active">
            @if($trip->count() > 0)
            <ul class="ctgor category-list" id="myTable">
             @foreach($trip as $value)
              <li>
                <label class="">
                  <input type="radio" name="trip_id" value="{{$value->id}}" >
                  {{$value->trip_title}} 
                </label>
              </li>    
              @endforeach
            </ul>
            @endif
          </div>  
        </div>
      </div>
    </div>
    </div>

</div>

@section('scripts')
<script type="text/javascript">

    /******** For Gear *******/
    jQuery(document).delegate('a.add-gear', 'click', function(e) {
        e.preventDefault();
        var content = jQuery('#row_gear_additional .row'),
            size = jQuery('#row_gear_body >.row').length + 1,
            element = null,
            element = content.clone();
        element.attr('id', 'gear-rec-'+size);
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
            jQuery('#gear-rec-' + id).remove();
            return true;
        } else {
            return false;
        }
    });
    /******** End For Gear *******/
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#travelguide").on('submit',function(e){
            e.preventDefault();
            let url = "{{route('travel_guide')}}";
            let tripData = document.getElementById('travelguide');
            let data = new FormData(tripData);
            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                cache: false,
                processData: false,
                contentType : false,
                beforeSend:function() {},
                success: function (data) {
                    console.log(data);
                    document.getElementById("travelguide").reset();
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

</script>
@stop
