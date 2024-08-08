<div style="min-height: 98%;" >

    <div id="LADOWANIE_PRZEGLADANIA" >
        <img src="img/loading4.gif" style="width: 30%;" />
    </div>

    <div>
        <h3 class="ui header">
            <div id="mieszkanieTYTUL"></div>
        </h3>

        <div style="display: none;">
            <div id="mieszkanieXX"></div>
            <div id="mieszkanieYY"></div>
        </div>

        <div id="ID_TEGO" style="display: none;"></div>

        <div  style="float: right;margin-top: -35px;">
            <i id="DodajDoObserwowanych" class="empty star large icon" style="cursor: pointer"></i>
        </div>




        <div class="popup-gallery" id="obrazkipodglad" style="margin-bottom: -20px;">
            <div id="mniejszeobrazki" class="MINIATURKI" ></div>
        </div>




        <h2 class="ui header">
            <div style="position:absolute;width: 20px;margin-top:-3px;"><i id="idzNamapie" class="arrow right icon" style="cursor: pointer;font-size: 80%;"></i></div>
            <div style="display: inline-block;position:relative;left: 30px;" id="mieszkanieULICA"></div>
            <div class="sub header"><span id="mieszkanieKRAJ"></span> - <span id="mieszkanieMIASTO"></span> </div>
        </h2>

        <div class="ui clearing" style="margin-bottom: 60px;">
            <h2 class="ui left floated header" id="mieszkanieTYP">DOM</h2>
            <h4 class="ui left floated header" style="margin-top: 8px;">na</h4>
            <h2 class="ui left floated header" id="mieszkanieofferTYP"></h2>
            <h2 class="ui right floated header">
                <span id="mieszkanieCENA"></span>
            </h2>
        </div>


        <div class="ui accordion" style="min-height: 100px;">
            <div class="title">
                <i class="dropdown icon"></i>
                Szczegóły
            </div>
            <div class="content">
                <div class="ui divided middle aligned selection list" id="mieszkanieSZCZEGOLY"></div>
            </div>
            <div class="title">
                <i class="dropdown icon"></i>
                Opis
            </div>
            <div class="content" id="mieszkanieOPIS"></div>
            <div class="title">
                <i class="dropdown icon"></i>
                Kontakt
            </div>
            <div class="content">
                <table class="ui very basic table" >
                    <tbody>
                    <tr>
                        <td><i class="user icon"></i>Osoba:</td>
                        <td><span id="mieszkanieIMIE"></span></td>
                    </tr>
                    <tr>
                        <td><i class="mail outline icon"></i>Email:</td>
                        <td><span id="mieszkanieMAIL"> </span></td>
                    </tr>
                    <tr>
                        <td><i class="call icon"></i> Telefon:</td>
                        <td><span id="mieszkanieTEL"> </span></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

    <div class="ui horizontal link list right floated" style="height: 1%;" >
        <a class="item">
            Udostepnij
        </a>
        <a class="item" id="mieszkanieOSOBA_TYP"></a>
        <a class="item" id="mieszkanieDATA"></a>
        <a class="item">
            Zgłoś
        </a>
        <a class="item">
            Wyświetleń: <span id="mieszkanieVIEWS">0</span>
        </a>
    </div>

