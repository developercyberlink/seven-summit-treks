<?php
use App\Http\Controllers\PaymentRequestController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */
 Route::middleware(['throttle:60,1'])->group(function () {
Route::get('/', 'FrontendControllers\FrontpageController@index');
// Auth::routes();
/* Authentication Routes... */
Route::get('adminisclient', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('adminisclient', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::redirect('/dashboard', '/admin/dashboard', 301);

// captcha
Route::get('fixed-tripbooking/{uri?}/{value1?}/{value2?}/bookingcaptcha', 'CaptchaController@refreshCaptcha');
Route::get('contactcaptcha', 'CaptchaController@contactCaptcha');
Route::get('tripbooking/{uri?}/allbookingcaptcha', 'CaptchaController@corporateCaptcha');
Route::get('fixed-tripbooking/{uri?}/{value1?}/{value2?}/bookingcaptcha', 'CaptchaController@refreshCaptcha');
Route::get('bookatripcaptcha', 'CaptchaController@contactCaptcha');
Route::get('page/{uri}/tripcaptcha', 'CaptchaController@corporateCaptcha');
Route::get('trip-inquiry/tripcaptcha', 'CaptchaController@corporateCaptcha');
Route::get('fixed-inquiry/tripcaptcha', 'CaptchaController@corporateCaptcha');
Route::get('reviews.html/tripcaptcha', 'CaptchaController@corporateCaptcha');   

//HBL PAYMENT
Route::get('payment', 'FrontendControllers\FrontpageController@paymentBooking')->name('make-payment');
Route::post('book-pay-now', 'FrontendControllers\FrontpageController@savePaynowBook')->name('paynow.book');
Route::post('payment-request', [PaymentRequestController::class, 'paymentRequest'])->name('paynowbook');
Route::get('/hbl-redirect/',[PaymentRequestController::class, 'paymentStatus']);


//================== Frontend Routes=================//
Route::get('banners', 'FrontendControllers\FrontpageController@banners');

Route::get('unsubscribe', 'FrontendControllers\FrontpageController@unsubscribe')->name('unsubscribe'); 
Route::post('unsubscribe', 'FrontendControllers\FrontpageController@unsubscribe')->name('unsubscribe');
Route::post('subscribe', 'FrontendControllers\FrontpageController@subscribe')->name('subscribe');
Route::get('/verify/{token}', 'FrontendControllers\FrontpageController@verifyUser')->name('verify-user');
Route::get('/contact-verify/{token}', 'FrontendControllers\FrontpageController@verifyContact')->name('verify-contact');

Route::post('trip-review', 'FrontendControllers\ReviewController@add_review')->name('add-review');

// Normal Pages
Route::get('{uri}.html', 'FrontendControllers\FrontpageController@pagedetail')->name('page.pagedetail');
Route::get('type-{uri}', 'FrontendControllers\FrontpageController@posttype_detail')->name('page.posttype_detail');
Route::get('page-{parenturi}/{uri}.html', 'FrontendControllers\FrontpageController@pagedetail_child')->name('page.pagedetail_child');
Route::get('{parenturi}/apply/{uri}.html', 'FrontendControllers\FrontpageController@apply');
Route::post('page/apply/applyjob', 'FrontendControllers\FrontpageController@career_apply_action')->name('career-apply-action');
Route::get('page/destinations/{country?}', 'FrontendControllers\FrontpageController@destinations')->name('page.destinations');
Route::get('page/trekkings', 'FrontendControllers\FrontpageController@trekkings')->name('page.trekkings');
Route::get('page/activities/{uri}', 'FrontendControllers\FrontpageController@activities')->name('page.activities');
Route::get('trip-videos/{uri}', 'FrontendControllers\FrontpageController@trip_videos')->name('trip.tripvideos');

// Circular routes
Route::get('/customer/changepassword', 'FrontendControllers\CustomerRegisterController@changepassword')->name('customer.changepassword');
Route::put('/customer/changepassword', 'FrontendControllers\CustomerRegisterController@changepassword_action')->name('customer.changepassword_action');
Route::get('/customer/dashboard', 'FrontendControllers\CustomerRegisterController@customer_dashboard')->name('customer.customer_dashboard');
Route::get('/circular/detail/{uri}', 'FrontendControllers\CustomerRegisterController@circular_detail')->name('circular.detail');

Route::get('page/employeelogin', 'FrontendControllers\CustomerRegisterController@employeelogin')->name('page.employeelogin');
Route::post('page/employeelogin', 'FrontendControllers\CustomerRegisterController@employeelogin_action')->name('page.employeelogin_action');

Route::get('page/password-recover', 'FrontendControllers\CustomerRegisterController@password_recover')->name('page.password-recover');
Route::get('/employeelogout', 'FrontendControllers\CustomerRegisterController@employeelogout')->name('page.employeelogout');

Route::post('/newsletter/newsletter-signup', 'FrontendControllers\NewsletterSignupController@store')->name('newsletter-signup');
Route::post('/dwn/dwnpdf', 'FrontendControllers\NewsletterSignupController@dwnpdf')->name('dwnpdf');
Route::get('/dwn/dwnform/{key_string}', 'FrontendControllers\NewsletterSignupController@dwnform')->name('dwnform');

// Trip Pages
Route::get('page/{uri}.html', 'FrontendControllers\FrontpageController@tripdetail')->name('page.tripdetail');
Route::get('activity/{uri}.html', 'FrontendControllers\FrontpageController@travellist')->name('page.travellist');
Route::get('region/{uri}.html', 'FrontendControllers\FrontpageController@regionlist')->name('page.regionlist');
Route::get('expedition/{uri}.html', 'FrontendControllers\FrontpageController@expeditionlist')->name('page.expeditionlist');
// Route::get('news/{uri}.html', 'FrontendControllers\FrontpageController@newsdetail')->name('page.newsdetail');
Route::get('category/{uri}.html', 'FrontendControllers\FrontpageController@categorydetail')->name('page.categorydetail');
Route::get('weather-report/{uri}', 'FrontendControllers\FrontpageController@weather_report')->name('weather-report');
Route::get('faq/{tripuri}', 'FrontendControllers\FrontpageController@faq')->name('faq');
Route::get('trip-itinerary/{trip_id}/{trip_category}', 'FrontendControllers\FrontpageController@trip_itinerary')->name('trip-itinerary');
   Route::get('trip-cost-inc/{trip_id}/{trip_category}', 'FrontendControllers\FrontpageController@trip_cost_inc')->name('trip-cost-inc');
Route::get('trip-itinerary/{trip_id}/', 'FrontendControllers\FrontpageController@trip_itinerary_default')->name('trip-itinerary-default');
Route::get('faq-search/{trip_id}/', 'FrontendControllers\FrontpageController@faq_search')->name('trip.faqsearch');
Route::match( ['get', 'post'],'trip_search', 'FrontendControllers\FrontpageController@trip_search')->name('trip-search');

Route::resource('trip.booking', 'FrontendControllers\BookingController');

Route::post('customizetrip/{uri}', 'FrontendControllers\FrontpageController@customizetrip');
Route::post('success/customizetrip-action', 'FrontendControllers\FrontpageController@customizetrip_action')->name('customizetrip-action');

Route::get('fixed-tripbooking/{uri?}/{value1?}/{value2?}', 'FrontendControllers\FrontpageController@tripbooking')->name('book-trip');
Route::get('tripbooking/{uri?}', 'FrontendControllers\FrontpageController@random_tripbooking')->name('random-trip');
Route::get('book-a-trip.html/', 'FrontendControllers\FrontpageController@all_tripbooking')->name('all-trip');
Route::post('trip-booking', 'FrontendControllers\FrontpageController@post_tripbooking')->name('post-trip');
Route::post('all-booking', 'FrontendControllers\FrontpageController@post_allbooking')->name('post-alltrip');

//Inquiry routes
Route::post('trip-inquiry','FrontendControllers\FrontpageController@post_inquiry')->name('post-inquiry');
//
//Contact routes//
Route::post('contact-us','FrontendControllers\FrontpageController@contact_us')->name('contact-us');

//Travel Guide Routes
Route::get('travel-guide/{uri}','FrontendControllers\GuideController@travel_guide')->name('trip-guide');
Route::get('trip-insurance/{uri}','FrontendControllers\GuideController@trip_insurance')->name('trip-insurance');
Route::get('payments/{uri}','FrontendControllers\GuideController@payments')->name('payment');
//end

Route::get('posttype/{posttype_uri}', 'FrontendControllers\FrontpageController@posttype_page');

// Send Mail
Route::post('page/contact/sendmail', 'FrontendControllers\FrontpageController@sendmail')->name('sendmail');
Route::post('page/contact/contact-sendmail', 'FrontendControllers\FrontpageController@sendmail_contact')->name('sendmail_contact');
Route::get('newslist', 'FrontendControllers\FrontpageController@newslist')->name('newslist');
Route::get('page/customize-trip', 'FrontendControllers\FrontpageController@customize_trip');
Route::post('page/customize-trip', 'FrontendControllers\FrontpageController@customize_trip')->name('customize-trip');

Route::get('page/customize-trip2', 'FrontendControllers\FrontpageController@customize_trip2');
Route::post('page/customize-trip2', 'FrontendControllers\FrontpageController@customize_trip2')->name('customize-trip2');

Route::get('page/client_reviews', 'FrontendControllers\FrontpageController@client_reviews')->name('client_reviews');
Route::post('page/contentsearch', 'FrontendControllers\FrontpageController@content_search')->name('page.content_search');

Route::get('page/submit-inquiry', 'FrontendControllers\FrontpageController@submitinquiry');
// Route::post('page/submit-inquiry','FrontendControllers\FrontpageController@sendmail_inquiry')->name('sendinquiry');
Route::post('page/submit-inquiry', 'FrontendControllers\InquiryController@inquiry')->name('inquiry');
//subir
Route::get('team/{uri}','FrontendControllers\FrontpageController@teamlist')->name('team.teamlist');
Route::get('team/{parenturi}/{uri}','FrontendControllers\FrontpageController@teamdetail')->name('team.teamdetail');

Route::get('info/{uri}','FrontendControllers\FrontpageController@usefulInfo')->name('info.list');
Route::get('info/{parenturi}/{uri}','FrontendControllers\FrontpageController@usefulInfoDetails')->name('info.details');

     
 
     
 });
//subir
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
//================================= Backend Routes ============================//
Route::middleware(['auth'])->group(function () {
    
             // newsletter routes
    Route::group(['prefix' => 'admin'], function () {


    Route::get('send-newsletter', 'SendMailController@index')->name('send.newsletter');
    Route::post('users-send-email', 'SendMailController@sendEmail')->name('ajax.send.email');
    Route::post('newsletters', 'SendMailController@newsletter')->name('newsletter.submit');
    Route::get('newsletter-index', 'SendMailController@newsindex')->name('newsletter.index');
    Route::get('newsletter-edit/{id?}', 'SendMailController@newsedit')->name('newsletter.edit');
    Route::post('newsletter-edit/{id?}', 'SendMailController@newsedit')->name('newsletter.edit');
    Route::get('newsletter-delete/{id?}', 'SendMailController@newsdelete')->name('newsletter.delete');
    Route::get('subscriber-create', 'SendMailController@usercreate')->name('subscriber.create');
    Route::post('subscriber-create', 'SendMailController@usercreate')->name('subscriber.submit');
    Route::get('subscriber-index', 'SendMailController@userindex')->name('subscriber.index');
    Route::get('subscriber-edit/{id?}', 'SendMailController@useredit')->name('subscriber.update');
    Route::post('subscriber-edit/{id?}', 'SendMailController@useredit')->name('subscriber.edit');
    Route::get('subscriber-delete/{id?}', 'SendMailController@userdelete')->name('user.delete');
    Route::get('admin/subscriber', 'DashboardController@subscribers')->name('subscribers.index');
    Route::get('admin/subscriber-delete/{id?}', 'DashboardController@subscriber_delete')->name('subscriber.delete');
    Route::get('create-newsletter', 'SendMailController@newsletter')->name('newsletter.create');
    Route::get('payment-index', 'DashboardController@payment_index')->name('payment.index');
    Route::get('payment-delete/{id?}', 'DashboardController@payment_delete')->name('payment.delete');
});

    Route::get('admin/dashboard', 'DashboardController@index')->name('dashboard');

    // Route::get('admin/subscriber', 'DashboardController@subscribers')->name('subscribers.index');
    Route::get('admin/subscriber-delete/{id?}', 'DashboardController@subscriber_delete')->name('subscriber.delete');

    Route::get('admin/admin-user', 'AdminControllers\Members\UserController@admin_user');
    Route::get('admin/agent-user', 'AdminControllers\Members\UserController@agent_user');

    Route::resources([
        'admin/user' => 'AdminControllers\Members\UserController',
        'admin/member' => 'AdminControllers\Members\MemberController',
        'admin/role' => 'AdminControllers\Members\RoleController',
        'admin/access' => 'AdminControllers\Members\Role2Controller',
        'admin/banner' => 'AdminControllers\Banners\BannerController',
        'admin/postcategory' => 'AdminControllers\Posts\PostCategoryController',
        'admin/imagecategory' => 'AdminControllers\Galleries\ImageGalleryCategoryController',
        'admin/imagegallery' => 'AdminControllers\Galleries\ImageGalleryController',
        'admin/videocategory' => 'AdminControllers\Galleries\VideoGalleryCategoryController',
        'admin/videogallery' => 'AdminControllers\Galleries\VideoGalleryController',
        'admin/settings' => 'AdminControllers\Settings\SettingController',
        'admin/options' => 'AdminControllers\Settings\OptionController',
        'admin/department' => 'AdminControllers\Departments\DepartmentController',
        'admin/circulartype' => 'AdminControllers\Circulars\CircularTypeController',
        'admin/trip' => 'AdminControllers\Travels\TripController',
        'admin/region' => 'AdminControllers\Travels\RegionController',
        'admin/activity' => 'AdminControllers\Travels\ActivityController',
        'admin/destination' => 'AdminControllers\Travels\DestinationController',
        'admin/tripgroup' => 'AdminControllers\Travels\TripGroupController',
        'admin/activitygroup' => 'AdminControllers\Travels\ActivityGroupController',
        'admin/expedition' => 'AdminControllers\Expeditions\ExpeditionController',
        'admin/itinerary-category' => 'AdminControllers\Travels\TripItineraryCategoryController',
        'admin/expedition-group' => 'AdminControllers\Expeditions\ExpeditionGroupController',
        'admin/teams'=>'AdminControllers\Teams\TeamController',
		'admin/teamcategory'=>'AdminControllers\Teams\TeamCategoryController',
		'admin/pagetype'=>'AdminControllers\Pages\PageTypeController',
		'admin/pagecategory'=>'AdminControllers\Pages\PageCategoryController',
        'admin.faq' => 'AdminControllers\Faqs\FaqController',
        'admin.testimonials' => 'AdminControllers\Testimonials\TestimonialController',
        'admin.trip-gear' => 'AdminControllers\Travels\TripGearController',
        'admin.tripdocs' => 'AdminControllers\Travels\TripDocController',
        'admin.tripvideos' => 'AdminControllers\Travels\TripVideoController',
    ]);
    Route::post('banner-isdefault/{id?}', 'AdminControllers\Banners\BannerController@isdefault')->name('banner.isdefault');
    Route::get('admin/trip-expedition/{id}','AdminControllers\Expeditions\ExpeditionController@filter');
	Route::get('admin/trip-region/{id}','AdminControllers\Travels\RegionController@filter');
    Route::put('tripstatus/{id}', 'AdminControllers\Travels\TripController@tripstatus')->name('admin.tripstatus');
    Route::delete('delete_tripdoc_thumb/{id}', 'AdminControllers\Travels\TripDocController@delete_tripdoc_thumb');
    Route::put('poststatus/{id}', 'AdminControllers\Posts\PostController@poststatus')->name('admin.poststatus');

    
    Route::put('expgroupstatus/{id}', 'AdminControllers\Expeditions\ExpeditionGroupController@expgroupstatus')->name('admin.expgroupstatus');

	//Bibek Routes
    Route::get('delete_banner_logo/{id}','AdminControllers\Settings\SettingController@banner_destroy')->name('banner-destroy');
    Route::get('delete_mobile_banner_logo/{id}','AdminControllers\Settings\SettingController@mobile_banner_destroy')->name('mob-banner-destroy');
     Route::get('delete_testimonial_img/{id}','AdminControllers\Settings\SettingController@testimonial_img_destroy')->name('testimonial_img-destroy');
      Route::get('delete_testimonial_img_sm/{id}','AdminControllers\Settings\SettingController@testimonial_img_sm_destroy')->name('testimonial_img_sm-destroy');
       Route::get('delete_animation1/{id}','AdminControllers\Settings\SettingController@animation1_destroy')->name('animation1-destroy');
      Route::get('delete_animation2/{id}','AdminControllers\Settings\SettingController@animation2_destroy')->name('animation2-destroy');
    //
    Route::get('admin/tripdoclist/{id}', 'AdminControllers\Travels\TripDocController@list')->name('tripdoc.list');
    Route::post('admin/gear_thumb_update/{id}', 'AdminControllers\Travels\TripGearController@gear_thumb_update')->name('gear_thumb_update');

    // Delete_region_banner
    Route::delete('delete_region_banner/{id}', 'AdminControllers\Travels\RegionController@delete_region_banner');
    Route::delete('delete_activity_banner/{id}', 'AdminControllers\Travels\ActivityGroupController@delete_activity_banner');
    Route::delete('delete_trip_banner_thumb/{id}', 'AdminControllers\Travels\TripController@delete_trip_banner_thumb');
    Route::delete('delete_map_thumb/{id}', 'AdminControllers\Travels\TripController@delete_map_thumb');

    Route::get('admin/userprofile', 'AdminControllers\Members\UserController@userprofile')->name('admin.userprofile');
    Route::put('admin/update_password', 'AdminControllers\Members\UserController@update_password')->name('admin.update_password');
    Route::get('admin/changepassword', 'AdminControllers\Members\UserController@changepassword')->name('admin.changepassword');

    // For posttype
    Route::get('type/{posttype}', 'AdminControllers\Posts\PostTypeController@index')->name('type.posttype.index');
    Route::get('type/{posttype}/create', 'AdminControllers\Posts\PostTypeController@create')->name('type.posttype.create');
    Route::post('type/{posttype}/store', 'AdminControllers\Posts\PostTypeController@store')->name('type.posttype.store');
    Route::put('type/{posttype}/{id}', 'AdminControllers\Posts\PostTypeController@update')->name('type.posttype.update');
    Route::get('type/{posttype}/{id}/edit', 'AdminControllers\Posts\PostTypeController@edit')->name('type.posttype.edit');
    Route::delete('type/{posttype}/{id}', 'AdminControllers\Posts\PostTypeController@destroy')->name('type.posttype.destroy');

    // For post
    Route::get('admin/{post}', 'AdminControllers\Posts\PostController@index')->name('admin.post.index');
    Route::get('admin/{post}/create', 'AdminControllers\Posts\PostController@create')->name('admin.post.create');
    Route::post('admin/{post}/store', 'AdminControllers\Posts\PostController@store')->name('admin.post.store');
    Route::put('admin/{post}/{id}', 'AdminControllers\Posts\PostController@update')->name('admin.post.update');
    Route::get('admin/{post}/{id}/edit', 'AdminControllers\Posts\PostController@edit')->name('admin.post.edit');
    Route::delete('admin/{post}/{id}', 'AdminControllers\Posts\PostController@destroy')->name('admin.post.destroy');
    Route::get('admin/{post}/{id}', 'AdminControllers\Posts\PostController@childlist')->name('post.childlist');
    // Route::get('adminchild/{post}/{id}', 'AdminControllers\Posts\PostController@index')->name('admin.post.index');

    // Delete Thumb
    Route::delete('delete_banner_thumb/{id}', 'AdminControllers\Posts\PostController@delete_banner_thumb');
    Route::delete('delete_post_thumb/{id}', 'AdminControllers\Posts\PostController@delete_post_thumb');
    Route::delete('delete_destination_thumb/{id}', 'AdminControllers\Travels\DestinationController@delete_destination_thumb');
    Route::delete('delete_activity_thumb/{id}', 'AdminControllers\Travels\ActivityController@delete_activity_thumb');
    Route::delete('delete_tripgroup_thumb/{id}', 'AdminControllers\Travels\TripGroupController@delete_tripgroup_thumb');
    Route::delete('delete_expedition_thumb/{id}', 'AdminControllers\Expeditions\ExpeditionController@delete_expedition_thumb')->name('delete-expedition-thumb');

    Route::get('newsletter/subcribers', 'FrontendControllers\NewsletterSignupController@index')->name('subcribers');
    Route::delete('newsletter/subcribers/{id}', 'FrontendControllers\NewsletterSignupController@destroy');

    Route::get('admin/associated/{type}/{id}', 'AdminControllers\Posts\AssociatedPostController@associated_post')->name('associated.post.index');
    Route::get('admin/associated/{type}/{id}/create', 'AdminControllers\Posts\AssociatedPostController@create')->name('admin.associated.create');
    Route::post('admin/associated/{type}/{id}/store', 'AdminControllers\Posts\AssociatedPostController@store')->name('admin.associated.store');
    Route::delete('admin/associated/{type}/{id}', 'AdminControllers\Posts\AssociatedPostController@destroy')->name('admin.associated.destroy');
    Route::get('admin/associated/{type}/{id}/edit', 'AdminControllers\Posts\AssociatedPostController@edit')->name('admin.associated.edit');
    Route::put('admin/associated/{type}/{id}', 'AdminControllers\Posts\AssociatedPostController@update')->name('admin.associated.update');

    // Trip supporting info
    // Route::get('admin/trip/{id}/index', 'AdminControllers\Travels\TripInfoController@index');
    //  Route::get('admin/trip/{id}/create', 'AdminControllers\Travels\TripInfoController@create');
    // Route::post('admin/trip/{id}/store', 'AdminControllers\Travels\TripInfoController@store');
    // Route::get('admin/trip/{id}/{info_id}/edit', 'AdminControllers\Travels\TripInfoController@edit');
    //  Route::put('admin/trip/{id}/{info_id}/update', 'AdminControllers\Travels\TripInfoController@update');
    Route::delete('admin/trip/{id}/{info_id}', 'AdminControllers\Travels\TripInfoController@destroy')->name('supporting-info.destroy');
    Route::delete('delete_trip_thumb/{id}', 'AdminControllers\Travels\TripController@delete_trip_thumb');

    // Trip itinerary
    //  Route::get('admin/itinerary/{id}/index', 'AdminControllers\Travels\TripItineraryController@index');
    //  Route::get('admin/itinerary/{id}/create', 'AdminControllers\Travels\TripItineraryController@create');
    //  Route::post('admin/itinerary/{id}/store', 'AdminControllers\Travels\TripItineraryController@store');
    //  Route::get('admin/itinerary/{id}/{info_id}/edit', 'AdminControllers\Travels\TripItineraryController@edit');
    //  Route::put('admin/itinerary/{id}/{info_id}/update', 'AdminControllers\Travels\TripItineraryController@update');
    Route::delete('admin/itinerary/{id}/{info_id}', 'AdminControllers\Travels\TripItineraryController@destroy')->name('itinerary.destroy');

    // Trip Schedule
    //  Route::get('admin/schedule/{id}/index', 'AdminControllers\Travels\TripScheduleController@index');
    //  Route::get('admin/schedule/{id}/create', 'AdminControllers\Travels\TripScheduleController@create');
    //  Route::post('admin/schedule/{id}/store', 'AdminControllers\Travels\TripScheduleController@store');
    //  Route::get('admin/schedule/{id}/{info_id}/edit', 'AdminControllers\Travels\TripScheduleController@edit');
    //  Route::put('admin/schedule/{id}/{info_id}/update', 'AdminControllers\Travels\TripScheduleController@update');
    Route::delete('admin/schedule/{id}/{info_id}', 'AdminControllers\Travels\TripScheduleController@destroy')->name('schedule.destroy');

    Route::delete('admin/routecamp/{id}/{routecamp_id}', 'AdminControllers\Travels\RouteCampController@destroy')->name('routecamp.destroy');

    // For post category
    // Route::get('{postcategory}', 'AdminControllers\Posts\PostCategoryController@list')->name('postcategory.list');
    // Route::get('{postcategory}/create', 'AdminControllers\Posts\PostCategoryController@create')->name('postcategory.create');
    // Route::get('{postcategory}/{id}/edit', 'AdminControllers\Posts\PostCategoryController@edit')->name('postcategory.edit');
    Route::delete('delete_category_thumb/{id}', 'AdminControllers\Posts\PostCategoryController@delete_category_thumb');
    Route::delete('delete_gear_thumb/{id}', 'AdminControllers\Travels\TripGearController@delete_gear_thumb')->name('delete_gear_thumb');

    // Upload multiple document
    //Route::get('admin/doc/{tender_id}','AdminControllers\Tenders\TenderDocumentController@upload_form')->name('admin.doc');
    //Route::post('doc/store','AdminControllers\Tenders\TenderDocumentController@store')->name('doc.store');
    //Route::delete('doc/{id}','AdminControllers\Tenders\TenderDocumentController@destroy');

    // Upload multiple image
    Route::get('adminimg/multiplephoto/{post_id}', 'AdminControllers\Posts\PostImageController@upload_form')->name('admin.multiplephoto');
    Route::post('multiplephoto/store', 'AdminControllers\Posts\PostImageController@store')->name('multiplephoto.store');
    Route::get('adminimg/multiplephoto/{post_id}/{id}/edit', 'AdminControllers\Posts\PostImageController@edit')->name('edit.multiplephoto');
     Route::put('adminimg/multiplephoto/{post_id}', 'AdminControllers\Posts\PostImageController@update')->name('multiplephoto.update');
    Route::delete('adminimg/multiplephoto/{id}', 'AdminControllers\Posts\PostImageController@destroy');

    // Upload multiple video
    Route::get('admin/multiplevideo/{post_id}', 'AdminControllers\Posts\MultipleVideoController@index');
    Route::get('admin/multiplevideo/{post_id}/create', 'AdminControllers\Posts\MultipleVideoController@create');
    Route::get('admin/multiplevideo/{post_id}/{id}/edit', 'AdminControllers\Posts\MultipleVideoController@edit');
    Route::post('admin/multiplevideo', 'AdminControllers\Posts\MultipleVideoController@store');
    Route::put('admin/multiplevideo/{post_id}', 'AdminControllers\Posts\MultipleVideoController@update');
    Route::delete('admin/multiplevideo/{id}', 'AdminControllers\Posts\MultipleVideoController@destroy');

    // Upload multiple document
    Route::get('doc/multipledocument/{post_id}', 'AdminControllers\Posts\PostDocController@index')->name('doc.multipledocument');
    Route::get('doc/multipledocument/{post_id}/create', 'AdminControllers\Posts\PostDocController@create');
    Route::post('doc/multipledocument/store', 'AdminControllers\Posts\PostDocController@store')->name('multipledocument.store');
    Route::get('doc/multipledocument/{post_id}/{id}/edit', 'AdminControllers\Posts\PostDocController@edit');
    Route::put('doc/multipledocument/{post_id}', 'AdminControllers\Posts\PostDocController@update');
    Route::delete('doc/deleterow/{id}', 'AdminControllers\Posts\PostDocController@destroy');
    Route::delete('doc/multipledocument/{id}', 'AdminControllers\Posts\PostDocController@delete_doc_file');

    Route::get('/dwn/dwninfo', 'AdminControllers\Posts\DwnInfoController@index')->name('dwninfo.index');
    Route::delete('/dwn/dwninfo/{id}', 'AdminControllers\Posts\DwnInfoController@destroy');

    // For Circular
    Route::get('admin/circulartype/{uri}', 'AdminControllers\Circulars\CircularController@list');
    Route::get('admin/circulartype/{uri}/create', 'AdminControllers\Circulars\CircularController@create');
    Route::post('admin/circulartype/{uri}/store', 'AdminControllers\Circulars\CircularController@store');
    Route::get('admin/circulartype/{circulartype}/{id}/edit', 'AdminControllers\Circulars\CircularController@edit');
    Route::put('admin/circulartype/{circulartype}/{id}', 'AdminControllers\Circulars\CircularController@update');
    Route::delete('admin/circulartype/{circulartype}/{id}', 'AdminControllers\Circulars\CircularController@destroy');
    Route::delete('delete_circular_thumb/{id}', 'AdminControllers\Circulars\CircularController@delete_circular_thumb');

    //for teams
    Route::delete('admin/mountains/{id}/{info_id}', 'AdminControllers\Teams\TeamController@mountainsdestroy')->name('mountains.destroy');
    Route::delete('admin/achievements/{id}/{info_id}', 'AdminControllers\Teams\TeamController@achievementdestroy')->name('achievements.destroy');

    // List User for API
    Route::get('admin/pages/listusers/{dept}', 'AdminControllers\Circulars\CircularController@listusers');
    Route::get('admin/pages/departments', 'AdminControllers\Circulars\CircularController@departments');

     //Trip Review (Bibek)
    Route::get('admin-trip-review','AdminControllers\Review\TripReviewController@trip_review')->name('trip-review');
    Route::any('admin-trip-review/create-review','AdminControllers\Review\TripReviewController@post_trip_review')->name('post-trip-review');
    Route::post('admin-review-status','AdminControllers\Review\TripReviewController@review_status')->name('review-status');
    Route::post('admin-trip-edit-review/{id?}','AdminControllers\Review\TripReviewController@edit_trip_review')->name('edit-trip-review');
    Route::get('admin-trip-delete-review/{id?}', 'AdminControllers\Review\TripReviewController@delete_trip_review')->name('delete-trip-review');

    //Trip Booking (Bibek)
    Route::get('admin-trip-booking','AdminControllers\Booking\TripBookingController@trip_booking')->name('trip-booking');
    Route::get('admin-trip-booking-delete/{id?}','AdminControllers\Booking\TripBookingController@trip_booking_delete')->name('delete-booking');

    Route::get('admin-trip-inquiry','AdminControllers\Booking\TripBookingController@trip_inquiry')->name('trip-inquiry');
    Route::get('admin-trip-inquiry-delete/{id?}','AdminControllers\Booking\TripBookingController@trip_inquiry_delete')->name('delete-inquiry');

    Route::get('admin-contact-us','AdminControllers\Booking\TripBookingController@contact_us')->name('admin-contact');
    Route::get('admin-contact-delete/{id?}','AdminControllers\Booking\TripBookingController@contact_delete')->name('delete-contact');
    
    //Travel Guide(bibek)
    Route::get('admin-travel-guide','AdminControllers\TravelGuide\GuideController@travel_guide')->name('travel_guide');
    Route::get('admin-travel-guide-index','AdminControllers\TravelGuide\GuideController@index')->name('travel_guide_index');
    Route::get('admin-travel-guide-edit/{id?}','AdminControllers\TravelGuide\GuideController@edit')->name('travel_guide_edit');
    Route::post('admin-travel-guide-edit/{id?}','AdminControllers\TravelGuide\GuideController@edit')->name('travel_guide_edit');
    Route::get('admin-travel-guide-delete/{id?}','AdminControllers\TravelGuide\GuideController@delete')->name('travel_guide_delete');
    Route::post('admin-travel-guide','AdminControllers\TravelGuide\GuideController@travel_guide')->name('travel_guide');
    Route::delete('admin-travel-guide/photo/{id}','AdminControllers\TravelGuide\GuideController@destroy');
    //end
    //Geographical facts(bibek)
    Route::get('admin-geographical-facts-create','AdminControllers\Expeditions\ExpeditionController@facts')->name('facts-create');
    Route::get('admin-geographical-facts-index','AdminControllers\Expeditions\ExpeditionController@facts_index')->name('facts');
    Route::post('admin-geographical-facts','AdminControllers\Expeditions\ExpeditionController@facts')->name('facts-post');
    Route::get('admin-geographical-facts-delete/{id}','AdminControllers\Expeditions\ExpeditionController@facts_delete')->name('facts-delete');
    Route::post('admin-geographical-facts-edit/{id?}','AdminControllers\Expeditions\ExpeditionController@facts_edit')->name('facts-edit');
    //end
    
    //Bibek
    Route::get('itinerary-category/create/{id?}','AdminControllers\Travels\TripItineraryCategoryController@create')->name('category.create');
    Route::get('itinerary-category/index/{id?}','AdminControllers\Travels\TripItineraryCategoryController@index')->name('category.index');
    Route::get('itinerary-category/edit/{id?}/{id2?}','AdminControllers\Travels\TripItineraryCategoryController@edit')->name('category.edit');
    Route::get('itinerary-category','AdminControllers\Travels\TripItineraryCategoryController@store_category')->name('category.post');
    Route::post('itinerary-category','AdminControllers\Travels\TripItineraryCategoryController@store_category')->name('category.post');
    Route::get('itinerary-category/show-category','AdminControllers\Travels\TripItineraryCategoryController@show_category')->name('list.show');
    Route::any('edit-itinerary-category/{id?}','AdminControllers\Travels\TripItineraryCategoryController@update_category')->name('category.update');
    Route::any('edit-itinerary/{id?}','AdminControllers\Travels\TripItineraryCategoryController@update_itinerary')->name('itinerary.update');
    Route::get('delete-itinerary-category/{id}','AdminControllers\Travels\TripItineraryCategoryController@delete_category')->name('category.destroy');
    Route::get('delete-itinerary/{id}', 'AdminControllers\Travels\TripItineraryCategoryController@destroy')->name('itinerary.destroy');
    Route::delete('delete-cost-include/{id?}/{info_id?}', 'AdminControllers\Travels\TripItineraryCategoryController@delete_cost_include')->name('itinerary-cost-include.destroy');
    Route::delete('delete-cost-exclude/{id?}/{info_id?}', 'AdminControllers\Travels\TripItineraryCategoryController@delete_cost_exclude')->name('itinerary-cost-exclude.destroy');
    Route::delete('delete-itinerary/{id?}/{info_id?}', 'AdminControllers\Travels\TripItineraryCategoryController@delete_itinerary')->name('itinerary-category.destroy');
    Route::post('itinerary-isdefault/{id?}', 'AdminControllers\Travels\TripItineraryCategoryController@isdefault')->name('itinerary-category.isdefault');
    /// subir routes ////

	//for highlights
	Route::delete('admin/highlights/{id}/{info_id}','AdminControllers\Travels\TripController@destroyhighlights')->name('highlights.destroy');

	//for teams 
	Route::delete('delete_teamcategory_thumb/{id}','AdminControllers\Teams\TeamCategoryController@delete_teamcategory_thumb');
	Route::delete('thumbdelete/{id}','AdminControllers\Teams\TeamController@thumbdelete');
	Route::delete('bannerdelete/{id}','AdminControllers\Teams\TeamController@bannerdelete');


	Route::delete('admin/mountains/{id}/{info_id}','AdminControllers\Teams\TeamController@mountainsdestroy')->name('mountains.destroy');
	Route::delete('admin/achievements/{id}/{info_id}','AdminControllers\Teams\TeamController@achievementdestroy')->name('achievements.destroy');
	Route::delete('admin/certificates/{id}/{info_id}','AdminControllers\Teams\TeamController@certificatesdestroy')->name('certificates.destroy');
	// For pagetype
	Route::delete('admin/pagetype/{id}', 'AdminControllers\Pages\PageTypeController@destroy')->name('type.pagetype.destroy');
	Route::delete('delete_pagetype_thumb/{id}','AdminControllers\Pages\PageTypeController@delete_pagetype_thumb');

	// For pageCategory
	Route::delete('admin/pagecategory/{id}', 'AdminControllers\Pages\PageCategoryController@destroy')->name('type.pagecategory.destroy');
	Route::delete('delete_pagecategory_thumb/{id}','AdminControllers\Pages\PageCategoryController@delete_pagecategory_thumb');

	//For Pages	 
	Route::get('adminpages/{page}', 'AdminControllers\Pages\PageController@index')->name('admin.page.index');
	Route::get('adminpages/{page}/create', 'AdminControllers\Pages\PageController@create')->name('admin.page.create');
	Route::post('adminpages/{page}/store', 'AdminControllers\Pages\PageController@store')->name('admin.page.store');
	Route::put('adminpages/{page?}/{id?}', 'AdminControllers\Pages\PageController@update')->name('admin.page.update');
	Route::get('adminpages/{page}/{id}/edit', 'AdminControllers\Pages\PageController@edit')->name('admin.page.edit');
    Route::delete('adminpages/{page}/{id}', 'AdminControllers\Pages\PageController@destroy')->name('admin.page.destroy');
	Route::delete('adminpages/{page}/{id}/{info_id}', 'AdminControllers\Pages\PageController@detailsdestroy')->name('details.destroy');
	Route::put('pagestatus/{id}', 'AdminControllers\Pages\PageController@pagestatus')->name('admin.pagestatus');
    
    // Upload Page multiple document
    Route::get('pagedoc/multipledocument/{post_id}', 'AdminControllers\Pages\PageDocController@index')->name('pagedoc.index');
    Route::get('pagedoc/multipledocument/{post_id}/create', 'AdminControllers\Pages\PageDocController@create')->name('pagedoc.create');
    Route::post('pagedoc/multipledocument/store', 'AdminControllers\Pages\PageDocController@store')->name('pagedoc.store');
    Route::get('pagedoc/multipledocument/{post_id}/{id}/edit', 'AdminControllers\Pages\PageDocController@edit')->name('pagedoc.edit');
    Route::put('pagedoc/multipledocument/{post_id}/{id}', 'AdminControllers\Pages\PageDocController@update')->name('pagedoc.update');
    Route::delete('pagedoc/deleterow/{id}', 'AdminControllers\Pages\PageDocController@destroy')->name('pagedoc.delete');
    Route::delete('pagedoc/multipledocument/{id}', 'AdminControllers\Pages\PageDocController@delete_doc_file');
    Route::delete('delete_pagedoc_thumb/{id}', 'AdminControllers\Pages\PageDocController@delete_pagedoc_thumb');
    
     Route::delete('delete_pagebanner_thumb/{id}', 'AdminControllers\Pages\PageController@delete_banner_thumb');
    Route::delete('delete_page_thumb/{id}', 'AdminControllers\Pages\PageController@delete_page_thumb');


	View::composer(['*'], function($view){
		$pagetype = App\Models\Pages\PageTypeModel::orderBy('ordering', 'asc')->get();
		$view->with('pagetype', $pagetype);
	});
	/// subir routes ////

    View::composer(['*'], function ($view) {
        $posttype = App\Models\Posts\PostTypeModel::orderBy('ordering', 'asc')->get();
        $view->with('posttype', $posttype);
    });

    View::composer(['*'], function ($view) {
        $circulartype = App\Models\Circulars\CircularTypeModel::orderBy('ordering', 'asc')->get();
        $view->with('circulartype', $circulartype);
    });

});
