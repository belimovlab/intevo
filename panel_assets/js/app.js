/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


window.onload = function() {
    jQuery('.menu > a').click(function () {
        
            var last = jQuery('.menu.active', $('#menu_wrapper'));
            last.removeClass("active");
            jQuery('.arrow', last).removeClass("fa-angle-up");
            jQuery('.arrow', last).addClass("fa-angle-down");
            jQuery('.sub_menu', last).slideUp(200);
            
            
            var sub = jQuery(this).next();
            if (sub.is(":visible")) {
                jQuery('.arrow', jQuery(this)).removeClass("fa-angle-up");
                jQuery('.arrow', jQuery(this)).removeClass("fa-angle-down");
                jQuery('.arrow', jQuery(this)).addClass("fa-angle-down");
                sub.slideUp(200);
            } else {
                jQuery('.arrow', jQuery(this)).removeClass("fa-angle-down");
                jQuery('.arrow', jQuery(this)).addClass(" fa-angle-up");
                jQuery(this).parent().addClass("active");
                sub.slideDown(200);
            }
            var o = ($(this).offset());
            diff = 200 - o.top;
            if(diff>0)
                $("#menu_wrapper").scrollTo("-="+Math.abs(diff),500);
            else
                $("#menu_wrapper").scrollTo("+="+Math.abs(diff),500);
    });

    $('input,textarea').focus(function(){
        $(this).data('placeholder',$(this).attr('placeholder'))
            .attr('placeholder','');
        }).blur(function(){
            $(this).attr('placeholder',$(this).data('placeholder'));
     });
};