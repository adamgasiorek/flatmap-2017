


var byloprzegladania = "";
var byloprzegladanialista = "";
var zalodowanoprzegladanie = false,zalodowanowyszukiwarke = false, zalodowanowyprofil = false,zalodowanoliste =false;
var rozwiniete = true;
if( $( window ).width() < 765 )
    rozwiniete = false;

$('.menu .item').tab();
$("#ROZWIN_KLIK2").hide();

var bez = true;
$(window).on('popstate', function() {
    // location.reload();
    bez = false
    var co =location.pathname.substring(location.pathname.lastIndexOf("/") + 1);
    if(co == 'wyszukiwarka.php')
        $('.menu .item').eq(0).click();
    else if(co == 'przegladaj.php')
        $('.menu .item').eq(1).click();
    else if(co == 'lista.php')
        $('.menu .item').eq(2).click();
    else if(co == 'profil.php')
        $('.menu .item').eq(3).click();

});

$(document).ready(function () {

    //$("#ROZWIN_KLIK").click();
    $('#chowajalbopokazikonke').hide();

    $('.leaflet-draw-draw-rectangle').append("<i style='font-size: 150%;margin-left: 3px;' class='write square icon'></i>")
    $('.leaflet-draw-draw-rectangle').parent().append("<div id='rysujTooltip' >RYSUJ!</div>");


});

$("#ROZWIN_KLIK").click(function(e){
    $("#PASEK").transition('slide right')
    rozwiniete = false;
    $('#MAPA .leaflet-control-zoom').animate({ left: 45});
    $('.leaflet-draw-section').animate({ left: 45});
    $('.easy-button-container').animate({ left: 45});
    $("#ROZWIN_KLIK2").show();
    $('#ROZWIN_KLIK2').animate({ left: 10});
});

$("#ROZWIN_KLIK2").click(function(e){
    $("#PASEK").transition('slide right')
    rozwiniete = true;
    $('#MAPA .leaflet-control-zoom').animate({ left: 410});
    $('.leaflet-draw-section').animate({ left: 410});
    $('.easy-button-container').animate({ left: 410});
    $("#ROZWIN_KLIK2").hide();
    $('#ROZWIN_KLIK2').animate({ left: 410});
});


$("#WYSZUKIWANIE_KLIK").click(function(e){

    document.title = "FlatMap | WYSZUKIWARKA";
    if(bez)
        window.history.pushState('MAPA', '', 'wyszukiwarka.php');
    if(!zalodowanowyszukiwarke)
        $('#WYSZUKIWANIE_DIV').load('elementy/wyszukiwarka.php');

    zalodowanowyszukiwarke = true;
    bez = true;
});

$("#LIST_KLIK").click(function(e){

    $('#chowajalbopokazikonke').hide();
    document.title = "FlatMap | LISTA";
    if(bez)
        window.history.pushState('MAPA', '', 'lista.php'+byloprzegladanialista);
    if(!zalodowanoliste)
        $('#LIST_DIV').load('elementy/lista.php'+byloprzegladanialista);

    zalodowanoliste = true;
    bez = true;


});

$("#PRZEGLADAJ_KLIK").click(function(e){

    if(bez)
        window.history.pushState('MAPA', '', 'przegladaj.php'+byloprzegladania);

    if(!zalodowanoprzegladanie)
        $('#PRZEGLADAJ_DIV').load('elementy/przegladaj.php'+byloprzegladania);
     else
    {
        if(!czyjestwUlubione($('#ID_TEGO').text()))
            if($('#DodajDoObserwowanych').hasClass('yellow'))
                $('#DodajDoObserwowanych').removeClass("yellow").addClass("empty");

        document.title = "FlatMap | " + TytulikPrzegladanegoMieszknia;
    }




    zalodowanoprzegladanie = true;
    bez = true;
});

var TytulikPrzegladanegoMieszknia;
$("#PROFIL_KLIK").click(function(e){
    document.title = "FlatMap | PROFIL";
    if(bez)
        window.history.pushState('MAPA', '', 'profil.php');
    if(!zalodowanowyprofil)
        $('#PROFIL_DIV').load('elementy/profil.php');

    zalodowanowyprofil = true;
    bez = true;



});

