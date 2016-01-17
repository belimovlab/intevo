/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


jQuery('document').ready(function(){

    reset_config();

});

window.addEventListener("popstate", function(e) {
    getContent(location.pathname, false);
});

function reset_config()
{
    if (Modernizr.history) {
        jQuery('.historyAPI').on('click', function(e){
            e.preventDefault();
            var href = $(this).attr('href');
            getContent(href, true);
            jQuery('.historyAPI').removeClass('active');
            $(this).addClass('active');
        });
    }
}


function getContent(url, addEntry) {
    $.get(url)
    .done(function( data ) {

        //alert(data);
        
        $('#his_content').html(data);
                reset_config();
        if(addEntry == true) {
            history.pushState(null, null, url);
        }

    });
}

