</main>
<footer>
    <?php if($partners->count() > 0): ?>
        <section
            class="bg-black uk-position-relative uk-wave-black-top  uk-box-shadow-medium uk-section-small  uk-position-relative">
            <div class="uk-container  uk-position-relative">
                <h1 class="text-white uk-h4 uk-margin-small">Partners</h1>
                <div uk-slider="sets: false; autoplay: true; autoplay-interval: 4000; finite: false;">
                    <div class="uk-position-relative uk-visible-toggle " tabindex="-1">
                        <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-4@s uk-child-width-1-5@m uk-grid-small"
                            uk-grid>
                            <!--  -->
                            <?php $__currentLoopData = $partners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <div class="partners-logo-list bg-white uk-border-rounded uk-img-effect">
                                        <?php if($row->external_link && $row->page_thumbnail): ?>
                                        <a href="<?php echo e($row->external_link); ?>" target="_blank">
                                        <img src="<?php echo e(asset('uploads/medium/' . $row->page_thumbnail)); ?>" class="uk-effect-1" alt="<?php echo e($row->post_title); ?>" >
                                        </a>
                                        <?php elseif($row->page_thumbnail): ?>
                                        <img src="<?php echo e(asset('uploads/medium/' . $row->page_thumbnail)); ?>" class="uk-effect-1" alt="<?php echo e($row->post_title); ?>">
                                        <?php else: ?>
                                          <img src="<?php echo e(asset('themes-assets/images/blank.png')); ?>" class="uk-effect-1" alt="<?php echo e($row->post_title); ?>">
                                        <?php endif; ?>
                                    </div>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <!--  -->
                        </ul>
                        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#"
                            uk-slidenav-previous uk-slider-item="previous"></a>
                        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next
                            uk-slider-item="next"></a>
                    </div>

                </div>
                <!--  -->
                <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1"
                    uk-slider="sets: true; autoplay: true; finite: true;">
                    <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-5@m uk-grid">
                    </ul>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!--  -->
    <!--  -->
    <section class="bg-black uk-section  footer-border uk-footer-14-peak uk-position-relative">
        <div class="uk-container">
            <div class="uk-margin-remove-bottom tm-grid-expand uk-grid-large uk-margin-xlarge uk-grid" uk-grid=""
                uk-scrollspy="cls: uk-animation-slide-left-small; target:div,  li, img, p, h1;  delay: 50; repeat: false;">
                <?php if($footer->count(0 > 0)): ?>
                    <div class="uk-width-1-2@s  uk-width-1-2  uk-width-expand@m">
                        <h1 class="uk-h4 text-white uk-text-bold  uk-scrollspy-inview uk-animation-slide-left-small"
                            uk-scrollspy-class="">
                            About Us
                        </h1>
                        <ul class="uk-list  uk-scrollspy-inview uk-animation-slide-left-small" uk-scrollspy-class="">
                            <?php $__currentLoopData = $footer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li> <a href="<?php echo e(url(geturl($row->uri))); ?>"> <?php echo e($row->post_title); ?> </a> </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <?php if($regions->count() > 0): ?>
                    <div class="uk-width-1-2@s  uk-width-1-2 uk-width-expand@m">
                        <h1 class="uk-h4  text-white uk-text-bold  uk-scrollspy-inview uk-animation-slide-left-small"
                            uk-scrollspy-class="">Trekking</h1>
                        <ul class="uk-list  uk-scrollspy-inview uk-animation-slide-left-small" uk-scrollspy-class="">
                            <?php $__currentLoopData = $regions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li> <a href="<?php echo e(url(regionurl($row->uri))); ?>"><?php echo e($row->title); ?></a> </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <?php if($expeditions->count() > 0): ?>
                    <div class="uk-width-1-2@s uk-width-1-2 uk-width-expand@m">
                        <h1 class="uk-h4  text-white uk-text-bold  uk-scrollspy-inview uk-animation-slide-left-small"
                            uk-scrollspy-class="">Expeditions </h1>
                        <ul class="uk-list  uk-scrollspy-inview uk-animation-slide-left-small" uk-scrollspy-class="">
                            <?php $__currentLoopData = $expeditions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a href="<?php echo e(url(expeditionurl($row->uri))); ?>"> <?php echo e($row->title); ?> </a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <div class="uk-width-1-3@s">
                    <h1 class="uk-h4  text-white uk-text-bold  uk-scrollspy-inview uk-animation-slide-left-small"
                        uk-scrollspy-class=""> <?php echo e($setting->site_name); ?> </h1>
                    <ul class="uk-list text-white">

                        <li>
                            <div class="uk-flex uk-flex-middle">
                                <div> <span class="uk-icon-button bg-primary  text-black uk-margin-small-right"
                                        uk-icon="icon: location;"></span> </div>
                                <div><a href="<?php echo e($setting->google_map); ?>" target="_blank"><?php echo e($setting->address); ?></a></div>
                            </div>
                        </li>
                        <li>
                            <div class="uk-flex uk-flex-middle">
                                <div> <span class="uk-icon-button bg-primary text-black uk-margin-small-right"
                                        uk-icon="icon: receiver;"></span> </div>
                                <div><a href="tel:<?php echo e($setting->phone); ?>"><?php echo e($setting->phone); ?></a></div>
                            </div>
                        </li>
                        <li>
                            <div class="uk-flex uk-flex-middle">
                                <div> <span class="uk-icon-button bg-primary text-black uk-margin-small-right"
                                        uk-icon="icon: mail;"></span> </div>
                                <div><a
                                        href="mailto:<?php echo e($setting->email_primary); ?>"><?php echo e($setting->email_primary); ?></a>
                                </div>
                            </div>
                        </li>
                    </ul>
                        <!--                <div class="uk-margin-small">-->
                        <!--<h5 class="uk-h4  text-white uk-text-bold  uk-scrollspy-inview uk-animation-slide-left-small">-->
                        <!--    Subscribe our newsletter</h5>-->
                        <!--       <?php if(session('status')): ?>-->
                        <!--       <div class="alert alert-success alert-dismissible subscribe">-->
                        <!--          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>-->
                        <!--    <?php echo e(session('status')); ?>-->
                        <!--    </div>-->
                        <!--<?php endif; ?>-->