function dodajUlubionejakiemam()
{
    if(ULUBIONE.length != 0)
    {
        $('#brakulubionych').hide();
        for(var i=0;i<ULUBIONE.length;i++)
        {
            $.ajax({
                url: SERWER+'offer/get?id='+ULUBIONE[i],
                type: 'GET',
                success: function(data){
                    $('#mojeulubione').append( dodajIkonkedoListy(
                        data.views,
                        data.id,
                        data.title,
                        data.property.propertyType,
                        data.offerType,
                        data.property.photos,
                        data.price.value ,
                        data.price.currency,
                        data.property.address.street,
                        data.property.address.country,
                        data.property.address.city, 1 ) );
                },
                beforeSend: function(jqXHR, settings) {
                    jqXHR.url = settings.url;
                },
                error: function(jqXHR, exception) {
                    console.log( getParameterByName('id',jqXHR.url));

                    var removeItem = getParameterByName('id',jqXHR.url);

                    ULUBIONE = jQuery.grep(ULUBIONE, function(value) {
                        return value != removeItem;
                    });
                    localStorage.setItem("ULUBIONE", JSON.stringify(ULUBIONE) );
                }
            });
        }
    }

}


function dodajIkonkedoListy(wyswietlen, id, tytul, rodzajM, rodzajT, zdjecia, hajs,waluta,ulica, kraj,miasto,podobrazkiemnr)
{
    var adres = '<h4 class="ui grey  header">'+ulica+'<br><div class="sub header">'+kraj+' '+miasto+'</div></h4>';

    var podlinki;
    if(podobrazkiemnr == 1)
    {
        // ULUBIONE
        podlinki = '<span style="font-size: 80%;margin-left: 4px;">' +
                    '<span style="cursor: pointer;margin-right: 10px;" class="UsunzUlubionych" data-value="'+id+'"><i class="star half empty icon"></i>NIE OBSERWUJ</span>'+
                    '<span class="wyssortuje"><i class="eye icon"></i>'+wyswietlen+'</span>'+
                    '</span><span class="idtegogowna" style="display: none">'+id+'</span>'
    }
    else if(podobrazkiemnr == 2)
    {
        // ZAZNACZONE
        if(!czyjestwUlubione(id))
        {
            podlinki = '<span style="font-size: 80%;margin-left: 5px;">' +
                '<span style="cursor: pointer;" class="dodajdoobs" data-value="'+id+'"><i class="empty star icon"></i>OBSERWUJ</span>'+
                '<span class="wyssortuje" style="margin-left: 15px;"><i class="eye icon"></i>'+wyswietlen+'</span>'+
                '</span><span class="idtegogowna" style="display: none">'+id+'</span>'
        }
        else
        {
            podlinki = '<span style="font-size: 80%;margin-left: 5px;">' +
                '<span data-value="'+id+'"><i class="full star icon"></i>OBSERWOWANE</span>'+
                '<span class="wyssortuje" style="margin-left: 15px;"><i class="eye icon"></i>'+wyswietlen+'</span>'+
                '</span><span class="idtegogowna" style="display: none">'+id+'</span>'
        }

    }
    else if(podobrazkiemnr == 3)
    {
        // MOJE
        podlinki = '<span style="font-size: 80%;margin-left: 6px;">' +
            '<span style="cursor: pointer;" class="UsunzMoich" data-value="'+id+'"><i class="remove icon"></i>USUN &nbsp;&nbsp;&nbsp;&nbsp;</span>'+
            '<span class="editdodane" style="cursor: pointer;"><i class="edit icon"></i>EDYTUJ &nbsp;&nbsp;&nbsp;&nbsp;</span>'+
            '<span class="wyssortuje"><i class="eye icon"></i>'+wyswietlen+'</span>'+
            '</span><span class="idtegogowna" style="display: none">'+id+'</span>'
    }

    var podobrazkiem = '<div class="podobrazkiem" style="height: 25px;float: left;margin-top: 10px;margin-bottom: -10px;">'+podlinki+'</div>'

    var waluta;
    if(rodzajT == 0)
    {
        waluta = '<span style="margin-left: 3px;"><span style="font-size: 80%;">'+intToWaluta(waluta)+'/'+TLUMACZENIA.okres0+'</span><span style="font-size: 70%;"></span></span>';
    }
    else if(rodzajT == 1)
    {
        waluta = '<span style="margin-left: 3px;"><span style="font-size: 80%;">'+intToWaluta(waluta)+'</span></span>';
    }
    else if(rodzajT == 2)
    {
        waluta = '<span style="margin-left: 3px;"><span style="font-size: 80%;">'+intToWaluta(waluta)+'/'+TLUMACZENIA.okres1+'</span><span style="font-size: 70%;"></span></span>';
    }


    var obr = '';
    if(zdjecia.length != 0 )
        obr = SERWER+'photo/'+zdjecia[0].id+'.jpg';
    else
        obr = 'img/noimage.png';

    return '<div class="item dosortowania" >'+
        '<div style="width: 50%;margin-bottom: 20px;float: left;" class="image " >'+
        '<img src="'+obr+'" class="linkItem2" style="cursor:pointer;max-height: 135px;" >'+
        podobrazkiem+
        '</div>'+
        '<div class="content">'+
        '<a class="ui header linkItem" style="margin-top: 1px;">'+tytul+'</a><hr style="border-top: 1px solid #dcdcdc;margin-right: 15px;">'+
        '<div class="meta">'+
            adres+
        '</div>'+
        '<div  class="extra">'+
        '<div style="width: 100%;font-size: 15px;line-height: 1.5;" class="ui left floated">'+
        intToRodzajM(rodzajM)+' &nbsp;na&nbsp; '+intToRodzajT(rodzajT)+
        '</div>'+
        // '<div class="ui left floated" style="width: 5%;font-size: 100%;margin-top: 3px;background-color: blue;"> na </div>'+
        // '<div style="width: 40%;background-color: red;display: block;font-size: 14px;" class="ui left floated" >'+
        // intToRodzajT(rodzajT)+
        // '</div>'+
        '</div>'+
        '<div style="font-size: 110%;top: -5px;" class="extra">'+
         '<span class="hajssortuje">'+hajs+'</span>'+waluta+
        '</div>'+
        '</div>' ;

    // $(".zmiescSiew").fitText();

}