<script>
    $(document).ready(function() {


        $('#idzNamapie').click(function(){
            //fieldorfa 50.087686, 19.937951
            //start  49.862417, 19.349422
            var tymczasowaLok = L.latLng($('#mieszkanieXX').text(), $('#mieszkanieYY').text()-0.001);

            MAPA.setView(tymczasowaLok,20);

            var nowe_northWest = MAPA.getBounds().getNorthWest(),
                nowe_southEast = MAPA.getBounds().getSouthEast();

            if(!(x2 < nowe_southEast.lat  && y2 > nowe_southEast.lng && x4 > nowe_northWest.lat  && y4 < nowe_northWest.lng )  )
            {
                usunwszystkieMarkery();

                x2 = MAPA.getBounds().getSouthEast().lat,x4 = MAPA.getBounds().getNorthWest().lat;
                y2 = MAPA.getBounds().getSouthEast().lng,y4 = MAPA.getBounds().getNorthWest().lng;

                tekst = SERWER+'marker/get?x1='+x2+'&x2='+x4+'&y2='+y4+'&y1='+y2+tekst_parametry;
                stary_tekst = SERWER+'marker/get?x1='+x2+'&x2='+x4+'&y2='+y4+'&y1='+y2+'';

                wlaczone_chowanie = false;
                $.get(tekst,dodajMARKERY );
            }
        });

        $('#DodajDoObserwowanych').click(function(){
            if($(this).hasClass("yellow"))
            {
                $(this).removeClass("yellow").addClass("empty");
                usunzUlubione(parseInt($(this).parent().siblings('#ID_TEGO').text()));
            }
            else
            {
                $(this).addClass("yellow").removeClass("empty");
                dodajUlubione(parseInt($(this).parent().siblings('#ID_TEGO').text()));
            }
            zalodowanoliste = false;
        })


        var MIESZKANIE_OBJ;
        $.get(SERWER+'offer/get'+window.location.search,function(data){
            TytulikPrzegladanegoMieszknia = data.title;
            document.title = "FlatMap | " + TytulikPrzegladanegoMieszknia;

            MIESZKANIE_OBJ = data;
            var tymczasowaLok = L.latLng(MIESZKANIE_OBJ.latitude, MIESZKANIE_OBJ.longitude-0.001);
            MAPA.setView(tymczasowaLok,20);
            pobierzEl();

            // ZDJECIA
            if(MIESZKANIE_OBJ.property.photos.length != 0 )
            {
                $('#mniejszeobrazki').slick({
                    infinite: false,
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    variableWidth: true
                });

                $('#obrazkipodglad').prepend('<a href="'+SERWER+'photo/'+MIESZKANIE_OBJ.property.photos[0].id+'" title="">'+
                '<div class="glowne_zdjecie_div_back"><div class="glowne_zdjecie_div">'+
                '<img  src="'+SERWER+'photo/'+MIESZKANIE_OBJ.property.photos[0].id+'" /></div></div>'+
                '</a>');


                for (var i = 1; i < MIESZKANIE_OBJ.property.photos.length; ++i) {
                    var normal =  SERWER+'photo/'+MIESZKANIE_OBJ.property.photos[i].id;
                    var mini =  SERWER+'photo/thumb/'+MIESZKANIE_OBJ.property.photos[i].id;

                    $('#mniejszeobrazki').slick('slickAdd','<a href="'+normal+'" title="">'+
                        '<div class="miniaturka_div_back"><div class="miniaturka_div"><img src="'+mini+'" /></div></div>'+
                        '</a>');
                }

                if($('#mniejszeobrazki a').size() <= 4)
                    $('#mniejszeobrazki').css("margin-left","-17px");



            }



            $('#ID_TEGO').text( MIESZKANIE_OBJ.id );
            if(czyjestwUlubione(MIESZKANIE_OBJ.id) )
                $('#DodajDoObserwowanych').addClass("yellow").removeClass("empty");

            $('#mieszkanieTYTUL').text( MIESZKANIE_OBJ.title );

            $('#mieszkanieXX').text( MIESZKANIE_OBJ.latitude );
            $('#mieszkanieYY').text( MIESZKANIE_OBJ.longitude );

            $('#mieszkanieOPIS').text( MIESZKANIE_OBJ.description );
            $('#mieszkanieTYP').text( intToRodzajM(MIESZKANIE_OBJ.property.propertyType) );
            $('#mieszkanieofferTYP').text( intToRodzajT(MIESZKANIE_OBJ.offerType) );

            //CENA
            $('#mieszkanieCENA').text( MIESZKANIE_OBJ.price.value );

            if(MIESZKANIE_OBJ.offerType == 1)
                $('#mieszkanieCENA').after('<span style="font-size: 85%;"> '+intToWaluta(MIESZKANIE_OBJ.price.currency)+'</span>')
            else if(MIESZKANIE_OBJ.offerType == 0)
                $('#mieszkanieCENA').after('<sup style="font-size: 70%;"> '+intToWaluta(MIESZKANIE_OBJ.price.currency)+'</sup>&frasl;<sub style="font-size: 60%;" >'+TLUMACZENIA.okres0+'</sub>')
            else if(MIESZKANIE_OBJ.offerType == 2)
                $('#mieszkanieCENA').after('<sup style="font-size: 70%;"> '+intToWaluta(MIESZKANIE_OBJ.price.currency)+'</sup>&frasl;<sub style="font-size: 60%;" >'+TLUMACZENIA.okres1+'</sub>')



            //ADRES
            $('#mieszkanieULICA').text( MIESZKANIE_OBJ.property.address.street );
            $('#mieszkanieFLAT_NR').text( MIESZKANIE_OBJ.property.address.flatNumber );
            $('#mieszkanieMIASTO').text( MIESZKANIE_OBJ.property.address.city );
            $('#mieszkanieKRAJ').text( MIESZKANIE_OBJ.property.address.country );

            //ADRES
            $('#mieszkanieIMIE').text( MIESZKANIE_OBJ.contact.name );
            $('#mieszkanieMAIL').text( MIESZKANIE_OBJ.contact.email );
            $('#mieszkanieTEL').text( MIESZKANIE_OBJ.contact.phoneNumber );

            $('#mieszkanieVIEWS').text( MIESZKANIE_OBJ.views );

            //SZCZEGOLY
            $('#mieszkanieSZCZEGOLY').append(divekSzczegolik("Rodzaj zabudowy",intToRodzajBT(MIESZKANIE_OBJ.property.buildingType),''));
            $('#mieszkanieSZCZEGOLY').append(divekSzczegolik("Rozmiar",MIESZKANIE_OBJ.property.area,'m<sup>2</sup>'));
            $('#mieszkanieSZCZEGOLY').append(divekSzczegolik("Ogrzewanie",intToHeating(MIESZKANIE_OBJ.property.heatingType),''));
            $('#mieszkanieSZCZEGOLY').append(divekSzczegolik("Piwnica",MIESZKANIE_OBJ.property.basement,''));
            $('#mieszkanieSZCZEGOLY').append(divekSzczegolik("Balkon",MIESZKANIE_OBJ.property.balcony,''));
            $('#mieszkanieSZCZEGOLY').append(divekSzczegolik("Rok budowy",MIESZKANIE_OBJ.property.builtYear,''));
            $('#mieszkanieSZCZEGOLY').append(divekSzczegolik("Klimatyzacja",MIESZKANIE_OBJ.property.climatisation,''));
            $('#mieszkanieSZCZEGOLY').append(divekSzczegolik("Pietro",MIESZKANIE_OBJ.property.floor,''));
            $('#mieszkanieSZCZEGOLY').append(divekSzczegolik("Umeblowanie",MIESZKANIE_OBJ.property.furnished,''));
            $('#mieszkanieSZCZEGOLY').append(divekSzczegolik("Garden",MIESZKANIE_OBJ.property.garden,''));
            $('#mieszkanieSZCZEGOLY').append(divekSzczegolik("Winda",MIESZKANIE_OBJ.property.lift,''));
            $('#mieszkanieSZCZEGOLY').append(divekSzczegolik("Pets",MIESZKANIE_OBJ.property.pets,''));
            $('#mieszkanieSZCZEGOLY').append(divekSzczegolik("Ilosc pokoi",MIESZKANIE_OBJ.property.roomCount,''));
            $('#mieszkanieSZCZEGOLY').append(divekSzczegolik("Maksymlanie ludzi",MIESZKANIE_OBJ.property.maxPerson,''));
            $('#mieszkanieSZCZEGOLY').append(divekSzczegolik("Parking",MIESZKANIE_OBJ.property.parkingPlace,''));

            //SZCZEGOLIKI DOWN
            //$('#mieszkanieOSOBA_TYP').text( MIESZKANIE_OBJ.person.personType );
            $('#mieszkanieDATA').text( new Date((MIESZKANIE_OBJ.addDate*1000)).toLocaleString([], {year: 'numeric', month: 'numeric', day: 'numeric'}) );


            $('#PRZEGLADAJ_DIV').perfectScrollbar();
            $('#LADOWANIE_PRZEGLADANIA').hide();
        });




        $('.accordion').accordion({
            onOpen: function () {
                $('#PRZEGLADAJ_DIV').perfectScrollbar('update');
            },
            onClose: function () {
                $('#PRZEGLADAJ_DIV').perfectScrollbar('update');
            }
        });

        $('.popup-gallery').magnificPopup({
            delegate: 'a',
            type: 'image',
            tLoading: 'Loading image #%curr%...',
            mainClass: 'mfp-img-mobile',
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0,1] // Will preload 0 - before current, and 1 after the current image
            },
            image: {
                tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
                titleSrc: function(item) {
                    return item.el.attr('title');
                }
            }
        });
    });
</script>
