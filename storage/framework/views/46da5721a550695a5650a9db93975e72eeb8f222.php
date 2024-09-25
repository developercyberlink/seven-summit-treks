<div class="uk-width-auto@m w-350" uk-visible@m>
    <div class="  uk-clearfix" style="z-index: 9;" uk-sticky="offset: 150; bottom: #uk-stop-sticky;">
       	<?php if($book_sidebar->count()>0): ?>
        <!--  -->
        <div>
            <div class="uk-card uk-card-default uk-margin">
                <h5 class="uk-margin-remove uk-text-center uk-text-uppercase bg-primary uk-text-bold text-white uk-padding-small ">
                   Useful Info</h5>

                <div class="uk-card-body uk-padding-small">
                    <ul class="uk-list  uk-list-divider">
                        	<?php $__currentLoopData = $book_sidebar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <a href="<?php echo e(url('info/'.$row->uri)); ?>">
                               <?php echo e($row->page_type); ?>

                            </a>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>
        <!--  -->
        <?php endif; ?>
    </div>
    <!--  -->
</div>
<?php /**PATH /home/sevensummittreks/public_html/resources/views/themes/default/common/booking-sidebar.blade.php ENDPATH**/ ?>