$(document).on('click', '.linkItem, .linkItem2', function(){

    usunwszystkieMarkery();
    zalodowanoprzegladanie = false;
    byloprzegladania = '?id='+$(this).parent().parent().find('.idtegogowna').text();

    if( !rozwiniete )
        $("#ROZWIN_KLIK2").click();

    $("#PRZEGLADAJ_KLIK").click();

    //console.log("linkitem" + $(this).parent().parent().find('.idtegogowna').text() )
});

$(document).on('click', '.UsunzUlubionych', function(){
    usunzUlubione( $(this).data("value") );
    console.log("klik" + $(this).data("value") )
    $(this).parentsUntil('.item').parent().remove();
    zalodowanoliste = false;
    $('#LIST_KLIK').click();
});

$(document).on('click', '.UsunzMoich', function(){
    var iderewk = $(this).data("value");
    console.log("klik"+ $(this).data("value"))
    $('#idtegodousuniecia').text(iderewk);
    $('#UsunModal').modal('show');
});

$(document).on('click', '#potwierdzUsuniecie', function(){
    console.log( "USUN " + $('#idtegodousuniecia').text() );
    $.ajax({
        url: SERWER+'person/offer/remove?offerId='+$('#idtegodousuniecia').text(),
        type: "POST",
        contentType: "application/json",
        headers : {
            'X-Auth-Token' : localStorage.getItem('X-Auth-Token')
        },
        success : function(data){
            console.log(data)
            location.reload();
        },
        error: function(data)
        {
            console.log(data)
        }
    });

});

