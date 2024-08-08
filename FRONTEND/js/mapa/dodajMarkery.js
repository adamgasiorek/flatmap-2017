// MARKER KLIK
function markerOnClick()
{
    usunwszystkieMarkery();
    zalodowanoprzegladanie = false;
    byloprzegladania = '?id='+this.options.id;

    if( !rozwiniete )
        $("#ROZWIN_KLIK2").click();

    $("#PRZEGLADAJ_KLIK").click();
}


//DODAWANIE MARKEROW
// var sprzedazIcon = L.AwesomeMarkers.icon({
//     markerColor: 'red',
//     prefix: 'fa',
//     iconColor: 'black',
//     icon : ''
// });
// var wynajemIcon = L.AwesomeMarkers.icon({
//     markerColor: 'blue',
//     prefix: 'fa',
//     iconColor: 'black'
// });
// var pobytIcon = L.AwesomeMarkers.icon({
//     markerColor: 'green',
//     prefix: 'fa',
//     iconColor: 'black'
// });

var pochowane_markery = [];
var wlaczone_chowanie = false;



function usunwszystkieMarkery()
{
    // console.log("usun " + markers.length )
    markers.forEach(function(mark) {
        MARKERY.removeLayer(mark);
    });
    markers = [];
    DoDodania = [];
    pochowane_markery = [];
}

// function listaobecnychId()
// {
//     var pozaznaczoneID = [];
//     MARKERY.eachLayer(function (layer) {
//         pozaznaczoneID.push(layer.options.id);
//     });
//     return pozaznaczoneID;
// }

var tekst_zaznaczone;

function pochowajMarkery(SW,NE)
{
    wlaczone_chowanie = true;
    markers.forEach(function(mark) {
        var mypozycjaX = mark.getLatLng().lat,mypozycjaY = mark.getLatLng().lng;
        tekst_zaznaczone = 'x1='+SW.lat+'&x2='+NE.lat+'&y2='+SW.lng+'&y1='+NE.lng;
        if(!(mypozycjaX > SW.lat && mypozycjaX < NE.lat && mypozycjaY > SW.lng && mypozycjaY < NE.lng))
        {
            pochowane_markery.push(mark);
            MARKERY.removeLayer(mark);
        }
    });
    Array.prototype.push.apply(DoDodania, pochowane_markery);

    var kliknij = false;
    if(zalodowanoliste)
        kliknij = true;

    zalodowanoliste = false;
    $('#chowajalbopokazikonke').show();
    if(tekst_zaznaczone)
        byloprzegladanialista = '?'+tekst_zaznaczone+tekst_parametry;
    else
        byloprzegladanialista = '';

    if(kliknij)
    {
        //console.log("klik")
        $('#LIST_KLIK').click();
    }
    //
    // if( !rozwiniete )
    //     $("#ROZWIN_KLIK2").click();
    //
    // $("#LIST_KLIK").click();


}

function pokaz_pochowaneMarkery()
{
    wlaczone_chowanie = false;
    DoDodania.forEach(function(mark) {
        MARKERY.addLayer(mark);
    });
    DoDodania = [];
    //pozaznaczoneID = [];
}


function dodajMARKERY(data)
{
    // console.log("dodaje " + data.length)
    for (var i = 0; i < data.length; ++i) {
        var typ,rodzajTransakcji,rodzajMieszkania;
        rodzajTransakcji = data[i]['offerType'];
        rodzajMieszkania = data[i]['propertyType'];

        if(rodzajTransakcji == 0)
            typ = new L.AwesomeMarkers.icon({
                markerColor: 'blue',
                prefix: 'fa',
                iconColor: 'black'
            });
        else if(rodzajTransakcji == 1)
            typ = new L.AwesomeMarkers.icon({
                markerColor: 'red',
                prefix: 'fa',
                iconColor: 'black',
                icon : ''
            });
        else if(rodzajTransakcji == 2)
            typ = new L.AwesomeMarkers.icon({
                markerColor: 'green',
                prefix: 'fa',
                iconColor: 'black'
            });



        if(rodzajMieszkania == 0)
            typ.options.icon = "home";
        else if(rodzajMieszkania == 50)
            typ.options.icon = "building";
        else if(rodzajMieszkania == 100)
            typ.options.icon = "bed";
        else if(rodzajMieszkania == 150)
            typ.options.icon = "tree";
        else if(rodzajMieszkania == 200)
            typ.options.icon = "car";
        else if(rodzajMieszkania == 250)
            typ.options.icon = "coffee";


        var Marker = new L.Marker([data[i]['latitude'], data[i]['longitude']], {
            id : data[i]['id'],
            icon : typ,
            rodzajTransakcji : rodzajTransakcji,
            rodzajMieszkania : rodzajMieszkania
        });

        Marker.on('click', markerOnClick);
        markers.push(Marker);
    }


    //console.log("markerow jest: " + markers.length  )

    if(wlaczone_chowanie)
    {
        Array.prototype.push.apply(DoDodania, markers);
    }
    else
    {
        MARKERY.addLayers(markers);
        MAPA.addLayer(MARKERY);
    }

    $('#LADOWANIE').hide();

}