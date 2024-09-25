<?php if($paginator->hasPages()): ?>
    	<div class="pagination-plugin">
		  <ul class="pagination-list">
        <?php if($paginator->onFirstPage()): ?>
            <!--<li class="prev"><span uk-pagination-previous disabled>Prev</span></li>-->
        <?php else: ?>
            <li class="prev"><a href="<?php echo e($paginator->previousPageUrl()); ?>" rel="prev" class="prev page-numbers">Prev</a></li>
        <?php endif; ?>

            
            <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                <?php if(is_string($element)): ?>
                    <li class="page-numbers"><span class="pagination-ellipsis"><span><?php echo e($element); ?></span></span></li>
                <?php endif; ?>

                
                <?php if(is_array($element)): ?>
                    <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($page == $paginator->currentPage()): ?>
                             <li class="page-numbers current"><span><?php echo e($page); ?></span></li>
                        <?php else: ?>
                            <li class="page-numbers current"><a href="<?php echo e($url); ?>" class="page-numbers"><?php echo e($page); ?></a></li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php if($paginator->hasMorePages()): ?>
           <li class="next"> <a class="next page-numbers" href="<?php echo e($paginator->nextPageUrl()); ?>" rel="next">Next</a></li>
        <?php else: ?>
            <!--<li class="next"><span uk-pagination-next disabled>Next</span></li>-->
        <?php endif; ?> 
        </ul>
    </div>
<?php endif; ?><?php /**PATH /home/sevensummittreks/public_html/resources/views/admin/pagination.blade.php ENDPATH**/ ?>