$(document).on('click', '.dodajdoobs', function(){
    console.log("klik dodaj ulbu"+ $(this).data("value"))
    if(!czyjestwUlubione(parseInt($(this).data("value"))))
    {
        dodajUlubione(parseInt($(this).data("value")));
        zalodowanoliste = false;
        $('#LIST_KLIK').click();
    }

});


var ULUBIONE = [];
// OBSerwowane
if (localStorage.getItem("ULUBIONE")) {
    ULUBIONE = JSON.parse(localStorage.getItem("ULUBIONE"));
} else {
    localStorage.setItem("ULUBIONE", JSON.stringify(ULUBIONE) );
}

function czyjestwUlubione(nr)
{
    for(var i=0;i<ULUBIONE.length;i++)
        if(ULUBIONE[i] == nr)
            return true;
    return false;
}

function dodajUlubione(nr)
{
    if(!czyjestwUlubione(nr))
    {
        ULUBIONE.push(nr);
        localStorage.setItem("ULUBIONE", JSON.stringify(ULUBIONE) );
    }
}

function usunzUlubione(nr)
{
    var index = ULUBIONE.indexOf(nr);
    if (index > -1)
    {
        ULUBIONE.splice(index, 1);
        localStorage.setItem("ULUBIONE", JSON.stringify(ULUBIONE) );
    }

}



function wyszukiwanie_google(place,map)
{
    tekstjestgotowy = true;
    lokalizacja= place;
    var xx =place.geometry.location.lat() , yy = place.geometry.location.lng();
    var ZASIEG = parseFloat($('#ZASIEG').text());

    if(narysowanaFiguradousueniecia != undefined)
    {
        narysowanenaMapie.removeLayer(narysowanaFiguradousueniecia);
        pokaz_pochowaneMarkery();
    }

    var polygon = L.polygon([
        [xx-ZASIEG/2, yy-ZASIEG],
        [xx+ZASIEG/2, yy-ZASIEG],
        [xx+ZASIEG/2, yy+ZASIEG],
        [xx-ZASIEG/2, yy+ZASIEG]
    ],{fillOpacity : 0.1,fillColor: '#0000FF'}).addTo(map);

    ruch = true;
    MAPA.fitBounds(polygon.getBounds());
    ruch = false;

    setTimeout(function(){
        if(!(x2 < xx-ZASIEG/2 && y2 > yy+ZASIEG && x4 > xx+ZASIEG/2 && y4 < yy-ZASIEG) )
        {

            // Na zewnatrz, dodaje nowe
            console.log("Na zewnatrz")
            usunwszystkieMarkery();

            x2 = MAPA.getBounds().getSouthEast().lat,x4 = MAPA.getBounds().getNorthWest().lat;
            y2 = MAPA.getBounds().getSouthEast().lng,y4 = MAPA.getBounds().getNorthWest().lng;

            tekst = SERWER+'marker/get?x1='+x2+'&x2='+x4+'&y2='+y4+'&y1='+y2+tekst_parametry;
            stary_tekst = SERWER+'marker/get?x1='+x2+'&x2='+x4+'&y2='+y4+'&y1='+y2+'';

            wlaczone_chowanie = false;
            $.get(tekst,dodajMARKERY ).done(function() {
                stary_polygonSW = polygon.getBounds()._southWest, stary_polygonNE = polygon.getBounds()._northEast;

                pochowajMarkery(stary_polygonSW,stary_polygonNE);


                narysowanenaMapie.addLayer(polygon);
                narysowanaFiguradousueniecia = polygon;

                kosz.addTo(MAPA);
                if(!rozwiniete)
                    $('.easy-button-container').css({ left: 45});
            });


        }
        else
        {
            // W srodku, chowam jakie trzeba
            //console.log("Wsrodku")


            stary_polygonSW = polygon.getBounds()._southWest, stary_polygonNE = polygon.getBounds()._northEast;

            pochowajMarkery(stary_polygonSW,stary_polygonNE);

            narysowanenaMapie.addLayer(polygon);
            narysowanaFiguradousueniecia = polygon;

            kosz.addTo(MAPA);
            if(!rozwiniete)
                $('.easy-button-container').css({ left: 45});

        }
    }, 800);


}


