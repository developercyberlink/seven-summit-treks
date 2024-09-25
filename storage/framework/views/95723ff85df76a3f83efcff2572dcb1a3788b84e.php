<div class="row">
<div class="col-md-8">
    <!-- Input Fields -->
    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title">New Trip</span>
        </div>
        <div class="panel-body">
            <div class="form-group">
                <div class="col-lg-12">
                    <div class="bs-component">
                        <input type="text" id="trip_title" name="trip_title" class="form-control"
                            value="<?php echo e($data->trip_title); ?>" placeholder="Trip Title" />
                        <input type="hidden" id="uri" name="uri" value="<?php echo e($data->uri); ?>" />
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-12">
                    <div class="bs-component">
                        <input type="text" name="sub_title" class="form-control" value="<?php echo e($data->sub_title); ?>"
                            placeholder="Sub Title" />
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title"> Trip Details </span>
        </div>
        <div class="panel-body">

            <div class="form-group">

                <div class="col-lg-6">
                    <div class="bs-component">
                        <label>Max Elevation</label>
                        <input type="text" name="max_altitude" class="form-control"
                            value="<?php echo e($data->max_altitude); ?>" />
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="bs-component">
                        <label>Walking Per Day</label>
                        <input type="text" name="walking_per_day" class="form-control"
                            value="<?php echo e($data->walking_per_day); ?>" />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-6">
                    <div class="bs-component">
                        <label>Accommodation</label>
                        <input type="text" name="accommodation" class="form-control"
                            value="<?php echo e($data->accommodation); ?>" />
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="bs-component">

                        <label>Best Season</label>
                        <select class="form-control" name="best_season">
                            <option value="0">Select Season</option>
                            <?php if($seasons->count() > 0): ?>
                                <?php $__currentLoopData = $seasons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($row->id); ?>"
                                        <?php echo e($row->id == $data->best_season ? 'selected' : ''); ?>><?php echo e($row->season); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-6">
                    <div class="bs-component">
                        <label>Group Size</label>
                        <input type="text" name="group_size" class="form-control" value="<?php echo e($data->group_size); ?>" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="bs-component">
                        <label>Country</label>
                        <select class="form-control" name="country">
                            <option value="0">Select Country</option>
                            <?php if($countries->count() > 0): ?>
                                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($row->id); ?>"
                                        <?php echo e($row->id == $data->country ? 'selected' : ''); ?>><?php echo e($row->country); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-6">
                    <div class="bs-component">
                        <label>Peak Name</label>
                        <input type="text" name="peak_name" class="form-control" value="<?php echo e($data->peak_name); ?>" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="bs-component">
                        <label>Duration</label>
                        <input type="text" name="duration" class="form-control" value="<?php echo e($data->duration); ?>" />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-6">
                    <div class="bs-component">
                        <label>Route</label>
                        <input type="text" name="route" class="form-control" value="<?php echo e($data->route); ?>" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="bs-component">
                        <label>Rank</label>
                        <input type="text" name="rank" class="form-control" value="<?php echo e($data->rank); ?>" />
                    </div>
                </div>
            </div>


            <div class="form-group">
                <div class="col-lg-6">
                    <div class="bs-component">
                        <label>Co-ordinate</label>
                        <input type="text" name="coordinate" class="form-control" value="<?php echo e($data->coordinate); ?>" />
                    </div>
                </div>
                
                 <div class="col-lg-6">
                    <div class="bs-component">
                        <label>Trip Range</label>
                        <input type="text" name="trip_range" class="form-control" value="<?php echo e($data->trip_range); ?>" />
                    </div>
                </div>
                
            </div>

            <div class="form-group">
                <div class="col-lg-6">
                    <div class="bs-component">
                        <label>Trip tag</label>
                        <input type="text" name="trip_tag" class="form-control" value="<?php echo e($data->trip_tag); ?>" />
                    </div>
                </div>
             <div class="col-lg-6">
                    <div class="bs-component">
                        <label>Trip Rating</label>
                        <?php if($ratings->count() > 0): ?>
                            <select class="form-control" name="rating">
                                <option value="0">Select Rating</option>
                                <?php $__currentLoopData = $ratings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($row->id); ?>"
                                        <?php echo e($row->id == $data->rating ? 'selected' : ''); ?>> <?php echo e($row->title); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        <?php endif; ?>

                    </div>
                </div>
                </div>

            <div class="form-group">
                <div class="col-lg-6">
                    <div class="bs-component">
                        <label>Route Camp Title</label>
                        <input type="text" name="trip_grade_msg" class="form-control" value="<?php echo e($data->trip_grade_msg); ?>"/>
                    </div>
                </div>
                   <div class="col-lg-6 onchange 2">
                    <div class="bs-component">
                        <label>Trip Grade</label>
                        <?php if($exp->count() > 0): ?>
                            <select class="form-control" name="exp_grade">
                                <option value="0"> Select Grade </option>
                                   <?php $__currentLoopData = $exp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($row->id); ?>"
                                        <?php echo e($row->id == $data->exp_grade ? 'selected' : ''); ?>><?php echo e($row->trip_grade); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        <?php endif; ?>

                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="bs-component onchange 1">
                        <label>Trip Grade</label>
                        <?php if($trek->count() > 0): ?>
                            <select class="form-control" name="trip_grade">
                                <option value="0"> Select Grade </option>
                                <?php $__currentLoopData = $trek; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($row->id); ?>"
                                        <?php echo e($row->trip_grade == $data->trip_grade ? 'selected' : ''); ?>><?php echo e($row->trip_grade); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        <?php endif; ?>

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
                        <textarea class="my-editor form-control" name="trip_excerpt" rows="3"
                            placeholder="Trip Brief" rows="6"><?php echo e($data->trip_excerpt); ?></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title">Trip Content</span>
        </div>
        <div class="panel-body">
            <div class="form-group">
                <div class="col-lg-12">
                    <div class="bs-component">
                        <textarea class="my-editor form-control" name="trip_content" id="trip_content"
                            placeholder="Trip Content" rows="12"><?php echo e($data->trip_content); ?></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title">Related Trips</span>
        </div>
        <div class="panel-body">
            <div class="form-group">
                <div class="col-lg-12">
                    <div class="bs-component">

                        <select class="form-control realted-trips" name="related_trips[]" multiple="multiple">
                            <?php if($all_trips->count() > 0): ?>
                                <?php $__currentLoopData = $all_trips; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__currentLoopData = $data->relatedtrips; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $_row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($row->id == $_row->pivot->related_trip_id): ?>
                                            <option value="<?php echo e($row->id); ?>" selected> <?php echo e($row->trip_title); ?>

                                            </option>
                                            <?php continue; ?>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($row->id); ?>"><?php echo e($row->trip_title); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </select>
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
                        <textarea class="form-control" name="meta_key" rows="3"
                            placeholder="Meta Keywords"><?php echo e($data->meta_key); ?></textarea>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-12">
                    <div class="bs-component">
                        <textarea class="form-control" name="meta_description" rows="3"
                            placeholder="Meta Description"><?php echo e($data->meta_description); ?></textarea>
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
                        <input type="text" class="form-control" name="trip_video" value="<?php echo e($data->trip_video); ?>"
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
                            <option <?php if($data->video_status==1): ?>selected <?php endif; ?> value="1">Enabled</option>
                            <option <?php if($data->video_status==0): ?>selected <?php endif; ?> value="0">Disabled</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="col-md-4">
    <div class="admin-form">
          <div class="sid_bvijay mb10">
            <h4> Trip Type </h4>
            <div class="hd_show_con">
                 <select class="form-control onchange-select" name="trip_type">
                    <?php if($trip_type->count(0 > 0)): ?>
                        <?php $__currentLoopData = $trip_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <option value="<?php echo e($row->id); ?>" <?php if($data->trip_type == $row->id ): ?> selected <?php endif; ?>> <?php echo e($row->trip_type); ?> </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>                   
                </select>
            </div>
        </div>


        <div class="sid_bvijay mb10 onchange 1">
            <h4> Regions </h4>
            <div class="hd_show_con">

                <div class="tab-content mb15">
                    <div id="tab1" class="tab-pane active">
                        <?php if($regions->count() > 0): ?>
                            <ul class="ctgor">
                                <?php $__currentLoopData = $regions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <label class="option">
                                            <input type="checkbox" name="region[]" value="<?php echo e($row->id); ?>"
                                                <?php echo e(in_array($row->id, $checked_regions) ? 'checked' : ''); ?>>
                                            <span class="checkbox"></span> <?php echo e($row->title); ?>

                                        </label>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php endif; ?>
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
                        <?php if($expeditions->count() > 0): ?>
                            <ul class="ctgor">
                                <?php $__currentLoopData = $expeditions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <label class="option">
                                            <input type="checkbox" name="expedition[]" value="<?php echo e($row->id); ?>"
                                                <?php echo e(in_array($row->id, $checked_expeditions) ? 'checked' : ''); ?>>
                                            <span class="checkbox"></span> <?php echo e($row->title); ?>

                                        </label>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <!--<div class="sid_bvijay mb10">-->
        <!--    <h4> Expedition Group </h4>-->
        <!--    <div class="hd_show_con">-->
        <!--        <?php if($expeditionGroups->count() > 0): ?>-->
        <!--            <select class="form-control" name="expedition_group_id">-->
        <!--                <option value=""> Select Expedition Group </option>-->
        <!--                <?php $__currentLoopData = $expeditionGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
        <!--                    <option value="<?php echo e($row->id); ?>"-->
        <!--                        <?php echo e($row->id == $data->expedition_group_id ? 'selected' : ''); ?>>-->
        <!--                        <?php echo e($row->group_title); ?></option>-->
        <!--                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
        <!--            </select>-->
        <!--        <?php endif; ?>-->
        <!--    </div>-->
        <!--</div>-->
     
        </div>
     
       <div class="sid_bvijay mb10 onchange 2">  
            <h4> Expedition Groups </h4>
            <div class="hd_show_con">
                <div class="tab-content mb15">
                    <div id="tab1" class="tab-pane active">
                        <?php if($trip_groups->count() > 0): ?>
                            <ul class="ctgor">
                                <?php $__currentLoopData = $trip_groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <label class="option">
                                            <input type="checkbox" name="tripgroup[]" value="<?php echo e($row->id); ?>"
                                                <?php echo e(in_array($row->id, $checked_tripgroups) ? 'checked' : ''); ?>>
                                            <span class="checkbox"></span> <?php echo e($row->group_title); ?>

                                        </label>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        
        
          <?php if($category->count() > 0): ?>
        <div class="sid_bvijay mb10">
            <h4> Itinerary</h4>
            <div class="hd_show_con">
                <div class="tab-content mb15">
                    <div id="tab1" class="tab-pane active">

                            <ul class="ctgor">
                                <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <label class="option">
                                            <input type="checkbox" name="category[]" value="<?php echo e($row->id); ?>"
                                              <?php echo e(in_array($row->id, $checked_categories) ? 'checked' : ''); ?>>
                                            <span class="checkbox"></span> <?php echo e($row->category); ?>

                                        </label>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
      
        <div class="sid_bvijay mb10">
            <h4> Trip Ordering </h4>
            <div class="hd_show_con">
                <label class="field text">
                    <input type="number" name="ordering" class="form-control" placeholder="Ordering"
                        value="<?php echo e($data->ordering); ?>" />
                </label>
            </div>
        </div>

        <div class="sid_bvijay mb10">
            <h4> Thumbnail </h4>
            <div class="hd_show_con">
                <div id="xedit" class="bs-component">
                    <!--<input type="file" name="thumbnail" />-->
                     <label class="field prepend-icon append-button file mb20">
                            <span class="button btn btn-primary">Change</span>
                            <input type="file" class="gui-file" name="thumbnail" id="file1" onChange="document.getElementById('Thumbnail').value = this.value;">
                            <input type="text" class="gui-input" id="Thumbnail" placeholder="Please select a photo">
                            <label class="field-icon">
                              <i class="fa fa-upload"></i>
                            </label>
                          </label>
                </div>
                <?php if($data->thumbnail): ?>
                    <div class="delete-fe-image thumb_id<?php echo e($data->id); ?>">
                        <img src="<?php echo e(asset(env('PUBLIC_PATH') . 'uploads/original/' . $data->thumbnail)); ?>"
                            width="100%" />
                        <a href="#<?php echo e($data->id); ?>" class="thumbdelete">X</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- trip map -->
        <div class="sid_bvijay mb10">
            <h4> Trip Map </h4>
            <div class="hd_show_con">
                <div class="bs-component">
                    <!--<input type="file" name="trip_map" />-->
                    
                       <label class="field prepend-icon append-button file mb20">
                            <span class="button btn btn-primary">Change</span>
                            <input type="file" class="gui-file" name="trip_map" id="file2" onChange="document.getElementById('trip_map').value = this.value;">
                            <input type="text" class="gui-input" id="trip_map" placeholder="Please select a photo">
                            <label class="field-icon">
                              <i class="fa fa-upload"></i>
                            </label>
                          </label>
                </div>
                <?php if($data->trip_map): ?>
                    <div class="delete-fe-image map_id<?php echo e($data->id); ?>">
                        <img src="<?php echo e(asset(env('PUBLIC_PATH') . 'uploads/original/' . $data->trip_map)); ?>"
                            width="100%" />
                        <a href="#<?php echo e($data->id); ?>" class="mapdelete">X</a>
                    </div>
                <?php endif; ?>
                 <small> (Width: 800px Height: 500px) </small>
            </div>
        </div>

        <div class="sid_bvijay mb10">
            <h4> Trip Banner </h4>
            <div class="hd_show_con">
                <div class="bs-component">
                    <!--<input type="file" name="banner" />-->
                     <label class="field prepend-icon append-button file mb20">
                            <span class="button btn btn-primary">Change</span>
                            <input type="file" class="gui-file" name="banner" id="file3" onChange="document.getElementById('banner').value = this.value;">
                            <input type="text" class="gui-input" id="banner" placeholder="Please select a photo">
                            <label class="field-icon">
                              <i class="fa fa-upload"></i>
                            </label>
                          </label>
                </div>
                <?php if($data->banner): ?>
                    <div class="delete-fe-image banner_id<?php echo e($data->id); ?>">
                        <img src="<?php echo e(asset(env('PUBLIC_PATH') . 'uploads/banners/' . $data->banner)); ?>"
                            width="100%" />
                        <a href="#<?php echo e($data->id); ?>" class="bannerdelete">X</a>
                    </div>
                <?php endif; ?>
                 <small> (Width: 1600px Height: 1200px) </small>
            </div>
        </div>

    </div>
</div>
</div>
<?php /**PATH /home/sevensummittreks/public_html/resources/views/admin/trips/edit/edit-general.blade.php ENDPATH**/ ?>