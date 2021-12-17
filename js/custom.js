jQuery('img,.shadow').animate({opacity:0},0);

jQuery(window).load(function(){
    jQuery('img').each(function(){
        var img = jQuery(this);
        var src= jQuery(this).attr('src');
        if(jQuery(this).hasClass('img-responsive')){

        }else {
            jQuery("<img/>").load(function () {
                var width = this.width;
                jQuery(img).css('max-width',
                    width + 'px');
            }).attr("src", src);
        }

    });
    jQuery('img').animate({opacity:1},300,function(){

    });
});
jQuery(document).ready(function(){
    jQuery(document).delegate('*[data-toggle="lightbox"]:not([data-gallery="navigateTo"])', 'click', function(event) {
        event.preventDefault();
        return jQuery(this).ekkoLightbox({
            onShown: function() {
                if (window.console) {
                    return console.log('Checking our the events huh?');
                }
            },
            onNavigate: function(direction, itemIndex) {
                if (window.console) {
                    return console.log('Navigating '+direction+'. Current item: '+itemIndex);
                }
            }
        });
    });
    jQuery('.request-a-call-btn').click(function(e){
        e.preventDefault();
        jQuery('.request-a-call').show();
        jQuery(this).hide();
    });
   jQuery('p').each(function(){
      var text = jQuery(this).html();
       if(text == ""){
           jQuery(this).remove();
       }
   });

    jQuery('#requestacall').submit(function(e) {
        e.preventDefault();
        jQuery('.form-response').html('');
// send email to client before moving onto worldpay payment form
        var data = {
            action: 'mail_before_submit',
            toemail: jQuery('#toemail').val(), // change this to the email field on your form
            regarding: jQuery('#regarding').val(), // change this to the email field on your form
            name: jQuery('#user_name').val(), // change this to the email field on your form
            email: jQuery('#email').val(), // change this to the email field on your form
            phone: jQuery('#phone').val(), // change this to the email field on your form
            _ajax_nonce: jQuery('#my_email_ajax_nonce').data('nonce')
        };
        if(data.name == ""){
            jQuery('.form-response').append('<h2>Your name is required</h2>');
        }else {
            if (data.email == "" && data.phone == "") {
                jQuery('.form-response').append('<h2>Phone or Email is required</h2>');
            } else {
                jQuery.post(url + "/wp-admin/admin-ajax.php", data, function (response) {
                    if (response == "email sent") {
                        jQuery("#requestacall").hide();
                        jQuery('.form-response').html('<h1>Your message was sent successfully.</h1>');
                    }
                });
            }
        }
    });

    jQuery('.showpopup').click(function(e){
        e.preventDefault();
        jQuery('.popup').css('display','flex');
    });
    jQuery('.popup').click(function(){
       jQuery(this).hide();
    });
    jQuery('.popup-inner').click(function(e){
        e.stopPropagation();
    })

    jQuery('.scroll').click(function(e){
        e.preventDefault();
        var what = "";
        if(jQuery(this).hasClass('top-page')){
            y = 0;
        }else {
            if(jQuery(this).hasClass('about')){
                what = '#about';
            }
            if(jQuery(this).hasClass('solutions')){
                what = '#solutions';
            }
            if(jQuery(this).hasClass('contact')){
                what = '#contact';
            }
            var y = jQuery(what).offset().top;
        }
        var body = jQuery("html, body");
        body.stop().animate({scrollTop:y}, '500', 'swing');
    });
    /*jQuery('.carousel-inner .item a').click(function(e){
        e.preventDefault();
        var what = '#solutions';
        var y = jQuery(what).offset().top;
        var body = jQuery("html, body");
        body.stop().animate({scrollTop:y}, '500', 'swing');
    });*/

});

/*
 jQuery(document).ready(function() {
 if(jQuery('body').hasClass('.page-id-139')){

 }else {
 //jQuery('.pagemain > div').empty().parent().remove();
 }
 var test = jQuery('.pagemain > div').html();
 if(test == "<br>"){
 jQuery('.pagemain').remove();
 }

 jQuery('.pickit').selectpicker({
 style: 'btn-default',
 size: 10
 });

 jQuery('.pickit').change(function(){
 var p =  jQuery(this).parents('form');
 var res = jQuery(this).val().split("|");
 jQuery('.removeonchange',p).remove();
 if(res[0] !== ""){
 jQuery(p).append('<input type="hidden" name="year" value="'+res[0]+'"/>');
 jQuery(p).append('<input type="hidden" name="monthnum" value="'+res[1]+'"/>');
 }

 jQuery(p).submit();

 });

 jQuery('.showlogin').click(function(e){
 e.preventDefault();
 jQuery('.loginhere').addClass('active');
 jQuery('.login-popup').click(function(e){e.stopPropagation();});
 jQuery('.loginhere').click(function(){
 jQuery(this).removeClass('active');
 });

 })

 jQuery('.slidein .holder').hover(
 function() {
 jQuery('.content',this).stop().animate({opacity:1},200);
 }, function() {
 // jQuery('.content',this).stop().animate({opacity:0},200);
 }
 );



 });
jQuery(window).ready(function(){
    jQuery(window).scroll(function(){

        var height = jQuery(document).innerHeight();
        var scrollTop = jQuery(window).scrollTop();


        var test = scrollTop + 600;
        console.log(test);
        console.log(scrollTop);
        if(test > height){
            jQuery('#intercom-launcher').animate({bottom:'158px'},500);
        }else{
            jQuery('#intercom-launcher').stop().animate({bottom:'50px'},500);
        }

    });
});*/


