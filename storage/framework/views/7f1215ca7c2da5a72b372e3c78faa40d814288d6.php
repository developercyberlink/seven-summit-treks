<?php $__env->startSection('title', Request::segment(2)); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <button type="button" class="btn btn-default btn-sm backlink"><i class="fa fa-angle-double-left" aria-hidden="true"></i>
        Back </button>
    <a href="<?php echo e(route('admin.post.index', Request::segment(2))); ?>" class="btn btn-default btn-sm backlink"><i
            class="fa fa-list" aria-hidden="true"></i> Show List </a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <form class="form-horizontal" role="form" action="<?php echo e(route('admin.post.store', Request::segment(2))); ?>" method="post"
        enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>


        <div class="col-md-9">
            <!-- Input Fields -->
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">New Post</span>
                </div>
                <div class="panel-body">
                   
        <input type="hidden" name="post_type" value="<?php echo e(Request::segment(2)); ?>" />
        <div class="form-group">
          <label for="inputStandard" class="col-lg-2 control-label">Title</label>
          <div class="col-lg-9">
            <div class="bs-component">
              <input type="text" id="post_title" name="post_title" class="form-control" placeholder="" />
              <input type="hidden" id="uri" name="uri" class="form-control" placeholder="" />
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="inputStandard" class="col-lg-2 control-label">Sub Title</label>
          <div class="col-lg-9">
            <div class="bs-component">
              <input type="text" id="" name="sub_title" class="form-control" placeholder="" />
            </div>
          </div>
        </div>
      <div class="form-group">
          <label class="col-lg-2 control-label" for="textArea3"> Associated Title  </label>
          <div class="col-lg-9">
            <div class="bs-component">
             <textarea class="my-editor form-control" id="textArea3" name="associated_title" rows="3"></textarea>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="inputSelect" class="col-lg-2 control-label"> Category </label>
          <div class="col-lg-9">
            <div class="bs-component">
              <select name="category" class="form-control">
                <option value="0"> Select Category </option>
                <?php if($category): ?>
                <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($row->id); ?>"> <?php echo e($row->category); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
              </select>
              <div id="source-button" class="btn btn-primary btn-xs" style="display: none;">&lt; &gt;</div></div>
            </div>
          </div>

          <div class="form-group">
            <label for="inputSelect" class="col-lg-2 control-label">Select Parent</label>
            <div class="col-lg-9">
              <div class="bs-component">
                <select name="post_parent" class="form-control">
                  <option value="0"> Choose Parent </option>
                  <?php if($parent_post->count() > 0): ?>
                      <?php $__currentLoopData = $parent_post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($row->id); ?>"><?php echo e($row->post_title); ?></option>
                      <?php if(check_child($row->id)): ?>
                          <?php $__currentLoopData = has_child_post($row->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child_row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($child_row->id); ?>"> —> <?php echo e($child_row->post_title); ?></option>
                            <?php if(check_child($child_row->id)): ?>
                            <?php $__currentLoopData = has_child_post($child_row->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grand_child_row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($grand_child_row->id); ?>"> — —> <?php echo e($grand_child_row->post_title); ?></option>
                                <?php if(check_child($grand_child_row->id)): ?>
                                    <?php $__currentLoopData = has_child_post($grand_child_row->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grand_child_row_x): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($grand_child_row_x->id); ?>"> — — —> <?php echo e($grand_child_row_x->post_title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>                                             
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php endif; ?>                                                 
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>                                                  
                </select>
                <div id="source-button" class="btn btn-primary btn-xs" style="display: none;">&lt; &gt;</div></div>
              </div>
            </div>

            <div class="form-group">
              <label class="col-lg-2 control-label" for="textArea3"> Brief </label>
              <div class="col-lg-9">
                <div class="bs-component">
                  <textarea class="my-editor form-control" id="" name="post_excerpt" rows="9"></textarea>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-2 control-label" for="textArea2">Content</label>
              <div class="col-lg-10">
                <div class="bs-component">
                  <textarea class="my-editor form-control" id="" name="post_content" rows="15"></textarea>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="inputStandard" class="col-lg-2 control-label">Meta Key</label>
              <div class="col-lg-9">
                <div class="bs-component">
                  <input type="text" id="" name="meta_keyword" class="form-control" placeholder="" />
                </div>
              </div>
            </div>

            <div class="form-group">
              <label class="col-lg-2 control-label" for="textArea3"> Meta Description </label>
              <div class="col-lg-9">
                <div class="bs-component">
                  <textarea class="form-control" id="textArea3" name="meta_description" rows="3"></textarea>
                </div>
              </div>
            </div>
            

        <div class="form-group">
              <label for="inputStandard" class="col-lg-2 control-label"> External Link </label>
              <div class="col-lg-9">
                <div class="bs-component">
                  <input type="text" id="" name="external_link" class="form-control" placeholder="http://example.com" /> <br/>
                  Example: http://www.example.com / https://www.example.com
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="admin-form">
          <div class="sid_bvijay mb10">
            <div class="hd_show_con">
              <div class="publice_edi">
                Status: <a href="avoid:javascript;" data-toggle="collapse" data-target="#publish_1">Active</a>
              </div>
            </div>
            <footer>
              <div id="publishing-action">
                <input type="submit" class="btn btn-primary btn-sm" value="Publish" />
              </div>
              <div class="clearfix"></div>
            </footer>
            <div class="clearfix"></div>
          </div>
            <div class="sid_bvijay mb10">
                  <label class="field text">
                    <input type="date" id="inputStandard" name="post_date" class="form-control" />   
                  </label>
                </div>

          <div class="sid_bvijay mb10">
            <label class="field select">
              <select id="template" name="template">
                <?php $__currentLoopData = $templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($key); ?>"><?php echo e(ucfirst($template)); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
              <i class="arrow"></i>
            </label>
          </div>

           <div class="sid_bvijay mb10">
            <label class="field select">
              <select id="template_child" name="template_child">
                <?php $__currentLoopData = $templates_child; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $template_child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($key); ?>"><?php echo e(ucfirst($template_child)); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
              <i class="arrow"></i>
            </label>
          </div>

          <div class="sid_bvijay mb10">
            <label class="field text">
              <input type="number" id="" name="post_order" class="form-control" placeholder="Post Order" value="<?php echo e($post_order); ?>" />
            </label>
          </div>

          <div class="sid_bvijay mb10">
            <div class="hd_show_con">
              Show project in home
              <input type="checkbox" name="show_in_home" value="1" />
            </div>
          </div>

           <div class="sid_bvijay mb10">
            <h4>Page Banner </h4>
            <div class="hd_show_con">
              <div id="xedit-demo">
               <input type="file" name="page_banner" />
             </div>
              <small>(width: 2000px height: 1245px)</small>
           </div>
         </div>

          <div class="sid_bvijay mb10">
            <h4> Thumbnail </h4>
            <div class="hd_show_con">
              <div id="xedit-demo">
               <input type="file" name="page_thumbnail" />
             </div>
             <small>(width: 1600px height: 1200px)</small>
           </div>
         </div>

       </div>

     </div>
   </form>
   <?php $__env->stopSection(); ?>
   <?php $__env->startSection('scripts'); ?>
                                   <script type="text/javascript">
                                    $(document).ready(function(){
                                      $('#post_title').on('keyup',function(){
                                        var post_title;
                                        post_title = $('#post_title').val();
                                        post_title=post_title.replace(/[^a-zA-Z0-9 ]+/g,"");
                                        post_title=post_title.replace(/\s+/g, "-");
                                        $('#uri').val(post_title);
                                      });
                                    });

                                // Go back link
                                $('.backlink').click(function(){
                                  var url = '<?= url()->previous() ?>';
                                  window.location=url;
                                });

                                  </script>
  <?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sevensummittreks/public_html/resources/views/admin/posts/create.blade.php ENDPATH**/ ?>