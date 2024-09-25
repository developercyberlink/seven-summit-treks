<div class="col-md-12">
    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title"> Weather Reports </span>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-4"><label>Title</label></div>
                <div class="col-md-8"><label>Content</label></div>
            </div>
                    <div class="row">
                        <input type="hidden" name="trip_detail_id" value="<?php if($weather_report): ?> <?php echo e($weather_report['trip_detail_id']); ?> <?php endif; ?>">
                        <div class="col-md-4">
                            <input type="text" id="weather_report_title" name="title" value="<?php if($weather_report): ?> <?php echo e($weather_report['title']); ?> <?php endif; ?>" class="form-control" />
                            URI
                            <input type="text" id="weather_report_uri" name="weather_report_uri" value="<?php if($weather_report): ?> <?php echo e($weather_report['weather_report_uri']); ?> <?php endif; ?>" class="form-control"  />
                        </div>
                        <div class="col-md-8">
                            <textarea type="text" name="content"
                                class="form-control my-editor"> <?php if($weather_report): ?> <?php echo $weather_report['content']; ?> <?php endif; ?>  </textarea>
                        </div>
                    </div>
        </div>
    </div>
</div>
<?php /**PATH /home/sevensummittreks/public_html/resources/views/admin/trips/edit/edit-weather-reports.blade.php ENDPATH**/ ?>