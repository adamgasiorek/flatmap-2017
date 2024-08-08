<div class="ui text menu" style="margin-bottom: -15px;border-bottom: 1px dashed #ddd8de;">
    <div class="header item" id="ILOSCzaznazcznocyh">0</div>
    <div class="header item">Sortuj </div>
    <a class="item">
        <i class="icon long arrow up strzalkagora"></i><i class="icon long arrow down strzalkadol"></i>Ceny
    </a>
    <a class="item">
        <i class="icon long arrow up strzalkagora"></i><i class="icon long arrow down strzalkadol"></i>Popularności
    </a>
</div>


<div style="height: 87%;display:block;overflow:auto;position: relative;width: 103.5%;margin-top: 30px;" id="mojezaznaczone2" >
    <div style="outline: none;"  class="ui divided items" id="mojezaznaczone" ></div>
</div>

<script>
    var co_sortowac;
    function sorterwDol(a, b) {
        return $(a).find(''+co_sortowac).text() - $(b).find(''+co_sortowac).text();
    };

    function sorterwGore(a, b) {
        return $(b).find(''+co_sortowac).text() - $(a).find(''+co_sortowac).text();
    };


    $(document).ready(function () {

        $('#mojezaznaczone2').perfectScrollbar({
            minScrollbarLength: 20
        });


        $('.strzalkagora, .strzalkadol').hide();
        $('.ui.text.menu').on('click', 'a.item', function() {
            if($(this).index('a.item') == 2)
                co_sortowac = "span.hajssortuje";
            else
                co_sortowac = "span.wyssortuje";



            if($(this).hasClass('active'))
            {

                if(!$(this).hasClass('dol'))
                {
                    $(this).find('.strzalkadol').hide();
                    $(this).find('.strzalkagora').show();
                    $(this).addClass('active dol').removeClass('gora').siblings('a.item').removeClass('active');
                    $('#mojezaznaczone').append($("#mojezaznaczone .item").toArray().sort(sorterwGore));
                }
                else
                {

                    $(this).find('.strzalkadol').show();
                    $(this).find('.strzalkagora').hide();
                    $(this).addClass('active gora').removeClass('dol').siblings('a.item').removeClass('active');
                    $('#mojezaznaczone').append($("#mojezaznaczone .item").toArray().sort(sorterwDol));
                }
            }
            else
            {
                $('.strzalkagora, .strzalkadol').hide();
                $(this).find('.strzalkadol').show();
                $(this).find('.strzalkagora').hide();
                $(this).addClass('active').siblings('a.item').removeClass('active');
                $('#mojezaznaczone').append($("#mojezaznaczone .item").toArray().sort(sorterwDol));

            }


        });
        //////////////////////////////////////////////

        console.log("zanzca " + zaladowanaListajest)

        if(!zaladowanaListajest)
        {
            console.log("lol beng tu")
            $.get(SERWER+'marker/get'+window.location.search ,function (data) {
                $('#ILOSCzaznazcznocyh').text(data.length);


                lista_lazyLoading(data,'mojezaznaczone',2);


            } );
        }
        else
            $('#ILOSCzaznazcznocyh').text(RozmiarListy);


    });



</script>