<!--                        <form class="subscribe" id="subscribe_newsletter">-->
                            
<!---->


<!--                            <div class="uk-grid-collapse   uk-grid" uk-grid="">-->
<!--                                <div class="uk-width-expand@s uk-first-column">-->

<!--                                    <div class="uk-search uk-search-default uk-width-1-1">-->
<!--                                        <input class="uk-input" type="email" name="email" placeholder="Enter email"-->
<!--                                               required>-->
<!--                                    </div>-->
<!--                                    -->

<!--                                </div>-->
<!--                                <div class="uk-width-auto@s">-->
<!--                                    <button class="uk-button uk-button-primary uk-width-1-1" type="submit" title="Search">Submit-->
<!--                                    </button>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </form>-->
                    <!--</div>-->

                    <p class="uk-text-small text-white"><?php echo $setting->copyright_text; ?>

                    </p>
                </div>
            </div>
        </div>
    </section>
    <!--  -->
    <!--  -->
    <section class="bg-black   uk-position-relative  uk-section-small footer-border uk-bottom-footer">
        <div class="uk-container">
            <div class="" uk-grid
                uk-scrollspy="cls: uk-animation-slide-left-small; target:div, li, img;  delay: 100; repeat: false;">
                <?php if($footers->count() > 0): ?>
                    <div class="uk-width-expand@m">
                        <ul class="uk-grid uk-text-small" uk-grid>
                            <?php $__currentLoopData = $footers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($row->external_link): ?>
                                <li><a href="<?php echo e($row->external_link); ?>"><?php echo e($row->post_title); ?></a></li>
                                <?php else: ?>
                              <li><a href="<?php echo e(url(geturl($row->uri))); ?>"><?php echo e($row->post_title); ?></a></li>
                              <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <div class="uk-width-auto@m">
                    <div class="uk-child-width-auto uk-flex-left@s uk-flex-center" uk-grid>

                        <?php if($setting->facebook_link): ?>
                            <div>
                                <a class="uk-link uk-icon-button bg-primary text-black" rel="noreferrer"
                                    href="<?php echo e($setting->facebook_link); ?>" uk-icon="icon: facebook;" target="_blank"></a>
                            </div>
                        <?php endif; ?>
                        <?php if($setting->youtube_link): ?>
                            <div>
                                <a class="uk-link uk-icon-button bg-primary text-black" rel="noreferrer"
                                    href="<?php echo e($setting->youtube_link); ?>" uk-icon="icon: youtube;" target="_blank"></a>
                            </div>
                        <?php endif; ?>
                        <?php if($setting->twitter_link): ?>
                            <div>
                                <a class="uk-link uk-icon-button bg-primary text-black" rel="noreferrer"
                                    href="<?php echo e($setting->twitter_link); ?>"   target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 50 50"><path d="M 5.9199219 6 L 20.582031 27.375 L 6.2304688 44 L 9.4101562 44 L 21.986328 29.421875 L 31.986328 44 L 44 44 L 28.681641 21.669922 L 42.199219 6 L 39.029297 6 L 27.275391 19.617188 L 17.933594 6 L 5.9199219 6 z M 9.7167969 8 L 16.880859 8 L 40.203125 42 L 33.039062 42 L 9.7167969 8 z"></path></svg>
                                </a>
                            </div>
                        <?php endif; ?>
                        <?php if($setting->google_plus): ?>
                            <div>
                                <a class="uk-link uk-icon-button bg-primary text-black" rel="noreferrer"
                                    href="<?php echo e($setting->google_plus); ?>" uk-icon="icon: instagram;" target="_blank"></a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  -->
