    <div class="uk-width-auto@m w-350" uk-scrollspy="cls: uk-animation-slide-left-small; target:  li, img, p, h1, tr;  delay: 50; repeat: false;">
    <div class="  uk-clearfix" style="z-index: 1;" uk-sticky="media: 640; offset: 130; bottom: #uk-stop-sticky; ">
         
        <!--  -->
        <?php if($highlights->count()>0): ?>
        <div>
            <div class="uk-trip-highlights uk-margin ">
                <div class="uk-trip-highlights-header">
                    <h1 class="uk-h5 uk-margin-remove uk-text-center uk-text-uppercase uk-text-bold togglecontent uk-link" href="#togglecontent" uk-toggle="target: .togglecontent; animation: uk-animation-fade"  >Highlight Of Trip  <span class="uk-icon uk-scrollspy-inview uk-animation-slide-right fa fa-angle-down"  uk-scrollspy="cls: uk-animation-slide-right;   delay: 400; repeat: false;" ></span></h1>
                    <h1 class="uk-h5 uk-margin-remove uk-text-center uk-text-uppercase uk-text-bold togglecontent uk-link" href="#togglecontent" uk-toggle="target: .togglecontent; animation: uk-animation-fade"  hidden>Highlight Of Trip <span class="uk-icon uk-scrollspy-inview uk-animation-slide-right fa fa-angle-up"   uk-scrollspy="cls: uk-animation-slide-right;   delay: 400; repeat: false;" ></span></h1>
                </div>
                <div class="uk-trip-highlights-body togglecontent" hidden id="togglecontent">
                    <ul class="uk-highlights-list">
                         <?php $__currentLoopData = $highlights; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($row->title); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <!--  -->
        <!--  -->
         <div class="uk-margin-bottom bg-black-light text-white uk-padding uk-box-shadow-small">

            <div> 
            <a href="#inquire-now" uk-toggle class="uk-button uk-button-white uk-width-1-1 uk-margin-bottom">
            <!--<a href="<?php echo e(route('page.posttype_detail','contact-us')); ?>" class="uk-button uk-button-white uk-width-1-1 uk-margin-bottom">-->
                    Inquiry
                    <span class="uk-icon " uk-icon="icon:arrow-right; ratio: 1.5"
                        uk-scrollspy="cls: uk-animation-slide-right; delay: 400; repeat: false;"></span>
                </a> </div>
            <div> <a href="<?php echo e(route('random-trip',$data->uri)); ?>" class="uk-button uk-button-primary uk-width-1-1  "> Book Now
                    <span class="uk-icon " uk-icon="icon:arrow-right; ratio: 1.5"
                        uk-scrollspy="cls: uk-animation-slide-right; delay: 400; repeat: false;"></span>
                </a> </div>
        </div>
        <!--  -->
        <!--  -->
        <!--  -->
        <!--    <?php if($first_team->count()>0): ?>-->
        <!--  -->
        <!--<div>-->
        <!--    <div class="uk-card uk-card-default uk-margin">-->
        <!--        <h5 class="uk-margin-remove uk-text-center uk-text-uppercase bg-primary uk-text-bold text-white uk-padding-small ">-->
        <!--            Our Travel Specialist</h5>-->

        <!--        <div class="uk-card-body uk-padding-small">-->
        <!--            <ul class="uk-list  uk-list-divider">-->
        <!--                    <?php $__currentLoopData = $first_team; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
        <!--                <li>-->
        <!--                    <a class="uk-display-block" href="<?php echo e(url('team/'.$team->uri.'/'.$row->uri)); ?>">-->
        <!--                        <div class="uk-grid uk-flex-middle uk-grid-small">-->
        <!--                            <div class="uk-width-1-4">-->
        <!--                                <div class="uk-media-60">-->
        <!--                                     <?php if($row->thumbnail): ?>-->
        <!--                                    <img src="<?php echo e(asset(env('PUBLIC_PATH').'uploads/team/' . $row->thumbnail)); ?>" alt="" class="uk-border-circle">-->
        <!--                                    <?php else: ?>-->
        <!--                                    <img src="<?php echo e(asset(env('PUBLIC_PATH').'themes-assets/images/users.jpg')); ?>" alt="" class="uk-border-circle">-->
        <!--                                    <?php endif; ?>-->
        <!--                                </div>-->
        <!--                            </div>-->
        <!--                            <div class="uk-width-expand">-->
        <!--                                <h5 class="text-primary theme-font-medium  uk-margin-remove "><?php echo e($row->name); ?></h5>-->
        <!--                                <span class="text-black uk-text-small uk-margin-remove theme-font-italic">-->
        <!--                                    <?php echo e($row->email); ?></span>-->
        <!--                            </div>-->
        <!--                        </div>-->
        <!--                    </a>-->
        <!--                </li>-->
        <!--                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
        <!--            </ul>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
        <!--  -->
        <!--<?php endif; ?>-->
        <!--  -->
    </div>
    <!--  -->
</div><?php /**PATH /home/sevensummittreks/public_html/resources/views/themes/default/common/sidebar-trip.blade.php ENDPATH**/ ?>