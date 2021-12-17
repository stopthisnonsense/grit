jQuery(document).ready(function(){
var data = {
    action: 'customers',
    security : MyAjax.security,
    userid: MyAjax.userid,
    cat: 161

};
    jQuery.post(MyAjax.ajaxurl, data, function (response) {
        jQuery('.contenthere').html(response);
    });





jQuery('.onchange-reload').change(function(){
    var x = jQuery('option:selected',this).val();
    var data = {
        action: 'customers',
        security : MyAjax.security,
        userid: MyAjax.userid,
        cat: x

    };
    jQuery.post(MyAjax.ajaxurl, data, function (response) {
        jQuery('.contenthere').html(response);
    });

});

    var data = {
        action: 'loginhere',
        security : MyAjax.security
    };
    jQuery.post(MyAjax.ajaxurl, data, function (response) {
        jQuery('.loginhere').html(response);
    });
});