</footer>
<!-- back to top -->
<a href="#" id="BackToTop"  uk-scroll>
   <img src="<?php echo e(asset('themes-assets/images/backtotop.svg')); ?>" alt="<?php echo e($setting->site_name); ?>" />
</a>
<script src="<?php echo e(asset('themes-assets/js/app.js')); ?>"></script>
<script src="<?php echo e(asset('themes-assets/js/captcha.js')); ?>"></script>
<script src="<?php echo e(asset('themes-assets/js/query-youtube.js')); ?>"></script>
<?php echo $__env->yieldContent('scripts'); ?>

<!-- grading -->
<div id="grading" class="uk-modal-container" uk-modal>
    <div class="uk-modal-dialog">
        <button class="uk-modal-close-full uk-close-large" type="button" uk-close></button>
        <div class="uk-modal-header">
            <h3 class="text-primary uk-margin-remove uk-text-bold">Grading</h3>
            <span class="uk-margin-small-top uk-text-medium">Below the different grades shown in the chart are explained
                in more detail.</span>
        </div>
        <div class="uk-modal-body" uk-overflow-auto>
            <div class="uk-grid uk-grid-divider uk-child-width-1-1@m" uk-grid>
                <!--  -->
                <div>
                    <h4 class="text-secondary  uk-text-bold">For Expeditions</h4>
                    <ol>
                        <li><strong>Easy (E): </strong>Climb requires one-day climbs, or a multiday climbs with
                            non-technical elements.</li>
                        <li><strong>Moderate (M):</strong> Either a serious one-day climbs, or a multiday climbs with
                            some technical elements. Requires an average level of physical fitness.</li>
                        <li><strong>Difficult (D):</strong> Multiday climbs with some moderately technical elements.
                            Requires an above average fitness level and high level of stamina.</li>
                        <li><strong>Hard Difficult (HD):</strong> Multiday, Highly technical climb. Requires high level
                            of physical fitness and stamina.</li>
                        <li><strong>Very Difficult (VD):</strong> Multiday, Extremely technical climb. Requires very
                            high level of Physical fitness and stamina.</li>
                    </ol>
                </div>
                <!--  -->
              
            </div>
        </div>
    </div>
</div>

<div id="grading_trek" class="uk-modal-container" uk-modal>
    <div class="uk-modal-dialog">
        <button class="uk-modal-close-full uk-close-large" type="button" uk-close></button>
        <div class="uk-modal-header">
            <h3 class="text-primary uk-margin-remove uk-text-bold">Grading</h3>
            <span class="uk-margin-small-top uk-text-medium">Below the different grades shown in the chart are explained
                in more detail.</span>
        </div>
        <div class="uk-modal-body" uk-overflow-auto>
            <div class="uk-grid uk-grid-divider uk-child-width-1-1@m" uk-grid>

                <div>
                    <h4 class="text-secondary uk-text-bold">For Trekking </h4>
                    <ol>
                        <li><strong>Light:</strong> Light walking and generally level hiking that is good for most
                            fitness levels. During these trips, hill-walking experience is desirable.</li>
                        <li><strong>Moderate:</strong> Trek has various types of moderate to difficult terrain,
                            including rough trails and normally 3 to 5 hours a day. Requires an average to above average
                            fitness level.</li>
                        <li><strong>Moderate+</strong>: High altitude treks above 3000 meters or in fairly difficult
                            terrain- normally 4 to 6 hours a day. Requires an above average fitness level and high level
                            of stamina.</li>
                        <li><strong>Extreme:</strong> These high altitude treks or passes are known to be the most
                            strenuous and has difficult terrain and conditions. These treks may require a degree of
                            mountaineering skills and you capability of carrying on normally at an altitude of 4000-5600
                            meters. Daily walking is 5-8 hours approx.</li>
                    </ol>
                </div>
                <!--  -->
            </div>
        </div>
    </div>
