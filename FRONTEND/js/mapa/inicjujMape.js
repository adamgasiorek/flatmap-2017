//INICJA MAPY
var SERWER = 'http://164.132.57.18:9999/';  // http://192.168.1.29:9999/ http://localhost:9999/ 164.132.57.18:9999
var MAPA;
var kosz;
var narysowanenaMapie = new L.FeatureGroup();
var narysowanaFiguradousueniecia;
var MARKERY;
var markers = [];
var DoDodania = [];
var tekst = '';
var tekst_parametry = '';
var stary_tekst;
var lokalizacja;
var ruch = false;
var stary_polygonSW,stary_polygonNE;
var tekstjestgotowy = false;
var drawControl;

var x2,y2,x4,y4;
var ruch = false;
var maksymalnyzoom = 6;
var razzaladujstrone = true;
var razzzaldwowwnostorne = true;
var zaladowanaListajest = false;
var RozmiarListy;
// http://{s}.tile.osm.org/{z}/{x}/{y}.png
function inicjuj_mapke() {

    var southwest = L.latLng(-90, -180),
        northeast = L.latLng(90, 180),
        bounds = L.latLngBounds(southwest, northeast);


    MAPA = L.map('MAPA', { center: L.latLng(50.061797, 19.931332),  //
                            zoom: 15,
                            minZoom : 6,
                            zoomSnap : 0.1,
                            zoomDelta : 0.25,
                            maxBounds: bounds,
                            attributionControl: false });

    // L_PREFER_CANVAS = true;

    // L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png').addTo(MAPA);
    L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(MAPA);
    // L.tileLayer('https://a.tiles.mapbox.com/v3/mi.0ad4304c/{z}/{x}/{y}.png').addTo(MAPA);


    L.drawLocal.draw.handlers.rectangle.tooltip.start = 'Rysuj se kwadracik ziomek';
    L.drawLocal.draw.handlers.simpleshape.tooltip.end = 'Pusc myszke';
    L.drawLocal.draw.toolbar.actions.text = 'Anuluj';
    L.drawLocal.draw.toolbar.actions.title = 'Anuluj rysowanie';

    dodatek_KOSZ();
    dodatek_RYSOWANIE();
    dodatek_LEGENDA();

    if(!(byloprzegladania != ""))
    {
        pobierzEl();
        // MAPA.locate({setView: true, watch: false})
        //     .on('locationfound', function(e){
        //         if(razzzaldwowwnostorne)
        //         {
        //             razzzaldwowwnostorne = false;
        //             //console.log("znaleziono")
        //             MAPA.setView([e.latitude, e.longitude-0.001]);
        //             pobierzEl();
        //         }
        //         // var circle = L.circle([e.latitude, e.longitude], {color: 'green',fillColor: '#94e17c',fillOpacity: 1,radius: 1}).addTo(MAPA);
        //         // var circle = L.circle([e.latitude, e.longitude], {color: 'green',fillColor: '#7de166',fillOpacity: 0.3,radius: 15}).addTo(MAPA);
        //     })
        //     .on('locationerror', function(e){
        //         //console.log("nie znaleziono")
        //         pobierzEl();
        //     });
    }





}


