
<?php $__env->startSection('title', $trip->trip_title); ?>
<?php $__env->startSection('brief', $trip->trip_excerpt); ?>
<?php $__env->startSection('thumbnail', $trip->thumbnail); ?>
<?php $__env->startSection('meta_keyword', $trip->meta_key); ?>
<?php $__env->startSection('meta_description', $trip->meta_description); ?>
<?php $__env->startSection('content'); ?>
    <!-- banner -->
    <?php if($trip->banner): ?>
    <section class="uk-cover-container  uk-position-relative   uk-flex uk-flex-middle  uk-background-norepeat uk-background-cover uk-background-top-center"
        uk-parallax="bgy: -100; easing: -2;  " data-src="<?php echo e(asset('uploads/banners/' . $trip->banner)); ?>" uk-height-viewport="expand: true; min-height: 600;" uk-img>
        <?php else: ?>
        <section class="uk-cover-container  uk-position-relative   uk-flex uk-flex-middle  uk-background-norepeat uk-background-cover uk-background-top-center"
        uk-parallax="bgy: -100; easing: -2;  " data-src="<?php echo e(asset('themes-assets/images/trip/15.jpg')); ?>" uk-height-viewport="expand: true; min-height: 600;" uk-img>
            <?php endif; ?>
        <div class="uk-overlay-primary  uk-position-cover "></div>
        <div class="uk-width-1-1 uk-position-z-index uk-margin-large-top">
            <div class="uk-width-1-1 uk-position-relative" style="z-index: 99;">
                <div class="uk-container   uk-text-left  uk-position-relative">
                    <div class="uk-grid-small uk-grid uk-flex-middle" uk-grid="">
                        <div class="uk-width-expand@m ">
                            <div class=" uk-margin-small uk-width-large">
                                <h1 class=" uk-text-bolder text-white uk-margin-remove"
                                    uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 400; repeat: false;">
                                    Frequently Asked Questions </h1>
                            </div>
                            <div class="uk-content uk-panel  text-white uk-light "
                                uk-scrollspy="cls: uk-animation-slide-top-small;  delay: 800; repeat: false;">
                                <span id="triptitle"> <?php echo e($trip->trip_title); ?> </span>
                                <span class="uk-badge uk-margin-left" id="trip_counter"><?php echo e($data->count()); ?></span>
                            </div>
                        </div>
                        <div>
                            <div class="uk-content uk-panel">
                                <?php if($alltrips->count() > 0): ?>
                                    <div class="uk-width-medium uk-margin-auto">
                                        <select class="uk-select-search uk-select" id="triplist">
                                            <option value="">Please Select</option>
                                            <?php $__currentLoopData = $alltrips; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($row->id); ?>"><?php echo e($row->trip_title); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="uk-clearfix"> </div>
                </div>
            </div>
    </section>
    <!-- end banner -->
    <!-- section   -->
    <section class="uk-section bg-white uk-position-relative">
        <div class="uk-container">
            <ul uk-accordion class="uk-accordion uk-accordion-outline" id="faqlist">
                <?php if($data->count() > 0): ?>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="<?php echo e($loop->iteration == 1 ? 'uk-open' : ''); ?>">
                            <div class=" uk-accordion-title">
                                <h4 class=" text-primary uk-margin-remove theme-font-medium"><?php echo e($loop->iteration); ?> -
                                    <?php echo e($row->title); ?> </h4>
                            </div>
                            <div class="uk-accordion-content">
                                <p> <?php echo e($row->content); ?> </p>
                            </div>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </ul>
        </div>
    </section>
    <!-- section  -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        $('#triplist').change(function() {
            var id = $(this).val();
            var trip = $('#triplist option:selected').text();
            $('#triptitle').html(trip);
            if (id) {
                var csrf = $('meta[name="csrf-token"]').attr('content');
                var url =
                    "<?php echo e(route('trip.faqsearch', ':trip_id')); ?>";
                url = url.replace(':trip_id', id);
                $.ajax({
                    type: "GET",
                    url: url,
                    data: {
                        _token: csrf
                    },
                    beforeSend: function() {},
                    success: function(data) {
                        if (data.length !== 0) {
                            $("#faqlist").empty();
                            $.each(data, function(key, value) {
                                $("#faqlist").append(function(n) {
                                    let sn = key + 1;
                                    let open = (sn == 1) ? 'uk-open' : '';
                                    let list = '<li class="' + open + '">';
                                    list += '<div class=" uk-accordion-title">';
                                    list +=
                                        '<h4 class=" text-primary uk-margin-remove theme-font-medium"> ' +
                                        sn + ' - ' +
                                        value.title + ' </h4> </div>';
                                    list += '<div class="uk-accordion-content">';
                                    list += '<p> ' + value.content + ' </p>';
                                    list += '</div>';
                                    list += '</li>';
                                    return list;
                                });
                            });
                        } else {
                            $('#trip_counter').remove();
                            $("#faqlist").empty();
                            $("#faqlist").append('<li> FAQs Not Available! </li>');
                        }
                    },
                    complete: function() {},
                });
            }
        });

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('themes.default.common.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sevensummittreks/public_html/resources/views/themes/default/faq.blade.php ENDPATH**/ ?>