</div>
<!-- end grading -->

<?php if($freviews->count()>0): ?>
<!-- review details -->
<?php $__currentLoopData = $freviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div id="ReviewDetails<?php echo e($loop->iteration); ?>" class="uk-modal" uk-modal>
        <div class="uk-modal-dialog uk-bg-pattern-primary">
            <div class="uk-text-center  uk-padding-remove uk-box-shadow-small">
                <button class="uk-modal-close-default" type="button" uk-close></button>
                <div class="uk-text-center uk-padding-small">
                    <div class="uk-member-img"> 
                     <?php if($row->image): ?>
                    <img src="<?php echo e(asset('images/reviews/'.$row->image)); ?>" alt="" class="uk-border-circle">
                        <?php else: ?>
                    <img src="<?php echo e(asset('themes-assets/images/users.jpg')); ?>" alt="" class="uk-border-circle">
                    <?php endif; ?> 
                     </div>
               <h1 class="uk-h4 uk-margin-remove theme-font-extra-bold">
                       <?php echo e($row->name); ?>

                  </h1>
                  <h1 class="text-primary uk-margin-remove theme-font-medium uk-h4">
                     <?php echo e($row->country); ?> 
                  </h1>
            </div>
                 
            </div>
            <div class="uk-modal-body " uk-overflow-auto>           
                <?php echo $row->review; ?> 
            </div>
            <div class="uk-padding-small"></div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <!-- end review details -->
    <?php endif; ?>
<script type ="text/javascript">
    //subscription//
   $(document).ready(function () {
        $('#subscribe_newsletter').on('submit', function (e) {
            
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        let myform = document.getElementById('subscribe_newsletter');
        let formData = new FormData(myform);
        $.ajax({
            type: 'POST',
            url: '<?php echo e(route('subscribe')); ?>',
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                jQuery.each(data.errors, function (key, value) {
                    toastr.error(value);
                    // hideLoading();
                });
                if (data.status == 'success') {
                   $('.product_filter_result').replaceWith($('.product_filter_result')).html(data.html);
                    toastr.success(data.message);
               
                }
            },
            error: function (a) {
                // hideLoading();
                alert("An error occured while uploading data.\n error code : " + a.statusText);
            }
        });
    });
   }); 
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
   <?php if(count($errors) > 0): ?>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            toastr.error("<?php echo e($error); ?>");
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
  <?php if(Session::has('message')): ?>
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.success("<?php echo e(session('message')); ?>");
  <?php endif; ?>

  <?php if(Session::has('error')): ?>
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.error("<?php echo e(session('error')); ?>");
  <?php endif; ?>
</script>
<script type="text/javascript">
    $('#add_trip_review').on('click', function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();

        let myform = document.getElementById('form_review');
        let formData = new FormData(myform);

        $.ajax({
            type: 'POST',
            url: '<?php echo e(route('add-review')); ?>',
            data: formData,
            contentType: false,
            cache: false,
            processData: false,

            success: function (data) {
                jQuery.each(data.errors, function (key, value) {
                    toastr.error(value);
                    // hideLoading();

                });

                if (data.status == 'success') {
                    document.getElementById("form_review"). reset();
                    toastr.success(data.message);
                    location.reload();
                }
            },
            error: function (a) {
                // hideLoading();
                alert("An error occured while uploading data.\n error code : " + a.statusText);
            }
        });
    });
</script>
</body>
</html><?php /**PATH /home/sevensummittreks/public_html/resources/views/themes/default/common/footer.blade.php ENDPATH**/ ?>