function wyszukiwanie_google_formularz(place,map) {
    $('#ADRESY').show();

    $.each( $.parseHTML( place.adr_address ) , function( i, el ) {
        if(el.className == 'country-name')
            $('#formularz_kraj').val(el.outerText);
        else if(el.className == 'locality')
            $('#formularz_miasto').val(el.outerText);
        else if(el.className == 'street-address')
            $('#formularz_ulica').val(el.outerText);
    });

    var marker = L.marker([place.geometry.location.lat(), place.geometry.location.lng()],{draggable:'true'}).addTo(map);
    marker.bindPopup("<b>Przeciagnij aby lepiej<br>okreslic miejsce!</b>").openPopup();

    $('#formularz_XX').val(place.geometry.location.lat());
    $('#formularz_YY').val(place.geometry.location.lng());

    map.setView([place.geometry.location.lat(),place.geometry.location.lng()], 15);

    marker.on('dragend', function(event){
        var marker = event.target;
        var position = marker.getLatLng();
        marker.setLatLng(new L.LatLng(position.lat, position.lng),{draggable:'true'});
        map.panTo(new L.LatLng(position.lat, position.lng));
        $('#formularz_XX').val(position.lat);
        $('#formularz_YY').val(position.lng);
    });
    map.addLayer(marker);

    $('#formularz_zdjecia').modal('refresh');
}



function getParameterByName(name, url) {
    if (!url) {
        url = window.location.href;
    }
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}



$.fn.serializeObject = function()
{
    var o = {};
    var a = this.serializeArray();
    $.each(a, function() {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });

    if(Object.prototype.toString.call(o['photos']) !== '[object Array]')
        if(o['photos'] === undefined)
            o['photos'] = Array();
        else
            o['photos'] = [o['photos']];

    return o;
};

var cossiewrzuilo = 1;
function handleFileSelect(evt) {
    $('#niemaZdjec').hide();
    niemazdjec = false;
    cossiewrzuilo++;
    var files = evt.target.files;
    for (var i = 0, f; f = files[i]; i++) {
        console.log("Start Uploading...")

        if (!f.type.match('image.*')) {
            continue;
        }
        var reader = new FileReader();
        raz = true;
        reader.onload = (function(theFile,count) {
            return function(e) {
                console.log(count + " " + raz + " " +cossiewrzuilo )

                if(count == 1 && raz && cossiewrzuilo == 2)
                {
                    raz = false;
                    $('#podglad_obrazy_glowne').prepend('<a href="'+e.target.result+'" title="The">'+
                        '<div class="glowne_zdjecie_div_back"><div class="glowne_zdjecie_div"><img src="'+e.target.result+'" /></div></div>'+
                        '</a>');
                }
                else
                {
                    $('#podglad_obrazy_mini').slick('slickAdd','<a href="'+e.target.result+'" title="The">'+
                            '<div class="miniaturka_div_back"><div class="miniaturka_div"><img src="'+e.target.result+'" /></div></div>'+
                            '</a>');
                }
            };
        })(f,i+1);


        reader.readAsDataURL(f);
    }

}

function handleFileSelect(evt) {
    $('#niemaZdjec').hide();
    niemazdjec = false;
    cossiewrzuilo++;
    var files = evt.target.files;
    for (var i = 0, f; f = files[i]; i++) {
        console.log("Start Uploading...")

        if (!f.type.match('image.*')) {
            continue;
        }
        var reader = new FileReader();
        raz = true;
        reader.onload = (function(theFile,count) {
            return function(e) {
                console.log(count + " " + raz + " " +cossiewrzuilo )

                if(count == 1 && raz && cossiewrzuilo == 2)
                {
                    raz = false;
                    $('#podglad_obrazy_glowne').prepend('<a href="'+e.target.result+'" title="The">'+
                        '<div class="glowne_zdjecie_div_back"><div class="glowne_zdjecie_div"><img src="'+e.target.result+'" /></div></div>'+
                        '</a>');
                }
                else
                {
                    $('#podglad_obrazy_mini').slick('slickAdd','<a href="'+e.target.result+'" title="The">'+
                        '<div class="miniaturka_div_back"><div class="miniaturka_div"><img src="'+e.target.result+'" /></div></div>'+
                        '</a>');
                }
            };
        })(f,i+1);


        reader.readAsDataURL(f);
    }

}


