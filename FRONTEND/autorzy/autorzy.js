$( document ).ready(function() {

    var ugoryzamocowane = false;
    console.log()
    $('.ui.sticky').sticky({
            context: '#ZAWARTOSC',
            onUnstick : function()
            {
                ugoryzamocowane = false;
            },
            onStick : function()
            {
                ugoryzamocowane = true;
            }
        });



    var pixels_per_second = 1000;
    function scrollTo(hash) {
        distance = Math.abs($(document.body).scrollTop( ) - $('#' + hash).offset( ).top);
        scroll_duration = (distance / pixels_per_second) * 1000;

        if(ugoryzamocowane)
            $(document.body).animate({ 'scrollTop':  $('#' + hash).offset().top-90 }, scroll_duration);
        else
            $(document.body).animate({ 'scrollTop':  $('#' + hash).offset().top-185 }, scroll_duration);
    }

    $("#idzdo_ONAS").click(function() {
        scrollTo('O_NAS');
    });

    $("#idzdo_PLUGINY").click(function() {
        scrollTo('PLUGINY');
    });

    $("#idzdo_KONTAKT").click(function() {
        scrollTo('KONTAKT');
    });

    $("#idzdo_WESPRZYJ").click(function() {
        scrollTo('WESPRZYJ');
    });
});