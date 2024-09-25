$('#refresh').click(function(){
  $.ajax({
     type:'GET',
     url:'fixed-tripbooking/bookingcaptcha',
     success:function(data){
        $(".captcha div").html(data.captcha);
     }
  });
});

$('#contact_captcha').click(function(){
  $.ajax({
     type:'GET',
     url:'contactcaptcha',
     success:function(data){
        $(".contact_captcha div").html(data.captcha);
     }
  });
});

$('#allbooking_captcha').click(function(){
  $.ajax({
     type:'GET',
     url:'tripbooking/allbookingcaptcha',
     success:function(data){
        $(".allbooking_captcha div").html(data.captcha);
     }
  });
});

$('#bookatrip_captcha').click(function(){
  $.ajax({
     type:'GET',
     url:'bookatripcaptcha',
     success:function(data){
        $(".bookatrip_captcha div").html(data.captcha);
     }
  });
});

$('#trip_captcha').click(function(){
  $.ajax({
     type:'GET',
     url:'page/tripcaptcha',
     success:function(data){
        $(".tripcaptcha div").html(data.captcha);
     }
  });
});

$('#tripinquiry_captcha').click(function(){
  $.ajax({
     type:'GET',
     url:'trip-inquiry/tripcaptcha',
     success:function(data){
        $(".tripinquiry_captcha div").html(data.captcha);
     }
  });
});

$('#fixed_inquiry_captcha').click(function(){
  $.ajax({
     type:'GET',
     url:'fixed-inquiry/tripcaptcha',
     success:function(data){
        $(".fixedinquiry_captcha div").html(data.captcha);
     }
  });
});

	$('#review_captcha').click(function () {
  $.ajax({
     type:'GET',
     url:'reviews.html/tripcaptcha',
     success:function(data){
        $(".reveiwcaptcha div").html(data.captcha);
     }
  });
});