function parseQuery(qstr) {
    var query = {};
    var a = (qstr[0] === '?' ? qstr.substr(1) : qstr).split('&');
    for (var i = 0; i < a.length; i++) {
        var b = a[i].split('=');
        query[decodeURIComponent(b[0])] = decodeURIComponent(b[1] || '');
    }
    return query;
}


function removeParam(key, sourceURL) {
    var rtn = sourceURL.split("?")[0],
        param,
        params_arr = [],
        queryString = (sourceURL.indexOf("?") !== -1) ? sourceURL.split("?")[1] : "";


    if (queryString !== "") {
        params_arr = queryString.split("&");
        for (var i = params_arr.length - 1; i >= 0; i -= 1) {
            param = params_arr[i].split("=")[0];
            if (param === key) {
                params_arr.splice(i, 1);
            }
        }
        rtn = rtn + "?" + params_arr.join("&");
    }
    return rtn;
}


function intToRodzajM(val)
{

    if(val == 0)
        return TLUMACZENIA.rodzajM0;
    else if(val == 50)
        return TLUMACZENIA.rodzajM50;
    else if(val == 100)
        return TLUMACZENIA.rodzajM100;
    else if(val == 150)
        return TLUMACZENIA.rodzajM150;
    else if(val == 200)
        return TLUMACZENIA.rodzajM200;
    else if(val == 250)
        return TLUMACZENIA.rodzajM250;
}

function intToRodzajBT(val)
{
    if(val == 0)
        return TLUMACZENIA.rodzajBT0;
    else if(val == 1)
        return TLUMACZENIA.rodzajBT1;
    else if(val == 2)
        return TLUMACZENIA.rodzajBT2;
    else if(val == 3)
        return TLUMACZENIA.rodzajBT3;
    else if(val == 50)
        return TLUMACZENIA.rodzajBT50;
    else if(val == 51)
        return TLUMACZENIA.rodzajBT51;
    else if(val == 100)
        return TLUMACZENIA.rodzajBT100;
    else if(val == 101)
        return TLUMACZENIA.rodzajBT101;
    else if(val == 150)
        return TLUMACZENIA.rodzajBT150;
    else if(val == 151)
        return TLUMACZENIA.rodzajBT151;
    else if(val == 152)
        return TLUMACZENIA.rodzajBT152;
    else if(val == 200)
        return TLUMACZENIA.rodzajBT200;
    else if(val == 201)
        return TLUMACZENIA.rodzajBT201;
    else if(val == 202)
        return TLUMACZENIA.rodzajBT202;
    else if(val == 250)
        return TLUMACZENIA.rodzajBT250;
    else if(val == 251)
        return TLUMACZENIA.rodzajBT251;
    else if(val == 252)
        return TLUMACZENIA.rodzajBT252;
    else if(val == 253)
        return TLUMACZENIA.rodzajBT253;
    else if(val == 254)
        return TLUMACZENIA.rodzajBT254;
    else if(val == 255)
        return TLUMACZENIA.rodzajBT255;
}


function intToRodzajT(val)
{
    if(val == 0)
        return TLUMACZENIA.rodzajT0;
    else if(val == 1)
        return TLUMACZENIA.rodzajT1;
    else if(val == 2)
        return TLUMACZENIA.rodzajT2;
}

function intToWaluta(val)
{
    if(val == 0)
        return "zł";
    else if(val == 1)
        return "$";
    else if(val == 2)
        return "E";
}

function intToHeating(val)
{
    if(val == 0)
        return TLUMACZENIA.rodzajHeating0;
    else if(val == 1)
        return TLUMACZENIA.rodzajHeating1;
    else if(val == 2)
        return TLUMACZENIA.rodzajHeating2;
    else if(val == 3)
        return TLUMACZENIA.rodzajHeating3;
}

