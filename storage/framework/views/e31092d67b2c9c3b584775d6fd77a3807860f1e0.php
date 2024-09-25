<?php $__env->startSection('title', Request::segment(2)); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <a href="<?php echo e(route('admin.post.index', Request::segment(2))); ?>" class="btn btn-primary btn-sm">List</a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <form class="form-horizontal" role="form" action="<?php echo e(url('admin/' . Request::segment(2) . '/' . $data->id)); ?>"
        method="post" enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>

        <input type="hidden" name="_method" value="PUT" />
        <input type="hidden" name="post_type" value="<?php echo e(Request::segment(2)); ?>" />
    <div class="col-md-9">
            <!-- Input Fields -->
            <div class="panel">
              <div class="panel-heading">
                <span class="panel-title">Edit Post</span>
              </div>
              <div class="panel-body">                  
                <div class="form-group">
                  <label for="inputStandard" class="col-lg-2 control-label">Title</label>
                  <div class="col-lg-9">
                    <div class="bs-component">
                      <input type="text" id="post_title" name="post_title" class="form-control" value="<?php echo e($data->post_title); ?>" />
                      <input type="hidden" id="uri" name="uri" class="form-control" value="<?php echo e($data->uri); ?>" />
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputStandard" class="col-lg-2 control-label">Sub Title</label>
                  <div class="col-lg-9">
                    <div class="bs-component">
                      <input type="text" id="inputStandard" name="sub_title" class="form-control" value="<?php echo e($data->sub_title); ?>"  />
                    </div>
                  </div>
                </div>
            
                <div class="form-group">
                  <label class="col-lg-2 control-label" for="textArea3"> Associated Title  </label>
                  <div class="col-lg-9">
                    <div class="bs-component">
                    <textarea class="my-editor form-control" id="textArea3" name="associated_title" rows="3"> <?php echo e($data->associated_title); ?></textarea>

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
                        <option value="<?php echo e($row->id); ?>" <?php echo e($row->id == $data->post_category ? 'selected' : ''); ?>> <?php echo e($row->category); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                        <?php endif; ?> 
                      </select>
                      <div id="source-button" class="btn btn-primary btn-xs" style="display: none;">&lt; &gt;</div></div>
                    </div>
                  </div>
                
          <?php if($parent_post->count() > 0): ?>
                  <div class="form-group">
                    <label for="inputSelect" class="col-lg-2 control-label">Select Parent</label>
                    <div class="col-lg-9">
                      <div class="bs-component">
                        <select name="post_parent" class="form-control">
                          <option value="0"> Choose Parent </option>
                            <?php $__currentLoopData = $parent_post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <?php if($row->id == $data->id): ?>
                              <?php continue; ?>
                            <?php endif; ?>
                          <option value="<?php echo e($row->id); ?>" <?php echo e($row->id == $data->post_parent ? 'selected' : ''); ?>><?php echo e($row->post_title); ?></option>

                          <?php if(check_child_post($row->id)): ?>
                              <?php $__currentLoopData = has_child_post($row->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child_row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($child_row->id); ?>" <?php echo e($child_row->id == $data->post_parent ? 'selected' : ''); ?>> —> <?php echo e($child_row->post_title); ?></option>
                             
                              <?php if(check_child_post($child_row->id)): ?>
                                  <?php $__currentLoopData = has_child_post($child_row->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grand_child_row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($grand_child_row->id); ?>" <?php echo e($grand_child_row->id == $data->post_parent ? 'selected' : ''); ?>> — —> <?php echo e($grand_child_row->post_title); ?></option>
                                  <?php $__currentLoopData = has_child_post($grand_child_row->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grand_child_row_x): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option value="<?php echo e($grand_child_row_x->id); ?>" <?php echo e($grand_child_row_x->id == $data->post_parent ? 'selected' : ''); ?>> — — —> <?php echo e($grand_child_row_x->post_title); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              <?php endif; ?>                            

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          <?php endif; ?>
                            
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <div id="source-button" class="btn btn-primary btn-xs" style="display: none;">&lt; &gt;</div></div>
                      </div>
                    </div>
                    <?php endif; ?>            

                    <div class="form-group">
                      <label class="col-lg-2 control-label" for="textArea3"> Brief </label>
                      <div class="col-lg-9">
                        <div class="bs-component">
                          <textarea class="my-editor form-control" id="textArea3" name="post_excerpt" rows="9"> <?php echo e($data->post_excerpt); ?></textarea>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-lg-2 control-label" for="textArea2">Content</label>
                      <div class="col-lg-10">
                        <div class="bs-component">
                          <textarea class="my-editor form-control " id="editor2" name="post_content" rows="15"> <?php echo e($data->post_content); ?></textarea>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputStandard" class="col-lg-2 control-label">Meta Key</label>
                      <div class="col-lg-9">
                        <div class="bs-component">
                          <input type="text" id="inputStandard" name="meta_keyword" class="form-control" value="<?php echo e($data->meta_keyword); ?>" />
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-lg-2 control-label" for="textArea3"> Meta Description </label>
                      <div class="col-lg-9">
                        <div class="bs-component">
                          <textarea class="form-control" id="textArea3" name="meta_description" rows="3"><?php echo e($data->meta_description); ?></textarea>
                        </div>
                      </div>
                    </div> 

                    <div class="form-group">
                      <label for="inputStandard" class="col-lg-2 control-label"> External Link </label>
                      <div class="col-lg-9">
                        <div class="bs-component">
                          <input type="text" id="" name="external_link" class="form-control" value="<?php echo e($data->external_link); ?>" /> <br>
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
                        <input type="submit" class="btn btn-primary btn-sm" value="Update" />
                      </div>
                      <div class="clearfix"></div>
                    </footer>
                    <div class="clearfix"></div>
                  </div>
                      <div class="sid_bvijay mb10">
                  <label class="field text">
                    <input type="date" id="inputStandard" name="post_date" class="form-control" value="<?php echo e($data->post_date); ?>" />   
                  </label>
                </div>
                  <div class="sid_bvijay mb10">
                    <label class="field select">
                      <select id="template" name="template">
                        <?php $__currentLoopData = $templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($key); ?>" <?php echo e($template == $data->template ? 'selected' : ''); ?> ><?php echo e(ucfirst($template)); ?> </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                      <i class="arrow"></i>
                    </label>
                  </div>   

                  <div class="sid_bvijay mb10">
                    <label class="field select">
                      <select id="template_child" name="template_child">
                        <?php $__currentLoopData = $templates_child; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $template_child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($key); ?>" <?php echo e($template_child == $data->template_child ? 'selected' : ''); ?> ><?php echo e(ucfirst($template_child)); ?> </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                      <i class="arrow"></i>
                    </label>
                  </div>   

                  <div class="sid_bvijay mb10">
                  <label class="field text">
                    <input type="number" id="inputStandard" name="post_order" class="form-control" placeholder="Post Order" value="<?php echo e($data->post_order); ?>" />   
                  </label>
                </div>

                <div class="sid_bvijay mb10">
                  <div class="hd_show_con">
                      Show project in home                        
                    <input type="checkbox" name="show_in_home" value="<?php echo e($data->show_in_home); ?>" <?php echo e($data->show_in_home == 1 ? 'checked' : ''); ?> /> 
                  </div>
                </div>

                <div class="sid_bvijay mb10">
                  <h4> Page Banner </h4>
                    <div class="hd_show_con">
                    <div id="xedit-demo">
                      <?php if($data->page_banner): ?>
                      <span class="banner<?php echo e($data->id); ?>">
                      <a href="#<?php echo e($data->id); ?>" class="bannerdelete">X</a>
                      <img src="<?php echo e(asset(env('PUBLIC_PATH') . 'uploads/banners/' . $data->page_banner)); ?>" width="150" />
                      <hr>
                      </span>             
                      <?php endif; ?>                       
                      <input type="file" name="page_banner" />
                    </div>
                    <small>(width: 2000px height: 1200px)</small>
                  </div>
                </div>

                  <div class="sid_bvijay mb10">
                  <h4> Thumbnail </h4>
                    <div class="hd_show_con">
                    <div id="xedit-demo">
                      <?php if($data->page_thumbnail): ?>
                      <span class="id<?php echo e($data->id); ?>">
                      <a href="#<?php echo e($data->id); ?>" class="imagedelete">X</a>
                      <img src="<?php echo e(asset(env('PUBLIC_PATH') . 'uploads/medium/' . $data->page_thumbnail)); ?>" width="150" />
                      <hr>
                      </span>             
                      <?php endif; ?>                       
                      <input type="file" name="page_thumbnail" />
                    </div>
                     <small>(width: 1600px height: 1200px)</small>
                  </div>
                </div>

              </div>        
            </div>
          </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('libraries'); ?>
          <script type="text/javascript">
            $('.imagedelete').on('click',function(e){
            e.preventDefault();
            if(!confirm('Are you sure to delete?')) return false;
            var csrf = $('meta[name="csrf-token"]').attr('content');
            var str = $(this).attr('href');
            var id = str.slice(1);
            $.ajax({
              type:'delete',
              url:"<?php echo e(url('delete_post_thumb') . '/'); ?>" + id,
              data:{_token:csrf},    
              success:function(data){ 
                $('span.id' + id ).remove();
              },
              error:function(data){  
              alert(data + 'Error!');     
              }
            });
          });

          $('.bannerdelete').on('click',function(e){
            e.preventDefault();
            if(!confirm('Are you sure to delete?')) return false;
            var csrf = $('meta[name="csrf-token"]').attr('content');
            var str = $(this).attr('href');
            var id = str.slice(1);
            $.ajax({
              type:'delete',
              url:"<?php echo e(url('delete_banner_thumb') . '/'); ?>" + id,
              data:{_token:csrf},    
              success:function(data){ 
                $('span.banner' + id ).remove();
              },
              error:function(data){  
              alert(data + 'Error!');     
              }
            });
          });                                                  
          
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

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sevensummittreks/public_html/resources/views/admin/posts/edit.blade.php ENDPATH**/ ?>