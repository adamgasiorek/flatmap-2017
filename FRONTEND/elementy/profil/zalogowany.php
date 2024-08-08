
<div class="ui accordion" style="margin-bottom: 10px;">
    <div class="ui title">
        <i class="dropdown icon" style="margin-top: 10px;"></i>
        <div class="ui grey header" style="font-size: 130%;margin-left: 25px;margin-top: -22px;" id="NazwaMoj" ></div>
    </div>
    <div class="content ">
        <div class="ui header" style="position: absolute;left: 230px; margin-top: 15px;font-size: 80%;cursor: pointer;">
            <a style="color: grey;" id="WYLOGUJSIE">WYLOGUJ</a>
        </div>
        <div class="ui header" style="position: absolute;left: 140px; margin-top: 15px;font-size: 80%;cursor: pointer;">
            <a style="color: grey;" id="ZMIENHASLO">ZMIEN HASLO</a>
        </div>
        <div class="ui header" style="position: absolute;left: 20px; margin-top: 15px;font-size: 80%;cursor: pointer;">
            <a style="color: grey;" id="EDYTUJSE">EDYTUJ KONTAKT</a>
            <a style="color: grey;" id="ZAPISZSE">ZAPISZ KONTAKT</a>
        </div>
        <div class="ui equal width grid" style="margin-top: 35px;">
            <div class="row">
                <div class="column">
                    <div style="display: inline;" class="naInputa_div" id="imieInazwiskoMoj"><i class="user icon"></i></div>
                    <div style="display: inline;" class="naInputa_input ui left icon input" ><i class="user icon"></i><input id="imieInazwiskoMoj_input" type="text" value=""></div>
                </div>
                <div class="column"></div>
            </div>
            <div class="row" style="margin-top: -10px;">
                <div class="column">
                    <div style="display: inline;" class="naInputa_div" id="telefonMoj"><i class="call icon"></i></div>
                    <div style="display: inline;" class="naInputa_input ui left icon input" ><i class="call icon"></i><input id="telefonMoj_input" type="text" value=""></div>
                </div>
                <div class="column">
                    <div style="display: inline;" class="naInputa_div" id="emailMoj"><i class="mail outline icon"></i></div>
                    <div style="display: inline;" class="naInputa_input ui left icon input" ><i class="mail outline icon"></i><input id="emailMoj_input" type="text" value=""></div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="ui buttons fluid" style="margin-top: 10px;">
    <div class="ui labeled button" id="dodajOgloszenie" >
        <div class="ui basic button">
            <i class="icons">
                <i class="home icon"></i>
                <i class="inverted corner add icon"></i>
            </i>
            &nbsp;&nbsp;&nbsp;&nbsp;Dodaj ogłoszenie:
        </div>
    </div>
    <div class="ui labeled button" id="doladujKonto" >
        <div class="ui basic button">
            <i class="money icon"></i> Doładuj:
        </div>
        <a class="ui basic left pointing green label">0</a>
    </div>
</div>



<!--    <div class="ui button"  >TEST</div>-->


<div style="padding-bottom: 5px;border-bottom: 1px dashed #ddd8de;font-size: 110%;" class="ui header">
    Moje ogłoszenia:
</div>
<?php
include('tabki/moje.php');
?>

<!-- DOLADUJ -->
<?php
include('modal/doladuj.php');
?>

<!-- DODAWANIE NOWYCH OGLOSZEN-->
<?php

include('edytowanieofert.php');

include('dodawanieofert.php');

include('modal/usun.php');
?>