function divekSzczegolik(tytul,wart,extra)
{
    if( (typeof wart === 'string' || wart instanceof String) && wart != '' )
    {
        return '<div class="item"><div class="header">'+tytul+':&emsp;'+
            '<h4 style="display: inline;" class="ui grey header">'+
            wart+' '+extra+'</h4></div></div>'
    }
    else
    {
        if(wart != null && wart != '' )
        {
            if($.parseJSON(wart) === true)
                wart = '<i class="green checkmark icon"></i>';
            else if($.parseJSON(wart) === false)
                wart = '<i class="red remove icon"></i>';

            return '<div class="item"><div class="header">'+tytul+':&emsp;'+
                '<h4 style="display: inline;" class="ui grey header">'+
                wart+' '+extra+'</h4></div></div>'
        }
    }


}

var ruszaj = false;
function czyJestwsrodku(gornyzachod,dolnywschod)
{
    //console.log((dolnywschod.lat) + " " + (dolnywschod.lng) + " " + (gornyzachod.lat) + " " + ( gornyzachod.lng) )
    return(x2 < dolnywschod.lat  && y2 > dolnywschod.lng && x4 > gornyzachod.lat  && y4 < gornyzachod.lng )
}


function wyslijPunkty(P1,P2,P3,P4)
{

    // L.polygon([
    //     [P1.lat, P1.lng],
    //     [P1.lat, P2.lng],
    //     [P2.lat, P2.lng],
    //     [P2.lat, P1.lng]
    // ], {color: 'black'}).addTo(MAPA);

    // L.polygon([
    //     [P3.lat, P3.lng],
    //     [P3.lat, P4.lng],
    //     [P4.lat, P4.lng],
    //     [P4.lat, P3.lng]
    // ], {color: 'black'}).addTo(MAPA);

    //tekst_parametry = '&'+tekst_parametry.substring(1,tekst_parametry.length);

    stary_tekst = SERWER+'marker/get?x1='+P1.lat+'&y1='+P1.lng+'&x2='+P2.lat+'&y2='+P2.lng+'';

    tekst = tekst.split('?')[0] + '?' + 'x1='+P1.lat+'&y1='+P1.lng+'&x2='+P2.lat+
        '&y2='+P2.lng+'&x3='+P3.lat+'&y3='+P3.lng+'&x4='+P4.lat+'&y4='+P4.lng+''+tekst_parametry;

    //console.log(tekst_parametry)

    // console.log('http://localhost:9999/marker/getNew?x1='+P1.lat+'&y1='+P1.lng+'&x2='+P2.lat+
    //     '&y2='+P2.lng+'&x3='+P3.lat+'&y3='+P3.lng+'&x4='+P4.lat+'&y4='+P4.lng+''+tekst_parametry)

    $('#LADOWANIE').show();


    $.get(SERWER+'marker/getNew?x1='+P1.lat+'&y1='+P1.lng+'&x2='+P2.lat+
        '&y2='+P2.lng+'&x3='+P3.lat+'&y3='+P3.lng+'&x4='+P4.lat+'&y4='+P4.lng+''+tekst_parametry,dodajMARKERY);


}




function  lista_lazyLoading(data, gdzie,ile) {
    var tablica_prz = [];
    for (var i = 0; i < data.length; ++i) {
        $.get(SERWER+'offer/get?id='+data[i].id ,function(data2) {

            var ikonka = dodajIkonkedoListy(
                data2.views,
                data2.id,
                data2.title,
                data2.property.propertyType,
                data2.offerType,
                data2.property.photos,
                data2.price.value,
                data2.price.currency,
                data2.property.address.street,
                data2.property.address.country,
                data2.property.address.city, ile );

            tablica_prz.push(ikonka);

            $('#'+gdzie).append( ikonka );
        });
    }


    //console.log(tablica_prz)
    // new Clusterize({
    //     rows: tablica_prz,
    //     scrollId: gdzie+'2',
    //     contentId: gdzie
    // });

}
