function pobierzEl()
{

    MAPA.on("zoom",function(){

        //console.log( MAPA.getZoom() )

        if(MAPA.getZoom() < maksymalnyzoom)
        {
            usunwszystkieMarkery();
            x2 = 0,y2 = 0,x4=0, y4= 0;
            narysowanenaMapie.removeLayer(narysowanaFiguradousueniecia);
            kosz.removeFrom(MAPA);
            pokaz_pochowaneMarkery();
            MAPA.removeControl(drawControl);
            $('#chowajalbopokazikonke').hide();
        }
        else
        {
            //MAPA.addControl(drawControl)
            var nowe_northWest = MAPA.getBounds().getNorthWest() ,
                nowe_southEast = MAPA.getBounds().getSouthEast() ;

            //console.log( (!czyJestwsrodku(nowe_northWest, nowe_southEast) && !ruch) )
            if (!czyJestwsrodku(nowe_northWest, nowe_southEast) && !ruch) {
                wyslijPunkty(nowe_southEast, nowe_northWest, {lat: x2,lng: y2}, {lat: x4,lng: y4}  );

                if(x2 > nowe_southEast.lat)
                    x2 = nowe_southEast.lat;
                if(y2 < nowe_southEast.lng)
                    y2 = nowe_southEast.lng;

                if(x4 < nowe_northWest.lat)
                    x4 = nowe_northWest.lat;
                if(y4 > nowe_northWest.lng)
                    y4 = nowe_northWest.lng;


            }
            else {
                //console.log("jest w srodku wiec nic nie robie")
            }
        }

    });



    MAPA.on('dragend', function() {
        if(MAPA.getZoom() < maksymalnyzoom)
        {
            usunwszystkieMarkery();
            x2 = 0,y2 = 0,x4=0, y4= 0;
        }
        else
        {
            var nowe_northWest = MAPA.getBounds().getNorthWest(),
                nowe_southEast = MAPA.getBounds().getSouthEast();

            if (!czyJestwsrodku(nowe_northWest, nowe_southEast) && !ruch) {

                wyslijPunkty(nowe_southEast, nowe_northWest, {lat: x2,lng: y2}, {lat: x4,lng: y4}  );

                if(x2 > nowe_southEast.lat)
                    x2 = nowe_southEast.lat;
                if(y2 < nowe_southEast.lng)
                    y2 = nowe_southEast.lng;

                if(x4 < nowe_northWest.lat)
                    x4 = nowe_northWest.lat;
                if(y4 > nowe_northWest.lng)
                    y4 = nowe_northWest.lng;

            }
            else {
                //console.log("jest w srodku wiec nic nie robie")
            }
        }
    });


    var str = window.location.search;
    tekst_parametry = str.substring(83,str.length);

    //console.log( tekst_parametry )

    tekst = SERWER+'marker/get?x1='+MAPA.getBounds().getSouthEast().lat+
        '&x2='+MAPA.getBounds().getNorthWest().lat+
        '&y2='+MAPA.getBounds().getNorthWest().lng+
        '&y1='+MAPA.getBounds().getSouthEast().lng+''+tekst_parametry;


    $.get(tekst,dodajMARKERY ).done(function () {
        if(byloprzegladanialista != "")
        {
            var xx1 = getParameterByName('x1',window.location.search);
            var xx2 = getParameterByName('x2',window.location.search);
            var yy1 = getParameterByName('y1',window.location.search);
            var yy2 = getParameterByName('y2',window.location.search);

            var polygon = L.polygon([
                [xx1, yy1],
                [xx1, yy2],
                [xx2, yy2],
                [xx2, yy1]
            ],{fillOpacity : 0.1,fillColor: '#0000FF'}).addTo(MAPA);

            ruch = true;
            MAPA.fitBounds(polygon.getBounds());
            ruch = false;



            if(!(x2 < xx1 && y2 > yy2 && x4 > xx2 && y4 < yy1) )
            {
                usunwszystkieMarkery();

                x2 = MAPA.getBounds().getSouthEast().lat,x4 = MAPA.getBounds().getNorthWest().lat;
                y2 = MAPA.getBounds().getSouthEast().lng,y4 = MAPA.getBounds().getNorthWest().lng;

                tekst = SERWER+'marker/get?x1='+x2+'&x2='+x4+'&y2='+y4+'&y1='+y2+tekst_parametry;
                stary_tekst = SERWER+'marker/get?x1='+x2+'&x2='+x4+'&y2='+y4+'&y1='+y2+'';

                wlaczone_chowanie = false;
                $.get(tekst,dodajMARKERY ).done(function(data) {
                    RozmiarListy = data.length;
                    lista_lazyLoading(data,'mojezaznaczone',2);

                    stary_polygonSW = polygon.getBounds()._southWest, stary_polygonNE = polygon.getBounds()._northEast;

                    pochowajMarkery(stary_polygonSW,stary_polygonNE);


                    narysowanenaMapie.addLayer(polygon);
                    narysowanaFiguradousueniecia = polygon;

                    kosz.addTo(MAPA);
                    if(!rozwiniete)
                        $('.easy-button-container').css({ left: 45});


                    console.log(data)
                    // console.log(markers.length)
                    // $('#ILOSCzaznazcznocyh').text(markers.length);
                });
            }
            else
            {
                stary_polygonSW = polygon.getBounds()._southWest, stary_polygonNE = polygon.getBounds()._northEast;

                wlaczone_chowanie = true;
                var zostalo = [];
                markers.forEach(function(mark) {
                    var mypozycjaX = mark.getLatLng().lat,mypozycjaY = mark.getLatLng().lng;
                    if(!(mypozycjaX > stary_polygonSW.lat && mypozycjaX < stary_polygonNE.lat && mypozycjaY > stary_polygonSW.lng && mypozycjaY < stary_polygonNE.lng))
                    {
                        pochowane_markery.push(mark);
                        MARKERY.removeLayer(mark);
                    }
                    else
                        zostalo.push(mark.options);

                });
                Array.prototype.push.apply(DoDodania, pochowane_markery);

                narysowanenaMapie.addLayer(polygon);
                narysowanaFiguradousueniecia = polygon;

                kosz.addTo(MAPA);
                if(!rozwiniete)
                    $('.easy-button-container').css({ left: 45});

                $('#ILOSCzaznazcznocyh').text(zostalo.length);
                // lista_lazyLoading(data,'mojezaznaczone',2);
                lista_lazyLoading(zostalo,'mojezaznaczone',2);

            }



        }
    });

    x2 = MAPA.getBounds().getSouthEast().lat,x4 = MAPA.getBounds().getNorthWest().lat;
    y2 = MAPA.getBounds().getSouthEast().lng,y4 = MAPA.getBounds().getNorthWest().lng;

    MARKERY = L.markerClusterGroup({
        chunkedLoading: true,
        removeOutsideVisibleBounds : true,
        maxClusterRadius : 100
    });

}