<script>



    var photos;

    var nowezdjecia = true;
    $(document).ready(function() {
        $('#podglad_obrazy_mini').slick({
            infinite: false,
            slidesToShow: 4,
            slidesToScroll: 1,
            variableWidth: true
        });

        $('.united.modal').modal({allowMultiple: false,duration : 100}); //400 domyslne

        $('#formularz_podstawowe').modal('attach events', '.idzDo_formularz_podstawowe');
        $('#formularz_adres').modal('attach events', '.idzDo_formularz_adres');
        $('#formularz_zdjecia').modal('attach events', '.idzDo_formularz_zdjecia');
        $('#formularz_szczegoly').modal('attach events', '.idzDo_formularz_szczegoly');
        $('#formularz_podsumowanie').modal('attach events', '.idzDo_formularz_podsumowanie');


        $('#dodajOgloszenie').on('click', function(){
            $('#formularz_podstawowe').modal('show');
        });

        $('#formularz_podstawowe_edit').modal('attach events', '.idzDo_formularz_podstawowe2');
        $('#formularz_adres_edit').modal('attach events', '.idzDo_formularz_adres2');
        //$('#formularz_zdjecia_edit').modal('attach events', '.idzDo_formularz_zdjecia2');
        $('#formularz_szczegoly_edit').modal('attach events', '.idzDo_formularz_szczegoly2');
        $('#formularz_podsumowanie_edit').modal('attach events', '.idzDo_formularz_podsumowanie2');





        $('.idzDo_formularz_szczegoly').on('click', function() {
            $('.rodzajZabudowyDom,.rodzajZabudowyBlok,.rodzajZabudowyLokale, .rodzajZabudowyPokoj, .rodzajZabudowyGaraz, .rodzajZabudowyDzialka').hide();
            if($('#formularz_rodzajM').val() != '')
            {
                $('#rodzajZabudowyonczyoff').removeClass('disabled');

                if($('#formularz_rodzajM').val() == 0)
                    $('.rodzajZabudowyDom').show();
                else if($('#formularz_rodzajM').val() == 50)
                    $('.rodzajZabudowyBlok').show();
                else if($('#formularz_rodzajM').val() == 100)
                    $('.rodzajZabudowyPokoj').show();
                else if($('#formularz_rodzajM').val() == 150)
                    $('.rodzajZabudowyDzialka').show();
                else if($('#formularz_rodzajM').val() == 200)
                    $('.rodzajZabudowyGaraz').show();
                else if($('#formularz_rodzajM').val() == 250)
                    $('.rodzajZabudowyLokale').show();
            }

        });

        $('.idzDo_formularz_podsumowanie').on('click', function(){

            var getTytul = $('#formularz_TYTUL').val();
            var getOpis = $('#formularz_OPIS').val();
            var getRodzajT = $('#formularz_rodzajT').val();
            var getRodzajM = $('#formularz_rodzajM').val();

            var getCena = $('#formularz_cena').val();
            var getWaluta = $('#formularz_waluta').val();

            var getUlica = $('#formularz_ulica').val();
            var getMiasto = $('#formularz_miasto').val();
            var getKraj = $('#formularz_kraj').val();

            var getXX = $('#formularz_XX').val();
            var getYY = $('#formularz_YY').val();

            var glownyKontakt = $('#formularz_glownyKontakt').val();
            var imieKontakt = $('#formularz_imieKontakt').val();
            var emailKontakt = $('#formularz_emailKontakt').val();
            var telKontakt = $('#formularz_telKontakt').val();

            photos = $("input[name='photos']").map(function(){return $(this).val();}).get();

            $('#set_formularz_TYTUL').val( getTytul );
            $('#set_formularz_OPIS').val( getOpis );
            $('#set_formularz_RodzajT').val( getRodzajT );
            $('#set_formularz_RodzajM').val( getRodzajM );

            $('#set_formularz_Cena').val( getCena );
            $('#set_formularz_Waluta').val( getWaluta );

            $('#set_formularz_Ulica').val( getUlica );
            $('#set_formularz_Miasto').val( getMiasto );
            $('#set_formularz_Kraj').val( getKraj );

            $('#set_formularz_XX').val( getXX );
            $('#set_formularz_YY').val( getYY );

            $('#set_formularz_glownyKontakt').val( glownyKontakt );
            $('#set_formularz_imieKontakt').val( imieKontakt );
            $('#set_formularz_emailKontakt').val( emailKontakt );
            $('#set_formularz_telKontakt').val( telKontakt );

            //SZCZEGOLY
            if($('#formularz_szczegoly_propertyBuildingType').val()!="")
                $('#set_formularz_szczegoly_propertyBuildingType').val( $('#formularz_szczegoly_propertyBuildingType').val() )

            if($('#formularz_szczegoly_propertyBuildingType').val()!="")
                $('#set_formularz_szczegoly_propertyMinPerson').val( $('#formularz_szczegoly_propertyBuildingType').val() )

            if($('#formularz_szczegoly_propertyMinPerson').val()!="")
                $('#set_formularz_szczegoly_propertyMinPerson').val( $('#formularz_szczegoly_propertyMinPerson').val() )

            if($('#formularz_szczegoly_propertyMaxPerson').val()!="")
                $('#set_formularz_szczegoly_propertyMaxPerson').val( $('#formularz_szczegoly_propertyMaxPerson').val() )

            if($('#formularz_szczegoly_propertyHeatingType').val()!="")
                $('#set_formularz_szczegoly_propertyHeatingType').val( $('#formularz_szczegoly_propertyHeatingType').val() )

            if($('#formularz_szczegoly_propertyArea').val()!="")
                $('#set_formularz_szczegoly_propertyArea').val( $('#formularz_szczegoly_propertyArea').val() )

            if($('#formularz_szczegoly_propertyRoomCount').val()!="")
                $('#set_formularz_szczegoly_propertyRoomCount').val( $('#formularz_szczegoly_propertyRoomCount').val() )

            if($('#formularz_szczegoly_propertyFloor').val()!="")
                $('#set_formularz_szczegoly_propertyFloor').val( $('#formularz_szczegoly_propertyFloor').val() )

            if($('#formularz_szczegoly_propertyBuildYear').val()!="")
                $('#set_formularz_szczegoly_propertyBuildYear').val( $('#formularz_szczegoly_propertyBuildYear').val() )

            if($('#formularz_szczegoly_propertyIsFurnished').val()!="")
                $('#set_formularz_szczegoly_propertyIsFurnished').val( $('#formularz_szczegoly_propertyIsFurnished').val() )

            if($('#formularz_szczegoly_propertyHasBalcony').val()!="")
                $('#set_formularz_szczegoly_propertyHasBalcony').val( $('#formularz_szczegoly_propertyHasBalcony').val() )

            if($('#formularz_szczegoly_propertyHasLift').val()!="")
                $('#set_formularz_szczegoly_propertyHasLift').val( $('#formularz_szczegoly_propertyHasLift').val() )

            if($('#formularz_szczegoly_propertyHasBasement').val()!="")
                $('#set_formularz_szczegoly_propertyHasBasement').val( $('#formularz_szczegoly_propertyHasBasement').val() )

            if($('#formularz_szczegoly_propertyHasParking').val()!="")
                $('#set_formularz_szczegoly_propertyHasParking').val( $('#formularz_szczegoly_propertyHasParking').val() )

            if($('#formularz_szczegoly_propertyAllowPets').val()!="")
                $('#set_formularz_szczegoly_propertyAllowPets').val( $('#formularz_szczegoly_propertyAllowPets').val() )

            if($('#formularz_szczegoly_propertyHasGarden').val()!="")
                $('#set_formularz_szczegoly_propertyHasGarden').val( $('#formularz_szczegoly_propertyHasGarden').val() )

            if($('#formularz_szczegoly_propertyHasClima').val()!="")
                $('#set_formularz_szczegoly_propertyHasClima').val( $('#formularz_szczegoly_propertyHasClima').val() )

            if($('#formularz_szczegoly_propertyAllowSmoking').val()!="")
                $('#set_formularz_szczegoly_propertyAllowSmoking').val( $('#formularz_szczegoly_propertyAllowSmoking').val() )


            //console.log( intToHeating($('#formularz_szczegoly_propertyHeatingType').val()) )
            $('#podglad_szczegoly').empty();
            $('#podglad_szczegoly').append(divekSzczegolik("Rozmiar",intToRodzajBT($('#formularz_szczegoly_propertyBuildingType').val()),''));
            $('#podglad_szczegoly').append(divekSzczegolik("Rozmiar",$('#formularz_szczegoly_propertyArea').val(),'m<sup>2</sup>'));
            $('#podglad_szczegoly').append(divekSzczegolik("Ogrzewanie",intToHeating($('#formularz_szczegoly_propertyHeatingType').val()),''));
            $('#podglad_szczegoly').append(divekSzczegolik("Piwnica",$('#formularz_szczegoly_propertyHasBasement').val(),''));
            $('#podglad_szczegoly').append(divekSzczegolik("Balkon",$('#formularz_szczegoly_propertyHasBalcony').val(),''));
            $('#podglad_szczegoly').append(divekSzczegolik("Rok budowy",$('#formularz_szczegoly_propertyBuildYear').val(),''));
            $('#podglad_szczegoly').append(divekSzczegolik("Klimatyzacja",$('#formularz_szczegoly_propertyHasClima').val(),''));
            $('#podglad_szczegoly').append(divekSzczegolik("Pietro",$('#formularz_szczegoly_propertyFloor').val(),''));
            $('#podglad_szczegoly').append(divekSzczegolik("Umeblowanie",$('#formularz_szczegoly_propertyIsFurnished').val(),''));
            $('#podglad_szczegoly').append(divekSzczegolik("Garden",$('#formularz_szczegoly_propertyHasGarden').val(),''));
            $('#podglad_szczegoly').append(divekSzczegolik("Winda",$('#formularz_szczegoly_propertyHasLift').val(),''));
            $('#podglad_szczegoly').append(divekSzczegolik("Pets",$('#formularz_szczegoly_propertyAllowPets').val(),''));
            $('#podglad_szczegoly').append(divekSzczegolik("Ilosc pokoi",$('#formularz_szczegoly_propertyRoomCount').val(),''));
            $('#podglad_szczegoly').append(divekSzczegolik("Maksymlanie ludzi",$('#formularz_szczegoly_propertyMaxPerson').val(),''));
            $('#podglad_szczegoly').append(divekSzczegolik("Parking",$('#formularz_szczegoly_propertyHasParking').val(),''));


            if(getTytul!="") $('#podglad_tytul').html(getTytul);
            if(getOpis!="") $('#podglad_opis').html(getOpis);
            if(getRodzajT!="") $('#podglad_typ').html(intToRodzajT(getRodzajT));
            if(getRodzajM!="") $('#podglad_offertyp').html(intToRodzajM(getRodzajM));

            if(getCena!="") $('#podglad_cena').html(getCena);

            if(getWaluta!="")
            {
                if(getRodzajT == 0)
                    $('#podglad_cena_waluta').html('<sup style="font-size: 70%;">'+intToWaluta(getWaluta)+'</sup>&frasl;<sub style="font-size: 60%;">MONTH</sub>');
                else if(getRodzajT == 1)
                    $('#podglad_cena_waluta').html('<span style="font-size: 70%;">'+intToWaluta(getWaluta)+'</span>');
                else if(getRodzajT == 2)
                    $('#podglad_cena_waluta').html('<sup style="font-size: 70%;">'+intToWaluta(getWaluta)+'</sup>&frasl;<sub style="font-size: 60%;">NOC</sub>');

            }

            if(getUlica!="") $('#podglad_ulica').html(getUlica);
            if(getMiasto!="") $('#podglad_miasto').html(getMiasto);
            if(getKraj!="") $('#podglad_kraj').html(getKraj);


            $('#FORMULARZ_DODAWANIA').submit();



        });

        var OBIEKT;
        $('#WYSLIJ_FORMULARZ').on('click', function(){
            console.log("bede pukał po: ")
            OBIEKT["photos"] = photos;
            OBIEKT = JSON.stringify(OBIEKT).replace(new RegExp("\\\\", "g"), "");

            console.log( OBIEKT );

            $.ajax({
                url: SERWER+'person/offer/add',
                type: "POST",
                contentType: "application/json",
                data : OBIEKT,
                headers : {
                    'X-Auth-Token' : localStorage.getItem('X-Auth-Token')
                },
                beforeSend : function(data){
                    console.log("before")
                    console.log(data)
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



        $('.idzDo_formularz_podsumowanie2').on('click', function(){
            console.log("podsumuj edycje")
        });

        $('#WYSLIJ_FORMULARZ_edit').on('click', function() {
            console.log("bede pukał po: ")
        });

        $('#FORMULARZ_DODAWANIA').form({
            fields: {
                tytul: { identifier: 'tytul',
                         rules: [{ type   : 'empty',
                                   prompt : 'Puste tytul' }]},
                opis: { identifier: 'opis',
                        rules: [{ type   : 'empty',
                                  prompt : 'Puste opis' }]},
                rodzajT: { identifier: 'rodzajT',
                            rules: [{ type   : 'empty',
                                      prompt : 'Puste rodzajT' }]},
                rodzajM: { identifier: 'rodzajT',
                            rules: [{ type   : 'empty',
                                       prompt : 'Puste rodzajM' }]},
                cena: { identifier: 'cena',
                            rules: [{ type   : 'empty',
                                prompt : 'Puste cena' }]},
                waluta: { identifier: 'waluta',
                            rules: [{ type   : 'empty',
                                prompt : 'Puste waluta' }]},
                ulica: { identifier: 'ulica',
                        rules: [{ type   : 'empty',
                                prompt : 'Puste ulica' }]},
                miasto: { identifier: 'miasto',
                        rules: [{ type   : 'empty',
                                prompt : 'Puste miasto' }]},
                kraj: { identifier: 'kraj',
                             rules: [{ type   : 'empty',
                                       prompt : 'Puste kraj' }]}
            },
            onFailure : function(formErrors, fields)
            {
                $('#WYSLIJ_FORMULARZ').addClass('disabled');
                return false;
            },
            onSuccess : function(event, fields)
            {
                $('#WYSLIJ_FORMULARZ').removeClass('disabled');
                console.log("SUKCES")
                console.log(fields)
                OBIEKT = fields;

                return false;
            }}) ;



        $('#uzyjGlownykontakt').checkbox({
            onChecked: function () {
                $(this).parent().parent().find('.field').addClass('disabled');
            },
            onUnchecked: function () {
                $(this).parent().parent().find('.field').removeClass('disabled');
            }
        });

        $('#ADRESY').hide();
        var bylo = false;
        $(document).on('click', '.idzDo_formularz_adres',function(){
            if(!bylo)
            {
                bylo = true;

                var MAPA2 = L.map('MAPA2', { center: L.latLng(50.088488, 19.937890),zoom: 12, attributionControl: false });
                window.dispatchEvent(new Event('resize'));
                L.tileLayer('https://a.tiles.mapbox.com/v3/mi.0ad4304c/{z}/{x}/{y}.png').addTo(MAPA2);

                new L.Control.GPlaceAutocomplete({
                    position: "topleft",
                    prepend : false,
                    autocomplete_options : {
                        types:  ['geocode']
                    }
                }).addTo(MAPA2);

                $("#MAPA2 .leaflet-gac-container.leaflet-control").appendTo("#WYSZUKIWARKA_POM").css({width: "100%"});

                setTimeout(function(){
                    MAPA2.invalidateSize();
                    MAPA2.setView([50.088488, 19.937890],12);
                    },300);
            }
        });


        $('#zbierz').click(function(){
            console.log( $('.united.modal input').size() );
            $('.united.modal input').each(function(e){
                console.log(this.value);
            });
        });

        $('.naInputa_input').hide();
        $('#ZAPISZSE').hide();

        $('.accordion').accordion();
        $('.menu .item').tab();


        $('#zalogujSie').click(function(){
            $('#modal_zalogujSie').modal('show');
        });

        $('#zarejestrujSie').click(function(){
            $('#modal_zarejestrujSie').modal('show');
        });

        $('#doladujKonto').click(function(){
            $('#modal_dodaluj').modal('show');
        });


        $('#emailwiadomosc').hide();

        $.ajax({
            url: SERWER+"/person/getMyUser",
            type: "GET",
            contentType: "application/json",
            headers : {
                'X-Auth-Token' : localStorage.getItem('X-Auth-Token')
            },
            success : function(data){
                //console.log(data)
                if(!data.activated)
                {
                    $('#emailwiadomosc').show();
                    $('#brakmieszkan').hide();
                    $('#dodajOgloszenie').addClass('disabled');
                }
                else
                {
                    $('#dodajOgloszenie').click(function(){
                        $('#modal_dodajOgloszenie').modal('show');
                    });

                }


                $('#NazwaMoj').append(data.name);

                $('#emailMoj').append(data.contact.email);
                $('#imieInazwiskoMoj').append(data.contact.name);
                $('#telefonMoj').append(data.contact.phoneNumber);

                $('#emailMoj_input').val(data.contact.email);
                $('#imieInazwiskoMoj_input').val(data.contact.name);
                $('#telefonMoj_input').val(data.contact.phoneNumber);




                console.time("concatenation");
                $.ajax({
                    url: SERWER+"person/offer/getMyOffers",
                    type: "GET",
                    contentType: "application/json",
                    headers : {
                        'X-Auth-Token' : localStorage.getItem('X-Auth-Token')
                    },
                    success : function(data){
                        //console.timeEnd("concatenation");
                        $('#LADOWANIE_MOICH_DODANYCH').hide();

                        if(data.length != 0)
                        {
                            $('#brakmieszkan').hide();
                            lista_lazyLoading(data,'dodaneogloszenia',3);

                        }



                    },
                    error: function(data)
                    {
                        console.log(data)
                    }
                });
            },
            error: function(data)
            {
                if(data.status == 403 || data.status == 500)
                {
                    localStorage.removeItem("X-Auth-Token");
                    location.reload();
                }
            }
        });

        $('#dodaneogloszenia2').perfectScrollbar({
            minScrollbarLength: 20
        });

        $('#ZMIENHASLO').click(function(){
            console.log( localStorage.getItem('X-Auth-Token') )
            location.href='http://localhost:8080/place/changepassword.php?token='+localStorage.getItem('X-Auth-Token');
        });

        $('#EDYTUJSE').click(function(){
            $('#EDYTUJSE').hide();
            $('#ZAPISZSE').show();

            $('.naInputa_input').show();
            $('.naInputa_div').hide();
        });

        $('#ZAPISZSE').click(function(){
            $('#EDYTUJSE').show();
            $('#ZAPISZSE').hide();

            var obiekt = JSON.stringify({"email" : $('#emailMoj_input').val(), "nazwa" : $('#imieInazwiskoMoj_input').val(), "telefon" : $('#telefonMoj_input').val() });
            console.log("aktalizuj " + obiekt )

            $('.naInputa_input').hide();
            $('.naInputa_div').show();
        });

        $('#WYLOGUJSIE').click(function(){
            $.ajax({
                url: SERWER+"person/session/logout",
                type: "POST",
                contentType: "application/json",
                headers : {
                    'X-Auth-Token' : localStorage.getItem('X-Auth-Token')
                },
                success : function(data){
                    localStorage.removeItem("X-Auth-Token");
                    location.reload();
                },
                error: function(data)
                {
                    if(data.status == 403)
                    {
                        localStorage.removeItem("X-Auth-Token");
                        location.reload();
                    }
                }
            });
        });


    });



</script>

