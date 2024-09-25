
<?php $__env->startSection('title', $data->post_type); ?>
<?php $__env->startSection('brief', $data->content); ?>
<?php $__env->startSection('thumbnail', $data->banner); ?>
<?php $__env->startSection('meta_keyword', $data->content); ?>
<?php $__env->startSection('meta_description', $data->content); ?>
<?php $__env->startSection('content'); ?>
    <!-- banner -->

    <section class="uk-cover-container  uk-position-relative   uk-flex uk-flex-middle  uk-background-norepeat uk-background-cover uk-background-top-center" uk-parallax="bgy: -100; easing: -2; " data-src="<?php echo e(asset('uploads/original/'.$data->banner)); ?>"
         uk-height-viewport="expand: true; min-height: 600;" uk-img>
       <div class="uk-overlay-primary  uk-position-cover "></div>
  	<div class="uk-width-1-1 uk-position-z-index uk-margin-large-top">
			<div class="uk-width-1-1 uk-position-relative" style="z-index: 99;">
				<div class="uk-container    uk-position-relative" uk-scrollspy="cls: uk-animation-fade;  delay: 500; repeat: false">
					<div class=" uk-margin-medium ">
                        <h1 class=" uk-text-bolder text-white uk-margin-small"
                            uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 400; repeat: false;"><?php echo e($data->post_type); ?></h1></div>
                    <div class="uk-width-1-2@m uk-margin-top"
                         uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 800; repeat: false;">
                        <p class="text-white uk-text-lead uk-margin-remove"> <?php echo e($data->content); ?> </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end banner -->
    <!-- section   -->

    
    <section class="uk-section-large bg-pattern">
   <div class="uk-container" >
      <!-- contact details -->
      <div class="uk-child-width-1-2@m uk-margin-medium-bottom" uk-grid uk-height-match="target:.uk-same-height" uk-scrollspy="cls: uk-animation-slide-left-small; target: h1, a, h3, div;  delay: 50; repeat: false;">
         <!--  -->
         <div>
            <div class="uk-padding bg-white uk-border-rounded uk-box-shadow-medium uk-same-height">
               <h1 class="uk-h4 f-w-400 ">Location</h1>
               <div class="uk-flex uk-flex-middle"><i class="fa fa-map-marker fa-2x uk-margin-small-right text-primary"></i>  
                     <a href="<?php echo e($setting->google_map); ?>"  target="_blank" class="text-black"><?php echo e($setting->address); ?></a>
                  </div>
            </div>
         </div>
         <!--  -->

          <!--  -->
          <div>
            <div class="uk-padding bg-white uk-border-rounded uk-box-shadow-medium uk-same-height">
               <h1 class="uk-h4 f-w-400 ">Contact at</h1>
               <div class="uk-flex uk-flex-middle"><i class="fa fa-phone fa-2x uk-margin-small-right  text-primary"></i> <a href="tel:<?php echo e($setting->phone); ?>" class="text-black"><?php echo e($setting->phone); ?></a> </div>
            </div>
         </div>
         <!--  -->

                  <!--  -->
                  <div>
            <div class="uk-padding bg-white uk-border-rounded uk-box-shadow-medium uk-same-height">
               <h1 class="uk-h4 f-w-400 ">Email us</h1>
               <div class="uk-flex uk-flex-middle"><i class="fa fa-envelope fa-2x uk-margin-small-right  text-primary"></i> <a href="mailto:<?php echo e($setting->email_primary); ?>" class="text-black"><?php echo e($setting->email_primary); ?></a></div>
            </div>
         </div>
         <!--  -->
         
           <!--  -->
          <div>
            <div class="uk-padding bg-white uk-border-rounded uk-box-shadow-medium uk-same-height">
               <h1 class="uk-h4 f-w-400 ">Post Box No.</h1>
               <div class="uk-flex uk-flex-middle"><i class="fa fa-envelope-open-o fa-2x uk-margin-small-right  text-primary"></i> <a href="tel:<?php echo e($setting->welcome_text); ?>" class="text-black"><?php echo e($setting->welcome_text); ?></a> </div>
            </div>
         </div>
         <!--  -->
          
      </div>
      <!-- end contact details -->


     <div class="bg-light uk-padding uk-padding-remove-top">
     		<div class="uk-text-center">
						 		<h3>Follow us on social media</h3>
						 	</div>
						 <div class="uk-child-width-auto uk-flex-center@s uk-flex-center" uk-grid>
					 <?php if($setting->facebook_link): ?>	 
                  <div>
                     <a class="uk-link uk-icon-button bg-primary text-black" rel="noreferrer" href="<?php echo e($setting->facebook_link); ?>" target="_blank" uk-icon="icon: facebook;"></a>
                  </div>
                  <?php endif; ?>
                   <?php if($setting->youtube_link): ?>
                  <div>
                     <a class="uk-link uk-icon-button bg-primary text-black" rel="noreferrer" href="<?php echo e($setting->youtube_link); ?>" target="_blank" uk-icon="icon: youtube;"></a>
                  </div>
                   <?php endif; ?>
                   <?php if($setting->twitter_link): ?>
                  <div>
                     <a class="uk-link uk-icon-button bg-primary text-black" rel="noreferrer" href="<?php echo e($setting->twitter_link); ?>" target="_blank">
                         <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 24 24"><path d="M 2.3671875 3 L 9.4628906 13.140625 L 2.7402344 21 L 5.3808594 21 L 10.644531 14.830078 L 14.960938 21 L 21.871094 21 L 14.449219 10.375 L 20.740234 3 L 18.140625 3 L 13.271484 8.6875 L 9.2988281 3 L 2.3671875 3 z M 6.2070312 5 L 8.2558594 5 L 18.033203 19 L 16.001953 19 L 6.2070312 5 z"></path></svg></a>
                  </div>
                   <?php endif; ?>
                   <?php if($setting->google_plus): ?>
                  <div>
                     <a class="uk-link uk-icon-button bg-primary text-black" rel="noreferrer" href="<?php echo e($setting->google_plus); ?>" target="_blank" uk-icon="icon: instagram;"></a>
                  </div>
                  <?php endif; ?>
               </div>
     </div>
    
        <!-- form -->
      <div class="uk-padding bg-white uk-border-rounded uk-box-shadow-medium uk-margin-medium-bottom">
    
          <form class="uk-grid" method="post" action="<?php echo e(route('contact-us')); ?>" uk-grid >
                  <input type="hidden" id="g_recaptcha_response" name="g_recaptcha_response">

    		    <?php echo csrf_field(); ?>

    			<div class="uk-width-1-2@s">
    			<label>First Name <span class="text-red">*</span></label>
    			 <input class="uk-input" name="first_name" type="text" placeholder="" >
    				</div>
    			<div class="uk-width-1-2@s">
    			<label>Surname</label>
    			<input class="uk-input" name="surname" type="text" placeholder="">
    				</div>
    			<div class="uk-width-1-2@s">
    			<label>Email <span class="text-red">*</span></label>
    			 <input class="uk-input" name="email" type="email" placeholder="" > </div>
    			<div class="uk-width-1-2@s">
    			<label>Contact Number </label>
    			<input class="uk-input" name="number" type="text" placeholder="" ></div>
    			<div class="uk-width-1-1@s">
    			<label>Adventure Intrested In</label>
    			  <input class="uk-input" name="interest" type="text" placeholder=""></div>
    			<div class="uk-width-1-2@s">
    			<label>Country <span class="text-red">*</span></label>
    				<select class="uk-select" class="uk-select uk-select-search" name="country" >
    					<option value="">Select</option>
    					  <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <option value="<?php echo e($row->country); ?>"><?php echo e($row->country); ?></option>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    				</select>
    			</div>
    			<div class="uk-width-1-2@s">
    			<label>Experience Level</label>
    				 <select name="experience" class="uk-select">
                        <option value="" selected="selected" disabled class="gf_placeholder">Select</option>
                        <option value="Beginner">Beginner</option>
                        <option value="Intermediate">Intermediate</option>
                        <option value="Advanced">Advanced</option>
                         <option value="Excellent">Excellent</option>
                    </select>
    			</div>
    			<div class="uk-width-1-1@s">
    				<label for="Subscribe">
    				  <input type="checkbox" name="subscribe" value="1"  id="Subscribe"> Subscribe to our newsletter</label>
    			</div>
    			<div class="uk-width-1-1@s">
    			  <textarea name="message" class="uk-textarea" rows="5" placeholder="Message" spellcheck="false"></textarea>
    			</div>
    
    				<div class="uk-width-1-1@s">
    			 <button class="uk-button uk-button-primary" type="submit">Submit</button>
    			</div>
    			
    			<div class="uk-width-1-1@s uk-text-small"> <i><span class="text-red">*</span> All Fields Required</i> </div>
    		</form>
      </div>
      <!-- form end -->
      <!-- map -->
      <div class="uk-margin-medium-top"><?php echo $setting->google_map2; ?> </div>
      <!-- end map -->
   </div>
</section>
    <!-- section  -->

    <!--  -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="https://www.google.com/recaptcha/api.js?render=<?php echo e(env('SITE_KEY')); ?>"></script>
    <script>
        grecaptcha.ready(function () {
            grecaptcha.execute('<?php echo env("SITE_KEY"); ?>', {action: 'homepage'}).then(function (token) {
                document.getElementById('g_recaptcha_response').value = token;
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('themes.default.common.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sevensummittreks/public_html/resources/views/themes/default/templateposttype-contact.blade.php ENDPATH**/ ?>