function dodatek_LEGENDA() {
    L.control.attribution({position: 'bottomright'})
        .setPrefix('<a target="_blank" href="autorzy/autorzy.php">Autorzy</a>')
        .addAttribution('<a href="http://leafletjs.com/">Leaflet</a> &copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors')
        .addTo(MAPA);

}

var usunieterysowane = [];

function dodatek_KOSZ(){
    kosz = L.easyButton( '<i style="margin-left: 2px;" class="icon trash"></i>', function(){
        narysowanenaMapie.removeLayer(narysowanaFiguradousueniecia);
        this.removeFrom(MAPA);

        pokaz_pochowaneMarkery();

        zalodowanoliste = false;
        zaladowanaListajest = false;
        byloprzegladanialista = '';

        if( !rozwiniete )
            $("#ROZWIN_KLIK2").click();

        // $("#LIST_KLIK").click();
         $("#WYSZUKIWANIE_KLIK").click();

        $('#chowajalbopokazikonke').hide();
        //$('#mojezaznaczone').html('');

    });
}

function dodatek_RYSOWANIE() {

    MAPA.addLayer(narysowanenaMapie);

    drawControl = new L.Control.Draw({
        position: 'topleft',
        draw: {
            polyline: false,
            polygon: false,
            circle: false,
            marker: false
        },
        edit: {
            featureGroup: narysowanenaMapie,
            remove: false,
            edit: false
        }
    });

    drawControl.setDrawingOptions({
        rectangle: {
            shapeOptions: {
                color: '#0000FF',
                fillOpacity : 0.1
            }
        }
    });

    MAPA.addControl(drawControl);

    MAPA.on('draw:created', function (e) {
        narysowanenaMapie.addLayer(e.layer);
        narysowanaFiguradousueniecia = e.layer;

        kosz.addTo(MAPA);
        if(!rozwiniete)
            $('.easy-button-container').css({ left: 45});

        stary_polygonSW = e.layer.getBounds()._southWest, stary_polygonNE = e.layer.getBounds()._northEast;

        pochowajMarkery(stary_polygonSW,stary_polygonNE);

    });

    MAPA.on('draw:drawstart', function () {
        if(Object.keys(narysowanenaMapie._layers).length == 1 )
        {
            kosz.removeFrom(MAPA);
            narysowanenaMapie.removeLayer(narysowanaFiguradousueniecia);

            pokaz_pochowaneMarkery();
        }


    });

}
