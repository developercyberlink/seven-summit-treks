
<div class="row">
<div class="col-md-8">
    <!-- Input Fields -->
    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title">New Trip<span style="color:red">*</span></span>
        </div>
        <div class="panel-body">
            <div class="form-group">

                <div class="col-lg-12">
                    <div class="bs-component">
                        <input type="text" id="trip_title" name="trip_title" class="form-control"
                            placeholder="Trip Title" value="{{ old('trip_title') }}" />
                        <input type="hidden" id="uri" name="uri" value="" />
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-12">
                    <div class="bs-component">
                        <input type="text" name="sub_title" class="form-control" placeholder="Sub Title"
                            value="{{ old('sub_title') }}" />
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title">Trip Details</span>
        </div>
        <div class="panel-body">

            <div class="form-group">
                <div class="col-lg-6">
                    <div class="bs-component">
                        <label>Max Elevation</label>
                        <input type="text" name="max_altitude" class="form-control"
                            value="{{ old('max_altitude') }}" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="bs-component">
                        <label>Walking Per Day</label>
                        <input type="text" name="walking_per_day" class="form-control"
                            value="{{ old('walking_per_day') }}" />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-6">
                    <div class="bs-component">
                        <label>Accommodation</label>
                        <input type="text" name="accommodation" class="form-control"
                            value="{{ old('accommodation') }}" />
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="bs-component">
                        <label>Best Season</label>
                        @if ($seasons->count() > 0)
                            <select class="form-control" name="best_season">
                                <option value="">Select Season</option>
                                @foreach ($seasons as $row)
                                    <option value="{{ $row->id }}">{{ $row->season }}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-6">
                    <div class="bs-component">
                        <label>Group Size</label>
                        <input type="text" name="group_size" class="form-control" value="{{ old('group_size') }}" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="bs-component">
                        <label>Country</label>
                        @if ($countries->count() > 0)
                            <select class="form-control" name="country">
                                <option value="">Select Country</option>
                                @foreach ($countries as $row)
                                    <option value="{{ $row->id }}">{{ $row->country }}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-6">
                    <div class="bs-component">
                        <label>Peak Name</label>
                        <input type="text" name="peak_name" class="form-control" value="{{ old('peak_name') }}" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="bs-component">
                        <label>Duration</label>
                        <input type="text" name="duration" class="form-control" value="{{ old('duration') }}" />
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-6">
                    <div class="bs-component">
                        <label>Route</label>
                        <input type="text" name="route" class="form-control" value="{{ old('route') }}" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="bs-component">
                        <label>Rank</label>
                        <input type="text" name="rank" class="form-control" value="{{ old('rank') }}" />
                    </div>
                </div>
            </div>


            <div class="form-group">
                <div class="col-lg-6">
                    <div class="bs-component">
                        <label>Co-ordinate</label>
                        <input type="text" name="coordinate" class="form-control" value="{{ old('coordinate') }}" />
                    </div>
                </div>
                  <div class="col-lg-6">
                    <div class="bs-component">
                        <label>Trip Range</label>
                        <input type="text" name="trip_range" class="form-control" value="{{ old('trip_range') }}" />
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-lg-6">
                    <div class="bs-component">
                        <label>Trip tag</label>
                        <input type="text" name="trip_tag" class="form-control" value="{{ old('trip_tag') }}" />
                    </div>
                </div>

                <!--<div class="col-lg-6">-->
                <!--    <div class="bs-component">-->
                <!--        <label>Trip Grade</label>-->
                <!--        @if ($grades->count() > 0)-->
                <!--            <select class="form-control" name="trip_grade">-->
                <!--                <option value=""> Select Grade </option>-->
                <!--                @foreach ($grades as $row)-->
                <!--                    <option value="{{ $row->grade }}">{{ $row->grade }} </option>-->
                <!--                @endforeach-->
                <!--            </select>-->
                <!--        @endif-->
                <!--    </div>-->
                <!--</div>-->
                
                  <div class="col-lg-6">
                    <div class="bs-component">
                        <label>Trip Rating</label>
                        @if ($ratings->count() > 0)
                            <select class="form-control" name="rating">
                                <option value=""> Select Rating </option>
                                @foreach ($ratings as $row)
                                    <option value="{{ $row->id }}">{{ $row->id }} - {{ $row->title }}
                                    </option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                </div>
            </div>
            
            
            <div class="form-group">
                <div class="col-lg-6">
                    <div class="bs-component">
                        <label>Route Camp Title</label>
                        <input type="text" name="trip_grade_msg" class="form-control"
                            value="{{ old('trip_grade_msg') }}" />
                    </div>
                </div>
                  <div class="col-lg-6 onchange 2">
                    <div class="bs-component">
                        <label>Trip Grade</label>
                        @if ($exp->count() > 0)
                            <select class="form-control" name="exp_grade">
                                <option value=""> Select Grade </option>
                                @foreach ($exp as $row)
                                    <option value="{{ $row->id}}">{{ $row->trip_grade }} </option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                </div>

                <div class="col-lg-6 onchange 1">
                    <div class="bs-component">
                        <label>Trip Grade</label>
                        @if ($trek->count() > 0)
                            <select class="form-control" name="trip_grade">
                                <option value=""> Select Grade </option>
                                @foreach ($trek as $row)
                                    <option value="{{ $row->id }}">{{ $row->trip_grade }} </option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                </div>
              
            </div>

        </div>
    </div>
    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title">Trip Brief</span>
        </div>
        <div class="panel-body">
            <div class="form-group">
                <div class="col-lg-12">
                    <div class="bs-component">
                        <textarea class="my-editor form-control" name="trip_excerpt"
                            rows="3">{{ old('trip_excerpt') }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title"> Trip Content</span>
        </div>
        <div class="panel-body">
            <div class="form-group">

                <div class="col-lg-12">
                    <div class="bs-component">
                        <textarea class="my-editor form-control"
                            name="trip_content">{{ old('trip_content') }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title"> Meta data </span>
        </div>
        <div class="panel-body">
            <div class="form-group">
                <div class="col-lg-12">
                    <div class="bs-component">
                         <textarea class="form-control" id="textArea3" name="meta_key" rows="3"
                            placeholder="Meta Keywords">{{ old('meta_key') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-12">
                    <div class="bs-component">
                        <textarea class="form-control" id="textArea3" name="meta_description" rows="3"
                            placeholder="Meta Description">{{ old('meta_description') }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title"> Video Link </span>
        </div>
        <div class="panel-body">
            <div class="form-group">
                <div class="col-lg-12">
                    <div class="bs-component">
                        <input type="text" class="form-control" name="trip_video" value="{{ old('trip_video') }}"
                            placeholder="Trip Video" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    
        <div class="panel">
        <div class="panel-heading">
            <span class="panel-title"> Video Status </span>
        </div>
        <div class="panel-body">
            <div class="form-group">
                <div class="col-lg-12">
                    <div class="bs-component">
                        <select class="form-control" name="video_status">
                            <option selected disabled>Select status</option>
                            <option value="1">Enabled</option>
                            <option value="0">Disabled</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

<div class="col-md-4">
    <div class="admin-form">
        <!-- // -->
         <div class="sid_bvijay mb10">
            <h4> Trip Type <span style="color:red">*</span></h4>
            <div class="hd_show_con">
                <select class="form-control onchange-select" name="trip_type">
							 <option selected disabled> Select Trip Type </option>
                         @foreach($trip_type as $row)
                         <option value="{{$row->id}}">{{$row->trip_type}}</option>
                         @endforeach
                        </select>
            </div>
        </div>
        
        <div class="sid_bvijay mb10 onchange 1">
            <h4> Regions </h4>
            <div class="hd_show_con">

                <div class="tab-content mb15">
                    <div id="tab1" class="tab-pane active">
                        @if ($regions->count() > 0)
                            <ul class="ctgor">
                                @foreach ($regions as $row)
                                    <li>
                                        <label class="option">
                                            <input type="checkbox" name="region[]" value="{{ $row->id }}" @if (is_array(old('region')) && in_array($row->id, old('region'))) checked @endif />
                                            <span class="checkbox"></span> {{ $row->title }}
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        
        <div class="onchange 2">
        <div class="sid_bvijay mb10">
            <h4> Expeditions </h4>
            <div class="hd_show_con">
                <div class="tab-content mb15">
                    <div id="tab1" class="tab-pane active">
                        @if ($expeditions->count() > 0)
                            <ul class="ctgor">
                                @foreach ($expeditions as $row)
                                    <li>
                                        <label class="option">
                                            <input type="checkbox" name="expedition[]" value="{{ $row->id }}" @if (is_array(old('expedition')) && in_array($row->id, old('expedition'))) checked @endif />
                                            <span class="checkbox"></span> {{ $row->title }}
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!--<div class="sid_bvijay mb10">-->
        <!--    <h4> Expedition Group </h4>-->
        <!--    <div class="hd_show_con">-->
        <!--        @if ($expeditionGroups->count() > 0)-->
        <!--            <select class="form-control" name="expedition_group_id">-->
        <!--                <option value=""> Select Expedition Group </option>-->
        <!--                @foreach ($expeditionGroups as $row)-->
        <!--                    <option value="{{ $row->id }}">{{ $row->group_title }}</option>-->
        <!--                @endforeach-->
        <!--            </select>-->
        <!--        @endif-->
        <!--    </div>-->
        <!--</div>-->
        
       
        <div class="sid_bvijay mb10 ">
            <h4> Trip Groups </h4>
            <div class="hd_show_con">
                <div class="tab-content mb15">
                    <div id="tab1" class="tab-pane active">
                        @if ($trip_groups->count() > 0)
                            <ul class="ctgor">
                                @foreach ($trip_groups as $row)
                                    <li>
                                        <label class="option">
                                            <input type="checkbox" name="tripgroup[]" value="{{ $row->id }}" @if (is_array(old('tripgroup')) && in_array($row->id, old('tripgroup'))) checked @endif />
                                            <span class="checkbox"></span> {{ $row->group_title }}
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
        <!--<div class="sid_bvijay mb10">-->
        <!--    <h4> Itinerary</h4>-->
        <!--    <div class="hd_show_con">-->
        <!--        <div class="tab-content mb15">-->
        <!--            <div id="tab1" class="tab-pane active">-->
        <!--                @if ($category->count() > 0)-->
        <!--                    <ul class="ctgor">-->
        <!--                        @foreach ($category as $row)-->
        <!--                            <li>-->
        <!--                                <label class="option">-->
        <!--                                    <input type="checkbox" name="category[]" value="{{ $row->id }}" @if (is_array(old('category')) && in_array($row->id, old('category'))) checked @endif />-->
        <!--                                    <span class="checkbox"></span> {{ $row->category }}-->
        <!--                                </label>-->
        <!--                            </li>-->
        <!--                        @endforeach-->
        <!--                    </ul>-->
        <!--                @endif-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
       

        <!-- // -->
        <div class="sid_bvijay mb10">
            <label class="field text">
                <input type="number" name="ordering" class="form-control" placeholder="Ordering"
                    value="{{ $ordering }}" />
            </label>
        </div>

        <div class="sid_bvijay mb10">
             
            <h4> Thumbnail </h4>
            <div class="hd_show_con">
                <div id="xedit-demo">
                    <!--<input type="file" name="thumbnail" />-->
                     
                          <label class="field prepend-icon append-button file">
                            <span class="button btn btn-primary">Choose File</span>
                            <input type="file" class="gui-file" name="thumbnail" id="file1" onChange="document.getElementById('Thumbnail').value = this.value;">
                            <input type="text" class="gui-input" id="Thumbnail" placeholder="Please select a photo">
                            <label class="field-icon">
                              <i class="fa fa-upload"></i>
                            </label>
                          </label>
                      
                        
                        
                </div>
            </div>
        </div>

        <div class="sid_bvijay mb10">
            <h4> Trip map </h4>
            <div class="hd_show_con">
                <div id="xedit-demo">
                    <!--<input type="file" name="trip_map" />-->
                     <label class="field prepend-icon append-button file">
                            <span class="button btn btn-primary">Choose File</span>
                            <input type="file" class="gui-file" name="trip_map" id="file2" onChange="document.getElementById('trip_map').value = this.value;">
                            <input type="text" class="gui-input" id="trip_map" placeholder="Please select a photo">
                            <label class="field-icon">
                              <i class="fa fa-upload"></i>
                            </label>
                          </label>
                          
                </div>
                 <small> (Width: 800px Height: 500px) </small>
            </div>
        </div>

        <div class="sid_bvijay mb10">
            <h4> Trip Banner </h4>
            <div class="hd_show_con">
                <div id="xedit-demo">
                    <!--<input type="file" name="banner" />-->
                     <label class="field prepend-icon append-button file">
                            <span class="button btn btn-primary">Choose File</span>
                            <input type="file" class="gui-file" name="banner" id="file2" onChange="document.getElementById('banner').value = this.value;">
                            <input type="text" class="gui-input" id="banner" placeholder="Please select a photo">
                            <label class="field-icon">
                              <i class="fa fa-upload"></i>
                            </label>
                          </label>
                </div>
               <small> (Width: 1600px Height: 1200px) </small>
            </div>
        </div>

    </div>
</div>
</div>